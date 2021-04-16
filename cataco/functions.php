<?php
add_action( 'after_setup_theme', 'cataco_setup' );

function cataco_setup() {
	load_theme_textdomain( 'cataco', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form' ) );
    add_theme_support( 'woocommerce' );
	global $content_width;

	if ( ! isset( $content_width ) ) { $content_width = 1920; }
	register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'cataco' ) ) );
	/** custom logo **/
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	));
}

add_action( 'wp_enqueue_scripts', 'cataco_load_scripts' );

function cataco_load_scripts() {
	wp_enqueue_style( 'cataco-style', get_stylesheet_uri() );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 1.1, true);
}

add_action( 'wp_footer', 'cataco_footer_scripts' );

function cataco_footer_scripts() {
?>


<script>
jQuery(document).ready(function ($) {
    var deviceAgent = navigator.userAgent.toLowerCase();
    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
    $("html").addClass("ios");
    $("html").addClass("mobile");
    }
    if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");   
    }
    else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
    }
    else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
    }
    else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
    }
    else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
    }
});
</script>


<?php
}
add_filter( 'document_title_separator', 'cataco_document_title_separator' );

function cataco_document_title_separator( $sep ) {
    $sep = '|';
    return $sep;
}

add_filter( 'the_title', 'cataco_title' );

function cataco_title( $title ) {
    if ( $title == '' ) {
        return '...';
    } else {
        return $title;
    }
}

add_filter( 'the_content_more_link', 'cataco_read_more_link' );

function cataco_read_more_link() {
    if ( ! is_admin() ) {
        return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
    }
}

add_filter( 'excerpt_more', 'cataco_excerpt_read_more_link' );

function cataco_excerpt_read_more_link( $more ) {
    if ( ! is_admin() ) {
        global $post;
        return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
    }
}

add_filter( 'intermediate_image_sizes_advanced', 'cataco_image_insert_override' );

function cataco_image_insert_override( $sizes ) {
    unset( $sizes['medium_large'] );
    return $sizes;
}

add_action( 'widgets_init', 'cataco_widgets_init' );

function cataco_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Sidebar Widget Area', 'cataco' ),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

add_action( 'wp_head', 'cataco_pingback_header' );

function cataco_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action( 'comment_form_before', 'cataco_enqueue_comment_reply_script' );

function cataco_enqueue_comment_reply_script() {
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function cataco_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}

add_filter( 'get_comments_number', 'cataco_comment_count', 0 );

function cataco_comment_count( $count ) {
    if ( ! is_admin() ) {
        global $id;
        $get_comments = get_comments( 'status=approve&post_id=' . $id );
        $comments_by_type = separate_comments( $get_comments );
        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}

function register_widget_areash() {

    register_sidebar( array(
        'name'          => 'Header area',
        'id'            => 'header_area',
        'description'   => 'Header menu',
        'before_widget' => '<section class="header-area">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    )); 
}
  
add_action( 'widgets_init', 'register_widget_areast' );
  
function register_widget_areasb() {
  
    register_sidebar( array(
      'name'          => 'Footer area bot',
      'id'            => 'footer_area_bot',
      'description'   => 'For the bottom footer ie: links',
      'before_widget' => '<section class="footer-area-bot">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>',
    ));
    
}
add_action( 'widgets_init', 'register_widget_areasS' );

function register_widget_areasS() {

    register_sidebar( array(
        'name'          => 'Side area',
        'id'            => 'side_area',
        'description'   => 'Sidebar menu',
        'before_widget' => '<section class="side-area">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    )); 
}
  
add_action( 'widgets_init', 'register_widget_areasb' );
  
// Prevent WP from adding <p> tags on pages
function disable_wp_auto_p( $content ) {
    if ( is_singular( 'page' ) ) {
      remove_filter( 'the_content', 'wpautop' );
      remove_filter( 'the_excerpt', 'wpautop' );
    }
    return $content;
}
add_filter( 'the_content', 'disable_wp_auto_p', 0 );

// Fragment for addinging the number to the cart when there is something in the bag - AJAX

function add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    
    if ($woocommerce->cart->cart_contents_count == 0) {
        $fragments['.cart-count'] = '<span class="cart-count hidden">' . $woocommerce->cart->cart_contents_count . '</span>';
    } else {
        $fragments['.cart-count'] = '<span class="cart-count">' . $woocommerce->cart->cart_contents_count . '</span>';
    }
    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'add_to_cart_fragment' );

/* Recieves the ID from the Gallery and Returns all the information for that ID - Src for the image src and Caption for the caption and alt tag */
/* For the gallery */ 
function get_post_from_id( $gallery_id ) {

    $post_meta = get_post( $gallery_id );
    return array(
        'alt' => get_post_meta( $post_meta->ID, '_wp_attachment_image_alt', true ),
        'caption' => $post_meta->post_excerpt,
        'description' => $post_meta->post_content,
        'href' => get_permalink( $post_meta->ID ),
        'src' => $post_meta->guid,
        'title' => $post_meta->post_title
    );
}

// Checks if the page is the shop page
function shop_page() {
    if(is_shop()){
        return true;
    } else {
        return false;
    }
}

// Checks if the page is a product page
function product_page() {
    if (is_product()) {
        return true;
    } else {
        return false;
    }
}

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );
add_filter('use_block_editor_for_post', '__return_false', 10);

// Removes the admin bar from the live site
add_filter('show_admin_bar', '__return_false');

add_action( 'wp_print_styles', 'deregister_styles', 100);
function deregister_styles() {
    // Styles added to the theme styles
    wp_deregister_style( 'popup-maker-site' );
    wp_deregister_style( 'contact-form-7' );
    wp_deregister_style( 'dashicons' );
    if ( !is_page('instagram') ) {
        wp_deregister_style('sb_instagram_styles');
    }
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'ppom_bootstrap_css', '__return_empty_array' );
add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 );

add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );
function my_deregister_javascript() {
    if ( !is_page('contact') ) {
        wp_deregister_script( 'contact-form-7' );
    }
    if( function_exists( 'is_woocommerce' ) ){
		// Check if it's any of WooCommerce page
		if(! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			wp_dequeue_script('woocommerce'); 
			wp_dequeue_script('wc-add-to-cart');
 
		}
	}
}

// Function for checking the prices of the Products and if they're on sale or not
function product_prices() {
    global $product;
    if ($product->is_type('simple')) {
        if ($product->get_sale_price()) {
            echo '<div class="shop-pricing sale"><p class="regular-price"><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_regular_price() . '</p><p class="sale-price"><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_sale_price() . '</p></div>';
        } else {
            echo '<div class="shop-pricing"><p><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_price() . '</p></div>';
        }
    } elseif ($product->is_type('variable')) {
        if ($product->get_sale_price()) {
            echo '<div class="shop-pricing sale"><p class="regular-price"><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_regular_price() . '<strong>+</strong></p><p class="sale-price"><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_sale_price() . '<strong>+</strong></p></div>';
        } else {
            echo '<div class="shop-pricing"><p><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_price() . '<strong>+</strong></p></div>';
        }
    } elseif ($product->is_type('grouped')) {
        $children = $product->get_children();
        // Current Prices of the Products | Highest and Lowest Values
        $lowest_price = 9999999;
        $highest_price = 0;
        // Regular price if the product is on sale | Highest and Lowest Values
        $lowest_regular_price = 9999999;
        $highest_regular_price = 0;
        // Bool for if any of the Children are on sale
        $is_on_sale = false;
        foreach ($children as $key => $value) {
            $_product = wc_get_product($value);
            $price = $_product->get_price(); // Current Price of Child
            $regular_price = $_product->get_regular_price(); // Regular price of Child incase it's on sale
            $sale = $_product->get_sale_price(); // Check if the Child is on sale

            if ($price < $lowest_price) {
                $lowest_price = $price;
            }

            if ($regular_price < $lowest_regular_price) {
                $lowest_regular_price = $regular_price;
            }

            if ($price > $highest_price) {
                $highest_price = $price;
            }

            if ($regular_price > $highest_regular_price) {
                $highest_regular_price = $regular_price;
            }

            if ($sale) {
                $is_on_sale = true;
            }
        }
        if ($is_on_sale) {
            echo '<div class="shop-pricing sale"><p class="regular-price"><strong>CA </strong><span class="currency-symbol">$</span>' . $lowest_regular_price . ' - <span class="currency-symbol">$</span>' . $highest_regular_price . '</p><p class="sale-price"><strong>CA </strong><span class="currency-symbol">$</span>' . $lowest_price . ' - <span class="currency-symbol">$</span>' . $highest_price . '</p></div>';
        } else {
            echo '<div class="shop-pricing"><p><strong>CA </strong><span class="currency-symbol">$</span>' . $lowest_price . ' - <span class="currency-symbol">$</span>' . $highest_price . '</p></div>';
        }
    } else {
        if ($product->get_sale_price()) {
            echo '<div class="shop-pricing sale"><p class="regular-price"><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_regular_price() . '</p><p class="sale-price"><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_sale_price() . '</p></div>';
        } else {
            echo '<div class="shop-pricing"><p><strong>CA </strong><span class="currency-symbol">$</span>' . $product->get_price() . '</p></div>';
        }
    }
}

// Add google analytics to the head
add_action('wp_head', 'add_googleanalytics');
function add_googleanalytics() { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2DY59KGYYT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-2DY59KGYYT');
    </script>
<?php }

// Remove Editor wysywig from Products
add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'product';
    remove_post_type_support( $post_type, 'editor');
}

// Remove wysywig editor from set page templates
function disable_wysywig() {
    global $post;

    if (! is_a($post, 'WP_Post')) {
        return;
    }

    $current_page_template_slug = basename(get_page_template_slug($post_id));

    $exclude_template_slugs = array(
        'services.php'
    );

    if (in_array($current_page_template_slug, $exclude_template_slugs)) {
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_enqueue_scripts', 'disable_wysywig');

// Remove Posts from admin panel
function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'remove_default_post_type' );


//Customize product data tabs

add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {
	$tabs['description']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback
	return $tabs;
}

function woo_custom_description_tab_content() {
	echo '<h2>Description</h2>';
    $desc = get_field('product_description');
	echo $desc;
}

// Woocommerce Shop Hooks

add_filter('woocommerce_show_page_title', 'shop_heading');

function shop_heading() {
    echo '<h2 class="entry-title">Shop</h2>';
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_filter( 'loop_shop_per_page', 'products_per_page', 9999 );
 
function products_per_page( $per_page ) {
  $per_page = 18;
  return $per_page;
}

// Shop Container
add_action( 'woocommerce_before_shop_loop', 'shop_container_start', 18);
add_action( 'woocommerce_after_shop_loop', 'shop_container_end', 11 );

function shop_container_start() {
    echo '<div class="shop-container">';
}

function shop_container_end() {
    echo '</div>';
}

// Pagination
add_filter( 'woocommerce_pagination_args', 	'woocommerce_pagination_arrow_change' );

function woocommerce_pagination_arrow_change( $args ) {
	$args['prev_text'] = '<';
	$args['next_text'] = '>';
	return $args;
}

// Sidebar
add_action( 'woocommerce_before_shop_loop', 'before_shop_loop_sidebar_container_start', 19);
add_action( 'woocommerce_before_shop_loop', 'before_shop_loop_sidebar', 20);
add_action( 'woocommerce_before_shop_loop', 'before_shop_loop_sidebar_container_end', 21);

function before_shop_loop_sidebar_container_start() {
    echo '<div class="filter-sidebar"><div class="filter-flex"><div class="filter-toggle"><span class="vertical-filter"></span><span class="horizontal-filter"></span></div><p class="filter-text">Filters</p></div><div class="filters">';
}

function before_shop_loop_sidebar() {
    dynamic_sidebar( 'side_area' );
}

function before_shop_loop_sidebar_container_end() {
    echo '</div></div>';
}

add_action( 'woocommerce_before_shop_loop', dynamic_sidebar( 'footer_area_bot' ) , 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'product_title_tags', 10 );

function product_title_tags() {
    echo '<h3 class="product-title">' . get_the_title() . '</h3>';
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'product_prices', 10 );

add_action( 'woocommerce_after_shop_loop_item', 'short_description', 8 );

function short_description() {
    $short_description = get_field('short_description');
    if ($short_description != "") {
        echo '<div class="short-description">' . $short_description . '</div>';
    }
}

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 ); 
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'link_button', 10 );

function link_button() {
    global $product;
    echo '<a href="' . get_permalink( $product->get_id() ) . '" class="button">View Item</a>';
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action('woocommerce_before_single_product', 'product_name_new_position', 5);

function product_name_new_position() {
    global $product;
    echo '<div class="heading-background"><h2>' . $product->get_name() . '</h2></div>';
}

add_action( 'woocommerce_after_add_to_cart_button', 'continue_shopping', 10 );

function continue_shopping() {
    $url = site_url('/shop');
    echo '<a class="continue-shopping button" href="' . $url . '">Continue Shopping</a>';
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'add_to_cart_text' ); 
function add_to_cart_text() {
    return __( 'Add to Cart', 'woocommerce' ); 
}

add_action( 'woocommerce_single_product_summary', 'sale_tag', 2 );

function sale_tag() {
    global $product;
    if ($product->get_sale_price()) {
        echo '<h3 class="sale-label">On Sale</h3>';
    } elseif ($product->is_type('grouped')) {
        $children = $product->get_children();
        $bool = false;
        foreach ($children as $key => $value) {
            $_product = wc_get_product($value);
            $sale_price = $_product->get_sale_price();
            if ($bool == false && $sale_price != false) {
                $bool = true;
            }
        }
        if ($bool) {
            echo '<h3 class="sale-label">On Sale</h3>';
        }
    }
}

// The screen reader label still remains
// add_filter( 'woocommerce_before_quantity_input_field', 'quantity_label' );
add_action( 'woocommerce_before_add_to_cart_quantity', 'quantity_label' ); 

function quantity_label() {
    echo '<p class="qty">Quantity: </p>';
}

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_filter( 'woocommerce_single_product_summary', 'product_prices', 10 );

function woo_related_products_limit() {
    global $product;
      
    $args['posts_per_page'] = 6;
    return $args;
}

// Cart

add_action( 'woocommerce_proceed_to_checkout', 'continue_shopping', 30 );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

function sale_price_check($subtotal, $cart_item, $cart_item_key) {
    
    $product = $cart_item['data'];
	$quantity = $cart_item['quantity'];

	if ( ! $product ) {
		return $subtotal;
	}

	$regular_price = $sale_price = $suffix = '';

	if ( $product->is_taxable() ) {

		if ( 'excl' === WC()->cart->tax_display_cart ) {

			$regular_price = wc_get_price_excluding_tax( $product, array( 'price' => $product->get_regular_price(), 'qty' => $quantity ) );
			$sale_price    = wc_get_price_excluding_tax( $product, array( 'price' => $product->get_sale_price(), 'qty' => $quantity ) );

			if ( WC()->cart->prices_include_tax && WC()->cart->tax_total > 0 ) {
				$suffix .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
			}
		} else {

			$regular_price = wc_get_price_including_tax( $product, array( 'price' => $product->get_regular_price(), 'qty' => $quantity ) );
			$sale_price = wc_get_price_including_tax( $product, array( 'price' => $product->get_sale_price(), 'qty' => $quantity ) );

			if ( ! WC()->cart->prices_include_tax && WC()->cart->tax_total > 0 ) {
				$suffix .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
			}
		}
	} else {
		$regular_price    = $product->get_price() * $quantity;
		$sale_price       = $product->get_sale_price() * $quantity;
	}

	if ( $product->is_on_sale() && ! empty( $sale_price ) ) {
		$price = wc_format_sale_price(
            wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price(), 'qty' => $quantity ) ),
            wc_get_price_to_display( $product, array( 'qty' => $quantity ) )
        ) . $product->get_price_suffix();
	} else {
		$price = wc_price( $regular_price ) . $product->get_price_suffix();
	}

	// VAT suffix
	$price = $price . $suffix;

	return $price;
}
add_filter('woocommerce_cart_item_price', 'sale_price_check', 10, 3);

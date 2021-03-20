<?php
add_action( 'after_setup_theme', 'cataco_setup' );

function cataco_setup() {
	load_theme_textdomain( 'cataco', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form' ) );
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
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css', false, '1.0.0', 'all');
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


// add_filter( 'use_default_gallery_style', '__return_false' );
// add_theme_support('html5', array('gallery', 'caption'));

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
  
function register_widget_areast() {
  
    register_sidebar( array(
      'name'          => 'Footer area top',
      'id'            => 'footer_area_top',
      'description'   => 'For the top of the footer ie: insta, facebook',
      'before_widget' => '<section class="footer-area-top">',
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
  
  /*// Prevent WP from adding <p> tags on all post types
  function disable_wp_auto_p( $content ) {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
    return $content;
  }
  add_filter( 'the_content', 'disable_wp_auto_p', 0 );
  If you want to prevent WP from adding <p> tags to any other post type, you can simply replace page in if ( is_singular( 'page' ) ) with your post type of choice.*/

add_filter( 'woocommerce_add_to_cart_fragments', 'add_to_cart_fragment' );

function add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    if ($woocommerce->cart->cart_contents_count == 0) {
        $fragments['.cart-count'] = '<span class="cart-count hidden">' . $woocommerce->cart->cart_contents_count . '</span>';
    } else {
        $fragments['.cart-count'] = '<span class="cart-count">' . $woocommerce->cart->cart_contents_count . '</span>';
    }
    return $fragments;
}

/* Recieves the ID from the Gallery and Returns all the information for that ID - Src for the image src and Caption for the caption and alt tag */
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

function product_page() {
    if (is_product()) {
        return true;
    } else {
        return false;
    }
}

// This would go on page.php
// if ( $shop = shop_page() ) : 
//     if ( is_active_sidebar( 'side_area' ) ) :
//         dynamic_sidebar( 'side_area' );
//     endif;
// endif; 

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
// Woocommerce Shop Hooks

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
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
add_action( 'woocommerce_after_shop_loop_item_title', 'shop_price', 10 );

function shop_price() {
    global $product;
    if ($product->get_sale_price()) {
        echo '<div class="shop-pricing sale"><p class="regular-price"><span class="country-abbreviation">CA </span><span class="currency-symbol">$</span>' . $product->get_regular_price() . '</p><p class="sale-price"><span class="country-abbreviation">CA </span><span class="currency-symbol">$</span>' . $product->get_sale_price() . '</p></div>';
    } else {
        echo '<div class="shop-pricing"><p><span class="country-abbreviation">CA </span><span class="currency-symbol">$</span>' . $product->get_price() . '</p></div>';
    }
}

add_action( 'woocommerce_after_shop_loop_item', 'short_description', 8 );

function short_description() {
    global $product;
    if ($product->get_short_description()) {
        echo '<p class="short-description">' . $product->get_short_description() . '</p>';
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

// Woocommerce Product Hooks

add_action( 'woocommerce_after_add_to_cart_button', 'continue_shopping', 10 );

function continue_shopping() {
    $url = site_url('/shop');
    echo '<a href="' . $url . '" class="button">Continue Shopping</a>';
}

// The screen reader label still remains
// add_filter( 'woocommerce_before_quantity_input_field', 'quantity_label' );
add_action( 'woocommerce_before_add_to_cart_quantity', 'quantity_label' ); 

function quantity_label() {
 echo '<p class="qty">Quantity: </p>'; 
}

// add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
//     return array(
//         'width' => 300,
//         'height' => 300,
//         'crop' => 1,
//     );
// } );

// add_filter( 'woocommerce_get_image_size_single', function( $size ) {
//     return array(
//         'width' => 500,
//         'height' => 500,
//         'crop' => 1,
//     );
// } );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_filter( 'woocommerce_single_product_summary', 'product_single_price', 10 );

function product_single_price() {
    global $product;
    if ($product->get_sale_price()) {
        echo '<div class="product-single"><p class="regular-price sale"><span class="country-abbreviation">CA </span><span class="currency-symbol">$</span>' . $product->get_regular_price() . '</p><p class="sale-price"><span class="country-abbreviation">CA </span><span class="currency-symbol">$</span>' . $product->get_sale_price() . '</p></div>';
    } else {
        echo '<div class="product-single"><p class="regular-price"><span class="country-abbreviation">CA </span><span class="currency-symbol">$</span>' . $product->get_price() . '</p></div>';
    }
}

// Cart

add_action( 'woocommerce_proceed_to_checkout', 'continue_shopping', 30 );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

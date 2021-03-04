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

// Unenqueues the base styles of wordpress
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

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
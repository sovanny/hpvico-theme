<?php
/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support'))
{
    // Add Thumbnail Theme Support
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/


function hpvico_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        //Put header scripts here
   }
}

function hpvico_styles() {
    wp_enqueue_style('hpvico', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
}

function hpvico_footer_scripts() {
    if(is_front_page()) {
        wp_enqueue_script('polyfll-intersectionobserver', 'https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver', array(), '1.0.0'); 
        wp_enqueue_script('hpvicoscript-downloadfile', get_template_directory_uri() . '/dist/js/main.js', array(), '1.0.0');
    }
}

function register_acf_options_pages() {
    if( !function_exists('acf_add_options_page') )
        return;

    acf_add_options_page(array(
        'page_title'    => __('HPViCo Site Options'),
        'menu_title'    => __('HPViCo Site Options'),
        'menu_slug'     => 'site-options'
    ));
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'hpvico_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'hpvico_styles'); // Add Theme Stylesheet
add_action('wp_footer', 'hpvico_footer_scripts');
add_action('acf/init', 'register_acf_options_pages');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


/*------------------------------------------------------------------*\
    Remove Posts and Comment functionality since it's not a blog
\*------------------------------------------------------------------*/

// Remove side menu
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

//Remove text editor (using ACF)
add_action('admin_init', 'remove_texteditor');

function remove_texteditor() {
    remove_post_type_support('page', 'editor');
}

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

// End remove post and comment


<?php

//////////////////////////////////////
// LOAD CUSTOM STYLESHEETS & SCRIPTS
//////////////////////////////////////

function custom_scripts_enqueue() {

		// Bootstrap CSS
		wp_enqueue_style('bootstrapcss', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '4.1.3', 'all');

		// Bootstrap JS
		wp_enqueue_script('bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js', array(), '3.3.7', 'all');

		// Custom CSS
		wp_enqueue_style('customstyle'
		, get_template_directory_uri() . '/css/screen.css', array(), '1.0.0', 'all');

		// Font Awesome Icons CSS
		wp_enqueue_style('fontawesomecss', 'https://pro.fontawesome.com/releases/v5.4.1/css/all.css', array(), '5.4.1', 'all');

		// jQuery
		wp_enqueue_script('jquery');

		// Footer Javascript file
		wp_enqueue_script('footerjs', get_template_directory_uri() . '/js/javascript-footer.js', array(), '1.0.0', true);

		// Header Javascript file
		wp_enqueue_script('headerjs', get_template_directory_uri() . '/js/javascript-header.js', array(), '1.0.0', false);

}

add_action('wp_enqueue_scripts', 'custom_scripts_enqueue');


//////////////////////////////////////
// LOAD JAVASCRIPT ONLY IN FRONTPAGE
//////////////////////////////////////

function enqueue_front_page_scripts() {
    if( is_front_page() )
    {
        // Frontpage Footer Javascript file
        wp_enqueue_script('frontfooterjs', get_template_directory_uri() . '/js/javascript-front-footer.js', array(), '1.0.0', true);
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_front_page_scripts' );

//////////////////////////////////////
// ACTIVATE WP MENU
//////////////////////////////////////

function theme_setup() {

	add_theme_support('menus');

	register_nav_menu('main_menu', 'Main Menu');

	register_nav_menu('footer', 'Footer Bottom Navigation');

}

add_action('init', 'theme_setup');

//////////////////////////////////////
// WP ADD THEME SUPPORT SECTION
//////////////////////////////////////

function paradisepress_theme_support() {
	add_theme_support( 'post-thumbnails' );
}

add_action('init', 'paradisepress_theme_support');

///////////////////////////////////////////
// SHOW LIST OF CHILD PAGES ON PARENT PAGE
///////////////////////////////////////////

function wpb_list_child_pages() {

global $post;

if ( is_page() && $post->post_parent )

    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {

    $string = '<ul id="child-pages">' . $childpages . '</ul>';
}

return $string;

}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');

////////////////////////////////////
// ADD PAGE SLUG TO BODY CLASS
//////////////////////////////////

function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

//////////////////////////
// THE BLOG POST EXCERPT
/////////////////////////

//Limit length of excerpt to certain number of characters
function get_excerpt(){
$excerpt = get_the_content();
//$excerpt = preg_replace(" ([.*?])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 300);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.' ... <a href="' . get_permalink($post->ID) . '">lesen >></a>';
return $excerpt;
}

////////////////////////////////////////////////////////////////////
// THE EXCERPT IN BLOG ARCHIVE (Home Template) AUFBITCHEN + STYLING
////////////////////////////////////////////////////////////////////

function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '');
                $excerpt_length = 40;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, ' ... <a href="' . get_permalink($post->ID) . '">weiterlesen >></a>');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

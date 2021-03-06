<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
*/


// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) 
    $content_width = 980;



/*-----------------------------------------------------------------------------------*/
/*	Include functions
/*-----------------------------------------------------------------------------------*/
require('admin/theme-admin.php');
require('functions/pagination.php');
require('functions/shortcodes.php');
require('functions/better-comments.php');
require('functions/meta/meta-box-class.php');
require('functions/meta/meta-box-usage.php');


/*-----------------------------------------------------------------------------------*/
/*	Images
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'child_theme_setup', 11 );

if ( ! function_exists( 'child_theme_setup' ) ):
	function child_theme_setup() {

		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
			add_image_size( 'full-size',  9999, 9999, false );
		    add_image_size( 'slider',  980, 9999, false );
		    add_image_size( 'portfolio-single',  550, 9999, false );
		    add_image_size( 'small-thumb',  50, 50, true );
		    add_image_size( 'grid-thumb',  230, 144, true );
		    add_image_size( 'home-feature',  300, 144, true );
		    add_image_size( 'blog-feature',  280, 160, true );
		    add_image_size( 'bookshelf',  65, 90, true );
		}
	}
endif;

/*-----------------------------------------------------------------------------------*/
/*	Javascsript
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts','adapt_scripts_function');
function adapt_scripts_function() {
	//get theme options
	global $options;
	
	wp_enqueue_script('jquery');	
	
	// Site wide js
	wp_enqueue_script('hoverIntent', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js');
	wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js');
	wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js');
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
	wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
	wp_enqueue_script('uniform', get_template_directory_uri() . '/js/jquery.uniform.js');
	wp_enqueue_script('responsify', get_template_directory_uri() . '/js/jquery.responsify.init.js');
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js');

	//portfolio main
	if(is_page_template('template-portfolio.php')) {
		wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js');
		wp_enqueue_script('isotope_init', get_template_directory_uri() . '/js/isotope_init.js');
	}
}


/*-----------------------------------------------------------------------------------*/
/*Enqueue CSS
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts', 'adapt_enqueue_css');
function adapt_enqueue_css() {
	
	//responsive
	wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', 'style');
	
	//prettyPhoto
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', 'style');

	//awesome font - icon fonts
	wp_enqueue_style('awesome-font', get_template_directory_uri() . '/css/awesome-font.css', 'style');
	
}

/*-----------------------------------------------------------------------------------*/
/*	Sidebars
/*-----------------------------------------------------------------------------------*/

//Register Sidebars
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => __('Widgets in this area will be shown in the sidebar.','adapt'),
		'before_widget' => '<div class="sidebar-box clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span>',
		'after_title' => '</span></h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer One',
		'id' => 'footer-one',
		'description' => __('Widgets in this area will be shown in the first footer area.','adapt'),
		'before_widget' => '<div class="footer-widget clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Two',
		'id' => 'footer-two',
		'description' => __('Widgets in this area will be shown in the second footer area.','adapt'),
		'before_widget' => '<div class="footer-widget clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Three',
		'id' => 'footer-three',
		'description' => __('Widgets in this area will be shown in the third footer area.','adapt'),
		'before_widget' => '<div class="footer-widget clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Footer Four',
		'id' => 'footer-four',
		'description' => __('Widgets in this area will be shown in the fourth footer area.','adapt'),
		'before_widget' => '<div class="footer-widget clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));


/*-----------------------------------------------------------------------------------*/
/*	Custom Post Types & Taxonomies
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'adapt_create_post_types' );
function adapt_create_post_types() {
	//slider post type
	register_post_type( 'Slides',
		array(
		  'labels' => array(
			'name' => __( 'Slides', '' ),
			'singular_name' => __( 'Slide', '' ),		
			'add_new' => _x( 'Add New', 'Slide', '' ),
			'add_new_item' => __( 'Add New Slide', '' ),
			'edit_item' => __( 'Edit Slide', '' ),
			'new_item' => __( 'New Slide', '' ),
			'view_item' => __( 'View Slide', '' ),
			'search_items' => __( 'Search Slides', '' ),
			'not_found' =>  __( 'No Slides found', '' ),
			'not_found_in_trash' => __( 'No Slides found in Trash', '' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'slides' ),
		)
	  );
	  
	  
	//hp highlights
	/*
	register_post_type( 'hp_highlights',
		array(
		  'labels' => array(
			'name' => __( 'Books', '' ),
			'singular_name' => __( 'Book', '' ),		
			'add_new' => _x( 'Add New', 'Book', '' ),
			'add_new_item' => __( 'Add New Book', '' ),
			'edit_item' => __( 'Edit Book', '' ),
			'new_item' => __( 'New Book', '' ),
			'view_item' => __( 'View Book', '' ),
			'search_items' => __( 'Search Books', '' ),
			'not_found' =>  __( 'No Books found', '' ),
			'not_found_in_trash' => __( 'No Books found in Trash', '' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','excerpt','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'hp-highlights' ),
		)
	  );
	  
	 */
	  
	//portfolio post type
	register_post_type( 'Portfolio',
		array(
		  'labels' => array(
			'name' => __( 'Books', '' ),
			'singular_name' => __( 'Book', '' ),		
			'add_new' => _x( 'Add New', 'Book', '' ),
			'add_new_item' => __( 'Add New Book', '' ),
			'edit_item' => __( 'Edit Book', '' ),
			'new_item' => __( 'New Book', '' ),
			'view_item' => __( 'View Book', '' ),
			'search_items' => __( 'Search Books', '' ),
			'not_found' =>  __( 'No Books found', '' ),
			'not_found_in_trash' => __( 'No Books found in Trash', '' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array('title','editor','excerpt','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'portfolio' ),
		)
	  );
}


// Add taxonomies
add_action( 'init', 'adapt_create_taxonomies' );
function adapt_create_taxonomies() {
	
// portfolio taxonomies
	$cat_labels = array(
		'name' => __( 'Bookshelf Categories', '' ),
		'singular_name' => __( 'Bookshelf Category', '' ),
		'search_items' =>  __( 'Search Bookshelf Categories', '' ),
		'all_items' => __( 'All Bookshelf Categories', '' ),
		'parent_item' => __( 'Parent Bookshelf Category', '' ),
		'parent_item_colon' => __( 'Parent Bookshelf Category:', '' ),
		'edit_item' => __( 'Edit Bookshelf Category', '' ),
		'update_item' => __( 'Update Bookshelf Category', '' ),
		'add_new_item' => __( 'Add New Bookshelf Category', '' ),
		'new_item_name' => __( 'New Bookshelf Category Name', '' ),
		'choose_from_most_used'	=> __( 'Choose from the most used Bookshelf categories', '' )
	); 	

	register_taxonomy('portfolio_cats','portfolio',array(
		'hierarchical' => true,
		'labels' => $cat_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));
}


/*-----------------------------------------------------------------------------------*/
/*	Portfolio Cat Pagination
/*-----------------------------------------------------------------------------------*/

// Set number of posts per page for taxonomy pages
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}
function my_option_posts_per_page( $value ) {
	global $option_posts_per_page;
	
    if ( is_tax( 'portfolio_cats') ) {
        return 12;
    }
	else {
        return $option_posts_per_page;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Track popular posts
/*-----------------------------------------------------------------------------------*/

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');


function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*-----------------------------------------------------------------------------------*/
/*	Other functions
/*-----------------------------------------------------------------------------------*/

//add feeds
add_theme_support( 'automatic-feed-links' );

// Limit Post Word Count
add_filter('excerpt_length', 'new_excerpt_length');
function new_excerpt_length($length) {
	return 26;
}

//Replace Excerpt Link
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
       global $post;
	return '...';
}

//custom excerpts
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

// Enable Custom Background
add_theme_support( 'custom-background' );

// register navigation menus
register_nav_menus( array( 'menu'=>__('Menu') ) );

/// add home link to menu
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

// menu fallback
function default_menu() {
	require_once (get_template_directory() . '/includes/default-menu.php');
}


// Localization Support
load_theme_textdomain( 'adapt', get_template_directory() .'/lang' );

//create featured image column
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs', 'powered');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
	if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'small-thumb' );
    }
}

// Change post types for the gallery-metabox plugin
if ( !function_exists( 'custom_be_gallery_metabox_post_types' ) ) :
	function custom_be_gallery_metabox_post_types( $classes ) {
			return array('portfolio', 'services');
	}
	add_filter( 'be_gallery_metabox_post_types', 'custom_be_gallery_metabox_post_types' );
endif;
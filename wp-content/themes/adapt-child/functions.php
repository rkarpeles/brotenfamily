<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
*/

/*-----------------------------------------------------------------------------------*/
/*Deregister Parent Theme Responsive CSS
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( 'responsive' );
}

/*-----------------------------------------------------------------------------------*/
/*Add Child Theme CSS Sheets
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts', 'new_adapt_enqueue_css');
function new_adapt_enqueue_css() {

    //main
	wp_enqueue_style('new_responsive', get_stylesheet_directory_uri() . '/style.css', 'style');
	
	//responsive
	wp_enqueue_style('new_responsive', get_stylesheet_directory_uri() . '/css/responsive.css', 'style');
	
}

/*-----------------------------------------------------------------------------------*/
/*	Add scripts
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts','new_adapt_scripts_function');
function new_adapt_scripts_function() {
	//get theme options
	global $options;
	
	wp_enqueue_script('jquery');	
	
	// Site wide js
	wp_enqueue_script('site', get_stylesheet_directory_uri() . '/js/site.js');
	wp_enqueue_script('iframe', get_stylesheet_directory_uri() . '/js/iframe-resizing.js');
	wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr.custom.min.js');
	wp_enqueue_script('fitvids', get_stylesheet_directory_uri() . '/js/fitvids.js');
	
}

/*-----------------------------------------------------------------------------------*/
/*	Images
/*-----------------------------------------------------------------------------------*/

if (function_exists( 'add_theme_support')) {
	add_theme_support( 'post-thumbnails');
	
	if ( function_exists('add_image_size')) {
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



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
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', 'style');
	
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
			
		    add_image_size( 'new-portfolio-single', 230, 340, true );
		    add_image_size( 'bookshelf-grid-thumb', 9999, 9999, false );



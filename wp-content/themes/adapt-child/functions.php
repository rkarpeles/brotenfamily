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
/*Add Child Theme Responsive CSS
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts', 'new_adapt_enqueue_css');
function new_adapt_enqueue_css() {
	
	//responsive
	wp_enqueue_style('new_responsive', get_stylesheet_directory_uri() . '/css/responsive.css', 'style');
	
}

/*-----------------------------------------------------------------------------------*/
/*Add Custom JS
/*-----------------------------------------------------------------------------------*/


function my_scripts_method() {
	wp_enqueue_script(
		'site',
		get_stylesheet_directory_uri() . '/js/site.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
	




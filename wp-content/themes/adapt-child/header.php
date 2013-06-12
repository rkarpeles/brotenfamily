<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
$options = get_option( 'adapt_theme_settings' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<!-- Block search engines from indexing pages and following links -->
<meta name="robots" content="noindex, nofollow" />
<?php header("X-Robots-Tag: noindex, nofollow", true); ?>


<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Google Web Font -->
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Playfair+Display+SC:400,700|Open+Sans:300italic,400' rel='stylesheet' type='text/css'>

<!-- Mobile Specific
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Title Tag
================================================== -->
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    
<?php if(!empty($options['favicon'])) { ?>
<!-- Favicon
================================================== -->
<link rel="icon" type="image/png" href="<?php echo $options['favicon']; ?>" />
<?php } ?>

<!-- Main CSS
================================================== -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />


<!-- Load HTML5 dependancies for IE
================================================== -->
<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
	<script src="js/IE8.js" type="text/javascript"></script><![endif]-->
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/>
<![endif]-->


<!-- WP Head
================================================== -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<!--Full page background image style comes from here: 
http://css-tricks.com/perfect-full-page-background-image/-->
<div id="background">
	<img src="http://localhost/brotenfamily/wp-content/themes/adapt-child/images/bg-desert.jpg">
</div>

<div id="wrap" class="clearfix">

    <header id="masterhead" class="clearfix">
			
			<a href="<?php bloginfo('url'); ?>">
			<div id="logo"></div>
			</a>
            <!-- END logo -->
			
			<div class="verse">
				Delight yourself in the LORD, and He<br> will give you the desires of your heart.<br>
				<span class="reference">Psalm 37:4</span>
			</div>
            
            <nav id="masternav" class="clear clearfix">
                <?php wp_nav_menu( array(
                    'theme_location' => 'menu',
                    'sort_column' => 'menu_order',
                    'menu_class' => 'sf-menu',
                    'fallback_cb' => 'default_menu'
                )); ?>
            </nav>
            <!-- /masternav -->      
    </header><!-- /masterhead -->
    
<div id="main" class="clearfix">
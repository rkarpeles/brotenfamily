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

<!-- Load HTML5 dependancies for IE
================================================== -->
<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
	<script src="js/IE8.js" type="text/javascript"></script><![endif]-->
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/>
<![endif]-->

<!-- Fitvids Script to allow scalable videos 
================================================== -->
<script>
  jQuery(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    jQuery('#wrap').fitVids();
  });
</script>

<!-- WP Head
================================================== -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<!--Full page background image style comes from here: 
http://css-tricks.com/perfect-full-page-background-image/-->
<div id="background">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bg-desert.jpg">
</div>

<div id="wrap" class="clearfix">

    <header id="masterhead" class="clearfix">
			
			<a href="<?php bloginfo('url'); ?>">
			<div class="logo-wrap">
				<div id="logo"></div>
			</div>
			</a>
            <!-- END logo -->
			
			<div class="verse-wrap">			
				<div class="verse">
					Delight yourself in the LORD, and He<br class="hide-mobile"> will give you the desires of your heart.<br>
					<span class="reference">Psalm 37:4</span>
				</div>
				<div class="verse-image"></div>	
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
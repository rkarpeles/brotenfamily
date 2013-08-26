<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 Template Name: Subscribe
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<header id="page-heading">
    <h1><?php the_title(); ?></h1>		
</header>
<!-- /page-heading -->

<article class="post clearfix">
    <div class="entry clearfix">	
    	<?php the_content(); ?> 
		<!-- Begin MailChimp Signup Form -->
		<div id="mc_embed_signup">
		<form action="http://blogspot.us4.list-manage1.com/subscribe/post?u=decb31bb06d4c512a2c27ade3&amp;id=0113afb6bc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>	
		<p><strong>Fill out the form below and click "Subscribe":</strong></p>
		<div class="mc-field-group">
			<label for="mce-EMAIL">Email Address <em>(required)</em></label><br>
			<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
		</div>
		<div class="mc-field-group">
			<label for="mce-FNAME">First Name</label><br>
			<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
		</div>
		<div class="mc-field-group">
			<label for="mce-LNAME">Last Name</label><br>
			<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
		</div>
		<div id="mce-responses" class="clear">
			<div class="response" id="mce-error-response" style="display:none"></div>
			<div class="response" id="mce-success-response" style="display:none"></div>
		</div>	
		<div class="clear">
			<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
		</div>
		</form>
		</div>			
		<!--End mc_embed_signup-->
	</div>
	<!-- /entry --> 
</article>
<!-- /post -->


<?php endwhile; ?>
<?php endif; ?>	  
<?php get_sidebar(); ?>
<?php get_footer(); ?>
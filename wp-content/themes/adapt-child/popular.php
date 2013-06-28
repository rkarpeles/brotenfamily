<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 * Template Name: Popular Posts
 */
?>
<?php get_header(); ?>


<header id="page-heading">
    <h1><?php the_title(); ?></h1>		
</header>
<!-- /page-heading -->

<article class="post clearfix">
    <div class="entry clearfix">	
    	<?php 
		$popularpost = new WP_Query( array( 'posts_per_page' => 10, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
		while ( $popularpost->have_posts() ) : $popularpost->the_post();

		get_template_part('content-popular');

		endwhile;
		?>
	</div>
	<!-- /entry -->    
</article>
<!-- /content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
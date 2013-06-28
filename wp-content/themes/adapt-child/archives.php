<?php
/*
Template Name: Archives
*/
get_header(); ?>


<header id="page-heading">
    <h1><?php the_title(); ?></h1>		
</header>
<!-- /page-heading -->

<article class="post clearfix">
    <div class="entry clearfix">	
    	<?php the_post(); ?>
		
		<h2>Archives by Month:</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>		
		
		<h2>Archives by Subject:</h2>
		<ul>
			 <?php wp_list_categories('title_li='); ?>
		</ul>
	</div>
	<!-- /entry -->    
</article>
<!-- /post -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
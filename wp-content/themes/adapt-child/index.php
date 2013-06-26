<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 */
$options = get_option( 'adapt_theme_settings' );
?>
<?php get_header(); ?>

<div class="home-wrap clearfix">
    
    <!-- Homepage tagline -->
    <?php if(get_bloginfo('description')) { ?>
    <aside id="home-tagline">
    	<?php echo bloginfo('description'); ?>
    </aside>
    <!-- /home-tagline -->
    <?php } ?>
    
    <!-- /Homepage Slider -->
    <?php get_template_part( 'includes/slides' ); ?> 

    
    <!-- Recent Blog Posts -->
    <?php
    //get post type ==> regular posts
        global $post;
        $args = array(
            'post_type' =>'post',
            'numberposts' => '3'
        );
        $blog_posts = get_posts($args);
    ?>
    <?php if($blog_posts) { ?>        
        <div id="home-posts" class="clearfix">
		    <div class="home-heading-bg"></div>
			<div class="view-posts"><a href="blog">View all &raquo;</a></div>
			<h2 class="heading"><span><?php if(!empty($options['recent_work_text'])) { echo $options['recent_news_text']; } else { _e('Recent Posts','adapt'); }?></span></h2>			
            <?php
            $count=0;
            foreach($blog_posts as $post) : setup_postdata($post);
            $count++;
            //get portfolio thumbnail
            $feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'home-feature');
            ?>
            
            
            <div class="home-entry <?php if($count == '3') { echo 'remove-margin'; } if($count == '3') { echo ' responsive-clear'; } ?>">
            	<?php if ($feat_img) {  ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $feat_img[0]; ?>" height="<?php echo $feat_img[2]; ?>" width="<?php echo $feat_img[1]; ?>" alt="<?php echo the_title(); ?>" /></a>
                <?php } ?>
                <div class="home-entry-description">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a></h3>
                    <div class="home-date"><?php the_time('M'); ?> <?php the_time('j'); ?>, <?php the_time('Y'); ?></div>
                </div> 
                <!-- /home-entry-description -->
            </div>
            <!-- /home-entry-->
            <?php
            if($count == '3') { echo '<div class="clear"></div>'; $count=0; }
            endforeach; ?>
        </div>
        <!-- /home-posts -->      	
    <?php } ?>
	
	<hr>
	
	<div class="site-stats">
		<div class="home-heading-bg-2"></div>
		<h2 class="heading"><span>Site Stats</span></h2>
		<div class="site-stats-container">			
			<p>Some stats go here.</p>
		</div>			
	</div>
	
			
	<!--Book List-->		
	<div class="book-list">			
		<h2 class="alt-heading alt-font">What We&rsquo;re Reading</h2>
		<div class="book-list-content">
		<?php
		//get post type ==> portfolio
			global $post;
			$args = array(
				'post_type' =>'portfolio',
				'numberposts' => '3'
			);
			$portfolio_posts = get_posts($args);
		?>
		<?php if($portfolio_posts) { ?>        
			<section id="home-projects" class="clearfix">
				<?php
				$count=0;
				foreach($portfolio_posts as $post) : setup_postdata($post);
				$count++;
				//get portfolio thumbnail
				$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'bookshelf');
				?>
				
				<?php if ($feat_img) {  ?>
				<div class="portfolio-item <?php if($count == '3') { echo 'remove-margin'; } if($count == '2') { echo ' responsive-clear'; } ?>">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $feat_img[0]; ?>" height="<?php echo $feat_img[2]; ?>" width="<?php echo $feat_img[1]; ?>" alt="<?php echo the_title(); ?>" />
					<div class="book-title">
						<?php echo the_title(); ?>
					</div>
					</a>					
					<span class="author-byline">by</span> 
					<div class="book-author"><?php the_excerpt(); ?></div>
				</div>
				<!-- /portfolio-item -->
				<?php } ?>
				
				<?php
				if($count == '3') { echo '<div class="clear"></div>'; $count=0; }
				endforeach; ?>
			</section>
			<!-- /home-projects -->      	
		<?php } ?>
		</div>			
	</div>

</div>
<!-- END home-wrap -->   
<?php get_footer(); ?>
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
        <section id="home-posts" class="clearfix">
		    <div class="home-heading-bg"></div>
			<div class="view-posts"><a href="blog">View all &raquo;</a></div>
			<h2 class="heading"><span><?php if(!empty($options['recent_work_text'])) { echo $options['recent_news_text']; } else { _e('Recent Posts','adapt'); }?></span></h2>			
            <?php
            $count=0;
            foreach($blog_posts as $post) : setup_postdata($post);
            $count++;
            //get portfolio thumbnail
            $feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 300, 144);
            ?>
            
            
            <article class="home-entry <?php if($count == '3') { echo 'remove-margin'; } if($count == '3') { echo ' responsive-clear'; } ?>">
            	<?php if ($feat_img) {  ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $feat_img[0]; ?>" height="<?php echo $feat_img[2]; ?>" width="<?php echo $feat_img[1]; ?>" alt="<?php echo the_title(); ?>" /></a>
                <?php } ?>
                <div class="home-entry-description">
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo the_title(); ?></a></h3>
                    <div class="home-date"><?php the_time('M'); ?> <?php the_time('j'); ?>, <?php the_time('Y'); ?></div>
                </div> 
                <!-- /home-entry-description -->
            </article>
            <!-- /home-entry-->
            <?php
            if($count == '3') { echo '<div class="clear"></div>'; $count=0; }
            endforeach; ?>
        </section>
        <!-- /home-posts -->      	
    <?php } ?>
		
		<div class="site-stats">
			<div class="home-heading-bg"></div>
			<h2 class="heading"><span>Site Stats</span></h2>
			
			
		</div>
		

</div>
<!-- END home-wrap -->   
<?php get_footer(); ?>
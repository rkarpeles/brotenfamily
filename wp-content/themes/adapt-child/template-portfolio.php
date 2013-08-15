<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 * Template Name: Portfolio
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<header id="page-heading" class="clearfix">
	<h1><?php the_title(); ?></h1>	
    <?php 
		//get portfolio categories
		$cats = get_terms('portfolio_cats');
		//show filter if categories exist
		if($cats[0]) { ?>
        
        <!-- Portfolio Filter -->
		<div id="options">
			<ul id="portfolio-cats filters" class="option-set filter clearfix" data-option-key="filter">
				<li><a href="#filter=*"><span><?php _e('All', 'wpex'); ?></span></a></li>
				<?php
				foreach ($cats as $cat ) : ?>
				<li><a href="#filter=.<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></li>
				<?php endforeach; ?>
			</ul><!-- /portfolio-cats -->
		</div>
	<?php } ?>	 
</header><!-- /page-heading -->
    
<div class="post full-width clearfix">

    <div id="portfolio-wrap" class="clearfix">
    	<div class="portfolio-content">
			<?php
            //get post type ==> portfolio
            query_posts(array(
                'post_type'=>'portfolio',
                'posts_per_page' => -1,
                'paged'=>$paged
            ));
            ?>
        
            <?php
			$count=0;
            while (have_posts()) : the_post();
			$count++;
			
            //get portfolio thumbnail
            $thumbail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'grid-thumb');
			
            //get terms
            $terms = get_the_terms( get_the_ID(), 'portfolio_cats' );
            
			//show item if thumbnail is defined
			if ( has_post_thumbnail() ) {  ?>
            <article class="element portfolio-item <?php if($terms) foreach ($terms as $term) echo $term->slug .' '; ?>">
            	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                	<img src="<?php echo $thumbail[0]; ?>" height="<?php echo $thumbail[2]; ?>" width="<?php echo $thumbail[1]; ?>" alt="<?php echo the_title(); ?>" />
            		<div class="portfolio-overlay"><h3><?php echo the_title(); ?></h3></div><!-- portfolio-overlay -->
            	</a>
            </article>
            <?php } endwhile; ?>
		</div><!-- /portfolio-content -->
    </div><!-- /portfolio-wrap -->
    
	<?php wp_reset_query(); ?>

</div><!-- /post full-width -->

<script src="http://www.veloce.co.uk/digital/resources/code/jquery-1.8.3.min.js"></script>
<script src="http://www.veloce.co.uk/digital/resources/code/jquery.isotope.min.js"></script>
<script src="http://www.kevin-atkins.co.uk/isotope/jquery.ba-bbq.min.js"></script>
  <script>
    $(function(){
  
      var $container = $('#portfolio-wrap'),
          // object that will keep track of options
          isotopeOptions = {},
          // defaults, used if not explicitly set in hash
          defaultOptions = {
            filter: '*',
            sortBy: 'original-order',
            sortAscending: true,
            layoutMode: 'fitRows'
          };

      
      // add randomish size classes
      $container.find('.element').each(function(){
        var $this = $(this),
            number = parseInt( $this.find('.number').text(), 10 );
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
  
      var setupOptions = $.extend( {}, defaultOptions, {
        itemSelector : '.element',
        fitRows : {
          columnWidth : 120
        },
        cellsByRow : {
          columnWidth : 240,
          rowHeight : 240
        },
        getSortData : {
          symbol : function( $elem ) {
            return $elem.attr('data-symbol');
          },
          category : function( $elem ) {
            return $elem.attr('data-category');
          },
          number : function( $elem ) {
            return parseInt( $elem.find('.number').text(), 10 );
          },
          weight : function( $elem ) {
            return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
          },
          name : function ( $elem ) {
            return $elem.find('.name').text();
          }
        }
      });
  
      // set up Isotope
      $container.isotope( setupOptions );
  
      var $optionSets = $('#options').find('.option-set'),
          isOptionLinkClicked = false;
  
      // switches selected class on buttons
      function changeSelectedLink( $elem ) {
        // remove selected class on previous item
        $elem.parents('.option-set').find('.selected').removeClass('selected');
        // set selected class on new item
        $elem.addClass('selected');
      }
  
  
      $optionSets.find('a').click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return;
        }
        changeSelectedLink( $this );
            // get href attr, remove leading #
        var href = $this.attr('href').replace( /^#/, '' ),
            // convert href into object
            // i.e. 'filter=.inner-transition' -> { filter: '.inner-transition' }
            option = $.deparam( href, true );
        // apply new option to previous
        $.extend( isotopeOptions, option );
        // set hash, triggers hashchange on window
        $.bbq.pushState( isotopeOptions );
        isOptionLinkClicked = true;
        return false;
      });

      var hashChanged = false;

      $(window).bind( 'hashchange', function( event ){
        // get options object from hash
        var hashOptions = window.location.hash ? $.deparam.fragment( window.location.hash, true ) : {},
            // do not animate first call
            aniEngine = hashChanged ? 'best-available' : 'none',
            // apply defaults where no option was specified
            options = $.extend( {}, defaultOptions, hashOptions, { animationEngine: aniEngine } );
        // apply options from hash
        $container.isotope( options );
        // save options
        isotopeOptions = hashOptions;
    
        // if option link was not clicked
        // then we'll need to update selected links
        if ( !isOptionLinkClicked ) {
          // iterate over options
          var hrefObj, hrefValue, $selectedLink;
          for ( var key in options ) {
            hrefObj = {};
            hrefObj[ key ] = options[ key ];
            // convert object into parameter string
            // i.e. { filter: '.inner-transition' } -> 'filter=.inner-transition'
            hrefValue = $.param( hrefObj );
            // get matching link
            $selectedLink = $optionSets.find('a[href="#' + hrefValue + '"]');
            changeSelectedLink( $selectedLink );
          }
        }
    
        isOptionLinkClicked = false;
        hashChanged = true;
      })
        // trigger hashchange to capture any hash data on init
        .trigger('hashchange');

    });
  </script>


<?php
endwhile;
endif;
get_footer(); ?>
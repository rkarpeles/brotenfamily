<?php
/**
 * @package WordPress
 * @subpackage Adapt Theme
 * Template Name: Portfolio
 */
?>

<script>
	// filter items when filter link is clicked
		$('.filter a').click(function(){
			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});

		// Set cookie based on filter selector
		$('.cookiefilter a').click(function(){
			var selector = $(this).attr('data-filter');
			$.cookie("listfilter", selector, { path: '/' });
		});
		
		if ( $.cookie("listfilter") ) {
			$container.isotope({ filter: $.cookie("listfilter") });
			$.cookie("listfilter", null, { path: '/' });
			return false;
		}
</script>




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
        <ul id="portfolio-cats" class="filter clearfix">
            <li><a href="#" class="active" data-filter="*"><span><?php _e('All', 'wpex'); ?></span></a></li>
            <?php
            foreach ($cats as $cat ) : ?>
            <li><a href="#filter=.<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></li>
            <?php endforeach; ?>
        </ul><!-- /portfolio-cats -->
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
            <article class="portfolio-item <?php if($terms) foreach ($terms as $term) echo $term->slug .' '; ?>">
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



<div id="container" class="clearfix"  >

<div class="element ebook bio cars   ">
<img src="../resources/thumbs/9781845845551_thumb.png" width="97" height="125" class="thumb">
<h2 class="name">Alfa Mail – Open letters from a part-time petrol head</h2>
<p class="number" style="display:none;">54</p>
</div>

<div class="element ebook tuning cars speedpro   ">	
<img src="../resources/thumbs/9781845845476_thumb.png" width="103" height="125" class="thumb">
<h2 class="name">Alfa Romeo DOHC High-performance Manual</h2>
<p class="number" style="display:none;">55</p>
</div>

<div class="element ebook mosport cars   ">    	
<img src="../resources/thumbs/9781845844790_thumb.png" width="101" height="125" class="thumb">
<h2 class="name">Anatomy of the Works Minis</h2>
<p class="number" style="display:none;">59</p>
</div>       

<div class="element ebook bio cars   ">    	
<img src="../resources/thumbs/9781845844646_thumb.png" width="90" height="125" class="thumb">
<h2 class="name">André Lefebvre, and the cars he created at Voisin and Citroën</h2>
<p class="number" style="display:none;">4</p>
</div>     

<div class="element ebook animals ref   ">    	
<img src="../resources/thumbs/9781845844684_thumb.png" width="122" height="125" class="thumb">
<h2 class="name">Animal Grief – How animals mourn</h2>
<p class="number" style="display:none;">19</p>
</div>     

<div class="element ebook cars maintenance ref handbook  ">
<img src="../resources/thumbs/9781845845018_thumb.png" width="88" height="125" class="thumb">
<h2 class="name">Caring for your car – How to maintain & service your car</h2>
<p class="number" style="display:none;">36</p>
</div>

<div class="element ebook cars maintenance ref handbook  ">
<img src="../resources/thumbs/9781845845438_thumb.png" width="91" height="125" class="thumb">
<h2 class="name">Caring for your car's bodywork and interior<</h2>
<p class="number" style="display:none;">44</p>
</div>

<div class="element ebook bikes maintenance ref handbook   ">
<img src="../resources/thumbs/9781845844974_thumb.png" width="88" height="125" class="thumb">
<h2 class="name">Caring for your scooter</h2>
<p class="number" style="display:none;">26</p>
</div>

<div class="element ebook animals   ">
<img src="../resources/thumbs/9781845844363_thumb.png" width="96" height="125" class="thumb">
<h2 class="name">Clever Dog!</h2>
<p class="number" style="display:none;">1</p>
</div>

<div class="element ebook cars mosport   ">    	
<img src="../resources/thumbs/9781845845100_thumb.png" width="96" height="125" class="thumb">
<h2 class="name">Coventry Climax Racing Engines – The definitive development history</h2>
<p class="number" style="display:none;">40</p>
</div>

<div class="element ebook animals bio    ">    	
<img src="../resources/thumbs/9781845844691_thumb.png" width="96" height="125" class="thumb">
<h2 class="name">Dieting with my dog</h2>
<p class="number" style="display:none;">10</p>
</div>

<div class="element ebook bikes   ">    	
<img src="../resources/thumbs/9781845845483_thumb.png" width="103" height="125" class="thumb">
<h2 class="name">The Ducati 860, 900 and Mille Bible</h2>
<p class="number" style="display:none;">64</p>
</div>

<div class="element ebook bikes bio   ">    	
<img src="../resources/thumbs/9781845845056_thumb.png" width="103" height="125" class="thumb">
<h2 class="name">Edward Turner – The man behind the motorcycles</h2>
<p class="number" style="display:none;">31</p>
</div>

<div class="element ebook cars ref handbook  ">    	
<img src="../resources/thumbs/9781845844998_thumb.png" width="88" height="125" class="thumb">
<h2 class="name">The Efficient Driver's Handbook – Your guide to fuel efficient driving techniques and car choice</h2>
<p class="number" style="display:none;">33</p>
</div>

<div class="element ebook cars handbook  ">    	
<img src="../resources/thumbs/9781845844981_thumb.png" width="88" height="125" class="thumb">
<h2 class="name">Electric Cars – The Future is Now!</h2>
<p class="number" style="display:none;">34</p>
</div>

<div class="element ebook cars mosport wsc   ">    	
<a href="../ebooks/eV4484.html"><img src="../resources/thumbs/9781845844844_thumb.png" width="131" height="125" class="thumb"></a>
<h2 class="name">Ferrari 312P & 312PB</h2>
<p class="number" style="display:none;">18</p>
</div> 


<div class="element ebook tuning cars speedpro">
<img src="../resources/thumbs/9781845844639_thumb.png" width="103" height="125" class="thumb">
<h2 class="name">The Ford SOHC Pinto & Sierra Cosworth DOHC Engines high-peformance manual</h2>
<p class="number" style="display:none;">3</p>
</div>

<div class="element ebook bikes">
<img src="../resources/thumbs/9781845844806_thumb.png" width="103" height="125" class="thumb">
<h2 class="name">Funky Mopeds! – The 1970s Sports Moped phenomenon</h2>
<p class="number" style="display:none;">17</p>
</div>
 
<div class="element ebook mosport cars">
<img src="../resources/thumbs/9781845845063_thumb.png" width="104" height="125" class="thumb">
<h2 class="name">Hillclimbing & Sprinting – The Essential Manual</h2>
<p class="number" style="display:none;">42</p>
</div>

 


  </div> <!-- #container -->

<!-- VERY IMPORTANT TO LEAVE THESE LINKS HERE AND HERE ONLY -->
  <script src="http://www.veloce.co.uk/digital/resources/code/jquery-1.8.3.min.js"></script>
  <script src="http://www.veloce.co.uk/digital/resources/code/jquery.isotope.min.js"></script>
  <script src="http://www.kevin-atkins.co.uk/isotope/jquery.ba-bbq.min.js"></script>
  <script>
    $(function(){
  
      var $container = $('#container'),
          // object that will keep track of options
          isotopeOptions = {},
          // defaults, used if not explicitly set in hash
          defaultOptions = {
            filter: '*',
            sortBy: 'original-order',
            sortAscending: true,
            layoutMode: 'masonry'
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
        masonry : {
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
  

    
   
    
  </section> <!-- #content -->

<?php
endwhile;
endif;
get_footer(); ?>
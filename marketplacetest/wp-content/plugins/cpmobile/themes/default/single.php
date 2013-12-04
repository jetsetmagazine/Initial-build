<?php 
	echo "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>\n"; 		
	
	global $is_ajax;
	$is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']); 
	if (!$is_ajax) get_header(); 

	$cpmobile_settings = cp_cpmobile_get_settings(); 
	
	
	if ( get_post_meta($post->ID, 'location', true) )
        $address = get_post_meta($post->ID, 'location', true);
    else
		$address = get_post_meta($post->ID, 'cp_street', true) . '&nbsp;' . get_post_meta($post->ID, 'cp_city', true) . '&nbsp;' . get_post_meta($post->ID, 'cp_state', true) . '&nbsp;' . get_post_meta($post->ID, 'cp_zipcode', true);
		
	$coordinates = cp_get_geocode($post->ID);
	
?>

<script type="text/javascript">	
	
	var address = "<?php echo esc_js($address); ?>";
	var map=null;
	var contentString = '<div class=h2><span><?php esc_js(the_title()); ?></span><br />Address: ' + address + '</div>';
	
	<?php 
		if(!empty($coordinates) && is_array($coordinates)) {
			echo 'var SavedLatLng = new google.maps.LatLng('.$coordinates['lat'].', '.$coordinates['lng'].');';
			$location_by = "'latLng':SavedLatLng";
			$marker_position = "SavedLatLng";
		} else {
			$location_by = "'address': address";
			$marker_position = "results[0].geometry.location";
		}
	?>
		
	function codeAddress() {
        
		var mapOptions = {
				zoom: 8,
				center: new google.maps.LatLng(40.69847032728747, -73.9514422416687),
				maxZoom: 14,
				zoom:14,
				mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		
		map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		geocoder = new google.maps.Geocoder();
		geocoder.geocode( { <?php echo $location_by; ?> }, function(results, status) 
		{
          if (status == google.maps.GeocoderStatus.OK) 
		  {
            map.setCenter();

            var marker = new google.maps.Marker({
                map: map,
                //title: title,
                icon: '<?php echo get_stylesheet_directory_uri() ?>/images/map_cluster.png',
                //animation: google.maps.Animation.DROP,
                position: <?php echo $marker_position; ?>
            });
            
            map.setCenter(results[0].geometry.location);
			/*
            var infowindow = new google.maps.InfoWindow({
                maxWidth: 270,
                content: contentString,
                disableAutoPan: false
            });

            infowindow.open(map, marker);

            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map,marker);
            });
*/
          }else 
           jQuery("#map_canvas").html("Geocode was not successful for the following reason: " + status);
          
        });
      }
	
	
</script>

<div class="content single" id="content<?php echo md5($_SERVER['REQUEST_URI']); ?>">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <div class="post">
        <div class="rb_inside" id="single">
			    <a class="sh2" href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( "Permanent Link to ", "cpmobile" ); ?><?php if (function_exists('the_title_attribute')) the_title_attribute(); else the_title(); ?>"><?php the_title(); ?></a>
			<div class="price-wrap2">
			    <p class="post-price"><?php cp_get_price($post->ID, 'cp_price'); ?></p>
			</div>
            
            
        
                    
			<div class="single-post-meta-top">
				<p>
<br />
                <ul>
				<?php 
				$cat_id = cp_get_custom_taxonomy( $post->ID, APP_TAX_CAT, 'term_id' );
                        // 3.0+ display the custom fields instead (but not text areas)
                        cp_get_ad_details2( $post->ID, $cat_id); 
                    ?>
				
					<li id="cp_listed"><span><?php _e('Listed:', 'classipro') ?></span> <?php the_time( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ) ?></li>    
                <?php if ( get_post_meta($post->ID, 'cp_sys_expire_date', true) ) ?>
                    <li id="cp_expires"><span><?php _e( 'Expires:', 'classipro' ) ?></span> <?php echo cp_timeleft( strtotime( get_post_meta( $post->ID, 'cp_sys_expire_date', true) ) ); ?></li>
            
				</ul>
				
				</p>
                <p class="single_date">
				Posted on <span><?php echo get_the_time('M jS, Y') ?></span> by <span><?php the_author() ?></span>
                </p>
			</div>
        </div><!-- rb_inside -->
	</div><!-- post -->
	
	<div id="thumbs-pic" class="post">
        <div style="text-align:center;" class="rb_inside" id="single">
			<?php cp_get_image_url_single( $post->ID, 'medium', $post->post_title, -1 ); ?>
			<div class="clr"></div>
        </div><!-- rb_inside -->
	</div><!-- post -->
    
		<div class="clearer"></div>
			<?php cpmobile_include_ads(); ?>

 <div class="post" id="post-<?php the_ID(); ?>">
        <div class="rb_inside" id="single">
     		<div id="singlentry" class="<?php echo $cpmobile_settings['style-text-justify']; ?>">
			<p class="single_title">Description:</p>
           		<?php the_content(); ?>				
	       	</div>
        </div><!-- rb_inside -->
	</div><!-- post -->  
	
<div class="post">
        <div class="rb_inside" id="single">
			<p class="single_title">Map:</p>
		<div id="map_canvas"></div>
        </div><!-- rb_inside -->
	</div><!-- post -->
	
<!-- Categories and Tags post footer -->        
			<div class="single-post-meta-bottom">
				<?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Article Pages", "cpmobile-pro" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;' ); ?>          
			    <?php //if (function_exists('get_the_tags')) the_tags('<br />' . __( 'Tags', 'cpmobile' ) . ': ', ', ', ''); ?>  
		    </div>   

		<ul id="post-options">
		<?php $prevPost = get_previous_post(); if ($prevPost) { ?>
			<li><a href="<?php $prevPost = get_previous_post(false); $prevURL = get_permalink($prevPost->ID); echo $prevURL; ?>" id="oprev"></a></li>
		<?php } ?>
		<li><a href="mailto:<?php the_author_email(); ?>?subject=<?php _e( "Contact request about the Ad - ", "cpmobile" ); the_title_attribute();?>&body=<?php _e( "Question about the Ad:", "classipro" ); ?>%20<?php the_permalink() ?>" onclick="return confirm('Do you want to contact the author by email?');" id="omail" title="Contact the author"></a></li>
		<?php cpmobile_twitter_link(); ?>
		<?php cpmobile_facebook_link(); ?>
		<?php $nextPost = get_next_post(); if ($nextPost) { ?>
			<li><a href="<?php $nextPost = get_next_post(false); $nextURL = get_permalink($nextPost->ID); echo $nextURL; ?>" id="onext"></a></li>
		<?php } ?>
		</ul>    </div>


<?php
	//include('includes/forms/contact/index.php'); 
?>

<!-- Let's rock the comments -->
<?php if ( cp_can_show_comments() ) : ?>
	<?php 
	comments_template(); 
	?>
<script type="text/javascript">
jQuery(document).ready( function() {
	
	// Ajaxify '#contactform'
	/*
	var ctc_formoptions = { 
	beforeSubmit: function() {$wpt("#loading").fadeIn(400);},
	success:  function() {
		$wpt("#contactform").hide();
		$wpt("#loading").fadeOut(400);
		$wpt("#refresher").fadeIn(400);
		}, // end success 
	error:  function() {
		$wpt('#errors').show();
		$wpt("#loading").fadeOut(400);
		} //end error
	} 	//end options
$wpt('#contactform').ajaxForm(ctc_formoptions);
*/
	// Ajaxify '#commentform'
	var formoptions = { 
	beforeSubmit: function() {$wpt("#loading").fadeIn(400);},
	success:  function() {
		$wpt("#commentform").hide();
		$wpt("#loading").fadeOut(400);
		$wpt("#refresher").fadeIn(400);
		}, // end success 
	error:  function() {
		$wpt('#errors').show();
		$wpt("#loading").fadeOut(400);
		} //end error
	} 	//end options
$wpt('#commentform').ajaxForm(formoptions);
});
</script>
<?php endif; ?>
<script type="text/javascript">codeAddress();</script>
	<?php endwhile; else : ?>

<!-- Dynamic test for what page this is. A little redundant, but so what? -->

	<div class="result-text-footer">
		<?php cpmobile_core_else_text(); ?>
	</div>

	<?php endif; ?>
</div>
	
	<!-- Do the footer things -->
	
<?php global $is_ajax; if (!$is_ajax) get_footer();
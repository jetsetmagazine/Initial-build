<?php 
	echo "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>\n"; 
	global $is_ajax;
	$is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']); 
	if (!$is_ajax) get_header(); 

	$wptouch_settings = bnc_wptouch_get_settings(); 
	
	if ( get_post_meta($post->ID, 'location', true) )
        $address = get_post_meta($post->ID, 'location', true);
    else
		$address = get_post_meta($post->ID, 'cp_street', true) . '&nbsp;' . get_post_meta($post->ID, 'cp_city', true) . '&nbsp;' . get_post_meta($post->ID, 'cp_state', true) . '&nbsp;' . get_post_meta($post->ID, 'cp_zipcode', true);
?>

<script type="text/javascript">	
	var address = "<?php echo esc_js($address); ?>";
	
	function geocode_ad()
	{
		var mapOptions = {
			zoom: 8,
			center: new google.maps.LatLng(-34.397, 150.644),
			maxZoom: 14,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				 map.fitBounds(new google.maps.LatLngBounds().extend(results[0].geometry.location));
				 var marker = new google.maps.Marker({
				  map: map,
				  position: results[0].geometry.location
				});  
			} 
			else 
			  jQuery("#map_canvas").html("Geocode was not successful for the following reason: " + status);
        
      });
	}
</script>


<div class="content single" id="content<?php echo md5($_SERVER['REQUEST_URI']); ?>">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post">
        <div class="rb_inside" id="single">
			    <a class="sh2" href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( "Permanent Link to ", "wptouch" ); ?><?php if (function_exists('the_title_attribute')) the_title_attribute(); else the_title(); ?>"><?php the_title(); ?></a>
			<div class="price-wrap">
			    <p class="post-price"><?php cp_get_price($post->ID, 'cp_price'); ?></p>
			</div>
                    
			<div class="single-post-meta-top">
				<p>
			   	<?php _e( "Category", "wptouch" ); ?>: 
				<?php if ( get_the_category() ) the_category(', '); else echo get_the_term_list( $post->ID, APP_TAX_CAT, '', ', ', '' ); ?>
                    
				<ul>
				<?php cp_get_ad_details( $post->ID, $cat_id, 'list'); ?>
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
        <div class="rb_inside" id="single">
			<p class="single_title">Ad Pictures:</p>
			<?php cp_get_image_url_single( $post->ID, 'medium', $post->post_title, -1 ); ?>
			<div class="clr"></div>
        </div><!-- rb_inside -->
	</div><!-- post -->
    
		<div class="clearer"></div>
			<?php wptouch_include_adsense(); ?>

     <div class="post" id="post-<?php the_ID(); ?>">
        <div class="rb_inside" id="single">
     		<div id="singlentry" class="<?php echo $wptouch_settings['style-text-justify']; ?>">
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
				<?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Article Pages", "wptouch-pro" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;' ); ?>          
			    <?php //if (function_exists('get_the_tags')) the_tags('<br />' . __( 'Tags', 'wptouch' ) . ': ', ', ', ''); ?>  
		    </div>   

		<ul id="post-options">
		<?php $prevPost = get_previous_post(); if ($prevPost) { ?>
			<li><a href="<?php $prevPost = get_previous_post(false); $prevURL = get_permalink($prevPost->ID); echo $prevURL; ?>" id="oprev"></a></li>
		<?php } ?>
		<li><a href="mailto:<?php the_author_email(); ?>?subject=<?php _e( "Contact request about the Ad - ", "wptouch" ); the_title_attribute();?>&body=<?php _e( "Question about the Ad:", "classipro" ); ?>%20<?php the_permalink() ?>" onclick="return confirm('Do you want to contact the author by email?');" id="omail" title="Contact the author"></a></li>
		<?php wptouch_twitter_link(); ?>
		<?php wptouch_facebook_link(); ?>
		<?php $nextPost = get_next_post(); if ($nextPost) { ?>
			<li><a href="<?php $nextPost = get_next_post(false); $nextURL = get_permalink($nextPost->ID); echo $nextURL; ?>" id="onext"></a></li>
		<?php } ?>
		</ul>
    </div>


<!-- Let's rock the comments -->
<?php if ( bnc_can_show_comments() ) : ?>
	<?php comments_template(); ?>
<script type="text/javascript">
jQuery(document).ready( function() {
geocode_ad();
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
}); //End onReady
</script>
<?php endif; ?>
	<?php endwhile; else : ?>

<!-- Dynamic test for what page this is. A little redundant, but so what? -->

	<div class="result-text-footer">
		<?php wptouch_core_else_text(); ?>
	</div>

	<?php endif; ?>
</div>
	
	<!-- Do the footer things -->
	
<?php 
global $is_ajax; 
if (!$is_ajax) 
	get_footer();
?>
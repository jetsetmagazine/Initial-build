<?php 
	global $is_ajax;
	$is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']);
	if (!$is_ajax) get_header();
	$cpmobile_settings = cp_cpmobile_get_settings(); 
?>

<div class="content" id="content<?php echo md5($_SERVER['REQUEST_URI']); ?>">
 		
	<div class="result-text"><?php cpmobile_core_body_result_text(); ?></div>
<?php 
	if (is_home() && $cpmobile_plugin->desired_view == 'mobile')
	{
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		query_posts( array('post_type' => 'ad_listing', 'ignore_sticky_posts' => 1,'paged' => $paged) );
	}
 ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
    <div class="post" id="post-<?php the_ID(); ?>">
	<?php if ( ! is_single() && is_sticky() ) { ?>
    <div class="rb_inside" id="featured">
    <?php } else { ?>
    <div class="rb_inside">
    <?php } ?>
	
			<?php if ( ! is_single() && is_sticky() && $cpmobile_settings['post-cal-thumb'] == 'nothing-shown' ) echo '<div class="sticky-icon-none"></div>'; ?>
			<?php if ( ! is_single() && is_sticky() && $cpmobile_settings['post-cal-thumb'] != 'nothing-shown' ) echo '<div class="sticky-icon"></div>'; ?>

 		<?php if (!function_exists('dsq_comments_template') && !function_exists('id_comments_template')) { ?>
				<?php if (cpmobile_get_comment_count() && !is_archive() && !is_search() && cp_can_show_comments() ) { ?>
					<div class="<?php if ($cpmobile_settings['post-cal-thumb'] == 'nothing-shown') { echo 'nothing-shown ';} ?>comment-bubble<?php if ( cpmobile_get_comment_count() > 99 ) echo '-big'; ?>">
						<?php comments_number('0','1','%'); ?>
					</div>
				<?php } ?>
		<?php } ?>
 	
				<?php if (cp_excerpt_enabled()) { ?>
				<script type="text/javascript">
					$wpt(document).ready(function(){
						$wpt("a#arrow-<?php the_ID(); ?>").bind( touchStartOrClick, function(e) {
							$wpt(this).toggleClass("post-arrow-down");
							$wpt('#entry-<?php the_ID(); ?>').cpmobileFadeToggle(500);
						});	
					 });					
				</script>
					<a class="post-arrow" id="arrow-<?php the_ID(); ?>" href="javascript: return false;"></a>
				<?php } ?>
				
				
				<?php 
					$version = cp_get_wp_version();
					if ($version >= 2.9 && $cpmobile_settings['post-cal-thumb'] != 'calendar-icons' && $cpmobile_settings['post-cal-thumb'] != 'nothing-shown') { ?>
					<div class="cpmobile-post-thumb-wrap">
						<div class="thumb-top-left"></div><div class="thumb-top-right"></div>
					<div class="cpmobile-post-thumb">
						<?php 
						if (function_exists('p75GetThumbnail')) { 
						if ( p75HasThumbnail($post->ID) ) { ?>
						
						<img src="<?php echo p75GetThumbnail($post->ID); ?>" alt="post thumbnail" />
						
						<?php } else { ?>
						<?php
								$total = '24'; $file_type = '.jpg'; 
							
								// Change to the location of the folder containing the images 
								$image_folder = '' . compat_get_plugin_url( 'cpmobile' ) . '/themes/core/core-images/thumbs/'; 
								$start = '1'; $random = mt_rand($start, $total); $image_name = $random . $file_type; 
							
							if ($cpmobile_settings['post-cal-thumb'] == 'post-thumbnails-random') {
									echo "<img src=\"$image_folder/$image_name\" alt=\"$image_name\" />";
									} else {
									echo '<img src="' . compat_get_plugin_url( 'cpmobile' ) . '/themes/core/core-images/thumbs/thumb-empty.jpg" alt="thumbnail" />';
								}
							?>						
						<?php } ?>
						
						<?php } elseif (get_post_custom_values('Thumbnail') == true || get_post_custom_values('thumbnail') == true) { ?>
						
						<img src="<?php $custom_fields = get_post_custom($post_ID); $my_custom_field = $custom_fields['Thumbnail']; foreach ( $my_custom_field as $key => $value ) echo "$value"; ?>" alt="custom-thumbnail" />
						 
						<?php } elseif (function_exists('the_post_thumbnail') && !function_exists('p75GetThumbnail')) { ?>
							
							<?php //patch toni for thumbnails
								// go see if any images are associated with the ad
								$images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'numberposts' => 1, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'ID') );
								
								if ($images)
								{ 
									$image = array_shift( $images );
									$adthumbarray = wp_get_attachment_image( $image->ID, 'ad-thumb' );
									// grab the large image for onhover preview
									$adlargearray = wp_get_attachment_image_src( $image->ID, 'large' );
									$img_large_url_raw = $adlargearray[0];

									if ($adthumbarray){
										echo '<a href="'. get_permalink() .'" rel="'.$img_large_url_raw.'">'.$adthumbarray.'</a>';
									}			
							?>
							
							<?php } else { ?>				
							
								<?php
								$total = '24'; $file_type = '.jpg'; 
							
								// Change to the location of the folder containing the images 
								$image_folder = '' . compat_get_plugin_url( 'cpmobile' ) . '/themes/core/core-images/thumbs/'; 
								$start = '1'; $random = mt_rand($start, $total); $image_name = $random . $file_type; 
							
							if ($cpmobile_settings['post-cal-thumb'] == 'post-thumbnails-random') {
									echo "<img src=\"$image_folder/$image_name\" alt=\"$image_name\" />";
									} else {
									echo '<img src="' . compat_get_plugin_url( 'cpmobile' ) . '/themes/core/core-images/thumbs/thumb-empty.jpg" alt="thumbnail" />';
								}
							?>
						<?php } } ?>
					</div>
						<div class="thumb-bottom-left"></div><div class="thumb-bottom-right"></div>
					</div>
				<?php }  elseif ($cpmobile_settings['post-cal-thumb'] == 'calendar-icons') { ?>
					<div class="calendar">
						<div class="cal-month month-<?php echo get_the_time('m') ?>"><?php echo get_the_time('M') ?></div>
						<div class="cal-date"><?php echo get_the_time('j') ?></div>
					</div>				
				<?php }  elseif ($cpmobile_settings['post-cal-thumb'] == 'nothing-shown') { }  else { ?>
					<div class="calendar">
						<div class="cal-month month-<?php echo get_the_time('m') ?>"><?php echo get_the_time('M') ?></div>
						<div class="cal-date"><?php echo get_the_time('j') ?></div>
					</div>	
				<?php } ?>
		
	<a class="h2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<div class="price-wrap">
	      <p class="post-price"><?php cp_get_price($post->ID, 'cp_price'); ?></p>
		</div>
		<div class="post-author">
		<?php if ($cpmobile_settings['post-cal-thumb'] != 'calendar-icons') { ?><?php echo get_the_time('d.m.Y') ?> <?php if (!cp_show_author()) { echo '<br />';} ?><?php } ?>
			<?php if (cp_show_author()) { ?><span class="lead"><?php _e("by", "cpmobile"); ?></span> <?php the_author(); ?><br /><?php } ?>
			<?php if (cp_show_categories()) { if ( get_the_category() ) the_category(', '); else echo get_the_term_list( $post->ID, APP_TAX_CAT, '', ', ', '' ); echo('<br />'); } ?> 
			<?php if (cp_show_tags() && get_the_tags()) { the_tags('<span class="lead">' . __( 'Tags', 'cpmobile' ) . ':</span> ', ', ', ''); } ?>
		</div>	
			<div class="clearer"></div>	
            <div id="entry-<?php the_ID(); ?>" <?php  if (cp_excerpt_enabled()) { ?>style="display:none"<?php } ?> class="mainentry <?php echo $cpmobile_settings['style-text-justify']; ?>">
 				<?php the_excerpt(); ?>
			<a class="read-more" href="<?php the_permalink() ?>"><?php _e( "See Ad Details", "cpmobile" ); ?></a>
	        </div>  
      </div><!-- rb_inside -->
      </div><!-- post -->

    <?php endwhile; ?>
			

<?php if (!function_exists('dsq_comments_template') && !function_exists('id_comments_template')) { ?>

	<div id="call<?php echo md5($_SERVER['REQUEST_URI']); ?>" class="ajax-load-more">
		<div id="spinner<?php echo md5($_SERVER['REQUEST_URI']); ?>" class="spin"	 style="display:none"></div>
		<a class="ajax" href="javascript:return false;" onclick="$wpt('#spinner<?php echo md5($_SERVER['REQUEST_URI']); ?>').fadeIn(200); $wpt('#ajaxentries<?php echo md5($_SERVER['REQUEST_URI']); ?>').load('<?php echo get_next_posts_page_link(); ?>', {}, function(){ $wpt('#call<?php echo md5($_SERVER['REQUEST_URI']); ?>').fadeOut();});">
			<?php _e( "Load more entries...", "cpmobile" ); ?>
		</a>
	</div>
	<div id="ajaxentries<?php echo md5($_SERVER['REQUEST_URI']); ?>"></div>
	
<?php } else { ?>
				<div class="main-navigation">
					<div class="alignleft">
						<?php previous_posts_link( __( 'Newer Entries', 'cpmobile') ) ?>
					</div>
					<div class="alignright">
						<?php next_posts_link( __('Older Entries', 'cpmobile')) ?>
					</div>
				</div>
<?php } ?>
</div><!-- #End post -->

<?php else : ?>

	<div class="result-text-footer">
		<?php cpmobile_core_else_text(); ?>
	</div>

 <?php 
	endif; 
	wp_reset_query();
 ?>

<!-- Here we're establishing whether the page was loaded via Ajax or not, for dynamic purposes. If it's ajax, we're not bringing in footer.php -->
<?php global $is_ajax; if (!$is_ajax) get_footer(); 
<?php global $is_ajax; $is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']); if (!$is_ajax) get_header(); ?>
<?php $wptouch_settings = bnc_wptouch_get_settings(); ?>
<?php
	//$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	//query_posts( array('post_type' => APP_POST_TYPE, 'ignore_sticky_posts' => 1, 'paged' => $paged) );
?>					
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content">
 	<div class="post" id="pages">
    <div class="rb_inside" id="single">
		<h2 class="sh2"><?php the_title(); ?></h2>
        
         <div class="clearer"></div>
  
    <div id="entry-<?php the_ID(); ?>" class="pageentry <?php echo $wptouch_settings['style-text-justify']; ?>">
        <?php if (!is_page('archives') || !is_page('links')) { the_content(); } ?>
    </div>
    
    </div><!-- rb_inside -->
	</div><!-- post -->
</div><!-- content -->
	

<!--If comments are enabled for pages in the WPtouch admin, and 'Allow Comments' is checked on a page-->
	<?php if (bnc_is_page_coms_enabled() && 'open' == $post->comment_status) : ?>
		<?php comments_template(); ?>
		<script type="text/javascript">
		jQuery(document).ready( function() {
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
<!--end comment status-->
    <?php endwhile; ?>	

<?php else : ?>

	<div class="result-text-footer">
		<?php wptouch_core_else_text(); ?>
	</div>

 <?php endif; ?>

<!-- If it's ajax, we're not bringing in footer.php -->
<?php global $is_ajax; if (!$is_ajax) 
get_footer();
<?php require_once( dirname(__FILE__) . '/../include/icons.php' ); ?>
<?php global $cpmobile_settings; ?>
<script type="text/javascript">
jQuery(document).ready(function(jQuery) {
var button = jQuery('#upload-icon'), interval;
	new AjaxUpload(button, {
		action: '<?php bloginfo( 'wpurl' ); ?>/?cpmobile=upload',
		autoSubmit: true,
		name: 'submitted_file',
		onSubmit: function(file, extension) { jQuery("#upload_progress").show(); },
		onComplete: function(file, response) { 
		jQuery("#upload_progress").hide();
		jQuery('#upload_response').hide().html(response).fadeIn(); 
		jQuery('#icon-pool-area').load('<?php echo admin_url( 'options-general.php?page=cpmobile/cpmobile.php' ); ?> #cpmobileicons');	
		},
		data: {
			_ajax_nonce: '<?php echo wp_create_nonce('cpmobile-upload'); ?>'
		}
	});
});
</script>
<div class="metabox-holder" id="available_icons">
	<div class="postbox">
		<h3><span class="icon-options">&nbsp;</span><?php _e( "Default &amp; Custom Icon Pool", "cpmobile" ); ?></h3>

			<div class="left-content">
				<h4><?php _e( "Adding Icons", "cpmobile" ); ?></h4>
				<p><?php _e( "To add icons to the pool, simply upload a .png, .jpeg or .gif image from your computer.", "cpmobile" ); ?></p>
				<p></p>
				<p><?php echo sprintf( __( "Default icons generously provided by %sMarcelo Marfil%s.", "cpmobile"), "<a href='http://marfil.me/' target='_blank'>", "</a>" ); ?></p>

				<h4><?php _e( "Logo/Bookmark Icons", "cpmobile" ); ?></h4>
				<p><?php _e( "If you're adding a logo icon, the best dimensions for it are 59x60px (png) when used as a bookmark icon.", "cpmobile" ); ?></p>
				<p><?php echo sprintf( __( "Need help? You can use %sthis easy online icon generator%s to make one.", "cpmobile"), "<a href='http://www.flavorstudios.com/iphone-icon-generator' target='_blank'>", "</a>" ); ?></p>
				<p><?php echo sprintf( __( "These files will be stored in this folder we create: .../wp-content/uploads/cpmobile/custom-icons", "cpmobile"), '' . compat_get_wp_content_dir( 'cpmobile' ). ''); ?></p>
				<p><?php echo sprintf( __( "If an upload fails (usually it's a permission problem) check your wp-content path settings in WordPress' Miscellaneous Settings, or create the folder yourself using FTP and try again.", "cpmobile"), "<strong>", "</strong>" ); ?></p>
						
				<div id="upload-icon" class="button"><?php _e('Upload Icon', 'cpmobile' ); ?></div>

			<div id="upload_response"></div>
				<div id="upload_progress" style="display:none">
					<p><img src="<?php echo compat_get_plugin_url( 'cpmobile' ) . '/images/progress.gif'; ?>" alt="" /> <?php _e( "Uploading..."); ?></p>
				</div>
								
			</div><!-- left-content -->

	<div class="right-content" id="icon-pool-area">	
	<div id="cpmobileicons">
		<?php cp_show_icons(); ?>
	</div>
	</div>
	
	<div class="cp-clearer"></div>
	</div><!-- postbox -->
</div><!-- metabox -->
<?php global $cpmobile_settings; ?>
<div class="metabox-holder">
	<div class="postbox" id="push-area">
		<h3><span class="push-options">&nbsp;</span><?php _e( "Push Notification Options", "cpmobile" ); ?></h3>

			<div class="left-content">
					<p><?php echo sprintf(__( "Here you can configure cpmobile to push selected notifications through your %sProwl%s account to your iPhone, iPod touch and Growl-enabled Mac or PC.", "cpmobile" ), '<a href="http://prowl.weks.net/" target="_blank">','</a>'); ?></p>
					<p><?php echo sprintf(__( "%sMake sure you generate a Prowl API key to use here%s otherwise no notifications will be pushed to you.", "cpmobile" ), '<strong>','</strong>'); ?></p>			
			</div><!-- left content -->

			<div class="right-content">
				<ul class="cpmobile-make-li-italic">
				<?php if ( function_exists( 'curl_init' ) ) { ?>
					<li>
						<input name="prowl-api" type="text" value="<?php echo $cpmobile_settings['prowl-api']; ?>" /><?php _e( "Prowl API Key", "cpmobile" ); ?> (<?php echo sprintf(__( "%sCreate a key now%s", "cpmobile" ), '<a href="https://prowl.weks.net/settings.php" target="_blank">','</a>'); ?> - <a href="#prowl-info" class="fancylink">?</a>)
						<div id="prowl-info" style="display:none">
							<h2><?php _e( "More Info", "cpmobile" ); ?></h2>
							<p><?php _e( "In order to enable Prowl notifications you must create a Prowl account and download + configure the Prowl application for iPhone.", "cpmobile" ); ?></p>
							<p><?php _e( "Next, visit the Prowl website and generate your API key, which cpmobile will use to send your notifications.", "cpmobile" ); ?></p>
							
							<p><?php echo sprintf(__( "%sVisit the Prowl Website%s", "cpmobile" ), '<a href="http://prowl.weks.net/settings.php" target="_blank">','</a>'); ?> | <?php echo sprintf(__( "%sVisit iTunes to Download Prowl%s", "cpmobile" ), '<a href="http://itunes.apple.com/WebObjects/MZStore.woa/wa/viewSoftware?id=320876271&amp;mt=8" target="_blank">','</a>'); ?></p>
						</div>		
							<?php if ( isset( $cpmobile_settings['prowl-api'] ) && strlen( $cpmobile_settings['prowl-api'] ) ) { ?>
								<?php if ( cp_cpmobile_is_prowl_key_valid() ) { ?>
									<p class="valid"><?php _e( "Your Prowl API key has been verified.", "cpmobile" ); ?></p>
								<?php } else { ?>
									<p class="invalid">
										<?php _e( "Sorry, your Prowl API key is not verified.", "cpmobile" ); ?><br />
										<?php _e( "Please check your key and make sure there are no spaces or extra characters.", "cpmobile" ); ?>
									</p>
								<?php } ?>
							<?php } ?>		
					</li>
				</ul>
			
				<ul>
				<li>
					<input class="checkbox" type="checkbox" name="enable-prowl-comments-button" <?php if ( isset( $cpmobile_settings['enable-prowl-comments-button']) && $cpmobile_settings['enable-prowl-comments-button'] == 1) echo('checked'); ?> />
					<label class="label" for="enable-prowl-comments-button"><?php _e( "Notify me of new comments &amp; pingbacks/tracksbacks", "cpmobile" ); ?></label>
				</li>
				<li>
					<input class="checkbox" <?php if (!get_option('comment_registration')) : ?>disabled="true"<?php endif; ?> type="checkbox" name="enable-prowl-users-button" <?php if ( isset( $cpmobile_settings['enable-prowl-users-button']) && $cpmobile_settings['enable-prowl-users-button'] == 1) echo('checked'); ?> />
					<label class="label" for="enable-prowl-users-button"><?php _e( "Notify me of new account registrations", "cpmobile" ); ?></label>
				</li>
				<li>
					<input class="checkbox" type="checkbox" name="enable-prowl-message-button" <?php if ( isset( $cpmobile_settings['enable-prowl-message-button']) && $cpmobile_settings['enable-prowl-message-button'] == 1) echo('checked'); ?> />
					<label class="label" for="enable-prowl-message-button"><?php _e( "Allow users to send me direct messages", "cpmobile" ); ?> <a href="#dm-info" class="fancylink">?</a></label>
						<div id="dm-info" style="display:none">
						<h2><?php _e( "More Info", "cpmobile" ); ?></h2>
						<p><?php _e( "This enables a new link to a drop-down in the submenu bar for cpmobile ('Message Me').", "cpmobile" ); ?></p>
						<p><?php _e( "When opened, a form is shown for users to fill in. The name, e-mail address, and message area is shown. Thier IP will also be sent to you, in case you want to ban it in the WordPress admin.", "cpmobile" ); ?></p>
						</div>
					</li>			
					<?php } else { ?>
					<li><strong class="no-pages"><?php echo sprintf(__( "%sCURL is required%s on your webserver to use Push capabilities in cpmobile.", "cpmobile" ), '<a href="http://en.wikipedia.org/wiki/CURL" target="_blank">','</a>'); ?></strong></li>
					<?php } ?>	
				</ul>
			</div><!-- right content -->
		<div class="cp-clearer"></div>
	</div><!-- postbox -->
</div><!-- metabox -->
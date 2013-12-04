<?php global $cpmobile_settings; ?>

<div class="metabox-holder">
	<div class="postbox">
		<h3><span class="global-settings">&nbsp;</span><?php _e( "General Settings", "cpmobile" ); ?></h3>

			<div class="left-content">
				<h4><?php _e( "Regionalization Settings", "cpmobile" ); ?></h4>
				<p><?php _e( "Select the language for cpmobile.  Custom .mo files should be placed in wp-content/cpmobile/lang.", "cpmobile" ); ?></p>
				<br /><br />

				<h4><?php _e( "Home Page Re-Direction", "cpmobile" ); ?></h4>
				<p><?php echo sprintf( __( "cpmobile by default follows your %sWordPress &raquo; Reading Options%s.", "cpmobile"), '<a href="options-reading.php">', '</a>' ); ?></p>
				<br /><br />
				<h4><?php _e( "Site Title", "cpmobile" ); ?></h4>
				<p><?php _e( "You can change your site title (if needed) in cpmobile.", "cpmobile" ); ?></p>

				<br /><br />

				<h4><?php _e( "Excluded Categories", "cpmobile" ); ?></h4>
				<p><?php _e( "Categories by ID you want excluded everywhere in cpmobile.", "cpmobile" ); ?></p>

				<h4><?php _e( "Excluded Tags", "cpmobile" ); ?></h4>
				<p><?php _e( "Tags by ID you want excluded everywhere in cpmobile.", "cpmobile" ); ?></p>

				<br /><br />

				<h4><?php _e( "Text Justification Options", "cpmobile" ); ?></h4>
				<p><?php _e( "Set the alignment for text.", "cpmobile" ); ?></p>

				<br /><br />
				
				<h4><?php _e( "Post Listings Options", "cpmobile" ); ?></h4>
				<p><?php _e( "Choose between calendar Icons, post thumbnails (WP 2.9) or none for your post listings.", "cpmobile" ); ?></p>
				<p><?php _e( "Select which meta items are shown below titles on main, search, &amp; archives pages.", "cpmobile" ); ?></p>

				<br /><br /><br /><br /><br /><br /><br /><br /><br />

				<h4><?php _e( "Footer Message", "cpmobile" ); ?></h4>
				<p><?php _e( "Customize the default footer message shown in cpmobile here.", "cpmobile" ); ?></p>
			</div>

			<div class="right-content">
				<p><label for="home-page"><strong><?php _e( "cpmobile Language", "cpmobile" ); ?></strong></label></p>
				<ul class="cpmobile-make-li-italic">
					<li>
						<select name="cpmobile-language">
							<option value="auto"<?php if ( $cpmobile_settings['cpmobile-language'] == "auto" ) echo " selected"; ?>><?php _e( "Automatically detected", "cpmobile" ); ?></option>
							<option value="fr_FR"<?php if ( $cpmobile_settings['cpmobile-language'] == "fr_FR" ) echo " selected"; ?>>Français</option>
							<option value="es_ES"<?php if ( $cpmobile_settings['cpmobile-language'] == "es_ES" ) echo " selected"; ?>>Español</option>
							<option value="eu_EU"<?php if ( $cpmobile_settings['cpmobile-language'] == "eu_EU" ) echo " selected"; ?>>Basque</option>
							<!-- <option value="de_DE"<?php if ( $cpmobile_settings['cpmobile-language'] == "de_DE" ) echo " selected"; ?>>Deutsch</option> -->
							<option value="ja_JP"<?php if ( $cpmobile_settings['cpmobile-language'] == "ja_JP" ) echo " selected"; ?>>Japanese</option>
							
							<?php $custom_lang_files = cp_get_cpmobile_custom_lang_files(); ?>
							<?php if ( count( $custom_lang_files ) ) { ?>
								<?php foreach( $custom_lang_files as $lang_file ) { ?>
									<option value="<?php echo $lang_file->prefix; ?>"<?php if ( $cpmobile_settings['cpmobile-language'] == $lang_file->prefix ) echo " selected"; ?>><?php echo $lang_file->name; ?></option>
								<?php } ?>	
							<?php } ?>
						</select>
					</li>
				</ul>
				<br /><br />

				<p><label for="home-page"><strong><?php _e( "cpmobile Home Page", "cpmobile" ); ?></strong></label></p>
				<?php $pages = cp_get_pages_for_icons(); ?>
				<?php if ( count( $pages ) ) { ?>
					<?php wp_dropdown_pages( 'show_option_none=WordPress Settings&name=home-page&selected=' . cp_get_selected_home_page()); ?>
				<?php } else {?>
					<strong class="no-pages"><?php _e( "You have no pages yet. Create some first!", "cpmobile" ); ?></strong>
				<?php } ?>

				<br /><br /><br />

				<ul class="cpmobile-make-li-italic">
					<li><input type="text" class="no-right-margin" name="header-title" value="<?php $str = $cpmobile_settings['header-title']; echo stripslashes($str); ?>" /><?php _e( "Site title text", "cpmobile" ); ?></li>
				</ul>

				<br /><br />

				<ul class="cpmobile-make-li-italic">			
				<li><input name="excluded-cat-ids" class="no-right-margin" type="text" value="<?php $str = $cpmobile_settings['excluded-cat-ids']; echo stripslashes($str); ?>" /><?php _e( "Comma list of Category IDs, eg: 1,2,3", "cpmobile" ); ?></li>
				<li><input name="excluded-tag-ids" class="no-right-margin" type="text" value="<?php $str = $cpmobile_settings['excluded-tag-ids']; echo stripslashes($str); ?>" /><?php _e( "Comma list of Tag IDs, eg: 1,2,3", "cpmobile" ); ?></li>
				</ul>

				<br /><br />

				<ul class="cpmobile-make-li-italic">

					<li><select name="style-text-justify">
							<option <?php if ($cpmobile_settings['style-text-justify'] == "left-justified") echo " selected"; ?> value="left-justified"><?php _e( "Left", "cpmobile" ); ?></option>
							<option <?php if ($cpmobile_settings['style-text-justify'] == "full-justified") echo " selected"; ?> value="full-justified"><?php _e( "Full", "cpmobile" ); ?></option>
						</select>
						<?php _e( "Font justification", "cpmobile" ); ?>
					</li>
				</ul>
				<br />
				<ul>
				<li><ul class="cpmobile-make-li-italic">
		
							<li><select name="post-cal-thumb">
									<option <?php if ($cpmobile_settings['post-cal-thumb'] == "calendar-icons") echo " selected"; ?> value="calendar-icons"><?php _e( "Calendar Icons", "cpmobile" ); ?></option>
									<option <?php $version = cp_get_wp_version(); if ($version <= 2.89) : ?>disabled="true"<?php endif; ?> <?php if ($cpmobile_settings['post-cal-thumb'] == "post-thumbnails") echo " selected"; ?> value="post-thumbnails"><?php _e( "Post Thumbnails / Featured Images", "cpmobile" ); ?></option>
									<option <?php $version = cp_get_wp_version(); if ($version <= 2.89) : ?>disabled="true"<?php endif; ?> <?php if ($cpmobile_settings['post-cal-thumb'] == "post-thumbnails-random") echo " selected"; ?> value="post-thumbnails-random"><?php _e( "Post Thumbnails / Featured Images (Random)", "cpmobile" ); ?></option>
									<option <?php if ($cpmobile_settings['post-cal-thumb'] == "nothing-shown") echo " selected"; ?> value="nothing-shown"><?php _e( "No Icon or Thumbnail", "cpmobile" ); ?></option>
								</select>
								<?php _e( "Post Listings Display", "cpmobile" ); ?> <small>(<?php _e( "Thumbnails Requires WordPress 2.9+", "cpmobile" ); ?>)</small> <a href="#thumbs-info" class="fancylink">?</a>
				<div id="thumbs-info" style="display:none">
					<h2><?php _e( "More Info", "cpmobile" ); ?></h2>
					<p><?php _e( "This will change the display of blog and post listings between Calendar Icons view and Post Thumbnails view.", "cpmobile" ); ?></p>
					<p><?php _e( "The <em>Post Thumbnails w/ Random</em> option will fill missing post thumbnails with random abstract images. (WP 2.9+)", "cpmobile" ); ?></p>
				</div>
							</li>
						</ul>	
					</li>
					<li>
						<input type="checkbox" class="checkbox" name="enable-truncated-titles" <?php if (isset($cpmobile_settings['enable-truncated-titles']) && $cpmobile_settings['enable-truncated-titles'] == 1) echo('checked'); ?> />
						<label for="enable-truncated-titles"><?php _e( "Enable Truncated Titles", "cpmobile" ); ?> <small>(<?php _e( "Will use ellipses when titles are too long instead of wrapping them", "cpmobile" ); ?>)</small></label>
					</li>					
					<li>
						<input type="checkbox" class="checkbox" name="enable-main-name" <?php if (isset($cpmobile_settings['enable-main-name']) && $cpmobile_settings['enable-main-name'] == 1) echo('checked'); ?> />
						<label for="enable-authorname"> <?php _e( "Show Author's Name", "cpmobile" ); ?></label>
					</li>			
					<li>
						<input type="checkbox" class="checkbox" name="enable-main-categories" <?php if (isset($cpmobile_settings['enable-main-categories']) && $cpmobile_settings['enable-main-categories'] == 1) echo('checked'); ?> />
						<label for="enable-categories"> <?php _e( "Show Categories", "cpmobile" ); ?></label>
					</li>			
					<li>
						<input type="checkbox" class="checkbox" name="enable-main-tags" <?php if (isset($cpmobile_settings['enable-main-tags']) && $cpmobile_settings['enable-main-tags'] == 1) echo('checked'); ?> />
						<label for="enable-tags"> <?php _e( "Show Tags", "cpmobile" ); ?></label>
					</li>			
					<li>
						<input type="checkbox" class="checkbox" name="enable-post-excerpts" <?php if (isset($cpmobile_settings['enable-post-excerpts']) && $cpmobile_settings['enable-post-excerpts'] == 1) echo('checked'); ?> />
						<label for="enable-excerpts"><?php _e( "Hide Excerpts", "cpmobile" ); ?></label>
					</li>
				</ul>
				<br /><br />
				<ul class="cpmobile-make-li-italic">
					<li><input type="text" class="no-right-margin footer-msg" name="custom-footer-msg" value="<?php $str = $cpmobile_settings['custom-footer-msg']; echo stripslashes($str); ?>" /><?php _e( "Footer message", "cpmobile" ); ?></li>
				</ul>
			</div>
			
	<div class="cp-clearer"></div>
	</div><!-- postbox -->
</div><!-- metabox -->
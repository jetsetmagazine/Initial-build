<?php global $wptouch_settings; ?>

<div class="metabox-holder">
	<div class="postbox">
		<h3><span class="style-options">&nbsp;</span><?php _e( "Style &amp; Color Options", "wptouch" ); ?></h3>

			<div class="left-content skins-left-content">
				<p><?php _e( "Here you can customize some of the more visible features of WPtouch.", "wptouch" ); ?></p>
			</div>
		
			<div class="right-content skins-fixed">


 <!-- Default skin -->
 
		<div class="skins-desc" id="default-skin">
			<p><?php _e( "The default WPtouch theme emulates a native iPhone application.", "wptouch" ); ?></p>
			<ul class="wptouch-make-li-italic">
					<li><select name="h2-font">
							<option <?php if ($wptouch_settings['h2-font'] == "Helvetica Neue") echo " selected"; ?> value="Helvetica Neue">
								<?php _e( "Helvetica Neue", "wptouch" ); ?>
							</option>
							<option <?php if ($wptouch_settings['h2-font'] == "Helvetica") echo " selected"; ?> value="Helvetica">
								<?php _e( "Helvetica", "wptouch" ); ?>
							</option>
							<option <?php if ($wptouch_settings['h2-font'] == "thonburi-font") echo " selected"; ?> value="thonburi-font">
								<?php _e( "Thonburi", "wptouch" ); ?>
							</option>
							<option <?php if ($wptouch_settings['h2-font'] == "Georgia") echo " selected"; ?> value="Georgia">
								<?php _e( "Georgia", "wptouch" ); ?>
							</option>
							<option <?php if ($wptouch_settings['h2-font'] == "Geeza Pro") echo " selected"; ?> value="Geeza Pro">
								<?php _e( "Geeza Pro", "wptouch" ); ?>
							</option>
							<option <?php if ($wptouch_settings['h2-font'] == "Verdana") echo " selected"; ?> value="Verdana">
								<?php _e( "Verdana", "wptouch" ); ?>
							</option>
							<option <?php if ($wptouch_settings['h2-font'] == "Arial Rounded MT Bold") echo " selected"; ?> value="Arial Rounded MT Bold">
								<?php _e( "Arial Rounded MT Bold", "wptouch" ); ?>
							</option>
							</select>
						<?php _e( "Post Title H2 Font", "wptouch" ); ?>
					</li> 
					<li>#<input type="text" id="header-text-color" name="header-text-color" value="<?php echo $wptouch_settings['header-text-color']; ?>" /><?php _e( "Title text color", "wptouch" ); ?></li>
					<li>#<input type="text" id="header-border-color" name="header-border-color" value="<?php echo $wptouch_settings['header-border-color']; ?>" /><?php _e( "Sub-header background color", "wptouch" ); ?></li>
					<li>#<input type="text" id="link-color" name="link-color" value="<?php echo $wptouch_settings['link-color']; ?>" /><?php _e( "Site-wide links color", "wptouch" ); ?></li>
			</ul> 
		</div>
		
		</div><!-- right content -->
	<div class="bnc-clearer"></div>
	</div><!-- postbox -->
</div><!-- metabox -->
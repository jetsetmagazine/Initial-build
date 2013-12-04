<?php global $cpmobile_settings; ?>

<div class="metabox-holder">
	<div class="postbox">
		<h3><span class="style-options">&nbsp;</span><?php _e( "Style &amp; Color Options", "cpmobile" ); ?></h3>

			<div class="left-content skins-left-content">
				<p><?php _e( "Here you can customize some of the more visible features of cpmobile.", "cpmobile" ); ?></p>
			</div>
		
			<div class="right-content skins-fixed">


 <!-- Default skin -->
 
		<div class="skins-desc" id="default-skin">
			<p><?php _e( "The default cpmobile theme emulates a native iPhone application.", "cpmobile" ); ?></p>
			<ul class="cpmobile-make-li-italic">
					<li><select name="h2-font">
							<option <?php if ($cpmobile_settings['h2-font'] == "Helvetica Neue") echo " selected"; ?> value="Helvetica Neue">
								<?php _e( "Helvetica Neue", "cpmobile" ); ?>
							</option>
							<option <?php if ($cpmobile_settings['h2-font'] == "Helvetica") echo " selected"; ?> value="Helvetica">
								<?php _e( "Helvetica", "cpmobile" ); ?>
							</option>
							<option <?php if ($cpmobile_settings['h2-font'] == "thonburi-font") echo " selected"; ?> value="thonburi-font">
								<?php _e( "Thonburi", "cpmobile" ); ?>
							</option>
							<option <?php if ($cpmobile_settings['h2-font'] == "Georgia") echo " selected"; ?> value="Georgia">
								<?php _e( "Georgia", "cpmobile" ); ?>
							</option>
							<option <?php if ($cpmobile_settings['h2-font'] == "Geeza Pro") echo " selected"; ?> value="Geeza Pro">
								<?php _e( "Geeza Pro", "cpmobile" ); ?>
							</option>
							<option <?php if ($cpmobile_settings['h2-font'] == "Verdana") echo " selected"; ?> value="Verdana">
								<?php _e( "Verdana", "cpmobile" ); ?>
							</option>
							<option <?php if ($cpmobile_settings['h2-font'] == "Arial Rounded MT Bold") echo " selected"; ?> value="Arial Rounded MT Bold">
								<?php _e( "Arial Rounded MT Bold", "cpmobile" ); ?>
							</option>
							</select>
						<?php _e( "Post Title H2 Font", "cpmobile" ); ?>
					</li> 
					<li>#<input type="text" id="header-text-color" name="header-text-color" value="<?php echo $cpmobile_settings['header-text-color']; ?>" /><?php _e( "Title text color", "cpmobile" ); ?></li>
					<li>#<input type="text" id="header-border-color" name="header-border-color" value="<?php echo $cpmobile_settings['header-border-color']; ?>" /><?php _e( "Sub-header background color", "cpmobile" ); ?></li>
					<li>#<input type="text" id="link-color" name="link-color" value="<?php echo $cpmobile_settings['link-color']; ?>" /><?php _e( "Site-wide links color", "cpmobile" ); ?></li>
			</ul> 
		</div>
		
		</div><!-- right content -->
	<div class="cp-clearer"></div>
	</div><!-- postbox -->
</div><!-- metabox -->
<?php global $cpmobile_settings; ?>

<div class="metabox-holder">
	<div class="postbox">
		<h3><span class="page-options">&nbsp;</span><?php _e( "Logo Icon // Menu Items &amp; Pages Icons", "cpmobile" ); ?></h3>

			<div class="left-content">
				<h4><?php _e( "Default Menu Items", "cpmobile" ); ?></h4>
				<p><?php _e( "Enable/Disable default items in the cpmobile site menu.", "cpmobile"); ?></p>
<br /><br />
				<h4><?php _e( "Pages + Icons", "cpmobile" ); ?></h4>
				<p><?php _e( "Next, select the icons from the lists that you want to pair with each page menu item.", "cpmobile" ); ?></p>
				<p><?php _e( "You can also decide if pages are listed by the page order (ID) in WordPress, or by name (default).", "cpmobile" ); ?></p>
			</div><!-- left-content -->
		
	<div class="right-content cpmobile-pages">
		<ul>
			<li><input type="checkbox" class="checkbox" name="enable-main-home" <?php if (isset($cpmobile_settings['enable-main-home']) && $cpmobile_settings['enable-main-home'] == 1) echo('checked'); ?> /><label for="enable-main-home"><?php _e( "Enable Home Menu Item", "cpmobile" ); ?></label></li>
			<li><input type="checkbox" class="checkbox" name="enable-main-rss" <?php if (isset($cpmobile_settings['enable-main-rss']) && $cpmobile_settings['enable-main-rss'] == 1) echo('checked'); ?> /><label for="enable-main-rss"><?php _e( "Enable RSS Menu Item", "cpmobile" ); ?></label></li>
			<li><input type="checkbox" class="checkbox" name="enable-main-email" <?php if (isset($cpmobile_settings['enable-main-email']) && $cpmobile_settings['enable-main-email'] == 1) echo('checked'); ?> /><label for="enable-main-email"><?php _e( "Enable Email Menu Item", "cpmobile" ); ?> <small>(<?php _e( "Uses default WordPress admin e-mail", "cpmobile" ); ?>)</small></label><br /></li>
			<?php if ( function_exists( 'twentyeleven_setup' ) || function_exists( 'twentyten_setup' ) ) { ?>
				<li><input type="checkbox" class="checkbox" name="enable-twenty-eleven-footer" <?php if ( isset( $cpmobile_settings['enable-twenty-eleven-footer']) && $cpmobile_settings['enable-twenty-eleven-footer'] == 1) echo( 'checked' ); ?> /><label for="enable-twenty-eleven-footer"><?php _e( "Show powered by cpmobile in footer", "cpmobile" ); ?> <small>(<?php _e( "Adds cpmobile to the 'Powered by WordPress' area in footer of desktop theme", "cpmobile" ); ?>)</small></label>
			<?php } ?>

			<br /><br />
		
		<?php if ( count( $pages ) ) { ?>
			<li><br /><br />
			<select name="sort-order">
					<option value="name"<?php if ( $cpmobile_settings['sort-order'] == 'name') echo " selected"; ?>><?php _e( "By Name", "cpmobile" ); ?></option>
					<option value="page"<?php if ( $cpmobile_settings['sort-order'] == 'page') echo " selected"; ?>><?php _e( "By Page ID", "cpmobile" ); ?></option>
				</select>
				<?php _e( "Menu List Sort Order", "cpmobile" ); ?>
			</li>
			<?php } ?>
			<?php $pages = cp_get_pages_for_icons(); ?>
			<?php if ( count( $pages ) ) { ?>
				<?php foreach ( $pages as $page ) { ?>
				<li><span>
						<input class="checkbox" type="checkbox" name="enable_<?php echo $page->ID; ?>"<?php if ( isset( $cpmobile_settings[$page->ID] ) ) echo " checked"; ?> />
						<label class="cpmobile-page-label" for="enable_<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></label>
					</span>
					<select class="page-select" name="icon_<?php echo $page->ID; ?>">
						<?php cp_get_icon_drop_down_list( ( isset( $cpmobile_settings[ $page->ID ] ) ? $cpmobile_settings[ $page->ID ] : false ) ); ?>
					</select>
					
				</li>
				<?php } ?>
			<?php } else { ?>
				<strong ><?php _e( "You have no pages yet. Create some first!", "cpmobile" ); ?></strong>
			<?php } ?>
		</ul>
	</div><!-- right-content -->		
	<div class="cp-clearer"></div>
	</div><!-- postbox -->
</div><!-- metabox -->
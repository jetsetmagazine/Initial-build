<?php global $cpmobile_settings; ?>
<?php global $cp_cpmobile_version; ?>

<div class="metabox-holder" id="cpmobile-head">
	<div class="postbox">
		<div id="cpmobile-head-colour">
			<div id="cpmobile-head-title">
				<?php cpmobile(); ?>
				<img class="ajax-load" src="<?php echo compat_get_plugin_url('cpmobile'); ?>/images/admin-ajax-loader.gif" alt="ajax"/>
			</div>
				<div id="cpmobile-head-links">
					<ul>
						<li><?php echo sprintf(__( "%sGet CPMobile %s", "cpmobile" ), '<a href="http://wprabbits.com/product/classipress-mobile-plugin/" target="_blank">','</a>'); ?> | </li>
						<li><?php echo sprintf(__( "%sJoin our FREE Affiliate Program%s", "cpmobile" ), '<a href="http://wprabbits.com/affiliates-program/" target="_blank">','</a>'); ?></li> |
						<li><?php echo sprintf(__( "%sFollow Us on Twitter%s", "wordtwit" ), '<a href="https://twitter.com/classipro" target="_blank">','</a>'); ?></li>
					</ul>
				</div>
	<div class="cp-clearer"></div>
			</div>	
	
		<div id="cpmobile-news-support">

			<div id="cpmobile-news-wrap">
			<h3><span class="rss-head">&nbsp;</span><?php _e( "CPMobile Wire", "cpmobile" ); ?></h3>
				<div id="cpmobile-news-content">
					
				</div>
			</div>

			<div id="cpmobile-support-wrap">			
			<h3>&nbsp;</h3>
				<div id="cpmobile-support-content">
				<a id="find-out-more" href="http://classipro.com"<?php echo str_replace( '.', '', $cp_cpmobile_version ); ?>" target="_blank">&nbsp;</a>
				</div>
			</div>
			
		</div><!-- cpmobile-news-support -->

	<div class="cp-clearer"></div>
	</div><!-- postbox -->
</div><!-- cpmobile-head -->

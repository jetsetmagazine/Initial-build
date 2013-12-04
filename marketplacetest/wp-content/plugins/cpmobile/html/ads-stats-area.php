<?php global $cpmobile_settings; ?>

<div class="metabox-holder">
	<div class="postbox new-styles" id="advertising-options">
		<h3><span class="adsense-options">&nbsp;</span><?php _e( "Advertising, Stats &amp; Custom Code", "cpmobile" ); ?></h3>
		<div id="advertising-service">
			<div class="left-content">
				<h4><?php _e( "Advertising Service", "cpmobile" ); ?></h4>
				<p><?php _e( "Choose which advertising service you would like to use within cpmobile", "cpmobile" ); ?></p>
			</div>
			
			<div class="right-content">
				<ul class="cpmobile-make-li-italic">
					<li>
						<select name="ad_service" id="ad_service">
							<option value="none"<?php if ( $cpmobile_settings['ad_service'] == 'none') echo " selected"; ?>><?php _e( "None", "cpmobile" ); ?></option>
							<!-- <option value="appstores"<?php if ( $cpmobile_settings['ad_service'] == 'appstores') echo " selected"; ?>><?php _e( "AppStores", "cpmobile" ); ?></option>	 -->					
							<option value="adsense"<?php if ( $cpmobile_settings['ad_service'] == 'adsense') echo " selected"; ?>><?php _e( "Google Adsense", "cpmobile" ); ?></option>
		
						</select>
						<?php _e( "Advertising Service", "cpmobile" ); ?>
					</li>
				</ul>	
			</div>			
			<div class="bnc-clearer"></div>
		</div>
		
		<div id="appstores">
			<div class="left-content">
				<h4><?php _e( "AppStores", "cpmobile" ); ?></h4>
			</div>
			
			<div class="right-content">
				<ul class="cpmobile-make-li-italic">
					<li><input name="appstores-id" type="text" value="<?php echo $cpmobile_settings['appstores-id']; ?>" /><?php _e( "AppStore ID", "cpmobile" ); ?> - <a href="#"><?php _e( "Get one now", "cpmobile" ); ?> &rarr;</a></li>				
				</ul>
			</div>			
			<div class="bnc-clearer"></div>
		</div>			
		
		<div id="google-adsense">
			<div class="left-content">
				<h4><?php _e( "Google Adsense", "cpmobile" ); ?></h4>
				<p><?php _e( "Enter your Google AdSense ID if you'd like to support mobile advertising in cpmobile posts.", "cpmobile" ); ?></p>
				<p><?php _e( "Make sure to include the 'pub-' part of your ID string.", "cpmobile" ); ?></p>
			</div>
			
			<div class="right-content">
				<ul class="cpmobile-make-li-italic">
					<li><input name="adsense-id" type="text" value="<?php echo $cpmobile_settings['adsense-id']; ?>" /><?php _e( "Google AdSense ID", "cpmobile" ); ?></li>
					<li><input name="adsense-channel" type="text" value="<?php echo $cpmobile_settings['adsense-channel']; ?>" /><?php _e( "Google AdSense Channel", "cpmobile" ); ?></li>
				</ul>
			</div>			
			<div class="bnc-clearer"></div>
		</div>	
		
		<div id="main-stats-area">
			<div class="left-content">
		    	<h4><?php _e( "Stats &amp; Custom Code", "cpmobile" ); ?></h4>
		 		<p><?php _e( "If you'd like to capture traffic statistics ", "cpmobile" ); ?><br /><?php _e( "(Google Analytics, MINT, etc.)", "cpmobile" ); ?></p>
		 		<p><?php _e( "Enter the code snippet(s) for your statistics tracking.", "cpmobile" ); ?> <?php _e( "You can also enter custom CSS &amp; other HTML code.", "cpmobile" ); ?> <a href="#css-info" class="fancylink">?</a></p>
		 		<div id="css-info" style="display:none">
					<h2><?php _e( "More Info", "cpmobile" ); ?></h2>
					<p><?php _e( "You may enter a custom css file link easily. Simply add the full link to the css file like this:", "cpmobile" ); ?></p>
					<p><?php _e( "<code>&lt;style type=&quot;text/css&quot;&gt;#mydiv { color: red; }&lt;/style&gt;</code>", "cpmobile" ); ?></p>			
				</div>	
			</div>
			
			<div class="right-content">
				<textarea id="cpmobile-stats" name="statistics"><?php echo stripslashes($cpmobile_settings['statistics']); ?></textarea>
			</div>
			
			<div class="cp-clearer"></div>
		</div>		
	</div><!-- postbox -->
</div><!-- metabox -->
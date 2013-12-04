<?php 
include( dirname(__FILE__) . '/../core/core-header.php' ); 
?>

<body class="<?php cpmobile_core_body_background(); ?> <?php cpmobile_idevice_classes(); ?>">
<!-- New noscript check, we need js on now folks -->
<noscript>
<div id="noscript-wrap">
	<div id="noscript">
		<h2><?php _e("Notice", "cpmobile"); ?></h2>
		<p><?php _e("JavaScript for Mobile Safari is currently turned off.", "cpmobile"); ?></p>
		<p><?php _e("Turn it on in ", "cpmobile"); ?><em><?php _e("Settings &rsaquo; Safari", "cpmobile"); ?></em><br /><?php _e(" to view this website.", "cpmobile"); ?></p>
	</div>
</div>
</noscript>
<!-- Prowl: if DM is sent, let's tell the user what happened -->
<?php if (cp_prowl_did_try_message()) { if (cp_prowl_message_success()) { ?>
<div id="prowl-success"><p><?php _e("Your Push Notification was sent.", "cpmobile"); ?></p></div>
	<?php } else { ?>
<div id="prowl-fail"><p><?php _e("Your Push Notification cannot be delivered at this time.", "cpmobile"); ?></p></div>
<?php } } ?>

<?php if (cp_is_login_button_enabled()) { ?>
<!--#start The Login Overlay -->
	<div id="cpmobile-login">
		<div id="cpmobile-login-inner">
			<form name="loginform" id="loginform" action="<?php bloginfo('wpurl'); ?>/wp-login.php" method="post">
				<label><input type="text" name="log" id="log" placeholder="<?php _e("Username", "cpmobile"); ?>" tabindex="1" value="" /></label>
				<label><input type="password" name="pwd" placeholder="<?php _e("Password", "cpmobile"); ?>" tabindex="2" id="pwd" value="" /></label>
				<input type="hidden" name="rememberme" value="forever" />
				<input type="submit" id="logsub" name="submit" value="<?php _e("Login", "cpmobile"); ?>" tabindex="3" />
				<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
			<a href="javascript:return false;"><img class="head-close" src="<?php echo compat_get_plugin_url( 'cpmobile' ); ?>/themes/core/core-images/head-close.png" alt="close" /></a>
			</form>
		</div>
	</div>
<?php } ?>
 <!-- #start The Search Overlay -->
	<div id="cpmobile-search"> 
 		<div id="cpmobile-search-inner">
 		<!-- Toni +2.0 -->
			<form method="get" id="searchform" action="<?php echo home_url('/'); ?>/">
				<input type="text" placeholder="<?php _e( "Search...", "cpmobile" ); ?>" name="s" id="s" /> 
				<input name="submit" type="submit" tabindex="1" id="search-submit" placeholder="<?php _e("Search...", "cpmobile"); ?>"  />
			<a href="javascript:return false;"><img class="head-close" src="<?php echo compat_get_plugin_url( 'cpmobile' ); ?>/themes/core/core-images/head-close.png" alt="close" /></a>
			</form>
		</div>
	</div>

	<div id="cpmobile-menu" class="dropper"> 		
        <div id="cpmobile-menu-inner">
	        <div id="menu-head">
	        	<div id="tabnav">
					<a href="#head-pages"><?php _e("Menu", "cpmobile"); ?></a>
		        	<?php if (cp_is_tags_button_enabled()) { cpmobile_tags_link(); } ?>
	    	    	<?php if (cp_is_cats_button_enabled()) { cpmobile_cats_link(); } ?>
	    	    	<?php if (cp_is_login_button_enabled()) { ?>
						<?php if (!is_user_logged_in()) { ?>
						    <a id="loginopen" href="#head-account"><?php _e( "Login", "cpmobile" ); ?></a>
						<?php } else { ?>
							 <a href="#head-account"><?php _e( "My Options", "cpmobile" ); ?></a>
						<?php } ?>
					<?php } ?>
	        	</div>
	
				<ul id="head-pages">
					<?php rb_cpmobile_core_header_home(); ?>            
					<?php rb_cpmobile_core_header_pages(); ?>
					<?php rb_cpmobile_core_header_rss(); ?>
					<?php rb_cpmobile_core_header_email(); ?>           
				</ul>
	
	    	    <?php if (cp_is_cats_button_enabled()) { ?>
					<ul id="head-cats">
		  	 			<?php cp_get_ordered_cat_list( 35 ); ?>
					</ul>
				<?php } ?>
	
	    	    <?php if (cp_is_tags_button_enabled()) { ?>
					<ul id="head-tags">
						<li><?php cpmobile_ordered_tag_list( 35 ); ?></li>
					</ul>
				<?php } ?>

	<?php if (cp_is_login_button_enabled()) { ?>
			<ul id="head-account">
				<?php if (!is_user_logged_in()) { ?>
				    <li class="text">
				    	<?php _e( "Enter your username and password<br />in the boxes above.", "cpmobile" ); ?>
						<?php if ( !get_option('comment_registration') ) : ?>
							<br /><br />
							<?php _e( "Not registered yet?", "cpmobile"); ?>
							<br />
							<?php echo sprintf(__( "Please, register in the full site.", "cpmobile" ));
							// Temporary fix to avoid the spam
							//echo sprintf(__( "You can %ssign-up here%s.", "cpmobile" ), '<a href="' . get_bloginfo('wpurl') . '/wp-login.php?action=register" target="_blank">','</a>'); 
							?>
						<?php endif; ?>
				    </li>
				<?php } else { ?>
					<?php if (is_user_logged_in()) { ?>
					<li><a href="<?php $version = (float)get_bloginfo('version'); if ($version >= 2.7) { ?><?php echo wp_logout_url($_SERVER['REQUEST_URI']); } else { bloginfo('wpurl'); ?>/wp-login.php?action=logout&redirect_to=<?php echo $_SERVER['REQUEST_URI']; ?><?php } ?>"><?php _e( "Logout", "cpmobile" ); ?></a></li>
					<?php } ?>
				<?php } ?>
			</ul>
		<?php } ?>
			</div>
		</div>
    </div>

	
<div id="headerbar">
	<div id="headerbar-title">
		<!-- This fetches the admin selection logo icon for the header, which is also the bookmark icon -->
		<a href="<?php echo home_url('/'); ?>"><img id="logo-icon" src="<?php echo cp_get_title_image(); ?>" alt="<?php $str = cp_get_header_title(); echo stripslashes($str); ?>" /></a> 
		
		<a href="<?php echo home_url('/'); ?>"><?php cpmobile_core_body_sitetitle(); ?></a>
		
	</div>
	<div id="headerbar-menu">
		    <a href="javascript:return false;"></a>
	</div>
</div>
<div id="drop-fade">
	<?php if (cp_is_search_enabled()) { ?>			    
    	<a id="searchopen" class="top" href="javascript:return false;"><?php _e( 'Search', 'cpmobile' ); ?></a>
	<?php } ?>
	
	<?php if (cp_is_prowl_direct_message_enabled()) { ?>			    
    	<a id="prowlopen" class="top" href="javascript:return false;"><?php _e( 'Message', 'cpmobile' ); ?></a>
	<?php } ?>

	<?php if ( function_exists( 'wordtwit_get_recent_tweets' ) && wordtwit_is_valid() && cp_can_show_tweets() ) { ?>		    
    	<a id="wordtwitopen" class="top" href="javascript:return false;"><?php _e( 'Twitter', 'cpmobile' ); ?></a>
	<?php } ?>

	<?php if ( function_exists( 'gigpress_shows' ) && cp_is_gigpress_enabled()) { ?>			    
    	<a id="gigpressopen" class="top" href="javascript:return false;"><?php _e( 'Tour Dates', 'cpmobile' ); ?></a>
	<?php } ?>
	
<!--	<a href="<?php //echo CP_ADD_NEW_URL ?>" data-rel="dialog">Open dialog</a> -->
	
 <!-- #start the Prowl Message Area -->
 <div id="prowl-message" style="display:none">
 	 <div id="push-style-bar"></div><!-- filler to get the styling just right -->
	 <img src="<?php echo compat_get_plugin_url( 'cpmobile' ); ?>/themes/core/core-images/push-icon.png" alt="push icon" />
	 <h4><?php _e( 'Send a Message', 'cpmobile' ); ?></h4>
	 <p><?php _e( 'This message will be pushed to the admin\'s iPhone instantly.', 'cpmobile' ); ?></p>
	 
	 <form id="prowl-direct-message" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	 	<p>
	 		<input name="prowl-msg-name"  id="prowl-msg-name" type="text" />
	 		<label for="prowl-msg-name"><?php _e( 'Name', 'cpmobile' ); ?></label>
	 	</p>

		<p>
			<input name="prowl-msg-email" id="prowl-msg-email" type="text" />
			<label for="prowl-msg-email"><?php _e( 'E-Mail', 'cpmobile' ); ?></label>
		</p>

		<textarea name="prowl-msg-message"></textarea>
		<input type="hidden" name="cpmobile-prowl-message" value="1" /> 
		<input type="hidden" name="_nonce" value="<?php echo wp_create_nonce( 'cpmobile-prowl' ); ?>" />			
		<input type="submit" name="prowl-submit" value="<?php _e('Send Now', 'cpmobile' ); ?>" id="prowl-submit" />
	 </form>
	<div class="clearer"></div>
 </div>

<?php if ( function_exists( 'wordtwit_get_recent_tweets' ) && wordtwit_is_valid() && cp_can_show_tweets() ) { ?>
 <!-- #start the WordTwit Twitter Integration -->
 	<?php $tweets = wordtwit_get_recent_tweets(); ?>

	<div id="cpmobile-wordtwit" class="dropper" style="display:none">
 	 <div id="twitter-style-bar"></div><!-- filler to get the styling just right -->
			<a  id="follow-arrow" href="http://twitter.com/<?php echo wordtwit_get_username(); ?>" target="_blank"><img src="<?php echo compat_get_plugin_url( 'cpmobile' ); ?>/themes/core/core-images/twitter-arrow.jpg" alt="follow me" /></a>
		<div id="wordtwit-avatar">
			<img src="<?php echo wordtwit_get_profile_url(); ?>" alt="Twitter Avatar" />
				<p class="twitter_username"><?php echo wordtwit_get_username(); ?></p>
				<p><a href="http://twitter.com/<?php echo wordtwit_get_username(); ?>" target="_blank"><?php _e( 'Follow me on Twitter', 'cpmobile' ); ?></a></p>
		</div>

		<?php $now = time(); ?>
		<ul id="tweets">
			<?php if ( $tweets ) { ?>
				<?php foreach( $tweets as $tweet ) { ?>
				<li>
					<?php echo strip_tags( $tweet['content'], ''); ?>
					<p class="time"><?php echo wordtwit_friendly_date( $tweet['published'] ); ?></p>
				</li>
		  	 	<?php } ?>
		  	 <?php } else { ?>
		  	 	<li><?php _e( "No recent Tweets.", "cpmobile" ); ?><br /><br /></li>

		  	 <?php } ?>
		</ul>
</div>
<?php } ?>

<?php if (function_exists ('gigpress_shows')) { ?>
 <!-- #start the GigPress Area -->
	 <div id="cpmobile-gigpress" class="dropper" style="display:none">
	 	 <div id="gigpress-style-bar"></div><!-- filler to get the styling just right -->
		 <img src="<?php echo compat_get_plugin_url( 'cpmobile' ); ?>/themes/core/core-images/gigpress.png" id="music-icon" alt="GigPress" />
		 <h4><?php _e( 'Upcoming Tour Dates', 'cpmobile' ); ?></h4>		
			<?php
			    $options = array('scope' => 'upcoming', 'limit' => 10);
			    echo gigpress_shows($options);
			?>
	 </div>
 <?php } ?>
</div>

<?php cpmobile_core_header_check_use(); ?>
<?php global $app_abbr; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title(''); ?></title>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('feedburner_url') <> "" ) echo get_option('feedburner_url'); else echo get_bloginfo_rss('rss2_url').'?post_type='.APP_POST_TYPE; ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="http://www.jetsetmag.com/marketplace.css">
    <?php if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script('comment-reply'); ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php appthemes_before(); ?>



<div style="position:relative; width: 940px; text-align:center; margin-left:auto; margin-right:auto; z-index:1;"><img src="http://www.jetsetmag.com/images/jetsetheader.jpg" alt="Jetset Magazine"><br><embed src="http://www.jetsetmag.com/jetset-header.swf" width="940" height="317"></embed></div>
  
<div id="" class="">

<div class="marketplace" style="position:relative; width: 940px; margin-left:auto; margin-right:auto; text-align:center; z-index:11; background:#000;">
<ul id="nav">
<li><a href="http://www.jetsetmag.com/index.html" title="Home"><strong>&nbsp;&nbsp;HOME&nbsp;&nbsp;</strong></a></li>
<li><a href="http://www.jetsetmag.com/about.html#nav"><strong>ABOUT</strong></a></li>
<li><a href="http://www.jetsetmag.com/video.html#nav"><strong>VIDEO</strong></a></li>
<li><a href="http://www.jetsetmag.com/interviews.html#nav"><strong>INTERVIEWS</strong></a></li>
<li><a href="http://www.jetsetmag.com/jetset-marketplace.html#nav"><strong>MARKETPLACE</strong></a></li>
<li><a href="http://www.jetsetmag.com/top-5.html#nav"> <strong>TOP 5</strong></a></li>
<li><a href="http://www.jetsetmag.com/events.html#nav" > <strong>EVENTS</strong></a></li>
<li><a href="http://www.jetsetmag.com/subscribe.html#nav"><strong>SUBSCRIBE</strong></a></li>
<li><a href="http://www.jetsetmag.com/advertise.html#nav"><strong>ADVERTISE</strong></a></li>
<li><a href="http://www.jetsetmag.com/contact.html#nav"><strong>CONTACT</strong></a></li>
</ul>

<div style="line-height:15px; color:#d5d5d5; z-index:11;">
<img src="http://www.jetsetmag.com/lux-listings.jpg" style="border-top:solid 10px #000;">
<hr size="4" color="#d5d5d5" style="width:925px;">
<div style="width:110px; height:40px; position: relative; float:left; padding-left:25px; padding-top:5px;"><a href="http://www.jetsetmag.com/jetset-marketplace.html#nav" style="opacity:1;filter:alpha(opacity=100)"onmousedown="this.style.opacity=0.1;this.filters.alpha.opacity=10"
onmouseover="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100" onClick="window.location.reload( true );"><img src="http://www.jetsetmag.com/classified-home.jpg"></a></div>

<div style="width:110px; height:40px; position: relative; float:right; padding-right:25px; padding-top:3px; padding-bottom:5px;">
<a href="http://www.jetsetmag.com/post-ad.html#nav" style="opacity:1;filter:alpha(opacity=100)"onmousedown="this.style.opacity=0.1;this.filters.alpha.opacity=10"
onmouseover="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100;"><img style="padding-bottom:3px;" src="http://www.jetsetmag.com/sign-in.jpg"></a>

<a href="http://www.jetsetmag.com/post-ad.html#nav" style="opacity:1;filter:alpha(opacity=100)"onmousedown="this.style.opacity=0.1;this.filters.alpha.opacity=10"
onmouseover="this.style.opacity=0.4;this.filters.alpha.opacity=40"
onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"><img src="http://www.jetsetmag.com/submit.jpg"></a></div>



<a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-autos/" class="subnav3">Luxury Autos</a> - 
<a href="http://www.jetsetmag.com/classifieds/ad-category/private-jets-for-sale/" class="subnav3">Jets</a> - 
<a href="http://www.jetsetmag.com/classifieds/ad-category/yachts/" class="subnav3">Yachts</a> - 
<a href="http://www.jetsetmag.com/classifieds/ad-category/helicopters/" class="subnav3">Helicopters</a> - 
<a href="http://www.jetsetmag.com/classifieds/ad-category/motorcycles/" class="subnav3">Motorcycles</a> - 
<a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-real-estate/" class="subnav3">Real Estate</a> -
<a href="http://www.jetsetmag.com/classifieds/ad-category/watches/" class="subnav3">Watches &amp; Jewelry</a>

<hr size="1" color="#d5d5d5" width="630">

<a href="http://www.jetsetmag.com/classifieds/ad-category/charter/" class="subnav3">Charter Services</a> -
<a href="http://www.jetsetmag.com/classifieds/ad-category/vacation-rentals/" class="subnav3">Vacation Rentals</a> - 
<a href="http://www.jetsetmag.com/classifieds/ad-category/art-and-collectibles/" class="subnav3">Art &amp; Collectibles</a> - 
<a href="http://www.jetsetmag.com/classifieds/ad-category/exclusive-products/" class="subnav3">Exclusive Products</a> - 
<a href="http://www.jetsetmag.com/classifieds/ad-category/events/" class="subnav3">Auctions &amp; Events</a>
<hr size="4" color="#d5d5d5" style="width:925px;">
</div>
</div>
</div>

<div style="margin-left:auto; margin-right:auto; width:150px; position:relative;left:390px;top:-650px;z-index:2; font-family:Verdana, Geneva, sans-serif; font-size:9px; vertical-align:middle;">
<a href="http://www.twitter.com/jetsetonline" target="_blank"><img src="http://www.jetsetmag.com/twitter.png" border="0" style="position: relative; left:5px;" alt="Jetset Magazine Twitter"></a>
<a href="http://www.youtube.com/user/jetsetmagazine" target="_blank"><img src="http://www.jetsetmag.com/youtube.png" border="0" style="position: relative; left:5px;" alt="Jetset Magazine on YouTube"></a><a href="http://www.facebook.com/pages/Jetset-Magazine/247858190983" target="_blank"><img src="http://www.jetsetmag.com/facebook.png" border="0" style="position: relative; left:5px;" alt="Jetset Magazine on Facebook"></a>
&nbsp;
<iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/JetsetOnline" scrolling="no" frameborder="0" style="border:none; width:50px; height:25px"></iframe>
<br>
</div>  

        <div class="container">

		    <?php if ( get_option('cp_debug_mode') == 'yes' ) { ?><div class="debug"><h3><?php _e('Debug Mode On','appthemes'); ?></h3><?php print_r($wp_query->query_vars); ?></div><?php } ?>

	        <?php include_once( TEMPLATEPATH . '/includes/theme-searchbar.php' ); ?>
       


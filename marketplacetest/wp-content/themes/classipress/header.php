<?php global $app_abbr; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?></title>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<meta http-equiv="X-UA-Compatible" content="IE=10" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('feedburner_url') <> "" ) echo get_option('feedburner_url'); else echo get_bloginfo_rss('rss2_url').'?post_type='.APP_POST_TYPE; ?>" />
<link rel="shortcut icon" href="http://www.jetsetmag.com/favicon.ico" />
<link rel="icon" type="image/gif" href="http://www.jetsetmag.com/j.gif">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" href="http://www.jetsetmag.com/marketplace.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="utf-8"></script>
<script src="http://www.jetsetmag.com/jquery.roundabout.js"></script>
<script>
   $(document).ready(function() {
      $('ul#slider').roundabout();
   });
</script>


    <?php if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script('comment-reply'); ?>

    <?php wp_head(); ?>
    
<style type="text/css">
#box {
	position: absolute; margin-top: 0px; margin-right: 0px; width: 380px; margin-left: 520px;
}
#box.fixed {
position:fixed; width:380px; z-index:100; bottom:81px; margin-left:520px;
}
#box_ad {
	position: absolute; margin-top: 0px; margin-right: 0px; width: 380px; margin-top:487px;
}
#box_ad.fixed {
position:fixed; width:380px; z-index:100; bottom:96px; 
}
#box_category {
position: absolute; margin-top: 0px; margin-right: 0px; width: 380px; margin-left: 570px;
}
#box_category.fixed{
position:fixed; width:380px; z-index:100; bottom:83px; margin-left:570px;
}
div.article a:link {text-decoration:none;}     

div.article a:visited {text-decoration:none;}  

div.article a:hover {text-decoration:underline; color:#9A9A9A;} 

div.article a:active {text-decoration:none;}  
</style>
</head>

<body style="background-image:url(http://www.jetsetmag.com/images/bg.jpg); background-repeat:repeat-y; opacity: 1; background-attachment:scroll; background-position:center; background-color:#000; overflow-x: hidden; position:relative;" <?php body_class(); ?>>


<!--Start VisitorTrack Code 4.0-->
<script type="text/javascript">
imgsrc = location.protocol + '//www.visitortracklog.com/loghit.asp?id=108278&vr=4.0&rp=' + escape(document.referrer) + '&pa=' + escape(document.URL);
document.write('<img border="0" alt="" src="' + imgsrc + '">');
</script>
<!--End VisitorTrack Code-->

    <?php appthemes_before(); ?>



<div style="position:relative; width: 940px; text-align:center; margin-left:auto; margin-right:auto; z-index:1;"><img src="http://www.jetsetmag.com/images/jetset-marketplace-header.jpg" alt="Jetset Magazine"><br><div class="top_storage" >
<?php
//define directory
$domain = "http://".($_SERVER["SERVER_NAME"]);
$g_url = $_SERVER['REQUEST_URI'];
$root = $_SERVER['DOCUMENT_ROOT'];

if (strpos($g_url, '/events/') !== false)  {
     $topdir = '/ads/events/top/';
}
elseif (strpos($g_url, '/luxury-real-estate/') !== false)  {
     $topdir = '/ads/real-estate/top/';
}
elseif  (strpos($g_url, '/yachts/') !== false)  {
     $topdir = '/ads/index/top/';
} 
elseif (strpos($g_url, '/luxury-autos/') !== false)  {
     $topdir = '/ads/autos/top/';
}
elseif (strpos($g_url, '/private-jets-for-sale/') !== false)  {
     $topdir = '/ads/aviation/top/';
}
elseif (strpos($g_url, '/watches/') !== false)  {
     $topdir = '/ads/watches-jewelry/top/';
}
elseif (strpos($g_url, '/fashion/') !== false)  {
     $topdir = '/ads/index/top/';
}
elseif (strpos($g_url, '/exclusive-products/') !== false)  {
     $topdir = '/ads/executive/top/';
}
elseif (strpos($g_url, '/art-and-collectibles/') !== false)  {
     $topdir = '/ads/home-design/top/';
}
elseif (strpos($g_url, '/charter/') !== false)  {
     $topdir = '/ads/executive/top/';
}
elseif (strpos($g_url, '/motorcycles/') !== false)  {
     $topdir = '/ads/autos/top/';
} 
elseif (strpos($g_url, '/helicopters/') !== false)  {
     $topdir = '/ads/autos/top/';
} 
else  {
     $topdir = '/ads/index/top/';
}
//open directory
if ($opendir = opendir($root.$topdir)){
//read directory
 while(($file = readdir($opendir))!= FALSE ){
  if($file!="." && $file!= ".."){
	  $topimgfile[]= $domain.$topdir.$file;
	   }
	  sort($topimgfile);
 }
}
 $topimglength = count($topimgfile);
  for($x=0; $x < $topimglength; $x++){
	$topsize = getimagesize($topimgfile[$x], $info);
  if(isset($info['APP13'])){
    $iptc = iptcparse($info['APP13']);
    $toplink = $iptc['2#120'][0];
	$toplinks[] = $toplink;
  }
  }
  for($x=0; $x < $topimglength; $x++){
 echo "<a href='$toplinks[$x]' target='_blank' ><img src='$topimgfile[$x]' alt='$domain' /></a>";
  }
$topfirstimage = $topimgfile[0];
$topfirstimagesize = getimagesize($topfirstimage);
?>
</div>
<div class="top" style="width:<?php echo $topsize[0]; ?>px; height:<?php echo $topsize[1]; ?>px; margin-top:-8px;"></div>

<!-- Advertisement Animation----------------------------------------------->
<script type="text/javascript">
$(document).ready(function() {
	firstimage= $('div.storage a:first').clone();
	$("div.ad a").fadeIn("fast");
	 $('div.ad').html(firstimage);
	 $("div.ad a").delay(6600).fadeOut("slow");
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	firstimage= $('div.top_storage a:first').clone();
	$("div.top a").fadeIn("fast");
	 $('div.top').html(firstimage);
	 $("div.top a").delay(6600).fadeOut("slow");
});
</script>

<script type="text/javascript">
$(document).ready(function() {
var speed = 8000;
var timer = setInterval(replaceImage, speed);
var images =  $('div.top_storage a').clone();
var length = images.length;
var index = 1;
function replaceImage() {
	$("div.top a").fadeIn("slow");
	 $('div.top').html(images.eq(index));
	 $("div.top a").delay(6600).fadeOut("slow");
    index++;
	  if (index >= length) {
		  index=0;
     }	 
	}
});
</script>
<script type="text/javascript">
$(document).ready(function() {
var speed = 8000;
var timer = setInterval(replaceImage, speed);
var images =  $('div.storage a').clone();
var length = images.length;
var index = 1;
function replaceImage() {
	$("div.ad a").fadeIn("fast");
	 $('div.ad').html(images.eq(index));
	 $("div.ad a").delay(6600).fadeOut("slow");
    index++;
	  if (index >= length) {
		  index=0;
     }	 
	}
});
</script>
<!-- Flash Advertisement Animation----------------------------------------------->
</div></div>
  
  
<div class="marketplace" style="position:relative; width: 940px; margin-left:auto; margin-right:auto; text-align:center; z-index:11; background:#000;">
<span id="nav2">
<ul id="nav" style="margin-bottom: 7px;">
<li><a href="http://www.jetsetmag.com/index.html" title="Home"><strong>&nbsp;&nbsp;HOME&nbsp;&nbsp;</strong></a></li>
<li><a href="http://www.jetsetmag.com/about.html"><strong>ABOUT</strong></a></li>
<li><a href="http://www.jetsetmag.com/marketplace.html"><strong>MARKETPLACE</strong></a></li>
<li><a href="http://www.jetsetmag.com/newsroom"><strong>NEWSROOM</strong></a></li>
<li><a href="http://www.jetsetmag.com/top-5.html"> <strong>TOP 5</strong></a></li>
<li><a href="http://www.jetsetmag.com/jetset-tv.html"><strong>JETSET TV</strong></a></li>
<li><a href="http://www.jetsetmag.com/events.html" > <strong>EVENTS</strong></a></li>
<li><a href="http://www.jetsetmag.com/subscribe.html"><strong>SUBSCRIBE</strong></a></li>
<li><a href="http://www.jetsetmag.com/advertise.html"><strong>ADVERTISE</strong></a></li>
<li><a href="http://www.jetsetmag.com/contact.html"><strong>CONTACT</strong></a></li>
</ul>
</span>

<div class="market_nav2">
    
    <ul id="list-inline-market-nav">
		<li><a href="http://www.jetsetmag.com/classifieds/ad-category/private-jets-for-sale/#nav2" data-tag="jets"><img src="http://www.jetsetmag.com/marketplace/aviation.jpg" alt="Private Jets For Sale" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2" style="padding-top:6px;"><a href="http://www.jetsetmag.com/classifieds/ad-category/private-jets-for-sale/#nav2" data-tag="jets">Aircraft</a></div></div></li>
        
        <li><a href="http://www.jetsetmag.com/classifieds/ad-category/art-and-collectibles/#nav2" data-tag="art"><img src="http://www.jetsetmag.com/marketplace/art-collectables.jpg" alt="Arts and Collectibles For sale" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2"><a href="http://www.jetsetmag.com/classifieds/ad-category/art-and-collectibles/#nav2" data-tag="art">Art &amp; Collectibles</a></div></div></li>

		<li><a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-autos/#nav2" data-tag="autos"><img src="http://www.jetsetmag.com/marketplace/autos.jpg" alt="Luxury Automobiles For Sale" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2" style="padding-top:6px;"><a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-autos/#nav2" data-tag="autos">Automobiles</a></div></div></li>
        
        <li><a href="http://www.jetsetmag.com/classifieds/ad-category/lifestyle-2/#nav2" data-tag="lifestyle"><img src="http://www.jetsetmag.com/marketplace/lifestyle.jpg" alt="Exclusive Lifestyle Products and Services For Sale" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2" style="padding-top:6px;"><a href="http://www.jetsetmag.com/classifieds/ad-category/lifestyle-2/#nav2" data-tag="lifestyle">Lifestyle</a></div></div></li>

		<li><a href="http://www.jetsetmag.com/classifieds/ad-category/motorcycles/#nav2" data-tag="motorcycles"><img src="http://www.jetsetmag.com/marketplace/motorcycles.jpg"  alt="Motorcycles For Sale" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2" style="padding-top:6px;"><a href="http://www.jetsetmag.com/classifieds/ad-category/motorcycles/#nav2" data-tag="motorcycles">Motorcycles</a></div></div></li>

		<li><a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-real-estate/#nav2" data-tag="real_estate"><img src="http://www.jetsetmag.com/marketplace/real-estate.jpg"  alt="Luxury Real Estate For Sale" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2" style="padding-top:6px;"><a href="http://www.jetsetmag.com/classifieds/ad-category/luxury-real-estate/#nav2" data-tag="real_estate">Real Estate</a></div></div></li>
        
        <li><a href="http://www.jetsetmag.com/classifieds/ad-category/travel-2/#nav2" data-tag="travel"><img src="http://www.jetsetmag.com/marketplace/travel.jpg" alt="Luxury Travel and Excursions" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2"><a href="http://www.jetsetmag.com/classifieds/ad-category/travel-2/#nav2" data-tag="travel">Travel &amp; Excursions</a></div></div></li>
        
        <li><a href="http://www.jetsetmag.com/classifieds/ad-category/watches/#nav2" data-tag="watches"><img src="http://www.jetsetmag.com/marketplace/watches.jpg" alt="Luxury Watches and Jewelry For Sale" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2"><a href="http://www.jetsetmag.com/classifieds/ad-category/watches/#nav2" data-tag="watches">Watches &amp; Jewelry</a></div></div></li>
        
        <li><a href="http://www.jetsetmag.com/classifieds/ad-category/yachts/#nav2" data-tag="yachts"><img src="http://www.jetsetmag.com/marketplace/yachts.jpg" alt="Yachts For Sale" style="border:#d5d5d5 solid 2px; width:103px; height:105px;" /></a><div class="market_nav_bannertext"><div class="market_nav_bannertext2" style="padding-top:6px;"><a href="http://www.jetsetmag.com/classifieds/ad-category/yachts/#nav2" data-tag="yachts">Yachts</a></div></div></li>    
	</ul>

</div>

<ul style="margin-left:auto; margin-right:auto" id="nav" class="sf-js-enabled">
<li style="width:22%; display:block; background-color:#d5d5d5;margin-left:6px;"><a href="http://www.jetsetmag.com/marketplace.html" title="Home" style="padding-left:42px;padding-right:42px;"><strong>MARKETPLACE HOME</strong></a></li>
<li style="width:10%;display:block; background-color:#d5d5d5;"><a href="http://www.jetsetmag.com/classifieds/add-new/" style="padding-left:21px;padding-right:21px;"><strong>POST AD</strong></a></li>
<li style="width:14%;display:block; background-color:#d5d5d5;"><a href="http://www.jetsetmag.com/classifieds/dashboard/" style="padding-left:26px;padding-right:26px;"><strong>MANAGE ADS</strong></a></li>
<li style="width:14%;display:block; background-color:#d5d5d5;"><a href="http://www.jetsetmag.com/classifieds/profile/" style="padding-left:24px;padding-right:24px;"> <strong>EDIT PROFILE</strong></a></li>
<li style="width:12%;display:block; background-color:#d5d5d5;"><a href="http://www.jetsetmag.com/classifieds/wp-login.php?action=login" style="padding-left:35px;padding-right:35px;"><strong>LOG IN</strong></a></li>
<li style="width:12%;display:block; background-color:#d5d5d5;"><a href="http://www.jetsetmag.com/classifieds/wp-login.php?action=logout&amp;_wpnonce=eef9da6c3d" style="padding-left:31px;padding-right:31px;"><strong>LOG OUT</strong></a></li>
<li style="width:11%;display:block; background-color:#d5d5d5; margin-right:7px;"><a href="http://www.jetsetmag.com/classifieds/wp-login.php?action=register" style="padding-left:28.5px;padding-right:28.5px;"> <strong>REGISTER</strong></a></li>
</ul>
</div>


</div>
</div>
</div>

<div style="margin-left:auto; margin-right:auto; width:240px; position:relative; left:350px; top:-578px; z-index:2; font-family:Verdana, Geneva, sans-serif; font-size:9px; vertical-align:middle;">

	<!-- AddThis Follow BEGIN -->
    <p style="text-align:center; text-shadow:1px 1px 1px #000000; font-size:10px;">Follow Jetset Magazine</p>
    <div>
        <a href="http://www.facebook.com/JetsetOnline" target="_blank" title="Follow Jetset Magazine on Facebook"><img style="border:none; width:26px; height:26px; text-shadow:1px 1px 1px #828282;" width="26" height="26" border="0" src="http://www.jetsetmag.com/images/social-icons/facebook-32x32.png" /></a>
        <a href="https://www.twitter.com/JetsetOnline" target="_blank" title="Follow Jetset Magazine on Twitter"><img style="border:none; width:26px; height:26px; text-shadow:1px 1px 1px #828282;" width="26" height="26" border="0" src="http://www.jetsetmag.com/images/social-icons/twitter-32x32.png" /></a>
        <a href="http://www.linkedin.com/company/jetset-magazine" target="_blank" title="Follow Jetset Magazine on Linkedin"><img style="border:none; width:26px; height:26px; text-shadow:1px 1px 1px #828282;" width="26" height="26" border="0" src="http://www.jetsetmag.com/images/social-icons/linkedin-32x32.png" /></a>
        <a href="https://plus.google.com/111625090156735611851" target="_blank" title="Follow Jetset Magazine on Google"><img style="border:none; width:26px; height:26px; text-shadow:1px 1px 1px #828282;" width="26" height="26" border="0" src="http://www.jetsetmag.com/images/social-icons/google-32x32.png" /></a>
        <a href="http://www.youtube.com/user/JetsetMagazine" target="_blank" title="Follow Jetset Magazine on YouTube"><img style="border:none; width:26px; height:26px; text-shadow:1px 1px 1px #828282;" width="26" height="26" border="0" src="http://www.jetsetmag.com/images/social-icons/youtube-32x32.png" /></a>
        <a href="http://www.pinterest.com/jetsetmagazine" target="_blank" title="Follow Jetset Magazine on Pinterest"><img style="border:none; width:26px; height:26px; text-shadow:1px 1px 1px #828282;" width="26" height="26" border="0" src="http://www.jetsetmag.com/images/social-icons/pinterest-32x32.png" /></a>
        <a href="http://instagram.com/jetsetmag" target="_blank" title="Follow Jetset Magazine on Instagram"><img style="border:none; width:26px; height:26px; text-shadow:1px 1px 1px #828282;" width="26" height="26" border="0" src="http://www.jetsetmag.com/images/social-icons/instagram-32x32.png" /></a>
        <a href="http://www.jetsetmag.com/newsroom/feed/" target="_blank" title="Subscribe to Jetset Magazine RSS"><img style="border:none; width:26px; height:26px; text-shadow:1px 1px 1px #828282;" width="26" height="26" border="0" src="http://www.jetsetmag.com/images/social-icons/rss-32x32.png" /></a>
        <div class="atclear"></div>
    </div>
    <!-- AddThis Follow END -->
    
    <div style="margin-top:4px; text-align:center;">
        <a style="padding-left:5px; font-size:10px;" href="http://www.jetsetmag.com/classifieds/wp-login.php?action=login">Login</a>&nbsp;&nbsp;
        <a style="padding-left:5px; font-size:10px;" href="http://www.jetsetmag.com/classifieds/wp-login.php?action=logout&_wpnonce=eef9da6c3d">Logout</a>&nbsp;
        <a style="padding-left:5px; font-size:10px;" href="http://www.jetsetmag.com/view-magazines.html#nav">View Issues</a>&nbsp;
    </div>
    
</div>

        <div class="container" style="margin-top:-50px;">

		    <?php if ( get_option('cp_debug_mode') == 'yes' ) { ?><div class="debug"><h3><?php _e('Debug Mode On','appthemes'); ?></h3><?php print_r($wp_query->query_vars); ?></div><?php } ?>

	             


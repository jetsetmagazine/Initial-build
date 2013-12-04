<script type="text/javascript">
$(function () { 
  var msie6 = $.browser == 'msie' && $.browser.version < 7;
  if (!msie6) {
    var top = $('#box').offset().top;
    $(window).scroll(function (event) {
      var y = $(this).scrollTop();
      if (y >= top) { $('#box').addClass('fixed'); }

	  else { $('#box').removeClass('fixed'); }
	  
    });
  }
});
</script>
<script src="http://www.jetsetmag.com/jquery.roundabout.js"></script>
<script>
   $(document).ready(function() {
      $('ul#slider').roundabout();
   });
</script>
<div class="content_right" id="box">

    <?php if ( is_home() ) { 

        $current_user = wp_get_current_user();
        ?>
        
    <?php } // is_home ?>


    <?php if ( is_tax( APP_TAX_CAT ) ) {

		// go get the taxonomy category id so we can filter with it
		// have to use slug instead of name otherwise it'll break with multi-word cats
		//if ( !isset( $filter ) )
			$filter = '';
			
		//$ad_cat_array = get_term_by( 'slug', get_query_var(APP_TAX_CAT), APP_TAX_CAT, ARRAY_A, $filter );

        // build the advanced sidebar search
        cp_show_refine_search( $ad_cat_array['term_id'] ); 
         
        // show all subcategories if any 
		//$subcats = wp_list_categories( 'hide_empty=0&orderby=name&show_count=1&title_li=&use_desc_for_title=1&echo=0&show_option_none=0&taxonomy='.APP_TAX_CAT.'&depth=1&child_of=' . $ad_cat_array['term_id'] );
		
		if ( !empty( $subcats ) ) : 
		?>
			<div class="shadowblock_out">
			
				<div class="shadowblock">
				
					<h2 class="dotted"><?php _e('Sub Categories', 'appthemes') ?></h2>

					<ul>
						<?php print_r( $subcats ); ?>
					</ul>

					<div class="clr"></div>
					
				</div><!-- /shadowblock -->
				
			</div><!-- /shadowblock_out -->
			
		<?php endif; ?>

    <?php } // is_tax ?>
      

    <?php appthemes_before_sidebar_widgets(); ?>
        
        <div class="shadowblock_out">
        
            <div class="shadowblock">
	    <div class="storage" >
<?php
//define directory
$domain = "http://".($_SERVER["SERVER_NAME"]);
$g_url = $_SERVER['REQUEST_URI'];
$root = $_SERVER['DOCUMENT_ROOT'];

if (strpos($g_url, '/art-and-collectibles/') !== false)  {
     $dir = '/ads/home-design/sidebar/';
	 }
elseif (strpos($g_url, '/charter/') !== false)  {
     $dir = '/ads/executive/sidebar/';
}
elseif (strpos($g_url, '/events/') !== false)  {
     $dir = '/ads/marketplace/events/sidebar/';
}
elseif (strpos($g_url, '/exclusive-products/') !== false)  {
     $dir = '/ads/executive/sidebar/';
}
elseif (strpos($g_url, '/fashion/') !== false)  {
     $dir = '/ads/fashion/sidebar/';
}
elseif (strpos($g_url, '/helicopters/') !== false)  {
     $dir = '/ads/aviation/sidebar/';
}
elseif (strpos($g_url, '/lifestyle-2/') !== false)  {
     $dir = '/ads/lifestyle/sidebar/';
}
elseif (strpos($g_url, '/luxury-autos/') !== false)  {
     $dir = '/ads/autos/sidebar/';
}
elseif (strpos($g_url, '/luxury-real-estate/') !== false)  {
     $dir = '/ads/real-estate/sidebar/';
}
elseif (strpos($g_url, '/motorcycles/') !== false)  {
     $dir = '/ads/autos/sidebar/';
}
elseif (strpos($g_url, '/private-jets-for-sale/') !== false)  {
     $dir = '/ads/aviation/sidebar/';
}
elseif (strpos($g_url, '/travel-2/') !== false)  {
     $dir = '/ads/travel/sidebar/';
}
elseif (strpos($g_url, '/watches/') !== false)  {
     $dir = '/ads/watches-jewelry/sidebar/';
}
elseif  (strpos($g_url, '/yachts/') !== false)  {
     $dir = '/ads/yachts/sidebar/';
}
else  {
     $dir = '/ads/marketplace/index/sidebar/';
}
//open directory
if ($opendir = opendir($root.$dir)){
//read directory
 while(($file = readdir($opendir))!= FALSE ){
  if($file!="." && $file!= ".."){
	  $imgfile[]= $domain.$dir.$file;
	  }
	  sort($imgfile);
 }
}
 $imglength = count($imgfile);
  for($x=0; $x < $imglength; $x++){
	$size = getimagesize($imgfile[$x], $info);
  if(isset($info['APP13'])){
    $iptc = iptcparse($info['APP13']);
    $link = $iptc['2#120'][0];
	$links[] = $link;
  }
  }

  for($x=0; $x < $imglength; $x++){
 echo "<a href='$links[$x]' target='_blank' ><img src='$imgfile[$x]' alt='$domain' /></a>";
  }
$firstimage = $imgfile[0];
$firstimagesize = getimagesize($firstimage);
?>
</div>

<div class="ad" style="width:<?php echo $size[0]; ?>px; height:<?php echo $size[1]; ?>px;"> </div>
<br />
<hr />
<br />

</div><!-- /shadowblock_out -->

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_main') ) : else : ?>

<!-- <object style="z-index:1; width:100%; height:100%; border:none;" data="http://www.jetsetmag.com/marketplace/slider.html" ></object>
<br /> -->

        <!-- no dynamic sidebar setup -->
    
        <div class="shadowblock_out">
        
            <div class="shadowblock">
            
              <h2 class="dotted"><?php _e('BlogRoll', 'appthemes') ?></h2>
    
              <ul>
                  <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
              </ul>
    
                <div class="clr"></div>
                
            </div><!-- /shadowblock -->
            
          </div><!-- /shadowblock_out -->
    
    
         <div class="shadowblock_out">
         
            <div class="shadowblock">
            
              <h2 class="dotted"><?php _e('Meta', 'appthemes') ?></h2>
    
              <ul>
                  <?php wp_register(); ?>
                  <li><?php wp_loginout(); ?></li>
                  <li><a target="_blank" href="http://www.appthemes.com/" title="Premium WordPress Themes">AppThemes</a></li>
                  <li><a target="_blank" href="http://wordpress.org/" title="Powered by WordPress">WordPress</a></li>
                  <?php wp_meta(); ?>
              </ul>
    
                <div class="clr"></div>
                
            </div><!-- /shadowblock -->
            
          </div><!-- /shadowblock_out -->
    
    <?php endif; ?>

    <?php appthemes_after_sidebar_widgets(); ?>
    
<!--Floating Menu-->
<div id="covers" style="margin-left:10px; margin-top:-95px; border:none; width:345px;"> 
<script src="http://www.jetsetmag.com/jquery.roundabout.js"></script> 
<script>
// <![CDATA[
   $(document).ready(function() {
      $('ul#slider').roundabout();
   });
   // ]]>
</script> 

<!--BEGIN SLIDER-->
<ul id="slider">
	<li><a href="http://www.jetsetmag.com/interviews/leonardo-dicaprio.html#nav" target="_blank" title="2013 Issue 6"><img src="http://www.jetsetmag.com/covers/24.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/richard-branson.html#nav" target="_blank" title="2013 Issue 5"><img src="http://www.jetsetmag.com/covers/23.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/categories/executive/elon-musk.html#nav" target="_blank" title="2013 Issue 4"><img src="http://www.jetsetmag.com/covers/22.jpg" alt="Jetset Magazine" /></a></li>
	<li><a href="http://www.jetsetmag.com/interviews/reba-mcentire-interview.html#nav" target="_blank" title="2013 Issue 3"><img src="http://www.jetsetmag.com/covers/21.jpg" alt="Jetset Magazine" /></a></li>
	<li><a href="http://www.jetsetmag.com/interviews/jon-bon-jovi-interview.html#nav" target="_blank" title="2013 Issue 2"><img src="http://www.jetsetmag.com/covers/19.jpg" alt="Jetset Magazine" /></a></li>
	<li><a href="http://www.jetsetmag.com/interviews/dwayne-wade-interview.html#nav" target="_blank" title="2013 Issue 1"><img src="http://www.jetsetmag.com/covers/18.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/james-bond.html#nav" target="_blank" title="2012 Issue 6"><img src="http://www.jetsetmag.com/covers/17.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/melania-trump.html#nav" target="_blank" title="2012 Issue 5"><img src="http://www.jetsetmag.com/covers/16.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/kathy-ireland.html#nav" target="_blank" title="2012 Issue 4"><img src="http://www.jetsetmag.com/covers/15.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/bret-michaels-interview.html#nav" target="_blank" title="2012 Issue 3"><img src="http://www.jetsetmag.com/covers/4.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/daymond-john.html#nav" target="_blank" title="2012 Issue 2"><img src="http://www.jetsetmag.com/covers/3.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/katy-perry-interview.html#nav" target="_blank" title="2012 Issue 1"><img src="http://www.jetsetmag.com/covers/14.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/patrick-dempsey-interview.html#nav" target="_blank" title="2011 Issue 6"><img src="http://www.jetsetmag.com/covers/7.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/robert-kiyosaki.html#nav" target="_blank" title="2011 Issue 5"><img src="http://www.jetsetmag.com/covers/6.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/mark-cuban.html#nav" target="_blank" title="2011 Issue 4"><img src="http://www.jetsetmag.com/covers/10.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/mario-lopez.html#nav" target="_blank" title="2011 Issue 3"><img src="http://www.jetsetmag.com/covers/11.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/jennifer-lopez.html#nav" target="_blank" title="2011 Issue 2"><img src="http://www.jetsetmag.com/covers/13.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews.html#nav" target="_blank" title="2011 Issue 1"><img src="http://www.jetsetmag.com/covers/9.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/pam-anderson.html#nav" target="_blank" title="2010 Issue 6"><img src="http://www.jetsetmag.com/covers/8.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews.html#nav" target="_blank" title="2010 Issue 5"><img src="http://www.jetsetmag.com/covers/20.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/mark-cuban.html#nav" target="_blank" title="2010 Issue 4"><img src="http://www.jetsetmag.com/covers/12.jpg" alt="Jetset Magazine" /></a></li>
	<li><a href="http://www.jetsetmag.com/interviews/halle-berry.html#nav" target="_blank" title="2010 Issue 3"><img src="http://www.jetsetmag.com/covers/1.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/donald-trump.html#nav" target="_blank" title="2010 Issue 2"><img src="http://www.jetsetmag.com/covers/2.jpg" alt="Jetset Magazine" /></a></li>
    <li><a href="http://www.jetsetmag.com/interviews/shaq-shaquille-oneal.html#nav" target="_blank" title="2010 Issue 1"><img src="http://www.jetsetmag.com/covers/5.jpg" alt="Jetset Magazine" /></a></li>
</ul><!-- END SLIDER-->

              <p style="text-align:center; margin-left:-6px;"><a href="http://www.jetsetmag.com/subscribe.html#nav"><img src="http://www.jetsetmag.com/subs.jpg" alt="Subscribe" /></a>&nbsp;<a href="http://www.jetsetmag.com/access.html#nav"><img src="http://www.jetsetmag.com/vci.jpg" alt="View Current Issues of Jetset Magazine" /></a></p>
              
              <hr style="width:330px;" />

<!-- Email Subscription Form -->
<form style="margin-left:0px; text-align:center;" method="post" action="http://na03.mypinpointe.com/form.php?form=257" id="frmSS257" onsubmit="return CheckForm257(this);" class="myForm">
	<table border="0" cellpadding="2" class="myForm" style="width:330px;">
		<tr style="width:330px; height:35px; line-height:12px;">
			<td colspan="2" style="height:35px; line-height:12px"><span style="font-size:10px; margin-bottom:25px;"><strong>Enter your Name and Email Address Below To Receive<br />Updates and Exclusive Offers</strong></span></td>
		</tr>	
        <tr style="width:330px; height:16px; line-height:16px;">
			<td style="height:16px; line-height:16px"><span style="font-size:10px;"><strong>First-Name:</strong></span></td>
            <td style="height:16px; line-height:16px"><span style="font-size:10px;"><strong>Last-Name:</strong></span></td>
        </tr>
    	<tr style="width:330px;">
			<td><input style="width:151px; margin-left:8px; margin-right:0px; margin-bottom:5px;" type="text" name="CustomFields[4]" id="CustomFields_4_257" value="" size='64' maxlength='64' required="required"></td>
			<td><input style="width:151px; margin-left:0px; margin-right:8px; margin-bottom:5px;" type="text" name="CustomFields[6]" id="CustomFields_6_257" value="" size='64' maxlength='64' required="required"></td>
		</tr>
        <tr style="width:330px; height:16px; line-height:16px;" height="10">
			<td colspan="2" style="height:16px; line-height:16px" height="10"><span style="font-size:10px;"><strong>Email Address:</strong></span></td>
        </tr>
        <tr style="width:330px;">
			<td colspan="2"><input style="width:312px; margin-left:9px; margin-right:9px;" type="text" name="email" value="" required="required" /></td>
		</tr>
        <tr style="width:330px;">
			<td colspan="2"><input style="width:120px; margin-top:5px; vertical-align:middle;" type="submit" value="Subscribe" /></td>
		</tr>
	</table>
</form>

<!-- Email Subscription Script -->
<script type="text/javascript">
// <![CDATA[
	function CheckMultiple257(frm, name) {
		for (var i=0; i < frm.length; i++)
		{fldObj = frm.elements[i];
			fldId = fldObj.id;
			if (fldId) {
				var fieldnamecheck=fldObj.id.indexOf(name);
				if (fieldnamecheck != -1) {
					if (fldObj.checked) {
						return true; } } } }
		return false; }
	function CheckForm257(f) {
	var email_re = /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
	if (!email_re.test(f.email.value)) {
		alert("Please enter your email address.");
		f.email.focus();
		return false; }
		return true; }
// ]]>
</script>

</div><!-- /content_right -->
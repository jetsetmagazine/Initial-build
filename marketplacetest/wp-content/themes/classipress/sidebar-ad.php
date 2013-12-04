<?php
global $current_user, $app_abbr, $gmap_active;

// make sure google maps has a valid address field before showing tab
$custom_fields = get_post_custom(); 
if ( !empty($custom_fields[$app_abbr.'_zipcode']) || !empty($custom_fields[$app_abbr.'_country']) || 
	!empty($custom_fields[$app_abbr.'_state']) || !empty($custom_fields[$app_abbr.'_city']) || 
	!empty($custom_fields[$app_abbr.'_street']) ) {
	$gmap_active = true; 
}

?>

<script type="text/javascript">
$(function () { 
  var msie6 = $.browser == 'msie' && $.browser.version < 7;
  if (!msie6) {
    var top = $('#box_ad').offset().top;
    $(window).scroll(function (event) {
      var y = $(this).scrollTop();
      if (y >= top) { $('#box_ad').addClass('fixed'); }

	  else { $('#box_ad').removeClass('fixed'); }
	  
    });
  }
});
</script>

<!-- right sidebar -->
<div class="content_right">

    <div class="tabprice">

    <?php if ( $gmap_active ) { ?>
    
        <div id="priceblock1">	    		<!-- tab 1 -->
        <ul class="tabnavig">
          <?php if ( $gmap_active ) { ?>
              <li><span class="big"><?php _e('Map', 'appthemes') ?></span></li>
          <?php } ?>
          </ul>

            <div class="clr"></div>

                <div class="singletab" style="width:335px;;">

                    <?php include_once ( TEMPLATEPATH . '/includes/sidebar-gmap.php' ); ?>

                </div><!-- /singletab -->

        </div><!-- tab 1 -->
        
    <?php } ?>       
      
        <!-- tab 2 -->

        <div id="priceblock3">

          <div class="clr"></div>

          <div class="postertab" style="margin-top:10px;">

            <div class="priceblocksmall">

                <p class="member-title"><?php _e('Information about the Member','appthemes');?></p>

                <div id="userphoto">
                    <p class='image-thumb'><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php appthemes_get_profile_pic( get_the_author_meta('ID'), get_the_author_meta('user_email'), 64 ) ?></a></p>
                </div>

                <ul class="member">

					<li><span><?php _e('Listed by:','appthemes');?></span>
						<?php
							// check to see if ad is legacy or not
							if ( get_post_meta($post->ID, 'name', true) ) {
								if ( get_the_author() != '' ) { ?>
									<a href="<?php echo get_author_posts_url(get_the_author_id()); ?>"><?php the_author_meta('display_name'); ?></a>
							<?php
								} else {
									echo get_post_meta($post->ID, 'name', true);
								} ?>

					  <?php } else { ?>
									<a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author_meta('display_name'); ?></a>
						<?php
							}
						?>
					</li>

					<li><span><?php _e('Member Since:','appthemes');?></span> <?php echo date_i18n( get_option('date_format'), strtotime( get_the_author_meta('user_registered') ) ); ?></li>

              </ul>

              <div class="pad5"></div>

              <div class="clr"></div>

            </div>
                        
			<a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>" class="btn"><span><?php _e('Latest items listed by','appthemes'); ?> <?php the_author_meta('display_name'); ?> &raquo;</span></a>

		 </div><!-- /singletab -->

        </div><!-- /priceblock2 -->
<div id="box_ad" style="margin-top:10px; margin-bottom:-2px;">
<div class="storage" >
<?php
//define directory
$domain = "http://".($_SERVER["SERVER_NAME"]);
$g_url = $_SERVER['REQUEST_URI'];
$root = $_SERVER['DOCUMENT_ROOT'];
$dir = '/ads/marketplace/index/sidebar/';

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

<div class="ad" style="width:<?php echo $size[0]; ?>px; height:<?php echo $size[1]; ?>px;"></div>

</div>
</div><!-- /tabprice -->   


<?php appthemes_before_sidebar_widgets(); ?>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_listing') ) : else : ?>

<!-- no dynamic sidebar so don't do anything -->

<?php endif; ?>

<?php appthemes_after_sidebar_widgets(); ?>


</div><!-- /content_right -->

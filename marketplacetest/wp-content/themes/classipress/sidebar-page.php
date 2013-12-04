<!-- right block -->
<script type="text/javascript">
$(function () { 
  var msie6 = $.browser == 'msie' && $.browser.version < 7;
  if (!msie6) {
    var top = $('#box_category').offset().top;
    $(window).scroll(function (event) {
      var y = $(this).scrollTop();
      if (y >= top) { $('#box_category').addClass('fixed'); }

	  else { $('#box_category').removeClass('fixed'); }
	  
    });
  }
});
</script>
<div class="content_right" id="box_category">

    <?php appthemes_before_sidebar_widgets(); ?>
	

    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_page') ) : else : ?>

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
                    <li><a href="http://www.appthemes.com/" title="Premium WordPress Themes">AppThemes</a></li>
                    <li><a href="http://wordpress.org/" title="Powered by WordPress">WordPress</a></li>
                    <?php wp_meta(); ?>
    
                </ul>
    
                <div class="clr"></div>
                
            </div><!-- /shadowblock -->
            
        </div><!-- /shadowblock_out -->

    <?php endif; ?>
    
    <?php appthemes_after_sidebar_widgets(); ?>

</div><!-- /content_right -->
<?PHP

/*-----------------------------------------------------------------------------------*/
/*	Ajax save callback
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_pinterestpro_tc_settings_save', 'pinterestpro_tc_settings_save');

function pinterestpro_tc_settings_save(){

	check_ajax_referer('pinterestpro_settings_secure', 'security');
	
        // Save the posted value in the database
		update_option('pinterestpro-api-enabled', $_POST['pinterestpro-api-enabled']);
		
}





/*-----------------------------------------------------------------------------------*/
/*	New framework settings page
/*-----------------------------------------------------------------------------------*/

function pinterestpro_settings_page() {

?>

<script>
	
jQuery(document).ready(function(){

/*-----------------------------------------------------------------------------------*/
/*	Options Pages and Tabs
/*-----------------------------------------------------------------------------------*/
	  
	jQuery('.options_pages li').click(function(){
		
		var tab_page = 'div#' + jQuery(this).attr('id');
		var old_page = 'div#' + jQuery('.options_pages li.active').attr('id');
		
		// Change button class
		jQuery('.options_pages li.active').removeClass('active');
		jQuery(this).addClass('active');
				
		// Set active tab page
		jQuery(old_page).fadeOut('slow', function(){
			
			jQuery(tab_page).fadeIn('slow');
			
		});
		
	});
	
/*-----------------------------------------------------------------------------------*/
/*	Form Submit
/*-----------------------------------------------------------------------------------*/
	
	jQuery('form#plugin-options').submit(function(){
			
		var data = jQuery(this).serialize();
		
		jQuery.post(ajaxurl, data, function(response){
			
			if(response == 0){
				
				// Flash success message and shadow
				var success = jQuery('#success-save');
				var bg = jQuery("#message-bg");
				success.css("position","fixed");
				success.css("top", ((jQuery(window).height() - 65) / 2) + jQuery(window).scrollTop() + "px");
				success.css("left", ((jQuery(window).width() - 257) / 2) + jQuery(window).scrollLeft() + "px");
				bg.css({"height": jQuery(window).height()});
				bg.css({"opacity": .45});
				bg.fadeIn("slow", function(){
					success.fadeIn('slow', function(){
						success.delay(1500).fadeOut('fast', function(){
							bg.fadeOut('fast');
						});
					});
				});
								
			} else {
				
				//error out
				
			}
		
		});
				  
		return false;
	
	});	
	
/*-----------------------------------------------------------------------------------*/
/*	Finished
/*-----------------------------------------------------------------------------------*/
	
});

</script>

<div id="message-bg"></div>
<div id="success-save"></div>

<div id="tc_framework_wrap">

	<div id="header">
    	<h1>Pinterest Pro Settings</h1>
        <span class="icon">&nbsp;</span>
    </div>
    
    <div id="content_wrap">
    
    	<form id="plugin-options" name="plugin-options" action="/">
        <?php settings_fields( 'pinterestpro-settings-group' ); ?>
        <input type="hidden" name="action" value="pinterestpro_tc_settings_save" />
        <input type="hidden" name="security" value="<?php echo wp_create_nonce('pinterestpro_settings_secure'); ?>" />
        
        	<div id="sub_header" class="info">
            
                <input type="submit" name="settingsBtn" id="settingsBtn" class="button-framework save-options" value="<?php _e('Save All Changes') ?>" />
                <span>Options Page</span>
                
            </div>
            
            <div id="content">
            
            	<div id="options_content">
                
                	<ul class="options_pages">
                    	<li id="general_options" class="active"><a href="#">API Settings</a><span></span></li>
                    </ul>
                    
                    <div id="general_options" class="options_page">
                    
                    	<div class="option">
                        	<h3>Enable / Disable API Loading</h3>
                            <div class="section">
                            	<div class="element"><select name="pinterestpro-api-enabled" id="pinterestpro-api-enabled" class="textfield">
                    <option value="true" <?PHP if(get_option('pinterestpro-api-enabled') == 'true'){echo 'selected="selected"';} ?>>Enabled</option>
                    <option value="false" <?PHP if(get_option('pinterestpro-api-enabled') == 'false'){echo 'selected="selected"';} ?>>Disabled</option>
                				</select></div>
                                <div class="description">Enable or disable the Pinterest API for this plugin.</div>
                            </div>
                        </div>  
                                                                        
                    </div>            
                                        
            		<br class="clear" />
                    
            </div>
            
            <div class="info bottom">
            
                <input type="submit" name="settingsBtn" id="settingsBtn" class="button-framework save-options" value="<?php _e('Save All Changes') ?>" />
            
            </div>
            
        </form>
        
    </div>

</div>

<?php } ?>
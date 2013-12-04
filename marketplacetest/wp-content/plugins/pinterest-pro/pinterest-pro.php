<?php 

/*
Plugin Name: Pinterest Pro for WordPress
Plugin Script: pinterest-pro.php
Plugin URI: http://tyler.tc
Description: Add full support for Pinterest follow and "Pin It" buttons to your site. Shortcodes, widgets, and template tag support!
Version: 1.0.1
Author: Tyler Colwell
Author URI: http://tyler.tc

--- THIS PLUGIN AND ALL FILES INCLUDED ARE COPYRIGHT © TYLER COLWELL 2011. 
YOU MAY NOT MODIFY, RESELL, DISTRIBUTE, OR COPY THIS CODE IN ANY WAY. ---

*/

/*-----------------------------------------------------------------------------------*/
/*	Define Anything Needed
/*-----------------------------------------------------------------------------------*/

define('PINTERESTPRO_LOCATION', WP_PLUGIN_URL . '/'.basename(dirname(__FILE__)));
define('PINTERESTPRO_PATH', plugin_dir_path(__FILE__));
require_once('inc/tcf_settings_page.php');
require_once('inc/pinit_widget.php');
require_once('inc/follow_widget.php');





/*-----------------------------------------------------------------------------------*/
/*	Menu Creation
/*-----------------------------------------------------------------------------------*/

// This is the function to create the options menu
function pinterestpro_create_menu() {
	
	// Adds the tab into the options panel in WordPress Admin area
	$page = add_options_page("Pinterest Pro for WordPress", "Pinterest Pro", 'administrator', __FILE__, 'pinterestpro_settings_page');

	//call register settings function
	add_action( 'admin_init', 'pinterestpro_register_settings' );
	
	// Hook style sheet loading
	add_action( 'admin_print_styles-' . $page, 'pinterestpro_admin_cssloader' );

}
		



		
/*-----------------------------------------------------------------------------------*/
/*	Add Admin CSS
/*-----------------------------------------------------------------------------------*/

// Add style sheet for plugin settings
function pinterestpro_settings_admin_css(){
				
	/* Register our stylesheet. */
	wp_register_style( 'pinterestproSettings', PINTERESTPRO_LOCATION.'/css/tc_framework.css' );
							
} function pinterestpro_admin_cssloader(){
	
	// It will be called only on your plugin admin page, enqueue our stylesheet here
	wp_enqueue_style( 'pinterestproSettings' );
	   
} // End admin style CSS





/*-----------------------------------------------------------------------------------*/
/*	Add tinyMCE Button
/*-----------------------------------------------------------------------------------*/
function pinterestpro_mce(){
	
	// Don't bother doing this stuff if the current user lacks permissions
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
	return;
	
	// Add only in Rich Editor mode
	if( get_user_option('rich_editing') == 'true'){
		
		// Add cutom button to TinyMCE
		add_filter('mce_external_plugins', "pinterestpro_mce_register");
		add_filter('mce_buttons', 'pinterestpro_add_button', 0);
		
	}
	
}
function pinterestpro_add_button($buttons) {
   array_push($buttons, "separator", "pinterestproplugin");
   return $buttons;
}
function pinterestpro_mce_register($plugin_array) {
   $plugin_array['pinterestproplugin'] = get_bloginfo('wpurl')."/wp-content/plugins/".basename(dirname(__FILE__))."/mce/mce_button.js";
   return $plugin_array;
} // end tinyMCE





/*-----------------------------------------------------------------------------------*/
/*	Shortcode Handler
/*-----------------------------------------------------------------------------------*/
function pinterestpro_handle($atts, $content) {
	
	// Extract variables from shortcode tag, set defaults
	extract(shortcode_atts(array(
		"type" => 'follow',
		"follow_name" => 'pinterest',
		"follow_size" => 'medium',
		"pin_url" => 'http://tyler.tc/',
		"pin_image_url" => 'http://tyler.tc/portfolio/wp-content/uploads/2011/05/logo1.png',
		"pin_counter" => 'horizontal',
		"pin_desc" => '',
	), $atts));
	
	// Configure button size
	switch($follow_size){
		
		// Small button
		case "small":
			$follow_image = '<img src="http://passets-cdn.pinterest.com/images/small-p-button.png" width="16" height="16" alt="Follow Me on Pinterest" />';
			break;

		// pill button
		case "pill":
			$follow_image = '<img src="http://passets-cdn.pinterest.com/images/pinterest-button.png" width="78" height="26" alt="Follow Me on Pinterest" />';
			break;

		// medium button
		case "medium":
			$follow_image = '<img src="http://passets-cdn.pinterest.com/images/follow-on-pinterest-button.png" width="156" height="26" alt="Follow Me on Pinterest" />';
			break;

		// pill button
		case "box":
			$follow_image = '<img src="http://passets-cdn.pinterest.com/images/big-p-button.png" width="61" height="61" alt="Follow Me on Pinterest" />';
			break;

	} // end button size switch
	
	
	// Build depending on type
	switch($type){
		
		case "follow":
			$pin = '<a href="http://pinterest.com/'.$follow_name.'/">'.$follow_image.'</a>';
			break;

		case "pinit":
			$pin = '<a href="http://pinterest.com/pin/create/button/?url='.urlencode($pin_url).'&media='.urlencode($pin_image_url).'&description='.urlencode($pin_desc).'" class="pin-it-button" count-layout="'.$pin_counter.'">Pin It</a>';
			break;
			
	} // end button switch
				
	return $pin;
											
}// End shortcode handler





/*-----------------------------------------------------------------------------------*/
/*	Template Tag Handler
/*-----------------------------------------------------------------------------------*/
function tc_pinterest_pro($options_array){
	
	// Create default settings just in case
	static $defaults = array(
		"type" => 'follow',
		"follow_name" => 'pinterest',
		"follow_size" => 'medium',
		"pin_url" => 'http://tyler.tc/',
		"pin_image_url" => 'http://tyler.tc/portfolio/wp-content/uploads/2011/05/logo1.png',
		"pin_counter" => 'horizontal',
		"pin_desc" => '',
	);
	
	// Merge defaults with user options
	$settings = array_merge($defaults, $options_array);
	
	// Extract new settings to variables
	extract($settings);
		
	// Configure button size
	switch($follow_size){
		
		// Small button
		case "small":
			$follow_image = '<img src="http://passets-cdn.pinterest.com/images/small-p-button.png" width="16" height="16" alt="Follow Me on Pinterest" />';
			break;

		// pill button
		case "pill":
			$follow_image = '<img src="http://passets-cdn.pinterest.com/images/pinterest-button.png" width="78" height="26" alt="Follow Me on Pinterest" />';
			break;

		// medium button
		case "medium":
			$follow_image = '<img src="http://passets-cdn.pinterest.com/images/follow-on-pinterest-button.png" width="156" height="26" alt="Follow Me on Pinterest" />';
			break;

		// pill button
		case "box":
			$follow_image = '<img src="http://passets-cdn.pinterest.com/images/big-p-button.png" width="61" height="61" alt="Follow Me on Pinterest" />';
			break;

	} // end button size switch
	
	
	// Build depending on type
	switch($type){
		
		case "follow":
			$pin = '<a href="http://pinterest.com/'.$follow_name.'/">'.$follow_image.'</a>';
			break;

		case "pinit":
			$pin = '<a href="http://pinterest.com/pin/create/button/?url='.urlencode($pin_url).'&media='.urlencode($pin_image_url).'&description='.urlencode($pin_desc).'" class="pin-it-button" count-layout="'.$pin_counter.'">Pin It</a>';
			break;
			
	} // end button switch
	
	// Output Button
	echo $pin;
		
} // end template tag function





/*-----------------------------------------------------------------------------------*/
/*	Bootstrapn' Time!
/*-----------------------------------------------------------------------------------*/
function pinterestpro_init() {
	
	// Make sure we are not in the admin section
	if (!is_admin()) {
		
		$api_enabled = get_option('pinterestpro-api-enabled');
		
		// include if enabled
		if($api_enabled == 'true'){
			
			wp_deregister_script('pinterest');
			wp_register_script('pinterest', 'http://assets.pinterest.com/js/pinit.js', false, 1.0, true);
			wp_enqueue_script('pinterest');
			
		}
		
	} // End if admin
	
	// Bootsrtap MCE
	pinterestpro_mce();
			
} // End jsloader function





/*-----------------------------------------------------------------------------------*/
/*	Register SEttings
/*-----------------------------------------------------------------------------------*/

function pinterestpro_register_settings(){
		
	// Register our settings
	register_setting( 'pinterestpro-settings-group', 'pinterestpro-api-enabled' );

	// Apply default options to settings
	add_option( 'pinterestpro-api-enabled', 'true' );

}





/*-----------------------------------------------------------------------------------*/
/*	Start Running Hooks
/*-----------------------------------------------------------------------------------*/

// Start the plugin
add_action('init', 'pinterestpro_init');
// Add the short code to WordPress
add_shortcode("pinterest-pro", "pinterestpro_handle");
// Add hook to include settings CSS
add_action( 'admin_init', 'pinterestpro_settings_admin_css' );
// create custom plugin settings menu
add_action( 'admin_menu', 'pinterestpro_create_menu' );

?>
<?php
/*
Plugin Name: CPMobile
Plugin URI: http://store.classipro.com/plugins-services/classipress-mobile
Version: 1.1
Description: A plugin which formats your site with a mobile theme for visitors on Apple <a href="http://www.apple.com/iphone/">iPhone</a> / <a href="http://www.apple.com/ipodtouch/">iPod touch</a>, <a href="http://www.android.com/">Google Android</a>, <a href="http://www.blackberry.com/">Blackberry Storm and Torch</a>, <a href="http://www.palm.com/us/products/phones/pre/">Palm Pre</a> and other touch-based smartphones.
Author: Classipro (Toni & Rubencio)
Author URI: http://classipro.com
Text Domain: cpmobile
Domain Path: /lang
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html

# Thanks to ContentRobot and the iWPhone theme/plugin
# which the detection feature of the plugin was based on.
# (http://iwphone.contentrobot.com/)

# Also thanks to Henrik Urlund, who's "Prowl Me" plugin inspired
# the Push notification additions.
# (http://codework.dk/referencer/wp-plugins/prowl-me/)
*/


if (function_exists('load_plugin_textdomain'))
	load_plugin_textdomain( 'cpmobile', false, dirname( plugin_basename( __FILE__ ) ) );

global $cp_cpmobile_version;
$cp_cpmobile_version = '1.1';

require_once( 'include/plugin.php' );
require_once( 'include/compat.php' );

define( 'CPMOBILE_PROWL_APPNAME', 'cpmobile');
define( 'CPMOBILE_ATOM', 1 );

if (!defined('APP_POST_TYPE'))
    define('APP_POST_TYPE', 'ad_listing');

if (!defined('APP_TAX_CAT'))
    define('APP_TAX_CAT', 'ad_cat');

if (!defined('APP_TAX_TAG'))
    define('APP_TAX_TAG', 'ad_tag');
    
if ( !function_exists( 'get_bloginfo' ) )
    require( '../../../wp-blog-header.php' );

//The cpmobile Settings Defaults
global $cpmobile_defaults;
$cpmobile_defaults = array(
	'header-title' => get_bloginfo('name'),
	'main_title' => 'Default.png',
	'enable-post-excerpts' => true,
	'enable-page-coms' => false,
	'enable-zoom' => false,
	'enable-cats-button' => true,
	'enable-tags-button' => true,
	'enable-search-button' => true,
	'enable-login-button' => false,
	'enable-gravatars' => true,
	'enable-main-home' => true,
	'enable-main-rss' => true,
	'enable-main-name' => true,
	'enable-main-tags' => true,
	'enable-main-categories' => true,
	'enable-main-email' => true,
	'enable-truncated-titles' => true,
	'prowl-api' => '',
	'enable-prowl-comments-button' => false,
	'enable-prowl-users-button' => false,
	'enable-prowl-message-button' => false,
	'header-background-color' => '000000',
	'header-border-color' => '333333',
	'header-text-color' => 'eeeeee',
	'link-color' => '006bb3',
	'post-cal-thumb' =>'post-thumbnails',
	'h2-font' =>'Helvetica Neue',
	'style-text-justify' => 'left-justified',
	'style-background' => 'classic-cpmobile-bg',
	'style-icon' => 'glossy-icon',
	'enable-regular-default' => false,
	'excluded-cat-ids' => '',
	'excluded-tag-ids' => '',
	'custom-footer-msg' => 'All content Copyright '. get_bloginfo('name') . '',
	'home-page' => 0,
	'enable-exclusive' => true,
	'sort-order' => 'name',
	'adsense-id' => '',
	'statistics' => '',
	'adsense-channel' => '',
	'custom-user-agents' => array(),
	'enable-show-comments' => true,
	'enable-show-tweets' => false,
	'enable-gigpress-button' => false,
	'enable-flat-icon' => false,
	'cpmobile-language' => 'auto',
	'enable-twenty-eleven-footer' => 0,
	'enable-fixed-header' => false,
	'ad_service' => 'adsense',
	'show_powered_by' => false
);

function cpmobile_get_plugin_dir_name() {
	global $cpmobile_plugin_dir_name;
	return $cpmobile_plugin_dir_name;
}

function cpmobile_delete_icon( $icon ) {
	if ( !current_user_can( 'manage_options' ) ) {
		// don't allow users non administrators to delete files (security check)
		return;	
	}
			
	$dir = explode( 'cpmobile', $icon );
	$loc = compat_get_upload_dir() . "/cpmobile/" . ltrim( $dir[1], '/' );

	$real_location = realpath( $loc );
	if ( strpos( $real_location, WP_CONTENT_DIR ) !== false ) {
		unlink( $loc );
	}
}

add_action( 'cpmobile_load_locale', 'load_cpmobile_languages' );

function load_cpmobile_languages() {	
	$settings = cp_cpmobile_get_settings();
	
	$cpmobile_dir = compat_get_plugin_dir( 'cpmobile' );
	if ( $cpmobile_dir ) {
		if ( isset( $settings['cpmobile-language'] ) ) {
			if ( $settings['cpmobile-language'] == 'auto' ) {
				// check the locale	
				$locale = get_locale();
				
				if ( file_exists( $cpmobile_dir . '/lang/' . $locale . '.mo' ) ) {
					load_textdomain( 'cpmobile', $cpmobile_dir . '/lang/' . $locale . '.mo' );
				}
			} else {
				if ( file_exists( $cpmobile_dir . '/lang/' . $settings['cpmobile-language'] . '.mo' ) ) {
					load_textdomain( 'cpmobile', $cpmobile_dir . '/lang/' . $settings['cpmobile-language'] . '.mo' );
				} else if ( file_exists( WP_CONTENT_DIR . '/cpmobile/lang/' . $settings['cpmobile-language'] . '.mo' ) ) {
					load_textdomain( 'cpmobile', WP_CONTENT_DIR . '/cpmobile/lang/' . $settings['cpmobile-language'] . '.mo' );
				}	
			}	
		}	
	}	
}

function cpmobile_init() {	
	
	if ( isset( $_GET['delete_icon'] ) ) {
		$nonce = $_GET['nonce'];
		if ( !wp_verify_nonce( $nonce, 'cpmobile_delete_nonce' )  ) {
			die( 'Security Failure' );
		} else {
			cpmobile_delete_icon( $_GET['delete_icon'] );
			header( 'Location: ' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=cpmobile/cpmobile.php#available_icons' );
			die;
		}
	}
	
	if ( !is_admin() ) {
		do_action( 'cpmobile_load_locale' );	
		ad_listings_post_type(); // patch toni
	
	}
}

// patch toni
function ad_listings_post_type()
{
 	$app_abbr= 'cp';

    // get the slug value for the ad custom post type & taxonomies
    if(get_option($app_abbr.'_post_type_permalink')) $post_type_base_url = get_option($app_abbr.'_post_type_permalink'); else $post_type_base_url = 'ads';
    if(get_option($app_abbr.'_ad_cat_tax_permalink')) $cat_tax_base_url = get_option($app_abbr.'_ad_cat_tax_permalink'); else $cat_tax_base_url = 'ad-category';
    if(get_option($app_abbr.'_ad_tag_tax_permalink')) $tag_tax_base_url = get_option($app_abbr.'_ad_tag_tax_permalink'); else $tag_tax_base_url = 'ad-tag';

    // register the new post type
    register_post_type( APP_POST_TYPE,
        array( 'labels' => array(
            'name' => __( 'Ads', 'appthemes' ),
            'singular_name' => __( 'Ad', 'appthemes' ),
            'add_new' => __( 'Add New', 'appthemes' ),
            'add_new_item' => __( 'Create New Ad', 'appthemes' ),
            'edit' => __( 'Edit', 'appthemes' ),
            'edit_item' => __( 'Edit Ad', 'appthemes' ),
            'new_item' => __( 'New Ad', 'appthemes' ),
            'view' => __( 'View Ads', 'appthemes' ),
            'view_item' => __( 'View Ad', 'appthemes' ),
            'search_items' => __( 'Search Ads', 'appthemes' ),
            'not_found' => __( 'No ads found', 'appthemes' ),
            'not_found_in_trash' => __( 'No ads found in trash', 'appthemes' ),
            'parent' => __( 'Parent Ad', 'appthemes' ),
            ),
            'description' => __( 'This is where you can create new classified ads on your site.', 'appthemes' ),
            'public' => true,
            'show_ui' => true,
	    'has_archive' => true,
            'capability_type' => 'post',
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_position' => 8,
            'menu_icon' => FAVICON,
            'hierarchical' => false,
            'rewrite' => array( 'slug' => $post_type_base_url, 'with_front' => false ),
            'query_var' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky' ),
            )
);

    // register the new ad category taxonomy
    register_taxonomy( APP_TAX_CAT,
            array(APP_POST_TYPE),
            array('hierarchical' => true,
                  'labels' => array(
                        'name' => __( 'Ad Categories', 'appthemes'),
                        'singular_name' => __( 'Ad Category', 'appthemes'),
                        'search_items' =>  __( 'Search Ad Categories', 'appthemes'),
                        'all_items' => __( 'All Ad Categories', 'appthemes'),
                        'parent_item' => __( 'Parent Ad Category', 'appthemes'),
                        'parent_item_colon' => __( 'Parent Ad Category:', 'appthemes'),
                        'edit_item' => __( 'Edit Ad Category', 'appthemes'),
                        'update_item' => __( 'Update Ad Category', 'appthemes'),
                        'add_new_item' => __( 'Add New Ad Category', 'appthemes'),
                        'new_item_name' => __( 'New Ad Category Name', 'appthemes')
                    ),
                    'show_ui' => true,
                    'query_var' => true,
					'update_count_callback' => '_update_post_term_count',
                    'rewrite' => array( 'slug' => $cat_tax_base_url, 'with_front' => false, 'hierarchical' => true ),
            )
    );

    // register the new ad tag taxonomy
    register_taxonomy( APP_TAX_TAG,
            array(APP_POST_TYPE),
            array('hierarchical' => false,
                  'labels' => array(
                        'name' => __( 'Ad Tags', 'appthemes'),
                        'singular_name' => __( 'Ad Tag', 'appthemes'),
                        'search_items' =>  __( 'Search Ad Tags', 'appthemes'),
                        'all_items' => __( 'All Ad Tags', 'appthemes'),
                        'parent_item' => __( 'Parent Ad Tag', 'appthemes'),
                        'parent_item_colon' => __( 'Parent Ad Tag:', 'appthemes'),
                        'edit_item' => __( 'Edit Ad Tag', 'appthemes'),
                        'update_item' => __( 'Update Ad Tag', 'appthemes'),
                        'add_new_item' => __( 'Add New Ad Tag', 'appthemes'),
                        'new_item_name' => __( 'New Ad Tag Name', 'appthemes')
                    ),
                    'show_ui' => true,
                    'query_var' => true,
					'update_count_callback' => '_update_post_term_count',
                    'rewrite' => array( 'slug' => $tag_tax_base_url, 'with_front' => false ),
            )
    );

}

function cpmobile_include_ads() {
	global $cpmobile_plugin;
	$settings = cp_cpmobile_get_settings();
	
	// Check to make sure it's on a mobile site
	if ( cp_is_iphone() && $cpmobile_plugin->desired_view == 'mobile' ) {
		// Check which type of advertising the user has selected
		switch ( $settings['ad_service'] ) {
			case 'adsense':
				if ( isset( $settings['adsense-id'] ) && strlen( $settings['adsense-id'] ) && is_single() ) {
					global $cpmobile_settings;
					$cpmobile_settings = $settings;
					
					include( 'include/adsense-new.php' );
				}				
				break;
			case 'appstores':
				break;
			default:
				break;
		}
	}
}

function cpmobile_header_advertising() {
	global $cpmobile_plugin;
	$settings = cp_cpmobile_get_settings();

	// Only show for appstores ads
	if ( $settings['ad_service'] == 'appstores' ) {
		// Only show on mobile devices
		if ( cp_is_iphone() && $cpmobile_plugin->desired_view == 'mobile' && $settings['appstores_pub_id'] ) {
			$can_show_ad = false;
			
			switch( $settings['appstores_ad_pages'] ) {
				case 'blog':
					$can_show_ad = is_search() || is_home() || is_archive() || is_author() || is_category();
					break;
				case 'single':
					$can_show_ad = ( is_single() && !is_page() );
					break;
				case 'single_blog':
					$can_show_ad = ( is_single() && !is_page() ) || ( is_search() || is_home() || is_archive() || is_author() || is_category() );
					break;
				case 'single_page_blog':
					$can_show_ad = ( is_single() || is_page() || is_search() || is_home() || is_archive() || is_author() || is_category() );
					break;
				default:
					break;
			}
			
			// Show the ad
			if ( $can_show_ad ) {
				echo '<script src="http://' . $settings['appstores_pub_id'] . '.publishers.appstores.com/campaigns/widget_slot/widget_attrs[source]=js_campaign_widget" type="text/javascript" charset="utf-8"></script>';
			}
		}
	}
}


function cpmobile_content_filter( $content ) {
	global $cpmobile_plugin;
	$settings = cp_cpmobile_get_settings();
	if ( cp_is_iphone() && $cpmobile_plugin->desired_view == 'mobile' && isset($settings['adsense-id']) && strlen($settings['adsense-id']) && is_single() ) {
		global $cpmobile_settings;
		$cpmobile_settings = $settings;
		
		ob_start();
		include( 'include/adsense-new.php' );
		$ad_contents = ob_get_contents();
		ob_end_clean();
		
		return  '<div class="cpmobile-adsense-ad">' . $ad_contents . '</div>' . $content;	
	} else {
		return $content;
	}
}


// Version number for the admin header, footer
function cpmobile($before = '', $after = '') {
	global $cp_cpmobile_version;
	echo $before . 'cpmobile ' . $cp_cpmobile_version . $after;
}

// Stop '0' Comment Counts
function mobile_get_comment_count() {
	global $wpdb;
	global $post;
	
	$result = $wpdb->get_row( $wpdb->prepare( "SELECT count(*) as c FROM {$wpdb->comments} WHERE comment_type = '' AND comment_approved = 1 AND comment_post_ID = %d", $post->ID ) );
	if ( $result ) {
		return $result->c;
	} else {
		return 0;	
	}
}
	
	// cpmobile WP Thumbnail Support
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' ); // Add it for posts
}
	
	// cpmobile WP Thumbnail Support
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' ); // Add it for posts
}

//Add a link to 'Settings' on the plugin listings page
function cpmobile_settings_link( $links, $file ) {
 	if( $file == 'cpmobile/cpmobile.php' && function_exists( "admin_url" ) ) {
		$settings_link = '<a href="' . admin_url( 'options-general.php?page=cpmobile/cpmobile.php' ) . '">' . __('Settings') . '</a>';
		array_push( $links, $settings_link ); // after other links
	}
	return $links;
}
 
// cpmobile Admin JavaScript
function cpmobile_admin_enqueue_files() {		
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'cpmobile/cpmobile.php' ) {
		wp_enqueue_script( 'ajax-upload', compat_get_plugin_url( 'cpmobile' ) . '/js/ajax_upload.js', array( 'jquery' ) );
		wp_enqueue_script( 'jquery-colorpicker', compat_get_plugin_url( 'cpmobile' ) . '/js/colorpicker_1.4.js', array( 'ajax-upload' ) );
		wp_enqueue_script( 'jquery-fancybox', compat_get_plugin_url( 'cpmobile' ) . '/js/fancybox_1.2.5.js', array( 'jquery-colorpicker' ) );
		wp_enqueue_script( 'cpmobile-js', compat_get_plugin_url( 'cpmobile' ) . '/js/admin_1.9.js', array( 'jquery-fancybox' ) );
	
		
	}
}


// cpmobile Admin StyleSheets
function cpmobile_admin_files() {		
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'cpmobile/cpmobile.php' ) {
		echo "<script type='text/javascript' src='" . get_bloginfo( "url" ) . "/?cpmobile-ajax=js'></script>\n";
		echo "<link rel='stylesheet' type='text/css' href='" . compat_get_plugin_url( 'cpmobile' ) . "/admin-css/cpmobile-admin.css' />\n";
		echo "<link rel='stylesheet' type='text/css' href='" . compat_get_plugin_url( 'cpmobile' ) . "/admin-css/cp-global.css' />\n";
		echo "<link rel='stylesheet' type='text/css' href='" . compat_get_plugin_url( 'cpmobile' ) . "/admin-css/cp-compressed-global.css' />\n";
		
	}
}

function cpmobile_ajax_handler() {	
	if ( isset( $_GET['cpmobile-ajax'] ) ) {
		switch( $_GET['cpmobile-ajax'] ) {
			case 'js':
				header( 'Content-type: text/javascript' );
				$url = rtrim( get_bloginfo('wpurl'), '/' ) . '/';
				echo "var cpmobileBlogUrl = '" . $url . "';";
				break;		
			case 'news':
				include( WP_PLUGIN_DIR . '/cpmobile/ajax/news.php' );	
				break;
			default:
				break;
		}	
		die;
	}	
}

add_action( 'init', 'cpmobile_ajax_handler' );

function cp_cpmobile_get_exclude_user_agents() {
	$user_agents = array(
        'SCH-I800',
        'Xoom'	
	);
	
	return apply_filters( 'cpmobile_exclude_user_agents', $user_agents );
}

function cp_cpmobile_get_user_agents() {
	$useragents = array(		
		"iPhone",  				 	// Apple iPhone
		"iPod", 						// Apple iPod touch
		"iPad",
		"incognito", 				// Other iPhone browser
		"webmate", 				// Other iPhone browser
		"Android", 			 	// 1.5+ Android
		"dream", 				 	// Pre 1.5 Android
		"CUPCAKE", 			 	// 1.5+ Android
		"blackberry9500",	 	// Storm
		"blackberry9530",	 	// Storm
		"blackberry9520",	 	// Storm v2
		"blackberry9550",	 	// Storm v2
		"blackberry 9800",	// Torch
		"blackberry 9900",
		"webOS",					// Palm Pre Experimental
		"s8000", 				 	// Samsung Dolphin browser
		"bada",				 		// Samsung Dolphin browser
		"Googlebot-Mobile"	// the Google mobile crawler

	);
	
	$settings = cp_cpmobile_get_settings();
	if ( isset( $settings['custom-user-agents'] ) ) {
		foreach( $settings['custom-user-agents'] as $agent ) {
			if ( !strlen( $agent ) ) continue;
			
			$useragents[] = $agent;	
		}	
	}
	
	asort( $useragents );

	// cpmobile User Agent Filter
	$useragents = apply_filters( 'cpmobile_user_agents', $useragents );
	
	return $useragents;
}

function cp_cpmobile_is_prowl_key_valid() {
	require_once( 'include/class.prowl.php' );		
		
	$settings = cp_cpmobile_get_settings();
				
	if ( isset( $settings['prowl-api'] ) ) {
		$api_key = $settings['prowl-api'];
			
		$prowl = new Prowl( $api_key, cpmobile_PROWL_APPNAME );	
		$verify = $prowl->verify();
		return ( $verify === true );
	}
	
	return false;
}
  
class cpmobilePlugin {
	var $applemobile;
	var $desired_view;
	var $output_started;
	var $prowl_output;
	var $prowl_success;
		
	function cpmobilePlugin() {
		$this->output_started = false;
		$this->applemobile = false;
		$this->prowl_output = false;
		$this->prowl_success = false;

		// Don't change the template directory when in the admin panel
		add_action( 'plugins_loaded', array(&$this, 'detectAppleMobile') );
		if ( !is_admin() ) {
			add_filter( 'stylesheet', array(&$this, 'get_stylesheet') );
			add_filter( 'theme_root', array(&$this, 'theme_root') );
			add_filter( 'theme_root_uri', array(&$this, 'theme_root_uri') );
			add_filter( 'template', array(&$this, 'get_template') );	
		}			
		
		add_filter( 'init', array(&$this, 'cp_filter_iphone') );
		add_filter( 'wp', array(&$this, 'cp_do_redirect') );
		add_filter( 'wp', array( &$this, 'cp_check_switch_redirect') );
		add_filter( 'wp_head', array(&$this, 'cp_head') );
		add_filter( 'query_vars', array( &$this, 'cpmobile_query_vars' ) );
		add_filter( 'parse_request', array( &$this, 'cpmobile_parse_request' ) );
		add_action( 'comment_post', array( &$this, 'cpmobile_handle_new_comment' ) );
		add_action( 'user_register', array( &$this, 'cpmobile_handle_new_user' ) );
		
		$this->detectAppleMobile();
	}
	
	function cpmobile_cleanup_growl( $msg ) {
		$msg = str_replace("\r\n","\n", $msg);
		$msg = str_replace("\r","\n", $msg);
		return $msg;	
	}
	
	function cpmobile_output_supports_in_footer( $content ) {
		$mobile_string = sprintf( __( 'Mobile site by %s', 'cpmobile' ), '<a href="http://www.bravenewcode.com/cpmobile" title="Mobile iPhone and iPad Plugin for WordPress">cpmobile</a>' );
		$content = str_replace( 'WordPress</a>', 'WordPress</a><br />' . $mobile_string, $content );
		return $content;
	}
	
	function cpmobile_show_supports_in_footer() {
		ob_start( array( &$this, 'cpmobile_output_supports_in_footer' ) );	
	}
	
	function cpmobile_send_prowl_message( $title, $message ) {
		require_once( 'include/class.prowl.php' );		
		
		$settings = cp_cpmobile_get_settings();
				
		if ( isset( $settings['prowl-api'] ) ) {
			$api_key = $settings['prowl-api'];
			
			$prowl = new Prowl( $api_key, $settings['header-title'] );
				
			$this->prowl_output = true;
			$result = $prowl->add( 1, $title, $this->cpmobile_cleanup_growl( stripslashes( $message ) ) );	
			
			if ( $result ) {
				$this->prowl_success = true;
			} else {				
				$this->prowl_success = false;
			}		
		} else {
			return false;	
		}
	}
	
	function cpmobile_handle_new_comment( $comment_id, $approval_status = '1' ) {
		$settings = cp_cpmobile_get_settings();
		
		if ( $approval_status != 'spam' 
		&& isset( $settings['prowl-api'] ) 
		&& isset( $settings['enable-prowl-comments-button'])
		&& $settings['enable-prowl-comments-button'] == 1 ) {
			
			$api_key = $settings['prowl-api'];
			
			require_once( 'include/class.prowl.php' );
			$comment = get_comment( $comment_id );
			$prowl = new Prowl( $api_key, $settings['header-title'] );
			
			if ( $comment->comment_type != 'spam' && $comment->comment_approved != 'spam' ) {
				if ( $comment->comment_type == 'trackback' || $comment->comment_type == 'pingback' ) {
					$result = $prowl->add( 	1, 
						__( "New Ping/Trackback", "cpmobile" ),
						'From: '. $this->cpmobile_cleanup_growl( stripslashes( $comment->comment_author ) ) . 
						"\nPost: ". $this->cpmobile_cleanup_growl( stripslashes( $comment->comment_content ) ) 
					);			
			 	} else {
					$result = $prowl->add( 	1, 
						__( "New Comment", "cpmobile" ),
						'Name: '. $this->cpmobile_cleanup_growl( stripslashes( $comment->comment_author ) ) . 
						"\nE-Mail: ". $this->cpmobile_cleanup_growl( stripslashes( $comment->comment_author_email ) ) .
						"\nComment: ". $this->cpmobile_cleanup_growl( stripslashes( $comment->comment_content ) )
					);		 
			 	}
			}
		 }

	}

	function cpmobile_handle_new_user( $user_id ) {
		$settings = cp_cpmobile_get_settings();
		
		if ( isset( $settings['prowl-api'] ) 
		&& isset( $settings['enable-prowl-users-button'] ) 
		&& $settings['enable-prowl-users-button'] == 1 ) {

			global $wpdb;			
			$api_key = $settings['prowl-api'];
			require_once( 'include/class.prowl.php' );
			global $table_prefix;
			$sql = $wpdb->prepare( "SELECT * from " . $table_prefix . "users WHERE ID = %d", $user_id );
			$user = $wpdb->get_row( $sql );
			
			if ( $user ) {
				$prowl = new Prowl( $api_key, $settings['header-title'] );	
				$result = $prowl->add( 	1, 
					__( "User Registration", "cpmobile" ),
					'Name: '. $this->cpmobile_cleanup_growl( stripslashes( $user->user_login ) ) . 
					"\nE-Mail: ". $this->cpmobile_cleanup_growl( stripslashes( $user->user_email ) )
				);			
			}
		}
	}

	function cpmobile_query_vars( $vars ) {
		$vars[] = "cpmobile";
		return $vars;
	}
	
	function cpmobile_parse_request( $wp ) {
		if  (array_key_exists( "cpmobile", $wp->query_vars ) ) {
			switch ( $wp->query_vars["cpmobile"] ) {
				case "upload":
					include( 'ajax/file_upload.php' );	
					break;
			}
			exit;
		}	
	}

	function cp_head() {
		if ( $this->applemobile && $this->desired_view == 'normal' ) {
			echo "<link rel='stylesheet' type='text/css' href='" . compat_get_plugin_url( 'cpmobile' ) . "/themes/core/core-css/cpmobile-switch-link.css'></link>\n";
		}			
	}

	function cp_do_redirect() {
	   global $post;
				
		// check for cpmobile prowl direct messages	
		$nonce = '';
		if ( isset( $_POST['_nonce'] ) ) {
			$nonce = $_POST['_nonce'];	
		}
			
		if ( isset( $_POST['cpmobile-prowl-message'] ) && wp_verify_nonce( $nonce, 'cpmobile-prowl' )  ) {
			$name = $_POST['prowl-msg-name'];
			$email = $_POST['prowl-msg-email'];
			$msg = $_POST['prowl-msg-message'];
			
			$title = __( "Direct Message", "cpmobile" );
			$prowl_message = 'From: '. $this->cpmobile_cleanup_growl( $name ) . 
				"\nE-Mail: ". $this->cpmobile_cleanup_growl( $email ) .
				"\nMessage: ". $this->cpmobile_cleanup_growl( $msg );
				"\nIP: " . $_SERVER["REMOTE_ADDR"] .
				
			$this->cpmobile_send_prowl_message( $title, $prowl_message );
		}		   
	   
	   if ( $this->applemobile && $this->desired_view == 'mobile' ) {
			$version = (float)get_bloginfo('version');
			$is_front = 0;
			$is_front = (is_front_page() && (cp_get_selected_home_page() > 0));

			if ( $is_front ) {
	    	     $url = get_permalink( cp_get_selected_home_page() );
	        	 header('Location: ' . $url);
	         	die;
	   	     }
	   }
	}
	
	function cp_check_switch_redirect() {
		if ( isset( $_GET[ 'cpmobile_view'] ) && isset( $_GET['cpmobile_redirect'] ) ) {
			if ( isset( $_GET['cpmobile_redirect_nonce'] ) ) {
				$nonce = $_GET['cpmobile_redirect_nonce'];
				if ( !wp_verify_nonce( $nonce, 'cpmobile_redirect' ) ) {
					_e( 'Nonce failure', 'cpmobile' );
					die;
				}

				$protocol = ( $_SERVER['HTTPS'] == 'on' ) ? 'https://' : 'http://';
				$redirect_location = $protocol . $_SERVER['SERVER_NAME'] . $_GET['cpmobile_redirect'];
		
				header( 'Location: ' . $redirect_location );
				die;
			} 
		}		
	}

	function cp_filter_iphone() {	
		$key = 'cpmobile_switch_toggle';
		$time = time()+60*60*24*365; // one year
		$url_path = '/';

	   	if ( isset( $_GET[ 'cpmobile_view'] ) ) {
	  		if ( $_GET[ 'cpmobile_view' ] == 'mobile' ) {
				setcookie( $key, 'mobile', $time, $url_path ); 
			} elseif ( $_GET[ 'cpmobile_view' ] == 'normal') {
				setcookie( $key, 'normal', $time, $url_path );
			}
		}

		$settings = cp_cpmobile_get_settings();
		if (isset($_COOKIE[$key])) {
			$this->desired_view = $_COOKIE[$key];
		} else {
			if ( $settings['enable-regular-default'] || defined( 'XMLRPC_REQUEST' ) || defined( 'APP_REQUEST' ) ) {
				$this->desired_view = 'normal';
			} else {
		  		$this->desired_view = 'mobile';
			}
		}

		if ( isset( $settings['enable-twenty-eleven-footer'] ) && $settings['enable-twenty-eleven-footer'] ) {
			if ( function_exists( 'twentyeleven_setup' ) ) {
				add_action( 'twentyeleven_credits', array( &$this, 'handle_footer' ) );
			} else if ( function_exists( 'twentyten_setup' ) ) {
				add_action( 'twentyten_credits', array( &$this, 'handle_footer' ) );
			}
		}		
	}

	function handle_footer() {
		ob_start( array( &$this, 'handle_footer_done') );
	}

	function handle_footer_done( $content ) {
		if ( function_exists( 'twentyeleven_setup' ) ) { 
			return str_replace( "WordPress</a>", "WordPress</a> <a href='http://www.wordpress.org/extend/plugins/cpmobile'>" . sprintf( __( 'and %s', 'cpmobile' ), "cpmobile" ) . "</a>", $content );
		} else if ( function_exists( 'twentyten_setup' ) ) {
			return str_replace( "WordPress.				</a>", "WordPress</a> <a style='background-image: none;' href='http://www.wordpress.org/extend/plugins/cpmobile'>" . sprintf( __( 'and %s', 'cpmobile' ), "cpmobile" ) . "</a>", $content );		
		}
	}	
	
	function detectAppleMobile($query = '') {
		$container = $_SERVER['HTTP_USER_AGENT'];
		// The below prints out the user agent array. Uncomment to see it shown on the page.
		// print_r($container); 
		$this->applemobile = false;
		$useragents = cp_cpmobile_get_user_agents();
		$exclude_agents = cp_cpmobile_get_exclude_user_agents();
		$devfile =  compat_get_plugin_dir( 'cpmobile' ) . '/include/developer.mode';

		foreach ( $useragents as $useragent ) {
			if ( preg_match( "#$useragent#i", $container ) || file_exists( $devfile ) ) {
				$this->applemobile = true;
				break;
			} 	
			
		}

		if ( $this->applemobile && !file_exists( $devfile ) ) {
			foreach( $exclude_agents as $agent ) {
				if ( preg_match( "#$agent#i", $container ) ) {	
					$this->applemobile = false;
					break;
				}
			}
		}
	}

	function get_stylesheet( $stylesheet ) {
		if ($this->applemobile && $this->desired_view == 'mobile') {
			return 'default';
		} else {
			return $stylesheet;
		}
	}
		  
	function get_template( $template ) {
		$this->cp_filter_iphone();
		if ($this->applemobile && $this->desired_view === 'mobile') {
			return 'default';
		} else {	   
			return $template;
		}
	}
		  
	function get_template_directory( $value ) {
		$theme_root = compat_get_plugin_dir( 'cpmobile' );
		if ($this->applemobile && $this->desired_view === 'mobile') {
				return $theme_root . '/themes';
		} else {
				return $value;
		}
	}
		  
	function theme_root( $path ) {
		$theme_root = compat_get_plugin_dir( 'cpmobile' );
		if ($this->applemobile && $this->desired_view === 'mobile') {
			return $theme_root . '/themes';
		} else {
			return $path;
		}
	}
		  
	function theme_root_uri( $url ) {
		if ($this->applemobile && $this->desired_view === 'mobile') {
			$dir = compat_get_plugin_url( 'cpmobile' ) . "/themes";
			return $dir;
		} else {
			return $url;
		}
	}
}
  
global $cpmobile_plugin;
$cpmobile_plugin = new cpmobilePlugin();

function cp_cpmobile_is_mobile() {
	global $cpmobile_plugin;
	
	return ( $cpmobile_plugin->applemobile && $cpmobile_plugin->desired_view == 'mobile' );	
}

//Thanks to edyoshi:
function cp_is_iphone() {
	global $cpmobile_plugin;
	$cpmobile_plugin->cp_filter_iphone();
	return $cpmobile_plugin->applemobile;
}
  
// The Automatic Footer Template Switch Code (into "wp_footer()" in regular theme's footer.php)
function cpmobile_switch() {
	global $cpmobile_plugin;
	if ( cp_is_iphone() && $cpmobile_plugin->desired_view == 'normal' ) {
		echo '<div id="cpmobile-switch-link">';
		_e( "Mobile Theme", "cpmobile" ); 
		echo "<a onclick=\"document.getElementById('switch-on').style.display='block';document.getElementById('switch-off').style.display='none';\" href=\"" . get_bloginfo('url') . "/?cpmobile_view=mobile&cpmobile_redirect_nonce=" . wp_create_nonce( 'cpmobile_redirect' ) . "&cpmobile_redirect=" . urlencode( $_SERVER['REQUEST_URI'] ) . "\"><img id=\"switch-on\" src=\"" . compat_get_plugin_url( 'cpmobile' ) . "/themes/core/core-images/on.jpg\" alt=\"on switch image\" class=\"cpmobile-switch-image\" style=\"display:none\" /><img id=\"switch-off\" src=\"" . compat_get_plugin_url( 'cpmobile' ) .  "/themes/core/core-images/off.jpg\" alt=\"off switch image\" class=\"cpmobile-switch-image\" /></a>";
 		echo '</div>';
	}
}
  
function cp_options_menu() {
	add_options_page( __( 'CPMobile Options', 'cpmobile' ), 'CPMobile', 'manage_options', __FILE__, 'cp_mobile_page' );
}

function cp_cpmobile_get_settings() {
	return cp_mobile_get_menu_pages();
}

function cp_validate_cpmobile_settings( &$settings ) {
	global $cpmobile_defaults;
	foreach ( $cpmobile_defaults as $key => $value ) {
		if ( !isset( $settings[$key] ) ) {
			$settings[$key] = $value;
		}
	}
}

function cp_cpmobile_is_exclusive() {
	$settings = cp_cpmobile_get_settings();
	return $settings['enable-exclusive'];
}

function cp_can_show_tweets() {
	$settings = cp_cpmobile_get_settings();
	return $settings['enable-show-tweets'];
}

function cp_can_show_comments() {
	$settings = cp_cpmobile_get_settings();
	return $settings['enable-show-comments'];
}

function cp_mobile_get_menu_pages() {
	$v = get_option('cp_iphone_pages');
	if (!$v) {
		$v = array();
	}

	if (!is_array($v)) {
		$v = unserialize($v);
	}
	
	cp_validate_cpmobile_settings( $v );

	return $v;
}

function cp_get_selected_home_page() {
   $v = cp_mobile_get_menu_pages();
   return $v['home-page'];
}

function cpmobile_use_fixed_header() {
	$settings = cp_cpmobile_get_settings();
	return $settings['enable-fixed-header'];
}

function cpmobile_get_stats() {
	$options = cp_mobile_get_menu_pages();
	if (isset($options['statistics'])) {
		echo stripslashes($options['statistics']);
	}
}
  
function cp_get_title_image() {
	$ids = cp_mobile_get_menu_pages();
	$title_image = $ids['main_title'];

	if ( file_exists( compat_get_plugin_dir( 'cpmobile' ) . '/images/icon-pool/' . $title_image ) ) {
		$image = compat_get_plugin_url( 'cpmobile' ) . '/images/icon-pool/' . $title_image;
	} else if ( file_exists( compat_get_upload_dir() . '/cpmobile/custom-icons/' . $title_image ) ) {
		$image = compat_get_upload_url() . '/cpmobile/custom-icons/' . $title_image;
	}

	return $image;
}

function cpmobile_excluded_cats() {
	$settings = cp_cpmobile_get_settings();
	return stripslashes($settings['excluded-cat-ids']);
}

function cpmobile_excluded_tags() {
	$settings = cp_cpmobile_get_settings();
	return stripslashes($settings['excluded-tag-ids']);
}

function cpmobile_custom_footer_msg() {
	$settings = cp_cpmobile_get_settings();
	return stripslashes($settings['custom-footer-msg']);
}

function cp_excerpt_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-post-excerpts'];
}

function cp_is_page_coms_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-page-coms'];
}		

function cp_is_zoom_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-zoom'];
}	

function cp_is_cats_button_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-cats-button'];
}	

function cp_is_tags_button_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-tags-button'];
}	

function cp_is_search_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-search-button'];
}	

function cp_is_gigpress_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-gigpress-button'];
}	

function cp_is_flat_icon_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-flat-icon'];
}	

function cp_is_login_button_enabled() {
	$ids = cp_mobile_get_menu_pages();
	if (get_option( 'comment_registration' ) || get_option( 'users_can_register' ) ||  $ids['enable-login-button'] ) {
		return true;
	} else {
		return false;
	}
}		
	
function cp_is_gravatars_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-gravatars'];
}	

function cp_show_author() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-main-name'];
}

function cp_show_tags() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-main-tags'];
}

function cp_show_categories() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-main-categories'];
}

function cp_is_home_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-main-home'];
}	

function cp_is_rss_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-main-rss'];
}	

function cp_is_email_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-main-email'];
}

function cp_is_truncated_enabled() {
	$ids = cp_mobile_get_menu_pages();
	return $ids['enable-truncated-titles'];	
}

// Prowl Functions
function cp_is_prowl_direct_message_enabled() {
	$settings = cp_cpmobile_get_settings();
	return ( isset( $settings['enable-prowl-message-button'] ) && $settings['enable-prowl-message-button'] && $settings['prowl-api'] );
}

function cp_prowl_did_try_message() {
	global $cpmobile_plugin;
	return $cpmobile_plugin->prowl_output;
}

function cp_prowl_message_success() {
	global $cpmobile_plugin;
	return $cpmobile_plugin->prowl_success;
}
// End prowl functions
  
function cp_mobile_get_pages() {
	global $table_prefix;
	global $wpdb;
	
	$ids = cp_mobile_get_menu_pages();
	$a = array();
	$keys = array();
	foreach ($ids as $k => $v) {
		if ($k == 'main_title' || $k == 'enable-post-excerpts' || $k == 'enable-page-coms' || 
			 $k == 'enable-cats-button'  || $k == 'enable-tags-button'  || $k == 'enable-search-button'  || 
			 $k == 'enable-login-button' || $k == 'enable-gravatars' ||
			 $k == 'enable-main-home' || $k == 'enable-main-rss' || $k == 'enable-main-email' || 
			 $k == 'enable-truncated-titles' || $k == 'enable-main-name' || $k == 'enable-main-tags' || 
			 $k == 'enable-main-categories' || $k == 'enable-prowl-comments-button' || $k == 'enable-prowl-users-button' || 
			 $k == 'enable-prowl-message-button' || $k == 'enable-gigpress-button'  || $k == 'enable-flat-icon') {
			} else {
				if (is_numeric($k)) {
					$keys[] = $k;
				}
			}
	}
	 
	$menu_order = array(); 
	$results = false;

	if ( count( $keys ) > 0 ) {
		$query = "SELECT * from {$table_prefix}posts where ID in (" . implode(',', $keys) . ") and post_status = 'publish' order by post_title asc";
		$results = $wpdb->get_results( $query, ARRAY_A );
	}

	if ( $results ) {
		$inc = 0;
		foreach ( $results as $row ) {
			$row['icon'] = $ids[$row['ID']];
			$a[$row['ID']] = $row;
			if (isset($menu_order[$row['menu_order']])) {
				$menu_order[$row['menu_order']*100 + $inc] = $row;
			} else {
				$menu_order[$row['menu_order']*100] = $row;
			}
			$inc = $inc + 1;
		}
	}

	if (isset($ids['sort-order']) && $ids['sort-order'] == 'page') {
		return $menu_order;
	} else {
		return $a;
	}
}

function cp_the_page_icon() {
	$settings = cp_mobile_get_menu_pages();	

	$mypages = cp_mobile_get_pages();
	$icon_name = false;		
	if ( isset( $settings['sort-order'] ) && $settings['sort-order'] == 'page' ) {
		global $post;
		foreach( $mypages as $key => $page ) {
			if ( $page['ID'] == $post->ID ) {
				$icon_name = $page['icon'];
				break;
			}
		}
	} else {		
		if ( isset( $mypages[ get_the_ID() ]) ) {
			$icon_name = $mypages[ get_the_ID() ]['icon'];
		}
	}	
	
	if ( $icon_name ) {
		if ( file_exists( compat_get_plugin_dir( 'cpmobile' ) . '/images/icon-pool/' . $icon_name ) ) {
			$image = compat_get_plugin_url( 'cpmobile' ) . '/images/icon-pool/' . $icon_name;	
		} else {
			$image = compat_get_upload_url() . '/cpmobile/custom-icons/' . $icon_name;
		}
		
		echo( '<img class="pageicon" src="' . $image . '" alt="icon" />' ); 
	} else {
		echo( '<img class="pageicon" src="' . compat_get_plugin_url( 'cpmobile' ) . '/images/icon-pool/Default.png" alt="pageicon" />');	
	}
}

function cp_get_header_title() {
	$v = cp_mobile_get_menu_pages();
	return $v['header-title'];
}

function cp_get_header_background() {
	$v = cp_mobile_get_menu_pages();
	return $v['header-background-color'];
}
  
function cp_get_header_border_color() {
	$v = cp_mobile_get_menu_pages();
	return $v['header-border-color'];
}

function cp_get_header_color() {
	$v = cp_mobile_get_menu_pages();
	return $v['header-text-color'];
}

function cp_get_link_color() {
	$v = cp_mobile_get_menu_pages();
	return $v['link-color'];
}

function cp_get_h2_font() {
	$v = cp_mobile_get_menu_pages();
	return $v['h2-font'];
}

function cp_get_icon_style() {
	$v = cp_mobile_get_menu_pages();
	return $v['icon-style'];
}

function cp_can_show_powered_by() {
	        $settings = cp_mobile_get_menu_pages();
	        return $settings['show_powered_by'];
}

function cp_get_cpmobile_custom_lang_files() {
	$lang_files = array();
	
	$lang_dir = WP_CONTENT_DIR . '/cpmobile/lang';
	if ( file_exists( $lang_dir ) ) {
		$d = opendir( $lang_dir );
		if ( $d ) {
			while ( $f = readdir( $d ) ) {
				if ( strpos( $f, ".mo" ) !== false ) {
					$file_info = new stdClass;
					$file_info->name = $f;
					$file_info->path = $lang_dir . '/' . $f;
					$file_info->prefix = str_replace( ".mo", "", $f );
					
					$lang_files[] = $file_info;	
				}
			}
		}
	}	
	
	return $lang_files;
}

require_once( 'include/icons.php' );
  
function cp_mobile_page() {
	if (isset($_POST['submit'])) {
		echo('<div class="wrap"><div id="cp-global"><div id="cpmobileupdated" style="display:none"><p class="saved"><span>');
		echo __( "Settings saved", "cpmobile");
		echo('</span></p></div>');
		} 
	elseif (isset($_POST['reset'])) {
		echo('<div class="wrap"><div id="cp-global"><div id="cpmobileupdated" style="display:none"><p class="reset"><span>');
		echo __( "Defaults restored", "cpmobile");
		echo('</span></p></div>');
	} else {
		echo('<div class="wrap"><div id="cp-global">');
}
?>

<?php $icons = cp_get_icon_list(); ?>

	<?php require_once( 'include/submit.php' ); ?>
	<form method="post" action="<?php echo admin_url( 'options-general.php?page=cpmobile/cpmobile.php' ); ?>">
		<?php require_once( 'html/head-area.php' ); ?>
		<?php require_once( 'html/general-settings-area.php' ); ?>
		<?php require_once( 'html/advanced-area.php' ); ?>
		<?php require_once( 'html/push-area.php' ); ?>
		<?php require_once( 'html/style-area.php' ); ?>
		<?php require_once( 'html/icon-area.php' ); ?>
		<?php require_once( 'html/page-area.php' ); ?>
		<?php require_once( 'html/ads-stats-area.php' ); ?>
		<?php require_once( 'html/plugin-compat-area.php' ); ?>		
		<input type="hidden" name="cpmobile-nonce" value="<?php echo wp_create_nonce( 'cpmobile-nonce' ); ?>" />
		<input type="submit" name="submit" value="<?php _e('Save Options', 'cpmobile' ); ?>" id="cp-button" class="button-primary" />
	</form>
	
	<form method="post" action="">
		<input type="submit" onclick="return confirm('<?php _e( 'Restore default cpmobile settings?', 'cpmobile' ); ?>');" name="reset" value="<?php _e('Restore Defaults', 'cpmobile' ); ?>" id="cp-button-reset" class="button-highlighted" />
	</form>
		
	<?php // echo( '' . cpmobile( '<div class="cp-plugin-version"> This is ','</div>' ) . '' ); ?>

	<div class="cp-clearer"></div>
</div>
<?php 
echo('</div>'); }

add_filter( 'init', 'cpmobile_init' );
add_action( 'wp_footer', 'cpmobile_switch' );
add_action( 'admin_init', 'cpmobile_admin_enqueue_files' );
add_action( 'admin_head', 'cpmobile_admin_files' );
add_action( 'admin_menu', 'cp_options_menu' );
add_filter( 'plugin_action_links', 'cpmobile_settings_link', 9, 2 );

<?php
/**
 * Theme functions file
 *
 * DO NOT MODIFY THIS FILE. Make a child theme instead: http://codex.wordpress.org/Child_Themes
 *
 * @package ClassiPress
 * @author AppThemes
 */

// Framework
require( dirname(__FILE__) . '/framework/load.php' );

// Theme-specific files
require( dirname(__FILE__) . '/includes/theme-functions.php' );

function remove_wp_admin_link() {
if(has_action('admin_bar_menu'))
remove_action('admin_bar_menu', 'wp_admin_bar_wp_menu');
}
add_action('init', 'remove_wp_admin_link');



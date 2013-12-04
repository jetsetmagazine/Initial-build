<?php

// scbFramework
foreach ( array(
	'scbUtil', 'scbOptions', 'scbForms', 'scbTable',
	'scbWidget', 'scbAdminPage', 'scbBoxesPage',
	'scbCron', 'scbHooks',
) as $className ) {
	if ( !class_exists( $className ) ) {
		include dirname( __FILE__ ) . '/scb/' . substr( $className, 3 ) . '.php';
	}
}

require dirname( __FILE__ ) . '/includes/functions.php';
require dirname( __FILE__ ) . '/includes/hooks.php';

appthemes_load_textdomain();

require dirname( __FILE__ ) . '/includes/special-pages.php';
require dirname( __FILE__ ) . '/includes/page-edit-profile.php';

if ( is_admin() ) {
	require dirname( __FILE__ ) . '/admin/updater.php';
	require dirname( __FILE__ ) . '/admin/dashboard.php';
}

add_action( 'wp_head', 'appthemes_title_tag' );

add_action( 'wp_head', 'appthemes_favicon' );
add_action( 'admin_head', 'appthemes_favicon' );


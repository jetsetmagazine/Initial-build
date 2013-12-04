<?php

APP_Special_Pages::register( 'edit-profile.php', __( 'Edit Profile', APP_TD ) );

function appthemes_get_edit_profile_url() {
	if ( $page_id = APP_Special_Pages::get_id( 'edit-profile.php' ) )
		return get_permalink( $page_id );

	return get_edit_profile_url( get_current_user_id() );
}

/**
 * Prevent non-logged-in users from accessing the edit-profile.php page
 */
function _appthemes_maybe_ask_for_login() {
	if ( is_page_template( 'edit-profile.php' ) )
		appthemes_auth_redirect_login();
}
add_action( 'template_redirect', '_appthemes_maybe_ask_for_login' );


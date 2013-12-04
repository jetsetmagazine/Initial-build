<?php

/**
 * Class for handling special pages, i.e. pages that have a specific purpose and template file.
 */
class APP_Special_Pages {

	private static $pages = array();

	private static $page_ids = array();

	static function register( $template, $title ) {
		self::$pages[$template] = $title;
	}

	static function get_id( $template ) {
		if ( isset( self::$page_ids[$template] ) )
			return self::$page_ids[$template];

		// don't use 'fields' => 'ids' because it skips caching
		$pages = get_posts( array(
			'post_type' => 'page',
			'meta_key' => '_wp_page_template',
			'meta_value' => $template,
			'posts_per_page' => 1
		) );

		if ( empty( $pages ) )
			$page_id = 0;
		else
			$page_id = $pages[0]->ID;

		self::$page_ids[$template] = $page_id;

		return $page_id;
	}

	static function install() {
		foreach ( self::$pages as $template => $title ) {
			if ( self::get_id( $template ) )
				continue;

			$page_id = wp_insert_post( array(
				'post_type' => 'page',
				'post_status' => 'publish',
				'post_title' => $title
			) );

			add_post_meta( $page_id, '_wp_page_template', $template );
		}
	}
}

add_action( 'appthemes_first_run', array( 'APP_Special_Pages', 'install' ) );


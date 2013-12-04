<?php
/**
 *
 * Keeps track of ad views for daily and total
 * @author AppThemes
 *
 *
 */


global $app_abbr;

// define the table names used
$table_name = $wpdb->prefix . $app_abbr. '_ad_pop_daily';
$table_name_all = $wpdb->prefix . $app_abbr .'_ad_pop_total';

// get the local time based off WordPress setting
$nowisnow = date('Y-m-d', appthemes_current_time('timestamp',0));



// get the total page views and daily page views for the post
function appthemes_stats_counter($post_id) {
	global $wpdb, $table_name, $table_name_all, $nowisnow;

	// get all the post view info to display
	$results = _appthemes_fetch_post_counts( $post_id );

	// get the stats and
	if($results)
		echo number_format($results->total) . '&nbsp;' .__('total views', 'appthemes') . ', ' . number_format($results->today) . '&nbsp;' .__('today', 'appthemes');
	else
		echo __('No views yet', 'appthemes');
}



// record the page view
function appthemes_stats_update($post_id) {
	global $wpdb, $table_name, $table_name_all, $nowisnow;

	// TODO: use $wpdb->prepare(), $wpdb->update() etc.

	$post_id = absint( $post_id );

	// first try and update the existing total post counter
	$results = $wpdb->query("UPDATE $table_name_all SET postcount = postcount+1 WHERE postnum = '$post_id' LIMIT 1");

	// if it doesn't exist, then insert two new records
	// one in the total views, another in today's views
	if ($results == 0) {
		$wpdb->query("INSERT INTO $table_name_all (postnum, postcount) VALUES ('$post_id', 1)");
		$wpdb->query("INSERT INTO $table_name (time, postnum, postcount) VALUES ('$nowisnow', '$post_id', 1)");
	// post exists so let's just update the counter
	} else {
		$results2 = $wpdb->query("UPDATE $table_name SET postcount = postcount+1 WHERE time = '$nowisnow' AND postnum = '$post_id' LIMIT 1");
		// insert a new record since one hasn't been created for current day
		if ($results2 == 0)
			$wpdb->query("INSERT INTO $table_name (time, postnum, postcount) VALUES ('$nowisnow', '$post_id', 1)");
	}

	// get all the post view info so we can update meta fields
	$row = _appthemes_fetch_post_counts( $post_id );

	// add the counters to temp values on the post so it's easy to call from the loop
	update_post_meta($post_id, 'cp_daily_count', $row->today);
	update_post_meta($post_id, 'cp_total_count', $row->total);

}

function _appthemes_fetch_post_counts( $post_id ) {
	global $wpdb, $table_name, $table_name_all, $nowisnow;

	$sql = $wpdb->prepare( "SELECT t.postcount AS total, d.postcount AS today FROM $table_name_all AS t
		INNER JOIN $table_name AS d ON t.postnum = d.postnum
		WHERE t.postnum = %d AND d.time = %s", $post_id, $nowisnow );

	return $wpdb->get_row($sql);
}

// sidebar widget showing overall popular ads
function cp_todays_overall_count_widget($post_type, $limit) {
    global $wpdb, $table_name_all, $nowisnow;

	// get all the post view info to display
	$sql = $wpdb->prepare( "SELECT t.postcount, p.ID, p.post_title
			FROM $table_name_all AS t
			INNER JOIN $wpdb->posts AS p ON p.ID = t.postnum
			WHERE t.postcount > 0
			AND p.post_status = 'publish' AND p.post_type = %s
			ORDER BY t.postcount DESC LIMIT %d", $post_type, $limit );

	$results = $wpdb->get_results($sql);

	//echo $sql;

    echo '<ul class="pop">';

	// must be overall views
	if ($results) {

        foreach ($results as $result)
			echo '<li><a href="'.get_permalink($result->ID).'">'.$result->post_title.'</a> ('.number_format($result->postcount).'&nbsp;'.__('views', 'appthemes') .')</li>';

    } else {

		echo '<li>' . __('No ads viewed yet.', 'appthemes') . '</li>';

	}

	echo '</ul>';

}



// sidebar widget showing today's popular ads
function cp_todays_count_widget($post_type, $limit) {
    global $wpdb, $table_name, $nowisnow;

	// get all the post view info to display
	$sql = $wpdb->prepare( "SELECT t.postcount, p.ID, p.post_title
			FROM $table_name AS t
			INNER JOIN $wpdb->posts AS p ON p.ID = t.postnum
			WHERE time = %s
			AND t.postcount > 0 AND p.post_status = 'publish' AND p.post_type = %s
			ORDER BY t.postcount DESC LIMIT %d", $nowisnow, $post_type, $limit );

	$results = $wpdb->get_results($sql);

	echo '<ul class="pop">';

	// must be views today
    if ($results) {

        foreach ($results as $result)
			echo '<li><a href="'.get_permalink($result->ID).'">'.$result->post_title.'</a> ('.number_format($result->postcount).'&nbsp;'.__('views', 'appthemes') .')</li>';

    } else {

			echo '<li>' . __('No ads viewed yet.', 'appthemes') . '</li>';
	}

	echo '</ul>';

}

?>

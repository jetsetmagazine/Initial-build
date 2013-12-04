<?php 
include( dirname(__FILE__) . '/../core/core-functions.php' );


// set global path variables
define('CP_ADD_NEW_URL', get_bloginfo('url').'/'.get_option($app_abbr.'_add_new_url').'/');
define('CP_ADD_NEW_CONFIRM_URL', get_bloginfo('url').'/'.get_option($app_abbr.'_add_new_confirm_url').'/');
//define('CP_MEMBERSHIP_PURCHASE_URL', get_bloginfo('url').'/'.get_option($app_abbr.'_membership_purchase_url').'/');
//define('CP_MEMBERSHIP_PURCHASE_CONFIRM_URL', get_bloginfo('url').'/'.get_option($app_abbr.'_membership_purchase_confirm_url').'/');


//***************************************************************
// CLASSIPRO START
//***************************************************************

// rubencio modifying some icons on the menu
function rb_cpmobile_core_header_home() {
	if (cp_is_home_enabled()) {
		echo sprintf(__( "%sHome%s", "cpmobile" ), '<li><a href="' . get_bloginfo( 'url' ) . '"><img src="' . compat_get_plugin_url( 'cpmobile' ) . '/themes/default/images/ico_home.png" alt="" />','</a></li>');
	}
}
  
function rb_cpmobile_core_header_pages() {
	$pages = cp_mobile_get_pages();
	global $blog_id;
	foreach ($pages as $p) {
		if ( file_exists( compat_get_plugin_dir( 'cpmobile' ) . '/images/icon-pool/' . $p['icon'] ) ) {
			$image = compat_get_plugin_url( 'cpmobile' ) . '/images/icon-pool/' . $p['icon'];	
		} else {
		$image = compat_get_upload_url() . '/cpmobile/custom-icons/' . $p['icon'];
	}
		echo('<li><a href="' . get_permalink($p['ID']) . '"><img src="' . $image . '" alt="icon" />' . __($p['post_title']) . '</a></li>');
	}
  }
 
function rb_cpmobile_core_header_rss() {
	if (cp_is_rss_enabled()) {
		echo sprintf(__( "%sRSS Feed%s", "cpmobile" ), '<li><a href="' . get_bloginfo('rss2_url') . '?post_type=ad_listing"><img src="' . compat_get_plugin_url( 'cpmobile' ) . '/themes/default/images/ico_rss.png" alt="" />','</a></li>');
	}
}

function rb_cpmobile_core_header_email() {
	if (cp_is_email_enabled()) {
		echo sprintf(__( "%sE-Mail%s", "cpmobile" ), '<li><a href="mailto:' . get_bloginfo('admin_email') . '"><img src="' . compat_get_plugin_url( 'cpmobile' ) . '/themes/default/images/ico_mail.png" alt="" />','</a></li>');
	}
}
// rubencio ends

function cp_get_custom_taxonomy($post_id, $tax_name, $tax_arg) {
    $tax_array = get_terms( $tax_name, array( 'hide_empty' => '0' ) );
    if ($tax_array && sizeof($tax_array) > 0):
        foreach ($tax_array as $tax_val) {
            if ( is_object_in_term( $post_id, $tax_name, array( $tax_val->term_id ) ) ) {
                switch($tax_arg) {
                    case 'slug':
                        $link = get_term_link($tax_val, $tax_name);
                        if (is_wp_error($link))
                            return $link;
                        return $link;
                        break;
                    case 'name':
                        return $tax_val->name;
                        break;
                    case 'term_id':
                        return $tax_val->term_id;
                        break;
                } // end switch
            }
        }
    endif;
}

function cp_get_price($postid, $meta_field) {

        if(get_post_meta($postid, $meta_field, true)) {
            $price_out = get_post_meta($postid, $meta_field, true);

            // uncomment the line below to change price format
            //$price_out = number_format($price_out, 2, '.', ',');

            $price_out = cp_pos_currency($price_out, 'ad');

        } else {
            if( get_option('cp_force_zeroprice') == 'yes' )
                $price_out = cp_pos_currency(0, 'ad');
            else
                $price_out = '&nbsp;';
        }

        echo $price_out;
}

// figure out the position of the currency symbol and return it with the price
function cp_pos_currency($price_out, $price_type = '') {
	$app_abbr = "cp";

	//if its set to the ad type, display the currency symbol option related to ad currency
	if($price_type == 'ad') $curr_symbol = get_option('cp_curr_symbol');
	//if price_type not set use the currency type of the payment gateway currency type
	else $curr_symbol = get_option($app_abbr.'_curr_pay_type_symbol');

	//possition the currency symbol
    if (get_option('cp_curr_symbol_pos') == 'left')
        $price_out = $curr_symbol . $price_out;
    elseif (get_option('cp_curr_symbol_pos') == 'left_space')
        $price_out = $curr_symbol . '&nbsp;' . $price_out;
    elseif (get_option('cp_curr_symbol_pos') == 'right')
        $price_out = $price_out . $curr_symbol;
    else
        $price_out = $price_out . '&nbsp;' . $curr_symbol;

    return $price_out;
}



function cp_get_ad_details2($postid, $catid, $locationOption = 'list') 
{
          global $wpdb;
        //$all_custom_fields = get_post_custom($post->ID);
        // see if there's a custom form first based on catid.
        $fid = cp_get_form_id($catid);

        // if there's no form id it must mean the default form is being used
        if(!($fid)) {

			// get all the custom field labels so we can match the field_name up against the post_meta keys
			$sql = $wpdb->prepare("SELECT field_label, field_name, field_type FROM $wpdb->prefix"."cp_ad_fields");

        } else {
			// now we should have the formid so show the form layout based on the category selected
            $sql = $wpdb->prepare("SELECT f.field_label, f.field_name, f.field_type, m.field_pos "
                     . "FROM $wpdb->prefix"."cp_ad_fields f "
                     . "INNER JOIN  $wpdb->prefix"."cp_ad_meta m "
                     . "ON f.field_id = m.field_id "
                     . "WHERE m.form_id = %s "
                     . "ORDER BY m.field_pos asc",
                     $fid);

        }
	
        $results = $wpdb->get_results($sql);
        if($results) {
            if($locationOption == 'list') {
            
                    foreach ($results as $result) :
                        // now grab all ad fields and print out the field label and value
                        $post_meta_val = get_post_meta($postid, $result->field_name, true);
                       
                        if (!empty($post_meta_val))
                            if($result->field_type == "checkbox"){
                                $post_meta_val = get_post_meta($postid, $result->field_name, false);
                                echo '<li id="'. $result->field_name .'"><span>' . esc_html( translate( $result->field_label, 'appthemes' ) ) . ':</span> ' . cp_make_clickable(implode(", ", $post_meta_val)) .'</li>'; // make_clickable is a WP function that auto hyperlinks urls}
                            }elseif($result->field_name != 'cp_price' && $result->field_name != 'cp_currency' && $result->field_type != "text area"){
                                echo '<li id="'. $result->field_name .'"><span>' . esc_html( translate( $result->field_label, 'appthemes' ) ) . ':</span> ' . cp_make_clickable($post_meta_val) .'</li>'; // make_clickable is a WP function that auto hyperlinks urls
                            }
                    endforeach;
                }
                elseif($locationOption == 'content')
                {
                    echo "### content";
                    foreach ($results as $result) :
                        // now grab all ad fields and print out the field label and value
                        $post_meta_val = get_post_meta($postid, $result->field_name, true);
                        if (!empty($post_meta_val))
                            if($result->field_name != 'cp_price' && $result->field_name != 'cp_currency' && $result->field_type == 'text area')
                                echo '<div id="'. $result->field_name .'" class="custom-text-area dotted"><h3>' . esc_html( translate( $result->field_label, 'appthemes' ) ) . '</h3>' . cp_make_clickable($post_meta_val) .'</div>'; // make_clickable is a WP function that auto hyperlinks urls

                    endforeach;
                }
                else
                {
                        // uncomment for debugging
                        // echo 'Location Option Set: ' . $locationOption;
                }

        } else {

          echo __('No ad details found.', 'appthemes');

        }
    }


function cp_get_form_id($catid) {
    global $wpdb;
    $fid = ''; // set to nothing to make WP notice happy

    // we first need to see if this ad is using a custom form
    // so lets search for a catid match and return the id if found
    $sql = "SELECT ID, form_cats FROM ". $wpdb->prefix . "cp_ad_forms WHERE form_status = 'active'";

    $results = $wpdb->get_results($sql);

    if($results) {

        foreach ($results as $result) :

            // put the form_cats into an array
            $catarray = unserialize($result->form_cats);

            // now search the array for the ad catid
            if (in_array($catid, $catarray))
                $fid = $result->ID; // when there's a catid match, grab the form id

        endforeach;

        // kick back the form id
        return $fid;

    }

}

// looks for any http or email address and automatically hyperlinks it
function cp_make_clickable($ret) {
    $ret = ' ' . $ret;
	// first match on the url
    $ret = preg_replace_callback('#(?<=[\s>])(\()?([\w]+?://(?:[\w\\x80-\\xff\#$%&~/=?@\[\](+-]|[.,;:](?![\s<]|(\))?([\s]|$))|(?(1)\)(?![\s<.,;:]|$)|\)))+)#is', 'cp_make_url_clickable', $ret);
    // next match on the email address
	$ret = preg_replace_callback('#([\s>])([.0-9a-z_+-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,})#i', 'cp_make_email_clickable', $ret);
    // this one is not in an array because we need it to run last, for cleanup of accidental links within links
    $ret = preg_replace("#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i", "$1$3</a>", $ret);
    $ret = trim($ret);
    return $ret;
}

// helper function used by cp_make_clickable to make email string a link
function cp_make_email_clickable($matches) {
    $email = $matches[2] . '@' . $matches[3];
    return $matches[1] . "<a href=\"mailto:$email\">$email</a>";
}


// helper function used by cp_make_clickable to make http string a link
function cp_make_url_clickable($matches) {
    $url = $matches[2];
    $url = esc_url($url);
    if (empty($url))
		return $matches[0];
    return $matches[1] . "<a target=\"_blank\" href=\"$url\" rel=\"nofollow\">$url</a>";
}
function cp_get_image_url_single($post_id = '', $size = 'medium', $title = '', $num = 1, $link=false) 
{
        $images = get_posts(array('post_type' => 'attachment', 'numberposts' => $num, 'post_status' => null, 'post_parent' => $post_id, 'order' => 'ASC', 'orderby' => 'ID'));

		// remove the first image since it's already being shown as the main one
		//$images = array_slice($images,1,count($images)-1);

		if ($images) 
		{
            $i = 1;
            foreach ($images as $image) 
			{
				$alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);
                $iarray = wp_get_attachment_image_src($image->ID, $size, $icon = false);
                $iarraylg = wp_get_attachment_image_src($image->ID, 'large', $icon = false);
                if ($i == 1) $mainpicID = 'id="mainthumb"'; else $mainpicID = '';
				if (!$link)
					echo ' <a id="thumb'.$i.'" class="post-gallery" rel="colorbox" title="'.$title.' - '.__('Image ', 'classipro').$i.'"><img src="'.$iarray[0].'" alt="'.$alt.'" title="'.$alt.'" width="'.$iarray[1].'" height="'.$iarray[2].'" /></a>';	
                else
					echo ' <a href="'.$iarraylg[0].'" id="thumb'.$i.'" class="post-gallery" rel="colorbox" title="'.$title.' - '.__('Image ', 'classipro').$i.'"><img src="'.$iarray[0].'" alt="'.$alt.'" title="'.$alt.'" width="'.$iarray[1].'" height="'.$iarray[2].'" /></a>';
                $i++;
            }
        }
}

function cp_get_image_url() 
{
		global $post, $wpdb;

		// go see if any images are associated with the ad
		$images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'numberposts' => 1, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'ID') );

		if ($images) {

			// move over bacon
			$image = array_shift($images);

			// see if this v3.0.5+ image size exists
			$adthumbarray = wp_get_attachment_image_src($image->ID, 'medium');
			$img_medium_url_raw = $adthumbarray[0];

			// grab the large image for onhover preview
			$adlargearray = wp_get_attachment_image_src($image->ID, 'large');
			$img_large_url_raw = $adlargearray[0];

			// must be a v3.0.5+ created ad
			if($adthumbarray)
				echo '<a href="'. $img_large_url_raw .'" class="img-main" rel="colorbox"><img src="'. $img_medium_url_raw .'" title="'. the_title_attribute('echo=0') .'" alt="'. the_title_attribute('echo=0') .'"  /></a>';

		// no image so return the placeholder thumbnail
		} else {
			echo '<img class="attachment-medium" alt="" title="" src="'. get_bloginfo('template_url') .'/images/no-thumb.jpg" />';
		}

}

// shows how much time is left before the ad expires
function cp_timeleft($theTime) {
	$now = strtotime("now");
	$timeLeft = $theTime - $now;

    $days_label = __('days','classipro');
    $day_label = __('day','classipro');
    $hours_label = __('hours','classipro');
    $hour_label = __('hour','classipro');
    $mins_label = __('mins','classipro');
    $min_label = __('min','classipro');
    $secs_label = __('secs','classipro');
    $r_label = __('remaining','classipro');
    $expired_label = __('This ad has expired','classipro');

    if($timeLeft > 0)
    {
    $days = floor($timeLeft/60/60/24);
    $hours = $timeLeft/60/60%24;
    $mins = $timeLeft/60%60;
    $secs = $timeLeft%60;

    if($days == 01) {$d_label=$day_label;} else {$d_label=$days_label;}
    if($hours == 01) {$h_label=$hour_label;} else {$h_label=$hours_label;}
    if($mins == 01) {$m_label=$min_label;} else {$m_label=$mins_label;}

    if($days){$theText = $days . " " . $d_label;
    if($hours){$theText .= ", " .$hours . " " . $h_label;}}
    elseif($hours){$theText = $hours . " " . $h_label;
    if($mins){$theText .= ", " .$mins . " " . $m_label;}}
    elseif($mins){$theText = $mins . " " . $m_label;
    if($secs){$theText .= ", " .$secs . " " . $secs_label;}}
    elseif($secs){$theText = $secs . " " . $secs_label;}}
    else{$theText = $expired_label;}
    return $theText;
}

function cp_get_geocode( $post_id, $cat = '' )
{
	global $wpdb;
	$table = $wpdb->prefix.'cp_ad_geocodes';
	
	if ( $cat )
		$row = $wpdb->get_row( $wpdb->prepare( "SELECT lat, lng FROM $table WHERE post_id = %d AND category = %s LIMIT 1", $post_id, $cat ) );
	else
		$row = $wpdb->get_row( $wpdb->prepare( "SELECT lat, lng FROM $table WHERE post_id = %d LIMIT 1", $post_id ) );

	if ( is_object( $row ) )
		return array( 'lat' => $row->lat, 'lng' => $row->lng );
	else
		return false;
}

/**
 *  fixes pagination for WP 3.4 sites
 * 
 */
function cp_query_ads_on_homepage( $query ) {
	if( $query->is_main_query() && $query->is_home() )
		$query->set( 'post_type', APP_POST_TYPE );
}
if ( version_compare($wp_version, '3.4', '>=') )
	add_action( 'pre_get_posts', 'cp_query_ads_on_homepage' );
	
//************************************************************************************************************
// CLASSIPRO end
//************************************************************************************************************



//---------------- Custom Exclude Cats Function ----------------//

function cpmobile_exclude_category( $query ) {
	$excluded = cpmobile_excluded_cats();
	
	if ( $excluded ) {
		$cats = explode( ',', $excluded );
		$new_cats = array();
		
		foreach( $cats as $cat ) {
			$new_cats[] = trim( $cat );
		}
	
		$query->set( 'category__not_in', $new_cats );
	}
	
	return $query;
}

add_filter('pre_get_posts', 'cpmobile_exclude_category');

//---------------- Custom Exclude Tags Function ----------------//

function cpmobile_exclude_tags( $query ) {
	$excluded = cpmobile_excluded_tags();
	
	if ( $excluded ) {
		$tags = explode( ',', $excluded );
		$new_tags = array();
		
		foreach( $tags as $tag ) {
			$new_tags[] = trim( $tag );
		}
	
		$query->set( 'tag__not_in', $new_tags );
	}
	
	return $query;
}

add_filter('pre_get_posts', 'cpmobile_exclude_tags');

//---------------- Custom Excerpts Function ----------------//
function cpmobile_trim_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$excerpt_length = apply_filters('excerpt_length', 30);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '...');
			$text = implode(' ', $words);
			$text = force_balance_tags( $text );
		}
	}
	return apply_filters('cpmobile_trim_excerpt', $text, $raw_excerpt);
}


//---------------- Custom Time Since Function ----------------//

function cpmobile_time_since($older_date, $newer_date = false)
	{
	// array of time period chunks
	$chunks = array(
//	array(60 * 60 * 24 * 365 , 'yr'),
	array(60 * 60 * 24 * 30, __('mo', 'cpmobile') ),
	array(60 * 60 * 24 * 7, __('wk', 'cpmobile') ),
	array(60 * 60 * 24, __('day', 'cpmobile') ),
	array(60 * 60, __('hr', 'cpmobile') ),
	array(60 , __('min', 'cpmobile'), )
	);
	
	$newer_date = ($newer_date == false) ? (time()+(60*60*get_settings("gmt_offset"))) : $newer_date;
	
	// difference in seconds
	$since = $newer_date - $older_date;
	
	for ($i = 0, $j = count($chunks); $i < $j; $i++)
		{
		$seconds = $chunks[$i][0];
		$name = $chunks[$i][1];

		// finding the biggest chunk (if the chunk fits, break)
		if (($count = floor($since / $seconds)) != 0)
			{
			break;
			}
		}

	// set output var
	$output = ($count == 1) ? '1 '.$name : "$count {$name}s";

	// step two: the second chunk
	if ($i + 1 < $j)
		{
		$seconds2 = $chunks[$i + 1][0];
		$name2 = $chunks[$i + 1][1];
		
		if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0)
			{
			// add to output var
			$output .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
			}
		}
	
	return $output;
	}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'cpmobile_trim_excerpt');
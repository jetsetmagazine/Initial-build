<?php

	function cp_get_icon_locations() {
      $locations = array( 
        		'default' => array( compat_get_plugin_dir( 'cpmobile' ) . '/images/icon-pool', compat_get_plugin_url( 'cpmobile' ) . '/images/icon-pool' ),      
				'custom' => array( compat_get_upload_dir() . '/cpmobile/custom-icons', compat_get_upload_url() . '/cpmobile/custom-icons' )
		);

      return $locations;
	}
	
	function cp_get_icon_list() {
		$locations = cp_get_icon_locations();     
		$files = array();

		foreach ( $locations as $key => $value ) {
			$current_path = $value[0];	
			$dir = @opendir( $current_path );
			$files[ $key ] = array();
		
			if ( $dir ) {
				while ( false !== ( $file = readdir( $dir ) ) ) { 
					if ($file == '.' || $file == '..' || $file == '.svn' || $file == 'template.psd' || $file == '.DS_Store' || $file == 'more') {
						continue;
					}
				
					$icon = array();
					$names = explode('.', $file);
					$icon['friendly'] = ucfirst($names[0]);
					$icon['name'] = $file;
					$icon['wpurl'] = $value[1] . "/" . $file;
					$files[ $key ][ $icon['name'] ] = $icon;
				}
			}
		}

		ksort($files);
		return $files;
	}
	
	function cp_show_icons() {
		$icons = cp_get_icon_list();
		$locations = cp_get_icon_locations();
		
		foreach ( $locations as $key => $value ) {
			echo '<div class="new-icon-block ' . $key . '">';
			foreach ( $icons[ $key ] as $icon ) {
				echo '<ul class="cpmobile-iconblock">';
				if ( $key == 'custom' ) {
					echo '<a title="Click to Delete" href="' . $_SERVER['REQUEST_URI'] . '&amp;delete_icon=' . urlencode($icon['wpurl']) . '&amp;nonce=' . wp_create_nonce( 'cpmobile_delete_nonce' ) . '">';
				}
				echo '<li><img src="' . $icon['wpurl'] . '" title="' . $icon['name'] . '" /><br /><span>' . $icon['friendly'] . '</span>';
				echo '</li>';
				if ( $key == 'custom' ) {
					echo '</a>';	
				}
				echo '</ul>';
			}	
			echo '</div>';
		}
	}	
	
	function cp_get_icon_drop_down_list( $selected_item ) {
		$icons = cp_get_icon_list();
		$locations = cp_get_icon_locations();
		$files = array();
		
		foreach ( $locations as $key => $value ) {
			foreach ( $icons[ $key ] as $icon ) {
				$files[ $icon['name'] ] = $icon;
			}	
		}
		
		ksort( $files );
		
		foreach ( $files as $key => $file ) {
			$is_selected = '';
			if ( $selected_item == $file['name'] ) {
				$is_selected = ' selected';
			}
			echo '<option' . $is_selected . ' value="' . $file['name'] . '">'. $file['friendly'] . '</option>';
		}
	}
	
	function cp_get_pages_for_icons() {
		global $table_prefix;
		global $wpdb;
		
		$query = "select * from {$table_prefix}posts where post_type = 'page' and post_status = 'publish' order by post_title asc";
		$results = $wpdb->get_results( $query );
		if ( $results ) {
			return $results;
		}
	}
	
	function cp_get_master_icon_list() {
	}

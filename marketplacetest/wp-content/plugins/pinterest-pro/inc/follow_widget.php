<?php

/*-----------------------------------------------------------------------------------*/
/*	Create Widget
/*-----------------------------------------------------------------------------------*/

class pinterest_follow_widget extends WP_Widget {
 
 
/*-----------------------------------------------------------------------------------*/
/*	Constructor - Should be same as above
/*-----------------------------------------------------------------------------------*/

    function pinterest_follow_widget() {
        parent::WP_Widget(false, $name = 'Pinterest "Follow Me" Widget', array( 'description' => 'Quickly insert a "Follow Me" button from Pinterest in your sidebars.' ) );	
    }
 
    /* @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract($args);
		$title	  = apply_filters('widget_title', $instance['title'] );
        $username = $instance['username'];
        $size	  = $instance['size'];
		
		// Configure button size
		switch($size){
			
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

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display name from widget settings if one was input. */
		if ( $username )
			echo'<a href="http://pinterest.com/'.$username.'/">'.$follow_image.'</a>';

		/* After widget (defined by themes). */
		echo $after_widget;

    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['size'] = strip_tags($new_instance['size']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance){	
 
        $title		= esc_attr($instance['title']);
        $username	= esc_attr($instance['username']);
        $size	 	= esc_attr($instance['size']);
		
        ?>
        
        
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Pinterest Username'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" />
        </p>
		<p>
        <label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Button Size'); ?></label> 
        <select class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
          <option value="small" <?PHP if($size == "small"){echo"selected";} ?>>Small (16x16)</option>
          <option value="pill" <?PHP if($size == "pill"){echo"selected";} ?>>Pill Button (78x26)</option>
          <option value="medium" <?PHP if($size == "medium"){echo"selected";} ?>>"Follow" Button (156x26)</option>
          <option value="box" <?PHP if($size == "box"){echo"selected";} ?>>Box (61x61)</option>
        </select>
        </p>
        <?php 
    }
 
 
} // end class example_widget

/*-----------------------------------------------------------------------------------*/
/*	Hook Dat Widgetz!
/*-----------------------------------------------------------------------------------*/

add_action('widgets_init', create_function('', 'return register_widget("pinterest_follow_widget");'));

?>
<?php

/*-----------------------------------------------------------------------------------*/
/*	Create Widget
/*-----------------------------------------------------------------------------------*/

class pinterest_pinit_widget extends WP_Widget {
 
 
/*-----------------------------------------------------------------------------------*/
/*	Constructor - Should be same as above
/*-----------------------------------------------------------------------------------*/

    function pinterest_pinit_widget() {
        parent::WP_Widget(false, $name = 'Pinterest "Pin It" Widget', array( 'description' => 'Quickly insert a "Pin It" button from Pinterest in your sidebars.' ) );	
    }
 
    /* @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract($args);
		$title		 = apply_filters('widget_title', $instance['title'] );
        $url		 = $instance['url'];
        $image_url	 = $instance['image_url'];
        $counter	 = $instance['counter'];
        $desc		 = $instance['desc'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display name from widget settings if one was input. */
		if ( $url )
			echo'<a href="http://pinterest.com/pin/create/button/?url='.urlencode($url).'&media='.urlencode($image_url).'&description='.urlencode($desc).'" class="pin-it-button" count-layout="'.$counter.'">Pin It</a>';

		/* After widget (defined by themes). */
		echo $after_widget;

    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['url'] = strip_tags($new_instance['url']);
		$instance['image_url'] = strip_tags($new_instance['image_url']);
		$instance['counter'] = strip_tags($new_instance['counter']);
		$instance['desc'] = strip_tags($new_instance['desc']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance){	
 
        $title		 = esc_attr($instance['title']);
        $url		 = esc_attr($instance['url']);
        $image_url	 = esc_attr($instance['image_url']);
        $counter	 = esc_attr($instance['counter']);
        $desc		 = esc_attr($instance['desc']);
		
        ?>
        
        
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Pin URL'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('image_url'); ?>"><?php _e('Pin Image URL'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" type="text" value="<?php echo $image_url; ?>" />
        </p>
		<p>
        <label for="<?php echo $this->get_field_id('counter'); ?>"><?php _e('Counter Display'); ?></label> 
        <select class="widefat" id="<?php echo $this->get_field_id('counter'); ?>" name="<?php echo $this->get_field_name('counter'); ?>">
          <option value="none" <?PHP if($counter == "none"){echo"selected";} ?>>No Counter</option>
          <option value="horizontal" <?PHP if($counter == "horizontal"){echo"selected";} ?>>Button Count</option>
          <option value="vertical" <?PHP if($counter == "vertical"){echo"selected";} ?>>Box Count</option>
        </select>
        </p>
         <p>
          <label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Description (Optional)'); ?></label>
          <textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"><?php echo $instance['desc']; ?></textarea>
        </p>
        <?php 
    }
 
 
} // end class example_widget

/*-----------------------------------------------------------------------------------*/
/*	Hook Dat Widgetz!
/*-----------------------------------------------------------------------------------*/

add_action('widgets_init', create_function('', 'return register_widget("pinterest_pinit_widget");'));

?>
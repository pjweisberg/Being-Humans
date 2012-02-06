<?php
/***********FLICKR**********/
     class typo_flick_widget extends WP_Widget {
     function typo_flick_widget() {
     $widget_ops = array( 'description' => 'Flickr gallery' );
     $this->WP_Widget('', 'Flickr', $widget_ops);
     $this->flick_numbers = array(
            "3" => "3",
            "6" => "6",
            "9" => "9",

        );
     }
      
     function widget($args, $instance) {
     extract($args, EXTR_SKIP);
      
     $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
     $idflickr = empty($instance['idflickr']) ? ' ' : apply_filters('widget_entry_title', $instance['idflickr']);
     $numberflickr = $instance['numberflickr'];

     echo $before_widget;
     if ( $title ) echo $before_title . $title . $after_title; 
       
     echo '<div id="flickr"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$numberflickr.'&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user='.$idflickr.'"></script></div>';
     echo $after_widget;
     }
      
     function update($new_instance, $old_instance) {
     $instance = $old_instance;
     $instance['title'] = strip_tags($new_instance['title']);
     $instance['idflickr'] = strip_tags($new_instance['idflickr']);
     $instance['numberflickr'] =$new_instance['numberflickr'];
      
     return $instance;
     }
      
     function form($instance) {
     $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'idflickr' => '', 'numberflickr' => '' ) );
     $title = strip_tags($instance['title']);
     $idflickr = strip_tags($instance['idflickr']);
     $numberflickr = $instance['numberflickr'];
     ?>
     <p><label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:','typo-o-graphy'); ?><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
     <p><label for="<?php echo $this->get_field_id('idflickr'); ?>"><?php _e('"Flickr"- ID. <a href="http://idgettr.com/">idgettr.com</a>','typo-o-graphy'); ?> <input class="widefat" id="<?php echo $this->get_field_id('idflickr'); ?>" name="<?php echo $this->get_field_name('idflickr'); ?>" type="text" value="<?php echo esc_attr($idflickr); ?>" /></label></p>
     <p>
			<label for="<?php echo $this->get_field_id('numberflickr'); ?>"><?php _e('Number of photo to display:','typo-o-graphy'); ?></label>
            <select name="<?php echo $this->get_field_name('numberflickr'); ?>" id="<?php echo $this->get_field_id('numberflickr'); ?>" class="widefat">
            <?php foreach ($this->flick_numbers as $key => $nmb) { ?>
                <option value="<?php echo $key; ?>" <?php if ($instance['numberflickr'] == $key) { echo " selected "; } ?>><?php echo $nmb; ?></option>
            <?php } ?>
            </select>
		</p>
  
     <?php
     }
     }
     register_widget('typo_flick_widget');
/***********TWITTER**********/
class typo_twitter_widget extends WP_Widget {
     function typo_twitter_widget() {
     $widget_ops = array('classname' => 'twitter_bg', 'description' =>
     'A widget to enable people to follow you on Twitter' );
     $this->WP_Widget('', 'Twitter', $widget_ops);
     $this->twitt_numbers = array(
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
        );
     }
      
     function widget($args, $instance) {
     extract($args, EXTR_SKIP);
      
     $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
     $twitter = empty($instance['twitter']) ? '' : apply_filters('widget_entry_title', $instance['twitter']);
     $numbertwitter = $instance['numbertwitter'];

     echo $before_widget;
     if (!empty($title)) {echo $before_title . $title . $after_title;   }
    
	echo '<div class="twitterbar"><div id="twitter_div">		
		<ul id="twitter_update_list"><li>&nbsp;</li></ul>
		<div id="twi"></div>
	</div>
	<span id="twitter-follow"><a id="twitter-link" href="http://twitter.com/'.$twitter.'">follow me on Twitter</a></span>
	<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
	<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$twitter.'.json?callback=twitterCallback2&amp;count='.$numbertwitter.'"></script>
    </div>';
  
     echo $after_widget;
     }
      
     function update($new_instance, $old_instance) {
     $instance = $old_instance;
     $instance['title'] = strip_tags($new_instance['title']);
     $instance['twitter'] = strip_tags($new_instance['twitter']);
     $instance['numbertwitter'] = $new_instance['numbertwitter'];
      
     return $instance;
     }
      
     function form($instance) {
     $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'twitter' => '', 'numbertwitter' => '' ) );
     $title = strip_tags($instance['title']);
     $twitter = strip_tags($instance['twitter']);
     $numbertwitter = $instance['numbertwitter'];
     ?>
     <p><label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title:','typo-o-graphy'); ?><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
     <p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('User:','typo-o-graphy'); ?> <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></label></p>
       <p>
			<label for="<?php echo $this->get_field_id('numbertwitter'); ?>"><?php _e('Number of Tweets to display:','typo-o-graphy'); ?></label>
            <select name="<?php echo $this->get_field_name('numbertwitter'); ?>" id="<?php echo $this->get_field_id('numbertwitter'); ?>" class="widefat">
            <?php foreach ($this->twitt_numbers as $key => $nmb) { ?>
                <option value="<?php echo $key; ?>" <?php if ($instance['numbertwitter'] == $key) { echo " selected "; } ?>><?php echo $nmb; ?></option>
            <?php } ?>
            </select>
		</p>
     <?php
     }
     }
     register_widget('typo_twitter_widget');
     /***********ABOUT**********/
class typo_about_widget extends WP_Widget {
     function typo_about_widget() {
     $widget_ops = array('classname' => 'vcard', 'description' => 'About' );
     $this->WP_Widget('', 'About', $widget_ops);
     }
      
     function widget($args, $instance) {
     extract($args, EXTR_SKIP);
      
     $name = empty($instance['name']) ? '' : apply_filters('widget_title', $instance['name']);
     $photo = empty($instance['photo']) ? '' : apply_filters('widget_entry_title', $instance['photo']);
     $desc = empty($instance['desc']) ? '' : apply_filters('widget_entry_title', $instance['desc']);

     echo $before_widget;
     if (!empty($title)) {echo $before_title . $title . $after_title;}
    
     echo '<ul>';
	 if (!empty($photo)) {echo '<li class="photo"><img src="'.$photo.'" alt="'.$photo.'" width="80" height="80" /></li>';}
  	 if (!empty($name)) {echo '<li class="fn"><h3>'.$name.'</h3></li>';}
     if (!empty($desc)) {echo '<li class="note">'.$desc.'</li>';} else {bloginfo('description');}
     echo '</ul>';
  
     echo $after_widget;
     }
      
     function update($new_instance, $old_instance) {
     $instance = $old_instance;
     $instance['name'] = strip_tags($new_instance['name']);
      $instance['photo'] = strip_tags($new_instance['photo']);
     $instance['desc'] = strip_tags($new_instance['desc']);
      
     return $instance;
     }
      
     function form($instance) {
     $instance = wp_parse_args( (array) $instance, array( 'name' => '', 'photo' => '', 'desc' => '' ) );
     $name = strip_tags($instance['name']);
      $photo = strip_tags($instance['photo']);
     $desc = strip_tags($instance['desc']);
     ?>
     <p><label for="<?php echo $this->get_field_id('name'); ?>"> <?php _e('Name:','typo-o-graphy'); ?><input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo esc_attr($name); ?>" /></label></p>
     <p><label for="<?php echo $this->get_field_id('photo'); ?>"><?php _e('Link to your image(80x80px):','typo-o-graphy'); ?> <input class="widefat" id="<?php echo $this->get_field_id('photo'); ?>" name="<?php echo $this->get_field_name('photo'); ?>" type="text" value="<?php echo esc_attr($photo); ?>" /></label></p>
     <p><label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Description:','typo-o-graphy'); ?> <textarea  rows="5" cols="30" class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>"  value="<?php echo esc_attr($desc); ?>" ><?php echo esc_attr($desc); ?></textarea></label></p>
     
     <?php
     }
     }
     register_widget('typo_about_widget');
?>

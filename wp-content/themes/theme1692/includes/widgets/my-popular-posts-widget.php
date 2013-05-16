<?php
// =============================== My Popular Post widget ======================================
class MY_PopularPostsWidget extends WP_Widget {
    /** constructor */
    function MY_PopularPostsWidget() {
        parent::WP_Widget(false, $name = 'My - Popular Posts');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
				$count = apply_filters('widget_count', $instance['count']);
				$linktext = apply_filters('widget_linktext', $instance['linktext']);
				$linkurl = apply_filters('widget_linkurl', $instance['linkurl']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
						
							
              
              <?php global $wpdb; ?>
			  
             <ul class="popular-posts">
								<?php
                $pop_posts = $count;
				$min_votes = 0;
				$ratings_max = intval(get_option('postratings_max'));
				$ratings_custom = intval(get_option('postratings_customrating'));
				$output = '';
				if(!empty($mode) && $mode != 'both') {
					$where = "$wpdb->posts.post_type = '$mode'";
				} else {
					$where = '1=1';
				}
				if($ratings_custom && $ratings_max == 2) {
					$order_by = 'ratings_score';
				} else {
					$order_by = 'ratings_average';
				}
					$temp = stripslashes(get_option('postratings_template_mostrated'));
                    $popularposts = "SELECT DISTINCT $wpdb->posts.*, (t1.meta_value+0.00) AS ratings_average, (t2.meta_value+0.00) AS ratings_users, (t3.meta_value+0.00) AS ratings_score FROM $wpdb->posts LEFT JOIN $wpdb->postmeta AS t1 ON t1.post_id = $wpdb->posts.ID LEFT JOIN $wpdb->postmeta As t2 ON t1.post_id = t2.post_id LEFT JOIN $wpdb->postmeta AS t3 ON t3.post_id = $wpdb->posts.ID WHERE t1.meta_key = 'ratings_average' AND t2.meta_key = 'ratings_users' AND t3.meta_key = 'ratings_score' AND $wpdb->posts.post_password = '' AND $wpdb->posts.post_date < '".current_time('mysql')."' AND $wpdb->posts.post_status = 'publish' AND t2.meta_value >= $min_votes AND $where ORDER BY ratings_users DESC, $order_by DESC LIMIT ".$pop_posts;
                    $posts = $wpdb->get_results($popularposts);
                    if($posts){
                      foreach($posts as $post){
                        $post_title = stripslashes($post->post_title);
                        $guid = get_permalink($post->ID);
                        $thumb = get_post_meta($post->ID,'_thumbnail_id',false);
                        $thumb = wp_get_attachment_image_src($thumb[0], 'thumbnail', false);
                        $thumb = $thumb[0];
                	?>
                        <li>
                          <?php if ($thumb) { ?>
                            <figure class="post-thumb">
                              <a href="<?php echo $guid; ?>"><img class="thumbnail" src="<?php echo $thumb; ?>" /></a>
                            </figure>
                          <?php } else { ?>
                          	<figure class="post-thumb empty-thumb"></figure>
                          <?php } ?>
                        <div class="extra-wrap">
							<h5><a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php echo my_string_limit_char($post_title,33);?>...</a></h5>
							<?php the_ratings($start_tag = 'div', $custom_id = $post->ID, $display = true); ?>
						</div>						  
                        </li>
                    <?php
                        }
                    }
                    ?>
              </ul>
              <!-- Link under post cycle -->
		    <?php if($linkurl !=""){?>
                <a href="<?php echo $linkurl; ?>" class="link"><?php echo $linktext; ?></a>
              <?php } ?>
              
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
			$title = esc_attr($instance['title']);
			$count = esc_attr($instance['count']);
			$linktext = esc_attr($instance['linktext']);
			$linkurl = esc_attr($instance['linkurl']);
    ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'theme1692'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
      
      <p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Posts per page:', 'theme1692'); ?><input class="widefat" style="width:30px; display:block; text-align:center" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
      
      <p><label for="<?php echo $this->get_field_id('linktext'); ?>"><?php _e('Link Text:', 'theme1692'); ?> <input class="widefat" id="<?php echo $this->get_field_id('linktext'); ?>" name="<?php echo $this->get_field_name('linktext'); ?>" type="text" value="<?php echo $linktext; ?>" /></label></p>
			 
			 <p><label for="<?php echo $this->get_field_id('linkurl'); ?>"><?php _e('Link Url:', 'theme1692'); ?> <input class="widefat" id="<?php echo $this->get_field_id('linkurl'); ?>" name="<?php echo $this->get_field_name('linkurl'); ?>" type="text" value="<?php echo $linkurl; ?>" /></label></p>

      </label></p>
      <?php 
    }

} // class Cycle Widget


?>
<?php

	$functions_path = TEMPLATEPATH . '/functions/';
	$includes_path = TEMPLATEPATH . '/includes/';
	
	//Loading jQuery and Scripts
	require_once $includes_path . 'theme-scripts.php';
	
	//Widget and Sidebar
	require_once $includes_path . 'sidebar-init.php';
	require_once $includes_path . 'register-widgets.php';
	
	//Theme initialization
	require_once $includes_path . 'theme-init.php';
	
	//Additional function
	require_once $includes_path . 'theme-function.php';
	
	//Shortcodes
	require_once $includes_path . 'theme_shortcodes/shortcodes.php';
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/alert.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/tabs.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/toggle.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/html.php');
	
	//tinyMCE includes
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/tinymce/tinymce_shortcodes.php');
	
	//Aqua Resizer for image cropping and resizing on the fly
	require_once $includes_path . 'aq_resizer.php';
	
	
	//Loading theme textdomain
	load_theme_textdomain( 'theme1692', TEMPLATEPATH . '/languages' );
	
	
	
	
	

	
	
	
	
	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/' );
		require_once dirname( __FILE__ ) . '/admin/options-framework.php';
	}
	
	
	
		
	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
	
	
	// Custom excpert length
	function new_excerpt_length($length) {
	return 150;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
  
	
	// enable shortcodes in sidebar
	add_filter('widget_text', 'do_shortcode');
	
	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	
	
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');

function mytheme_comment($comment, $args, $depth) {
     $GLOBALS['comment'] = $comment;
	
?> 
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
     	<div class="comment-body">
     	 <div class="comment-author vcard">
     	    <?php echo get_avatar( $comment->comment_author_email, 60 ); ?>
     	 </div>
     	 <div class="extra-wrap">
     	 	<?php if ($comment->comment_approved == '0') : ?>
     	 	   <em><?php _e('Your comment is awaiting moderation.') ?></em>
     	 	<?php endif; ?>
     	 	     <?php comment_text() ?>
     	 		<div class="reply">
					<span class="comment-meta commentmetadata"><?php printf(__('%1$s <span class="author">%2$s</span>' ), get_comment_date('F j, Y'), get_comment_author_link()) ?></span>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     	 		 </div>
     	 </div>      
     	    </div>
     </div>
<?php } ?>
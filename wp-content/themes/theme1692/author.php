<?php get_header(); ?>
<div id="content" class="grid_9 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
      else :
      $curauth = get_userdata(intval($author));
    endif;
  ?>
  <div class="author-info">
    <h1><?php _e('About:', 'theme1692'); ?> <?php echo $curauth->display_name; ?></h1>
    <p class="avatar">
      <?php if(function_exists('get_avatar')) { echo get_avatar( $curauth->user_email, $size = '120' ); } /* Displays the Gravatar based on the author's email address. Visit Gravatar.com for info on Gravatars */ ?>
    </p>
    
    <?php if($curauth->description !="") { /* Displays the author's description from their Wordpress profile */ ?>
      <p><?php echo $curauth->description; ?></p>
    <?php } ?>
  </div><!--.author-->
  <div id="recent-author-posts">
    <h2><?php _e('Recent Posts by', 'theme1692'); ?> <?php echo $curauth->display_name; ?></h2>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /* Displays the most recent posts by that author. Note that this does not display custom content types */ ?>
      <?php static $count = 0;
        if ($count == "5") // Number of posts to display
                { break; }
        else { ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
						<header class="entry-header">
							<h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
							  <?php $post_meta = of_get_option('post_meta'); ?>
										<?php if ($post_meta=='true' || $post_meta=='') { ?>
								<div class="post-meta">
									<?php _e('By', 'theme1692'); ?> <?php the_author_posts_link() ?> <?php _e('on', 'theme1692'); ?> <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('F j, Y'); ?></time> <?php _e('in', 'theme1692'); ?> <?php the_category(', ') ?>
									<?php comments_popup_link('0', '1', '%', 'comments-link', 'x'); ?>
								</div><!--.post-meta-->
							  <?php } ?>	
						</header>
						<?php if(has_post_thumbnail()) { ?>
							<figure class="featured-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
						<?php } ?>
						
						<div class="post-content">
							<?php $post_excerpt = of_get_option('post_excerpt'); ?>
								<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
								<div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,145);?></div>
							  <?php } ?>
							  <p>
								<a href="<?php the_permalink() ?>" class="button"><?php _e('Read more', 'theme1692'); ?></a>
							  </p>
							  <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
						</div>
						<footer class="post-footer">
							<?php the_tags('Tags: ', ' ', ''); ?>
						</footer>
					</article>
					
					
      <?php $count++; } ?>
      <?php endwhile; else: ?>
        <p>
          <?php _e('No posts by', 'theme1692'); ?> <?php echo $curauth->display_name; ?> <?php _e('yet.', 'theme1692'); ?>
        </p>
    <?php endif; ?>
    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
      <nav class="oldernewer">
        <div class="older">
          <?php next_posts_link( __('&laquo; Older Entries', 'theme1692')) ?>
        </div><!--.older-->
        <div class="newer">
          <?php previous_posts_link(__('Newer Entries &raquo;', 'theme1692')) ?>
        </div><!--.newer-->
      </nav><!--.oldernewer-->
    <?php endif; ?>
  </div><!--#recentPosts-->
  <div id="recent-author-comments">
    <h2><?php _e('Recent Comments by', 'theme1692'); ?> <?php echo $curauth->display_name; ?></h2>
      <?php
        $number=5; // number of recent comments to display
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number");
      ?>
      <ul>
        <?php
          if ( $comments ) : foreach ( (array) $comments as $comment) :
          echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_date(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
        endforeach; else: ?>
                  <p>
                    <?php _e('No comments by', 'theme1692'); ?> <?php echo $curauth->display_name; ?> <?php _e('yet.', 'theme1692'); ?>
                  </p>
        <?php endif; ?>
            </ul>
  </div><!--#recentAuthorComments-->

  
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
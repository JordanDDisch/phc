<?php get_header(); ?>
	<div id="content" class="grid_9 <?php echo of_get_option('blog_sidebar_pos') ?>">
  	<?php include_once (TEMPLATEPATH . '/title.php');?> 
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
        <?php $post_image_size = of_get_option('post_image_size'); ?>
				<?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
          <?php if(has_post_thumbnail()) { ?>
				    <figure class="featured-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
          <?php } ?>
					<?php } else { ?>
          <?php if(has_post_thumbnail()) { ?>
						<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
						$image = aq_resize( $img_url, 701, 264, true ); //resize & crop img
						?>
						<figure class="featured-thumbnail large">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
						</figure>
						<div class="clear"></div>
          <?php } ?>
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
      </article>
      
    <?php endwhile; else: ?>
      <div class="no-results">
				<?php echo '<p><strong>' . __('There has been an error.', 'theme1692') . '</strong></p>'; ?>
        <p><?php _e('We apologize for any inconvenience, please', 'theme1692'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'theme1692'); ?></a> <?php _e('or use the search form below.', 'theme1692'); ?></p>
        <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
      </div><!--no-results-->
    <?php endif; ?>
    
    <?php if(function_exists('wp_pagenavi')) : ?>
			<?php wp_pagenavi(); ?>
    <?php else : ?>
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
    <?php endif; ?>
    <!-- Page navigation -->

	</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
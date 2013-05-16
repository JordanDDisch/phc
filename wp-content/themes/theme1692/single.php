<?php get_header(); ?>
<div id="content" class="grid_9 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="post-holder single-post">
        <header class="entry-header">
			  <h4><?php the_title(); ?></h4>
			  <?php $post_meta = of_get_option('post_meta'); ?>
						<?php if ($post_meta=='true' || $post_meta=='') { ?>
				<div class="post-meta">
					<?php _e('By', 'theme1692'); ?> <?php the_author_posts_link() ?> <?php _e('on', 'theme1692'); ?> <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('F j, Y'); ?> 
					<?php if (the_category(', ')) {
						_e('in', 'theme1692');
					} ?>
					<?php if (has_term('', 'portfolio_category', $post->ID)) { ?>
						<?php _e('in', 'theme1692'); ?>
						<?php the_terms($post->ID, 'portfolio_category','',', '); ?>
					<?php } ?>
					<?php comments_popup_link('0', '1', '%', 'comments-link', 'x'); ?>
				</div><!--.post-meta-->
			  <?php } ?>		
        </header>
        <?php $single_image_size = of_get_option('single_image_size'); ?>
				<?php if($single_image_size=='' || $single_image_size=='normal'){ ?>
          <?php if(has_post_thumbnail()) { ?>
				    <figure class="featured-thumbnail"><?php the_post_thumbnail(); ?></figure>
          <?php } ?>
        <?php } else { ?>
          <?php if(has_post_thumbnail()) { ?>
						<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
						$image = aq_resize( $img_url, 650, 350, true ); //resize & crop img
						?>
						<figure class="featured-thumbnail large">
							<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
						</figure>
						<div class="clear"></div>
          <?php } ?>
        <?php } ?>
        <div class="post-content">
          <?php the_content(); ?>
		  <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.post-content-->
      </article>
    </div><!-- #post-## -->
    
    
    <nav class="oldernewer">
      <div class="older">
        <?php previous_post_link('%link', __('&laquo; Previous post', 'theme1692')) ?>
      </div><!--.older-->
      <div class="newer">
        <?php next_post_link('%link', __('Next Post &raquo;', 'theme1692')) ?>
      </div><!--.newer-->
    </nav><!--.oldernewer-->

    <?php comments_template( '', true ); ?>

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
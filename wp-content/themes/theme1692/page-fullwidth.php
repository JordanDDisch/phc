<?php
/**
 * Template Name: Fullwidth Page
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
        <?php if(has_post_thumbnail()) {
          echo '<a href="'; the_permalink(); echo '">';
          echo '<figure class="featured-thumbnail"><span class="img-wrap">'; the_post_thumbnail(); echo '</span></figure>';
          echo '</a>';
          }
        ?>
		<?php the_content(); ?>
    </div><!--#post-# .post-->
  <?php endwhile; ?>
<?php get_footer(); ?>

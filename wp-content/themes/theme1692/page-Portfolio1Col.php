<?php
/**
 * Template Name: Portfolio 1 column
 */

get_header(); ?>

<div id="content" class="grid_12">
	<?php include_once (TEMPLATEPATH . '/title.php');?>   
  <?php global $more;	$more = 0;?>
  <?php $values = get_post_custom_values("category-include"); $cat=$values[0];  ?>
  <?php $catinclude = 'portfolio_category='. $cat ;?>
  
  <?php $temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query(); ?>
  <?php $wp_query->query("post_type=portfolio&". $catinclude ."&paged=".$paged.'&showposts=5'); ?>
  <?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'theme1692' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'theme1692' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>
<div id="gallery" class="one_column">
  <ul class="portfolio">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php
      $custom = get_post_custom($post->ID);
      $lightbox = $custom["lightbox-url"][0];
    ?>
    
      <li>
				<div class="clearfix">
					<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
					$image = aq_resize( $img_url, 507, 260, true ); //resize & crop img
					?>
        	<?php if($lightbox!=""){ ?>
					<span class="image-border"><a class="image-wrap" href="<?php echo $lightbox;?>" data-gal="prettyPhoto[gallery]" title="<?php the_title();?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /><span class="zoom-icon"></span></a></span>
					<?php }else{ ?>
					<span class="image-border"><a class="image-wrap" href="<?php the_permalink() ?>" title="<?php _e('Permanent Link to', 'theme1692');?> <?php the_title_attribute(); ?>" ><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a></span>
					<?php } ?>
          <div class="folio-desc">
            <h4><a href="<?php the_permalink(); ?>"><?php $title = the_title('','',FALSE); echo substr($title, 0, 40); ?></a></h4>
			<p class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,40);?></p>
            <p>
            	<a href="<?php the_permalink() ?>" class="button"><?php _e('Read more', 'theme1692'); ?></a>
            </p>
			<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
          </div>
        </div>
      </li>
    
  
    <?php endwhile; ?>
  </ul>
  <div class="clear"></div>
</div>





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

<?php $wp_query = null; $wp_query = $temp;?>
</div><!-- #content -->
<!-- end #main -->
<?php get_footer(); ?>
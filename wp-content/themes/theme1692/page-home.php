<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>
<div class="before-content">
	<div class="clearfix">
	  	<?php if ( ! dynamic_sidebar( 'Before Content Area' ) ) : ?>
	      <!--Widgetized 'Before Content Area' for the home page-->
	    <?php endif ?>
	</div>
</div>
<div class="clearfix">
	<div class="grid_9">
		<?php if ( ! dynamic_sidebar( 'Content Area 1' ) ) : ?>
			<!--Widgetized 'Content Area 1' for the home page-->
	    <?php endif ?>
	</div>
	<div class="grid_3 list-2">
		<?php if ( ! dynamic_sidebar( 'Content Area 2' ) ) : ?>
			<!--Widgetized 'Content Area 2' for the home page-->
	    <?php endif ?>
	</div>
</div>
<?php get_footer(); ?>
  </div>
  </div><!--.container-->
	<footer id="footer">
	<?php if( is_front_page() ) { ?>
		<div class="footer-bg">
			<div class="container_12 clearfix">
				<div id="widget-footer" class="clearfix">
					<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
					  <!--Widgetized Footer-->
					<?php endif ?>
				</div>
			</div><!--.container-->
		</div>
		<?php } ?>
		<div id="copyright" class="clearfix">
						<?php if ( of_get_option('footer_menu') == 'true') { ?>  
							<nav class="footer">
								<?php wp_nav_menu( array(
									'container'       => 'ul', 
									'menu_class'      => 'footer-nav', 
									'depth'           => 0,
									'theme_location' => 'footer_menu' 
									)); 
								?>
							</nav>
						<?php } ?>
						<div id="footer-text">
							<?php $myfooter_text = of_get_option('footer_text'); ?>
							
							<?php if($myfooter_text){?>
								<?php echo of_get_option('footer_text'); ?>
							<?php } else { ?>
								<a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php bloginfo('name'); ?></a> <?php _e('is proudly powered by', 'theme1692'); ?> <a href="http://wordpress.org">WordPress</a> <a href="<?php if ( of_get_option('feed_url') != '' ) { echo of_get_option('feed_url'); } else bloginfo('rss2_url'); ?>" rel="nofollow" title="<?php _e('Entries (RSS)', 'theme1692'); ?>"><?php _e('Entries (RSS)', 'theme1692'); ?></a> and <a href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow"><?php _e('Comments (RSS)', 'theme1692'); ?></a>
								<a href="<?php bloginfo('url'); ?>/privacy-policy/" title="Privacy Policy"><?php _e('Privacy Policy', 'theme1692'); ?></a>
							<?php } ?>
						</div>
						<div class="clear"></div>
						<?php if( is_front_page() ) { ?>
							More Fitness WordPress Themes at <a rel="nofollow" href="http://www.templatemonster.com/category/fitness-wordpress-themes/" target="_blank">TemplateMonster.com</a>
						<?php } ?>
				</div>
	</footer>
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	
<?php } ?></div>
</body>
</html>
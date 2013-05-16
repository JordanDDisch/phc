<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
<head>
	<title><?php if ( is_category() ) {
		echo __('Category Archive for &quot;', 'theme1692'); single_cat_title(); echo __('&quot; | ', 'theme1692'); bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo __('Tag Archive for &quot;', 'theme1692'); single_tag_title(); echo __('&quot; | ', 'theme1692'); bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo __(' Archive | ', 'theme1692'); bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo __('Search for &quot;', 'theme1692').wp_specialchars($s).__('&quot; | ', 'theme1692'); bloginfo( 'name' );
	} elseif ( is_home() || is_front_page()) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo __('Error 404 Not Found | ', 'theme1692'); bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	} ?></title>
	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
  <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
  <![endif]-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/grid.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/colorstheme.css" />
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  <!--[if lt IE 9]>
  <style type="text/css">
	.nivo-controlNav a,
	.post_list.before_content .rating,
	.before-content,
	.footer-bg,
	.primary_content_wrap,
	.button,
	h1, h2,
	.post_list.before_content li img,
	.featured-thumbnail img,
	.popular-posts li .post-thumb .thumbnail,
	.folio_cycle .folio_item .featured-thumbnail img,
	.list-2 div:first-child li a,
	.second_content,
	.list-1 li a,
	#gallery .portfolio li span.image-border,
	.tags-cloud a, .tagcloud a, .post-footer a{
      behavior:url(<?php bloginfo('stylesheet_directory'); ?>/PIE.php)
      }
	#respond h2 {border-radius:0;}
  </style>
  <![endif]-->
  
  <!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
  
  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout 
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>'<?php if (of_get_option('sf_sl_animation')=='show') { ?>,height:'<?php echo of_get_option('sf_sl_animation'); ?>'<?php } ?>}, // fade-in and slide-down animation
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed 
				autoArrows:  <?php echo of_get_option('sf_arrows'); ?>,   // generation of arrow mark-up (for submenu) 
				dropShadows: <?php echo of_get_option('sf_shadows'); ?>   // drop shadows (for submenu)
			});
			
			// prettyphoto init
			jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				slideshow:5000,
				autoplay_slideshow: false
			});
			
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
  </script>
  
  <script type="text/javascript">
		jQuery(window).load(function() {
			// nivoslider init
			jQuery('#slider').nivoSlider({
				effect: '<?php echo of_get_option('sl_effect'); ?>',
				slices:<?php echo of_get_option('sl_slices'); ?>,
				boxCols:<?php echo of_get_option('sl_box_columns'); ?>,
				boxRows:<?php echo of_get_option('sl_box_rows'); ?>,
				animSpeed:<?php echo of_get_option('sl_animation_speed'); ?>,
				pauseTime:<?php echo of_get_option('sl_pausetime'); ?>,
				directionNav:<?php echo of_get_option('sl_dir_nav'); ?>,
				directionNavHide:<?php echo of_get_option('sl_dir_nav_hide'); ?>,
				controlNav:<?php echo of_get_option('sl_control_nav'); ?>,
				captionOpacity:<?php $sl_caption_opacity = of_get_option('sl_caption_opacity'); if ($sl_caption_opacity != '') { echo of_get_option('sl_caption_opacity'); } else { echo '0'; } ?>
			});
		});
	</script>
  <!-- Custom CSS -->
	<?php if(of_get_option('custom_css') != ''){?>
  <style type="text/css">
  	<?php echo of_get_option('custom_css' ) ?>
  </style>
  <?php }?>
  
  
  
  
  <style type="text/css">
		/* Body styling options */
		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>
		
  	/* Header styling options */
		<?php $header_styling = of_get_option('header_color'); 
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>
		
		/* Links and buttons color */
		<?php $links_styling = of_get_option('links_color'); 
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>
		
		/* Body typography */
		<?php $body_typography = of_get_option('body_typography'); 
			if($body_typography) {
				echo 'body {font-family:'.$body_typography['face'].'; color:'.$body_typography['color'].'}';
				echo '#main {font-size:'.$body_typography['size'].'; font-style:'.$body_typography['style'].';}';
			}
		?>
  </style>
</head>

<body <?php body_class(); ?>>
<div class="cont">
<div id="main"><!-- this encompasses the entire Web site -->
	<header id="header">
				<div class="logo">
					<?php if(of_get_option('logo_type') == 'text_logo'){?> 
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
					 <h1><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
					<?php } else { ?>
					  <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>
				  <?php } else { ?>
					<?php if(of_get_option('logo_url') != ''){ ?>
						<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
					<?php } else { ?>
						<a href="<?php bloginfo('url'); ?>/" id="logo"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
					<?php } ?>
				  <?php }?> 
				</div> 
				
				<div class="special-list">
					<?php if(is_user_logged_in()) { ?>
						<?php wp_loginout(); ?>
					<?php } else { ?>
						<a href="<?php bloginfo('url'); ?>/wp-login.php?action=register"><?php _e('Register', 'theme1692');?></a><?php wp_loginout(); ?>
					<?php } ?>
					<a href="<?php if ( of_get_option('feed_url') != '' ) { echo of_get_option('feed_url'); } else bloginfo('rss2_url'); ?>" rel="nofollow" title="<?php _e('Entries RSS', 'theme1692'); ?>"><?php _e('Entries RSS', 'theme1692'); ?></a><a href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow"><?php _e('Comments RSS', 'theme1692'); ?></a><a href="http://wordpress.org">WordPress.org</a>
				</div>
				<div class="clear"></div>
				<div id="widget-header">
					<?php if ( ! dynamic_sidebar( 'Header' ) ) : ?><!-- Wigitized Header --><?php endif ?>
				</div><!--#widget-header-->
				<div class="clear"></div>
				<div class="row-top">
					<nav class="primary">
					  <?php wp_nav_menu( array(
							'container'       => 'ul', 
							'menu_class'      => 'sf-menu', 
							'menu_id'         => 'topnav',
							'depth'           => 0,
							'theme_location' => 'header_menu' 
							)); 
					  ?>
					</nav><!--.primary-->
					<?php if ( of_get_option('g_search_box_id') == 'yes') { ?>  
					  <div id="top-search">
						<form method="get" action="<?php echo get_option('home'); ?>/">
						  <input class="input-search" type="text" name="s" value="<?php _e('Search', 'theme1692'); ?>" onBlur="if(this.value=='') this.value='<?php _e('Search', 'theme1692'); ?>'" onFocus="if(this.value =='<?php _e('Search', 'theme1692'); ?>' ) this.value=''" />
						  <input type="submit" value="<?php _e('GO', 'theme1692'); ?>" id="submit" />
						</form>
					  </div>  
					<?php } ?>
					<div class="clear"></div>
				</div>
	</header>
  <?php if( is_front_page() ) { ?>
  <section id="slider-wrapper">
     <?php include_once(TEMPLATEPATH . '/slider.php'); ?>
  </section><!--#slider-->
  <?php } ?>
	<div class="container_12">
		<div class="primary_content_wrap clearfix">
<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package BusinessPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-WDDDB5D');
	</script>
	<!-- End Google Tag Manager -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-35989739-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-35989739-2');
	</script>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/b092efee5b.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WDDDB5D" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'businesspress'); ?></a>

		<header id="masthead" class="site-header">

			<?php if (get_theme_mod('businesspress_enable_top_bar')) : ?>
				<div class="top-bar">
					<div class="top-bar-content">
						<?php businesspress_top_bar_main(); ?>
						<?php businesspress_header_social_link(); ?>
					</div><!-- .top-bar-content -->
				</div><!-- .top-bar -->
			<?php endif; ?>

			<div class="main-header main-header-original">
				<div class="main-header-content">
					<div class="site-branding">
						<?php businesspress_logo(); ?>
						<?php businesspress_title(); ?>
					</div><!-- .site-branding -->
					<?php businesspress_main_navigation(); ?>

					<div class="main-header-tel">
						<div class="open-time font-min">11:00~15:00／17:30~21:00　月曜定休日<br>※月曜が祝日の場合、翌日火曜が定休日</div>
						<div class="tel-no"><a href="tel:0824237556"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/tel_icon.svg"> 082-423-7556</a></div>
					</div>
					<button class="drawer-hamburger">
						<span class="screen-reader-text"><?php esc_html_e('Menu', 'businesspress'); ?></span>
						<span class="drawer-hamburger-icon"></span>
					</button>
				</div><!-- .main-header-content -->
				<div class="drawer-overlay"></div>
				<div class="drawer-navigation">
					<div class="drawer-navigation-content">
						<div class="drawer-navigation-logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_yoko_w.svg"></a></div>
						<?php businesspress_main_navigation(); ?>
						<?php if (get_theme_mod('businesspress_enable_top_bar')) : ?>
							<?php businesspress_header_social_link(); ?>
						<?php endif; ?>
					</div><!-- .drawer-navigation-content -->
				</div><!-- .drawer-navigation -->
			</div><!-- .main-header -->

			<div class="header-content-area">
				<div class="hca-nav"><?php businesspress_main_navigation(); ?></div>

				<?php if (is_front_page() && get_theme_mod('businesspress_enable_home_header')) : ?>
					<?php get_template_part('template-parts/content', 'home-header'); ?>
				<?php elseif (is_page() && !get_post_meta(get_the_ID(), 'businesspress_hide_page_title', true)) : ?>
					<div class="jumbotron" <?php businesspress_post_background(); ?>>
						<div class="jumbotron-overlay">
							<div class="jumbotron-content">
								<h2 class="jumbotron-title"><?php the_title(); ?></h2>
							</div><!-- .jumbotron-content -->
						</div><!-- .jumbotron-overlay -->
					</div><!-- .jumbotron -->
				<?php endif; ?>

				<?php if (is_home() && !is_paged() && get_theme_mod('businesspress_enable_featured_slider')) : ?>
					<div class="featured-post">
						<?php
						$featured = new WP_Query(array(
							'cat'                 => get_theme_mod('businesspress_featured_category'),
							'posts_per_page'      => get_theme_mod('businesspress_featured_slider_number', '4'),
							'no_found_rows'       => true,
							'ignore_sticky_posts' => true
						));
						if ($featured->have_posts()) :
							while ($featured->have_posts()) : $featured->the_post();
								get_template_part('template-parts/content', 'featured');
							endwhile;
						endif;
						wp_reset_postdata(); ?>
					</div><!-- .featured-post -->
				<?php elseif (is_home() && !is_paged() && !is_front_page() && !get_post_meta(get_option('page_for_posts'), 'businesspress_hide_page_title', true)) : ?>
					<div class="jumbotron" <?php businesspress_post_background(get_post_thumbnail_id(get_option('page_for_posts'))); ?>>
						<div class="jumbotron-overlay">
							<div class="jumbotron-content">
								<h1 class="jumbotron-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
							</div><!-- .jumbotron-content -->
						</div><!-- .jumbotron-overlay -->
					</div><!-- .jumbotron -->
				<?php elseif (is_archive() || is_single()) : ?>
					<div class="jumbotron" <?php businesspress_post_background(get_post_thumbnail_id(get_option('page_for_posts'))); ?>>
						<div class="jumbotron-overlay">
							<div class="jumbotron-content">
								<h1 class="jumbotron-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
							</div><!-- .jumbotron-content -->
						</div><!-- .jumbotron-overlay -->
					</div><!-- .jumbotron -->
				<?php endif; ?>

			</div><!-- .header-content-area -->

		</header><!-- #masthead -->

		<div id="content" class="site-content">
<?php
/**
 * The template used for displaying home header.
 *
 * @package BusinessPress
 */
?>

<div class="home-header">
	<div class="home-header-overlay">

<div class="mv-slider">
	<div class="slide-inner">
		<div class="home-header-overlay"></div>
		<img src="https://hyserver3.xsrv.jp/jiromaru/wp-content/uploads/2022/04/home_mv.jpg">
	</div>
	<div class="slide-inner">
		<div class="home-header-overlay"></div>
		<img src="https://hyserver3.xsrv.jp/jiromaru/wp-content/uploads/2022/04/home_mv2.jpg">
	</div>
	<div class="slide-inner">
		<div class="home-header-overlay"></div>
		<img src="https://hyserver3.xsrv.jp/jiromaru/wp-content/uploads/2022/04/home_mv3.jpg">
	</div>
</div>

		<div class="home-header-content">
			<?php if ( get_theme_mod( 'businesspress_home_header_mainheader' ) ) : ?>
			<h2 class="home-header-title font-min fw600"><?php echo wp_kses( get_theme_mod( 'businesspress_home_header_mainheader' ) , array( 'br' => array() ) ) ; ?></h2>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'businesspress_home_header_text' ) ) : ?>
			<div class="home-header-text"><?php echo wp_kses_post( get_theme_mod( 'businesspress_home_header_text' ) ) ; ?></div>
			<?php endif; ?>
			<?php if ( get_theme_mod( 'businesspress_home_header_button_text' ) || get_theme_mod( 'businesspress_home_header_subbutton_text' ) ) : ?>
			<div class="home-header-button">
				<?php if ( get_theme_mod( 'businesspress_home_header_button_text' ) ) : ?>
				<a href="<?php echo esc_url( get_theme_mod( 'businesspress_home_header_button_url' ) ) ; ?>" class="home-header-button-main">
					<?php echo esc_html( get_theme_mod( 'businesspress_home_header_button_text' ) ) ; ?></a>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'businesspress_home_header_subbutton_text' ) ) : ?>
				<a href="<?php echo esc_url( get_theme_mod( 'businesspress_home_header_subbutton_url' ) ) ; ?>" class="home-header-button-sub">
					<?php echo esc_html( get_theme_mod( 'businesspress_home_header_subbutton_text' ) ) ; ?></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div><!-- .home-header-content -->
	</div><!-- .home-header-overlay -->
</div><!-- .home-header -->
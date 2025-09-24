<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package BusinessPress
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<?php get_sidebar( 'footer' ); ?>

		<?php if ( has_nav_menu( 'footer' ) || has_nav_menu( 'footer-social' ) || ! get_theme_mod( 'businesspress_hide_footer_text' ) || ! get_theme_mod( 'businesspress_hide_credit' ) ) : ?>
		<div class="site-bottom">
			<div class="site-bottom-content">

				<?php if ( has_nav_menu( 'footer' ) || has_nav_menu( 'footer-social' ) ) : ?>
				<div class="footer-menu">
					<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav class="footer-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer' , 'depth' => 1 ) ); ?>
					</nav><!-- .footer-navigation -->
					<?php endif; ?>
					<?php if ( has_nav_menu( 'footer-social' ) ) : ?>
					<nav class="footer-social-link social-link-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-social', 'depth' => 1, 'link_before'  => '<span class="screen-reader-text">', 'link_after'  => '</span>' ) ); ?>
					</nav><!-- .footer-social-link -->
					<?php endif; ?>
				</div><!-- .footer-menu -->
				<?php endif; ?>

<div class="container-wrapper footer-cw">
	<div class="container-content">
		<div class="footer-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_yoko.svg"><a href="https://www.instagram.com/wasaitei_jiroumaru/"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
		<div class="f-address">
			東広島市西条町下見1076-1<br>
			TEL/082-423-7556<br>
			月曜定休日<br>
            ※月曜が祝日の場合、翌日火曜が定休日<br>
			営業時間<br>
			　昼 11:00-15:00（ラストオーダー／14:00）<br>
			　夜 17:30-21:00（ラストオーダー／20:00）<br>
            団体ご利用可全旅クーポン取り扱い店
		</div>
	</div>
</div>

				<?php businesspress_footer(); ?>

			</div><!-- .site-bottom-content -->
		</div><!-- .site-bottom -->
		<?php endif; ?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="back-to-top"></div>

<!-- <div class="bnr-reserve"><a href="<?php echo home_url(); ?>/reserve/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bnr_reserve_pc.svg"></a></div>
<div class="bnr-reserve-sp"><a href="<?php echo home_url(); ?>/reserve/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bnr_reserve_sp.svg"></a></div> -->
<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/plugins/ml-slider/assets/sliders/flexslider/jquery.flexslider.min.js?ver=3.27.3" id="metaslider-flex-slider-js"></script>
<script type="text/javascript" id="metaslider-flex-slider-js-after">
var metaslider_66 = function($) {$('#metaslider_66').addClass('flexslider');
            $('#metaslider_66').flexslider({ 
                slideshowSpeed:5000,
                animation:'slide',
                controlNav:false,
                directionNav:true,
                pauseOnHover:true,
                direction:'horizontal',
                reverse:false,
                animationSpeed:1300,
                prevText:"前へ",
                nextText:"Next",
                fadeFirstSlide:false,
                easing:"linear",
                slideshow:true,
                itemWidth:400,
                minItems:1,
                itemMargin:20,
                move: 1,
            });
            $(document).trigger('metaslider/initialized', '#metaslider_66');
        };
        var timer_metaslider_66 = function() {
            var slider = !window.jQuery ? window.setTimeout(timer_metaslider_66, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_66, 1) : metaslider_66(window.jQuery);
        };
        timer_metaslider_66();
</script>
<script type="text/javascript" id="metaslider-flex-slider-js-after">
var metaslider_123 = function($) {$('#metaslider_123').addClass('flexslider');
            $('#metaslider_123').flexslider({ 
                slideshowSpeed:5000,
                animation:'slide',
                controlNav:false,
                directionNav:true,
                pauseOnHover:false,
                direction:'horizontal',
                reverse:false,
                animationSpeed:1300,
                prevText:"前へ",
                nextText:"Next",
                fadeFirstSlide:false,
                easing:"linear",
                slideshow:true,
                itemWidth:400,
                minItems:1,
                itemMargin:20,
                move:1,
            });
            $(document).trigger('metaslider/initialized', '#metaslider_123');
        };
        var timer_metaslider_123 = function() {
            var slider = !window.jQuery ? window.setTimeout(timer_metaslider_123, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_123, 1) : metaslider_123(window.jQuery);
        };
        timer_metaslider_123();
</script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/plugins/ml-slider/themes/cubic/v1.0.0/script.js?ver=1.0.0" id="metaslider_cubic_theme_script-js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/jiromaru/wp-content/plugins/ml-slider/assets/easing/jQuery.easing.min.js?ver=3.27.3" id="metaslider-easing-js"></script>

</body>
</html>

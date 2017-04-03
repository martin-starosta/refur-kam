<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package refur
 */
 $version = filemtime( get_stylesheet_directory() . '/js/kam-refur.js');

?>
			</div>
		</div>
	</div><!-- #content -->
	<?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
			<div class="footer-logo col-md-4 col-sm-12 col-xs-12">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="image-logo" rel="home">
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/Asset-8.png" alt="KAM Fórum">
				</a>
			</div><!-- .footer-logo -->
			<div class="site-info col-md-8 col-sm-12 col-xs-12">
				<?php
					$refur_custm_copyright = refur_get_option( 'footer_copyright' );
					if ( ! empty( $refur_custm_copyright ) ) {
						echo esc_textarea( $refur_custm_copyright );
						echo " | <a href='https://mayorsoft.eu' target='_blank'>LabZone s.r.o.</a>";
						echo " | <a href='" . get_site_url() . "/vseobecne-podmienky-pouzivania'>Všeobecné podmienky používania</a>";
					} else {
				?>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'refur' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'refur' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'refur' ), 'refur', '<a href="http://www.tefox.net/" rel="designer">teFox</a>' ); ?>
				<?php } ?>
			</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->

	<div class="cookie-notice bg-grey">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center small text-white">
					Tento web používa súbory cookies. Prehliadaním webu vyjadrujete súhlas s ich používaním. <a class="text-white" href="<?= get_site_url( ); ?>/subory-cookies/">Viac informácií</a>.
				</div>
			</div>
		</div>
	</div><!-- .cookie-notice -->

</div><!-- #page -->

<?php wp_footer(); ?>
<!--CDN link for  TweenMax-->
<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
<script src="<?= bloginfo( 'stylesheet_directory' ); ?>/js/kam-refur.js?<?= "?ver=$version" ?>" defer ?>//--- Custom JS Scripts for KAM Forum --></script>

</body>
</html>

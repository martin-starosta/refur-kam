<?php
/**
 * Template Name: Landing page
 *
 * @package refur
 */

 $version = filemtime( get_stylesheet_directory() . '/css/kam-forum.css' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet"
				href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
				integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
				crossorigin="anonymous">

	<?php wp_head(); ?>
	<link rel="stylesheet"
				href="<?= bloginfo( 'stylesheet_directory' ); ?>/css/kam-forum.css<?= "?ver=$version" ?>" />
	<link href="https://fonts.googleapis.com/css?family=Raleway&amp;subset=latin-ext" rel="stylesheet">      
</head>

<body <?php body_class(); ?>>

<?php do_action('refur_page_before'); ?>
<div id="page" class="hfeed site flex-site">
	<a class="skip-link screen-reader-text"
		 href="#content"><?php esc_html_e('Skip to content', 'refur'); ?></a>
	<div class="page-header-wrap">
		<header id="masthead" class="site-header" role="banner">
			<div class="header-meta">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12 pull-right">
							<?php refur_follow_list(); ?>
							<?php do_action('refur_header_meta'); ?>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="site-description">
								<?php bloginfo('description'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="site-branding">
							<?php refur_logo(); ?>
						</div><!-- .site-branding -->
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="primary-menu"
											aria-expanded="false">
								<?php esc_html_e('Primary Menu', 'refur'); ?>
							</button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_id' => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
					</div>
				</div>
			</div>
		</header><!-- #masthead -->
		<?php do_action('refur_header_showcase'); ?>
	</div>

	<section>
		<div class="afterlead-banner">
			<div class="container">
				<div class="row">
					<div id="banner-title" class="col-md-8">
						<p>
							<span class="banner-title">Aktuálne: Vyhraj <strong>10 tabletov</strong></span><br/>
							<span class="banner-subtitle">Hlasuj pre svoj obľúbený obchod v <strong>Mastercard Obchodník roka 2016</strong></span>
						</p>
						<p>
							<a class="header-showcase_btn" href="https://www.obchodnik-roka.sk" target="_blank">Hlasuj za svojho obchodníka</a>
						</p>
					</div>
					<div id="banner-logo" class="col-md-4 center-flex">
						<img src="<?php echo site_url(); ?>/wp-content/uploads/logo_orsk_neg_433x113.png" alt="Logo Obchodník roka 2016" />
					</div>
				</div>
			</div>
		</div>
	</section>

	<div id="content" class="site-content flex-site-content">
		<div class="container">
			<div class="row">
				<div id="primary" class="content-area col-xs-12">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'page' ); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; // End of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->
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
						echo " | <a href='https://mayorsoft.eu' target='_blank'>Mayorsoft.eu</a>";
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
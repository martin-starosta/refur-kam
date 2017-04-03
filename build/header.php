<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
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

	<div id="content" class="site-content flex-site-content">
		<div class="container">
			<div class="row">
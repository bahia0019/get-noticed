<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package getnoticed
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#622615">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
	<script>
		var controller = new ScrollMagic.Controller();
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'getnoticed' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="inner-header">
			<div class="site-branding">
				<a href="<?php echo home_url( '/' ); ?>" title="Web design, Hosting and SEO for Professional Photographers" >
					<?php require('images/flauntsiteslogo.svg'); ?>
				</a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><div class="hamburger"><?php require( 'images/menu-hamburger.svg' ); ?></div><?php esc_html_e( 'Menu', 'flauntsites2017' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
		</div>
		
		<div class="stripes-container">
			<hr class="stripes" id="a">
			<hr class="stripes" id="b">
			<hr class="stripes" id="c">		
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">

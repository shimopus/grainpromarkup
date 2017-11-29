<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Grain_Pro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<?php wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&amp;subset=cyrillic', false ); ?>
	
	<?php wp_head(); ?>
</head>

<body class="gn-page">
	<header class="gn-page-header">
		<div class="gn-header gn-page-row">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="gn-header__logo" rel="home"></a>		

			<nav class="gn-header__nav">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main',
						'container'      => '',
						'fallback_cb'    => false,
						'items_wrap'     => '%3$s',
						'walker'         => new MainMenuItemsWalker()
					) );
				?>
			</nav><!-- #site-navigation -->
			
			<div class="gn-header__contacts">
				<a href="skype:+79165491989?call" class="gn-header__contacts-phone">+7 (916) 549-19-89</a>
				<div class="gn-header__contacts-time">с 5:00 до 19:00 по МСК</div>
				<a href="mailto:p@grain.pro" class="gn-header__link">p@grain.pro</a>
			</div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

    <main class="gn-page-content">

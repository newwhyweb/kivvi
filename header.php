<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kivvi
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo wp_get_document_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>

</head>

<?php

	$siteLogo = get_field('kivvi_logo', 'options');
	get_template_part('lib/maintenance-mode' );

	$headHeroToggle = get_field('kh_hero_slides', $pageID);
	if($headHeroToggle) {
		$siteClass .= ' has-hero ';
	}

	if(is_single() && 'committee' == get_post_type()) {
		$siteClass .= ' has-hero ';
	}
	
?>

<body <?php body_class($siteClass); ?>>

<header id="masthead" class="site-header" role="banner">
	<div class="site-branding">
		<?php if ($siteLogo): ?>
			<h1 alt="<?php echo bloginfo('name'); ?>"><a class="site-logo" href="/"><?php echo wp_get_attachment_image($siteLogo["id"], 'medium'); ?></a></h1>
		<?php else : ?>
			<h1><?php echo bloginfo("name"); ?></h1>
		<?php endif; ?>
	</div>

	<a id="mobile-toggle" class="menu-toggle" href="#"><span class="genericon genericon-menu"></span><span class="visuallyhidden">Mobile Menu Toggle</span></a>

	<nav id="site-navigation" class="main-navigation <?php if ( !has_nav_menu( 'utility' ) ) { echo 'no-utility'; } ?>" role="navigation">
		<?php if ( has_nav_menu( 'utility' ) ) { wp_nav_menu( array( 'theme_location' => 'utility' ) ); } ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav>
	
</header>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'knowhow' ); ?></a>


	<div id="content" class="site-content">

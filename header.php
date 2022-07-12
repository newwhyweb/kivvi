<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kivvi
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo wp_get_document_title(); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">


	<?php wp_head(); ?>

</head>

<?php

$siteLogo = get_field('kivvi_logo', 'options');
get_template_part('lib/maintenance-mode');

$headHeroToggle = get_field('kh_hero_slides', $pageID);
if ($headHeroToggle) {
	$siteClass .= ' has-hero ';
}

if (is_single() && 'committee' == get_post_type()) {
	$siteClass .= ' has-hero ';
}

?>

<body <?php body_class($siteClass); ?> style="">
	<script>
		let pageTransitioning = false;
	</script>

	<?php

	if (get_field('kivvi_page_transition_animation', 'options') && get_field('kivvi_page_transition_animation', 'options') != 'none') : ?>
		<div id="page-transition" class="<?php echo get_field('kivvi_page_transition_animation', 'options'); ?>">
			<div id="page-loader" class="loader entry">
				<div class="circle one"></div>
				<div class="circle two"></div>
				<div class="circle three"></div>
			</div>
		</div>
		<script>
			pageTransitioning = true;
			document.getElementById("page-transition").classList.add('active');
		</script>
	<?php endif; ?>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<section class="section" id="header-section">
					<div class="section-content">
						<?php if (get_field('kivvi_socials_show_premasthead', 'options')) {
							echo '<div class="pre-masthead">';
							echo do_shortcode('[kivvi-socials]');
							echo '</div>';
						} ?>
						<?php get_template_part('template-parts/header/masthead'); ?>

					</div>
				</section>
				<div id="page" class="hfeed site">
					<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'knowhow'); ?></a>


					<div id="content" class="site-content">
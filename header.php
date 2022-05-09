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

<body <?php body_class($siteClass); ?> style="height: auto; position: relative;">
	<style>
		#page-transition {
			content: '';
			position: absolute;
			top: 0;

			bottom: 0;
			opacity: 0;
			height: 100%;
			width: 100%;
			pointer-events: none;
			z-index: 0;
			transition: all 2.5s;
		}

		#page-transition.active {
			z-index: 9999;
			background-color: #333;
			opacity: 1;
			transition: all 1s;
		}

		#page-loader {
			margin: 100px auto;
			font-size: 25px;
			width: 1rem;
			height: 1rem;
			border-radius: 50%;
			position: absolute;
			top: calc(50vh - .5rem);
			left: calc(50% - .5rem);
			text-indent: -9999em;
			-webkit-animation: load5 1.1s infinite ease;
			animation: load5 1.1s infinite ease;
			-webkit-transform: translateZ(0);
			-ms-transform: translateZ(0);
			transform: translateZ(0);
		}

		@keyframes load5 {

			0%,
			100% {
				box-shadow: 0em -2.6em 0em 0em #ffffff, 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.5), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7);
			}

			12.5% {
				box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.7), 1.8em -1.8em 0 0em #ffffff, 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5);
			}

			25% {
				box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.5), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.7), 2.5em 0em 0 0em #ffffff, 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
			}

			37.5% {
				box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.5), 2.5em 0em 0 0em rgba(255, 255, 255, 0.7), 1.75em 1.75em 0 0em #ffffff, 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
			}

			50% {
				box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.5), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.7), 0em 2.5em 0 0em #ffffff, -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.2), -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
			}

			62.5% {
				box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.5), 0em 2.5em 0 0em rgba(255, 255, 255, 0.7), -1.8em 1.8em 0 0em #ffffff, -2.6em 0em 0 0em rgba(255, 255, 255, 0.2), -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
			}

			75% {
				box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.5), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.7), -2.6em 0em 0 0em #ffffff, -1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2);
			}

			87.5% {
				box-shadow: 0em -2.6em 0em 0em rgba(255, 255, 255, 0.2), 1.8em -1.8em 0 0em rgba(255, 255, 255, 0.2), 2.5em 0em 0 0em rgba(255, 255, 255, 0.2), 1.75em 1.75em 0 0em rgba(255, 255, 255, 0.2), 0em 2.5em 0 0em rgba(255, 255, 255, 0.2), -1.8em 1.8em 0 0em rgba(255, 255, 255, 0.5), -2.6em 0em 0 0em rgba(255, 255, 255, 0.7), -1.8em -1.8em 0 0em #ffffff;
			}
		}
	</style>
	<div id="page-transition">
		<div id="page-loader">Loading...</div>
	</div>
	<script>
		document.getElementById("page-transition").classList.add('active');
	</script>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<section class="section" id="header-section">
					<div class="section-content">
						<?php if (has_nav_menu('socials')) {
							echo '<div class="pre-masthead">';
							wp_nav_menu(array('theme_location' => 'socials'));
							echo '</div>';
						} ?>
						<header id="masthead" class="site-header" role="banner">
							<div class="site-branding">
								<?php if ($siteLogo) : ?>
									<h1 alt="<?php echo bloginfo('name'); ?>"><a class="site-logo" href="/"><?php echo wp_get_attachment_image($siteLogo["id"], 'large'); ?></a></h1>
								<?php else : ?>
									<h1><?php echo bloginfo("name"); ?></h1>
								<?php endif; ?>
							</div>

							<a id="mobile-toggle" class="menu-toggle" href="#"><span class="genericon genericon-menu"></span><span class="visuallyhidden">Mobile Menu Toggle</span></a>

							<nav id="site-navigation" class="main-navigation <?php if (!has_nav_menu('utility')) {
																					echo 'no-utility';
																				} ?>" role="navigation">
								<?php if (has_nav_menu('utility')) {
									wp_nav_menu(array('theme_location' => 'utility'));
								} ?>
								<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
							</nav>

						</header>
					</div>
				</section>
				<div id="page" class="hfeed site">
					<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'knowhow'); ?></a>


					<div id="content" class="site-content">
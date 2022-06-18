<header id="masthead" class="site-header" role="banner">
    <div class="site-branding">
        <?php if ($siteLogo) : ?>
            <h1 alt="<?php echo bloginfo('name'); ?>"><a class="site-logo" href="/"><?php echo wp_get_attachment_image($siteLogo["id"], 'large'); ?></a></h1>
        <?php else : ?>
            <h1><?php echo bloginfo("name"); ?></h1>
        <?php endif; ?>
    </div>


    <a id="mobile-toggle" class="menu-toggle" href="#"><span class="genericon genericon-menu">
            <div id="nav-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </span><span class="visuallyhidden">Mobile Menu Toggle</span>
    </a>

    <nav id="site-navigation" class="main-navigation <?php if (!has_nav_menu('utility')) {
                                                            echo 'no-utility';
                                                        } ?>" role="navigation">
        <?php if (has_nav_menu('utility')) {
            wp_nav_menu(array('theme_location' => 'utility'));
        } ?>
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </nav>

</header>
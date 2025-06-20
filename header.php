<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 * 
 * @version 5.2.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header id="masthead" class="site-header d-print-none">
            <div class="fixed-top bg-light border-bottom border-secondary border-opacity-25">
                <nav id="nav-main" class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <!-- Navbar Brand -->
                        <a class="navbar-brand xs d-md-none" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/logo/logo.png" alt="logo" class="logo xs"></a>
                        <a class="navbar-brand md d-none d-md-block" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/logo/logo.png" alt="logo" class="logo md"></a>

                        <!-- Offcanvas Navbar -->
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-navbar">
                            <div class="offcanvas-header bg-light">
                                <span class="h5 mb-0"><?php esc_html_e('Menu', 'bootscore'); ?></span>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">
                                <!-- Bootstrap 5 Nav Walker Main Menu -->
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'container' => false,
                                    'menu_class' => '',
                                    'fallback_cb' => '__return_false',
                                    'items_wrap' => '<ul id="bootscore-navbar" class="navbar-nav ms-auto %2$s">%3$s</ul>',
                                    'depth' => 2,
                                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                                )); ?>
                                <!-- Bootstrap 5 Nav Walker Main Menu End -->
                            </div>
                        </div>

                        <div class="header-actions d-flex align-items-center">

                            <!-- Top Nav Widget -->
                            <div class="top-nav-widget">
                                <?php if (is_active_sidebar('top-nav')) : ?>
                                    <div>
                                        <?php dynamic_sidebar('top-nav'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Searchform Large -->
                            <div class="d-none d-lg-block ms-1 ms-md-2 top-nav-search-lg">
                                <?php if (is_active_sidebar('top-nav-search')) : ?>

                                    <div>
                                        <?php dynamic_sidebar('top-nav-search'); ?>
                                    </div>

                                <?php endif; ?>
                            </div>

                            <!-- Search Toggler Mobile -->
                            <button class="btn btn-outline-secondary d-lg-none ms-1 ms-md-2 top-nav-search-md" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-search" aria-expanded="false" aria-controls="collapse-search">
                                <i class="fa-solid fa-magnifying-glass"></i><span class="visually-hidden-focusable">Search</span>
                            </button>

                            <!-- Mini Cart Toggler -->
                            <!-- <button class="btn btn-outline-secondary ms-1 ms-md-2 position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-cart" aria-controls="offcanvas-cart">
                                <i class="fa-solid fa-cart-shopping"></i><span class="visually-hidden-focusable">Cart</span>
                                <?php /* if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                                $count = WC()->cart->cart_contents_count; */
                                ?>
                                <span class="cart-content">
                                    <?php /* if ($count > 0) { 
                                        echo esc_html($count);
                                    }  */ ?></span>
                                <?php /* } */ ?>
                            </button> -->

                            <!-- Navbar Toggler -->
                            <button class="btn btn-outline-secondary d-lg-none ms-1 ms-md-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar">
                                <i class="fa-solid fa-bars"></i><span class="visually-hidden-focusable">Menu</span>
                            </button>

                        </div><!-- .header-actions -->
                    </div><!-- .container -->
                </nav><!-- .navbar -->

                <!-- Top Nav Search Mobile Collapse -->
                <div class="collapse container d-lg-none" id="collapse-search">
                    <?php if (is_active_sidebar('top-nav-search')) : ?>

                        <div class="mb-2">
                            <?php dynamic_sidebar('top-nav-search'); ?>
                        </div>

                    <?php endif; ?>
                </div><!-- #collapse-search -->
            </div><!-- .fixed-top .bg-light -->

            <!-- offcanvas cart -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-cart">
                <div class="offcanvas-header bg-light">
                    <span class="h5 mb-0"><?php esc_html_e('Cart', 'bootscore'); ?></span>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                    <div class="cart-list">
                        <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
                    </div>
                </div>
            </div>
        </header><!-- #masthead -->
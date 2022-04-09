<!DOCTYPE html>
<html <?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title>Document</title>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <div class="container">
            <nav class="navigation">
                <a href="<?php echo site_url("/")?>"><img src="<?php echo get_theme_file_uri("/images/logo.svg") ?>"
                        alt=""></a>
                <div class="navigation__right">
                    <a href="<?php echo site_url("/")?>"
                        class="<?php if(is_page('home')) echo 'current-menu-item' ?> nav__link">Home</a>
                    <a href="#" class="nav__link">Services</a>
                    <a href="<?php echo get_post_type_archive_link('hoom'); ?>"
                        class="<?php if(get_post_type() == "hoom") echo 'current-menu-item' ?> nav__link">Discover</a>
                    <a href="#" class="nav__link">Testimonials</a>
                    <?php if (is_user_logged_in()) { ?>
                    <a href="#" class="nav__link">Sell</a>
                    <?php } ?>
                    <?php if (!is_user_logged_in()) { ?>
                    <a href="<?php echo site_url("/signin")?>" class="btn btn--nav nav__link">Sign in</a>
                    <?php } else { ?>
                    <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="btn btn--nav nav__link">Log Out</a>
                    <?php } ?>
                </div>
            </nav>
        </div>
    </header>
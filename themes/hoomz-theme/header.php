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
                <a href="/"><img src="<?php echo get_theme_file_uri("/images/logo.svg") ?>" alt=""></a>
                <div class="navigation__right">
                    <a href="#" class="nav__link">Home</a>
                    <a href="#" class="nav__link">Services</a>
                    <a href="#" class="nav__link">Discover</a>
                    <a href="#" class="nav__link">Testimonials</a>
                    <a href="#" class="btn btn--nav nav__link">Sign in</a>
                </div>
            </nav>
        </div>
    </header>
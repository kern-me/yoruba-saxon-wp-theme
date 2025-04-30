<?php

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo get_field('meta_description')?>">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a tabindex="0" class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'yoruba-saxon'); ?></a>
    <header class="site-header">
        <a href="<?php echo site_url() ?>" class="site-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/build/images/ys-logo.svg" alt="Yoruba Saxon" />
        </a>
        <button class="hamburger" id="hamburger_btn" tabindex="0" aria-controls="main_menu_navigation" aria-label="Open Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav id="main_menu_navigation" class="main-menu-navigation" role="navigation" aria-label="Main Menu" aria-expanded="false">
            <ul class="main-menu">
                <li><a href="<?php echo site_url() ?>">Home</a></li>
                <li><a href="<?php echo site_url() ?>/about">About</a></li>
                <li><a href="<?php echo site_url() ?>/projects">Projects</a></li>
                <li><a href="<?php echo site_url() ?>/team">Team</a></li>
                <li><a href="<?php echo site_url() ?>/press">Press</a></li>
            </ul>
        </nav>
    </header>


    <div class="nav-overlay"></div>


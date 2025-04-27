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
    <header>
        <nav class="menu--right" role="navigation">
            <div class="menu-toggle">
                <label for="nav-btn" class="sr-only">Primary Navigation</label>
                <div id="active-menu-outline"></div>
                <input id="nav-btn" tabindex="0" type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul class="menu-item">
                    <li><a href="<?php echo site_url() ?>">Home</a></li>
                    <li><a href="<?php echo site_url() ?>/about">About</a></li>
                    <li><a href="<?php echo site_url() ?>/projects">Projects</a></li>
                    <li><a href="<?php echo site_url() ?>/team">Team</a></li>
                    <li><a href="<?php echo site_url() ?>/press">Press</a></li>
                </ul>
            </div>
        </nav>
        <div class="nav-overlay"></div>
    </header>


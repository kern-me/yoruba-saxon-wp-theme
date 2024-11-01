<?php

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <title>Yoruba Saxon</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'yaroba-saxon'); ?></a>
    <header>
        <nav class="menu--right" role="navigation">
            <div class="menu-toggle">
                <input id="nav-btn" type="checkbox" />
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


<?php
get_header();
echo '<main id="primary" class="site-main">';
include_once('template-parts/ys-hero.php');

include_once('components/about_large_heading_section.php');
include_once('components/about_projects_section.php');
include_once('components/about_angled_container_two_col.php');
include_once('components/about_partners.php');
echo '</main>';
get_footer();

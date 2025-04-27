<?php
get_header();
echo '<main id="primary" class="site-main">';

include_once ('template-parts/ys-hero.php');
include_once('components/press_featured_section.php');
include_once('components/press_cards.php');

echo '</main>';
get_footer();

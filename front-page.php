<?php
get_header();
echo '<main id="primary" class="site-main">';

include_once ('template-parts/ys-hero.php');
include_once ('components/home_angled_container.php');
include_once ('components/home_three_col_images_container.php');
include_once ('components/home_three_cards.php');

echo '</main>';
get_footer();


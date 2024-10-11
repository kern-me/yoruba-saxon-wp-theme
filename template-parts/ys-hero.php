<?php
$media_selection = get_field('media_selection');


if ($media_selection === 'video') {
    $video_file = get_field('video_file');
    $video_start_time = get_field('video_start_time');

    echo
        '<section class="ys-hero ys-hero-video">
            <div class="video-container">
                <video autoplay loop muted playsinline>
                    <source src="' . $video_file . '#t='. $video_start_time . '" type="video/mp4">
                </video>
            </div>';
} else if ($media_selection === 'image') {
    $hero_image = get_field('hero_image');

    if ($hero_image) {
        echo '<section class="ys-hero" style="background-image: url(' . $hero_image['url'] . ')">';
    } else {
        echo '<section class="ys-hero"> ';
    }
}

if (is_page()) {
    $hero_heading_svg = get_field('hero_heading_svg');
    echo '<img class="ys-hero-heading" src="' . esc_url($hero_heading_svg['url']) . '" alt="' . esc_attr(get_the_title()) . '" />';
    echo '<h1 class="sr-only" aria-hidden="false">' . get_the_title() . '</h1>';
}


if (is_single()) {
    echo '<h1 class="">' . get_the_title() . '</h1>';
}

echo '</section>';


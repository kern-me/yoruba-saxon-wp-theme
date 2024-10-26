<?php
$media_selection = get_field('media_selection');


if ($media_selection === 'video') {
    $video_file = get_field('video_file');
    $video_start_time = get_field('video_start_time');

    echo
        '<section class="ys-hero ys-hero-video">
            <div class="video-container">
                <video autoplay loop muted playsinline>
                    <source src="' . $video_file . '#t=' . $video_start_time . '" type="video/mp4">
                </video>
            </div>';
} else if ($media_selection === 'youtube') {
    $youtubeID = get_field('youtubeID');
    $youtube_title = get_field('youtube_title');
    echo
        '<section class="ys-hero ys-hero-video">
            <iframe width="806" height="453" src="https://www.youtube.com/embed/' . $youtubeID . '" title="' . $youtube_title . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';

} else if ($media_selection === 'image') {
    $hero_image = get_field('hero_image');

    if ($hero_image) {
        echo '<section class="ys-hero" style="background-image: url(' . $hero_image['url'] . ')">';
    } else {
        echo '<section class="ys-hero"> ';
    }
}

if (is_page('home')) {
    echo '<img class="ys-hero-heading" src="' . get_template_directory_uri() . '/assets/images/hero-heading-home.svg" alt="Yoruba Saxon" />';
}

if (is_page('press')) {
    echo '<img class="ys-hero-heading" src="' . get_template_directory_uri() . '/assets/images/hero-heading-press.svg" alt="Press" />';
}

if (is_page('projects')) {
    echo '<img class="ys-hero-heading" src="' . get_template_directory_uri() . '/assets/images/hero-heading-projects.svg" alt="Projects" />';
}

if (is_page('team')) {
    echo '<img class="ys-hero-heading" src="' . get_template_directory_uri() . '/assets/images/hero-heading-team.svg" alt="Team" />';
}

if (is_page('about')) {
    echo '<h1><span>Stories</span> <span class="text--strikethrough">Untold</span></h1>';
}

if (is_page() && !is_page('about')) {
    echo '<h1 class="sr-only" aria-hidden="false">' . get_the_title() . '</h1>';
}

if (is_single()) {
    echo '<h1 class="">' . get_the_title() . '</h1>';
}

echo '</section>';


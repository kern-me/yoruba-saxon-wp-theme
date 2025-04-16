<?php
$media_selection = get_field('media_selection');
?>

<section class="ys-hero <?php
if ($media_selection === 'video') {
    echo 'ys-hero-video ys-hero-video-custom"';
}

if ($media_selection === 'youtube') {
    echo 'ys-hero-video"';
}

if ($media_selection === 'image') {
    echo 'ys-hero-image"';

    $hero_image = get_field('hero_image');

    if ($hero_image) {
        echo '" style="background-image: url(' . $hero_image['url'] . ')"';
    }
}
?>
">
    <?php

    if (is_page('home')) {
        echo '<img class="ys-hero-heading" src="' . get_template_directory_uri() . '/build/images/hero-heading-home.svg" alt="Yoruba Saxon" />';
    }

    if (is_page('press')) {
        echo '<img class="ys-hero-heading" src="' . get_template_directory_uri() . '/build/images/hero-heading-press.svg" alt="Press" />';
    }

    if (is_page('projects')) {
        echo '<img class="ys-hero-heading" src="' . get_template_directory_uri() . '/build/images/hero-heading-projects.svg" alt="Projects" />';
    }

    if (is_page('team')) {
        echo '<img class="ys-hero-heading" src="' . get_template_directory_uri() . '/build/images/hero-heading-team.svg" alt="Team" />';
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

    if ($media_selection === 'video') {
        $video_file = get_field('video_file');
        $video_start_time = get_field('video_start_time');
        echo
        '<div class="video-container">
            <video autoplay loop muted playsinline>
                <source src="' . $video_file . '#t=' . $video_start_time . '" type="video/mp4">
            </video>
        </div>';
    }

    if ($media_selection === 'youtube') {
        $youtubeID = get_field('youtubeID');
        $youtube_title = get_field('youtube_title');
        $youtube_start = get_field('youtube_start');
        echo
            '<div class="iframe-overlay"></div>
            <iframe aria-hidden="true" tabindex="-1" width="100%" height="" src="https://www.youtube.com/embed/' . $youtubeID . '?start='.$youtube_start.'&autoplay=1&mute=1&loop=1&playlist='. $youtubeID . '"  allow="autoplay" title="' . $youtube_title . '" frameborder="0" allowfullscreen></iframe>';
    }
    ?>
</section>




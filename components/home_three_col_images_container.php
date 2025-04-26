<?php
$meet_the_team_image = get_field('meet_the_team_image');
$meet_the_team_image_2 = get_field('meet_the_team_image_2');
$meet_the_team_image_3 = get_field('meet_the_team_image_3');

$meet_the_team_link = get_field('meet_the_team_link');

if( $meet_the_team_link ):
    $link_url = $meet_the_team_link['url'];
    $link_title = $meet_the_team_link['title'];
    $link_target = $meet_the_team_link['target'] ? $meet_the_team_link['target'] : '_self';
endif;
?>

<section class="ys-section ys-section--meet-the-team ys-section--margin-top">
    <div class="meet-the-team--photo-grid_mobile">
        <a class="u-heading-link u-text-black" href="<?php echo site_url() ?>/projects"><h2 class="u-heading-lt u-skew-base--desktop">Our Team</h2></a>
        <img src="<?php echo esc_url($meet_the_team_image["url"]) ?>" alt="<?php echo $meet_the_team_image['alt'] ?>" />
        <a class="ys-btn ys-btn--yellow u-margin-top--l" href="<?php echo esc_url( $link_url ) ?>" target="<?php echo esc_attr( $link_target ) ?>'"><span><?php echo esc_html( $link_title ) ?></span></a>
    </div>

    <div class="meet-the-team--photo-grid">
        <a class="ys-btn ys-btn--white" href="<?php echo esc_url( $link_url ) ?>"><span><?php echo esc_html( $link_title ) ?></span></a>

        <img src="<?php echo esc_url($meet_the_team_image["url"]) ?>" alt="<?php echo $meet_the_team_image['alt'] ?>" />

        <?php if( $meet_the_team_image_2): ?>
            <img src="<?php echo esc_url($meet_the_team_image_2["url"]) ?>" alt="<?php echo $meet_the_team_image_2['alt'] ?>" />
        <?php endif; ?>

        <?php if( $meet_the_team_image_3): ?>
            <img src="<?php echo esc_url($meet_the_team_image_3["url"]) ?>" alt="<?php echo $meet_the_team_image_3['alt'] ?>" />
        <?php endif; ?>
    </div>
</section>
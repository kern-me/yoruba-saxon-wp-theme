<?php
$meet_the_team_image = get_field('meet_the_team_image');
$meet_the_team_link = get_field('meet_the_team_link');

if( $meet_the_team_link ):
    $link_url = $meet_the_team_link['url'];
    $link_title = $meet_the_team_link['title'];
    $link_target = $meet_the_team_link['target'] ? $meet_the_team_link['target'] : '_self';
endif;
?>
<section class="ys-section ys-section--bg ys-section--meet-the-team ys-section--margin-top" style="background-image: url('<?php echo esc_url($meet_the_team_image["url"]) ?>')">
    <div class="inner">
        <a class="ys-btn ys-btn--white" href="<?php echo esc_url( $link_url ) ?>" target="<?php echo esc_attr( $link_target ) ?>'"><span><?php echo esc_html( $link_title ) ?></span></a>
    </div>
</section>
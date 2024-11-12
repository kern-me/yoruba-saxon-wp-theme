<?php
get_header();
echo '<main id="primary" class="site-main">';

include_once ('template-parts/ys-hero.php');

$main_heading = get_field('main_heading');
$main_subheading = get_field('main_subheading');
$main_image = get_field('main_image');
$main_cta = get_field('main_cta');

$latest_work_heading = get_field('latest_work_heading');

$project_cards = get_field('project_cards');

?>
<section class="ys-section ys-section--intro ys-section--pad-top">
    <div class="ys-skewed">
        <div class="inner inner--lines">
            <div class="ys-two-col">
                <div class="ys-col ys-col--first ys-two-col--content">
                    <h2 class="heading-xl text--no-wrap"><?php echo $main_heading; ?></h2>
                    <div class="home-main-subheading">
                        <?php echo $main_subheading; ?>
                    </div>
                    <?php
                    $link = get_field('main_cta');

                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="ys-btn ys-btn--yellow u-margin-top-2 show-desktop-only--flex" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                            <span><?php echo esc_html( $link_title ); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="ys-col ys-col--last u-margin-top-2--mobile">
                    <img src="<?php echo $main_image['url']; ?>" alt="<?php echo $main_image['alt']; ?>">
                    <a class="ys-btn ys-btn--yellow u-margin-top-2 show-mobile-only--flex" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <span><?php echo esc_html( $link_title ); ?></span>
                    </a>
                </div>
            </div>

            <div class="ys-carousel-cards ys-section--pad-top">
                <h2 class="heading-xl"><?php echo $latest_work_heading ?></h2>
                <div class="ys-carousel-cards--container ys-slick pad-top--l">
                    <?php
                    if($project_cards): foreach($project_cards as $project_card):
                        $title = get_the_title($project_card->ID);
                        $studio = get_field('studio', $project_card->ID);
                        $permalink =  get_permalink($project_card->ID);
                        ?>
                        <article class="ys-carousel-card">
                            <div class="ys-carousel-card--image-container">
                                <?php echo get_the_post_thumbnail($project_card->ID); ?>
                                <div class="ys-carousel-card--entry-content">
                                    <h3 class="ys-carousel-card--heading"><?php echo $title ?></h3>
                                    <p class="ys-carousel-card--date u-skew-base--desktop"><?php echo $studio ?></p>
                                </div>
                            </div>
                            <a class="ys-btn ys-btn--yellow u-margin-top-2" href="<?php echo $permalink; ?>"><span>Read More</span></a>
                        </article>
                    <?php endforeach; endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>

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

<section class="ys-section ys-section--intro ys-no-skew ys-section--pad-top">
    <div class="inner">

        <?php $press_heading = get_field('press_heading'); ?>
        <h2 class="heading-xl heading-offset"><?php echo $press_heading ?></h2>
        <svg class="carousel-clip-path" width="1364" height="802" viewBox="0 0 1364 802" fill="none" xmlns="http://www.w3.org/2000/svg">
            <clipPath id="carousel_clip_path">
                <path d="M73 1L1 298L4 801.5L1265 790.5L1261.5 403L1362.5 1H73Z" fill="#D9D9D9" fill-opacity="0.6" stroke="black"/>
            </clipPath>
        </svg>
        <div class="ys-carousel-cards--container-grid ys-slick pad-top--l">
            <?php
            $press_cards = get_field('press_cards');

            if($press_cards): foreach($press_cards as $press_card):
                $publication_name = get_field('publication', $press_card->ID);
                $press_link = get_field('press_link', $press_card->ID);
                ?>
                <article class="ys-carousel-card">
                    <div>
                        <div class="ys-carousel-card--image-container">
                            <?php echo get_the_post_thumbnail($press_card->ID, ''); ?>
                        </div>
                        <div class="ys-carousel-card--entry-content">
                            <h3 class="ys-carousel-card--heading"><?php echo $publication_name ?></h3>
                            <p class="ys-carousel-card--date"><?php $post_date = get_the_date( 'F j, Y' ); echo $post_date; ?></p>
                        </div>
                        <div class="ys-carousel-card--description u-margin-top-2"><?php echo apply_filters('the_content', $press_card->post_content); ?></div>
                    </div>

                    <a class="ys-btn ys-btn--yellow u-margin-top-2--mobile" href="<?php echo esc_url($press_link); ?>" target="_blank"><span>Read More</span></a>
                </article>
            <?php endforeach; endif; ?>
        </div>
</section>

<?php
echo '</main>';
get_footer();


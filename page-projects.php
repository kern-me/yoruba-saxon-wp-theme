<?php
get_header();
echo '<main id="primary" class="site-main">';

include_once ('template-parts/ys-hero.php');
?>
<section class="ys-section ys-section--projects">
    <div class="inner">
        <div class="ys-projects-grid u-margin-top--xl">
            <?php
            $projects_all = get_field('all_projects');

            if($projects_all): foreach($projects_all as $project_card):
                $title = get_the_title($project_card->ID);
                $studio = get_field('studio', $project_card->ID);
                $permalink =  get_permalink($project_card->ID);
                ?>
                <a title="Learn more about <?php echo $title ?>" href="<?php echo $permalink ?>" class="ys-project">
                    <div class="ys-project-image-container">
                        <?php echo get_the_post_thumbnail($project_card->ID); ?>
                    </div>
                    <div class="ys-project-text-container">
                        <h3><?php echo $title ?></h3>
                        <p><?php echo $studio ?></p>
                    </div>
                </a>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>


<?php
echo '</main>';
get_footer();
?>

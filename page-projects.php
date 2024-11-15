<?php
get_header();
include_once ('template-parts/ys-hero.php');
?>
<section class="ys-section ys-section--projects u-pad-bottom-0">
    <div class="inner">
        <h2 aria-hidden="true" class="heading-branded">Coming&nbsp;&nbsp;<span></span>&nbsp;&nbsp;Soon</h2>
        <h2 aria-hidden="false" class="sr-only" >Coming Soon</h2>

        <div class="ys-projects-grid ys-projects-grid--coming-soon u-margin-top--xxl">
            <?php
            $projects_coming_soon = get_field('projects_coming_soon');

            if($projects_coming_soon): foreach($projects_coming_soon as $project_card):
                $img = get_field('description_image', $project_card->ID);
                $title = get_the_title($project_card->ID);
                $studio = get_field('studio', $project_card->ID);
                $permalink =  get_permalink($project_card->ID);
            ?>
            <a href="<?php echo $permalink ?>" class="ys-project">
                <div class="ys-project-image-container">
                    <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
                </div>
                <div class="ys-project-text-container">
                    <h3><?php echo $title ?></h3>
                    <p><?php echo $studio ?></p>
                </div>
            </a>
            <?php endforeach; endif; ?>
        </div>

        <h2 aria-hidden="true" class="heading-branded u-margin-top--xxl">All&nbsp;&nbsp;<span></span>&nbsp;&nbsp;Projects</h2>
        <h2 aria-hidden="false" class="sr-only">All Projects</h2>

        <div class="ys-projects-grid u-margin-top--xxl">
            <?php
            $projects_all = get_field('all_projects');

            if($projects_all): foreach($projects_all as $project_card):
                $img = get_field('description_image', $project_card->ID);
                $title = get_the_title($project_card->ID);
                $studio = get_field('studio', $project_card->ID);
                $permalink =  get_permalink($project_card->ID);
                ?>
                <a href="<?php echo $permalink ?>" class="ys-project">
                    <div class="ys-project-image-container">
                        <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
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


<?php get_footer(); ?>

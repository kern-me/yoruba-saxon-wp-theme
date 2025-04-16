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
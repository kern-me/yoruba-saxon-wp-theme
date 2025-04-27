<?php $projects = get_field('featured_projects'); ?>
<section id="projects" class="ys-section u-margin-top--xxl block--masonry-grid">
    <div class="inner">
        <h2 class="heading-xl u-text-center--mobile">Projects</h2>
        <div class="grid u-pad-top--l">
            <?php if ($projects):
                foreach ($projects as $project):
                    $pr_id = $project->ID;
                    $project_title = get_the_title($pr_id);
                    $studio = get_field('studio', $pr_id);
                    $project_link = get_permalink($pr_id);
                    ?>
                    <a title="Learn more about <?php echo $project_title ?>" href="<?php echo esc_url($project_link); ?>">
                        <div>
                            <p class="project-title"><?php echo $project_title ?></p>
                            <p class="project-studio"><?php echo $studio ?></p>
                        </div>
                        <?php echo get_the_post_thumbnail($project->ID); ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <a href="<?php echo site_url() ?>/projects" class="ys-btn ys-btn--yellow u-content-centered--mobile u-margin-top-2"><span>All Projects</span></a>
    </div>
</section>
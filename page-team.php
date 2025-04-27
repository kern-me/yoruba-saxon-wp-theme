<?php
get_header();
echo '<main id="primary" class="site-main">';
include_once ('template-parts/ys-hero.php');
?>

<section class="ys-section team-container">
    <div class="inner block--two-col">
        <?php
        $team_members = get_field('team_members');

        if (have_rows('team_members')):
            while ( have_rows('team_members')): the_row();
                $team_member_name =     get_sub_field('team_member_name');
                $team_member_role =     get_sub_field('team_member_role');
                $team_member_bio =      get_sub_field('team_member_bio');
                $team_member_photo =    get_sub_field('team_member_photo');
        ?>
        <div class="two-col--row">
            <div class="col--text">
                <h2><?php echo $team_member_name ?></h2>
                <h3><?php echo $team_member_role ?></h3>
                <div class="team-member-bio"><p><?php echo $team_member_bio ?></p></div>
            </div>
            <div class="col--img">
                <?php if ($team_member_photo): ?>
                <img src="<?php echo $team_member_photo['url'] ?>" alt="<?php echo $team_member_photo['alt'] ?>" />
                <?php else: ?>
                <svg width="579" height="579" viewBox="0 0 579 579" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M579 289.5C579 449.386 449.386 579 289.5 579C129.614 579 0 449.386 0 289.5C0 129.614 129.614 0 289.5 0C449.386 0 579 129.614 579 289.5Z" fill="#D9D9D9"/>
                    <path d="M396.626 225.216C396.626 284.982 349.192 333.432 290.679 333.432C232.166 333.432 184.732 284.982 184.732 225.216C184.732 165.45 232.166 117 290.679 117C349.192 117 396.626 165.45 396.626 225.216Z" fill="#8B8888"/>
                    <path d="M90 497.81C129.665 426.962 204.374 379.216 290 379.216C375.626 379.216 450.335 426.962 490 497.81C437.818 548.143 367.437 579 290 579C212.563 579 142.182 548.143 90 497.81Z" fill="#8B8888"/>
                </svg>
                <?php endif ?>
            </div>
        </div>
        <?php endwhile; endif; ?>

    </div>
</section>


<?php
echo '</main>';
get_footer();
?>

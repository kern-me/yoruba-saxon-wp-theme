<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

            include_once ('template-parts/ys-hero.php');

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( '', 'yoruba-saxon' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( '', 'yoruba-saxon' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
		endwhile;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

<div class="site-branding">
    <?php
    the_custom_logo();
    if (is_front_page() && is_home()) :
        ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
    <?php
    else :
        ?>
        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
    <?php
    endif;
    $yoruba_saxon_description = get_bloginfo('description', 'display');
    if ($yoruba_saxon_description || is_customize_preview()) :
        ?>
        <p class="site-description"><?php echo $yoruba_saxon_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
            ?></p>
    <?php endif; ?>
</div><!-- .site-branding -->


<!-- template-parts/content.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        
        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                yoruba_saxon_posted_on();
                yoruba_saxon_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->
    
    <?php yoruba_saxon_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'yoruba-saxon'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );
        
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'yoruba-saxon'),
                'after' => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php yoruba_saxon_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->


<!-- content-page.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->
    
    <?php yoruba_saxon_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        the_content();
        
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'yoruba-saxon'),
                'after' => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->
    
    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'yoruba-saxon'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->


<?php
if (is_home() && !is_front_page()) :
    ?>
    <header>
        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    </header>
<?php
endif;
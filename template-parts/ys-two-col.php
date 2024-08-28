<?php
$main_heading = get_field('main_heading');
$main_subheading = get_field('main_subheading');
$main_image = get_field('main_image');
$main_cta = get_field('main_cta');

?>
<section class="ys-section">
    <div class="inner">
        <div class="ys-two-col">
            <div class="ys-col ys-col--first ys-two-col--content">
                <h1><?php echo $main_heading; ?></h1>
                
                <?php echo $main_subheading; ?>
                
                <?php
                $link = get_field('main_cta');
                
                if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="ys-btn ys-btn--yellow" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
	            <?php endif; ?>
            </div>
            <div class="ys-col ys-col--last ys-full-bg" style="background-image:url('<?php echo $main_image ?>')"></div>
        </div>
        <div class="ys-carousel">
            <div class="ys-slick">
                <div>First</div>
                <div>Second</div>
                <div>Third</div>
            </div>
        </div>
    </div>
</section>

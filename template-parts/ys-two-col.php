<?php
$main_heading = get_field('main_heading');
$main_subheading = get_field('main_subheading');
$main_image = get_field('main_image');
$main_cta = get_field('main_cta');

?>
<section class="ys-section ys-skewed">
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
            <div class="ys-col ys-col--last">
                <img class="" src="<?php echo $main_image ?>')" alt="">
            </div>
        </div>
        <div class="ys-carousel">
            <div class="ys-slick">
                <?php
                $latest_work_card = get_field('latest_work_card');
                $card_heading = $latest_work_card['card_heading'];
                $card_description = $latest_work_card['card_description'];
                $card_image = $latest_work_card['card_image'];
                $card_link = $latest_work_card['card_link'];

                if ( $latest_work_card ) :

                foreach( $latest_work_card as $card ): ?>
                <div>
                    <img src="<?php echo $card_image['url']; ?>" alt="<?php echo $card_image['alt']; ?>" />
                    <h3><?php echo $card_heading ?></h3>
                    <p><?php echo $card_description ?></p>
                    <a href="<?php echo $card_link['url'] ?>" class="ys-btn ys-btn--yellow" target="<?php echo $card_link['target'] ?>"><?php echo $card_link['title'] ?></a>
                </div>
            <?php endforeach; ?>
            </div>
            <?php endif; ?>
            </div>
        </div>
</section>

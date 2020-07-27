<?php get_header(); ?>
    <div class="container">
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php $args = array('post_type' => 'tiendas',);?>
                    <?php $query = new WP_Query($args); ?>
                    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                        <li class="splide__slide" onclick="run(this);">
                            <div class="splide__slide__container">
                                <img src="<?php the_field('image'); ?>">
                            </div>
                            <div class="middle">
                                <div class="text"><?php the_field('name'); ?></div>
                            </div>
                        </li>

                    <?php endwhile; else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
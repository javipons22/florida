<?php
/*
Template Name: COMERCIANTES
 */
get_header();
?>
<div class="container my-5">
    <div class="enlaces">
    <?php 
        $args_content = array(
            'posts_per_page'	=> -1,
            'post_type' => 'enlaces'
            );
        $query_99 = new WP_Query($args_content);
        if ( $query_99->have_posts() ) : while ( $query_99->have_posts() ) : $query_99->the_post(); ?>

            <a target="_blank" class="d-block my-3" href="<?php echo get_field("enlace");?>"><?php echo strtoupper(get_field("nombre"));?></a>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</div>
<?php
get_footer();
?>
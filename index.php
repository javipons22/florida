<?php get_header(); ?>
<section class="tiendas">
    <div class="container">
        <div class="tiendas__header-container d-lg-flex align-items-center">
            <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                <h1 class="tiendas__titulo">MARCAS</h1>
                <button name="category_select_button" class="category-select-button">categorías <img class="tiendas__icono" src="<?php echo get_template_directory_uri(); ?>/img/arrowdown.svg" alt="flecha select"></button>
            </div>
            <form id="tienda-category-form" method="POST">
            <?php if( isset($_POST['category_1']) && $_POST['category_1'] != 'all'):?>
                <button name="category_1" class="button" value="all" type="submit">Todo</button>
            <?php else:?>
                <button name="category_1" class="button button--selected" value="all" type="submit">Todo</button>
            <?php endif;?>
            <?php 
            $args_categories_1 = array('numberposts'	=> -1,'post_type' => 'categorias_tiendas');
            $query_categories_1 = new WP_Query($args_categories_1);
                        
                        if ( $query_categories_1->have_posts() ) : while ( $query_categories_1->have_posts() ) : $query_categories_1->the_post(); ?>
                        <?php $id = get_the_ID(); ?>
                        <?php if( isset($_POST['category_1']) && $_POST['category_1'] == $id):?>
                            <button name="category_1" class="button button--selected" value="<?php echo $id;?>" type="submit"><?php the_field('name');?></button>
                        <?php else: ?>
                            <button name="category_1" class="button" value="<?php echo $id;?>" type="submit"><?php the_field('name');?></button>
                        <?php endif;?>
                        
                        

                        <?php endwhile; else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <?php endif; ?>
            </form>
        </div>
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php $args_slide_1 = array(
                        'numberposts'	=> -1,
                        'post_type' => 'tiendas'
                        );
                    if( isset($_POST['category_1']) && $_POST['category_1'] != 'all')
                    {
                        $args_slide_1['meta_key'] = 'category';
                        $args_slide_1['meta_value'] = $_POST['category_1'];
                    }
                    $query_slide_1 = new WP_Query($args_slide_1);
                    
                    if ( $query_slide_1->have_posts() ) : while ( $query_slide_1->have_posts() ) : $query_slide_1->the_post(); ?>

                        <li class="splide__slide" onclick="run(this);">
                            <div class="splide__slide__container">
                                <img src="<?php the_field('image'); ?>" alt="<?php the_field('name');?> logo">
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
</section>
    <script type="text/javascript"> 
        const initialHeight = '<?php echo $_POST['scroll']?>'
    </script>
<?php get_footer(); ?>
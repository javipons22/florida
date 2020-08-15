<?php get_header(); ?>
<main>
    <section class="banner">
        <div id="banner-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img src="https://loremflickr.com/1920/1080?random=1" />
                    </li>
                    <li class="splide__slide">
                        <img src="https://loremflickr.com/1920/1080?random=2" />
                    </li>
                    <li class="splide__slide">
                        <img src="https://loremflickr.com/1920/1080?random=3" />>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="tiendas" >
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo" id="marcas">MARCAS</h1>
                    <button name="category_select_button" class="category-select-button">categorías <img class="tiendas__icono" src="<?php echo get_template_directory_uri(); ?>/img/arrowdown.svg" alt="flecha select"></button>
                </div>
                <form id="tienda-category-form" method="POST">
                <?php if( isset($_POST['category_1']) && $_POST['category_1'] != 'all'):?>
                    <button name="category_1" class="button" value="all" type="submit">Todo</button>
                <?php else:?>
                    <button name="category_1" class="button button--selected" value="all" type="submit">Todo</button>
                <?php endif;?>
                <?php 
                $args_categories_1 = array('numberposts'	=> -1,'post_type' => 'categorias_marcas');
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
                            <?php endif; wp_reset_postdata(); ?>
                </form>
            </div>
            <div id="marcas-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php $args_slide_1 = array(
                            'numberposts'	=> -1,
                            'post_type' => 'marcas'
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
                                    <img src="<?php the_field('image'); ?>" alt="<?php echo get_the_title();?> logo">
                                </div>
                                <div class="middle">
                                    <div class="text">Ver más!<br> <?php echo get_the_title();?></div>
                                </div>
                            </li>

                        <?php endwhile; else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <?php endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="tiendas">
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo" id="comidas">PLAZOLETA DE COMIDAS</h1>
                    <button name="category_select_button" class="category-select-button">categorías <img class="tiendas__icono" src="<?php echo get_template_directory_uri(); ?>/img/arrowdown.svg" alt="flecha select"></button>
                </div>
                <form id="tienda-category-form-2" method="POST">
                <?php if( isset($_POST['category_2']) && $_POST['category_2'] != 'all'):?>
                    <button name="category_2" class="button" value="all" type="submit">Todo</button>
                <?php else:?>
                    <button name="category_2" class="button button--selected" value="all" type="submit">Todo</button>
                <?php endif;?>
                <?php 
                $args_categories_2 = array('numberposts'	=> -1,'post_type' => 'categorias_comidas');
                $query_categories_2 = new WP_Query($args_categories_2);
                            
                            if ( $query_categories_2->have_posts() ) : while ( $query_categories_2->have_posts() ) : $query_categories_2->the_post(); ?>
                            <?php $id = get_the_ID(); ?>
                            <?php if( isset($_POST['category_2']) && $_POST['category_2'] == $id):?>
                                <button name="category_2" class="button button--selected" value="<?php echo $id;?>" type="submit"><?php the_field('name');?></button>
                            <?php else: ?>
                                <button name="category_2" class="button" value="<?php echo $id;?>" type="submit"><?php the_field('name');?></button>
                            <?php endif;?>
                            
                            

                            <?php endwhile; else : ?>
                            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; wp_reset_postdata(); ?>
                </form>
            </div>
            <div id="comidas-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php $args_slide_2 = array(
                            'numberposts'	=> -1,
                            'post_type' => 'comidas'
                            );
                        if( isset($_POST['category_2']) && $_POST['category_2'] != 'all')
                        {
                            $args_slide_2['meta_key'] = 'category';
                            $args_slide_2['meta_value'] = $_POST['category_2'];
                        }
                        $query_slide_2 = new WP_Query($args_slide_2);
                        
                        if ( $query_slide_2->have_posts() ) : while ( $query_slide_2->have_posts() ) : $query_slide_2->the_post(); ?>

                            <li class="splide__slide" onclick="run(this);">
                                <div class="splide__slide__container">
                                    <img src="<?php the_field('image'); ?>" alt="<?php echo get_the_title();?> logo">
                                </div>
                                <div class="middle">
                                    <div class="text">Ver más!<br> <?php echo get_the_title();?></div>
                                </div>
                            </li>

                        <?php endwhile; else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <?php endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</main>

    <script type="text/javascript"> 
        const initialHeight = '<?php echo $_POST['scroll']?>';
        console.log(initialHeight);
    </script>
<?php get_footer(); ?>
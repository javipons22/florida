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
                    <button name="category_select_button" class="category-select-button category-select-button--1">categorías <img class="tiendas__icono" src="<?php echo get_template_directory_uri(); ?>/img/arrowdown.svg" alt="flecha select"></button>
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
                    <button name="category_select_button" class="category-select-button category-select-button--2">categorías <img class="tiendas__icono" src="<?php echo get_template_directory_uri(); ?>/img/arrowdown.svg" alt="flecha select"></button>
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

    <section class="tiendas" >
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo" id="marcas">AGENDAS</h1>
                    <button name="category_select_button" class="category-select-button category-select-button--3">categorías <img class="tiendas__icono" src="<?php echo get_template_directory_uri(); ?>/img/arrowdown.svg" alt="flecha select"></button>
                </div>
                <form id="tienda-category-form-3" method="POST">
                <?php if( isset($_POST['category_3']) && $_POST['category_3'] != 'all'):?>
                    <button name="category_3" class="button" value="all" type="submit">Todo</button>
                <?php else:?>
                    <button name="category_3" class="button button--selected" value="all" type="submit">Todo</button>
                <?php endif;?>
                <?php 
                $args_categories_3 = array('numberposts'	=> -1,'post_type' => 'categorias_agendas');
                $query_categories_3 = new WP_Query($args_categories_3);
                            
                            if ( $query_categories_3->have_posts() ) : while ( $query_categories_3->have_posts() ) : $query_categories_3->the_post(); ?>
                            <?php $id = get_the_ID(); ?>
                            <?php if( isset($_POST['category_3']) && $_POST['category_3'] == $id):?>
                                <button name="category_3" class="button button--selected" value="<?php echo $id;?>" type="submit"><?php the_field('name');?></button>
                            <?php else: ?>
                                <button name="category_3" class="button" value="<?php echo $id;?>" type="submit"><?php the_field('name');?></button>
                            <?php endif;?>
                            
                            

                            <?php endwhile; else : ?>
                            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; wp_reset_postdata(); ?>
                </form>
            </div>
            <div id="agendas-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php $args_slide_3 = array(
                            'numberposts'	=> -1,
                            'post_type' => 'agendas'
                            );
                        if( isset($_POST['category_3']) && $_POST['category_3'] != 'all')
                        {
                            $args_slide_3['meta_key'] = 'category';
                            $args_slide_3['meta_value'] = $_POST['category_3'];
                        }
                        $query_slide_3 = new WP_Query($args_slide_3);
                        
                        if ( $query_slide_3->have_posts() ) : while ( $query_slide_3->have_posts() ) : $query_slide_3->the_post(); ?>

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

    <section class="tiendas" >
        <div class="container">
            
            <div class="row">
                <div class="col-12 col-lg-4 tiendas__header-container d-lg-flex flex-row align-items-start">
                    <div class="tiendas__header d-flex flex-column">
                        <h1 class="tiendas__titulo tiendas__titulo--cartelera mb-4" id="marcas">CARTELERA DE CINE</h1>
                        <div class="tiendas__cartelera-info">
                            <div class="row">
                                <h4 class="mb-3 col-12">Joker (2020)</h4>
                                <div class="col-6 col-lg-12">
                                    <h5>Clasificación</h5>
                                    <p>Todos (15 años)</p>
                                </div>
                                <div class="col-6 col-lg-12">
                                    <h5>Género</h5>
                                    <p>Comic</p>
                                </div>
                                <div class="col-6 col-lg-12">
                                    <h5>Horarios</h5>
                                    <p>5:20 p.m, 10:00 p.m</p>
                                </div>
                                <div class="col-6 col-lg-12">
                                    <h5>Sala 1</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cartelera-slider" class="splide col-12 col-lg-8 ">
                    <div class="splide__track">
                        <ul class="splide__list d-flex align-items-center">
                            <?php $args_slide_4 = array(
                                'numberposts'	=> -1,
                                'post_type' => 'peliculas'
                                );
                            if( isset($_POST['category_4']) && $_POST['category_4'] != 'all')
                            {
                                $args_slide_4['meta_key'] = 'category';
                                $args_slide_4['meta_value'] = $_POST['category_4'];
                            }
                            $query_slide_4 = new WP_Query($args_slide_4);
                            
                            if ( $query_slide_4->have_posts() ) : while ( $query_slide_4->have_posts() ) : $query_slide_4->the_post(); ?>

                                <li class="splide__slide" onclick="run(this);">
                                    <div class="splide__slide__container">
                                        <img src="<?php the_field('imagen'); ?>" alt="<?php echo get_the_title();?> logo">
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
        </div>
    </section>
    
</main>

    <script type="text/javascript"> 
        const initialHeight = '<?php echo $_POST['scroll']?>';
        const category1 = ('<?php echo $_POST['category_1']?>' !== '') ? '<?php echo $_POST['category_1']?>' : 'all';
        const category2 = ('<?php echo $_POST['category_2']?>' !== '')  ? '<?php echo $_POST['category_2']?>' : 'all';
        const category3 = ('<?php echo $_POST['category_3']?>' !== '')  ? '<?php echo $_POST['category_3']?>' : 'all';
        const category4 = ('<?php echo $_POST['category_4']?>' !== '')  ? '<?php echo $_POST['category_4']?>' : 'all';
    </script>
<?php get_footer(); ?>
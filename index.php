<?php get_header(); ?>
<div class="loader-container align-items-center justify-content-center">
    <div class="loader"></div>
</div>
<main>
    <section class="banner">
        <div id="banner-slider" class="splide splide--big">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php 
                    $args_slide_banner_1 = array(
                        'posts_per_page'	=> -1,
                        'post_type' => 'banners_pc'
                    );
                        
                    $query_slide_banner_1 = new WP_Query($args_slide_banner_1);

                    $imagen_numero = 1;
                        
                    if ( $query_slide_banner_1->have_posts() ) : while ( $query_slide_banner_1->have_posts() ) : $query_slide_banner_1->the_post(); ?>
                        <li class="splide__slide">
                            <img src="<?php the_field('imagen');?>" alt="Imagen Banner <?php echo $imagen_numero; ?>" />
                        </li>
                    <?php $imagen_numero++; endwhile; endif; ?>
                </ul>
            </div>
        </div>
        <div id="banner-slider-2" class="splide splide--small">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php 
                    $args_slide_banner_2 = array(
                        'numberposts'	=> -1,
                        'post_type' => 'banners_mobile'
                    );
                        
                    $query_slide_banner_2 = new WP_Query($args_slide_banner_2);

                    $imagen_numero_2 = 1;
                        
                    if ( $query_slide_banner_2->have_posts() ) : while ( $query_slide_banner_2->have_posts() ) : $query_slide_banner_2->the_post(); ?>
                        <li class="splide__slide splide__slide--banner">
                            <img src="<?php the_field('imagen');?>" alt="Imagen Banner <?php echo $imagen_numero_2; ?>" />
                        </li>
                    <?php $imagen_numero_2++; endwhile; endif; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php 
    $categorias_marcas = [];
    $args_categories_1 = array('posts_per_page'	=> -1,'post_type' => 'marcas');
    $query_categories_1 = new WP_Query($args_categories_1);
                
    if ( $query_categories_1->have_posts() ) : while ( $query_categories_1->have_posts() ) : $query_categories_1->the_post();
    
    $categoria = get_field('category');
    if (!in_array($categoria, $categorias_marcas)) {
        array_push($categorias_marcas, $categoria);
    }

    endwhile; else : endif; wp_reset_postdata(); 
    sort($categorias_marcas);?>
    <?php foreach ($categorias_marcas as $categoria): ?>
    <section class="tiendas" id="marcas-anchor">
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo" id="marcas"><?php echo $categoria;?></h1>
                </div>
            </div>
            <div id="marcas-slider" class="splide multiple-splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php $args_slide_1 = array(
                            'posts_per_page'	=> -1,
                            'post_type' => 'marcas',
                            'meta_key'	=> 'category',
	                        'meta_value' => $categoria
                            );
                        $query_slide_1 = new WP_Query($args_slide_1);
                        
                        if ( $query_slide_1->have_posts() ) : while ( $query_slide_1->have_posts() ) : $query_slide_1->the_post(); ?>

                            <li class="splide__slide">
                                <div class="splide__slide__container">
                                    <?php if (get_field('imagena') != ''): ?>
                                        <img src="<?php the_field('imagena'); ?>" alt="<?php echo get_the_title();?> logo">
                                    <?php else: ?>
                                        <span class="marca-default"><?php echo get_the_title();?></span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="<?php echo get_the_title();?> logo">
                                    <?php endif; ?>
                                </div>
                                <div class="middle d-flex align-items-center justify-content-center">
                                    <div class="text local-info d-flex row flex-row flex-wrap">
                                        <div class="col-12">
                                            <div class="local-info__main-title">
                                                <?php echo get_the_title();?>
                                            </div>                                            
                                        </div>
                                        <?php if(get_field('telefono') != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-title">
                                                Teléfono
                                            </div>
                                            <div class="local-info__info-text">
                                                <?php the_field('telefono');?>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php if(get_field('horarios') != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-title">
                                                Horarios
                                            </div>
                                            <div class="local-info__info-text">
                                                <?php the_field('horarios');?><br>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php if(get_field('local') != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-text">
                                                Local <?php the_field('local');?><br>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </li>

                        <?php endwhile; else : ?>
                        <p><?php esc_html_e( 'No existen Marcas aún.' ); ?></p>
                        <?php endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
        
    <?php endforeach;?>

    <section class="tiendas" id="comidas-anchor">
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo">COMIDAS</h1>
                    <button name="category_select_button" class="category-select-button category-select-button--2">categorías <img class="tiendas__icono" src="<?php echo get_template_directory_uri(); ?>/img/arrowdown.svg" alt="flecha select"></button>
                </div>
                <form id="tienda-category-form-2" method="POST">
                <?php if( isset($_POST['category_2']) && $_POST['category_2'] != 'all'):?>
                    <button name="category_2" class="button" value="all" type="submit">Todo</button>
                <?php else:?>
                    <button name="category_2" class="button button--selected" value="all" type="submit">Todo</button>
                <?php endif;?>
                <?php 
                $categorias_comidas = [];
                $args_categories_2 = array('posts_per_page'	=> -1,'post_type' => 'comidas');
                $query_categories_2 = new WP_Query($args_categories_2);
                            
                if ( $query_categories_2->have_posts() ) : while ( $query_categories_2->have_posts() ) : $query_categories_2->the_post();
                
                $categoria = get_field('category');
                if (!in_array($categoria, $categorias_comidas)) {
                    array_push($categorias_comidas, $categoria);
                }

                endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; wp_reset_postdata(); ?>
                <?php foreach ($categorias_comidas as $categoria): ?>
                    <?php if( isset($_POST['category_2']) && $_POST['category_2'] == $categoria):?>
                        <button name="category_2" class="button button--selected" value="<?php echo $categoria;?>" type="submit"><?php echo $categoria;?></button>
                    <?php else: ?>
                        <button name="category_2" class="button" value="<?php echo $categoria;?>" type="submit"><?php echo $categoria;?></button>
                    <?php endif;?>
                <?php endforeach;?>
                
                </form>
            </div>
            <div id="comidas-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php $args_slide_2 = array(
                            'posts_per_page'	=> -1,
                            'post_type' => 'comidas'
                            );
                        if( isset($_POST['category_2']) && $_POST['category_2'] != 'all')
                        {
                            $args_slide_2['meta_key'] = 'category';
                            $args_slide_2['meta_value'] = $_POST['category_2'];
                        }
                        $query_slide_2 = new WP_Query($args_slide_2);
                        
                        if ( $query_slide_2->have_posts() ) : while ( $query_slide_2->have_posts() ) : $query_slide_2->the_post(); ?>

                            <li class="splide__slide"">
                                <div class="splide__slide__container">
                                <?php if (get_field('imagena') != ''): ?>
                                    <img src="<?php the_field('imagena'); ?>" alt="<?php echo get_the_title();?> logo">
                                <?php else: ?>
                                    <span class="marca-default"><?php echo get_the_title();?></span>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="<?php echo get_the_title();?> logo">
                                <?php endif; ?>
                                </div>
                                <div class="middle d-flex align-items-center justify-content-center">
                                    <div class="text local-info row d-flex flex-column">
                                        <div class="col-12">
                                            <div class="local-info__main-title">
                                                <?php echo get_the_title();?>
                                            </div>                                            
                                        </div>
                                        <?php if(get_field('telefono') != ''):?>
                                        <div class="col-12 mt-2">
                                            <div class="local-info__info-title">
                                                Teléfono
                                            </div>
                                            <div class="local-info__info-text">
                                                <?php the_field('telefono');?>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php if(get_field('horarios') != ''):?>
                                        <div class="col-12 mt-2">
                                            <div class="local-info__info-title">
                                                Horarios
                                            </div>
                                            <div class="local-info__info-text">
                                                <?php the_field('horarios');?><br>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php if(get_field('local') != ''):?>
                                        <div class="col-12 mt-2">
                                            <div class="local-info__info-text">
                                                Local <?php the_field('local');?><br>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                    </div>
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

    <section class="tiendas" id="agenda-anchor">
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo">AGENDA</h1>
                </div>
            </div>
            <div id="agenda-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php $args_slide_3 = array(
                            'posts_per_page'	=> -1,
                            'post_type' => 'agendas',
                            'meta_key' => 'orden',
                            'orderby' => 'meta_value',
                            'order'	=> 'ASC'
                            );
                        $query_slide_3 = new WP_Query($args_slide_3);
                        $i = 1;
                        
                        if ( $query_slide_3->have_posts() ) : while ( $query_slide_3->have_posts() ) : $query_slide_3->the_post(); ?>

                        <li class="splide__slide"">
                            <div class="splide__slide__container splide__slide__container--agenda">
                                <span><?php echo $i; ?></span>
                                <img src="<?php the_field('imagena');?>" alt="agenda <?php echo $i;?>">
                            </div>
                            <div class="middle d-flex align-items-center justify-content-center">
                                <div class="text local-info row d-flex flex-column">
                                    <div class="col-12 mb-2">
                                        <?php echo get_the_title();?>
                                    </div>
                                    <div class="col-12">
                                        <?php the_field('descripcion');?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php $i++; endwhile; else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <?php endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="tiendas my-lg-5" id="cines-anchor">
        <div class="container">
            
            <div class="row">
                <div class="tiendas__header-container w-100 d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                    <div class="tiendas__header d-flex w-100 d-lg-inline justify-content-between justify-content-md-start">
                        <h1 class="tiendas__titulo" id="comidas">CARTELERA DE CINE</h1>
                        <button name="category_select_button" class="category-select-button category-select-button--4">categorías <img class="tiendas__icono" src="<?php echo get_template_directory_uri(); ?>/img/arrowdown.svg" alt="flecha select"></button>
                    </div>
                    <form id="tienda-category-form-4" method="POST">
                        <?php if( isset($_POST['category_4']) && $_POST['category_4'] != 'all'):?>
                            <button name="category_4" class="button" value="all" type="submit">Todo</button>
                        <?php else:?>
                            <button name="category_4" class="button button--selected" value="all" type="submit">Todo</button>
                        <?php endif;?>
                        <?php 
                        $categorias_peliculas = [];
                        $args_categories_3 = array('posts_per_page'	=> -1,'post_type' => 'peliculas');
                        $query_categories_3 = new WP_Query($args_categories_3);
                                    
                        if ( $query_categories_3->have_posts() ) : while ( $query_categories_3->have_posts() ) : $query_categories_3->the_post();
                        
                        $categoria = get_field('genero');
                        if (!in_array($categoria, $categorias_peliculas)) {
                            array_push($categorias_peliculas, $categoria);
                        }

                        endwhile; else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <?php endif; wp_reset_postdata(); ?>
                        <?php foreach ($categorias_peliculas as $categoria): ?>
                            <?php if( isset($_POST['category_4']) && $_POST['category_4'] == $categoria):?>
                                <button name="category_4" class="button button--selected" value="<?php echo $categoria;?>" type="submit"><?php echo $categoria;?></button>
                            <?php else: ?>
                                <button name="category_4" class="button" value="<?php echo $categoria;?>" type="submit"><?php echo $categoria;?></button>
                            <?php endif;?>
                        <?php endforeach;?>
                    </form>
                </div>
                <div id="cartelera-slider" class="splide col-12 col-lg-12 ">
                    <div class="splide__track">
                        <ul class="splide__list cartelera__list d-flex align-items-center">
                            <?php $args_slide_4 = array(
                                'posts_per_page'	=> -1,
                                'post_type' => 'peliculas',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                );
                                $i = 0;
                            if( isset($_POST['category_4']))
                            {
                                $current_pelicula = $_POST['category_4'];
                            } else {
                                $current_pelicula = 0;
                            }
                            if( isset($_POST['category_4']) && $_POST['category_4'] != 'all')
                            {
                                $args_slide_4['meta_key'] = 'genero';
                                $args_slide_4['meta_value'] = $_POST['category_4'];
                            }
                            $query_slide_4 = new WP_Query($args_slide_4);
                            
                            if ( $query_slide_4->have_posts() ) : while ( $query_slide_4->have_posts() ) : $query_slide_4->the_post(); ?>
                                <?php if ( get_the_ID() == $current_pelicula || $current_pelicula == 0 ): ?>
                                <li class="splide__slide splide__slide--selected">
                                <?php else: ?>
                                <li class="splide__slide">
                                <?php endif; ?>
                                    <?php if ( get_the_ID() == $current_pelicula || $current_pelicula == 0 ): ?>
                                    <div class="splide__slide__container splide__slide__container--selected">
                                    <?php if ($current_pelicula == 0) : $current_pelicula++; endif;?>
                                    <?php else: ?>
                                    <div class="splide__slide__container"> 
                                    <?php endif;?>
                                        <img class="movie-image" src="<?php the_field('imagena'); ?>" alt="<?php echo get_the_title();?> logo">
                                    </div>
                                    <div class="middle">
                                        <div class="info-pelicula text" id="text">
                                            <div class="info-pelicula__titulo">
                                                <?php echo get_the_title();?>
                                            </div>
                                            <div class="info-pelicula__container">
                                                <div class="info-pelicula__label">
                                                    Género
                                                </div>
                                                <div class="info-pelicula__value">
                                                    <?php the_field('genero'); ?>
                                                </div>
                                            </div>
                                            <div class="info-pelicula__container">
                                                <div class="info-pelicula__label">
                                                    Clasificación
                                                </div>
                                                <div class="info-pelicula__value">
                                                    <?php the_field('clasificacion');?><br>
                                                </div>
                                            </div>
                                            <div class="info-pelicula__container">
                                                <div class="info-pelicula__label">
                                                    Horarios
                                                </div>
                                                <div class="info-pelicula__value">
                                                    <?php the_field('horarios');?><br>
                                                </div>
                                            </div>
                                            <div class="info-pelicula__container mt-2">
                                                <div class="info-pelicula__value">
                                                    Sala <?php the_field('sala');?><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php $i++;?>

                                

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
        const currMovie = ('<?php echo $_POST['current_movie']?>' !== '')  ? '<?php echo $_POST['current_movie']?>' : 0;
        const busqueda = ('<?php echo $_POST['busqueda']?>' !== '')  ? '<?php echo $_POST['busqueda']?>' : 0;
        console.log(currMovie);
    </script>
<?php get_footer(); ?>
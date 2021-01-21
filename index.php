<?php get_header(); ?>
<div class="loader-container align-items-center justify-content-center">
    <div class="loader"></div>
</div>
<main id="inicio-anchor">
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
                            <?php if (get_field('archivo')): ?>
                            <a href="<?php the_field('archivo'); ?>" target="_blank" class="splide__link">
                            <?php endif; ?>
                                <img src="<?php the_field('imagen');?>" alt="Imagen Banner <?php echo $imagen_numero; ?>" />
                            <?php if (get_field('archivo')): ?>
                            </a>
                            <?php endif; ?>
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
                            <?php if (get_field('archivo')): ?>
                            <a href="<?php the_field('archivo'); ?>" target="_blank" class="splide__link">
                            <?php endif; ?>
                                <img src="<?php the_field('imagen');?>" alt="Imagen Banner <?php echo $imagen_numero_2; ?>" />
                            <?php if (get_field('archivo')): ?>
                            </a>
                            <?php endif; ?>
                        </li>
                    
                    <?php $imagen_numero_2++; endwhile; endif; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php 
    $marcas = array();
    $args_categories_1 = array('posts_per_page'	=> -1,'post_type' => 'marcas');
    $query_categories_1 = new WP_Query($args_categories_1);
                
    if ( $query_categories_1->have_posts() ) : while ( $query_categories_1->have_posts() ) : $query_categories_1->the_post();
    $categoria = get_field('category');
    $titulo = get_the_title();
    $imagen = get_field('imagena');
    $telefono = get_field('telefono');
    $horarios = get_field('horarios');
    $local = get_field('local');
    $elemento = array(
        'titulo'=> $titulo,
        'imagen' => $imagen,
        'telefono' => $telefono,
        'horarios' => $horarios,
        'local' => $local
    );
    if(!array_key_exists($categoria, $marcas)) {
        $marcas[$categoria] = array('categoria' => $categoria, 'marcas'=> array());
        array_push ($marcas[$categoria]['marcas'], $elemento);
    } else {
        array_push ($marcas[$categoria]['marcas'], $elemento);
    }
    
    // $categoria = get_field('category');
    // if (!in_array($categoria, $categorias_marcas)) {
    //     array_push($categorias_marcas, $categoria);
    // }

    endwhile; else : endif; wp_reset_postdata(); 
    ksort($marcas);
    // var_dump($marcas);
    ?>
    <?php foreach ($marcas as $categoria):
    if($categoria['categoria'] != ''):    
    ?>
    <section class="tiendas" id="marcas-anchor">
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo" id="marcas"><?php echo $categoria['categoria'];?></h1>
                </div>
            </div>
            <div id="marcas-slider" class="splide multiple-splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php
                        $amount = 0;
                        foreach($categoria['marcas'] as $marca):
                            $amount++;?>
                            <li class="splide__slide splide__slide--info" titulo="<?php echo $marca['titulo'];?>" telefono="<?php echo $marca['telefono'];?>" horarios="<?php echo $marca['horarios'];?>" local="<?php echo $marca['local'];?>">
                                <div class="splide__slide__container">
                                    <?php if ($marca['imagen'] != ''): ?>
                                        <img src="<?php echo $marca['imagen']; ?>" alt="<?php echo $marca['titulo'];?> logo">
                                    <?php else: ?>
                                        <span class="marca-default"><?php echo $marca['titulo'];?></span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="<?php echo $marca['titulo'];?> logo">
                                    <?php endif; ?>
                                </div>
                                <div class="middle d-flex align-items-center justify-content-center">
                                    <div class="text local-info d-flex row flex-row flex-wrap">
                                        <div class="col-12">
                                            <div class="local-info__main-title">
                                                <?php echo $marca['titulo'];?>
                                            </div>                                            
                                        </div>
                                        <?php if($marca['telefono'] != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-title">
                                                Teléfono
                                            </div>
                                            <div class="local-info__info-text">
                                                <?php echo $marca['telefono'];;?>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php if($marca['horarios'] != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-title">
                                                Horarios
                                            </div>
                                            <div class="local-info__info-text">
                                                <?php echo $marca['horarios'];?><br>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php if($marca['local'] != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-text">
                                                Local <?php echo $marca['local'];?><br>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </li>

                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="amount" valor="<?php echo $amount; ?>"></div>
            </div>
        </div>
    </section>
        
    <?php endif;endforeach;?>

    <?php 
    $comidas = array();
    $args_categories_2 = array('posts_per_page'	=> -1,'post_type' => 'comidas');
    $query_categories_2 = new WP_Query($args_categories_2);
                
    if ( $query_categories_2->have_posts() ) : while ( $query_categories_2->have_posts() ) : $query_categories_2->the_post();
    $categoria = get_field('category');
    $titulo = get_the_title();
    $imagen = get_field('imagena');
    $telefono = get_field('telefono');
    $horarios = get_field('horarios');
    $local = get_field('local');
    $elemento = array(
        'titulo'=> $titulo,
        'imagen' => $imagen,
        'telefono' => $telefono,
        'horarios' => $horarios,
        'local' => $local
    );
    if(!array_key_exists($categoria, $comidas)) {
        $comidas[$categoria] = array('categoria' => $categoria, 'comidas'=> array());
        array_push ($comidas[$categoria]['comidas'], $elemento);
    } else {
        array_push ($comidas[$categoria]['comidas'], $elemento);
    }
    
    // $categoria = get_field('category');
    // if (!in_array($categoria, $categorias_marcas)) {
    //     array_push($categorias_marcas, $categoria);
    // }

    endwhile; else : endif; wp_reset_postdata(); 
    ksort($comidas);
    // var_dump($marcas);
    ?>
    <?php foreach ($comidas as $categoria):
    if($categoria['categoria'] != ''):    
    ?>
    <section class="tiendas" id="comidas-anchor">
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo" id="marcas">COMIDAS - <?php echo $categoria['categoria'];?></h1>
                </div>
            </div>
            <div id="marcas-slider" class="splide multiple-splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach($categoria['comidas'] as $marca_comida):?>
                            <li class="splide__slide splide__slide--info" titulo="<?php echo $marca_comida['titulo'];?>" telefono="<?php echo $marca_comida['telefono'];?>" horarios="<?php echo $marca_comida['horarios'];?>" local="<?php echo $marca_comida['local'];?>">
                                <div class="splide__slide__container">
                                    <?php if ($marca_comida['imagen'] != ''): ?>
                                        <img src="<?php echo $marca_comida['imagen']; ?>" alt="<?php echo $marca_comida['titulo'];?> logo">
                                    <?php else: ?>
                                        <span class="marca-default"><?php echo $marca_comida['titulo'];?></span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="<?php echo $marca_comida['titulo'];?> logo">
                                    <?php endif; ?>
                                </div>
                                <div class="middle d-flex align-items-center justify-content-center">
                                    <div class="text local-info d-flex row flex-row flex-wrap">
                                        <div class="col-12">
                                            <div class="local-info__main-title">
                                                <?php echo $marca_comida['titulo'];?>
                                            </div>                                            
                                        </div>
                                        <?php if($marca_comida['telefono'] != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-title">
                                                Teléfono
                                            </div>
                                            <div class="local-info__info-text">
                                                <?php echo $marca_comida['telefono'];?>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php if($marca_comida['horarios'] != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-title">
                                                Horarios
                                            </div>
                                            <div class="local-info__info-text">
                                                <?php echo $marca_comida['horarios'];?><br>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php if($marca_comida['local'] != ''):?>
                                        <div class="col-12">
                                            <div class="local-info__info-text">
                                                Local <?php echo $marca_comida['local'];?><br>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php endif; endforeach;?>
    <section class="tiendas" id="servicios-anchor">
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo">SERVICIOS</h1>
                </div>
            </div>
            <div id="servicios-slider" class="splide multiple-splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php $args_slide_6 = array(
                            'posts_per_page'	=> -1,
                            'post_type' => 'servicios',
                            'orderby'        => 'title',
                            'order'          => 'ASC'
                            );
                        $query_slide_6 = new WP_Query($args_slide_6);
                        $i = 1;
                        
                        if ( $query_slide_6->have_posts() ) : while ( $query_slide_6->have_posts() ) : $query_slide_6->the_post(); ?>

                        <li class="splide__slide splide__slide--info" descripcion="<?php the_field('descripcion');?>">
                            <div class="splide__slide__container splide__slide__container--servicios">
                                <img class="img-servicio" src="<?php echo get_template_directory_uri(); ?>/img/iconos/<?php the_field('imagena');?>" alt="servicio <?php echo $i;?>">
                                <!-- <img class="img-fondo" src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="<?php echo get_the_title();?> logo"> -->
                            </div>
                            <div class="middle d-flex align-items-center justify-content-center">
                                <div class="text text--servicios local-info row d-flex align-items-center justify-content-center">
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
    <section class="tiendas" id="agenda-anchor">
        <div class="container">
            <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start">
                <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                    <h1 class="tiendas__titulo">AGENDA</h1>
                </div>
            </div>
            <div id="agenda-slider" class="splide multiple-splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php $args_slide_3 = array(
                            'posts_per_page'	=> -1,
                            'post_type' => 'agendas',
                            'meta_key' => 'dia',
                            'orderby' => 'meta_value_num',
                            'order'	=> 'ASC'
                            );
                        $query_slide_3 = new WP_Query($args_slide_3);
                        
                        if ( $query_slide_3->have_posts() ) : while ( $query_slide_3->have_posts() ) : $query_slide_3->the_post(); ?>

                        <!-- <li class="splide__slide splide__slide--info" titulo="<?php echo get_the_title();?>" descripcion="<?php the_field('descripcion');?>"> -->
                        <li class="splide__slide splide__slide--info"  descripcion="<?php the_field('descripcion');?>" archivo="<?php the_field('archivo');?>">
                            <div class="splide__slide__container splide__slide__container--agenda">
                                <span class="agenda-mes"><?php the_field('mes');?></span>
                                <span class="agenda-dia"><?php the_field('dia');?></span>
                                <!-- <img src="<?php the_field('imagena');?>" alt="agenda <?php echo $i;?>"> -->
                            </div>
                            <div class="middle d-flex align-items-center justify-content-center">
                                <div class="text local-info agenda-info row d-flex flex-row flex-wrap align-items-center justify-content-center">
                                    <!-- <div class="col-12 mb-2">
                                        <?php echo get_the_title();?>
                                    </div> -->
                                    <div class="col-12">
                                        <?php the_field('descripcion');?>
                                    </div>
                                    <?php if(get_field('archivo')): ?>
                                        <a class="col-8" href="<?php the_field('archivo');?>" target="_blank">
                                            Ver más
                                        </a>
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
    <section class="tiendas my-lg-5" id="cines-anchor">
        <div class="container">
                <div class="tiendas__header-container d-lg-flex flex-lg-column align-items-center align-items-lg-start mb-lg-2">
                    <div class="tiendas__header d-flex d-lg-inline justify-content-between justify-content-md-start">
                        <h1 class="tiendas__titulo titulo-cartelera">CARTELERA DE CINE</h1>
                    </div>
                </div>
                <div id="cartelera-slider" class="splide col-md-12 col-lg-12 ">
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
                                <li class="splide__slide splide__slide--info" titulo="<?php echo get_the_title();?>" genero="<?php the_field('genero'); ?>" clasificacion="<?php the_field('clasificacion');?>">
                                    <?php if ( get_the_ID() == $current_pelicula || $current_pelicula == 0 ): ?>
                                    <div class="splide__slide__container splide__slide__container--selected">
                                    <?php if ($current_pelicula == 0) : $current_pelicula++; endif;?>
                                    <?php else: ?>
                                    <div class="splide__slide__container"> 
                                    <?php endif;?>
                                        <img class="movie-image" src="<?php the_field('imagena'); ?>" alt="<?php echo get_the_title();?> logo">
                                    </div>
                                    <div class="middle">
                                        <div class="info-pelicula text-cartelera" id="text">
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
                                            <!-- <div class="info-pelicula__container">
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
                                            </div> -->
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
    
    <div class="container boton-volver">
            <!-- <img class="d-inline-block d-md-none" src="<?php echo get_template_directory_uri(); ?>/img/hand.png" alt="slide"> -->
            <div class="boton-volver__boton d-inline-block d-lg-none"><span class="main-nav__link--scroll-up" name="inicio-anchor"><i class="fas fa-arrow-up"></i></span></div>
            <div class="boton-volver__boton d-none d-lg-inline-block"><span class="main-nav__link--scroll-up" name="inicio-anchor"><i class="fas fa-arrow-up mr-2"></i>     Volver Arriba!</span></div>
    </div>
    <div class="mobile-info d-md-none justify-content-center align-items-center">
        <div class="mobile-info__text local-info d-flex row flex-column flex-wrap justify-content-center">
            <div class="mobile-info__boton-cerrar d-flex align-items-center justify-content-center">x</div>
            <div class="col-12">
                <div class="mobile-info__titulo font-weight-bold">
                </div>                                            
            </div>
            <div class="col-12">
                <div class="mobile-info__telefono-titulo font-weight-bold">
                    Teléfono
                </div>
                <div class="mobile-info__telefono"></div>
            </div>
            <div class="col-12">
                <div class="mobile-info__horarios-titulo font-weight-bold">
                    Horarios
                </div>
                <div class="mobile-info__horarios"></div>
            </div>
            <div class="col-12">
                <span class="font-weight-bold mobile-info__local-titulo">Local</span>  
                <div class="mobile-info__local"></div>
            </div>
            <div class="col-12">
                <div class="mobile-info__descripcion"></div>
            </div>
            <div class="col-12">
                <div class="mobile-info__genero-titulo font-weight-bold">
                    Género
                </div>
                <div class="mobile-info__genero"></div>
            </div>
            <div class="col-12">
                <div class="mobile-info__clasificacion-titulo font-weight-bold">
                    Clasificación
                </div>
                <div class="mobile-info__clasificacion"></div>
            </div>
        </div>
    </div>
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
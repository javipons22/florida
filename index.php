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
    <?php if(isset($_POST['busqueda'])): ?>
        var busqueda = '<?php echo $_POST["busqueda"];?>';
    <?php else: ?>
        var busqueda = 0;
    <?php endif;?>
    </script>
<?php get_footer(); ?>
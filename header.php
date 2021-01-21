<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Florida | Parque Comercial</title>
        <?php wp_head(); ?>
        <script src="https://kit.fontawesome.com/47c1c98052.js" crossorigin="anonymous"></script>
    </head>
    <body <?php body_class();?>>
        <header class="header-container">
            <div class="main-header container">
                <div class="row justify-content-between align-items-stretch d-lg-flex">
                    <div class="col d-flex align-items-center justify-content-lg-center pr-lg-0 col-lg-12">
                        <a href="/">
                            <img class="main-header__logo" src="<?php echo get_template_directory_uri(); ?>/img/logo1.png" alt="Logo Florida" style="width:auto;">
                        </a>
                    </div>
                    <div class="col-3 d-flex d-lg-none main-header__menu-icon justify-content-end align-items-center">
                        <!-- <span class="search-button" style="font-size: 22px; color: #777;">
                            <i class="fas fa-search"></i>
                        </span> -->
                        <a href="https://www.facebook.com/FloridaPQOficial/" target="_blank">
                            <span style="font-size: 2em; color: #777; padding: 0 10px;">
                                <i class="fab fa-facebook-square"></i>
                            </span> 
                        </a>
                        <a href="https://www.instagram.com/floridapqoficial/" target="_blank">
                            <span style="font-size: 2em; color: #777; padding: 0 10px;">
                                <i class="fab fa-instagram"></i>
                            </span> 
                        </a>
                        <a href="https://wa.link/q1ripz" target="_blank">
                            <span style="font-size: 2em; color: #777; padding: 0  0 0 15px;">
                                <i class="fab fa-whatsapp"></i>
                            </span> 
                        </a>
                        <button class="main-header__button p-2">
                            <div class="menu-wrapper">
                                <div class="hamburger-menu"></div>
                            </div>
                        </button>
                    </div>
                    <nav class="main-nav col-12 col-lg-12 d-lg-flex align-items-center justify-content-lg-center mt-3 mb-5 mb-lg-0 mt-lg-0 p-lg-0 pl-xl-0">
                        <ul class="list-unstyled w-100 d-lg-flex mb-0 align-items-center justify-content-lg-around">
                            <li class="main-nav__element d-lg-inline-block px-lg-3 px-xl-4"><span class="main-nav__link main-nav__link--scroll" name="marcas-anchor">MARCAS</span></li>
                            <li class="main-nav__element d-lg-inline-block px-lg-3 px-xl-4"><span class="main-nav__link main-nav__link--scroll" name="comidas-anchor">COMIDAS</span></li>
                            <!-- <li class="main-nav__element d-lg-inline-block px-lg-3 px-xl-4"><span class="main-nav__link main-nav__link--scroll" name="cines-anchor">CARTELERA DE CINE</span></li> -->
                            <li class="main-nav__element d-lg-inline-block px-lg-3 px-xl-4"><span class="main-nav__link main-nav__link--scroll" name="agenda-anchor">AGENDA</span></li>
                            <li class="main-nav__element d-lg-inline-block px-lg-3 px-xl-4"><span class="main-nav__link main-nav__link--scroll" name="servicios-anchor">SERVICIOS</span></li>
                            <li class="main-nav__element d-lg-inline-block px-lg-3 px-xl-4"><span class="main-nav__link main-nav__link--scroll" name="cines-anchor">CINES</span></li>
                            <li class="main-nav__element d-lg-inline-block pl-lg-3 px-xl-4 pr-lg-0"><span class="main-nav__link main-nav__link--scroll" name="gmaps-anchor">¿CÓMO LLEGAR?</span></li>
                            <li class="main-nav__element d-lg-inline-block pl-lg-3 px-xl-4 pr-lg-0"><span class="main-nav__link main-nav__link--scroll" name="horarios-anchor">HORARIOS</span></li>
                            <li class="main-nav__element main-nav__element--rrss d-lg-flex pl-lg-3 px-xl-4 pr-lg-0">
                                <a href="https://www.facebook.com/FloridaPQOficial/" target="_blank" class="main-nav__link">
                                    <span style="font-size: 2.35em; color: #777; padding: 0 15px;">
                                        <i class="fab fa-facebook-square"></i>
                                    </span> 
                                </a>
                                <a href="https://www.instagram.com/floridapqoficial/" target="_blank" class="main-nav__link">
                                    <span style="font-size: 2.35em; color: #777; padding: 0 15px;">
                                        <i class="fab fa-instagram"></i>
                                    </span> 
                                </a>
                                <a href="https://wa.link/q1ripz" target="_blank" class="main-nav__link">
                                    <span style="font-size: 2.35em; color: #777; padding: 0 15px;">
                                        <i class="fab fa-whatsapp"></i>
                                    </span> 
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="buscador">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <form class="col-12 col-lg-6 d-flex justify-content-center buscador-form" method="POST">
                        <input type="text" name="busqueda" placeholder="Busca información en el sitio!">
                        <input type="submit" value="buscar">
                    </form>
                </div>
            </div>
        </div>
        <div class="resultados">
            <?php if(isset($_POST['busqueda'])): ?>
            <span class="d-none d-lg-inline-block resultados__boton-cerrar--laptop">x</span>
            <div class="container resultados__contenedor">
                
                <div class="row">
                    <div class="col-10">
                        <span class="resultados__texto">Resultados de la búsqueda para "<?php echo $_POST['busqueda'];?>"</span>
                    </div>  
                    <div class="col-2">
                        <span class="resultados__boton-cerrar">x</span>
                    </div>
                </div>
                <div class="row d-flex resultados-marcas justify-content-center">
                    <?php 
                    $args_busqueda_marcas = array(
                        'posts_per_page'	=> -1,
                        'post_type' => 'marcas',
                        's' => $_POST['busqueda']
                    );
                        
                    $query_busqueda_marcas = new WP_Query($args_busqueda_marcas);
                        
                    if ( $query_busqueda_marcas->have_posts() ) : while ( $query_busqueda_marcas->have_posts() ) : $query_busqueda_marcas->the_post(); ?> 
                        <div class="row col-11 col-lg-6 resultados__informacion d-flex align-items-center">
                            <div class="col-4 resultados__imagen ">
                            <?php if (get_field('imagena') != ''): ?>
                                <img src="<?php the_field('imagena'); ?>" alt="<?php echo get_the_title();?> logo">
                            <?php else: ?>
                                <span class="resultados__imagen--marca d-flex align-items-center justify-content-center "><?php echo get_the_title();?></span>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="<?php echo get_the_title();?> logo">
                            <?php endif; ?>
                            </div>
                            <div class="col-8 resultados__descripcion">
                                <div class="row d-flex flex-direction-column">
                                    <div class="col-12 resultados__titulo mb-1">
                                        <?php echo get_the_title();?>
                                    </div>
                                    <div class="col-12 resultados__telefono">
                                        <strong>Categoría: </strong><?php the_field('category');?>
                                    </div>
                                    <div class="col-12 resultados__telefono">
                                        <strong>Tel: </strong><?php the_field('telefono'); ?>
                                    </div>
                                    <div class="col-12 resultados__telefono">
                                        <strong>Horarios: </strong><?php the_field('horarios');?>
                                    </div>
                                    <div class="col-12 resultados__telefono">
                                        <strong>Local: </strong><?php the_field('local'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    <?php endwhile; else: ?>
                    <?php endif; ?>
                </div>
                <div class="row d-flex resultados-comidas justify-content-center">
                    <?php 
                    $args_busqueda_comidas = array(
                        'posts_per_page'	=> -1,
                        'post_type' => 'comidas',
                        's' => $_POST['busqueda']
                    );
                        
                    $query_busqueda_comidas = new WP_Query($args_busqueda_comidas);
                        
                    if ( $query_busqueda_comidas->have_posts() ) : while ( $query_busqueda_comidas->have_posts() ) : $query_busqueda_comidas->the_post(); ?> 
                        <div class="row col-11 col-lg-6 resultados__informacion d-flex align-items-center">
                            <div class="col-4 col-md-3 resultados__imagen">
                                <?php if (get_field('imagena') != ''): ?>
                                    <img src="<?php the_field('imagena'); ?>" alt="<?php echo get_the_title();?> logo">
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/default.jpg" alt="<?php echo get_the_title();?> logo">
                                <?php endif; ?>
                            </div>
                            <div class="col-8 col-md-9 resultados__descripcion">
                                <div class="row d-flex flex-direction-column">
                                    <div class="col-12 resultados__titulo mb-1">
                                        <?php echo get_the_title();?>
                                    </div>
                                    <div class="col-12 resultados__telefono">
                                        <strong>Categoría: </strong><?php the_field('category');?>
                                    </div>
                                    <div class="col-12 resultados__telefono">
                                        <strong>Tel: </strong><?php the_field('telefono'); ?>
                                    </div>
                                    <div class="col-12 resultados__telefono">
                                        <strong>Horarios: </strong><?php the_field('horarios');?>
                                    </div>
                                    <div class="col-12 resultados__telefono">
                                        <strong>Local: </strong><?php the_field('local'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    <?php endwhile; else: ?>
                    <?php endif; ?>
                </div>
                <p class="resultados__error"><?php echo "No hay resultados para la búsqueda '". $_POST['busqueda'] ."'"; ?></p>
            </div>
            <?php endif; ?>
        </div>

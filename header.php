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
                        <span class="search-button" style="font-size: 22px; color: #777;">
                            <i class="fas fa-search"></i>
                        </span>
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
                            <li class="main-nav__element d-lg-inline-block px-lg-3 px-xl-4"><span class="main-nav__link main-nav__link--scroll" name="cines-anchor">CARTELERA DE CINE</span></li>
                            <li class="main-nav__element d-lg-inline-block px-lg-3 px-xl-4"><span class="main-nav__link main-nav__link--scroll" name="agenda-anchor">AGENDA</span></li>
                            <li class="main-nav__element d-lg-inline-block pl-lg-3 px-xl-4 pr-lg-0"><span class="main-nav__link">¿CÓMO LLEGAR?</span></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="buscador">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <form class="col-12 col-lg-6 d-flex justify-content-center buscador-form">
                        <input type="text" id="fname" name="fname" placeholder="Busca información en el sitio!">
                        <input type="submit" value="buscar">
                    </form>
                </div>
            </div>
        </div>

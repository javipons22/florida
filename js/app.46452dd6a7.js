
jQuery('.mobile-info').hide();
jQuery( "#tienda-category-form" ).submit(function(e) {
    e.preventDefault();
    var val = jQuery(document.activeElement).val();
    var scroll = jQuery(window).scrollTop();
    jQuery("<input name='scroll'/>").attr("type", "hidden").val(scroll).appendTo("#tienda-category-form");
    jQuery("<input name='category_1'/>").attr("type", "hidden").val(val).appendTo("#tienda-category-form");
    jQuery("<input name='category_2'/>").attr("type", "hidden").val(category2).appendTo("#tienda-category-form");
    jQuery("<input name='category_3'/>").attr("type", "hidden").val(category3).appendTo("#tienda-category-form");
    jQuery("<input name='category_4'/>").attr("type", "hidden").val(category4).appendTo("#tienda-category-form");
    e.currentTarget.submit();
});

jQuery( "#tienda-category-form-2" ).submit(function(e) {
    e.preventDefault();
    var val = jQuery(document.activeElement).val();
    var scroll = jQuery(window).scrollTop();
    jQuery("<input name='scroll'/>").attr("type", "hidden").val(scroll).appendTo("#tienda-category-form-2");
    jQuery("<input name='category_1'/>").attr("type", "hidden").val(category1).appendTo("#tienda-category-form-2");
    jQuery("<input name='category_2'/>").attr("type", "hidden").val(val).appendTo("#tienda-category-form-2");
    jQuery("<input name='category_3'/>").attr("type", "hidden").val(category3).appendTo("#tienda-category-form-2");
    jQuery("<input name='category_4'/>").attr("type", "hidden").val(category4).appendTo("#tienda-category-form-2");
    e.currentTarget.submit();
});

jQuery( "#tienda-category-form-3" ).submit(function(e) {
    e.preventDefault();
    var val = jQuery(document.activeElement).val();
    var scroll = jQuery(window).scrollTop();
    jQuery("<input name='scroll'/>").attr("type", "hidden").val(scroll).appendTo("#tienda-category-form-3");
    jQuery("<input name='category_1'/>").attr("type", "hidden").val(category1).appendTo("#tienda-category-form-3");
    jQuery("<input name='category_2'/>").attr("type", "hidden").val(category2).appendTo("#tienda-category-form-3");
    jQuery("<input name='category_3'/>").attr("type", "hidden").val(val).appendTo("#tienda-category-form-3");
    jQuery("<input name='category_4'/>").attr("type", "hidden").val(category4).appendTo("#tienda-category-form-3");
    e.currentTarget.submit();
});

jQuery( "#tienda-category-form-4" ).submit(function(e) {
    e.preventDefault();
    var val = jQuery(document.activeElement).val();
    var scroll = jQuery(window).scrollTop();
    jQuery("<input name='scroll'/>").attr("type", "hidden").val(scroll).appendTo("#tienda-category-form-4");
    jQuery("<input name='category_1'/>").attr("type", "hidden").val(category1).appendTo("#tienda-category-form-4");
    jQuery("<input name='category_2'/>").attr("type", "hidden").val(category2).appendTo("#tienda-category-form-4");
    jQuery("<input name='category_3'/>").attr("type", "hidden").val(category3).appendTo("#tienda-category-form-4");
    jQuery("<input name='category_4'/>").attr("type", "hidden").val(val).appendTo("#tienda-category-form-4");
    e.currentTarget.submit();
});

// jQuery( ".buscador-form" ).submit(function(e) {
//     e.preventDefault();
//     var val = jQuery(document.activeElement).val();
//     e.currentTarget.submit();
// });

let splide;
let padding = {
    right:'1.2rem',
    left :'1.2rem',
}

let padding2 = {
    right:'5rem',
    left :'5rem',
}


document.addEventListener( 'DOMContentLoaded', function () {
    
    

    let splide2 = new Splide( '#banner-slider', {
        width : '100vw',
        type:'loop',
        perPage:1,
        autoplay:true,
        pauseOnHover: false,
        interval: 6000,
        heightRatio:0.4
    });
    let splide6 = new Splide( '#banner-slider-2', {
        width:'100vw',
        type:'loop',
        perPage:1,
        autoplay:true,
        pauseOnHover: false,
        interval: 6000,
        arrows:false,
        heightRatio:1
    });
    let splideObject ={
        // type   :'loop',  
        padding: {
            right:'5rem',
            left :'5rem',
        },
        perPage: 5,
        rewind: true,
        gap: '0.5em',
        autoplay:false,
        pauseOnHover:true,
        pagination:false,
        heightRatio: 0.170,
        padding: { right: '0rem', left: '0rem'},
        breakpoints: {
            '576': {
                perPage: 3,
                gap    : '0em',
                heightRatio: 0.30,
            },
            '767': {
                perPage: 3,
                gap    : '0.5em',
                heightRatio: 0.28,
            },
            '992': {
                perPage: 3,
                gap    : '0.5em',
                heightRatio: 0.280,
            },
            '1200': {
                perPage: 4,
                gap    : '0.5em',
                heightRatio: 0.220,
            },
        }
    };

    splide3 = {};

    splide4 = {};


    // splide5 = new Splide( '#cartelera-slider', {
    //     padding: {
    //         right:'1.2rem',
    //         left :'1.2rem'
    //     },
    //     rewind : true,
    //     autoplay:false,
    //     pauseOnHover:true,
    //     pagination:false,
    //     perPage: 4, 
    //     gap: '1.5em',
    //     heightRatio: 0.35,
    //     breakpoints: {
    //         '576': {
    //             perPage: 1,
    //             gap    : '0em',
    //             heightRatio: 1.05
    //         },
    //         '767': {
    //             heightRatio: 0.75,
    //             perPage: 2,
    //             gap    : '1.2em',
    //         },
    //         '992': {
    //             perPage: 3, 
    //             gap: '1.5em',
    //             heightRatio: 0.45
    //         },
    //         '1200': {
    //             perPage: 4, 
    //             gap: '1.5em', 
    //             heightRatio: 0.35
    //         },
    //     }
        
    // });

    var elms = document.getElementsByClassName( 'multiple-splide' );
    for ( var i = 0, len = elms.length; i < len; i++ ) {
        // let amountOfSlides = jQuery(elms[i]).children("div.amount").attr("valor");
        let objectCopy = JSON.parse(JSON.stringify(splideObject));
        // if (amountOfSlides <= 3) {
        //     objectCopy.breakpoints['576'].clones = 0.1;
        //     objectCopy.breakpoints['768'].clones = 0.1;
        //     objectCopy.drag = false;
        // }
        new Splide( elms[ i ] ,objectCopy).mount();
    }
    splide2.mount();
    // splide3.mount();
    // splide4.mount();
    // splide5.mount();
    splide6.mount();
    // window.scrollTo(0, initialHeight); 
});

if (busqueda) {
    jQuery('.resultados').slideDown();
    let resultsAmount = jQuery('.resultados-comidas, .resultados-marcas').children().length;
    if (resultsAmount == 0) jQuery('.resultados__error').css("display", "block");
}

if (window.innerWidth > 992) {
    var agendaSlides = document.getElementsByClassName( 'agenda-dia' );
    for ( var i = 0, len = agendaSlides.length; i < len; i++ ) {
        if(jQuery(agendaSlides[i]).text().length > 2) {
            jQuery(agendaSlides[i]).css("font-size","60px");
            jQuery(agendaSlides[i]).css("top","61px");
        }
    }
}
if (window.innerWidth < 768) {
    var agendaSlides = document.getElementsByClassName( 'agenda-dia' );
    for ( var i = 0, len = agendaSlides.length; i < len; i++ ) {
        if(jQuery(agendaSlides[i]).text().length > 2) {
            jQuery(agendaSlides[i]).css("font-size","45px");
            jQuery(agendaSlides[i]).css("top","40px");
        }
    }
}
if (window.innerWidth > 768 && window.innerWidth < 992) {
    var agendaSlides = document.getElementsByClassName( 'agenda-dia' );
    for ( var i = 0, len = agendaSlides.length; i < len; i++ ) {
        if(jQuery(agendaSlides[i]).text().length > 2) {
            jQuery(agendaSlides[i]).css("font-size","60px");
            jQuery(agendaSlides[i]).css("top","50px");
        }
    }
}


jQuery('.main-header__button').on('click', function() {
    jQuery('.hamburger-menu').toggleClass('animate');
    jQuery('.buscador').slideToggle();
    jQuery('.main-nav, .social-nav').slideToggle();
    jQuery('.resultados').slideUp();
});
jQuery('.resultados__boton-cerrar').on('click', function() {
    jQuery('.resultados').slideUp();
});

jQuery('.resultados__boton-cerrar--laptop').on('click', function() {
    jQuery('.resultados').fadeOut();
});

// jQuery('.search-button').on('click', function() {
//     jQuery('.buscador').slideToggle();
//     jQuery('.resultados').slideUp();
//     jQuery('.main-nav, .social-nav').slideUp();
// });
jQuery('.category-select-button--1').on('click', function() {
    jQuery('#tienda-category-form').slideToggle();
});
jQuery('.category-select-button--2').on('click', function() {
    jQuery('#tienda-category-form-2').slideToggle();
});
jQuery('.category-select-button--3').on('click', function() {
    jQuery('#tienda-category-form-3').slideToggle();
});
jQuery('.category-select-button--4').on('click', function() {
    jQuery('#tienda-category-form-4').slideToggle();
});
if (window.innerWidth > 576) {
    jQuery(".splide__slide--selected").prependTo(".cartelera__list");
}
jQuery(window).on("load", () => {
    jQuery(".loader-container").fadeOut();
});
jQuery('.main-nav__link--scroll').on('click', function() {
    jQuery('.main-nav, .social-nav').slideToggle();
    jQuery('.hamburger-menu').toggleClass('animate');
    var scrollTo = this.getAttribute("name");
    var elmnt = document.getElementById(scrollTo);
    if (window.innerWidth < 995) {
        elmnt.scrollIntoView({ block:'center',  behavior: 'smooth', inline: 'center' });
    } else {
        elmnt.scrollIntoView({ block:'start',  behavior: 'smooth', inline: 'start' });
    }
});

jQuery('.main-nav__link--scroll-up').on('click', function() {
    let scrollTo = this.getAttribute("name");
    let elmnt = document.getElementById(scrollTo);
    if (window.innerWidth < 995) {
        window.scrollTo({top: 0, behavior: 'smooth'});
    } else {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
});

jQuery('.splide__slide--info').on('click', function() {
    let titulo = this.getAttribute("titulo");
    let telefono = this.getAttribute("telefono");
    let horarios = this.getAttribute("horarios");
    let local = this.getAttribute("local");
    let descripcion = this.getAttribute("descripcion");
    let genero = this.getAttribute("genero");
    let clasificacion = this.getAttribute("clasificacion");
    let elementosArray = [
        {name: 'titulo', value: titulo},
        {name: 'telefono', value: telefono},
        {name: 'horarios', value: horarios},
        {name: 'local', value: local},
        {name: 'descripcion', value: descripcion},
        {name: 'genero', value: genero},
        {name: 'clasificacion', value: clasificacion}
    ];
    elementosArray.forEach((elemento)=>{
        if (!elemento.value) {
            jQuery(`.mobile-info__${elemento.name}`).text(elemento.value);
            jQuery(`.mobile-info__${elemento.name}`).css("display", "none");
            jQuery(`.mobile-info__${elemento.name}-titulo`).css("display", "none");
            jQuery(`.mobile-info__${elemento.name}-titulo`).css("margin-top", "0px");
        } else {
            jQuery(`.mobile-info__${elemento.name}`).css("display", "block");
            jQuery(`.mobile-info__${elemento.name}`).text(elemento.value);
            jQuery(`.mobile-info__${elemento.name}-titulo`).css("display", "block");
            jQuery(`.mobile-info__${elemento.name}-titulo`).css("margin-top", "10px");
        }
        
    })
    // jQuery('.mobile-info__main-titulo').text(titulo);
    // jQuery('.mobile-info__telefono').text(telefono);
    // jQuery('.mobile-info__horarios').text(horarios);
    // jQuery('.mobile-info__local').text(local);
    if (window.innerWidth < 768) {
        jQuery('.mobile-info').fadeIn();
        jQuery('.mobile-info').css("display","flex");
    }
});

jQuery('.mobile-info').on('click', function() {
    jQuery('.mobile-info').fadeOut();
});



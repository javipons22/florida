

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
        height: '80vh',
        type:'loop',
        perPage:1,
        autoplay:true,
        pauseOnHover: false,
        interval: 6000
    });
    splide = new Splide( '#marcas-slider', {
        type   :'loop',
        padding: {
            right:'5rem',
            left :'5rem',
        },
        autoplay:true,
        pauseOnHover:true,
        pagination:true,
    });

    splide3 = new Splide( '#comidas-slider', {
        type   :'loop',
        padding: {
            right:'5rem',
            left :'5rem',
        },
        autoplay:true,
        pauseOnHover:true,
        pagination:true,
    });
    // splide4 = new Splide( '#agendas-slider', {
    //     type   :'loop',
    //     padding: {
    //         right:'5rem',
    //         left :'5rem',
    //     },
    //     autoplay:true,
    //     pauseOnHover:true,
    //     pagination:true,
    // });

    splide4 = {};

    splide5 = new Splide( '#cartelera-slider', {
        padding: {
            right:'1.2rem',
            left :'1.2rem',
        },
        rewind : true,
        perPage:1,
        autoplay:false,
        pauseOnHover:true,
        pagination:true,
    });

    if (window.innerWidth < 576) {
        splide.options = { perPage: 1, gap: '1em'};
        splide.options.padding = { right: '1rem', left: '1rem'}
        splide3.options = { perPage: 1, gap: '1em'};
        splide3.options.padding = { right: '1rem', left: '1rem'}
        splide4.options = { perPage: 1, gap: '1em'};
        splide4.options.padding = { right: '1rem', left: '1rem'}
        splide5.options = { perPage: 1, gap: '1em'};
        splide5.options.padding = { right: '1rem', left: '1rem'}
    } else if (window.innerWidth > 576 && window.innerWidth < 768) {
        splide.options = { perPage: 2, gap: '0.5em'};
        splide3.options = { perPage: 2, gap: '0.5em'};
        splide4.options = { perPage: 2, gap: '0.5em'};
        splide5.options = { perPage: 2, gap: '1.2em'};
    } else if (window.innerWidth > 768 && window.innerWidth < 992) {
        splide.options = { perPage: 3, gap: '0.5em'};
        splide3.options = { perPage: 3, gap: '0.5em'};
        splide4.options = { perPage: 3, gap: '0.5em'};
        splide5.options = { perPage: 3, gap: '1.5em'};
    } else if (window.innerWidth > 992 && window.innerWidth < 1200) {
        splide.options = { perPage: 3, gap: '0.5em'}; 
        splide3.options = { perPage: 3, gap: '0.5em'};
        splide4.options = { perPage: 3, gap: '0.5em'};
        splide5.options = { perPage: 4, gap: '1.5em'}; 
    } else if (window.innerWidth > 1200) {
        splide.options = { perPage: 4, gap: '0.5em'};
        splide3.options = { perPage: 4, gap: '0.5em'};
        splide4.options = { perPage: 4, gap: '0.5em'};
        splide5.options = { perPage: 4, gap: '1.5em'};
    }
    splide.mount();
    splide2.mount();
    splide3.mount();
    // splide4.mount();
    splide5.mount();
    if (window.innerWidth < 576) {
        if (currMovie > 0) {
            splide5.go('+' + currMovie,false);
        }
        
    }
    window.scrollTo(0, initialHeight); 
});


const changeSize = () => {
    if (window.innerWidth < 576) {
        splide.options.perPage = 1;
        splide.options.gap = '1em';
        splide.options.padding = { right: '1rem', left: '1rem'};

        splide3.options.perPage = 1;
        splide3.options.gap = '1em';
        splide3.options.padding = { right: '1rem', left: '1rem'};

        splide4.options.perPage = 1;
        splide4.options.gap = '1em';
        splide4.options.padding = { right: '1rem', left: '1rem'};

        splide5.options.perPage = 1;
        splide5.options.gap = '1em';
        splide5.options.padding = { right: '1rem', left: '1rem'};
        // splide.options = { perPage: 1, gap: '0.8em',type: 'fade' , padding: {right: '1em',left:'1em'} };
    } else if (window.innerWidth > 576 && window.innerWidth < 768) {
        splide.options = { perPage: 2, gap: '0.5em'};
        splide.options.padding = padding;

        splide3.options = { perPage: 2, gap: '0.5em'};
        splide3.options.padding = padding;

        splide4.options = { perPage: 2, gap: '0.5em'};
        splide4.options.padding = padding;

        splide5.options = { perPage: 2, gap: '1.5em'};
        splide5.options.padding = padding;
    } else if (window.innerWidth > 768 && window.innerWidth < 992) {
        splide.options = { perPage: 3, gap: '0.5em'};
        splide.options.padding = padding;

        splide3.options = { perPage: 3, gap: '0.5em'};
        splide3.options.padding = padding;

        splide4.options = { perPage: 3, gap: '0.5em'};
        splide4.options.padding = padding;

        splide5.options = { perPage: 3, gap: '1.5em'};
        splide5.options.padding = padding;
    } else if (window.innerWidth > 992 && window.innerWidth < 1200) {
        splide.options = { perPage: 3, gap: '0em'};
        splide.options.padding = padding; 

        splide3.options = { perPage: 3, gap: '0em'};
        splide3.options.padding = padding; 

        splide4.options = { perPage: 3, gap: '0em'};
        splide4.options.padding = padding; 

        splide5.options = { perPage: 3, gap: '1.5em'};
        splide5.options.padding = padding;
    } else if (window.innerWidth > 1200) {
        splide.options = { perPage: 4, gap: '0em'};
        splide.options.padding = padding2;

        splide3.options = { perPage: 4, gap: '0em'};
        splide3.options.padding = padding2;

        splide4.options = { perPage: 4, gap: '0em'};
        splide4.options.padding = padding;

        splide5.options = { perPage: 3, gap: '1.5em'};
        splide5.options.padding = padding;
    }

};

jQuery(document).ready(function($){
    $('.main-nav, .social-nav').hide();
    $('.main-header__button').on('click', function() {
        $('.hamburger-menu').toggleClass('animate');
        $('.main-nav, .social-nav').slideToggle();
    });
    $('.category-select-button--1').on('click', function() {
        $('#tienda-category-form').slideToggle();
    });
    $('.category-select-button--2').on('click', function() {
        $('#tienda-category-form-2').slideToggle();
    });
    $('.category-select-button--3').on('click', function() {
        $('#tienda-category-form-3').slideToggle();
    });
    if (window.innerWidth > 576) {
        $(".splide__slide--selected").prependTo(".cartelera__list");
    }
    
    //$('.fondo').css('height',10 + 'px');
});



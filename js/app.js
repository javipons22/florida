

jQuery( "#tienda-category-form" ).submit(function(e) {
    e.preventDefault();
    var val = jQuery(document.activeElement).val();
    var scroll = jQuery(window).scrollTop();
    console.log(val,scroll);
    jQuery("<input name='scroll'/>").attr("type", "hidden").val(scroll).appendTo("#tienda-category-form");
    jQuery("<input name='category_1'/>").attr("type", "hidden").val(val).appendTo("#tienda-category-form");
    e.currentTarget.submit();
});

let splide;
let padding = {
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
    if (window.innerWidth < 576) {
        splide.options = { perPage: 1, gap: '1em'};
        splide.options.padding = { right: '1rem', left: '1rem'}
    } else if (window.innerWidth > 576 && window.innerWidth < 768) {
        splide.options = { perPage: 2, gap: '0.5em'};
    } else if (window.innerWidth > 768 && window.innerWidth < 992) {
        splide.options = { perPage: 3, gap: '0.5em'};
    } else if (window.innerWidth > 992 && window.innerWidth < 1200) {
        splide.options = { perPage: 3, gap: '0.5em'}; 
    } else if (window.innerWidth > 1200) {
        splide.options = { perPage: 4, gap: '0.5em'};
    }
    splide.mount();
    splide2.mount();
    window.scrollTo(0, initialHeight); 
});


const changeSize = () => {
    if (window.innerWidth < 576) {
        splide.options.perPage = 1;
        splide.options.gap = '1em';
        splide.options.padding = { right: '1rem', left: '1rem'}
        // splide.options = { perPage: 1, gap: '0.8em',type: 'fade' , padding: {right: '1em',left:'1em'} };
    } else if (window.innerWidth > 576 && window.innerWidth < 768) {
        splide.options = { perPage: 2, gap: '0.5em'};
        splide.options.padding = padding;
    } else if (window.innerWidth > 768 && window.innerWidth < 992) {
        splide.options = { perPage: 3, gap: '0.5em'};
        splide.options.padding = padding;
    } else if (window.innerWidth > 992 && window.innerWidth < 1200) {
        splide.options = { perPage: 3, gap: '0em'};
        splide.options.padding = padding; 
    } else if (window.innerWidth > 1200) {
        splide.options = { perPage: 4, gap: '0em'};
        splide.options.padding = padding;
    }

};

jQuery(document).ready(function($){
    $('.main-nav, .social-nav').hide();
    $('.main-header__button').on('click', function() {
        $('.hamburger-menu').toggleClass('animate');
        $('.main-nav, .social-nav').slideToggle();
        //$('nav').slideToggle();
        //$('nav').animate({width:'toggle'},350);
    });
    $('.category-select-button').on('click', function() {
        console.log("ok");
        $('#tienda-category-form').slideToggle();
        //$('nav').slideToggle();
        //$('nav').animate({width:'toggle'},350);
    });
    
    //$('.fondo').css('height',10 + 'px');
});



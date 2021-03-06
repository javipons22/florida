

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
    let splide6 = new Splide( '#banner-slider-2', {
        width : '100vw',
        height: '100vw',
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
        pagination:false,
    });

    splide3 = new Splide( '#comidas-slider', {
        type   :'loop',
        padding: {
            right:'5rem',
            left :'5rem',
        },
        autoplay:true,
        pauseOnHover:true,
        pagination:false,
    });

    splide4 = new Splide( '#agenda-slider', {
        type   :'loop',
        padding: {
            right:'5rem',
            left :'5rem',
        },
        autoplay:true,
        pauseOnHover:true,
        pagination:false,
    });


    splide5 = new Splide( '#cartelera-slider', {
        padding: {
            right:'1.2rem',
            left :'1.2rem',
        },
        rewind : true,
        perPage:1,
        autoplay:false,
        pauseOnHover:true,
        pagination:false,
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
        splide.options = { perPage: 2, gap: '0.5em'};
        splide3.options = { perPage: 2, gap: '0.5em'};
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
    splide4.mount();
    splide5.mount();
    splide6.mount();
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
        splide.options = { perPage: 2, gap: '0.5em'};
        splide.options.padding = padding;

        splide3.options = { perPage: 2, gap: '0.5em'};
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

        splide5.options = { perPage: 4, gap: '1.5em'};
        splide5.options.padding = padding;
    }

};


jQuery('.main-nav, .social-nav').hide();
jQuery('.main-header__button').on('click', function() {
    jQuery('.hamburger-menu').toggleClass('animate');
    jQuery('.main-nav, .social-nav').slideToggle();
});
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
    console.log("OK")
    jQuery('#tienda-category-form-4').slideToggle();
});
if (window.innerWidth > 576) {
    jQuery(".splide__slide--selected").prependTo(".cartelera__list");
}
jQuery(window).on("load", () => {
    console.log("Ok");
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


let splide;
let padding = {
    right:'5rem',
    left :'5rem',
}

document.addEventListener( 'DOMContentLoaded', function () {
    splide = new Splide( '.splide', {
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
        splide.options = { perPage: 1, gap: '0.8em'};
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
});

const run = (element) => {
    console.log(element);
}

const changeSize = () => {
    if (window.innerWidth < 576) {
        splide.options.perPage = 1;
        splide.options.padding = { right: '1rem', left: '1rem'}
        // splide.options = { perPage: 1, gap: '0.8em',type: 'fade' , padding: {right: '1em',left:'1em'} };
    } else if (window.innerWidth > 576 && window.innerWidth < 768) {
        splide.options = { perPage: 2, gap: '0.5em'};
        splide.options.padding = padding;
    } else if (window.innerWidth > 768 && window.innerWidth < 992) {
        splide.options = { perPage: 3, gap: '0.5em'};
        splide.options.padding = padding;
    } else if (window.innerWidth > 992 && window.innerWidth < 1200) {
        splide.options = { perPage: 3, gap: '0.5em'};
        splide.options.padding = padding; 
    } else if (window.innerWidth > 1200) {
        splide.options = { perPage: 4, gap: '0.5em'};
        splide.options.padding = padding;
    }

};
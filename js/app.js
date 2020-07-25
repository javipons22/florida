document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '.splide', {
        type   :'loop',
        padding: {
            right:'5rem',
            left :'5rem',
        },
        perPage: 3,
        gap: '1.5em',
        autoplay:true,
        pauseOnHover:true,
        pagination:true,
    }).mount();
});

const run = (element) => {
    console.log(element);
}
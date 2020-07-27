<?php 

function wpt_theme_styles() { 
	// wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'splide_css' , get_template_directory_uri() . '/node_modules/@splidejs/splide/dist/css/themes/splide-sea-green.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

function wpt_theme_js() {
	// wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . 'js/modernizr.js', '' , '' , false );//el ultimo parametro es dependence , version y si debe aparecer en el footer(false)
	wp_enqueue_script('splide_js', get_template_directory_uri() . '/node_modules/@splidejs/splide/dist/js/splide.min.js', array('jquery') , '' , true);
	wp_enqueue_script('main_js', get_template_directory_uri() . '/js/app.js', array('jquery') , '' , true);

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );

?>
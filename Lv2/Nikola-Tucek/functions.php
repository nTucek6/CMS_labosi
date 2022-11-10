<?php
if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
function inicijaliziraj_temu()
{

add_theme_support( 'post-thumbnails' );
//add_theme_support( 'custom-header'); //,2000,1000,true

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

add_theme_support( 'custom-background', apply_filters(
'test_custom_background_args', array(
'default-color' => 'ffffff',
'default-image' => '',
) ) );
add_theme_support( 'customize-selective-refresh-widgets' );
}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );
// regsitracija sidebar-a


/*
function custom_header_setup() {
	$args = array(
		'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
		'default-text-color' => '000',
		'width'              => 1000,
		'height'             => 250,
		'flex-width'         => true,
		'flex-height'        => true,
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'custom_header_setup' ); */



function aktiviraj_sidebar()
{
register_sidebar(
    array (
    'name' => "Glavni sidebar",
    'id' => 'glavni-sidebar',
    'description' => "Glavni sidebar",
    'before_widget' => '<div class="widget-content">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    )
    );
    register_sidebar(
        array (
        'name' => "Footer sidebar 1",
        'id' => 'footer-sidebar1',
        'description' => "Footer sidebar 1",
        'before_widget' => '<div class="widget-content col-md-3 FooterSidebar">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title FooterSidebar">',
        'after_title' => '</h3>',
        )
        );
        register_sidebar(
            array (
            'name' => "Footer sidebar 2",
            'id' => 'footer-sidebar2',
            'description' => "Footer sidebar 2",
            'before_widget' => '<div class="widget-content col-md-3">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title FooterSidebar">',
            'after_title' => '</h3>',
            )
            );
            register_sidebar(
                array (
                'name' => "Footer sidebar 3",
                'id' => 'footer-sidebar3',
                'description' => "Footer sidebar 3",
                'before_widget' => '<div class="widget-content col-md-3 ">',
                'after_widget' => "</div>",
                'before_title' => '<h3 class="widget-title FooterSidebar">',
                'after_title' => '</h3>',
                )
                );
                register_sidebar(
                    array (
                    'name' => "Footer sidebar 4",
                    'id' => 'footer-sidebar4',
                    'description' => "Footer sidebar 4",
                    'before_widget' => '<div class="widget-content col-md-3 ">',
                    'after_widget' => "</div>",
                    'before_title' => '<h3 class="widget-title FooterSidebar">',
                    'after_title' => '</h3>',
                    )
                    );


}
add_action( 'widgets_init', 'aktiviraj_sidebar' );
//učitavanje CSS datoteke
function ucitaj_glavni_css()
{
wp_enqueue_style( 'glavni-css', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
}
add_action( 'wp_enqueue_scripts', 'ucitaj_glavni_css' );
//učitavanje javascript datoteke

function ucitaj_glavni_js()
{
/*
=== VAŽNO ===
Prije upisivanja linije ispod potrebno je kreirati direktorij js i u njemu
kreirati datoteku skripta.js.
*/
wp_enqueue_script('glavni-js', get_template_directory_uri().'/js/skripta.js' ,
array('jquery'),false, true);
wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.bundle.min.js','4.6.0',true); // , $dependencies
}

add_action( 'wp_enqueue_scripts', 'ucitaj_glavni_js', 1 );

function register_navwalker(){
	if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        // File does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // File exists... require it.
        require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
    }
}
add_action( 'after_setup_theme', 'register_navwalker' );
?>
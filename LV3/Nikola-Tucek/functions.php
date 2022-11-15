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

function registriraj_nastavnik_cpt() {
    $labels = array(
    'name' => _x( 'Nastavnici', 'Post Type General Name', 'vuv' ),
    'singular_name' => _x( 'Nastavnik', 'Post Type Singular Name', 'vuv' ),
    'menu_name' => __( 'Nastavnici', 'vuv' ),
    'name_admin_bar' => __( 'Nastavnici', 'vuv' ),
    'archives' => __( 'Nastavnici arhiva', 'vuv' ), // naziv za arhivu
    'attributes' => __( 'Atributi', 'vuv' ),
    'parent_item_colon' => __( 'Roditeljski element', 'vuv' ),
    'all_items' => __( 'Svi nastavnici', 'vuv' ),
    'add_new_item' => __( 'Dodaj novoga nastavnika', 'vuv' ),
    'add_new' => __( 'Dodaj novi', 'vuv' ),
    'new_item' => __( 'Novi nastavnik', 'vuv' ),
    'edit_item' => __( 'Uredi nastavnika', 'vuv' ),
    'update_item' => __( 'Ažuriraj nastavnika', 'vuv' ),
    'view_item' => __( 'Pogledaj nastavnika', 'vuv' ),
    'view_items' => __( 'Pogledaj nastavnike', 'vuv' ),
    'search_items' => __( 'Pretraži nastavnike', 'vuv' ),
    'not_found' => __( 'Nije pronađeno', 'vuv' ),
    'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vuv' ),
    'featured_image' => __( 'Glavna slika', 'vuv' ),
    'set_featured_image' => __( 'Postavi glavnu sliku', 'vuv' ),
    'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vuv' ),
    'use_featured_image' => __( 'Postavi za glavnu sliku', 'vuv' ),
    'insert_into_item' => __( 'Umentni', 'vuv' ),
    'uploaded_to_this_item' => __( 'Preneseno', 'vuv' ),
    'items_list' => __( 'Lista', 'vuv' ),
    'items_list_navigation' => __( 'Navigacija među nastanvicima', 'vuv' ),
    'filter_items_list' => __( 'Filtriranje nastavnika', 'vuv' ),
    );
    $args = array(
    'label' => __( 'Nastavnik', 'vuv' ),
    'description' => __( 'Nastavnik post type', 'vuv' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-groups',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => false,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page',
    );
    register_post_type( 'nastavnik', $args );
    }
    add_action( 'init', 'registriraj_nastavnik_cpt', 0 );

    function registriraj_taksonomiju_naslovno_zvanje() {
        $labels = array(
        'name' => _x( 'Naslovna zvanja', 'Taxonomy General Name',
        'vuv' ),
        'singular_name' => _x( 'Naslovno zvanje', 'Taxonomy Singular Name',
        'vuv' ),
        'menu_name' => __( 'Naslovna zvanja', 'vuv' ),
        'all_items' => __( 'Sva naslovna zvanja', 'vuv' ),
        'parent_item' => __( 'Roditeljsko zvanje', 'vuv' ),
        'parent_item_colon' => __( 'Roditeljsko zvanje', 'vuv' ),
        'new_item_name' => __( 'Novo naslovno zvanje', 'vuv' ),
        'add_new_item' => __( 'Dodaj novo naslovno zvanje', 'vuv' ),
        'edit_item' => __( 'Uredi naslovno zvanje', 'vuv' ),
        'update_item' => __( 'Ažuiriraj naslovno zvanje', 'vuv' ),
        'view_item' => __( 'Pogledaj naslovno zvanje', 'vuv' ),
        'separate_items_with_commas' => __( 'Odvojite zvanja sa zarezima', 'vuv' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni naslovno zvanje', 'vuv' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vuv' ),
        'popular_items' => __( 'Popularna naslovna zvanja', 'vuv' ),
        'search_items' => __( 'Pretraga', 'vuv' ),
        'not_found' => __( 'Nema rezultata', 'vuv' ),
        'no_terms' => __( 'Nema naslovnih zvanja', 'vuv' ),
        'items_list' => __( 'Lista naslovnih zvanja', 'vuv' ),
        'items_list_navigation' => __( 'Navigacija', 'vuv' ),
        );
        $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        );
        register_taxonomy( 'naslovno_zvanje', array( 'nastavnik' ), $args );
        }
        add_action( 'init', 'registriraj_taksonomiju_naslovno_zvanje', 0 );

//Predmet cpt

function registriraj_predmet_cpt() {
    $labels = array(
    'name' => _x( 'Predmeti', 'Post Type General Name', 'vuv' ),
    'singular_name' => _x( 'Nastavnik', 'Post Type Singular Name', 'vuv' ),
    'menu_name' => __( 'Predmeti', 'vuv' ),
    'name_admin_bar' => __( 'Predmeti', 'vuv' ),
    'archives' => __( 'Predmeti', 'vuv' ), //naziv arhive u navigaciji
    'attributes' => __( 'Atributi', 'vuv' ),
    'parent_item_colon' => __( 'Roditeljski element', 'vuv' ),
    'all_items' => __( 'Svi predmeti', 'vuv' ),
    'add_new_item' => __( 'Dodaj novi predmet', 'vuv' ),
    'add_new' => __( 'Dodaj novi', 'vuv' ),
    'new_item' => __( 'Novi predmet', 'vuv' ),
    'edit_item' => __( 'Uredi predmet', 'vuv' ),
    'update_item' => __( 'Ažuriraj predmet', 'vuv' ),
    'view_item' => __( 'Pogledaj predmet', 'vuv' ),
    'view_items' => __( 'Pogledaj predmet', 'vuv' ),
    'search_items' => __( 'Pretraži predmet', 'vuv' ),
    'not_found' => __( 'Nije pronađeno', 'vuv' ),
    'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vuv' ),
    'featured_image' => __( 'Glavna slika', 'vuv' ),
    'set_featured_image' => __( 'Postavi glavnu sliku', 'vuv' ),
    'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vuv' ),
    'use_featured_image' => __( 'Postavi za glavnu sliku', 'vuv' ),
    'insert_into_item' => __( 'Umentni', 'vuv' ),
    'uploaded_to_this_item' => __( 'Preneseno', 'vuv' ),
    'items_list' => __( 'Lista', 'vuv' ),
    'items_list_navigation' => __( 'Navigacija među predmetima', 'vuv' ),
    'filter_items_list' => __( 'Filtriranje predmeta', 'vuv' ),
    );
    $args = array(
    'label' => __( 'Predmet', 'vuv' ),
    'description' => __( 'Predmet post type', 'vuv' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-groups',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => false,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page',
    );
    register_post_type( 'predmet', $args );
    }
    add_action( 'init', 'registriraj_predmet_cpt', 0 );

    function registriraj_taksonomiju_godina() {
        $labels = array(
        'name' => _x( 'Godina predmeta', 'Taxonomy General Name',
        'vuv' ),
        'singular_name' => _x( 'Godina', 'Taxonomy Singular Name',
        'vuv' ),
        'menu_name' => __( 'Godina predmeta', 'vuv' ),
        'all_items' => __( 'Svi predmeti', 'vuv' ),
        'parent_item' => __( 'Roditeljsko zvanje', 'vuv' ),
        'parent_item_colon' => __( 'Roditeljsko zvanje', 'vuv' ),
        'new_item_name' => __( 'Novi predmet', 'vuv' ),
        'add_new_item' => __( 'Dodaj novi predmet', 'vuv' ),
        'edit_item' => __( 'Uredi predmet', 'vuv' ),
        'update_item' => __( 'Ažuiriraj predmet', 'vuv' ),
        'view_item' => __( 'Pogledaj predmet', 'vuv' ),
        'separate_items_with_commas' => __( 'Odvojite predmete sa zarezima', 'vuv' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni naslovno zvanje', 'vuv' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vuv' ),
        'popular_items' => __( 'Popularni predmeti', 'vuv' ),
        'search_items' => __( 'Pretraga', 'vuv' ),
        'not_found' => __( 'Nema rezultata', 'vuv' ),
        'no_terms' => __( 'Nema predmeta', 'vuv' ),
        'items_list' => __( 'Lista predmeta', 'vuv' ),
        'items_list_navigation' => __( 'Navigacija', 'vuv' ),
        );
        $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        );
        register_taxonomy( 'godina_taxonomy', array( 'predmet' ), $args );
        }
        add_action( 'init', 'registriraj_taksonomiju_godina', 0 );


      function registriraj_taksonomiju_semestar()
      {
        $labels = array(
            'name' => _x( 'Semestar predmeta', 'Taxonomy General Name',
            'vuv' ),
            'singular_name' => _x( 'Semestar', 'Taxonomy Singular Name',
            'vuv' ),
            'menu_name' => __( 'Semestar predmeta', 'vuv' ),
            'all_items' => __( 'Svi semestri', 'vuv' ),
            'parent_item' => __( 'Roditeljsko zvanje', 'vuv' ),
            'parent_item_colon' => __( 'Roditeljsko zvanje', 'vuv' ),
            'new_item_name' => __( 'Novi semestar', 'vuv' ),
            'add_new_item' => __( 'Dodaj novi semestar', 'vuv' ),
            'edit_item' => __( 'Uredi semestar', 'vuv' ),
            'update_item' => __( 'Ažuiriraj semestar', 'vuv' ),
            'view_item' => __( 'Pogledaj semestar', 'vuv' ),
            'separate_items_with_commas' => __( 'Odvojite semestre sa zarezima', 'vuv' ),
            'add_or_remove_items' => __( 'Dodaj ili ukloni semestar', 'vuv' ),
            'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vuv' ),
            'popular_items' => __( 'Popularni semestri', 'vuv' ),
            'search_items' => __( 'Pretraga', 'vuv' ),
            'not_found' => __( 'Nema rezultata', 'vuv' ),
            'no_terms' => __( 'Nema semestara', 'vuv' ),
            'items_list' => __( 'Lista semestara', 'vuv' ),
            'items_list_navigation' => __( 'Navigacija', 'vuv' ),
            );
            $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            );
            register_taxonomy( 'semestar_taxonomy', array( 'predmet' ), $args );

      }
      add_action( 'init', 'registriraj_taksonomiju_semestar', 0 );


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


function daj_nastavnike( $slug )
{
$args = array(
'posts_per_page' => -1,
'post_type' => 'nastavnik',
'post_status' => 'publish',
'tax_query' => array(
array(
'taxonomy' => 'naslovno_zvanje',
'field' => 'slug',
'terms' => $slug
)
));
$nastavnici = get_posts( $args );
$sHtml = "<ul>";
foreach ($nastavnici as $nastavnik)
{
$sNastavnikUrl = $nastavnik->guid;
$sNastavnikNaziv = $nastavnik->post_title;
$sHtml .= '<li><a href="'.$sNastavnikUrl.'">'.$sNastavnikNaziv.'</a></li>';
}
$sHtml .= "</ul>";
return $sHtml;
}

function daj_predmete( $slug_godina, $slug_semestar)
{
$args = array(
'posts_per_page' => -1,
'post_type' => 'predmet',
'post_status' => 'publish',
'tax_query' => array(
array(
'taxonomy' => 'godina_taxonomy',
'field' => 'slug',
'terms' => $slug_godina
),
array(
    'taxonomy' => 'semestar_taxonomy',
    'field' => 'slug',
    'terms' => $slug_semestar
    )
));
$predmeti = get_posts( $args );
$sHtml = "<ul>";
foreach ($predmeti as $predmet)
{
$spredmetUrl = $predmet->guid;
$spredmetNaziv = $predmet->post_title;
$sHtml .= '<li><a href="'.$spredmetUrl.'">'.$spredmetNaziv.'</a></li>';
}
$sHtml .= "</ul>";
return $sHtml;
}


function return_termSlug($post,$taxonomy)
{
$terms = wp_get_post_terms( $post->ID, $taxonomy );
$term = "-";
if(sizeof($terms)>0)
{
 return $terms[0]->slug;
}

}



function return_term($post,$taxonomy)
{
$terms = wp_get_post_terms( $post->ID, $taxonomy );
$term = "-";
if(sizeof($terms)>0)
{
 return $term = $terms[0]->name;
}

}



?>
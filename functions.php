<?php

require( get_template_directory() . '/inc/base.class.php' );



/* Add ReduxFramework. */
if(!class_exists('ReduxFramework')){
    require( get_template_directory() . '/inc/ReduxCore/framework.php' );
}

/* Add theme options. */
require( get_template_directory() . '/inc/options/functions.php' );

/* Add SCSS */
if(!class_exists('scssc')){
    require( get_template_directory() . '/inc/ReduxCore/inc/scssphp/scss.inc.php' );
}


/**
 * Konfiguracja
 * @since ICF WOOD
 */
function icf_wood() {
	load_theme_textdomain( 'icfwood', get_template_directory() . '/languages' );

	add_theme_support( "title-tag" );

	add_theme_support( 'custom-header' );

	register_nav_menu( 'primary', esc_html__( 'Główne menu', 'icfwood' ) );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 );
}
add_action( 'after_setup_theme', 'icf_wood' );


add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {

  if( in_array( 'current-menu-item', $classes ) ||
    in_array( 'current-menu-ancestor', $classes ) ||
    in_array( 'current-menu-parent', $classes ) ||
    in_array( 'current_page_parent', $classes ) ||
    in_array( 'current_page_ancestor', $classes )
    ) {

    $classes[] = "current";
  }

  return $classes;
}
/**
 * Pole podtytułu we wpisach
 */
function icf_add_subtitle_field() {
	global $post, $icf_meta;

	$screen = get_current_screen();

	if(in_array($screen->id, array('post'))) {
		$value = get_post_meta($post->ID, 'post_subtitle', true);

		echo '<div class="subtitle"><input type="text" name="post_subtitle" value="' . esc_attr($value) . '" id="subtitle" placeholder="' . esc_html__('Subtitle', 'icfwood') . '" style="width: 100%;margin-top: 4px;"></div>';
	}
}

function icf_searchfilter($query) {
	if ($query->is_search && !is_admin() ) {
		$query->set('post_type', array('post', 'oferty'));
	}
	return $query;
}
add_filter('pre_get_posts', 'icf_searchfilter');


if( function_exists('icf_image_resize')) {
	function icf_post_thumbnail($width = null, $height = null, $crop = null, $single = true, $upscale = true) {
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
		$url = icf_image_resize($image_url[0], $width, $height, $crop, $single, $upscale);
		return do_shortcode('<img src="' . esc_url($url) . '" alt="' . get_the_title() . '" />');
	}
}


if( !function_exists('icf_custom_admin_styles')) {
	function icf_custom_admin_styles() {
		?>
		<style type="text/css">
			#redux_rAds, .rAds {
				display: none !important;
				opacity: 0;
				height: 0;
			}
		</style>
	<?php
	}
}
add_action( 'admin_head', 'icf_custom_admin_styles');

function icf_scripts_styles() {
	global $smof_data, $wp_styles, $wp_scripts, $icf_meta;

	/* ---------------------LIBS--------------------- */
	/* CSS */
	wp_enqueue_style( 'icf-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array() );
	wp_enqueue_style( 'icf-static', get_template_directory_uri() . '/assets/css/static.css', array() );
	wp_enqueue_style( 'icf-swiper', get_template_directory_uri() . '/assets/css/swiper.css', array() );
	wp_enqueue_style( 'icf-wood', get_template_directory_uri() . '/assets/css/icf.css', array() );
	wp_enqueue_style( 'icf-dark', get_template_directory_uri() . '/assets/css/dark.css', array() );
	wp_enqueue_style( 'icf-font-icons', get_template_directory_uri() . '/assets/css/font-icons.css', array() );
	wp_enqueue_style( 'icf-animate', get_template_directory_uri() . '/assets/css/animate.css', array() );
	wp_enqueue_style( 'icf-magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array() );
	wp_enqueue_style( 'icf-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array() );
	wp_enqueue_style( 'icf-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array() );
	wp_enqueue_style( 'icf-colors', get_template_directory_uri() . '/assets/css/colors.css', array() );
	
	/* JavaScript */
	wp_enqueue_script('icf-jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), null, true );
	wp_enqueue_script('icf-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), null, true );
	wp_register_script('googlemaps', 'http://maps.googleapis.com/maps/api/js?', array(), null, true);
	wp_enqueue_script('googlemaps');
	wp_enqueue_script('icf-jquery-gmap', get_template_directory_uri() . '/assets/js/jquery.gmap.js', array(), null, true );
	wp_enqueue_script('icf-functions', get_template_directory_uri() . '/assets/js/functions.js', array(), null, true );


}
add_action( 'wp_enqueue_scripts', 'icf_scripts_styles' );

function icf_main_class(){
    global $icf_meta;

    $main_class = '';
    /* chect content full width */
    if(is_page() && isset($icf_meta->_icf_full_width) && $icf_meta->_icf_full_width){
        /* full width */
        $main_class = "container-fluid";
    } else {
        /* boxed */
        $main_class = "container";
    }

    echo apply_filters('icf_main_class', $main_class);
}

function icf_header(){
    global $smof_data, $icf_meta;
    /* header for page */
    if(isset($icf_meta->_icf_header) && $zo_meta->_icf_header){
        if(isset($icf_meta->_icf_header_layout)){
            $smof_data['header_layout'] = $icf_meta->_icf_header_layout;
        }
    }
    /* load template. */
    get_template_part('inc/header/header', $smof_data['header_layout']);
}

// Register Custom Post Type
function oferta_icf() {

	$labels = array(
		'name'                  => _x( 'Oferty', 'Post Type General Name', 'icf_wood' ),
		'singular_name'         => _x( 'Oferta', 'Post Type Singular Name', 'icf_wood' ),
		'menu_name'             => __( 'Oferty', 'icf_wood' ),
		'name_admin_bar'        => __( 'Oferta', 'icf_wood' ),
		'archives'              => __( 'Archiwum ofert', 'icf_wood' ),
		'parent_item_colon'     => __( 'Parent Item:', 'icf_wood' ),
		'all_items'             => __( 'Wszystkie elementy', 'icf_wood' ),
		'add_new_item'          => __( 'Dodaj nową ofertę', 'icf_wood' ),
		'add_new'               => __( 'Dodaj nową', 'icf_wood' ),
		'new_item'              => __( 'Nowy element', 'icf_wood' ),
		'edit_item'             => __( 'Edytuj element', 'icf_wood' ),
		'update_item'           => __( 'Aktualizuj element', 'icf_wood' ),
		'view_item'             => __( 'Zobacz oferte', 'icf_wood' ),
		'search_items'          => __( 'Szukaj oferty', 'icf_wood' ),
		'not_found'             => __( 'Nie znaleziono ofert', 'icf_wood' ),
		'not_found_in_trash'    => __( 'Nie znaleziono ofert w koszu', 'icf_wood' ),
		'featured_image'        => __( 'Zdjęcie oferty', 'icf_wood' ),
		'set_featured_image'    => __( 'Ustaw główne zdjęcie oferty', 'icf_wood' ),
		'remove_featured_image' => __( 'Usuń główne zdjęcie oferty', 'icf_wood' ),
		'use_featured_image'    => __( 'Użyj zdjęcia oferty', 'icf_wood' ),
		'insert_into_item'      => __( 'Insert into item', 'icf_wood' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'icf_wood' ),
		'items_list'            => __( 'Items list', 'icf_wood' ),
		'items_list_navigation' => __( 'Items list navigation', 'icf_wood' ),
		'filter_items_list'     => __( 'Filter items list', 'icf_wood' ),
	);
	$args = array(
		'label'                 => __( 'Oferta', 'icf_wood' ),
		'description'           => __( 'Opis oferty', 'icf_wood' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'kategorie' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-index-card',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'oferta', $args );

}
add_action( 'init', 'oferta_icf', 0 );

// Register Custom Post Type
function katalogi() {

	$labels = array(
		'name'                  => _x( 'Katalogi', 'Post Type General Name', 'icfwood' ),
		'singular_name'         => _x( 'Katalog', 'Post Type Singular Name', 'icfwood' ),
		'menu_name'             => __( 'Katalogi', 'icfwood' ),
		'name_admin_bar'        => __( 'Katalogi', 'icfwood' ),
		'archives'              => __( 'Archiwum katalogów', 'icfwood' ),
		'parent_item_colon'     => __( 'Parent Item:', 'icfwood' ),
		'all_items'             => __( 'Wszystkie katalogi', 'icfwood' ),
		'add_new_item'          => __( 'Dodaj nowy katalog', 'icfwood' ),
		'add_new'               => __( 'Dodaj nowy', 'icfwood' ),
		'new_item'              => __( 'Nowy katalog', 'icfwood' ),
		'edit_item'             => __( 'Edytuj katalog', 'icfwood' ),
		'update_item'           => __( 'Aktualizuj katalog', 'icfwood' ),
		'view_item'             => __( 'Zobacz katalog', 'icfwood' ),
		'search_items'          => __( 'Szukaj katalogu', 'icfwood' ),
		'not_found'             => __( 'Nie znaleziono katalogów', 'icfwood' ),
		'not_found_in_trash'    => __( 'Nie znaleziono katalogów w koszu', 'icfwood' ),
		'featured_image'        => __( 'Zdjęcie katalogu', 'icfwood' ),
		'set_featured_image'    => __( 'Ustaw zdjęcie katalogu', 'icfwood' ),
		'remove_featured_image' => __( 'Usuń zdjęcie katalogu', 'icfwood' ),
		'use_featured_image'    => __( 'Użyj zdjęcia katalogu', 'icfwood' ),
		'insert_into_item'      => __( 'Insert into item', 'icfwood' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'icfwood' ),
		'items_list'            => __( 'Items list', 'icfwood' ),
		'items_list_navigation' => __( 'Items list navigation', 'icfwood' ),
		'filter_items_list'     => __( 'Filter items list', 'icfwood' ),
	);
	$args = array(
		'label'                 => __( 'Katalog', 'icfwood' ),
		'description'           => __( 'Katalogi w formie PDF', 'icfwood' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'katalogi', $args );

}
add_action( 'init', 'katalogi', 0 );

// Register Custom Taxonomy
function kategorie() {

	$labels = array(
		'name'                       => _x( 'Kategorie ofert', 'Taxonomy General Name', 'icf_wood' ),
		'singular_name'              => _x( 'Kategoria', 'Taxonomy Singular Name', 'icf_wood' ),
		'menu_name'                  => __( 'Kategorie', 'icf_wood' ),
		'all_items'                  => __( 'Wszystkie kategorie', 'icf_wood' ),
		'parent_item'                => __( 'Parent Item', 'icf_wood' ),
		'parent_item_colon'          => __( 'Parent Item:', 'icf_wood' ),
		'new_item_name'              => __( 'Nazwa nowej kategorii', 'icf_wood' ),
		'add_new_item'               => __( 'Dodaj nową kategorię', 'icf_wood' ),
		'edit_item'                  => __( 'Edytuj kategorie', 'icf_wood' ),
		'update_item'                => __( 'Zaktualizuj kategorie', 'icf_wood' ),
		'view_item'                  => __( 'Zobacz kategorie', 'icf_wood' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'icf_wood' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'icf_wood' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'icf_wood' ),
		'popular_items'              => __( 'Popularne kategorie', 'icf_wood' ),
		'search_items'               => __( 'Szukaj kategorii', 'icf_wood' ),
		'not_found'                  => __( 'Nie znaleziono kategorii', 'icf_wood' ),
		'no_terms'                   => __( 'Brak elementó', 'icf_wood' ),
		'items_list'                 => __( 'Items list', 'icf_wood' ),
		'items_list_navigation'      => __( 'Items list navigation', 'icf_wood' ),
	);
	$rewrite = array(
		'slug'                       => 'rodzaj',
		'with_front'                 => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'kategorie', array( 'oferta' ), $args );

}
add_action( 'init', 'kategorie', 0 );

require_once("inc/tax-meta/Tax-meta-class.php");



function language_selector_flags() {
  if ( function_exists( 'icl_get_languages' ) ) :
    $languages = icl_get_languages( 'skip_missing=N&orderby=KEY&link_empty_to=str' );
    if ( ! empty( $languages ) ) :
      echo "\n<ul class=\"languages\">\n";
      foreach ( $languages as $lang ) :
        echo '<li class="' . ( $lang['active'] ? 'active' : ''  ) . '"><a href=' . $lang['url'] . '>' . $lang['language_code'] . "</a></li>\n";
      endforeach;
      echo "</ul>\n";
    endif; // ( ! empty( $languages ) )
  endif; // ( function exists )
}


add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
	
	function add_current_nav_class($classes, $item) {
		
		// Pobieramy dane elementu
		global $post;
		
		// Pobieramy dane aktualne elementu
		$current_post_type = get_post_type_object(get_post_type($post->ID));
		$current_post_type_slug = $current_post_type->rewrite[slug];
			
		// Uzyskujemy adres URL
		$menu_slug = strtolower(trim($item->url));
		
		// Jeśli adres URL zawiera dany element, dodajemy klasę do menu
		if (strpos($menu_slug,$current_post_type_slug) !== false) {
		
		   $classes[] = 'current';
		
		}
		
		// Zwracam poprawny zestaw klasy dla pozycji menu
		return $classes;
	
	}
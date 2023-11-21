<?php


function nlmd_styles_scripts() {

  wp_enqueue_script('jquery');

  // wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '1.1', 'all');
  // wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);

  wp_enqueue_style( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.1', 'all');
  wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array ( 'jquery' ), 1.1, true);

  //wp_enqueue_script( 'smoothstate', 'https://cdn.jsdelivr.net/npm/smoothstate@0.7.2/src/jquery.smoothState.min.js', array ( 'jquery' ), 1.1, true);

  //wp_enqueue_script( 'isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array ( 'jquery' ), 1.1, true);

  //wp_enqueue_script( 'imagesLoaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array ( 'jquery' ), 1.1, true);

  wp_enqueue_script( 'waypointsJS',  get_stylesheet_directory_uri() . '/js/jquery.waypoints.js', array ( 'jquery' ), 1.1, true);

  wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array ( 'jquery' ), 1.1, true);

  //wp_enqueue_script( 'smoothstatejs-scripts', get_stylesheet_directory_uri() . '/js/smoothstatescripts.js', array ( 'jquery' ), 1.1, true);

  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'nlmd_styles_scripts' );



function m1_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'm1_logo' ); // Add setting for logo uploader

    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm1_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'm1_logo',
    ) ) );
}
add_action( 'customize_register', 'm1_customize_register' );



function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'header-menu' ),
      'footer-menu' => __( 'footer-menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );


 function arphabet_widgets_init() {

 	register_sidebar( array(
 		'name'          => 'Footer widgets',
 		'id'            => 'footer-widgets',
 		'before_widget' => '<div>',
 		'after_widget'  => '</div>',
 		'before_title'  => '<h2 class="rounded">',
 		'after_title'   => '</h2>',
 	) );


 }
 add_action( 'widgets_init', 'arphabet_widgets_init' );


function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );


function my_custom_styles() {
  echo '<style>
      .acf-field.acf-field-flexible-content {
          background-color: #f2f2f2;
      }
  </style>';
}
add_action('admin_head', 'my_custom_styles');

function agregar_clase_a_submenus($classes, $item, $args) {
    if (in_array('menu-item-has-children', $item->classes)) {
        $classes[] = 'mi-clase-submenu'; // Reemplaza 'mi-clase-submenu' con la clase que desees agregar
    }
    return $classes;
}

// Agrega el filtro para modificar los elementos del menú
add_filter('wp_nav_menu_items', 'agregar_idioma_opuesto_al_menu', 10, 2);


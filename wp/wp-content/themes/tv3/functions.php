<?php 
require_once(get_template_directory() . '/inc/class-theme-setup.php');
require_once(get_template_directory() . '/inc/class-custom-functions.php');
require_once(get_template_directory() . '/inc/class-helper.php');

$theme_setup = new Theme_Setup;

add_action('wp_enqueue_scripts', function() {
  //Vendor
  if ( file_exists( get_template_directory() . '/dist/vendor/swiper-bundle.min.css' ) ) :
    $swipercsstime = filemtime( get_template_directory() . '/dist/vendor/swiper-bundle.min.css' );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/dist/vendor/swiper-bundle.min.css', array(), $swipercsstime );
  endif;
  if ( file_exists( get_template_directory() . '/dist/vendor/swiper-bundle.min.js' ) ) :
    $swiperjstime = filemtime( get_template_directory() . '/dist/vendor/swiper-bundle.min.js' );
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/dist/vendor/swiper-bundle.min.js', array(), $swiperjstime, true );
  endif;
  // App style
  if ( file_exists( get_template_directory() . '/dist/css/app.min.css' ) ) :
    $csstime = filemtime( get_template_directory() . '/dist/css/app.min.css' );
    wp_enqueue_style( 'app', get_template_directory_uri() . '/dist/css/app.min.css', array(), $csstime );
  endif;
  // App script
  if ( file_exists( get_template_directory() . '/dist/js/app.min.js' ) ) :
      $jstime = filemtime( get_template_directory() . '/dist/js/app.min.js' );
      wp_enqueue_script( 'app', get_template_directory_uri() . '/dist/js/app.min.js', array(), $jstime, true );
  endif;
  // Fontawesome
  if( file_exists( get_template_directory() . '/dist/vendor/fontawesome-free/css/all.min.css' ) ):
    $fontawesometime = filemtime( get_template_directory() . '/dist/vendor/fontawesome-free/css/all.min.css' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/dist/vendor/fontawesome-free/css/all.min.css', array(), $fontawesometime);
  endif;
});
?>
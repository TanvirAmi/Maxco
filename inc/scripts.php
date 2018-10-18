<?php
/**
 * Maxco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Maxco
 */

 /**
 * Loads the theme styles & scripts.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 */

 /**
  * Enqueue scripts and styles.
  */
 function maxco_scripts() {
 	wp_enqueue_style( 'maxco-style', get_stylesheet_uri() );

 	wp_enqueue_script( 'maxco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'maxco-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 		wp_enqueue_script( 'comment-reply' );
 	}

  // Enqueue js file
  wp_enqueue_script( 'maxco-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 'null', true );
  wp_enqueue_script( 'maxco-bootstrap', get_template_directory_uri() . '/assets/js/dev/bootstrap.min.js', array('jquery'), 'null', true );
  wp_enqueue_script( 'maxco-sticky', get_template_directory_uri() . '/assets/js/dev/jquery.sticky.js', array('jquery'), 'null', true );
  wp_enqueue_script( 'maxco-mixitup', get_template_directory_uri() . '/assets/js/dev/mixitup.min.js', array('jquery'), 'null', true );
  wp_enqueue_script( 'maxco-superfish', get_template_directory_uri() . '/assets/js/dev/superfish.js', array('jquery'), 'null', true );
  wp_enqueue_script( 'maxco-supersub', get_template_directory_uri() . '/assets/js/dev/supersubs.js', array('jquery'), 'null', true );
  wp_enqueue_script( 'maxco-owl', get_template_directory_uri() . '/assets/js/dev/owl.carousel.min.js', array('jquery'), 'null', true );
  wp_enqueue_script( 'maxco-wow', get_template_directory_uri() . '/assets/js/dev/wow.min.js', array('jquery'), 'null', true );
  wp_enqueue_script( 'maxco-slick', get_template_directory_uri() . '/assets/js/dev/jquery.slicknav.js', array('jquery'), 'null', false );


  // Enqueue css file
  wp_enqueue_style('maxco-main-css', get_template_directory_uri(). '/assets/css/bootstrap.css');
  wp_enqueue_style('maxco-animate', get_template_directory_uri(). '/assets/css/animate.css');
  wp_enqueue_style('maxco-nav', get_template_directory_uri(). '/assets/css/nav.css');

 }
 add_action( 'wp_enqueue_scripts', 'maxco_scripts' );


 /**
  * Include CSS file for MyPlugin.
  */
 function myplugin_scripts() {?>
   <link rel="stylesheet" type="text/css" href="http://localhost:8888/wordpress/wp-content/plugins/divi-builder/includes/builder/styles/frontend-builder-plugin-style.min.css">
 <?php
 }
 add_action( 'wp_head', 'myplugin_scripts' );

 ?>

<?php   
/**
 * @package styleisharya
 */
 ?>
 <?php function styleisharya_style_js()
 {
 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');
	wp_enqueue_style( 'styleisharya-basic-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.js', array('jquery'));	
	wp_enqueue_script( 'styleisharya-toggle-jquery', get_template_directory_uri() . '/js/styleisharya-toggle.js', array('jquery'));	
 }
 add_action( 'wp_enqueue_scripts', 'styleisharya_style_js' );
?>
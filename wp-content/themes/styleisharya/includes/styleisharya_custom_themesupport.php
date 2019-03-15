<?php   
/**
 * @package styleisharya
 */
 ?>
 <?php
 if ( ! function_exists( 'styleisharya_setup' ) ) :
function styleisharya_setup() {   
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'styleisharya' ),
		'footer' => esc_html__( 'Footer Menu', 'styleisharya' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );	
} 
endif; // styleisharya_setup
add_action( 'after_setup_theme', 'styleisharya_setup' );
?>
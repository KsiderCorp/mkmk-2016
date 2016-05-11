<?php

require 'function/header_less.php';
// require 'function/single.php';
require 'function/etc.php';
require 'function/shortcode.php';
require 'function/seo.php';
require 'function/custompost.php';

require 'function/nav.php';
require 'function/submission.php';


function myscript() 
{
 
wp_enqueue_style( 'naked-style', get_template_directory_uri() . '/style.css', '10000', 'all' );   

wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',false, null, true);
wp_enqueue_script( 'jquery' );
    
wp_enqueue_script( 'mainscript', get_stylesheet_directory_uri() . '/js/main.js',false, null, true );
    
wp_enqueue_style( 'fontss', 'https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|PT+Serif:400|PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic', '', 'all' );
	
// Likes
wp_enqueue_style( 'social', get_template_directory_uri() . '/addons/social-likes/likely.css', '', 'all' );
wp_enqueue_script( 'socialjs', get_stylesheet_directory_uri() . '/addons/social-likes/likely.js',false, null, true );

if( is_front_page() ){
	wp_enqueue_script( 'map', 'https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js',false, null, true );	
    wp_enqueue_script( 'mapjs', get_stylesheet_directory_uri() . '/js/map.js',false, null, true );
	};

if( is_front_page() ){
	wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/scrollspy.js',false, null, true );	
    
/*    wp_enqueue_style( 'owlcss', get_template_directory_uri() . '/addons/bxslider/jquery.bxslider.css', '', 'all' );*/
	};
	
    
// Icon
wp_enqueue_style( 'icon', get_template_directory_uri() . '/addons/icons/styles.css', '', 'all' );

load_theme_textdomain('trn', get_template_directory() . '/languages');    
}
add_action( 'wp_enqueue_scripts', 'myscript' );

?>

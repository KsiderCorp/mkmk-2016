<?php

add_filter( 'wpcf7_load_css', '__return_false' );
add_theme_support( 'post-thumbnails' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function new_excerpt_length($length) {
	return 20; }
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
	return ' ';}
add_filter('excerpt_more', 'new_excerpt_more');
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');


/** remove_filter( 'the_content', 'wpautop' ); */
add_filter( 'wpcf7_load_css', '__return_false' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
function my_wp_nav_menu_args( $args = '' ){
	$args['container'] = false;
	return $args;
}


/* 
 * Данные о количестве запросов к базе данных в подвале админки
 */
function wp_usage(){
	printf( ('SQL: %d за %s сек. '), get_num_queries(), timer_stop(0, 3) );
	if ( function_exists('memory_get_usage') ) echo round( memory_get_usage()/1024/1024, 2 ) . ' mb ';
}
add_filter('admin_footer_text', 'wp_usage');


add_filter('user_contactmethods', 'my_user_contactmethods');
function my_user_contactmethods($user_new_meta){
  $user_new_meta['position'] = 'Редакция';
  return $user_new_meta;
}


<?php
add_action( 'init', 'create_author', 0 );
function create_author(){
register_taxonomy(
        'authors',
		'post', array(
        'labels' => array(
		'name' => 'Авторы',
        'add_new_item' => 'Add New',
        'new_item_name' => "New Type"
          ),
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => false
       )
	);
}

// Сотрудники
add_action( 'init', 'create_employees' );

function create_employees() {
register_post_type( 'employees',
array(
'labels' => array(
'name' => 'Сотрудники',
'singular_name' => 'сотрудники',
'add_new' => 'Добавить',
'add_new_item' => 'Добавить',
'edit' => 'Редактировать',
'edit_item' => 'Редактировать',
'new_item' => 'Добавить страницу',
'view' => 'Просмотр',
'view_item' => 'Перейти',
'search_items' => 'Search',
'not_found' => 'Не найдено',
'not_found_in_trash' =>
'В корзине пусто',
'parent' => 'Parent'
),
'public' => true,
'menu_position' => 110,
'supports' =>
array( 'title', 'editor',  ),
'taxonomies' => array( '' ),
'menu_icon' =>'dashicons-businessman',
'has_archive' => true
) ); }
  
  add_action( 'init', 'create_emp', 0 );
function create_emp(){
register_taxonomy(
        'editors',
		'employees', array(
        'labels' => array(
		'name' => 'Редакторство',
        'add_new_item' => 'Add New',
        'new_item_name' => "New Type"
          ),
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true
       )
	);
}

// Новости

add_action( 'init', 'create_news' );

function create_news() {
register_post_type( 'news',
array(
    'labels' => array(
    'name' => 'Новости',
    'singular_name' => 'Yjdjcnb',
    'add_new' => 'Добавить',
    'add_new_item' => 'Добавить',
    'edit' => 'Редактировать',
    'edit_item' => 'Редактировать',
    'new_item' => 'Добавить страницу',
    'view' => 'Просмотр',
    'view_item' => 'Перейти',
    'search_items' => 'Search',
    'not_found' => 'Не найдено',
    'not_found_in_trash' =>
    'В корзине пусто',
    'parent' => 'Parent'
),
'public' => true,
'menu_position' => 110,
'supports' => array( 'title', 'editor', 'excerpt' ),
'taxonomies' => array(),
'menu_icon' =>'dashicons-id-alt',
'has_archive' => true
) ); }

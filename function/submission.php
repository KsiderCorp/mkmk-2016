<?php

add_action('post_updated', 'prefix_on_update_author', 10, 3);
function prefix_on_update_author($post_ID, $post_after, $post_before)
{
if ($post_after->post_type == 'submision') {
    if ($post_after->post_author != $post_before->post_author) {
      $new_author = $post_after->post_author; 
        
      $user = get_user_by('id', $new_author);  
      $a_email = $user->user_email;
      $a_name = $user->user_nicename;
       
    $subject = "[МКМК] Статья добавлена" ;
	
    $template = "<p>Новая статья добавлена для рецензирования, список статей <a href='http://mkmk.ras.ru/reviewers-area/'>здесь</a></p>";
    $from = "info@mkmk.ras.ru";
    $headers  = "From: МКМК <".$from.">\r\n";
    $headers .= "Reply-To: <".$from.">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    wp_mail($a_email, $subject, $template, $headers);
    
    $commentdata =  $commentdata = array(
	'comment_post_ID'      => $post_after->ID,
	'comment_author'       => 'Админ',
	'comment_content'      => 'Владелец сменился! Новый владелец '.$a_name,
    'comment_approved' => 1, 
    );   
    wp_new_comment( $commentdata );
    }
   } 
    
}

function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}

add_action( 'init', 'create_submision' );

function create_submision() {
register_post_type( 'submision',
array(
'labels' => array(
'name' => __( 'Заявки' ),
'singular_name' => __( 'Заявка' ),
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
'menu_position' => 128,
'show_in_nav_menus' => true,
'supports' =>
array( 'title', 'editor', 'excerpt', 'custom-fields', 'author', 'comments' ),
'menu_icon' => 'dashicons-nametag',
'has_archive' => false
) ); }

add_action( 'init', 'create_name', 0 );
function create_name(){
register_taxonomy(
        'name',
		'members', array(
        'labels' => array(
		'name' => 'Имя заявителя',
        'add_new_item' => 'Add New',
        'new_item_name' => "New Type"
          ),
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => false
       )
	);
}

add_action( 'wpcf7_before_send_mail', 'mytheme_save_post');
function mytheme_save_post( $cf7 ) {
  try {
    if (!isset($cf7->posted_data) && class_exists('WPCF7_Submission')) {
        $submission = WPCF7_Submission::get_instance();
        if ($submission) {
            $data = array();
            $data['title'] = $cf7->title();
            $data['posted_data'] = $submission->get_posted_data();
            $data['uploaded_files'] = $submission->uploaded_files();
			
			
			$email = $data['posted_data']['email-mail'];
			$phone = $data['posted_data']['text-phone'];
			$fio = $data['posted_data']['text-name'];
			$entitle = $data['posted_data']['text-entitel'];
			$content = $data['posted_data']['textarea-abstr'];
			
              
                
			$impthem = str_replace(","," ",$entitle);
			
			$template = htmlspecialchars(strip_tags($content, '<br><br/><a></a><strong></strong><sub></sub>'));
			$postdatta = '<h2>'.$impthem.'</h2>'.$template;
			
			
           
            
        $random = date('d').rand(0,100);
        $docnamesrc = $data['posted_data']['file-manuscript'];
        $docat = rus2translit($fio.'_'.$docnamesrc);
        $document = $data['uploaded_files']['file-manuscript'];
            
    $cont = file_get_contents($document);
            
    $new_file_name = $docat;
            
    $upload = wp_upload_bits( $new_file_name, null, $cont, 'manf/'.date('m') );

    $manurl = '';             
            if( $upload['error'] )
	$manurl = $upload['error'];
            else
	$manurl = $upload['url'];
     
            
            $post = array(
              'comment_status' => 'closed',
              'ping_status'    => 'closed',
              'post_status'    => 'private',
              'post_type'      => 'submision',
              'post_title'     => $entitle,
			  'post_author'   => 1,
              'post_content'   => $template,
			  'post_excerpt' => '',
                );
            
            $postId = wp_insert_post($post);
			wp_set_object_terms( $postId, $fio, 'name' );
		
			add_post_meta($postId, 'autmail', $email);
			add_post_meta($postId, 'auphone', $phone);
			add_post_meta($postId, 'docurl', $manurl);
            
		    return $postId;
        }
    }
  } catch (Exception $ex) {
      print $ex;
  }
  return true;
}
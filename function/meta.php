<?php 
include '../../../../wp-load.php';

remove_all_filters( 'wp_mail_from' );
remove_all_filters( 'wp_mail_from_name' );

function metachang(){
    
   $postid = $_POST['postid'];
   $status = $_POST['status'];
   update_post_meta($postid, 'review', $status); 
    

if($_POST['status'] == 'access') {
      $my_post = array();
      $my_post['ID'] = $postid;
      $my_post['post_author'] = 1;

      wp_update_post( $my_post );
      wp_set_object_terms( $postid, 'access', 'status' );
    }
    
if($_POST['status'] == 'deny') {
    
      $my_post = array();
      $my_post['ID'] = $postid;
      $my_post['post_author'] = 1;

      wp_update_post( $my_post );
      wp_set_object_terms( $postid, 'deny', 'status' );
}   
    
    
    echo '<i class="icon-check-mark-4"></i>'; 

}

if(isset($_POST['status'])):
    
    metachang();

elseif(isset($_POST['letter'])): 
      
   $postid = $_POST['idarticle'];
   $lettertext = $_POST['letter'];
   $reviewer = $_POST['idReviewer'];
   $autmail = $_POST['autmail'];
    
    
  $subject = "[МКМК] Сообщение от рецензента" ;
	
    // body	
    $template = "<p>".$lettertext."</p>";


    $from = "info@mkmk.ras.ru";
    $headers  = "From: МКМК <".$from.">\r\n";
    $headers .= "Reply-To: <".$from.">\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    wp_mail($autmail, $subject, $template, $headers);


    $commentdata = array(
	'comment_post_ID'      => $postid,
	'comment_author'       => 'Рецензент',
	'comment_content'      => $lettertext,
	'comment_type'         => '',
	'user_ID'              => $reviewer,
    'comment_approved' => 1, 
    );

    wp_new_comment( $commentdata );
     
    echo 'Сообщение отправлено <a class="close_letter"><i class="icon-close-empty"></i></a>';


else: 
//    echo print_r($_POST);
    echo 'Что-то не так!';
endif;


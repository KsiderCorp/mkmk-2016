<?php 
include '../../../../wp-load.php';

function metachang(){
    
   $postid = $_POST['postid'];
   $status = $_POST['status'];
   update_post_meta($postid, 'review', $status);

   echo '<i class="icon-36-lander"></i>'; 

}

if(isset($_POST['status'])):
    metachang();

elseif(isset($_POST['letter'])): 


        
remove_all_filters( 'wp_mail_from' );
remove_all_filters( 'wp_mail_from_name' );
    
       
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
    );

    wp_new_comment( $commentdata );
     
    echo 'Сообщение отправлено';

else: 
//    echo print_r($_POST);
    echo 'Что-то не так!';
endif;


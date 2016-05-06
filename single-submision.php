<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 

$manurl = get_post_meta( $post->ID, 'docurl', true );    
$amail = get_post_meta( $post->ID, 'autmail', true );    
$phone = get_post_meta( $post->ID, 'auphone', true ); 
$aut = get_the_term_list( $post->ID, 'name', '', ', ', '' );
$status = get_post_meta( $post->ID, 'review', true );     
$pid = $post->ID;

$pass = get_post_meta( $post->ID, 'password', true );
$user = get_current_user_id();
$userby = get_user_by('id', $user);  
$a_email = $userby->user_email;

if ( $post->post_author == $user ) {$_GET['pass'] = $pass;}
        
        if ( $_GET['pass'] == $pass ) { 

?>


<div class="single-wrap">
<div class="block"> 

<div class="srev">
     
      <div class="srev srev_content">
        <div class="srev_content-titel">
<h3><?php the_title(); ?> (<?php edit_post_link('edit', '', ', '); ?><?php if ( is_user_logged_in() ) { ?><a href="<?php the_permalink(); ?>?pass=<?php echo $pass; ?>">ссылка</a><?php } ?>)</h3> 
<p class="authors"><?php echo $aut; ?></p> 
                
        </div> 
             
        <div class="srev_content-abstract">
        <h4><?php _e('Abstract:', 'trn'); ?></h4>   
        <?php the_content(); ?>    
        </div>    
          
      </div>
      
      <div class="srev_status">
          <div class="status <?php echo $status; ?>"></div>
      </div>
      
</div> 
     
     <div class="srev_comments">
         <h3>События:</h3>
         

         
          
<?php $comments = get_comments('post_id='.$pid);
      foreach($comments as $comment){ ?>
            <div class="srev_comment"> 
               <?php echo($comment->comment_content); ?>   
            </div>    
      <?php } ?> 
          
     </div>
  
   
</div>                           
</div>

<?php } else { ?> 
 <div class="srev nonloged">
    <form action="<?php the_permalink(); ?>" method="get">
       Код доступа:
        <input type="text" name="pass">
        <input type="submit">
    </form>
</div>         
          
<?php } ?> 
    
          




<?php endwhile; else : ?>
<?php endif; ?>

	
	
<?php get_footer(); ?> 









   
    
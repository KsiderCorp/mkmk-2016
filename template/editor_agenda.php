<?php
/*
Template Name: reviewors Area
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="page">

<div class="page-title">
<h2><?php 
$current_user = wp_get_current_user();
echo $current_user->display_name;
?></h2>
<p><?php the_content(); ?></p>
</div>

<div class="page-content">
<?php the_content(); ?>
</div>

<hr>

<?php if ( is_user_logged_in() ) {?>


<?php 
$user = get_current_user_id();                                  
$arg = array( 
    'post_type' => 'submision',
    'posts_per_page'=> -1,
    'author' => $user,
    'post_status' => array( 'publish', 'private' ),
);
$query = new WP_Query( $arg );?>
<?php while ( $query->have_posts() ) : $query->the_post();
    
$manurl = get_post_meta( $post->ID, 'docurl', true );    
$amail = get_post_meta( $post->ID, 'autmail', true );    
$phone = get_post_meta( $post->ID, 'auphone', true ); 
$aut = get_the_term_list( $post->ID, 'name', '', ', ', '' );
    
$status = get_post_meta( $post->ID, 'review', true );     
    
$pid = $post->ID;
    
?>  


<div class="block_for-review <?php echo $status; ?>">
   
    <div class="for-review-content">
        <div class="for-review-entitel">
          <h4><?php the_title(); ?></h4>
            <div class="man-authors">
               <a href="mailto:<?php echo $amail; ?>"><?php echo strip_tags($aut); ?></a>
                
            </div>
        </div>
        <div class="for-review-excerpt">
            <?php the_content(); ?>
        </div>
        
        
            
        <?php 
        $comments = get_comments('post_id='.$pid);
        foreach($comments as $comment){ ?>
            <div class="for-review-comment"> 
               <?php echo($comment->comment_content); ?>   
            </div>    
        <?php } ?>  
            
     </div>   
        
<div id="letter" class="id<?php echo $pid;?> conversation" >
           
     
           
<form action="<?php bloginfo('template_url'); ?>/function/meta.php" method="post" class="revsend">
 
<a rel=".id<?php echo $pid;?>" class="close_letter">
 <i class="icon-close-empty"></i>
</a>             
                <input type="hidden" name="idies" value="<?php echo $pid;?>" class="idarticle">
                <input type="hidden" name="revID" value="<?php echo $user;?>" class="idReviewer">
                <input type="hidden" name="mailto" value="<?php echo $amail;?>" class="autmail">
                
                <textarea name="letter" id="" name="lettertext" class="letter">Уважаемый <?php echo strip_tags($aut); ?>, </textarea>
                
      <input type="submit">
</form>
</div>
    
    
    <div class="for-review-download">
        <a href="<?php echo $manurl; ?>">Скачать текст</a>
    </div>
    
    <div class="for-review-acceptline">
        <div class="pure-g">
            <div class="pure-u-1-3">
                <div class="link accept revres">
       <a href="<?php bloginfo('template_url'); ?>/function/meta.php" rel="<?php echo $pid;?>" data-st="access" class="">
           <i class="icon-check-mark-4"></i>
       </a>
                </div>
            </div>
            <div class="pure-u-1-3">
                <div class="link decline revres">
        <a href="<?php bloginfo('template_url'); ?>/function/meta.php" rel="<?php echo $pid;?>" data-st="deny" class="">
            <i class="icon-close-empty"></i>
        </a>
                </div>
            </div>
            <div class="pure-u-1-3">
                <div class="link contact">
<a rel=".id<?php echo $pid;?>" class="constart">
             <i class="icon-envelope"></i>
</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php wp_reset_postdata(); ?>
<?php endwhile; ?> 

<?php } else {
    echo '<div class="block_for-review">';
    echo '<a href="'.wp_login_url( get_permalink() ).'" title="Войти">Войти</a>';
    echo '</div>';
} ?>

</div>

<?php endwhile; else : ?>
<?php endif; ?>

	
<?php get_footer(); ?>
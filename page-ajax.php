<?php 
$args = array(
'page_id' => $_POST['getpost'],
'post_type' => 'any'
);
query_posts($args);
if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if(is_singular('employees') ) : ?>


<?php 
$image = '';
if( get_field('photo') ):
$attachment_id = get_field('photo');
$size = "full";
$image = wp_get_attachment_image_src( $attachment_id, $size);
 else :
$image[0] = bloginfo("template_url").'/img/emploers/yo.svg';
 endif; 
?>
<div class="side-toggle_wrap loadman">
<div class="side-toggle_cover">
<img src="<?php echo $image[0]; ?>" alt="">   
</div>

<div class="side-toggle_title">
    <div class="position">
<?php if( get_field('sns') ): the_field('sns'); else : echo ''; endif; ?><br>
    </div>
    
<span><?php the_title(); ?>  </span> 
</div>

<div class="side-toggle_contacts">

<?php if( get_field('phone') ):?>
<a href="tel:<?php the_field('phone'); ?>" class="peepcontl"><?php the_field('phone'); ?></a>
<?php else : endif; ?>	

<?php if( get_field('email') ):?>
<a href="mailto:<?php the_field('email'); ?>" class="peepcontl"><?php the_field('email'); ?></a>
<?php else : endif; ?> 

</div>

<div class="side-toggle_content">
  <?php the_content(); ?>  
</div>
</div>

<script>
var postURL = '<?php the_permalink(); ?>';
var postTTL = '<?php the_title(); ?>';  
window.history.pushState('Object', postTTL, postURL); 
</script>



<?php elseif( is_singular('gift') ) : ?>
<div class="side-toggle_wrap loadbook">

<div class="side-toggle_cover id<?php the_ID(); ?>">

<?php if( get_field('cover') ):?>
    <img src="<?php the_field('cover'); ?>" class="">
<?php else : endif; ?>
      
</div>

<div class="side-toggle_title">
  <span><?php the_title(); ?> </span>   
</div>

<div class="side-toggle_contacts">
<?php echo get_the_term_list( $post->ID, 'authors', '', ', ', '' ); ?>
</div>

<div class="side-toggle_content">
    <?php the_content(); ?>  
</div>

</div>
<script>
var postURL = '';
var postTTL = '<?php the_title(); ?>'; 
window.history.pushState('Object', postTTL, postURL); 
</script>

<?php else :  ?>
<div class="side-toggle_wrap loadnews">
<div class="side-toggle_cover id<?php the_ID(); ?>">

<?php if( get_field('postphoto') ):?>
    <img src="<?php the_field('postphoto'); ?>" class="">
<?php else : endif; ?>
      
</div>

<div class="side-toggle_title">
    <a href="<?php the_permalink(); ?>" >
        <?php the_title(); ?>  
    </a>    
</div>

<div class="side-toggle_content">  
  <?php the_content(); ?>     
</div>
</div>

<script>
var postURL = '<?php the_permalink(); ?>';
var postTTL = '<?php the_title(); ?>';  
window.history.pushState('Object', postTTL, postURL); 
</script>


<?php endif; ?>
<?php endwhile; else : ?>


<?php endif; ?>

<?php if( current_user_can('administrator') ){ ?>
<div class="center"><h5><?php print_r($_POST);?></h5></div>
<?php } ?>

<script>
$(".side-toggle_wrap").animate({right: "0"}, 600 );
</script>

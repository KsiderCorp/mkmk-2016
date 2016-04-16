<?php 
$args = array( 
'tax_query' => array(
		'relation' => 'AND',
    array(
			'taxonomy' => 'editors',
			'field' => 'slug',
			'terms' => 'secreties' ,
		),
	),
'post_type'=>'employees',
'posts_per_page' => 1, 
'order'=> 'ASC',
'orderby' => 'modified'  );
$postslist = get_posts( $args );  
foreach ($postslist as $post) :  setup_postdata($post);?>

<?php 
$image='';
if( get_field('photo') ):
$attachment_id = get_field('photo');
$size = "medium";
$image = wp_get_attachment_image_src( $attachment_id, $size );
else :
$image[0] = '';
endif; ?>	

<style>
.id-<?php the_ID(); ?>.img {
    background-image: url(<?php echo $image[0]; ?>); 
    }
</style>


<div class="secretary-block">
     
      <div class="pure-g">
      
       <div class="pure-u-1-5">
<div class="img id-<?php the_ID(); ?>"></div>       
       </div>
       
<div class="pure-u-4-5">
   <div class="chief">  
    <div class="status">
        <?php the_field('edd');?>
    </div>
    
    <div class="titel">
    <span><?php the_field('sns');?></span>
    <?php the_title(); ?>   
    </div>
 
   </div>              
</div>
   </div>
   

</div>





<?php wp_reset_postdata(); ?>
<?php endforeach; ?>
<?php 
$args = array( 
'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'editors',
			'field' => 'slug',
			'terms' => 'editors' ,
		),

		array(
			'taxonomy' => 'editors',
			'field' => 'slug',
			'terms' => 'maineditor',
			'operator' => 'NOT IN',
		),
	),
'post_type'=>'employees',
'posts_per_page' => '-1', 
'order'=> 'DESC',
'orderby' => 'modified' );
$postslist = get_posts( $args );  
foreach ($postslist as $post) :  setup_postdata($post);?>

<div class="pure-u-1 pure-u-sm-1 pure-u-md-1-2 pure-u-lg-1-3 pure-u-xl-1-3">
<?php 
$image = '';
if( get_field('photo') ):
$attachment_id = get_field('photo');
$size = "thumbnail";
$image = wp_get_attachment_image_src( $attachment_id, $size );
else :
  $image[0] =' '; 
endif; ?>
<style>
.id-<?php the_ID(); ?>.int:before {
    background-image: url(<?php echo $image[0]; ?>);}
</style>


<div class="int id-<?php the_ID(); ?>">
<span class="sns"><?php the_field('sns'); ?></span> <?php the_title(); ?>
</div>



</div>

<?php wp_reset_postdata(); ?>
<?php endforeach; ?>

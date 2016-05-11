<?php get_header(); ?>

<?php 
$term_id = $wp_query->get_queried_object_id();
$taxonomy = "authors";
$term = get_term_by('id', $term_id, $taxonomy);
$counte = $term->count;
$description = term_description();
?>

<div class="archive-category">
<div class="archive-category_header">

<div class="block center">

<?php 
if( get_field('photo', 'authors_'.$term_id) ):
$attachment_id = get_field('photo', 'authors_'.$term_id);
$size = "medium"; // (thumbnail, medium, large, full or custom size)
$image = wp_get_attachment_image_src( $attachment_id, $size );?>

<style>
.portret.id<?php the_ID(); ?> {
	width:150px; height:150px;
	margin:0 auto; border-radius:50%;
	background-image: url(<?php echo $image[0]; ?>);
	background-size: cover;
  	background-repeat: no-repeat;
  	background-position: 50% 40%;
}
</style>

<div class="authoricon"><div class="portret id<?php the_ID(); ?>">&nbsp;</div></div>

<?php else :?>
<div class="authoricon">
<i class="icon-user-circle-outline"></i>
</div>
<?php endif; ?>	


<h1 class="authors taxaut"><?php single_cat_title(''); ?></h1>
<div class="taxcount">
<?php  echo ' ('. _e('Number:', 'trn'); echo $counte; echo ')' ; ?>
</div>
<p><?php  echo $description; ?></p>

<div class="hide"><?php // fresh_kap_views() ?></div>

</div>

</div>
</div>

<div class="archive-category_list">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php  include(TEMPLATEPATH . '/template/loop.php'); ?>
<?php endwhile; else : ?>
<?php endif; ?>

  
</div>


<?php  include(TEMPLATEPATH . '/template/pagination.php'); ?>
	
<?php get_footer(); ?>
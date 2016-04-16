<?php get_header(); ?>


<div class="block_margin">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   
   <div class="page-title"><h2><?php the_title(); ?></h2></div>
      
<?php endwhile; else : ?>
<?php endif; ?>
    <div class="autsearch">
       <input id="textfield" class="autsearch" placeholder="<?php _e('Write name', 'trn'); ?>" autofocus>
    </div>
</div>



<div class="block_margin">
    <div class="author-search_list">
<ol class="" id="item-container">
<?php 
$authors = array(
	'orderby'       => 'id', 
	'order'         => 'DESC',
	'hide_empty'    => true, 
	'fields'        => 'all', 
	'pad_counts'    => false, 
);

$terms = get_terms('authors', $authors);
$count = count($terms);
 if($count > 0){
	 foreach ($terms as $term) {  ?>

<li class="autico autline autgrid"  value="<?php echo $term->term_id ?> ">
<i class="icon-man-people-streamline-user"></i>
<a href="<?php echo get_term_link( $term ) ?>" class="autlink"><?php echo $term->name ?></a>
</li>

<?php 	 }; } ?>
    
    </ol>	

    </div>
</div>

<?php get_footer(); ?>
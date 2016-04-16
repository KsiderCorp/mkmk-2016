<?php
/*
Template Name: statistics
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="page">
    <div class="page-title">
        <h2>
          <?php the_title(); ?>   
        </h2>
        <span><?php the_content(); ?></span>
    </div>
</div>
 
<?php endwhile; else : endif; ?>



<div class="block_margin">
   <div class="statistics">
   
   <div class="pure-g">
       <div class="pure-u-1-2">
   <h3>
   <?php _e('Most Viewed Articles', 'trn') ?>
   <span class="stat-discr">
   <?php _e('since 8 april 2016', 'trn') ?>  
   </span>
   </h3>
    
    <ol>
    <?php 
    $args = array( 
    'posts_per_page' => '5', 
    'order'=> 'DESC',
    'orderby' => 'meta_value_num',
    'meta_key' => 'views' );
    $topart = get_posts( $args );  
    foreach ($topart as $post) :  setup_postdata($post);?>

        <li>
       <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>  
        </li>

    <?php wp_reset_postdata(); ?>
    <?php endforeach; ?>
    </ol>           
       </div>
       <div class="pure-u-1-2">
     <h3>
   <a href="<?php echo home_url( '/authors/'); ?>">
   <?php _e('Authors Top 10', 'trn'); ?>
   </a>
    </h3>
<ol class="" >
<?php 
$authors = array(
	'orderby'       => 'count', 
	'order'         => 'DESC',
	'hide_empty'    => true, 
	'number'    => '10', 
	'fields'        => 'all', 
	'pad_counts'    => false, 
);

$terms = get_terms('authors', $authors);
$count = count($terms);
 if($count > 0){
	 foreach ($terms as $term) {  ?>

<li class="">
<a href="<?php echo get_term_link( $term ) ?>" class="autlink"><?php echo $term->name ?></a>
</li>

<?php 	 }; } ?>
    
    </ol>         
       </div>
   </div>
   

    
    
 </div>       
</div>



<div class="block_margin">
    <div class="statistics">
   
	

    </div>
</div>

<?php get_footer(); ?>
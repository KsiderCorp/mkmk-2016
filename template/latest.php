<div class="latest_header">
  <?php _e('recent', 'trn') ?>  
</div>


<?php 
           
$arg = array( 
    'posts_per_page'=> 5,
    'order' => 'DESC',
);
$query = new WP_Query( $arg );
if ( $query->have_posts()) : while ( $query->have_posts() ) : $query->the_post(); 
?>

<div class="latest-post">

<div class="latest-post_category">
   
 <?php
$aut = get_the_term_list( $post->ID, 'authors', '', ', ', '' );
echo  strip_tags($aut, '');  
?>  

</div>

<div class="latest-post_titel">
<a href="<?php the_permalink(); ?>" class="latest-post_permalink"></a>
<span><?php the_title(); ?></span>
</div>

<div class="latest-post_authors">
    <?php the_category(' - '); ?> (<?php the_time('Y'); ?>)

    
</div>

</div> 
  

<?php  wp_reset_postdata(); ?>
<?php endwhile; else : ?>
<?php endif; ?>              

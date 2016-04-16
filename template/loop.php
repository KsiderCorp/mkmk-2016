<div class="archive-post">
<?php  include(TEMPLATEPATH . '/template/bread.php'); ?>

<a href="<?php the_permalink(); ?>" class="entitle"><?php the_title(); ?></a>

<div class="archive-post_authors">
<?php echo get_the_term_list( $post->ID, 'authors', '', ', ', '' ); ?>  </div>
   
</div>




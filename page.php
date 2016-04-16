<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="page">

<div class="page-title"><h2><?php the_title(); ?></h2></div>

<div class="pure-g">
    <div class="pure-u-1">
<div class="page-content">
<?php the_content(); ?>
</div>
   </div>
   
</div>


</div>

<?php endwhile; else : ?>
<?php endif; ?>

	
<?php get_footer(); ?>
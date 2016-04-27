<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="page">

<div class="page-title"><h2><?php the_title(); ?></h2></div>


<?php the_content(); ?>

<?php // include(TEMPLATEPATH . '/src/form.php'); ?>
<!--<p></p>-->


</div>

<?php endwhile; else : ?>
<?php endif; ?>

	
<?php get_footer(); ?>
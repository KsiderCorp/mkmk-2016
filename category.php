<?php get_header(); ?>

<div class="archive-category">
<div class="archive-category_header">
    <div class="block">

    <h1>
       <?php single_cat_title(''); ?>
        <span class="category-description">
            <?php echo category_description(); ?>
        </span>
    </h1>

    <?php 
    global $wp_query;
    $category = $wp_query->get_queried_object();
    if ( !empty($category->parent) ) {
    echo "("; echo get_cat_name($category->parent); echo ")"; 
    }?>


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
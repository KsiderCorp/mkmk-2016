<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="archive-category">
<div class="archive-category_header">
    <div class="block">

    <h1>
<?php the_title(); ?>
    </h1>
    </div>
</div>
</div>


<?php endwhile; else : ?>
<?php endif; ?>


<?php 
$arttags = array(
	'smallest'                  => 12,
	'largest'                   => 72,
	'unit'                      => 'px',
	'number'                    => 0,
	'format'                    => 'flat',
	'separator'                 => "\n",
	'orderby'                   => 'name',
	'order'                     => 'ABC',
	'exclude'                   => null,
	'include'                   => null,
	'topic_count_text_callback' => default_topic_count_text,
	'link'                      => 'view',
	'taxonomy'                  => 'post_tag',
	'echo'                      => true,
); 
?>


<div class="archive-category_list">
<div class="kewords"><?php wp_tag_cloud( $arttags ); ?></div>
</div>


<?php get_footer(); ?>
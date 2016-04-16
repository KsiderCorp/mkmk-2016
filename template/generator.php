<?php
/*
Template Name: generator
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

<style>
    .block_margin {
        background-color: #fff;
        padding: 2em;
    }
    .vol {
        text-align: center;
    }
</style>

<div class="block_margin ">
<?php 
$terms = get_terms( 'category', array('parent' => 0, 'hierarchical' => 0, 'hide_empty' => 1, 'include' => '86,87,88' ) );
foreach ( $terms as $term ){ ?>

<div class="vol">
     <h1><?php echo $term->name; ?></h1>
</div>

<?php 
$numers = get_term_children( $term->term_id, 'category');
foreach ( $numers as $child ){ 
 $term = get_term_by( 'id', $child, 'category' );
	$termname = $term->name;     
      ?>

<div class="vol">
     <h4><strong><?php echo $termname; ?></strong></h4>
</div>

<?php 
$arg = array( 
    'post_type' => 'post',
    'posts_per_page'=> -1,
    'order' => 'date', 
    'orderby' => 'ASC',
    'category__not_in' => array(2370,2381,1986,2102),
    'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field' => 'id',
			'terms' => $term->term_id,
            )),);
$query = new WP_Query( $arg );?>
<?php while ( $query->have_posts() ) : $query->the_post();?>

<div class="pure-g">
   <div class="pure-u-1">
<h3><?php the_title(); ?></h3>
<h4><?php the_category(' - '); ?> (<?php the_time('Y'); ?>), Страницы: <?php the_field('pages'); ?>, </h4>
    </div>  
    <div class="pure-u-1-2">
<p class="authors">
<?php echo get_the_term_list( $post->ID, 'authors', '', ', ', '' ); ?>
</p>
    </div>

	    <div class="pure-u-1">
<h4>Аннотация</h4>
 <?php the_content(); ?>

<p>
<?php the_tags('', ', '); ?>
</p>
	    </div>

</div>
<hr>
<?php wp_reset_postdata(); ?>
<?php endwhile; ?>

<?php  } ?>
<hr> 
<?php  } ?> 

</div>




<?php get_footer(); ?>
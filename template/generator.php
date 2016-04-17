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
    table {
        background-color: #fff;
        padding: 2em;
    }
    
    tr {
     padding: 1em;   
    }

    thead > tr {
        
        text-align: center;
    }
    tbody {
        border: 1px solid #ddd;
    }
</style>


<table>
    <thead>
        <tr>
            <td>post_id</td>
            <td>post_name</td>
            <td>post_author</td>
            <td>post_date</td>
            <td>post_type</td>
            <td>post_status</td>
            <td>post_title</td>
            <td>post_content</td>
            <td>post_category</td>
            <td>post_tags</td>
            <td>tax_authors</td>
            <td>field_549271bbc2351</td>
            <td>field_549271c8c2352</td>

        </tr>
   </thead>
                                                       
<?php 
$terms = get_terms( 'category', array('parent' => 0, 'hierarchical' => 0, 'hide_empty' => 1, 'include' => '86,87,88' ) );
foreach ( $terms as $term ){ ?>                                                       

<?php 
    $numers = get_term_children( $term->term_id, 'category');
foreach ( $numers as $child ){ 
    $term = get_term_by( 'id', $child, 'category' );
    $termname = $term->name;     
      ?>
    													
    <tbody class="how-<?php echo $termname; ?>"> 
       
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
        <tr>
            <td data-td="post_id"></td>
            <td data-td="post_name"></td>
            <td data-td="post_author">masha</td>
            <td data-td="post_date">29.02.<?php the_time('Y'); ?> 0:00:00</td>
            <td data-td="post_type">post</td>
            <td data-td="post_status">publish</td>
            <td data-td="post_title"><?php the_title(); ?></td>
            <td data-td="post_content"><?php the_content(); ?></td>
            <td data-td="post_category">
            <?php strip_tags(the_category(', ')); ?>
            </td>
            <td data-td="post_tags">
            <?php strip_tags(the_tags('', ', ')) ; ?>
            </td>
            <td data-td="tax_authors">
            <?php echo strip_tags(get_the_term_list( $post->ID, 'authors', '', ', ', '' )) ?>
            </td>
            <td data-td="страницы"><?php the_field('pages'); ?></td>
            <td data-td="УДК"></td>
    </tr>
    
<?php wp_reset_postdata(); ?>
<?php endwhile; ?>

 
    
   </tbody> 
<?php  } ?>    
   
<?php  } ?>   
   
</table>



<?php get_footer(); ?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="archhead">
<div class="pure-g">
<div class="pure-u-1">
<div class="block">
<h2 id="recenz"><?php the_title(); ?></h2>
<hr>
</div>
</div>
</div>
</div>
<?php endwhile; else : ?>
<?php endif; ?>

<?php 
$authors = array(
	'orderby'       => 'name', 
	'order'         => 'ASC',
	'hide_empty'    => true, 
	'fields'        => 'all', 
	'pad_counts'    => false, 
);

$terms = get_terms('authors', $authors);
 $count = count($terms);
 if($count > 0){
	 echo "<ul>";
	 foreach ($terms as $term) {
	   echo "<li>".$term->name."</li>";

	 }
	 echo "</ul>";
 }
 ?>


<div class="pure-g">
<div class="pure-u-1">
<div class="block">

</div>
</div>
</div>




<?php get_footer(); ?>
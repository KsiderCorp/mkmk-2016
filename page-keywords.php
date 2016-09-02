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

function agen($input)
{
   $re = "/([^\\s>])(?!(?:[^<>]*)?>)/u"; 
   $str = $input; 
   $subst = '<a href="#m$1" class="scrollto">$1</a>'; 
   $result = preg_replace($re, $subst, $str);
  
   echo $result;
}
?>

<div class="archive-category_list">

<div class="kewords_menu">
   
   <?php 
    
$farg = array(
	'orderby'       => 'name', 
    'hierarchicals' => false,
	'order'         => 'ASC',
	'hide_empty'    => false, );  
$firtht = get_terms('post_tag', $farg);
    $let = '';
    $ftl1 = '';
    foreach ($firtht as $term) {
        
  $strc = mb_convert_case($term->name, MB_CASE_LOWER , "UTF-8");  
  $ftl = mb_substr($strc, 0, 1, 'utf-8'); 
    
if ($ftl1 != $ftl) {
   $let.= $ftl;
   $ftl1 = $ftl;
  }
        
           
        
    }    
    ?>
   
    <?php agen($let); ?>

</div>

<div class="kewords">
  <?php 
$args = array(
	'orderby'       => 'name', 
    'hierarchicals' => false,
	'order'         => 'ASC',
	'hide_empty'    => false, );  
$terms = get_terms('post_tag', $args);
$l1 = '';       
foreach ($terms as $term) { ?>
   
   

<?php 
  $str = mb_convert_case($term->name, MB_CASE_LOWER , "UTF-8");  
  $l2 = mb_substr($str, 0, 1, 'utf-8');
  if ($l1 != $l2) {
    $l1 = $l2;
  echo '<h3 class="letter" id="m'.$l1.'">' . $l1 . '</h3>';
  }
 ?>   
   <a href="<?php echo get_term_link( $term ) ?>"> 
    <?php echo $str; ?>
   </a> 

<?php } ?>    

</div>
</div>


 





<?php get_footer(); ?>
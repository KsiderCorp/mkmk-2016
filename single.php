<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div class="single-wrap">
<div class="block"> 

<div class="single-top">
  
 <div class="pure-g">
     
<div class="pure-u-2-5 left">
	<?php the_category(' - '); ?>
</div>
	
<div class="pure-u-3-5">
	<div class="pure-g center">

<div class="pure-u-2-5">
<?php if( get_field('udk') ): _e('UDK:', 'trn'); the_field('udk'); else : endif; ?> 
</div>
		
    <div class="pure-u-1-5">
       <?php the_time('Y'); ?>
   </div>
    <div class="pure-u-2-5 right">
        <?php _e('Pages:', 'trn'); ?> <?php the_field('pages'); ?>
    </div>
	</div>
</div>
     
</div>
   
</div>
  
      
   
    <div class="single-wrap-content">
     
<h3><?php the_title(); ?> <?php edit_post_link('edit', '(', ')'); ?></h3>

<p class="authors">
<?php echo get_the_term_list( $post->ID, 'authors', '', ', ', '' ); ?>
</p>   
     
<h4><?php _e('Abstract:', 'trn'); ?></h4>
<?php the_content(); ?>        
 
<div class="views"><i class="icon-eye"></i> <?php fresh_kap_views() ?></div>         
    </div>    
</div>

<div class="single-wrap-bookmark">

     <div class="block">
         <div class="pure-g">
             <div class="pure-u-1-2">
             
<div class="tag_cloud">
<h4><?php _e('Keywords:', 'trn'); ?></h4>
<?php the_tags('', ', '); ?>
</div>
            
             </div>
             <div class="pure-u-1-2">

 <h4><?php _e('Bookmarks:', 'trn'); ?></h4>                        
<div class="bookmarks">

<?php
$aut = get_the_term_list( $post->ID, 'authors', '', ', ', '' );
$name = get_the_title();
$jour = get_bloginfo("name");
$dat =  get_the_time('Y');
$cat =  get_the_category_list(' - ', '', $post->ID); 
$pages = get_field('pages');
    
$pp = __('p', 'trn');
//  $pp = _e('p.', 'trn');
    
$book = '<span class="authors">'.$aut.'</span> '.$name.' // '.$jour.' - '.$dat.' - '.$cat.' - '.$pp.': '.$pages; 
  echo  strip_tags($book, '<span></span>');  
?>

</div>
                        
                      
             </div>
         </div>
     </div>
     
 </div>      


<div class="block ">

   
<?php 
$news = array( 
    'post_type'=>'news',
    'posts_per_page' => 1, 
    'orderby'=> 'date',      
);     
    $new = get_posts( $news );  
    foreach ($new as $post) :  setup_postdata($post);
?> 

 <div class="advertisen">
   <a href="<?php the_permalink(); ?>"></a>
    <span><?php the_title(); ?></span>

<?php the_excerpt(); ?>
</div>
<?php wp_reset_postdata(); ?>
<?php endforeach;  ?> 
   
   
    
</div> 


 <div class="single-similar">
    
     <div class="block">
       
  <div class="pure-g">
     
  
    <?php 
$poid = array( $post->ID ); 
if( has_tag( '', $post->ID ) ){
        
    $gettages = get_the_tags( $post->ID);
    
    $tags = array();
    foreach($gettages as $tag){
        $tag_id = $tag->term_id;
        $tags[] = $tag_id;
    }
      
    
    $rel = array( 
	'post__not_in' => $poid,
    'post_type'=>'post',
    'posts_per_page' => 3, 
    'orderby'=> 'date',
    'order'=> 'DESC', 
    'tag__in' => $tags,    

        
    );     
    $screl = get_posts( $rel );  
    foreach ($screl as $post) :  setup_postdata($post);
?>
            
    <div class="pure-u-1-3">
        <div class="similar-post">
            <div class="similar-entitle">
<a class="sc-related-block" href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></div>
            <div class="similar-authors">
      <?php echo get_the_term_list( $post->ID, 'authors', '', ', ', '' ); ?>          
            </div>
        </div>  

  </div>
   <?php wp_reset_postdata(); ?>
   <?php endforeach;  ?>
<?php } ?>      
       
        
      </div>                         
     </div>
     
 </div>        
                           
</div>



<?php endwhile; else : ?>
<?php endif; ?>

	
	
<?php get_footer(); ?> 









   
    
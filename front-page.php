<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="mkmk-information">
    <div class="block">
        <div class="pure-g">
           
           <div class="pure-u-1">
           
<div class="mkmk-logotype">
        <div class="logotype">

        <div class="subtitel">
        <?php bloginfo("description"); ?>     
        </div>

        <div class="mkmk-name">
        <?php bloginfo("name"); ?>    
        </div>
 
        <div class="likely likely-small likely-light" data-single-title="Поделиться">
            <div class="facebook" title="Поделиться ссылкой на Фейсбуке"></div>
            <div class="twitter" title="Поделиться ссылкой в Твиттере"></div>
            <div class="vkontakte" title="Поделиться ссылкой во Вконтакте"></div>
            <div class="gplus" title="Поделиться ссылкой в Гугл-плюсе"></div>
        </div>

    </div>
</div>                
           </div>
           
            <div class="pure-u-7-24 pure-u-md-1-3 pure-u-sm-1-3">
    
    
                                                 

    
<div class="mkmk-main">
    <div class="decript">
        <?php if( get_field('b_head') ): the_field('b_head'); else : endif; ?>
    </div>

</div> 
 <div class="secretary">
    <?php  include(TEMPLATEPATH . '/template/secretary.php'); ?> 
</div>              
                
            </div>
            <div class="pure-u-1-2 pure-u-md-2-3 pure-u-sm-2-3">

 <?php 
$news = array( 
    'post_type'=>'news',
    'posts_per_page' => 1, 
    'orderby'=> 'date',      
);     
    $new = get_posts( $news );  
    foreach ($new as $post) :  setup_postdata($post);
?>
<div class="sepecial-news">
<strong><?php the_title(); ?></strong>
<?php the_content(); ?>
</div> 
<?php wp_reset_postdata(); ?>
<?php endforeach;  ?>   
     
<div class="mkmk-description">

   <div class="titeled"><?php the_title(); ?></div>
    
<?php the_content(); ?>  
 <hr>      
<?php if( get_field('b_2') ): the_field('b_2'); else : endif; ?>   
        
</div>                         
                    
            </div>
            <div class="pure-u-5-24 pure-u-md-1 pure-u-sm-1">
            
<div class="mkmk-forauthors front-head_block">
    <?php _e('To Authors', 'trn'); ?>
</div>   
           
<div class="mkmk-authors">
  <?php // if( get_field('b_submit') ): the_field('b_submit'); else : endif; ?>
  <ul>
      <li><a href="<?php if(get_locale() == 'ru_RU') { echo '/'; } elseif(get_locale() == 'en_US') { echo '/en/'; } ?>send/"><?php _e('Rule for authors', 'trn'); ?></a></li>
      
      <li><a href="<?php if(get_locale() == 'ru_RU') { echo '/'; } elseif(get_locale() == 'en_US') { echo '/en/'; } ?>rule-of-review/"><?php _e('The Procedure for Review', 'trn'); ?></a></li>
      
      <li><a href="/send#sender"><?php _e('Submit your article', 'trn'); ?></a></li>
      
      <li><a href="https://www.dropbox.com/s/1q6u7u7m06nhcgn/copyright_dogovor_%D0%9C%D0%9A%D0%9C%D0%9A.doc?dl=0"><?php _e('Agreement', 'trn'); ?></a></li>
  </ul>
   	       	      
</div> 
              
<div class="mkmk-adress">
        <span><i class="icon-map-pin"></i> <?php _e('7/1 Leningradsky prospect, Moscow 125040 RUSSIA', 'trn'); ?></span>
        <span><i class="icon-phone"></i> +7 495 946-18-06 </span>
        <span><i class="icon-mail"></i> <a href="mailto:iam@iam.ras.ru">iam@iam.ras.ru</a></span>
</div>    
 
          <div class="latest_articles">
             <?php  include(TEMPLATEPATH . '/template/latest.php'); ?> 
          </div>
          
           </div>
        </div>
    </div>
</div>

<?php endwhile; else : ?>
<?php endif; ?>


   <div class="mkmk-editors block_margin">
       <div id="editors" class="archive-title front-head_block">
        <?php _e('Editorial office', 'trn'); ?>
       </div>
    
    <div class="mkmk-editors_lists">
    
<div class="cheif_editors">
     <?php  include(TEMPLATEPATH . '/template/cheif.php'); ?>
</div>
  
    </div>
    </div>  


   <div class="mkmk-editors block_margin">
       <div id="editors" class="archive-title front-head_block">
        <?php _e('Editors', 'trn'); ?>
       </div>
    
    <div class="mkmk-editors_lists">
    
 <div class="pure-g">
    <?php  include(TEMPLATEPATH . '/template/editor_list.php'); ?>
 </div>
  
    </div>
    </div>    


<!-- Архив -->
 
<div class="frontpage_archive block_margin">
   <div class="archive-title front-head_block">
       <?php _e('Archive', 'trn'); ?>
   </div>
    
<div class="mkmk-archive">

    <ul class="archive clearfix" >
    <?php
        $categ = array(  
            'orderby'      	=> 'slug',
            'order'      	=> 'DESC',
            'hierarchical'	=> true, 
            'title_li'    	=> '' ,
            'hide_empty' 	=> true
            ); ?>
    <?php wp_list_categories($categ) ?>
    </ul>
     
</div>
</div>

<div id="map" class="block_margin"></div>




<?php get_footer(); ?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="mkmk-information" id="top">
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
 
       
       <div class="mkmk-logotype_menu" id="fastnav">

        <ul id="spyed" class="logotype-menu_list nav">
            <li><a href="#top"><i class="icon-home"></i></a></li>
            <li><a href="#editors"><?php _e('Editorial office', 'trn'); ?></a></li>
            <li><a href="#archive"><?php _e('Archive', 'trn'); ?></a></li>
            <li><a href="#map"><?php _e('Map', 'trn'); ?></a></li>
        </ul>
        
      </div>  

    </div>
</div>                
           </div>
           
<div class="pure-u-7-24 pure-u-md-1-3 pure-u-sm-1-3">

<div class="mkmk-forauthors front-head_block">
    <?php _e('To Authors', 'trn'); ?>
</div>   
           
<div class="mkmk-authors">
  <?php // if( get_field('b_submit') ): the_field('b_submit'); else : endif; ?>
  <ul>
      <li><a href="<?php if(get_locale() == 'ru_RU') { echo '/'; } elseif(get_locale() == 'en_US') { echo '/en/'; } ?>for_authors/"><?php _e('Rule for authors', 'trn'); ?></a></li>
      
      <li><a href="<?php if(get_locale() == 'ru_RU') { echo '/'; } elseif(get_locale() == 'en_US') { echo '/en/'; } ?>rule-of-review/"><?php _e('The Procedure for Review', 'trn'); ?></a></li>
      
      <li><a href="/send"><?php _e('Submit your article', 'trn'); ?></a></li>
      
      <li><a href="https://www.dropbox.com/s/1q6u7u7m06nhcgn/copyright_dogovor_%D0%9C%D0%9A%D0%9C%D0%9A.doc?dl=1"><?php _e('Agreement', 'trn'); ?></a></li>
      
      <li>
<?php if ( is_user_logged_in() ) { ?><a href="/reviewers-area/"><?php _e('Reviewer&#x27;s area', 'trn'); ?></a><?php } ?>       
      </li>
  </ul>
                       
</div> 
             
    <div class="secretary">
        <?php  include(TEMPLATEPATH . '/template/secretary.php'); ?> 
    </div>              
              
<div class="mkmk-adress">
       
        <span><i class="icon-map-pin"></i> <?php _e('7/1 Leningradsky prospect, Moscow 125040 RUSSIA', 'trn'); ?></span>
        <span><i class="icon-phone"></i> +7 495 946-18-06 </span>
        <span><i class="icon-mail"></i> <a href="mailto:iam@iam.ras.ru">iam@iam.ras.ru</a></span>
        
      <span>
        <div class="likely likely-small" data-single-title="Поделиться">
            <div class="facebook" title="Поделиться ссылкой на Фейсбуке"></div>
            <div class="twitter" title="Поделиться ссылкой в Твиттере"></div>
            <div class="vkontakte" title="Поделиться ссылкой во Вконтакте"></div>
            <div class="gplus" title="Поделиться ссылкой в Гугл-плюсе"></div>
        </div> 
      </span>
</div>    
 
<div class="latest_articles">
     <?php  include(TEMPLATEPATH . '/template/latest.php'); ?> 
</div>  
             
                
</div>
<div class="pure-u-17-24 pure-u-md-2-3 pure-u-sm-2-3">

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
       
<div class="pure-g">
    <div class="pure-u-2-3">
    
    <div class="titeled"><?php the_title(); ?></div>
    <?php the_content(); ?>  
    <hr>      
    <?php if( get_field('b_2') ): the_field('b_2'); else : endif; ?> 
       
    </div>
    
    <div class="pure-u-1-3">
    
    <div class="mkmk-main">
        <div class="decript">
<?php if( get_field('b_head') ): the_field('b_head'); else : endif; ?>
        </div>
    </div>  
          
    </div>
</div>
      

  
    </div>                         
                    
</div>

        </div>
    </div>
</div>

<?php endwhile; else : ?>
<?php endif; ?>


   <div class="mkmk-editors block_margin" id="editors">
       <div class="archive-title front-head_block">
        <?php _e('Editorial office', 'trn'); ?>
       </div>
    
    <div class="mkmk-editors_lists">
    
<div class="cheif_editors">
     <?php  include(TEMPLATEPATH . '/template/cheif.php'); ?>
</div>
  
    </div>
    </div>  


   <div class="mkmk-editors block_margin">
       <div class="archive-title front-head_block">
        <?php _e('Editors', 'trn'); ?>
       </div>
    
    <div class="mkmk-editors_lists">
    
 <div class="pure-g">
    <?php  include(TEMPLATEPATH . '/template/editor_list.php'); ?>
 </div>
  
    </div>
    </div>    


<!-- Архив -->
 
<div class="frontpage_archive block_margin" id="archive">
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
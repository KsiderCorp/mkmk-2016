<?php
/*
Template Name: For Authors
*/
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="page">

<div class="page-title"><h2><?php the_title(); ?></h2></div>

<div class="pure-g">
    <div class="pure-u-4-5">
<div class="page-content">
<?php the_content(); ?>
</div>
   </div>
   
    <div class="pure-u-1-5">
        <div class="download">
            <ul>
<li><a href="https://www.dropbox.com/s/1q6u7u7m06nhcgn/copyright_dogovor_%D0%9C%D0%9A%D0%9C%D0%9A.doc?dl=1"><?php _e('Agreement', 'trn'); ?></a></li>

<li><a href="<?php echo home_url( 'rule-of-review/'); ?>"><?php _e('Rule of review', 'trn'); ?></a></li>

<li><a href="/send" class="f_aut-send"><?php _e('Submit your article', 'trn'); ?></a></li> 
                     
            </ul>
        </div>
    </div>
</div>


</div>

<?php endwhile; else : ?>
<?php endif; ?>

	
<?php get_footer(); ?>
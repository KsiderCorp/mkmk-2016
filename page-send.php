<?php get_header(); ?>

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
<li><a href="https://www.dropbox.com/s/1q6u7u7m06nhcgn/copyright_dogovor_%D0%9C%D0%9A%D0%9C%D0%9A.doc?dl=0"><?php _e('Agreement', 'trn'); ?></a></li>
<!--<li><a href=".doc"><?php _e('Example', 'trn'); ?></a></li>-->
<li><a href="https://www.dropbox.com/s/de470mdh9v065xj/%D0%9F%D0%BE%D1%80%D1%8F%D0%B4%D0%BE%D0%BA%20%D1%80%D0%B5%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F%20%D1%80%D1%83%D0%BA%D0%BE%D0%BF%D0%B8%D1%81%D0%B5%D0%B9.pdf?dl=0"><?php _e('Rule of review', 'trn'); ?></a></li>
            </ul>
        </div>
    </div>
</div>


</div>

<?php endwhile; else : ?>
<?php endif; ?>

	
<?php get_footer(); ?>
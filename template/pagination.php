<div class="mkmk-pagination">
<?php
  $nv =   array(
'mid_size'           => 1,
'prev_text'          => __( '<i class="icon-arrow-left-1"></i>' ),
'next_text'          => __( '<i class="icon-arrow-right-1"></i>' ),
'screen_reader_text' => __( '' ),
);
  
$nav = get_the_posts_pagination($nv);
$nav = preg_replace('~<h2.*?h2>~', '', $nav);
echo $nav; ?>

</div>
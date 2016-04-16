<?php
  function icon($atts) {
   extract(shortcode_atts(array(
      'class' => 'icon-phone-sign',
      ), $atts));
return '<i class="'. $class .'" /></i>';
}
add_shortcode('i', 'icon');  



function plashka( $atts , $content = null ) {
	extract( shortcode_atts(
		array(
			'color' => '#fff',
			'bgc' => '#16a085',
            'bgi'=> '',
            'url'=> '',
            'display'=> 'inline-block',
		), $atts )
	);
 $plashka = "<a href='".$url."' class='plashka' style='color:".$color."; display: ".$display."; background-color:".$bgc."; background-image:url(".$bgi.");'><span>".$content."</span></a>";   
return $plashka;
}
add_shortcode( 'plashka', 'plashka' );



function floate_block( $atts , $content = null ) {
	extract( shortcode_atts(
		array(
			'fl' => 'left',
			'w' => '33%',
		), $atts )
	);
$br = '<div class="insideblock" style="float:'.$fl.'; width:'.$w.';">'.$content.'</div>';   
return $br;}
add_shortcode( 'bfl', 'floate_block' );


function countpost($atts) {
   extract(shortcode_atts(array(
      'type' => 'post',
      ), $atts));
$count_posts = wp_count_posts($type);
$published_posts = $count_posts->publish;
return $published_posts;
}
add_shortcode('count', 'countpost');    

function countterm($atts) {
   extract(shortcode_atts(array(
      'tax' => 'authors',
      ), $atts));
$published_authors = wp_count_terms( $tax, 'hide_empty=1' );
return $published_authors;
}
add_shortcode('countterm', 'countterm');  


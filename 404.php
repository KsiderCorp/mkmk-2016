<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo("html_type"); ?> />
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
404
</title>

<link rel="alternate" type="application/rss+xml" title="<?php get_bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="icon" type="image/png" href="<?php bloginfo("template_url"); ?>/img/favicon.png" />

<?php wp_head(); ?>




</head>
<body>
<?php
  $ic = array('war', 'body-cut', 'unicorn', 'body-overlay', 'car-burn', 'death-boiling', 'electrical-shock', 'execute-hanging', 'fell-down', 'garbage', 'head-shot-arrow', 'head-shot', 'hippie', 'nuclear', 'frankenstein', 'skull', 'zynga', 'head-stab-1', 'head-cut' ); // array of filenames
  $z = rand(0, count($ic)-1); 
  $selectedIc = "$ic[$z]"; 
?>

<style>
 
.page404 {
	position:relative;
	overflow:hidden;
	height:100%;
    
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 50%;
    background-image: url('https://source.unsplash.com/1600x900/?patterns');
   /* background-image: url('https://source.unsplash.com/category/technology/1600x900');
    */
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    
    }
    
.p404p {
        background-color: rgba(49,49,49,0.6);
        padding:1em 2em;
        padding-bottom: 0.5em;
        font-size: 4em; 
        font-weight: bold;
        color: #fff;
        text-align: center;
    
       /* background-image: url('https://c2.staticflickr.com/2/1495/26405211772_d299c54ee0.jpg');*/
        background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 50%;
    } 
    
.navigator {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
     
    background-color: rgba(49, 49, 49,0.8);
    } 
.navigator > a {
    color: #fff;
    text-align: center;
    width: 50%;
    padding: 2em 0;
    display: block;
    position: relative;
    text-decoration: none;
    }
    .navigator > a:hover {
    background-color: rgba(241, 196, 15,0.2);  
    }    
.navigator a span{
    font-size: 1em;
    
    letter-spacing: 0.3em;
    text-transform: uppercase;
    }   
</style>
	
		
<div class="page404" id="rand">

<div class="bigttl">
<div class="p404p">
 <i class="icon-<?php echo $selectedIc; ?>"></i> 404   
</div>


<div class="navigator">


<a href="/old/">
    <span><?php _e('Old Site', 'trn'); ?></span>
</a>
 
<a href="<?php echo home_url(); ?>">
    <span><?php _e('Home', 'trn'); ?></span>
</a>  
<!--<a href="<?php echo home_url('/send/'); ?>">
    <span><?php // _e('Rules', 'trn'); ?></span>
</a>  -->

</div>

</div>

</div>
		
		

<?php wp_footer(); ?>
   
<script>
/*    var allkey= 'd1cffee80470f8d8f649a0e40bfacf28';
    var allbum= '72157648410164234';
    var allCall = "https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key="+allkey+"&photoset_id="+allbum+"&format=json&extras=views,url_h&jsoncallback=?";

$.getJSON(allCall, function(data){
var a = 0;
var bgr = new Array();    
$.each(data.photoset.photo, function(i,photo){
      var big = photo['url_h'];
        bgr.push(big);
      });

var cit = data.photoset.photo.length+1;
var bac = bgr[Math.round(Math.random()*cit)];
var bacurl = bac;
document.getElementById('rand').style.backgroundImage = 'url("'+bacurl+'")';   
    });*/
  	
</script> 
     
    </body>
</html>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?> />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
404
</title>
<link rel="alternate" type="application/rss+xml" title="<?php get_bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="icon" type="image/png" href="<?php bloginfo("template_url"); ?>/img/favicon.png" />

<?php wp_head(); ?>

<?php
  $bg = array('bg-01.jpg', 'bg-02.jpg', 'bg-03.jpg', 'bg-04.jpg', 'bg-05.jpg', 'bg-06.jpg', 'bg-07.jpg', 'bg-08.jpg', 'bg-09.jpg', 'bg-10.jpg', 'bg-11.jpg', 'bg-12.jpg' ); // array of filenames
  $ic = array('war', 'body-cut', 'unicorn', 'body-overlay', 'car-burn', 'death-boiling', 'electrical-shock', 'execute-hanging', 'fell-down', 'garbage', 'head-shot-arrow', 'head-shot', 'hippie', 'nuclear', 'frankenstein', 'skull', 'zynga', 'head-stab-1', 'head-cut' ); // array of filenames

  $i = rand(0, count($bg)-1); 
  $z = rand(0, count($ic)-1); 
  $selectedBg = "$bg[$i]"; 
  $selectedIc = "$ic[$z]"; 
?>

<style>

.page404 {
	position:relative;
	background:#c0392b url('<?php bloginfo("template_url"); ?>/img/bc/<?php echo $selectedBg; ?>');
	overflow:hidden;
	height:100%;
	background-size: cover;
	background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
}

.bigttl { 
	line-height: 100%;
	font-size:12em;
	width:60%; 
	margin:0 auto;
    text-align: center;
    font-weight: bold;
    color: #fff;
    text-shadow: 2px 2px 10px #000;
    }


</style>

</head>
<body>

	
		
<div class="page404">

<div class="bigttl">
<i class="icon-<?php echo $selectedIc; ?>"></i> 404
</div>

</div>
		
		

		<?php wp_footer(); ?>
    </body>
</html>

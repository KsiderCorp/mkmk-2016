<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="page">

<div class="page-title"><h2><?php the_title(); ?></h2></div>


<?php the_content(); ?>

<?php // include(TEMPLATEPATH . '/src/form.php'); ?>
<!--<p></p>-->


</div>

<?php endwhile; else : ?>
<?php endif; ?>

<script>

function generatePassword() {
    var length = 25,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}    

var numLow = '10';
var numHigh = '999';
var adjustedHigh = (parseFloat(numHigh) - parseFloat(numLow)) + 1;
var numRand = Math.floor(Math.random()*adjustedHigh) + parseFloat(numLow);
var date = new Date();
var datlog = date.getHours()+''+date.getMinutes();
 
document.getElementById('passgen').value = generatePassword(); 
    
  
</script>
	
<?php get_footer(); ?>
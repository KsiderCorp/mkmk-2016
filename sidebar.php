<nav>
    <div class="navigation <?php if ( is_front_page() ) :  else : echo 'nonfp'; endif ; ?>">
       
        <div class="logotype ileft">
        <span class="item">
    <a href="<?php if(get_locale() == 'ru_RU') { echo '/'; } elseif(get_locale() == 'en_US') { echo '/en/'; } ?>"><?php _e('MKMK', 'trn'); ?></a>
        </span>
        </div>
        
        <div class="rightnav iright">

       <div class="item">
           
       </div>
       
        <span class="item lang">
           
<?php if(get_locale() == 'ru_RU') { ?>
<a href="/en/">Eng</a>
<?php } elseif(get_locale() == 'en_US') { ?>
<a href="/">Rus</a>
<?php } ?>
            
        </span>    
        </div>
    </div>
</nav>




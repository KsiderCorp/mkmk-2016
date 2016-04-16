<?php
/** SEO **/
function tp_meta_description( $home_description='', $maxchar=300 ){
    global $wp_query,$post;
    if( is_front_page() )
        $out = $home_description;
    elseif( is_singular() ){
        if ( $descript = get_post_meta($post->ID, "description", true) )
            $out = $descript;
        elseif ($post->post_excerpt!='')
            $out = trim(strip_tags($post->post_excerpt));
        else
            $out = trim(strip_tags($post->post_content));
        $char = iconv_strlen( $out, 'utf-8' );
        if( $char > $maxchar ){
            $out = iconv_substr( $out, 0, $maxchar, 'utf-8' );
            $words = split(' ', $out );
            $maxwords = count($words) - 1;
            $out = join(' ', array_slice($words, 0, $maxwords)).' ...';
        }
    }
    elseif( is_category() || is_tag() ){
        $desc = $wp_query->queried_object->description;
        $out = $desc;
    }

    if( !empty($out) ){
        $out = str_replace( array("\n","\r"), ' ', strip_tags($out) );
        $out = preg_replace("@\[.*?\]@", '', $out);
        echo '<meta name="description" content="'. $out .'" />'."\n";
    }
    return;
}

function tp_meta_title ($sep=" / ",$bloginfo_name=''){
    global $wp_query,$post;
    if (!$bloginfo_name) $bloginfo_name = get_bloginfo('name');
    $wp_title = wp_title($sep, 0, 'right');

    if (is_category() || is_tag()){
        $out = $match[1] ? $match[1].$sep : ((is_tag())?"Метка:":"Категория:")." $wp_title";
    }
    elseif (is_singular()) $out = ($free_title = get_post_meta($post->ID, "title", true)) ? $free_title.$sep : $wp_title;
    elseif (is_author()) $out = "Записи автора $wp_title";
    elseif (is_day() || is_month()) $out = "Архив за $wp_title";
    elseif (is_year()) $out = "Архив за $wp_title";
    elseif (is_search()) $out = 'Результаты поиска по запросу: '. strip_tags($_GET['s']) . $sep;
    elseif (is_404()) $out = "Ошибка 404 - страница не существует".$sep.$wp_title;

    $out = trim($out.$bloginfo_name);
    if ($paged = get_query_var('paged')) $out = "$out (страница $paged)";
    return print $out;
}

function tp_meta_robots ($out = ''){
    global $post;
    $eURL = $_SERVER['REQUEST_URI'];
    //если это страницы, отвечающие указанным параметрам, то не индексируем
    if ( is_feed() || is_search() || is_day() || strpos($eURL, '/wp-login.php') !== false || strpos($eURL, '/wp-register.php') !== false ) 
        $out = "noindex,nofollow";
    //если в одиночной записи есть заполненное произвольное поле robotsmeta, то берется его значение
    if( is_singular() ){
        if( $robotsmeta = get_post_meta($post->ID, 'robots', true) )
            $out = $robotsmeta;
    }
    if( $out )
        return print "<meta name='robots' content='$out' />\n";
    return;
}

function tp_meta_keywords ($home_keywords='',$def_keywords=''){
    global $wp_query,$post;
    if ( is_single() && !$out=get_post_meta($post->ID,'keywords',true) ){
        $out = '';
        $res = wp_get_object_terms( $post->ID, array('post_tag','category'), array('orderby' => 'none') ); // получаем категории и метки
        if ($res) foreach ($res as $tag) $out .= " {$tag->name}";
        $out = str_replace(' ',', ',trim($out));
        $out = "$out $def_keywords";
    }
    elseif (is_home()){
        $out = $home_keywords;
    }
    if ($out) return print "<meta name='keywords' content='$out' />\n";
    return false;
}
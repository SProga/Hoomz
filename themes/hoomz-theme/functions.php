<?php


function hoomz_files() {
    wp_enqueue_style('custom-gilroy-font','//fonts.cdnfonts.com/css/gilroy-bold');
    wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('aos',"//unpkg.com/aos@next/dist/aos.css");
    wp_enqueue_style('signup_page', get_template_directory_uri() .'/css/signup.css');
    wp_enqueue_style('hoomz_main_styles', get_template_directory_uri() .'/css/style.css');
    wp_enqueue_script("dataaos","//unpkg.com/aos@next/dist/aos.js");
    wp_enqueue_script('hoomz_script', get_theme_file_uri('/js/script.js'), NULL, '1.0', true);
    

}


add_action('wp_enqueue_scripts','hoomz_files'); //needs to parameters



function hoomz_features() {
    add_theme_support('title-tag');
    add_image_size('homeLandscape',600,460,true);
 
}

add_action('after_setup_theme','hoomz_features');

?>
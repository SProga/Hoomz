<?php

require get_theme_file_path('/includes/search_hoomz.php');


function hoomz_files() {
    wp_enqueue_style('custom-gilroy-font','//fonts.cdnfonts.com/css/gilroy-bold');
    wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('aos',"//unpkg.com/aos@next/dist/aos.css");
    wp_enqueue_style('signup_page', get_template_directory_uri() .'/css/signup.css');
    wp_enqueue_style('hoomz_main_styles', get_template_directory_uri() .'/css/style.css');
    wp_enqueue_script("dataaos","//unpkg.com/aos@next/dist/aos.js");   
    wp_enqueue_script('hoomz_script', get_theme_file_uri('/js/script.js'), array('jquery'), '1.0', true);
    wp_localize_script('hoomz_script','hoomzData', array(
        'root_url' => get_site_url(),'nonce' => wp_create_nonce('wp_rest')
    ));
    

}


add_action('wp_enqueue_scripts','hoomz_files'); //needs to parameters



function hoomz_features() {
    add_theme_support('title-tag');
    add_image_size('homeLandscape',600,460,true);
 
}

function redirect_to_login() {
        wp_redirect(site_url()."/signin");
        exit;
}

function fn_redirect_wp_admin() {
    global $pagenow;


    if($pagenow == 'wp-login.php' && $_GET['action'] != 'logout') {
        wp_redirect(home_url() . "/signin");
        exit;
    }
}

add_action('init','fn_redirect_wp_admin');
add_action("wp_logout","redirect_to_login");
add_action('after_setup_theme','hoomz_features');

?>
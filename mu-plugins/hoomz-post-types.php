<?php


function hoomz_post_type() {
    register_post_type('home',array(
        'supports' => array('title','editor','excerpt'),
        'rewrite'=>array('slug' => 'homes'), 
        'public'=>true,
        'public' => true,
        'labels' =>array(
            'name' => 'Homes',
	    'add_new_item' => 'Add New Home',
	    'edit_item' => 'Edit Homes',
	    'all_items' => 'All Homes',
	    'singular_name' => 'Home'
        ),
       'menu_icon' => 'dashicons-store' 
    ));
}

add_action('init','hoomz_post_type');

?>
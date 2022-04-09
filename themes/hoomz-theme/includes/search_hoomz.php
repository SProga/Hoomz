<?php


add_action('rest_api_init' , 'hoomzRegisterSearch');

function hoomzRegisterSearch() {
    register_rest_route('hoomz/v1','/homes', array(
        'methods' => 'GET',
        'callback' => 'get_homes'
    ));
}

function get_homes($data) {
    return json_encode($data);
    $Queries = new WP_Query(array(
        'post_type' => array('post','page','hoom'),
        's' => sanitize_text_field($data['location'])
    ));
    
    $results = array(
        'hoomz' => array(),
    );
    
    while($Queries->have_posts()) {
        $Queries->the_post();
        if(get_post_type() == 'hoom') {
            array_push($results['hoomz'],array(
                "title" => get_the_title(),
                "permalink" => get_the_permalink(),
                "hoomz_image" => get_field('hoomz_image'),
                "hoomz_bedrooms" => get_field('hoomz_bedrooms'),
                "hoomz_bathrooms"=> get_field('hoomz_bathrooms'),
                "hoomz_sqfeet"=> get_field('hoomz_sqfeet'),
                "hoomz_pool" => get_field('hoomz_pool'),
                "postType" => get_post_type(),
                "hoomz_location"=> get_post(),
                "authorName" => get_the_author()
            ));
        }   
    };

    return $results;
}
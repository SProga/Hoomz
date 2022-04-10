<?php 
get_header(); 
?>

<?php 

$select_types = get_field_object('hoomz_type');
$select_parish = get_field_object('hoomz_parish');
$select_cat = get_field_object('hoomz_category');

?>

<main class="archive_hoomz">

    <div class="hoomz_filter container">

        <div class="custom_filter">
            <i class="fa fa-filter" aria-hidden="true"></i><span> Filter Hoomz</span>
        </div>

        <form action="?" class="form__filter">
            <div class=" form__group">
                <label for="type" class="form__label">Type</label>
                <select name="type" id="" class="form__input">
                    <option value="none" selected disabled hidden>Select a type</option>
                    <?php foreach($select_types['choices'] as $choice) { ?>
                    <option value="<?php echo $choice ?>"><?php echo $choice ?></option>
                    <?php  } ?>
                </select>
            </div>
            <div class="form__group">
                <label for="location" class="form__label">location</label>
                <select name="location" id="location" class="form__input">
                    <option value="none" selected disabled hidden>Select a parish</option>
                    <?php foreach($select_parish['choices'] as $choice) { ?>
                    <option value="<?php echo $choice ?>"><?php echo $choice ?></option>
                    <?php  } ?>
                </select>
            </div>
            <div class="form__group">
                <label for="type" class="form__label">category</label>
                <select name="category" id="type" class="form__input">
                    <option value="none" selected disabled hidden>Select a category</option>
                    <?php foreach($select_cat['choices'] as $choice) { ?>
                    <option value="<?php echo $choice ?>"><?php echo $choice ?></option>
                    <?php  } ?>
                </select>
            </div>
            <div class="form__group">
                <label for="price" class="form__label">price</label>
                <select name="price" id="type" class="form__input">
                    <option value="none" selected disabled hidden>Select price range</option>
                    <option value="> 100000"> > $100,000 </option>
                    <option value="< 100000">
                        < $100,000 </option>
                    <option value="> 200000">
                        > $200,000 </option>
                    <option value="< 200000">
                        < $200,000 </option>
                </select>
            </div>
            <button type="submit" class="btn--submit btn_test">Search</button>
        </form>
    </div>

    <section class="archive-catalog">
        <div class="container">
            <div class="t-center">
                <h1 class="d-subtext">Our <span class="hightlight-darker">Hoomz</span></h1>
                <img class="mt-xs" src="<?php echo get_theme_file_uri('/images/recent.svg') ?>" alt="">
            </div>


            <div class="catalog__cards">

                <?php
               
                if($_GET) {   

                    $keys = array("location","type","category","price");
                    $query = array();
                    
                    if(isset($_GET['location']) && !empty($_GET['location'])) {
                        $location = array('key' => 'hoomz_parish','value' => $_GET['location']);
                        $query[] = $location;
                    }
                    if(isset($_GET['type']) && !empty($_GET['type'])) {
                        $type = array('key' => 'hoomz_type','value' => $_GET['type']);
                        $query[] = $type;
                    }
                   
                    if(isset($_GET['category']) && !empty($_GET['category'])) {
                        $category = array('key' => 'hoomz_category','value' => $_GET['category']);
                        $query[] = $category;
                    }
                   
                    if(isset($_GET['price']) && !empty($_GET['price'])) {
                        $options = explode(" ", $_GET['price']);
                        $price = array('key' => 'hoomz_price','compare' => $options[0],'value' => $options[1],'type' => 'numeric');
                        $query[] = $price;
                    }               
              
                    $meta_query = array_values($query);
                

                    $hoomz = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type' => 'hoom',
                        'meta_query' => [...$meta_query]
                    ));

                    } else {
                        $hoomz = new WP_Query(array(
                            'posts_per_page' => -1,
                            'post_type' => 'hoom'
                            ));
                    }

                    if(!$hoomz->have_posts()) { ?>
                <div class="hoomz_empty">
                    <h1 class="hoomz_empty-text">No matching Hoomz were found.</h1>
                    <img class="hoomz_empty-img" src="<?php echo get_theme_file_uri('/images/embarrassed.png'); ?>">
                    <button class="btn btn--read mt-l">load all hoomz</button>
                </div>
                <?php } else {
                    
                     $delay = 1;
                    while($hoomz->have_posts()) {
                    $hoomz->the_post(); 
                    $location = get_field('hoomz_location');
                    $image = get_field('hoomz_image')['sizes']['medium'];
                    $bedrooms = get_field('hoomz_bedrooms');
                    $bathrooms = get_field('hoomz_bathrooms');
                    $sqfeet = get_field('hoomz_sqfeet');
                    $pool = get_field('hoomz_pool');
                    $type = get_field('hoomz_type');
                    $parish = get_field('hoomz_parish');
                    $owner = get_field('hoomz_owner');
                    $price = get_field('hoomz_price');
        
                    if($pool == 0) {
                        $pool = "none";
                    }else {
                        $pool = $pool."Ft";
                    }
        
                    hoomz_card_template(array(
                    'bedrooms' => $bedrooms,
                    'bathrooms' => $bathrooms,
                    'hoomz_owner' => $owner,
                    'hoomz_image' => $image,
                    'hoomz_location' => $location,
                    'hoomz_parish' => $location,
                    'pool' => $pool,
                    'type' => $type,
                    'hoomz_price' => $price,
                    'sqfeet' => $sqfeet,
                    'delay' => 1
                    ));
                    }
                } ?>
            </div>

        </div>
    </section>



</main>



<?php
get_footer();
?>
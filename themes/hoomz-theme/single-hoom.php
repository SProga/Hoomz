<?php 
get_header(); 
?>
<main>

    <?php 
       

            while(have_posts()) {
             the_post(); 
    
             $image = get_field('hoomz_image')['sizes']['large'];
             $bedrooms = get_field('hoomz_bedrooms');
             $bathrooms = get_field('hoomz_bathrooms');
             $sqfeet = get_field('hoomz_sqfeet');
             $pool = get_field('hoomz_pool');
             $location = get_field('hoomz_location');
             $geo = get_field('hoomz_geo');
             ?>
    <div class="container">
        <div class="single__home">
            <h1 class="single__title"><?php echo  $location ?></h1>
            <hr class="divider">
            <div class="single__content">
                <img class="single__image" src="<?php echo $image ?>" alt="">
                <div class="single__content-right">
                    <h2 class="single__description highlight-colored">Description</h2>
                    <p class="single__para">
                        <?php echo get_the_content(); ?>
                    </p>
                    <hr class="divider">
                    <div class="single__details">
                        <div class="single__detail">
                            <h3>Bathrooms</h3>
                            <img src="<?php echo get_theme_file_uri('/images/bathroom.svg') ?>" alt="">
                            <p><?php echo $bathrooms ?></p>
                        </div>
                        <div class="single__detail">
                            <h3>Bedrooms</h3>
                            <img src="<?php echo get_theme_file_uri('/images/bedroom.svg') ?>" alt="">
                            <p><?php echo $bedrooms ?></p>
                        </div>
                        <div class="single__detail">
                            <h3>Square Feet</h3>
                            <img src="<?php echo get_theme_file_uri('/images/sqfeet.svg') ?>" alt="">
                            <p><?php echo $sqfeet ?> FT</p>
                        </div>
                        <div class="single__detail">
                            <h3>Pool</h3>
                            <img src="<?php echo get_theme_file_uri('/images/pool.svg') ?>" alt="">
                            <p><?php echo $pool ?></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="wrapper">
            <div class="buttonWrapper">
                <button class="tab-button active" style="border-top-left-radius: 10px;" data-id="map">Map</button>
                <button class="tab-button" data-id="gallery">Gallery</button>
                <button class="tab-button" style="border-top-right-radius: 10px;" data-id="schedule">Schedule
                    Tour</button>
            </div>
            <div class="contentWrapper">
                <div class="content active" id="map">
                    <div class="themap"><?php echo do_shortcode($geo) ?></div>
                </div>
                <div class="content" id="gallery">
                    <span class="no-images">
                        <img class="no-images__image" src="<?php echo get_theme_file_uri("/images/no-images.svg"); ?>"
                            alt="">
                        No Photos to Show
                    </span>
                </div>
                <div class="content" id="schedule">
                    <!-- to be filled in -->
                </div>
            </div>
        </div>

    </div>



    <?php  }    ?>



</main>


<?php
get_footer();
?>
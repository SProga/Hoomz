<?php 
get_header(); 
?>


<main>


    <section class="archive-catalog">
        <div class="container">
            <div class="t-center">
                <h1 class="d-subtext">Our <span class="hightlight-darker">Hoomz</span></h1>
                <img class="mt-xs" src="<?php echo get_theme_file_uri('/images/recent.svg') ?>" alt="">
            </div>
            <div class="catalog__cards">
                <?php 
        $hoomz  = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'hoom'
            ));

            $delay = 1;
            while($hoomz->have_posts()) {
             $hoomz->the_post(); 
             $image = get_field('hoomz_image')['sizes']['medium'];
             $bedrooms = get_field('hoomz_bedrooms');
             $bathrooms = get_field('hoomz_bathrooms');
             $sqfeet = get_field('hoomz_sqfeet');
             $pool = get_field('hoomz_pool');

             if($pool == 0) {
                 $pool = "none";
             }else {
                 $pool = $pool."Ft";
             }
             ?>
                <div class="catalog__card" data-aos="fade-up" data-aos-duration="1000">
                    <figure class="catalog__wrapper">
                        <button class="btn--heart"><img class="heart"
                                src="<?php echo get_theme_file_uri('/images/heart.svg') ?>" alt=""></button>
                        <img class="catalog__card-image" src="<?php echo $image ?>" alt="">
                        <h2 class="catalog__card-location">
                            <?php the_field('hoomz_location') ?>, <?php the_field('hoomz_parish') ?></h2>
                    </figure>
                    <p class="catalog__card-price">$<?php echo number_format(get_field('hoomz_price')) ?></p>
                    <div class="catalog__card-list">
                        <p><img src="<?php echo get_theme_file_uri('/images/bathroom.svg') ?>"
                                alt=""><span>&#183;</span>
                            <?php echo $bathrooms ?>ba</p>
                        <p><img src="<?php echo get_theme_file_uri('/images/bedroom.svg') ?>" alt="">
                            <span>&#183;</span>
                            <?php echo $bedrooms ?>br
                        </p>
                        <p><img src="<?php echo get_theme_file_uri('/images/sqfeet.svg') ?>" alt=""> <span>&#183;</span>
                            <?php echo $sqfeet?>sq</p>
                        <p><img src="<?php echo get_theme_file_uri('/images/pool.svg') ?>" alt=""><span>&#183;</span>
                            <?php echo $pool ?></p>
                    </div>
                    <a class="btn btn--buy mt-xs" href="<?php the_permalink(); ?>">Buy home</a>
                    <p class="catalog__card-owner">owned by <span
                            class="highlight-3"><?php echo the_field('hoomz_owner') ?></span></p>
                </div>
                <?php $delay++ ?>
                <?php } ?>
            </div>

        </div>
    </section>



</main>


<?php
get_footer();
?>
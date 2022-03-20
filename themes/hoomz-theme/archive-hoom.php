<?php 
get_header(); 
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
                    <option value="rent">Rent</option>
                    <option value="buy">Buy</option>
                    <option value="sell">Sell</option>
                </select>
            </div>
            <div class="form__group">
                <label for="location" class="form__label">location</label>
                <select name="location" id="location" class="form__input">
                    <option value="none" selected disabled hidden>Select a parish</option>
                    <option value="stphilip">st.philip</option>
                    <option value="christchurch">christ church</option>
                </select>
            </div>
            <div class="form__group">
                <label for="type" class="form__label">category</label>
                <select name="category" id="type" class="form__input">
                    <option value="none" selected disabled hidden>Select a category</option>
                    <option value="luxury">luxury</option>
                    <option value="townhouse">town house</option>
                    <option value="appartments">appartment</option>
                    <option value="cottage">cottage</option>
                    <option value="beachhouse">beach house</option>
                    <option value="farmhouse">farm house</option>
                    <option value="any">any</option>
                </select>
            </div>
            <div class="form__group">
                <label for="price" class="form__label">price</label>
                <select name="price" id="type" class="form__input">
                    <option value="none" selected disabled hidden>Select price range</option>
                    <option value=">100">> $100,000 </option>
                    <option value="<100">
                        < $100,000 </option>
                    <option value=">500">
                        > $500,000 </option>
                    <option value="<500">
                        < $500,000 </option>
                </select>
            </div>
            <button type="button" class="btn--submit btn_test">Search</button>
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
                $hoomz = new WP_Query(array(
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
                        <?php if (is_user_logged_in()) { ?>
                        <button class="btn--heart"><img class="heart"
                                src="<?php echo get_theme_file_uri('/images/heart.svg') ?>" alt="">
                        </button>
                        <?php } ?>

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
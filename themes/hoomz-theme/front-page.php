<?php 
get_header(); 
?>
<div class="hero">
    <!-- <div class="hero__overlay"></div> -->
    <div class="container hero__content">
        <h1 class="h-title"><span class="highlight">Investing</span> In Your Future?</h1>
        <p class="h-subtitle mt-s">Start with a beautiful Home .</p>
        <a href="#" class="btn btn--view mt-l">View homes</a>
    </div>
</div>


<main>
    <section class="categories">
        <div class="container">
            <h1 class="categories-title t-center">Hoomz <span class="hightlight-darker">Categories</span></h1>
            <div class="categories__cards__wrapper">
                <div class="categories__cards">
                    <img src="<?php echo get_theme_file_uri('/images/rent.svg'); ?>" alt="">
                    <h1 class="categories__cards-title mt-s">Rent a Home</h1>
                    <p class="categories__cards-subtitle mt-s">Browse from over 400 local houses. Choose the homes
                        which
                        best suits your budget. From small
                        homes to luxury estates.</p>
                    <a href="#" class="btn btn--card mt-s">Find rental</a>
                </div>
                <div class="categories__cards">
                    <img src="<?php echo get_theme_file_uri('/images/buy.svg'); ?>" alt="">
                    <h1 class="categories__cards-title mt-s ">Buy a Home</h1>
                    <p class="categories__cards-subtitle mt-s ">We can get you that dream home. Browse over catalogue of
                        superior Homes.</p>
                    <a href="#" class="btn btn--card-outline mt-s">Find home</a>
                </div>
                <div class="categories__cards">
                    <img src="<?php echo get_theme_file_uri('/images/sell.svg'); ?>" alt="">
                    <h1 class="categories__cards-title mt-s ">Sell a Home</h1>
                    <p class="categories__cards-subtitle mt-s ">Thinking about selling or renting a property.Hoomz is
                        the place to do it.Over 400 homes sold.</p>
                    <a href="#" class="btn btn--card mt-s">Sell home</a>

                </div>
            </div>
        </div>
    </section>

    <section class="hoomz-filter">
        <div class="container">
            <h1 class="t-center d-text">Looking For a Specific Home ?</h1>
            <h2 class="t-center d-subtext-light mt-s">Filter <span class="highlight">Hoomz</h2>
            <div class="hoomz__search">
                <div class="hoomz__search-filter">
                    <span class="search-filter filter-active">Rent</span>
                    <span class="search-filter">Buy</span>
                    <span class="search-filter">Sell</span>
                </div>
                <form class="hoomz_form">
                    <div class="form__group">
                        <label for="location" class="form__label">location</label>
                        <select name="location" id="location" class="form__input">
                            <option value="stphilip">st.philip</option>
                            <option value="christchurch">christ church</option>
                        </select>
                    </div>
                    <div class="form__group">
                        <label for="type" class="form__label">type</label>
                        <select name="type" id="type" class="form__input">
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
                            <option value=">100">> $100,000 </option>
                            <option value="<100">
                                < $100,000 </option>
                            <option value=">500">
                                > $500,000 </option>
                            <option value="<500">
                                < $500,000 </option>
                        </select>
                    </div>
                    <button type="submit" class="btn--submit">Search</button>
                </form>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <h1 class="d-text--dark t-center">Why Us ?</h1>
            <h3 class="t-center d-subtext-gray  mt-s"><span class="highlight-colored">100%</span> Satisfaction Record .
            </h3>
            <div class="about__content">
                <img src="<?php echo get_theme_file_uri('/images/whyus.png'); ?>" alt="">
                <div class="about__content-inner">
                    <p class="text about__paragraph">We have the best rating in homes with over <strong>200+</strong>
                        satisfied
                        customers.
                        From estates to small homes, we at Hoomz cater to each and every potential buyer.
                        Don't have the money upfront ? no worries. We have a 1 year payment discount of up to 30%,
                        Allowing you to own a home right away.
                    </p>
                    <button class="btn--read">Read More</button>
                </div>


            </div>
        </div>
    </section>

    <section class="catalog">
        <div class="container">
            <div class="t-center">
                <h1 class="d-subtext">Recent <span class="hightlight-darker">Hoomz</span></h1>
                <img class="mt-xs" src="<?php echo get_theme_file_uri('/images/recent.svg') ?>" alt="">
            </div>
            <div class="catalog__cards">
                <?php 
        $hoomz  = new WP_Query(array(
          'posts_per_page' => 3,
          'post_type' => 'home'
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
                <div class="catalog__card" data-aos="fade-up" data-aos-delay="<?php echo ($delay * 400) ?>">
                    <figure class="catalog__wrapper">
                        <button class="btn--heart"><img class="heart"
                                src="<?php echo get_theme_file_uri('/images/heart.svg') ?>" alt=""></button>
                        <img class="catalog__card-image" src="<?php echo $image ?>" alt="">
                        <h2 class="catalog__card-location"><?php the_field('hoomz_location') ?></h2>
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
            <div class="t-center mt-m">
                <a class="btn--viewMore" href="">View More Hoomz</a>
            </div>

        </div>
    </section>


    <section class="connect" data-aos="fade-left">
        <div class="container connect__grid">
            <div class="connect__inner-content-left">
                <div class="connect__text">
                    <h1 class="connect__title"><span class="highlight">Start</span> Your Journey Now!</h1>
                    <p class="connect__paragraph">The power of our property matching software can connect you with the
                        right
                        Agent, best suited
                        to your every need.</p>
                </div>
            </div>
            <form action="#" class="connect__form">
                <h1 class="connect__form__title mb-s">Connect With An Agent</h1>
                <div class="connect__form__group">
                    <input type="text" placeholder="Name" class="connect__form__input">
                </div>
                <div class="connect__form__group">
                    <input type="text" placeholder="Email" class="connect__form__input">
                </div>
                <div class="connect__form__group">
                    <input type="text" placeholder="Phone Number" class="connect__form__input">
                </div>
                <div class="connect__form__group">
                    <input type="text" placeholder="Zip Code" class="connect__form__input">
                </div>
                <div class="connect__form__group">
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                </div>
                <div class="connect__form__group">
                    <button class="btn--submit-alt my-m">Submit</button>
                </div>
            </form>
        </div>

    </section>


</main>


<?php
get_footer();
?>
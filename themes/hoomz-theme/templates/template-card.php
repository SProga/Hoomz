    <div class="catalog__card" data-aos="fade-up" data-aos-delay="<?php echo ($args['delay'] * 150) ?>"
        data-aos-duration="1000">
        <figure class="catalog__wrapper">
            <?php if (is_user_logged_in()) { ?>
            <button class="btn--heart"><img class="heart" src="<?php echo get_theme_file_uri('/images/heart.svg') ?>"
                    alt="">
            </button>
            <?php } ?>

            <img class="catalog__card-image" src="<?php echo $args['hoomz_image'] ?>" alt="">
            <h2 class="catalog__card-location">
                <?php echo $args['hoomz_location'] ?>, <?php echo $args['hoomz_parish'] ?></h2>
        </figure>
        <p class="catalog__card-price">$<?php echo number_format($args['hoomz_price']) ?></p>
        <div class="catalog__card-list">
            <p><img src="<?php echo get_theme_file_uri('/images/bathroom.svg') ?>" alt=""><span>&#183;</span>
                <?php echo $args['bathrooms'] ?>ba</p>
            <p><img src="<?php echo get_theme_file_uri('/images/bedroom.svg') ?>" alt="">
                <span>&#183;</span>
                <?php echo $args['bedrooms'] ?>br
            </p>
            <p><img src="<?php echo get_theme_file_uri('/images/sqfeet.svg') ?>" alt=""> <span>&#183;</span>
                <?php echo $args['sqfeet'] ?>sq</p>
            <p><img src="<?php echo get_theme_file_uri('/images/pool.svg') ?>" alt=""><span>&#183;</span>
                <?php echo $args['pool'] ?></p>
        </div>
        <a class="btn btn--buy mt-xs" href="<?php the_permalink(); ?>"><?php echo $args['type'] ?> home</a>
        <p class="catalog__card-owner">owned by <span class="highlight-3"><?php echo $args['hoomz_owner'] ?></span></p>
    </div>
    <?php $args['delay']++ ?>
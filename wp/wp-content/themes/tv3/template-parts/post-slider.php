<?php
    $latest_post = get_posts(array(
        'post_type' => 'latest-news',
        'numberposts' => 1
    ));
    $args = array(
        'post_type' => 'latest-news',
        'numberposts' => -1,
        'post__not_in' => array($latest_post[0]->ID)
    );
    $all_latest_news_posts = get_posts( $args );
?>

<section class="post-slider">
    <div class="containers">
        <!-- Slider main container -->
        <div class="swiper post-slider__swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php foreach($all_latest_news_posts as $post): ?>
                    <?php
                        $post_content_variables = array(
                            'post_id' => $post->ID,
                            'categories' => get_the_terms($post->ID, 'latest_news_cat'),
                            'author_id' => null,
                            'content' => null,
                        ); 
                    ?>
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="post-slider__image-wrapper">
                            <picture class="post-slider__play-button--center">
                                <?php echo Helper::load_svg( get_template_directory_uri() . '/dist/img/play-button-small.svg' ); ?>
                            </picture>
                            <?php echo get_the_post_thumbnail($post->ID, array( 182, 117 ), array('class' => 'post-slider__post-image')); ?>
                            <?php get_template_part('/template-parts/post-media-info'); ?>
                        </div>

                        <?php get_template_part('/template-parts/post-content', null, $post_content_variables); ?>
                    </div>
                <?php endforeach;  ?>
            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="swiper-button-next">
                <i class="fa-solid fa-chevron-right"></i>
            </div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
</section>
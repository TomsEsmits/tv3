<?php
    $latest_post = get_posts(array(
        'post_type' => 'latest-news',
        'numberposts' => 1
    ));
    $latest_post_id = $latest_post[0]->ID;
    $post_content_variables = array(
        'post_id' => $latest_post[0]->ID,
        'categories' => get_the_terms($latest_post[0]->ID, 'latest_news_cat'),
        'author_id' => get_post_field('post_author', $latest_post[0]->ID),
        'content' => get_the_content(null, false, $latest_post[0]->ID),
    );
?>

<section class="latest-post">
    <div class="container">
        <div class="latest-post__main-wrapper">
            <div class="latest-post__image-wrapper">
                <?php echo get_the_post_thumbnail($latest_post_id, array( 482, 309 ), array('class' => 'latest-post__post-image')); ?>
                <picture class="latest-post__play-button--center">
                    <?php echo Helper::load_svg( get_template_directory_uri() . '/dist/img/play-button.svg' ); ?>
                </picture>
                <?php get_template_part('/template-parts/post-media-info'); ?>
            </div>
            <?php get_template_part('/template-parts/post-content', null, $post_content_variables); ?>
        </div>
    </div>
</section>
<div class="post-content">
    <div class="post-content__category">
        <?php 
            if($args['categories']):
                foreach($args['categories'] as $category):
                    echo $category->name;
                endforeach;
            endif;
        ?>
        <span class="post-content__time">
            <span>&#x2022;</span>
            <?php echo Helper::display_post_time($args['post_id']);?>
        </span>
    </div>
    <h2 class="post-content__title"><?php echo get_the_title($args['post_id']); ?></h2>
    <?php if($args['content']): ?>
        <div class="post-content__content">
            <?php 
                if(has_excerpt($args['post_id'])):
                    echo get_the_excerpt($args['post_id']);
                else:
                    echo wp_trim_words($args['content'], 30, null);
                endif;
            ?>
        </div>
    <?php endif; ?>
    <?php if($args['author_id']): ?>
        <div class="post-content__author-wrapper">
            <?php if(get_avatar_url($args['author_id'])): ?>
                <img class="post-content__avatar" src="<?php echo esc_url(get_avatar_url($args['author_id'], ['size' => '32'])); ?>" /> 
            <?php endif; ?>
            <div class="post-content__author-credentials">
                <span class="post-content__author-name"><?php echo get_the_author_meta('first_name', $args['author_id']); ?></span>
                <span class="post-content__author-last-name"><?php echo get_the_author_meta('last_name', $args['author_id']); ?></span>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
    /*
        This is the template part for blogpost navigation /prev post- next-post
        @package mops
    */

?>

<?php

    $prevPost = get_previous_post(true);
    if($prevPost) {
        $args = array(
            'posts_per_page' => 1,
            'include' => $prevPost->ID
        );

    $prevPost = get_posts($args);
    foreach ($prevPost as $post) {
        setup_postdata($post); ?>

            <div class="blogpost__navigation__item-prev" >
                <div class="navigation__img__container">

                    <a href="<?php the_permalink(); ?>"
                        class="navigation__img"><?php the_post_thumbnail('thumbnail'); ?></a>
                </div>
                <div class="blogpost__navigation__content blogpost__navigation__content--left">
                    <a class="blogpost__navigation__label blogpost__navigation__label--right" href="<?php the_permalink(); ?>"> Poprzedni wpis</a>
                    <a href="<?php the_permalink(); ?>"
                            class="blogpost__navigation__title"><?php the_title(); ?></a>
                </div>
            </div>
        <?php
        wp_reset_postdata();
    } //end foreach
    }


    $nextPost = get_next_post(true);
    if($nextPost) {
        $args = array(
            'posts_per_page' => 1,
            'include' => $nextPost->ID
        );

        $nextPost = get_posts($args);
        foreach ($nextPost as $post) {
            setup_postdata($post); ?>


                <div class="blogpost__navigation__item-next">
                        <div class="blogpost__navigation__content blogpost__navigation__content--right">
                        <a class="blogpost__navigation__label blogpost__navigation__label--left"
                            href="<?php the_permalink(); ?>">Następny wpis</a>
                        <a href="<?php the_permalink(); ?>"
                                class="blogpost__navigation__title"><?php the_title(); ?></a>
                    </div>
                    <div class="navigation__img__container">
                        <a href="<?php the_permalink(); ?>"
                            class="navigation__img"><?php the_post_thumbnail('thumbnail'); ?></a>
                    </div>
                </div>

    <?php
        wp_reset_postdata();
    } //end foreach
    } // end if

?>


<?php
    /*
        This is the  template for single blog post - relatedpost loop
        @package mops
    */

?>
  <?php

    $relatedpost = new WP_Query(array(
            'post_type' => 'post',
            'category__in' => wp_get_post_categories(get_the_ID()),
            'post__not_in' => array(get_the_ID()),
            'posts_per_page' => 3,
            'orderby' => 'rand',
        ));
?>




    <div class="row--3 "><h3>Zobacz również</h3></div>

    <div class="row--3">

        <?php if ($relatedpost->have_posts()) { ?>
            <?php while ($relatedpost->have_posts()) { ?>
            <?php $relatedpost->the_post(); ?>

                <?php get_template_part('template-parts/content','relatedpost');?>

            <?php
            } ?>

            <?php wp_reset_postdata(); ?>

        <?php } ?>

    </div>





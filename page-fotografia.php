
<?php
    /*
        Template Name: Fotografi

        This is the custom template for custom post type page
        @pckage mops
    */

?>

<?php get_header(); ?>




<?php get_template_part('template-parts/content','headerfotografia');?>

<main>
    <div class="container pt--100 pb--100">
        <div class="row--3">


            <?php
                $new_query_photo = new WP_Query(
                    array(

                        'post_type' => 'photography',
                        'post_status' => 'publish',
                    )
                );

                if ($new_query_photo->have_posts()) :
                    while ($new_query_photo->have_posts()) : $new_query_photo->the_post();
                ?>
                        <?php get_template_part('template-parts/content','foto');?>

                <?php endwhile;
                    wp_reset_postdata();
                else :

                    endif;
            ?>
        </div>

        </div>
        <div class="pagination pt--100"> <?php pagination(); ?></div>
     </div>
</main>
<?php get_footer(); ?>
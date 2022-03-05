
<?php
    /*
        This is the template for custom taxonomy
        @pckage mops
    */

?>


<?php get_header(); ?>

<?php get_template_part('template-parts/content','headerfototaxonomy');?>


<div class="container">
    <div class="container__blog pt--70">



            <main class="main__blog ">
                <div class="row--2">

                        <?php if (have_posts()) :
                        while (have_posts()) : the_post(); ?>

                            <?php get_template_part('template-parts/content','foto');?>

                        <?php endwhile; else :endif; ?>

                </div>

                <div class="pagination pt--100 pb--70">
                    <?php pagination(); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </main>

            <aside class="aside">
                <?php get_sidebar(); ?>
            </aside>
    </div>
</div>


<?php get_footer(); ?>
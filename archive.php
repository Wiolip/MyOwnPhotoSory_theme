
<?php
    /*
        This is the template for category archive
        @pckage mops
    */

?>

<?php get_header(); ?>
<?php get_template_part('template-parts/content','headerarchive');?>


<div class="container">
    <div class="container__blog pt--70">

        <?php $info_cat = get_the_category(); ?>

            <main class="main__blog ">
                <div class="row--2">

                        <?php if (have_posts()) :
                        while (have_posts()) : the_post(); ?>

                            <?php get_template_part('template-parts/content','blog');?>

                        <?php endwhile; else :endif; ?>

                </div>

                <div class="pagination pt--100 pb--70">
                    <?php pagination(); ?>
                   
                </div>
            </main>

            <aside class="aside">
                <?php get_sidebar(); ?>
            </aside>
    </div>
</div>



<?php get_footer(); ?>




<?php
    /*
        This is the template for all blog posts
        @pckage mops
    */

?>


<?php get_header(); ?>

<?php get_template_part('template-parts/content','headerblog');?>


<main>
    <div class="container pt--100 pb--100">
        <div class="row--3">

            <?php if( have_posts() ): ?>
            <?php while( have_posts() ): the_post();?>
                <?php get_template_part('template-parts/content','blog');?>

            <? endwhile;?>
            <? endif; ?>

        </div>
        <div class="pagination pt--100"> <?php pagination(); ?></div>
     </div>
</main>


<?php get_footer(); ?>




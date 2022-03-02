<?php
    /*
        This is the  template for single blog post
        @package mops
    */

?>

<?php get_header(); ?>


    <?php if( have_posts() ): ?>
    <?php while( have_posts() ): the_post();?>
        <?php get_template_part('template-parts/content','single');?>


    <?php  if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;?>


    <? endwhile;?>
    <? endif; ?>

<?php get_footer(); ?>
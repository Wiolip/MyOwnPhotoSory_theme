<?php
    /*

        This is the  template for search page
        @pckage mops
    */

?>

<?php get_header(); ?>


<header class="search__header pt--100">

    <div class="container pt--100">
        <h2 class="search-title">
       <?php _e( 'Wyniki wyszukiwania dla hasła', 'mops' ); ?>: "<?php the_search_query(); ?>"
		</h2>
    </div>
</header>


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
<?php
    /*
        This is the  template for header archive page
        @package mops
    */

?>



<header class="blog__hero" id="header">
    <div class="container">

        <nav class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs__item"><?php get_page_by_title( 'home' ) ?><?php $page = get_page_by_title( 'Home' ); echo get_the_title( $page->ID ); ?></a>
            <svg class="separator" width="8" height="8" vievBox='0 0 8 8'>
                <polygon points="2.5,0 6.9,4 2.5,8 "></polygon>
            </svg>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>"
                class="breadcrumbs__item"><?php $page = get_page_by_title( 'Blog' ); echo get_the_title( $page->ID ); ?> </a>
            <svg class="separator" width="8" height="8" vievBox='0 0 8 8'>
                <polygon points="2.5,0 6.9,4 2.5,8 "></polygon>
            </svg>
            <span class="breadcrumbs__item"><?php single_term_title()?></span>
        </nav>

        <h1 class="page__title" title="<?php single_term_title()?>"> <?php single_term_title()?></h1>

    </div>
</header>
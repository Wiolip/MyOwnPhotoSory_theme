
<?php
    /*
        This is the template part for hero header on blog page (homepage)
        @package mops
    */

?>



<header class="blog__hero" id="header">
    <div class="container">

        <nav class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs__item">home</a>
            <svg class="separator" width="8" height="8" vievBox='0 0 8 8'>
                <polygon points="2.5,0 6.9,4 2.5,8 "></polygon>
            </svg>
            <a href="<?php wp_title(''); ?>" class="breadcrumbs__item"><?php wp_title(''); ?></a>
        </nav>
        <h1 class="page__title" title="<?php wp_title(''); ?>"><?php wp_title(''); ?></h1>
        <div class="blog__meta">
            <a class="blog__meta__item" href="">All</a>
            <a class="blog__meta__item" href="archive.html">Podróże</a>
            <a class="blog__meta__item" href="">Fotografia</a>

        </div>
    </div>
</header>
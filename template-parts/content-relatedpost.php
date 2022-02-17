
<?php
    /*
        This is the template part for relatedpost article
        @package mops
    */

?>

<article class=" article--related">
    <div class="image__container">
        <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( "medium" ); ?>"class="article__image" alt="" loading="lazy"></a>
    </div>
    <div class="article__items">
        <div class="post__meta">
            <li class="post__categories"><?php the_category( ' ' ) ?></li>
            <li class="post__date"><?php the_date(''); ?></li>
        </div>
        <div class="article__content">
            <h4 class="article__title"> <a href="<?php the_permalink(); ?>" class="article__title__link"><?php the_title(); ?></a></h4>
            <p class="article__excerpt"><?php the_excerpt(''); ?> </p>
        </div>
    </div>
</article>



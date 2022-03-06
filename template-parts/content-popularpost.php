<?php
    /*
        This is the  template for mostpopular post in footer area
        @package mops
    */

?>


<?global $post;

        $args = array(
        'orderby' => 'comment_count',
        'order' => 'DESC' ,
        'numberposts' => 4
    );

    $popular_posts = get_posts( $args );

    foreach( $popular_posts as $post ) :

if (has_post_thumbnail()) { ?>

    <div class="footer__post">
        <div class="footer__post__img"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( "small" ); ?>" alt="" class="footer__img"></a> </div>
      <h4 class="footer__post__heading"> <a href="<?php the_permalink(); ?>"
        class="article__title__link"><?php the_title(); ?></a></h4>
    </div>

<?php } endforeach; ?>

<?php wp_reset_postdata(); ?>
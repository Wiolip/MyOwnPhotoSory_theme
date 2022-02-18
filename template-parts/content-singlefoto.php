
<?php
    /*
        This is the template part single blogpost
        @package mops
    */

?>

<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<header id="blogpost" class="blogpost"
    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;  ">

    <div class="blogpost__hero">
        <h1 class="blogpost__mainheading"><?php wp_title(''); ?></h1>
        <p class="blogpost__excerpt"><?php the_excerpt(); ?></p>

            <ul class="blogpost__meta">
                <li class="post__categories"> </li>
                <li class="post__date post_date--2"><?php echo get_the_date('d/m/Y');?></li>
                <li class="post__commentsmeta">
                    <?php comments_popup_link('Brak komentarzy', '1 komentarz', '% Comments'); ?></li>
            </ul>

    </div>
</header>

<main>

    <div class="container pt--70">
        <div class=" blog__container--narrow">
             <?php the_content(); ?>
        </div>

        <div class="blog__container pt--50">
            <?php echo tag_clouds(); ?>

            <section class="share__icons">
                <?php echo mops_share_this(); ?>
            </section>

            <section class="blogpost__navigation  pt--70 pb--70">
                <?php get_template_part('template-parts/content','blogpost-nav');?>
            </section>
        </div>

    </div>

    <section class="blogpost__wrapper">
        <div class="container pt--100 pb--70">

            <?php get_template_part('template-parts/mops','relatedpost');?>

        </div>
    </section>

</main>


















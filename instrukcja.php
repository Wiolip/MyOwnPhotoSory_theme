wordpress template

posty blogowe: home.php index.php
front-page: front-page.php  page.php index.php
page-template
pojedynczy wpis - single.php
archuwoum kategorii - archive.php

custom post - singe-custom.php
archive= taxonomy.php

zasada page + template
single  - content-single  itd częsciowe template do wstwienia na stronę




 :::::::: header.php ::::::::::::

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <?php if(is_search()):?>
        <meta name="robots" content="noindex, nofollw" />
    <?php endif; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>


::::::::: klasy body  ::::::::::
<body <?php body_class(); ?> >


::::::::: NAVIGACJA MENU ::::::::::
W PLIKU FUNCTIONS.PHP TRZEBA ZAREJESTROWAC MENU

<?php wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container' => false,
                  'menu_class' => 'nav__list',
                  'walker' => new Walker_Nav_Primary

                    ) );
?>

::::::::: LOGO ::::::::::
ZARESJESTROWAĆ CUSTOM LOGO W FUNCTION.PHP



<div class="nav__listlogo">
    <?php
        if(function_exists('the_custom_logo')){
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id);
        }
    ?>

    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $logo[0]; ?>" alt="logo"> </a>
 </div>


::::::::SIDEBAR :::::::::
ZAREJSTROWAC W FUNCTIONS

<?php if (is_active_sidebar('Blog Sidebar')) : ?>

<?php dynamic_sidebar('Blog Sidebar'); ?>

<?php endif;  ?>



::::::::: loop wpisy blogowe ::::::::::


<?php if( have_posts() ): ?>
<?php while( have_posts() ): the_post();?>
    <?php get_template_part('template-parts/content','blog');?>

<? endwhile;?>
<? endif; ?>

//PAGINACJA - funckja w functions/php
<div class="pagination "> <?php pagination(); ?></div>

::::::::: loop wpisy blogowe ::::::::::
ZACIĄGAJA SIĘ POJEDYŃCZE ARTYKUŁY Z CONTENT-BLOG

OBRAZEK: <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( "medium" ); ?>"class="article__image" alt="" loading="lazy"></a>
KATEGORIE  <?php the_category( ' ' ) ?>
DATA <?php the_date(''); ?>  lub <?php echo get_the_date('d/m/Y');?>  lub <?php the_time( 'd.m.Y' ); ?>
TYTUŁ JAKO LINK   <a href="<?php the_permalink(); ?>" class="article__title__link"><?php the_title(); ?></a></h3>
EXCERTP <?php the_excerpt(''); ?>  można zrobic funkcje ogranicająca długość


nagłówek : breadcrumb home/blog  + tytuł strony
<?php echo esc_url(home_url('/')); ?>
<a href="<?php wp_title(''); ?>" class=""><?php wp_title(''); ?></a>
<h1 class="" title="<?php wp_title(''); ?>"><?php wp_title(''); ?></h1>


::::::::: pojedyńczy wpis struktura ::::::::::

<?php get_header(); ?>


    <?php if( have_posts() ): ?>
    <?php while( have_posts() ): the_post();?>
        <?php get_template_part('template-parts/content','single');?>

        //KOMENATZRE

    <?php  if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;?>


    <? endwhile;?>
    <? endif; ?>

<?php get_footer(); ?>


:::::::: FEATURED IMAGE NA CAŁĄ SZEROKOŚĆ I W TLE ::::::::::

<header id="blogpost" class="blogpost"
    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;  ">

TYTUŁ : <?php wp_title(''); ?>
EXCERPT:  <?php the_excerpt(); ?>
KATEGORIE:  <?php the_category( ' ' ); ?>
DATA: <?php the_time( 'd.m.Y' ); ?>
KOMENTARZE: <?php comments_popup_link('Brak komentarzy', '1 komentarz', '% Comments');?>

TREŚĆ WPISU :  <?php the_content(); ?>
CHMURA TAGÓW: <?php echo tag_clouds(); ?>  // W FUNCTIONS zrobić funckje i wywyołac echo
mozne też inaczej  <?php the_tags('<ul><li>','</li><li>','</li></ul>');?> ale lepiej pzez funkcje bo dajemy swoje klasy

SHARE ICON  <?php echo mops_share_this(); ?> // W FUNCTIONS zrobic funkcje

NAVIGACJA NASTEPNY/POPRZEDNI POST
1. ZWYKŁA
<?php posts_nav_link('separator','prelabel','nextlabel'); ?>
<?php previous_post_link(); ?>    <?php next_post_link(); ?>


2. Z OBRAZKIEM WPISU - cały kontener jest klikalny jakk i poszczególne elementy obrazek - poprzedni/nastepny - tytuł wpisu
<?php

    $prevPost = get_previous_post(true);
    if($prevPost) {
        $args = array(
            'posts_per_page' => 1,
            'include' => $prevPost->ID
        );

    $prevPost = get_posts($args);
    foreach ($prevPost as $post) {
        setup_postdata($post); ?>

            <div class="blogpost__navigation__item-prev" >
                <div class="navigation__img__container">
                    <a href="<?php the_permalink(); ?>"
                        class="navigation__img"><?php the_post_thumbnail('thumbnail'); ?></a>  //zdjęcie jako link
                </div>
                <div class="blogpost__navigation__content blogpost__navigation__content--left">
                    <a class="blogpost__navigation__label blogpost__navigation__label--right" href="<?php the_permalink(); ?>"> Poprzedni wpis</a>  tekst poprzedni jako link
                    <a href="<?php the_permalink(); ?>"class="blogpost__navigation__title"><?php the_title(); ?></a>  //tytuł posta jako link
                </div>
            </div>
        <?php
        wp_reset_postdata();
    } //end foreach
    }

    $nextPost = get_next_post(true);
    if($nextPost) {
        $args = array(
            'posts_per_page' => 1,
            'include' => $nextPost->ID
        );

        $nextPost = get_posts($args);
        foreach ($nextPost as $post) {
            setup_postdata($post); ?>


                <div class="blogpost__navigation__item-next">
                        <div class="blogpost__navigation__content blogpost__navigation__content--right">
                        <a class="blogpost__navigation__label blogpost__navigation__label--left"
                            href="<?php the_permalink(); ?>">Następny wpis</a>
                        <a href="<?php the_permalink(); ?>"
                                class="blogpost__navigation__title"><?php the_title(); ?></a>
                    </div>
                    <div class="navigation__img__container">
                        <a href="<?php the_permalink(); ?>"
                            class="navigation__img"><?php the_post_thumbnail('thumbnail'); ?></a>
                    </div>
                </div>

    <?php
        wp_reset_postdata();
    } //end foreach
    } // end if

?>



::: RELATED POST ::::
TRZEBA ZROBIĆ QUERY

<?php

    $relatedpost = new WP_Query(array(
            'post_type' => 'post',
            'category__in' => wp_get_post_categories(get_the_ID()),
            'post__not_in' => array(get_the_ID()),
            'posts_per_page' => 3,
            'orderby' => 'rand',  // RANDOME
        ));
?>

<?php if ($relatedpost->have_posts()) { ?>
            <?php while ($relatedpost->have_posts()) { ?>
            <?php $relatedpost->the_post(); ?>

                <?php get_template_part('template-parts/content','relatedpost');?>

            <?php
            } ?>

            <?php wp_reset_postdata(); ?>

 <?php } ?>



:::::::: SERACH PAGE ::::::::
<?php _e( 'Wyniki wyszukiwania dla hasła', 'mops' ); ?>: "<?php the_search_query(); ?>"

:::::::: PODPIĘCIE OBRAZKA  ::::::::
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/service7.jpg" class="image" alt="cooperation">

:::::::: PODPIĘCIE SHORTCODE  ::::::::
<?php echo do_shortcode('[mailerlite_form form_id=1]'); ?>



:::::::: ODNOŚNIK DO DOWOLNEJ STRONY  ::::::::
<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Fotografia' ) ) ); ?>" >

:::::::: TYTUŁ  DOWOLNEJ STRONY  ::::::::
<?php $page = get_page_by_title( 'Blog' ); echo get_the_title( $page->ID ); ?> </a>

:::::::: TYTUŁ STRONY tytuł posta  ::::::::
<?php wp_title(''); ?>


:::::::: ODNOŚNIK DO kategorii archive np. Azja  ale też custom taxonomy ::::::::
<h1 class="page__title" title="<?php single_term_title()?>"> <?php single_term_title()?></h1>
ale działa też wp_title


:::::::: ODNOŚNIK DO kategorii archive page  ::::::::
<h1 class="page__title" title="<?php post_type_archive_title();?>"><?php post_type_archive_title();?></h1>





:::::::: QUERY KILKU POSTÓW NP 6 NA TRONIE GŁÓWNEJ ::::::::


<?php
    $recent_post = new WP_Query(
        array(
            'posts_type' => 'post',
            'category_name'  => 'azja',  // wpisać co się chce 'slug'
            'category_name' => 'staff+news',
            'cat'      => 22,  //po numerze ID kategorii , może być wiecej po przecinku, jęsli jakiejs nie chcemy to z minusem
            'cat' => '2,6,17,38',
            'cat' => '-12,-34,-56' ,
            'posts_per_page' => 6,
            'order'    => 'ASC',  //rosnaco 1,2,3  / DESC - malejaco
            'orderby'    => 'ID',// author, title, name, type, date, modified, comment count, parent,
            'tag' => 'cooking' ,
            'tag_id' => 13, itd,
            'date_query' => array(
                array(
                    'year'  => 2012,
                    'month' => 12,
                    'day'   => 12,
                ),
        )
    );

    if ($recent_post->have_posts()) :
    while ($recent_post->have_posts()) : $recent_post->the_post();

?>
    <?php get_template_part('template-parts/content','blog');?>

<?php endwhile;
        wp_reset_postdata();
    else :
    endif;
?>


:::::::: CUSOM QUERY  ::::::::


    <?php $new_query_photo = new WP_Query(
                array(

                    'post_type' => 'photography',
                    'post_status' => 'publish',
                    'posts_per_page' => 3
                )
            );

            if ($new_query_photo->have_posts()) :
                while ($new_query_photo->have_posts()) : $new_query_photo->the_post();
            ?>
             <?php get_template_part('template-parts/content','foto');?>

            <?php endwhile;
                wp_reset_postdata();
            else :

                endif;
            ?>

albo
Display posts tagged with bob, under people custom taxonomy:
    <?php $args = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'people',
                'field'    => 'slug',
                'terms'    => 'bob',
            ),
        ),
    );
    $query = new WP_Query( $args );
    ?>


    Display posts from several custom taxonomies:

    <?php $args = array(
        'post_type' => 'post',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'movie_genre',
                'field'    => 'slug',
                'terms'    => array( 'action', 'comedy' ),
            ),
            array(
                'taxonomy' => 'actor',
                'field'    => 'term_id',
                'terms'    => array( 103, 115, 206 ),
                'operator' => 'NOT IN',
            ),
        ),
    );
    $query = new WP_Query( $args );  ?>



:::::::: POPULARNE POSTY ::::::::

    <?global $post;
        $args = array(
        'orderby' => 'comment_count',
        'order' => 'DESC' ,
        'numberposts' => 4
    );

    $popular_posts = get_posts( $args );

    foreach( $popular_posts as $post ) :

if (has_post_thumbnail()) { ?>

    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( "small" ); ?>" alt="" ></a>
     <h4 ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

<?php } endforeach; ?>


:::::::: CUSTOM POST  ::::::::
SINGLE- Fotografia zwykły lopp
content-foto:
to samo co w wzykłym single post, różnica w kategorii

KATEGORIE:   <?php echo get_the_term_list( $post->ID, 'kategoria' ); ?>



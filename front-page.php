
<?php
    /*
        This is the template for front page
        @pckage mops
    */

?>

<?php get_header() ?>

<header id="header" class="header">
       <div class="header__hero">
           <h1 class="header__heading">My Own Photo Story</h1>
           <img src="<?php echo get_template_directory_uri().'/assets/img/herotravel.svg'; ?>" class="header__img" alt="logo MyOwnPhotoStory">
       </div>
</header>

<main>
    <div class="container pt--50">
        <div class="heading__center">
            <h2 class="heading__center__title">Najnowsze wpisy</h2>
            <p class="heading__center__subtitle">
                Na blogu co jakiś czas pojawiają się nowe wpisy.
                Warto tu zaglądać!
            </p>
        </div>

        <div class="row--3 blog__article" >

            <?php
                $new_query_travel = new WP_Query(
                    array(
                        'cat'            => 5,
                        'posts_per_page' => 6
                    )
                );

                if ($new_query_travel->have_posts()) :
                while ($new_query_travel->have_posts()) : $new_query_travel->the_post();

            ?>
                <?php get_template_part('template-parts/content','blog');?>

            <?php endwhile;
                 wp_reset_postdata();
                else :
                endif;
            ?>

        </div>
    </div>



    <div class="CTA cta__post">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>"><buttonn class="btn btn--solid">Zobacz wszystkie wpisy</buttonn></a>
    </div>


    <div class="cards pt--70 pb--100">
        <div class="container">
            <div class="heading__center">
                <h2 class="heading__center__title">My Own Photo Story łączy podróże i fotografię</h2>
                <p class="heading__center__subtitle">
                Podróżowanie wcale nie musi być trudne, drogie i daleko.
                Świat jest na wyciagnięcie ręki, liczy się się tylko pomysł.
                </p>
            </div>
            <div class="row--2">
                <div class="cards__content">
                    <div class="imagebox imagebox__left">

                    </div>
                    <div class="cards__layer">
                        <p class="cards__subtitle"> Relacje z podróży, przewodniki</p>
                        <h2 class="cards__title">Podróże</h2>
                    </div>
                </div>
                <div class="cards__content">
                    <div class="imagebox imagebox__right">

                    </div>
                    <div class="cards__layer">
                        <p class="cards__subtitle"> Nauka fotografii, poradniki, obróbka zdjęć</p>
                        <h2 class="cards__title">Fotografia</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="wrapper pt--100 pb--100">
        <div class="container">
            <div class="row--2">
                <div class="wrapper__column column">

                    <div class="heading__left">
                        <h2 class="heading__left__title">Zobacz moje autorskie presety do LR mobile. Wybierz je
                            jeśli:
                        </h2>
                    </div>

                    <div>
                        <ul>
                            <li class="wrapper__item">robisz zdjęcia zarówno w RAW jak i .jpeg</li>
                            <li class="wrapper__item">jednym kliknięciem chcesz uzyskać efekt WOW</li>
                            <li class="wrapper__item">fotografujesz zarówno aparatem jak i telefonem, przy tym
                                robisz to
                                świadomie, dbając o kompozycję i kadr</li>
                            <li class="wrapper__item">prowadzisz bloga</li>
                            <li class="wrapper__item">prowadzisz Instagram i dbasz o spójność siatki i kolor wiodący
                                swego feeda</li>
                            <li class="wrapper__item">prowadzisz biznes oparty na fotografii swych produktów</li>
                            <li class="wrapper__item">stawiasz na jakość</li>
                            <li class="wrapper__item">szukasz kompleksowych rozwiązań edycyjnych</li>
                            <li class="wrapper__item">fascynuje cię obróbka zdjęć</li>
                        </ul>
                    </div>
                    <div class="btn btn--solid">Kup presety</div>
                </div>

                <div>
                    <div class="wrapper__image">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/presety.png'; ?>" alt="presety" class="image image--resize">
                    </div>
                </div>
            </div>

        </div>

    </div>




    <div class="container ">
        <div class="inner__container">
            <h2 class="inner__container__title">Zapisz się na newsletter</h2>

            <div class="webform">
                <?php echo do_shortcode('[mailerlite_form form_id=2]'); ?>
            </div>
        </div>
    </div>



    <div class="container pt--70 pb--50">
        <div class="heading__center">
            <h2 class="heading__center__title">Wpisy fotograficzne</h2>
            <p class="heading__center__subtitle">
                Chcesz robić lepsze zdjęcia? Zajrzyj do poradników i zainspiruj się</p>
        </div>

        <div class="row--3">

            <?php
            $new_query_photo = new WP_Query(
                array(
                    'cat'            => 4,
                    'posts_per_page' => 3
                )
            );

            if ($new_query_photo->have_posts()) :
                while ($new_query_photo->have_posts()) : $new_query_photo->the_post();
            ?>
                    <?php get_template_part('template-parts/content','blog');?>

            <?php endwhile;
                wp_reset_postdata();
            else :

                endif;
            ?>
        </div>


        <div class="cta__button">
            <?php
            $category_id = get_cat_ID( 4 );
            $category_link = get_category_link( $category_id );
            ?>

            <a href="/index.php?cat=4" ><buttonn class="btn btn--solid">Zobacz wszytskie wpisy foto</buttonn></a>
        </div>

    </div>


    <div class="wrapper wrapper--bg pt--100 pb--70">
        <div class="container">
            <div class="row--3 row--2--1">
                <div class="column column--2">
                    <div class="heading__left">
                        <h2 class="heading__left__title">Profesjonalne wydruki zdjęć
                        </h2>
                    </div>

                    <div>
                        <p class="wrapper__content">Nie każdy może wyjechać na koniec świata, ale każdy może mieć
                            mój kawałek świata dla
                            siebie.
                            Oferuję autorskie fotografie, drukowane na profesjonalnym, wysokiej jakości papierze
                            foto.
                            Nie są to zdjęcia stockowe dostępne hurtowo dla każdego. Zdjęcia powstały podczas moich
                            podróży, przez pryzmat mojej pasji, wrażliwości, wyobraźni i doświadczenia.
                            Kupując wydruk dokładasz cegiełkę do moich kolejnych podróży.</p>
                    </div>
                    <div class="btn btn--solid">Kup presety</div>

                </div>

                <div class="wrapper__image">
                    <img src="<?php echo get_template_directory_uri().'/assets/img/prints1.jpg'; ?>" alt="presety" class="image">
                </div>

                <div class="wrapper__image">
                    <img src="<?php echo get_template_directory_uri().'/assets/img/prints2.jpg'; ?>" alt="presety" class="image">
                </div>

            </div>
        </div>
    </div>

</main>


<?php get_footer() ?>
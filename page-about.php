<?php
    /*
        Template Name: About

        This is the custom template for about page
        @pckage mops
    */

?>

<?php get_header(); ?>

<main>
    <div class="container pt--100 pb--70 ">
        <div class="row--2">
            <div class="hero__page">
                <h3 class="hero__page__subheading">O mnie</h3>
                <h2 class="hero__page__heading">Podróże & fotografia</h2>
                <p>Cześć, jestem Wioleta, a to mój blog wypełniony kolorowymi obrazkami i opowieściami z drogi.
                    Podróże i fotografia od zawsze stanowiły ważny element mojego życia. Jestem ciekawa świata, nie
                    lubię stać w miejscu. Nowe twarze, sytuacje, miejsca – a potem możliwość dzielenia się tym
                    wszystkim na blogu, napędzają mnie do działania</p>
            </div>
            <div class="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/o-mnie.jpeg" alt="o mnie" class="image imagebox--border">
            </div>
        </div>
    </div>

    <section class="about pt--100 pb--100 ">
        <div class="container">
            <div class=" pb--70">
                <h2 class="heading__left__title">O podróżach
                </h2>
                <p class="wrapper__content content--count">Da się – ograniczenia są tylko w głowie! Chcę pokazać, że podróżowanie
                    jest z reguły łatwe, a
                    podróże nie muszą być zawsze wielkie i daleko. Cenię sobie zarówno mikro podróże do najbliższego
                    lasu, nad rzekę, kilkudniowe wypady w góry, nad morze lub na jakiś szalony city break jak i
                    kilkutygodniowe wyjazdy w odległe zakątki świata.

                    Moje podejście do podróżowania dojrzewało razem ze mną. Ostatnio coraz
                    częściej cenię sobie slow
                    travel i celebrowanie chwil. Moje wypady na krótkie citybreaki stały się niewymuszonym spacerem
                    po mieście, niż zaliczaniem kolejnych atrakcji. </p>
            </div>

            <div class="row--3 row--3--1 pt--70">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/o-mnie-2.jpeg" alt="" class="image">
                <div class="image__inner-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/o-mnie2.jpg" alt="" class="image image--top">
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/o-mnie1.jpeg" alt="" class="image">

            </div>
        </div>
    </section>

    <section>
        <div class="container pt--100 pb--70">

            <div class="row--1">
                <h2 class="heading__left__title">O fotografii
                </h2>
                <p class="content--count">Fotografia jest moją pasją i pracą jednocześnie. Świat jaki widzę, przelewam na kolorowe kadry.
                    Moim czytelnikom przybliżam zagadnienia ze świata foto, uczę podstaw fotografii, opowiadam o
                    sprzęcie i obróbce.
                    Sama przeszłam długą, wieloletnią drogę od amatora do miejsca, w którym się znajduję obecnie.
                    Uważam, że to nie sprzęt robi zdjęcia, a fotograf, który w sposób świadomy kreatywny podchodzi
                    do każdego kadru.
                    Zawsze stawiam na rozwój i szlifowanie swego warsztatu.
                    By ułatwić drogę innym, na blogu znajduje się wiele poradników na temat fotografii. Ostatnio
                    stworzyłam również autorskie presety, które mają zainspirować i pomóc innym w obróbce
                    własnych zdjęć.
                </p>
            </div>
        </div>
    </section>

    <div class="container pb--50">
        <div class="inner__container">
            <h2 class="inner__container__title">Zapisz się na newsletter</h2>
            <div class="webform">
                <?php echo do_shortcode('[mailerlite_form form_id=1]'); ?>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>
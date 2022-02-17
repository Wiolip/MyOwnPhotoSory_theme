
<?php
    /*
        Template Name: Contact

        This is the custom template for contact page
        @pckage mops
    */

?>


<?php get_header(); ?>

<main>
    <div class="container pt--100 pb--70 ">
        <div class="row--2">
            <div class="hero__page">
                <h2 class="heading__left__title hero__page__heading">Bądźmy w kontakcie
                </h2>
                <p>Na moim blogu możliwa jest reklama. Masz dla mnie propozycję współpracy? Chętnie zapoznam się ze
                    szczegółami.
                    Napisz bezpośrednio na adres:</p>
                <a href="mailto:hello@myownphotostory.pl" class="contact__link">hello@myownphotostory.pl</a>

                <p>Jesteś zainteresowany jakimś artykułem, sprawami technicznymi i chcesz żebym więcej o tym
                    napisała? Daj mi znać poprzez wiadomość</p>

                <div class="socials socials--solid">
                    <a href="https://www.instagram.com/myownphotostory" target="_blank"><i
                            class="fab fa-instagram "></i></a>
                    <a href="" target="_blank" class="social__item"><i class="fab fa-facebook"></i></a>
                    <a href="https://wiolipcreates.pl" target="_blank"><i class="fab fa-wordpress "></i></a>
                </div>
            </div>

            <div class="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/o-mnie.jpeg" alt="o mnie" class="image imagebox--border">
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
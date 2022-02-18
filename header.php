<?php
    /*
        This is the template for header
        @pckage mops
    */

?>

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

<body <?php body_class(); ?> >


    <nav class="nav navbar">
        <div class="nav__listlogo">
                <?php
                    if(function_exists('the_custom_logo')){
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src($custom_logo_id);
                    }
                ?>

                <a href="<?php echo esc_url(home_url('/')); ?>">  <img src="<?php echo $logo[0]; ?>" alt="logo"> </a>
        </div>

        <div class="nav__list">
            <div class="icon cancel-btn">
                <i class="fas fa-times"></i>
            </div>

                <?php wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container' => false,
                  'menu_class' => 'nav__list',
                  'walker' => new Walker_Nav_Primary

                    ) );
                ?>
            </div>

        <div class="socials">
            <a href="https://www.instagram.com/myownphotostory" target="_blank"><i class="fab fa-instagram "></i></a>
            <a href="https://wiolipcreates.pl" target="_blank"><i class="fab fa-wordpress "></i></a>
            <a href="" target="_blank" class="social__item"><i class="fab fa-facebook"></i></a>
        </div>

        <div class="icon menu-btn toggle">
            <i class="fas fa-bars"></i>
        </div>

    </nav>
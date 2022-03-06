<?php

/*
	========================
		ADD STYLE AND SCRIPTS
	========================
*/



// add styles in head
function mopsload_css(){

    wp_enqueue_style('reset', get_template_directory_uri() . '/assets/css/reset.css' , array(), false, 'all' );

    wp_enqueue_style('googlefonts', "https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600;700&family=Merriweather:wght@400;700&family=Rowdies:wght@300;400&display=swap", array(), false, 'all' );

    wp_enqueue_style('fontawesome', "https://use.fontawesome.com/releases/v5.15.4/css/all.css", array(), false, 'all' );

    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), false, 'all' );
}
add_action('wp_enqueue_scripts','mopsload_css');




// adds script before body
function mopsload_js(){

    wp_enqueue_script('jquery');


    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', 'jquery', false, true );

    wp_enqueue_script('fontawesome', "https://kit.fontawesome.com/c09818cd34.js" , 'jquery', false, true );

}
add_action('wp_enqueue_scripts','mopsload_js');
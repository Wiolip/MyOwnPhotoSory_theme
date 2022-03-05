<?php

/*
	========================
		CUSTOM POST TYPE AND TAXONOMY
	========================
*/



 /*  Register  - PHOTOGRAPHY Post Type nowy rodzaj postów*/

 function mops_init_post_type(){

        $labels = array(
            'name' => 'Photography',
            'singular_name' => 'Photography',
            'all_items' => 'Wszystkie wpisy foto',
            'add_new' => 'Dodaj nowy wpis',
            'add_new_item' => 'Dodaj nowy wpis',
            'edit_item' => 'Edytuj wpis',
            'new_item' => 'Nowy wpis',
            'view_item' => 'Zobacz wpis',
            'search_item' => 'Szukaj we wpisach foto',
            'not_found' =>  'Nie znaleziono żadnych wpisów',
            'not_found_in_trash' => 'Nie znaleziono żadnych wpisów w koszu',
            'parent_item_colon' => ''
        );


        $args = array(

            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'photography' ),
            'capability_type' => 'post',
            'hierarchical' => false, /* nie ma hierarchii jak strony */
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields', 'page-attributes'
            ),

            'menu_position' => 5, /* pozycja w kokpicie em */
            'show_ui' => true,  /* elementy w kokpit*/
            'menu_icon' => 'dashicons-camera',
            'show_in_rest' => true



        );

     register_post_type('photography', $args);
    }
    add_action('init', 'mops_init_post_type');



    /* rejestruje taksonioemjeie KATEGORIE w panelu menu dla fotografia*/


    function mops_custom_taxonomies() {


        $labels = array(
            'name' => 'Kategorie',
            'singular_name' => 'Kategoria',
            'search_items' => 'Szukaj kategorii',
            'all_items' => 'Wszystkie kategorie',
            'parent_item' => 'Parent kategoria',
            'parent_item_colon' => 'Parent kategoria:',
            'edit_item' => 'Edytuj kategorie',
            'update_item' => 'Aktualizuj kategorie',
            'add_new_item' => 'Dodaj nową kategorie',
            'new_item_name' => 'Nowa kategoria',
            'menu_name' => 'Kategorie'
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'kategoria' )
        );

        register_taxonomy('kategoria', array('photography'), $args);

    }

    add_action( 'init' , 'mops_custom_taxonomies' );














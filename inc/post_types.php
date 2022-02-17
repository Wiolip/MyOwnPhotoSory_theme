<?php

/*
	========================
		CUSTOM POST TYPE AND TAXONOMY
	========================
*/



 /*  Register  - PHOTOGRAPHY Post Type nowy rodzaj postów*/

 function mops_init_post_type(){

        $labels = array(
            'name' => 'Fotografia',
            'singular_name' => 'Fotografia',
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
            'rewrite' => array( 'slug' => 'fotografia' ),
            'capability_type' => 'post',
            'hierarchical' => false, /* nie ma hierarchii jak strony */
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields', 'page-attributes'
            ),

            'menu_position' => 5, /* pozycja w kokpicie em */
            'show_ui' => true,  /* elementy w kokpit*/
            'menu_icon' => 'dashicons-camera',
            // 'show_in_rest' => true



        );

     register_post_type('fotografia', $args);
    }
    add_action('init', 'mops_init_post_type');



    /* rejestruje taksonioemjeie KATEGORIE w panelu menu dla fotografia*/


    function mops_custom_taxonomies() {


        $labels = array(
            'name' => 'Foto',
            'singular_name' => 'Foto',
            'search_items' => 'Szukaj foto',
            'all_items' => 'Wszystkie foto',
            'parent_item' => 'Parent foto',
            'parent_item_colon' => 'Parent foto:',
            'edit_item' => 'Edytuj kategorie',
            'update_item' => 'Aktualizuj foto',
            'add_new_item' => 'Dodaj nową foto',
            'new_item_name' => 'Nowa foto',
            'menu_name' => 'Foto'
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'foto' )
        );

        register_taxonomy('foto', array('fotografia'), $args);

    }

    add_action( 'init' , 'mops_custom_taxonomies' );
















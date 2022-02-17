<?php

/*
	========================
		add support to admin panel
	========================
*/

if ( ! isset( $content_width ) )
    $content_width = 750;

// add functionality to admin panel

function mops_theme_support(){

    add_theme_support('title-tag');    // add dynamic title tag support - custom panel
    add_theme_support('custom-logo' );
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('widgets');
    add_theme_support('post-formats', array('gallery'));
    add_theme_support( 'align-wide' );
    add_theme_support( 'title-tag' );

        // Custom Image Sizes
    add_image_size('blog-large', 1920, 1000, array('center','center'));
    add_image_size('blog-small', 400, 300, true);

    //remove admin bar from nav
    add_theme_support( 'admin-bar', array( 'callback' => 'my_admin_bar_css') );

    }
    add_action('after_setup_theme', 'mops_theme_support');


// when adminbar is open, change position navsticky

function my_admin_bar_css() { ?>
    <style>
        .nav{
            top:3.2rem;
        }
    </style>
    <?php
     }



// Register menus

function mops_menus(){

     $locations = array(
        'primary' => 'Primary',
        'footer' => 'Footer',
        'mobile' => 'Mobile'
        );
    register_nav_menus($locations);
    }

    add_action('init', 'mops_menus');


function special_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);





// Register Sidebars
function mops_sidebars(){
	register_sidebar(
		array(
			'name' => 'Page Sidebar',
			'id' => 'page-sidebar',
            'before_widget' => '<div id="%1$s" class="aside %2$s">',
		    'after_widget'  => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	));

	register_sidebar(
		array(
			'name' => 'Blog Sidebar',
			'id' => 'blog-sidebar',
            'before_widget' => '<div id="%1$s" class="%2$s">',
		    'after_widget'  => '</div>',
			'before_title' => '<h3> ',
			'after_title' => '</h3>'

	));
}
add_action('widgets_init','mops_sidebars');


// additional transparent logo

add_action('customize_register', 'transparent_logo_customize_register');

function transparent_logo_customize_register($wp_customize){
    $wp_customize->add_setting('transparent_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'transparent_logo', array(
    'label'    => __('Transparent Logo', 'store-front'),
    'section'  => 'title_tagline',
    'settings' => 'transparent_logo',
    'priority' => 4,
)));
}


 //adding setting for copyright text
 add_action('customize_register', 'theme_copyright_customizer');

 function theme_copyright_customizer($wp_customize) {
     //adding section in wordpress customizer
     $wp_customize->add_section('copyright_extras_section', array(
         'title'          => 'Copyright Text Section'
     ));

     //adding setting for copyright text
     $wp_customize->add_setting('text_setting', array(
         'default'        => 'Default Text For copyright Section',
     ));

     $wp_customize->add_control('text_setting', array(
         'label'   => 'Copyright text',
         'section' => 'copyright_extras_section',
         'type'    => 'text',
     ));
 }


/*
	========================
		SINGLE POST CUSTOM FUNCTIONS
	========================
*/



// excerpt lenght
function mops_excerpt_length($length){
    return 25;
    }
add_filter('excerpt_length', 'mops_excerpt_length', 999);



// Pagination
function pagination() {
    global $wp_query;
    $big = 999999999;

    echo paginate_links( array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'total'     => $wp_query->max_num_pages,
        'current'   => max(1, get_query_var('paged')),
        'prev_text' => ' Poprzedni',
        'next_text' => ' Następny'
    ));
}




// width for blog posts

function mops_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'mops_content_width', 750 );
}
add_action( 'after_setup_theme', 'mops_content_width', 0 );



//tags
function tag_clouds(){
    return get_the_tag_list( '<div class=" tagclouds blogpost__tag">', '  ', '</div>' );
}


// share icon single blogpost

function mops_share_this(){

    $output .= '<h4>Czy wiesz, że wysyłając ten artykuł dalej pomagasz mi tworzyć kolejne treści?</h4>';

    $title = get_the_title();
	$permalink = get_permalink();

    $twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' );

    $twitter = 'https://twitter.com/intent/tweet?text=Hey! Read this: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
    $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
    $pinterest = 'http://pinterest.com/pin/create/button/?url=' . $permalink;
    $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $permalink;


    $output .= '<div>';
    $output .= '<a href="' . $twitter . '" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>';
    $output .= '<a href="' . $facebook . '" target="_blank" rel="nofollow"><i class="fab fa-facebook"></i></a>';
    $output .= '<a href="' . $pinterest . '" target="_blank" rel="nofollow"><i class="fab fa-pinterest-p"></i></a>';
    $output .= '<a href="' . $linkedin . '" target="_blank" rel="nofollow"><i class="fab fa-linkedin-in"></i></a>';
    $output .= '</div>';

    return $output;
}

// comments nav
function mops_get_post_navigation(){

	if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):

		require( get_template_directory() . '/inc/templates-parts/mops-comment-nav.php' );

	endif;

}



// function get_the_terms( $post, $taxonomy ) {
//     $post = get_post( $post );
//     if ( ! $post ) {
//         return false;
//     }

//     $terms = get_object_term_cache( $post->ID, $taxonomy );
//     if ( false === $terms ) {
//         $terms = wp_get_object_terms( $post->ID, $taxonomy );
//         if ( ! is_wp_error( $terms ) ) {
//             $term_ids = wp_list_pluck( $terms, 'term_id' );
//             wp_cache_add( $post->ID, $term_ids, $taxonomy . 'foto' );
//         }
//     }

//     $terms = apply_filters( 'get_the_terms', $terms, $post->ID, $taxonomy );

//     if ( empty( $terms ) ) {
//         return false;
//     }

//     return $terms;
// }





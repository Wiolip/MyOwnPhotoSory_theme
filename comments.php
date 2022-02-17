<?php
    /*
        This is the template for comments
        @pckage mops
    */

    if( post_password_required() ){
        return;
    }
?>


<div class="container  pb--70">
    <div class="blog__container">


        <?php
		if( have_comments() ):
            // we have comments
        ?>
        <h2 class="comment-title">
            <?php

			printf(
				esc_html( _nx( '1 komentarz do wpisu &ldquo;%2$s&rdquo;', '%1$s komentarzy do wpisu &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'mops' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
		    ?>
        </h2>

        <?php mops_get_post_navigation(); ?>

        <ul class="comment-list">

            <?php

			$args = array(
				'walker'			=> null,
				'max_depth' 		=> '',
				'style'				=> 'ol',
				'callback'			=> null,
				'end-callback'		=> null,
				'type'				=> 'all',
				'reply_text'		=> 'Odpowiedz',
				'page'				=> '',
				'per_page'			=> '',
				'avatar_size'		=> 50,
				'reverse_top_level' => null,
				'reverse_children'	=> '',
				'format'			=> 'html5',
				'short_ping'		=> false,
				'echo'				=> true
			);

			wp_list_comments( $args );
		    ?>

        </ul>

        <?php endif; ?>


        <?php


        $comment_cookies_1 = ' Wyrażam zgodę na przesyłanie na mój adres mailowy informacji o nowościach, promocjach, produktach i usługach wysyłanych przez myownphotostory.pl oraz akceptuję';
        $comment_cookies_2 = ' politykę prywatności strony.';

            $fields = array(
                'author' => '<div class="blogpost__form__items"><input id="author" name="author" type="text" class="blogpost__form__input" placeholder="Imię*" required value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" />',


                'email' =>
				 '<input id="email" name="email" class="blogpost__form__input" type="text"  placeholder="Email*" required value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" />',

                'url' =>
				'<input id="url" name="url" class="blogpost__form__input" type="text" placeholder="Strona www" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',

                'cookies' => '<input type="checkbox" id="rodo" required class="checkbox__input"> ' . '<span>' . $comment_cookies_1 . '</span>' .  '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>'

            );


            $args = array(
                'comment_field' =>
				'<textarea id="comment" class="blogpost__form__comments" name="comment" placeholder="Dodaj komentarz*" required "></textarea>',
                'class_container' => 'blogpost__comments',
                'class_form' => 'blogpost__form',
                'class_submit' => 'blogpost__form__submit',
                'label_submit' => __( 'Opublikuj komentarz' ),
                'title_reply' => ' Podobał ci się wpis? Masz jakieś pytania? Zostaw komentarz',
                'title_reply_before' => '<h3 id="reply-title" class="blogpost__comments__title">',
                'title_reply_after' => '</h3>',
                'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                'comment_notes_before' => ' '


            );

         ?>

        <?php comment_form( $args ); ?>





    </div>
</div>
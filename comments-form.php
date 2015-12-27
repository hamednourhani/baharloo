
<?php if ( comments_open() ) : ?>
    <div class="leave-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 center">

                    <h2><?php _e( 'Leave a reply', 'health-plus' ); ?></h2>

                    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>

                        <p><?php sprintf( __( 'You must be <a href="%s">logged in </a>to post a comment.', 'health-plus' ), wp_login_url( get_permalink() ) ); ?></p>

                    <?php
                    else :

                        $fields =  array(
                            '<div class="col-sm-4 form-less"><input type="text" id="name" name="author" placeholder="' . __( 'Name', 'health-plus' ) . '" value="' . esc_attr( $comment_author ) . '" />',
                            '<input type="text" id="email" name="email" placeholder="' . __( 'Email', 'health-plus' ) . '" value="' . esc_attr ( $comment_author_email ) . '" />',
                            '<input type="text" id="url" name="url" placeholder="' . __( 'Website', 'health-plus' ) . '" value="' . esc_attr ( $comment_author_url ) . '" /></div>'
                        );
                        $comments_args = array(
                            'fields'                => $fields,
                            'title_reply'           => '',
                            'title_reply_to'        => '',
                            'comment_notes_after'   => '',
                            'comment_notes_before'  => '',
                            'cancel_reply_link'	    => '',
                            'label_submit'          => __( 'Submit', 'health-plus' ),
                            'comment_field'         => '<div class="col-sm-6 text-area"><textarea name="comment" id="comment-textarea" cols="30" rows="3" placeholder="' . __( 'Message', 'health-plus' ) . '"></textarea></div>',
                        );
                        comment_form($comments_args);

                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
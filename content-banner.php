<?php global $hnmOpt; ?>

<div class="inner-banner">
    <?php
    if( has_post_thumbnail() && !is_blog() ):

        the_post_thumbnail( 'full' );

    else:

        echo '<img src="' . esc_url( $hnmOpt['page_img']['url'] ) . '" alt="" />';

    endif;
    ?>
    <div class="container">
        <div class="row">

            <h2>
                <?php
                if( is_home() ) {

                    echo  _x( 'Blog', 'blog page title', 'health-plus' );

                } elseif ( is_archive() ) {

                    echo _x( 'Archive', 'archive page title', 'health-plus' );

                } elseif ( is_search() ) {

                    echo _x( 'Search', 'search page title', 'health-plus' );

                } elseif ( is_404() ) {

                    echo _x( '404 Not Found', 'error page title', 'health-plus' );

                } else {

                    the_title();

                }
                ?>
            </h2>

        </div>
    </div>
</div>
<?php

/* Custom Heading */

function hnm_custom_heading( $attributes, $content = null ) {

    extract( shortcode_atts( array(
        'span' 	=> '',
        'class' => ''
    ), $attributes ) );

    if( !empty( $span ) ) {
        $span = '<span>' . $span . '</span>';
    } else {
        $span = '';
    }

    if( !empty( $class ) ) {
        $class = 'class="title-grp ' . $class . '"';
    } else {
        $class = 'class="title-grp"';
    }

    ob_start();

    echo '<h2 ' . $class . '>' . $span . ' ' . wp_kses( $content, array() ) . '</h2>';

    return ob_get_clean();

}

add_shortcode( 'custom_heading', 'hnm_custom_heading' );

/* Contact Address */

function hnm_contact_address( $attributes, $content = null ) {

    extract( shortcode_atts( array(
        'location' 	=> '',
        'email'     => '',
        'phone'     => ''
    ), $attributes ) );

    if( empty( $location ) ) {
        $location = '';
    }

    if( empty( $email ) ) {
        $email = '';
    }

    if( empty( $phone ) ) {
        $phone = '';
    }

    ob_start();

    echo '<div class="col-lg-5 col-md-4 ids">
                <address class="location">' . $location . '</address>
            </div>
            <div class="col-lg-4 col-md-4 ids">
                <address class="message">' . $email . '</address>
            </div>
            <div class="col-lg-3 col-md-4 ids">
                <address class="phone">' . $phone . '</address>
            </div>';

    return ob_get_clean();

}

add_shortcode( 'address', 'hnm_contact_address' );

/* Home: Blog Posts */

function hnm_home_blog_posts( $attributes, $content = null ) {

    extract( shortcode_atts( array(
        'limit' 	    => '75',
        'categories' 	=> '',
        'class'         => ''
    ), $attributes ) );

    ob_start();

    if( !empty( $limit ) ) {
        $excertp_limit = $limit;
    } else {
        $excertp_limit = 75;
    }

    if( !empty( $class ) ) {
        $class = $class;
    } else {
        $class = '';
    }

    $post_args = array(
        'post_type'         => 'post',
        'posts_per_page'    => -1
    );

    if( !empty($categories) )
    {
        $post_args['tax_query'] = array(
            array (
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $categories,
            ),
        );
    }

    $posts = new WP_Query( $post_args );

    echo '<div class="all-news ' . $class . '"><ul class="disast">';

    if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post();

    echo '<li>
            	<div class="news-date">' . get_the_post_thumbnail($post_id,array( 68, 68) ) . '</div>
                <div class="news-text">
                    <h2><a href="'.get_post_permalink().'">' . get_the_title() . '</a></h2>
                    <p>' . hnm_get_excerpt( $excertp_limit ) . '</p>
                </div>
            </li>';

    endwhile; wp_reset_postdata(); endif;

    echo '</ul></div>';

    return ob_get_clean();

}

add_shortcode( 'blog_posts', 'hnm_home_blog_posts' );

/* Home: Doctors */

function hnm_home_doctors( $attributes, $content = null ) {

    extract( shortcode_atts( array(
        'categories' 	=> ''
    ), $attributes ) );

    ob_start();

    $docs_args = array(
        'post_type'         => 'teams',
        'posts_per_page'    => -1
    );

    if( !empty($categories) )
    {
        $docs_args['tax_query'] = array(
            array (
                'taxonomy' => 'team-category',
                'field'    => 'slug',
                'terms'    => $categories,
            ),
        );
    }

    $counter = 1;

    $docs = new WP_Query( $docs_args );

    echo '<div class="all-doc"><ul class="sliding"><li>';

    if ( $docs->have_posts() ) : while ( $docs->have_posts() ) : $docs->the_post();

        echo '<div class="col-sm-6">
                <div class="white-bx">';

                    echo get_the_post_thumbnail();

                    echo '<div class="letter"><h2><span>' . $counter . get_the_title() . '</span>' . get_post_meta( get_the_ID(), 'doc_designation', true ) . '</h2></div>';

                    echo '<div class="social-media">';

                        $icons = array( 'facebook', 'twitter', 'google-plus', 'pinterest', 'linkedin', 'youtube-play', 'foursquare',
                            'instagram', 'skype', 'tumblr', 'flickr', 'dribbble' );
                        foreach( $icons as $icon )
                        {
                            $icon_url = get_post_meta( get_the_ID(), 'pt_team_' . $icon, true );
                            if( !empty( $icon_url ) )
                            {
                                echo '<a href="' . esc_url( $icon_url ) . '" class="fa fa-' . $icon . '" target="_blank"></a>';
                            }
                        }

                    echo '</div>';

        echo '</div>
            </div>';

        if( $counter%4 == 0 ) echo '</li>';

        $counter++;

    endwhile; wp_reset_postdata(); endif;

    echo '</ul></div>';

    return ob_get_clean();

}

add_shortcode( 'home_doctors', 'hnm_home_doctors' );
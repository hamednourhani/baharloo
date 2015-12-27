<?php

/* Features Plugin */

function hnm_features_before_wrap() {
    return '<div class="row">';
}
add_filter( 'pt_features_before', 'hnm_features_before_wrap' );

function hnm_features_after_wrap() {
    return '</div>';
}
add_filter( 'pt_features_after', 'hnm_features_after_wrap' );

/* Accordions Plugin */

function hnm_accordions_before_wrap() {
    return '<ul class="pt-accordions">';
}
add_filter( 'pt_accordions_before', 'hnm_accordions_before_wrap' );

function hnm_accordions_after_wrap() {
    return '</ul>';
}
add_filter( 'pt_accordions_after', 'hnm_accordions_after_wrap' );


/* Teams Plugin */

function hnm_teams_labels( $labels ) {
    $labels = array(
        'name'                => __( 'Doctors',  'health-plus' ),
        'singular_name'       => __( 'Doctor', 'health-plus' )
    );
    return $labels;
}
add_filter( 'pt_teams_labels', 'hnm_teams_labels' );

/* Testimonials Plugin */

function hnm_testimonials_before_wrap() {
    return '<div class="happy-wrap"><ul class="happy-clients">';
}
add_filter( 'pt_testimonials_before', 'hnm_testimonials_before_wrap' );

function hnm_testimonials_after_wrap() {
    return '</ul></div>';
}
add_filter( 'pt_testimonials_after', 'hnm_testimonials_after_wrap' );
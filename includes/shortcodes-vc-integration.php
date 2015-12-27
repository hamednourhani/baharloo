<?php

function hnm_custom_heading_vc_map() {

    vc_map(
        array(
            "name"          => __( "Health+: Heading", "health-plus" ),
            "description"   => __( "Insert a beautiful custom heading.", "health-plus" ),
            "base"          => "custom_heading",
            "category"      => "Health Plus",
            "params"        => array (
                array(
                    "type"          => "textfield",
                    "heading"       => __( "Heading Span", "health-plus" ),
                    "param_name"    => "span",
                    'admin_label'   => true,
                ),
                array(
                    "type"          => "textarea",
                    "heading"       => __( "Heading Content", "health-plus" ),
                    "param_name"    => "content",
                    'admin_label'   => true,
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => __( "Extra Class", "health-plus" ),
                    "param_name"    => "class",
                    'admin_label'   => true,
                ),
            )
        )
    );

}

function hnm_contact_address_vc_map() {

    vc_map(
        array(
            "name"          => __( "Health+: Address", "health-plus" ),
            "description"   => __( "Insert address, email and phone number on contact form.", "health-plus" ),
            "base"          => "address",
            "category"      => "Health Plus",
            "params"        => array (
                array(
                    "type"          => "textarea",
                    "heading"       => __( "Location", "health-plus" ),
                    "param_name"    => "location",
                    'admin_label'   => true,
                ),
                array(
                    "type"          => "textarea",
                    "heading"       => __( "Email", "health-plus" ),
                    "param_name"    => "email",
                    'admin_label'   => true,
                ),
                array(
                    "type"          => "textarea",
                    "heading"       => __( "Phone", "health-plus" ),
                    "param_name"    => "phone",
                    'admin_label'   => true,
                ),
            )
        )
    );

}

function hnm_home_posts_vc_map() {

    vc_map(
        array(
            "name"          => __( "Health+: Posts", "health-plus" ),
            "description"   => __( "Show blog posts on home page.", "health-plus" ),
            "base"          => "blog_posts",
            "category"      => "Health Plus",
            "params"        => array (
                array(
                    "type"          => "textfield",
                    "heading"       => __( "Categories", "health-plus" ),
                    "description"   => __( "Filter posts by categories. Insert blog category slugs separated by comma.", "health-plus" ),
                    "param_name"    => "categories",
                    'admin_label'   => true
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => __( "Characters Limit", "health-plus" ),
                    "description"   => __( "Enter limit of characters to show for post contents.", "health-plus" ),
                    "param_name"    => "limit",
                    'admin_label'   => true
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => __( "Extra Class", "health-plus" ),
                    "description"   => __( "Add an extra class and then style it in your stylesheet.", "health-plus" ),
                    "param_name"    => "class",
                    'admin_label'   => true
                )
            )
        )
    );

}

function hnm_home_teams_vc_map() {

    vc_map(
        array(
            "name"          => __( "Health+: Doctors", "health-plus" ),
            "description"   => __( "Show doctors on home page.", "health-plus" ),
            "base"          => "home_doctors",
            "category"      => "Health Plus",
            "params"        => array (
                array(
                    "type"          => "textfield",
                    "heading"       => __( "Categories", "health-plus" ),
                    "description"   => __( "Filter posts by categories. Insert blog category slugs separated by comma.", "health-plus" ),
                    "param_name"    => "categories",
                    'admin_label'   => true
                )
            )
        )
    );

}

if ( class_exists('Vc_Manager') ) {
    add_action( 'vc_before_init', 'hnm_custom_heading_vc_map' );
    add_action( 'vc_before_init', 'hnm_contact_address_vc_map' );
    add_action( 'vc_before_init', 'hnm_home_posts_vc_map' );
    add_action( 'vc_before_init', 'hnm_home_teams_vc_map' );
}
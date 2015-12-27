<?php

if ( ! class_exists( 'ReduxFramework' ) ) {
    return;
}

$opt_name = "hnmOpt";

$theme = wp_get_theme();

$args = array(
    'opt_name'             => 'hnmOpt',
    'display_name'         => $theme->get( 'Name' ) . ' ' . __( 'Options', 'health-plus' ),
    'display_version'      => $theme->get( 'Version' ),
    'menu_type'            => 'submenu',
    'allow_sub_menu'       => true,
    'menu_title'           => __( 'Health+ Options', 'health-plus' ),
    'page_title'           => $theme->get( 'Name' ) . ' ' . __( 'Options', 'health-plus' ),
    'google_api_key'       => '',
    'google_update_weekly' => false,
    'async_typography'     => true,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-admin-generic',
    'admin_bar_priority'   => 50,
    'global_variable'      => '',
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => false,
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => '',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => 'hnm-options',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true
);

Redux::setArgs( $opt_name, $args );

// GENERAL
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-globe',
    'title'  => __( 'General', 'health-plus' ),
    'id'     => 'general',
    'fields' => array(
        array(
            'id'    => 'envato_api_key',
            'type'  => 'text',
            'title' => __('Item Purchase Code', 'health-plus'),
            'desc'  => __('Insert item purchase code to receive automatic theme updates.', 'health-plus'),
            'std'   => ''
        ),
        array(
            "title"     => __( 'Upload Favicon', 'health-plus' ),
            "desc"      => __( 'A transparent PNG image of size 16x16 or an ICO image file can be uploaded for a favicon.', 'health-plus' ),
            "id"        => "favicon",
            "default"   => array( 'url' => get_template_directory_uri().'/favicon.ico' ),
            'url'       => true,
            "type"      => "media"
        ),
        array(
            'id'       => 'site_layout',
            'type'     => 'image_select',
            'title'    => __( 'Site Layout', 'health-plus' ),
            'desc'     => __( 'Select a style for the site. e.g. Boxed or Full Width', 'health-plus' ),
            'default'  => 'var2',
            'options'  => array(
                'var2'     => array(
                    'alt'   => 'Boxed',
                    'img'   => get_template_directory_uri() . '/images/bx.png'
                ),
                'var1'     => array(
                    'alt'   => 'Full Width',
                    'img'   => get_template_directory_uri() . '/images/fw.png'
                )
            )
        ),
        array(
            'id'       => 'sidebar_pos',
            'type'     => 'image_select',
            'title'    => __( 'Blog Sidebar', 'health-plus' ),
            'desc'     => __( 'Sidebar Position for blog pages. i.e. Blog, Search, Archives and Post detail pages.', 'health-plus' ),
            'default'  => 'right',
            'options'  => array(
                'right'     => array(
                    'alt'   => 'Right Sidebar',
                    'img'   => get_template_directory_uri() . '/images/rs.png'
                ),
                'left'     => array(
                    'alt'   => 'Left Sidebar',
                    'img'   => get_template_directory_uri() . '/images/ls.png'
                )
            )
        ),
        array(
            "title"     => __( 'Default Banner Image', 'health-plus' ),
            "desc"      => __( 'Upload an image to be used as a default banner image if no banner image is set in individual page.', 'health-plus' ),
            "id"        => "page_img",
            "type"      => "media",
            'url'       => true
        ),
        array (
            'id'    => 'news_cats',
            'title' => __( 'News Categories', 'health-plus' ),
            'desc'  => __( 'Select categories for news page template to show their posts on News page template. Make sure that you have an empty page with News page template assigned to it.', 'health-plus' ),
            'type'  => 'select',
            'args'  => array (
                'hide_empty'    => true,
                'taxonomy'      => array ( 0 => 'category' )
            ),
            'data'  => 'category',
            'multi' => true,
            'placeholder' => 'Select a Category'
        )
    )
) );

// HEADER
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-cogs',
    'title'  => __( 'Header', 'health-plus' ),
    'fields' => array(
        array(
            "title"     => __( 'Upload Logo', 'health-plus' ),
            "desc"      => __( 'Upload your logo for the site here. This will display in the header section.', 'health-plus' ),
            "id"        => "logo",
            "url"       => true,
            "type"      => "media"
        ),
        array(
            'title'     => __( 'Top Bar Phone #', 'health-plus' ),
            'desc'      => __( 'Enter some text to display in top bar. e.g. Phone No', 'health-plus' ),
            'id'        => 'phone',
            'type'      => 'text',
            'default'   => ''
        ),
        array(
            'title'     => __( 'Top Bar Email', 'health-plus' ),
            'desc'      => __( 'Enter some text to display in top bar besides Phone no. e.g. Email', 'health-plus' ),
            'id'        => 'email',
            'type'      => 'text',
            'default'   => ''
        )
    )
) );

// HOME
Redux::setSection( $opt_name, array(
    'icon'   => 'el-icon-home',
    'title'  => __( 'Home', 'health-plus' )
) );

Redux::setSection( $opt_name, array(
    'title'         => __( 'Banner: Home v1', 'health-plus' ),
    'subsection'    => true,
    'fields'        => array(
        array(
            "desc"      => __( 'Will apply to pages with template Home v1 only.', 'health-plus' ),
            "id"        => "banner_info",
            "type"      => "info",
            'style'     => 'warning'
        ),
        array(
            "title"     => __( 'Banner Title', 'health-plus' ),
            "desc"      => __( 'Title to show on banner besides the appointment form.', 'health-plus' ),
            "id"        => "banner_title",
            "type"      => "text"
        ),
        array(
            'title'     => __( 'Banner Timing', 'health-plus' ),
            'desc'      => __( 'Wok times schedule to display on banner. HTML is allowed.', 'health-plus' ),
            'id'        => 'banner_times',
            'type'      => 'textarea',
            'validate'  => 'html'
        ),
        array(
            'title'     => __( 'Banner Contents', 'health-plus' ),
            'desc'      => __( 'Contents to show on banner. HTML is allowed.', 'health-plus' ),
            'id'        => 'banner_contents',
            'type'      => 'textarea',
            'validate'  => 'html'
        )
    )
) );

Redux::setSection( $opt_name, array(
    'title'         => __( 'Banner: Home v2', 'health-plus' ),
    'subsection'    => true,
    'fields'        => array(
        array(
            "desc"      => __( 'Will apply to pages with template Home v2 only.', 'health-plus' ),
            "id"        => "banner_info_b",
            "type"      => "info",
            'style'     => 'warning'
        ),
        array(
            "title"     => __( 'Banner Title', 'health-plus' ),
            "desc"      => __( 'Title to show on banner besides the appointment form.', 'health-plus' ),
            "id"        => "banner_title_b",
            "type"      => "text"
        ),
        array(
            'title'     => __( 'Banner Contents', 'health-plus' ),
            'desc'      => __( 'Contents to show on banner. HTML is allowed.', 'health-plus' ),
            'id'        => 'banner_contents_b',
            'type'      => 'textarea',
            'validate'  => 'html'
        )
    )
) );

Redux::setSection( $opt_name, array(
    'title'         => __( 'Appointment Form', 'health-plus' ),
    'subsection'    => true,
    'fields'        => array(
        array(
            "title"     => __( 'Form Title', 'health-plus' ),
            "desc"      => __( 'Title to show before the form.', 'health-plus' ),
            "id"        => "appt_form_title",
            "type"      => "text"
        ),
        array(
            "desc"      => __( 'Make sure that you have Contact Form 7 plugin installed and activated.', 'health-plus' ),
            "id"        => "appt_form_info",
            "type"      => "info",
            'style'     => 'warning'
        ),
        array(
            'title'     => __( 'Form Shortcode', 'health-plus' ),
            'desc'      => __( 'Insert contact form 7 shortcode here.', 'health-plus' ),
            'id'        => 'appt_form',
            'type'      => 'text',
        )
    )
) );

// FOOTER
Redux::setSection( $opt_name, array(
    'icon'      => 'el-icon-cogs',
    'title'     => __( 'Footer', 'health-plus' ),
    'fields'    => array(
        array(
            'id'       => 'footer_subscription',
            'type'     => 'switch',
            'title'    => __( 'Subscription Form', 'health-plus' ),
            'desc'     => __( 'Show / Hide subscription form in footer above the widgets area.', 'health-plus' ),
            'default'  => true,
            'on'       => 'Show',
            'off'      => 'Hide'
        ),
        array(
            "desc"      => __( 'Make sure that Mailchimp for Wordpress plugin is installed and active.', 'health-plus' ),
            "id"        => "footer_subscription_info",
            "type"      => "info",
            'style'     => 'info',
            'required'  => array( 'footer_subscription', 'equals', true )
        ),
        array(
            "title"     => __('Subscription Title', 'health-plus'),
            "desc"      => __('Title to show before the subscription form.','health-plus'),
            "id"        => "footer_subscription_title",
            "type"      => "text",
            'validate'  => 'html'
        ),
        array(
            "title"     => __('Copyright Text', 'health-plus'),
            "desc"      => __('Copyright information at the bottom. Basic HTML tags are allowed.','health-plus'),
            "id"        => "footer_text",
            "type"      => "textarea",
            'validate'  => 'html'
        )
    )
) );
<?php

add_action( 'admin_menu', 'xv_welecome_create_menu' );

function xv_welecome_create_menu() {

    add_theme_page( null, __( 'Health+ Import', 'hnm' ), 'administrator', 'hnm-import', 'xv_theme_settings_page');

}

function xv_theme_settings_page() {

    echo '<div class="about-wrap">';

    _e( '<h1>Health Plus Import Demo</h1>', 'health-plus' );

    if( isset( $_GET['import_data'] ) == 1 ) {

        hnm_import_data();

        _e( "<p class='import-notice import-success'><strong>It's done.</strong><br><em>If you are getting errors please check all required and recommended plugins are installed and activated. You can ignore 'already exist' notifications.</em></p>", 'health-plus' );

        $_GET['import_data'] = 0;

    } else {

        _e( '<p class="import-notice import-warning">Warning: Make sure that all required and recommended plugin are installed and activated before importing demo data.</p>', 'health-plus' );

        _e( '<p class="about-text">Import all the demo contents in 1 click. It will import all posts, pages, menus and all plugins data with categories, tags and attachments.</p>', 'health-plus' );

        echo sprintf( '<a id="import-btn" class="dashicons-before dashicons-migrate" href="?page=hnm-import&import_data=1">   %s</a>', __( 'Import Contents', 'health-plus' ) );

    }

    echo sprintf( '<br><br><br><a href="?page=hnm-setup">&leftarrow;  %s</a>', __( 'Back to Health Plus Setup', 'health-plus' ) );

    echo '</div>';

}
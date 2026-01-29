<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class RCWM_Admin {

    public function register() {
        add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    public function add_admin_menu() {
        add_menu_page(
            'RCWM Dashboard',
            'RCWM Dashboard',
            'manage_options',
            'rcwm-dashboard',
            [ $this, 'render_dashboard' ],
            'dashicons-chart-area'
        );
    }

    public function render_dashboard() {
    ?>
    <div class="wrap">
        <h1>RCWM Dashboard</h1>
        <p>If you see this text, PHP rendering works.</p>
        <div id="rcwm-admin-root">
            <p>React will load here...</p>
        </div>
    </div>
    <?php
}


    public function enqueue_assets( $hook ) {

    // Debug: uncomment if needed
    // error_log( $hook );

    if ( $hook !== 'toplevel_page_rcwm-dashboard' ) {
        return;
    }

    wp_enqueue_script(
        'rcwm-admin-js',
        RCWM_PLUGIN_URL . 'assets/admin.js',
        [ 'wp-element' ],
        time(),
        true
    );

    wp_localize_script(
        'rcwm-admin-js',
        'RCWM_API',
        [
            'url'   => rest_url( 'rcwm/v1/editorial' ),
            'nonce' => wp_create_nonce( 'wp_rest' ),
        ]
    );
}


}

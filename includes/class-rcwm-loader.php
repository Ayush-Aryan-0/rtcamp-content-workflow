<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class RCWM_Loader {

    public function run() {
        $this->load_dependencies();
        $this->register_hooks();
    }

    private function load_dependencies() {
        require_once RCWM_PLUGIN_PATH . 'includes/class-rcwm-post-type.php';
        require_once RCWM_PLUGIN_PATH . 'api/class-rcwm-rest.php';
        require_once RCWM_PLUGIN_PATH . 'admin/class-rcwm-admin.php';

    }

    private function register_hooks() {
        ( new RCWM_Post_Type() )->register();
        ( new RCWM_REST() )->register();
        ( new RCWM_Admin() )->register();

    }
}

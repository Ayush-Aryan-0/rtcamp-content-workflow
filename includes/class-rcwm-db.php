// Handles custom database operations for RCWM plugin
<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class RCWM_DB {

    public static function create_tables() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'rcwm_logs';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            post_id BIGINT UNSIGNED NOT NULL,
            action VARCHAR(100) NOT NULL,
            user_id BIGINT UNSIGNED NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );
    }
    public static function insert_log( $post_id, $action ) {
    global $wpdb;

    $table = $wpdb->prefix . 'rcwm_logs';

    $wpdb->insert(
        $table,
        [
            'post_id' => $post_id,
            'action'  => sanitize_text_field( $action ),
            'user_id' => get_current_user_id(),
        ],
        [ '%d', '%s', '%d' ]
    );
}

}

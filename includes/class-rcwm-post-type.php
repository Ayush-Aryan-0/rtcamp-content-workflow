<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class RCWM_Post_Type {

    public function register() {
        add_action( 'init', [ $this, 'register_editorial_post_type' ] );
    }

    public function register_editorial_post_type() {

        $labels = [
            'name'               => 'Editorial Contents',
            'singular_name'      => 'Editorial Content',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Content',
            'edit_item'          => 'Edit Content',
            'new_item'           => 'New Content',
            'view_item'          => 'View Content',
            'search_items'       => 'Search Content',
            'not_found'          => 'No content found',
            'not_found_in_trash' => 'No content found in Trash',
        ];

        $args = [
            'labels'        => $labels,
            'public'        => true,
            'has_archive'   => true,
            'rewrite'       => [ 'slug' => 'editorial' ],
            'show_in_rest'  => true, // Important for React
            'supports'      => [ 'title', 'editor', 'author' ],
            'menu_icon'     => 'dashicons-edit',
        ];

        register_post_type( 'rcwm_editorial', $args );
    }
}

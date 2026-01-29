<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class RCWM_REST {

    public function register() {
        add_action( 'rest_api_init', [ $this, 'register_routes' ] );
    }

    public function register_routes() {

        register_rest_route( 'rcwm/v1', '/editorial', [
            'methods'  => 'GET',
            'callback' => [ $this, 'get_editorial_contents' ],
            'permission_callback' => '__return_true'
        ] );
    }

    public function get_editorial_contents() {

        $posts = get_posts([
            'post_type'      => 'rcwm_editorial',
            'posts_per_page' => -1,
        ]);

        $data = [];

        foreach ( $posts as $post ) {
            $data[] = [
                'id'     => $post->ID,
                'title'  => $post->post_title,
                'author' => get_the_author_meta( 'display_name', $post->post_author ),
                'status' => $post->post_status,
            ];
        }

        return rest_ensure_response( $data );
    }
}

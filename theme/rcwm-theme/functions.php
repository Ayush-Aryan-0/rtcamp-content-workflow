<?php

function rcwm_theme_assets() {
    wp_enqueue_style( 'rcwm-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'rcwm_theme_assets' );

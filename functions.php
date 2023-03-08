<?php

function olena_enqueue_scripts(){

    wp_register_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css'), 'all' );
    wp_register_style( 'bootstrap-5-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css', [], false, 'all' );

    wp_register_script('scripts', get_template_directory_uri() . '/assets/main.js', [], filemtime( get_template_directory() . '/assets/main.js'), true);
    wp_register_script( 'bootstrap-5-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js', ['jquery'], null, true );

    wp_enqueue_style('stylesheet');
    wp_enqueue_style('bootstrap-5-css');

    wp_enqueue_script('scripts');
    wp_enqueue_script('bootstrap-5-js');
}

add_action( 'wp_enqueue_scripts', 'olena_enqueue_scripts');

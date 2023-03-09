<?php

namespace OLENA_THEME\Inc;

use OLENA_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		add_action( 'wp_enqueue_scripts', [$this, 'register_styles']);
		add_action( 'wp_enqueue_scripts', [$this, 'register_scripts']);
	}

	public function register_styles(){
		wp_register_style( 'stylesheet', get_stylesheet_uri(), [], filemtime( OLENA_DIR_PATH . '/style.css'), 'all' );
    	wp_register_style( 'bootstrap-5-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css', [], false, 'all' );

		wp_enqueue_style('stylesheet');
    	wp_enqueue_style('bootstrap-5-css');

	}

	public function register_scripts(){
		wp_register_script('scripts', OLENA_DIR_URI . '/assets/main.js', [], filemtime( OLENA_DIR_PATH . '/assets/main.js'), true);
		wp_register_script( 'bootstrap-5-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js', ['jquery'], null, true );
	
		wp_enqueue_script('scripts');
		wp_enqueue_script('bootstrap-5-js');
	}
}
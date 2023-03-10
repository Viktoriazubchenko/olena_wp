<?php

namespace OLENA_THEME\Inc;

use OLENA_THEME\Inc\Traits\Singleton;

class Sidebars {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action( 'widgets_init', [$this, 'register_sidebars']);
		add_action( 'widgets_init', [$this, 'register_clock_widget']);
		add_action( 'widgets_init', [$this, 'register_new_phrase_widget']);
	}

	public function register_sidebars(){
        register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar', 'olena' ),
				'id'            => 'sidebar-1',
				'description'   => '',
				'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
        register_sidebar(
			[
				'name'          => esc_html__( 'Footer', 'olena' ),
				'id'            => 'sidebar-2',
				'description'   => '',
				'before_widget' => '<div id="%1$s" class="widget widget-footer %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
    } 

	public function register_clock_widget(){
		register_widget( 'OLENA_THEME\Inc\Clock_Widget' );
	}

	public function register_new_phrase_widget(){
		register_widget( 'OLENA_THEME\Inc\New_Phrase_Widget' );
	}
}





?>
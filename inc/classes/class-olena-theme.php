<?php

namespace OLENA_THEME\Inc;

use OLENA_THEME\Inc\Traits\Singleton;

class OLENA_THEME {
	use Singleton;

	protected function __construct() {
		// load classes
		Assets::get_instance();
		Menus::get_instance();
		Meta_Boxes::get_instance();
		Sidebars::get_instance();
	

		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action('after_setup_theme', [$this, 'setup_theme']);
	}

	public function setup_theme(){
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo', array(
			'height'               => 100,
			'width'                => 400,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => true
		) );
		add_theme_support( 'custom-background');
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 
			'comment-list', 
			'comment-form', 
			'search-form', 
			'gallery', 
			'caption', 
			'style', 
			'script' 
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		global $content_width;
		if(! isset($content_width)){
			$content_width = 1440;
		}
		add_editor_style();

		add_image_size( 'featured-thumbnail', 350, 233, true );

	}

}





?>
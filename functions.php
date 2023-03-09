<?php



if(! defined('OLENA_DIR_PATH')) {
    define('OLENA_DIR_PATH', untrailingslashit(get_template_directory()));
}

if(! defined('OLENA_DIR_URI')) {
    define('OLENA_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once  OLENA_DIR_PATH . '/inc/helpers/autoloader.php';


function olena_get_theme_instance() {
	\OLENA_THEME\Inc\OLENA_THEME::get_instance();
}

olena_get_theme_instance();






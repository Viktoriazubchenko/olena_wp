<?php

namespace OLENA_THEME\Inc;

use OLENA_THEME\Inc\Traits\Singleton;

class OLENA_THEME {
	use Singleton;

	protected function __construct() {
		// load classes
		Assets::get_instance();
		
		$this->setup_hooks();
	}

	protected function setup_hooks() {

	}


}





?>
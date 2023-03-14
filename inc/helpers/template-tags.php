<?php

function posts_pagination(){
    global $wp_query;
    $args = [
		'before_page_number' => '<span class="btn border border-secondary mr-2 mb-2">',
		'after_page_number' => '</span>',
	];
	echo paginate_links($args);
}

function post_navigation(){
    previous_post_link();
    next_post_link();
}
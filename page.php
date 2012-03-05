<?php 

/*
	Page
	Establishes the Business Pro page tempate.
	Version: 3.0
	Copyright (C) 2011 CyberChimps

*/

/* Header call. */

	get_header(); 
	
/* End header. */	

/* Define global variables. */
	global $options, $post, $themeslug;
	$size = get_post_meta($post->ID, 'page_slider_size' , true);
	$page_section_order = get_post_meta($post->ID, 'page_section_order' , true);
	if(!$page_section_order) {
		$page_section_order = 'page_section';
	}
	
/* End define global variables. */

/* Set slider hook based on page option */

if (preg_match("/page_slider/", $page_section_order ) && $size == "1" ) {
	remove_action ('business_page_slider', 'business_slider_content' );
	add_action ('business_page_content_slider', 'business_slider_content' );
}
/* End set slider hook*/

	foreach(explode(",", $page_section_order) as $key) {
		$fn = 'business_' . $key;
		if(function_exists($fn)) {
			call_user_func_array($fn, array());
		}
	}
		
get_footer(); 
?>
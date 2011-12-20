<?php 

/*
	Page
	Establishes the iFeature Pro page tempate.
	Version: 3.0
	Copyright (C) 2011 CyberChimps

*/

/* Header call. */

	get_header(); 
	
/* End header. */	

/* Define global variables. */

	$size = get_post_meta($post->ID, 'page_slider_size' , true);
	$page_section_order = get_post_meta($post->ID, 'page_section_order' , true);
	if(!$page_section_order) {
		$page_section_order = 'page_section';
	}

/* End define global variables. */

/* Set slider hook based on page option */
if ($size == "0") {
	add_action ('chimps_page_slider', 'chimps_page_slider_content' );
}

if (preg_match("/page_slider/", $page_section_order ) && $size == "1" ) {
	add_action ('chimps_page_content_slider', 'chimps_page_slider_content' );
}
/* End set slider hook*/
?>

<div class="container_12">

<?php
	foreach(explode(",", $page_section_order) as $key) {
		$fn = 'chimps_' . $key;
		if(function_exists($fn)) {
			call_user_func_array($fn, array());
		}
	}
?>
	
</div>

<div style=clear:both;></div>
<?php get_footer(); ?>
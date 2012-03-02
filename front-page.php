<?php

 /*
	Font Page
	
	Creates the iFeature default index page.
	
	Copyright (C) 2011 CyberChimps
*/

	global $options, $themeslug, $post; // call globals
	
	$reorder = $options->get($themeslug.'_front_section_order');
	$slidersize = $options->get($themeslug.'_slider_size');
			
/* Set slider hook based on page option */

	if (preg_match("/synapse_blog_slider/", $reorder ) && $slidersize != "key2" ) {
		remove_action ( 'synapse_blog_slider', 'synapse_slider_content' );
		add_action ( 'synapse_blog_content_slider', 'synapse_slider_content');
	}
	
/* End set slider hook*/

?>

<?php get_header(); ?>

		<?php
			foreach(explode(",", $options->get($themeslug.'_front_section_order')) as $fn) {
				if(function_exists($fn)) {
					call_user_func_array($fn, array());
				}
			}
		?>

<?php get_footer(); ?>
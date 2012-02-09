<?php 

/*
	Template Name: Template Test
	Establishes the iFeature Pro page tempate.
	Version: 3.0
	Copyright (C) 2011 CyberChimps

*/

/* Header call. */

	get_header(); 
	
/* End header. */	

/* Define global variables. */
	global $options, $post, $themeslug;
	$size = get_post_meta($post->ID, 'page_slider_size' , true);
	
/* End define global variables. */

/* Set slider hook based on page option */

if (preg_match("/page_slider/", $page_section_order ) && $size == "1" ) {
	remove_action ('synapse_page_slider', 'synapse_slider_content' );
	add_action ('synapse_page_content_slider', 'synapse_slider_content' );
}
/* End set slider hook*/
?>
<div id="sliderbg">
<div class="container">
	<div class="row"> 
		<?php synapse_page_slider(); ?> 
	</div><!--end row-->
</div><!--end container-->
</div>

<div class="elementsbg">
<div class="container">
	<div class="row"> 
		<?php synapse_callout_section(); ?> 
	</div><!--end row-->
</div><!--end container-->
</div>

<div style="background:#fff;">
<div class="container">
	<div class="row"> 
		<?php synapse_box_section(); ?> 
	</div><!--end row-->
</div><!--end container-->
</div>

<div class="elementsbg">
<div class="container">
	<div class="row"> 
		<?php synapse_twitterbar_section(); ?> 
	</div><!--end row-->
</div><!--end container-->
</div>

<div class="elementsbg">
<div class="container">
	<div class="row"> 
		<?php synapse_carousel_section(); ?> 
	</div><!--end row-->
</div><!--end container-->
</div>

<?php get_footer(); ?>
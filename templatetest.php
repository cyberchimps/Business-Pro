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
		
/* End define global variables. */

/* End set slider hook*/
?>

<?php synapse_page_slider(); ?>
		
<div class="calloutbg">
<div class="container">
	<div class="row"> 
		<?php synapse_callout_section(); ?> 
	</div><!--end row-->
</div><!--end container-->
</div>

<div style="background:#fff;margin-top:20px;">
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
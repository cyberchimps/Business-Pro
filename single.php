<?php 

/*
	Single
	
	Establishes the single post template of Business Pro. 
	
	Copyright (C) 2011 CyberChimps
*/
	global $options, $themeslug, $post; // call globals

/* End variable definition. */	

get_header(); ?>

<div class="container">
	<div class="row">
	<!--Begin @Core post area-->
		<?php business_post(); ?>
	<!--End @Core post area-->
	
	</div>
<?php if ($options->get($themeslug.'_single_breadcrumbs') == "1") { business_breadcrumbs();}?>
</div><!--end container-->

<?php get_footer(); ?>
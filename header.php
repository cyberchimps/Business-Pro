<?php 

/*
	Header
	Authors: Tyler Cunningham, Trent Lapinski
	Creates the theme header. 
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

/* Call globals. */	

	global $themename, $themeslug, $options;
	
/* End globals. */
	
?>

	<?php business_head_tag(); ?>
	
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> <!-- wp_enqueue_script( 'comment-reply' );-->
<?php wp_head(); ?> <!-- wp_head();-->
	
</head><!-- closing head tag-->

<!-- Begin @business after_head_tag hook content-->
	<?php business_after_head_tag(); ?>
<!-- End @business after_head_tag hook content-->
	
<!-- Begin @business before_header hook  content-->
	<?php business_before_header(); ?> 
<!-- End @business before_header hook content -->
			
<header>		
	<?php
		foreach(explode(",", $options->get('header_section_order')) as $fn) {
			if(function_exists($fn)) {
				call_user_func_array($fn, array());
			}
		}
	?>
</header>

<!-- Begin @business after_header hook -->
	<?php business_after_header(); ?> 
<!-- End @business after_header hook -->

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
	
	ifeature_header_content_init();

/* End globals. */
	
?>
<!-- Begin @Core head_tag hook content-->
	<?php chimps_head_tag(); ?>
<!-- End @Core head_tag hook content-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> <!-- wp_enqueue_script( 'comment-reply' );-->
<?php wp_head(); ?> <!-- wp_head();-->
	
</head> <!-- closing head tag-->

<!-- Begin @Core after_head_tag hook content-->
	<?php chimps_after_head_tag(); ?>
<!-- End @Core after_head_tag hook content-->
	
<!-- Begin @Core before_header hook  content-->
	<?php chimps_before_header(); ?> 
<!-- End @Core before_header hook content -->
			
<header>
		
	<?php if ($options->get($themeslug.'_disable_header') != "0"):?>
	
	<div class="container_12">
		
		<div class="grid_6">
				
			<!-- Begin @Core header sitename hook -->
				<?php chimps_header_sitename(); ?>
			<!-- End @Core header sitename hook -->
				
		</div>	
			
		<div class="grid_6" id="menu">

		<div id="nav" class="<?php echo $grid; ?>">
		    <?php wp_nav_menu( array(
		    'theme_location' => 'header-menu', // Setting up the location for the main-menu, Main Navigation.
		    'fallback_cb' => 'menu_fallback', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
		    )
		);
    	?>
   		</div>
		
	</div>
				
	<?php endif;?>

<div class='clear'>&nbsp;</div>

</header>

<div id="headbar">	
	<div class="container_12">
		
		<div class="grid_10">
			<!-- Begin @Core header description hook -->
				<?php chimps_header_site_description(); ?> 
			<!-- End @Core header description hook -->
		</div>
			
		<div class="grid_2">
			<?php get_search_form(); ?>
		</div>
	</div>
	<div class='clear'>&nbsp;</div>
</div>

<div id="headbar">	




	<?php chimps_page_slider(); ?> 



<div class="container_12"><!--main wrap-->	
<!-- Begin @Core after_header hook -->
	<?php chimps_after_header(); ?> 
<!-- End @Core after_header hook -->
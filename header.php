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

/* Define variables. */	

	$blogtitle = $options[$themeslug.'_home_title'];
	$homekeywords = $options[$themeslug.'_home_keywords'];
	$homedescription = $options[$themeslug.'_home_description'];
	$logo = $options['file'] ;
	$favicon = $options['file2'];
	$title = get_post_meta($post->ID, 'seo_title' , true);
	$pagedescription = get_post_meta($post->ID, 'seo_description' , true);
	$keywords = get_post_meta($post->ID, 'seo_keywords' , true);


/* End variable definition. */	

/* Establish fonts. */	

	if ($options[$themeslug.'_font'] == "" AND $options[$themeslug.'_custom_font'] == "") {
		$font = 'Arial';
	}
			
	elseif ($options[$themeslug.'_custom_font'] != "") {
		$font = $options[$themeslug.'_custom_font'];	
	}
		
	else {
		$font = $options[$themeslug.'_font']; 
	}
	
	$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
/* End fonts. */	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="distribution" content="global" />
	<meta name="language" content="en" />
	
<!-- Business Blog Page SEO options -->
	<?php if ($blogtitle != '' AND is_front_page()): ?>
		<meta name="title" content="<?php echo $blogtitle ?>" />
	<?php endif; ?> 
	
	<?php if ($homedescription != '' AND is_front_page()): ?>
		<meta name="description" content="<?php echo $homedescription ?>" />
	<?php endif; ?>	
	
	<?php if ($homekeywords != '' AND is_front_page()): ?>
		<meta name="keywords" content="<?php echo $homekeywords ?>" />
	<?php endif; ?>
<!-- /Business Blog Page SEO options -->


<!-- Business Page SEO options -->
	<?php if ($title != '' AND !is_front_page()): ?>
		<meta name="title" content="<?php echo $title ?>" />
	<?php endif; ?> 
	
	<?php if ($pagedescription != '' AND !is_front_page()): ?>
		<meta name="description" content="<?php echo $pagedescription ?>" />
	<?php endif; ?>	
	
	<?php if ($keywords != '' AND !is_front_page()): ?>
		<meta name="keywords" content="<?php echo $keywords ?>" />
	<?php endif; ?>
<!-- /Business Page SEO options -->
	
<!-- Page title -->
	<title>
		   <?php
		   
		   	  /*Title for tags */
		      if (function_exists('is_tag') && is_tag()) {
		         bloginfo('name'); echo ' - '; single_tag_title("Tag Archive for &quot;"); echo '&quot;  '; }
		      /*Title for archives */   
		      elseif (is_archive()) {
		          bloginfo('name'); echo ' - '; wp_title(''); echo ' Archive '; }
		      /*Title for search */     
		      elseif (is_search()) {
		         bloginfo('name'); echo ' - '; echo 'Search for &quot;'.wp_specialchars($s).'&quot;  '; }
		      /*Title for 404 */    
		      elseif (is_404()) {
		          bloginfo('name'); echo ' - '; echo 'Not Found '; }
		      /*Title if front page is latest posts and no custom title */
		      elseif (is_front_page() AND !is_page() AND $blogtitle == '') {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      /*Title if front page is latest posts with custom title */
		      elseif (is_front_page() AND !is_page() AND $blogtitle != '') {
		         bloginfo('name'); echo ' - '; echo $blogtitle ; }
		      /*Title if front page is static page and no custom title */
		      elseif (is_front_page() AND is_page() AND $title == '') {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      /*Title if front page is static page with custom title */
		      elseif (is_front_page() AND is_page() AND $title != '') {
		         bloginfo('name'); echo ' - '; echo $title ; }
		     /*Title if static page is static page with no custom title */
		      elseif (is_page() AND $title == '') {
		         bloginfo('name'); echo ' - '; wp_title(''); }
		      /*Title if static page is static page with custom title */
		      elseif (is_page() AND $title != '') {
		         bloginfo('name'); echo ' - '; echo $title ; }
		      /*Title if blog page with no custom title */
		      elseif (is_page() AND is_front_page() AND $blogtitle == '') {
		         bloginfo('name'); echo ' - '; wp_title(''); }
		  	  /*Title if blog page with custom title */ 
		  	  elseif ($blogtitle != '') {
		         bloginfo('name'); echo ' - '; echo $blogtitle ; }
		  	   /*Title if blog page without custom title */
		      else  {
		         bloginfo('name'); echo ' - '; wp_title(''); }
		    
		      if ($paged>1 ) {
		         echo ' - page '. $paged; }
		   ?>
	</title>	
	
<link rel="shortcut icon" href="<?php echo stripslashes($favicon['url']); ?>" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=<?php echo $font ?>' rel='stylesheet' type='text/css' />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
	<?php wp_head(); ?>
	
</head>

<body style="font-family:'<?php echo $fontstrip ?>', Helvetica, serif" <?php body_class(); ?> >	
			<div id="header">
				<div id="headerwrap">
					<div id="headergrid" class="row">
						<?php get_template_part('nav', 'header' ); ?>
					<!-- Inserts Site Logo -->
					
						<?php if ($logo != ''):?>
							<div id="logo" class="grid_4 column">
								<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($logo['url']); ?>" alt="logo"></a>
								<div id="description">
									<h1 class="description"><?php bloginfo('description'); ?></h1>
								</div>
							</div>
						<?php endif;?>
						<?php if ($logo == '' ):?>
							<div id="logo" class="grid_4 column">
								<h1 class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> </h1>
								<div id="description">
									<h1 class="description"><?php bloginfo('description'); ?></h1>
								</div>
							</div>
						<?php endif;?>
					</div><!-- end headergrid-->
				</div><!-- end headerwrap -->
								
			</div><!-- end header -->

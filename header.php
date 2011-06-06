<?php 

/*
	Header
	
	Creates the iFeature header. 
	
	Copyright (C) 2011 CyberChimps
*/
$options = get_option('ifeature') ; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<!-- Inserts META Home Description -->
	<?php  $homedescription = $options['if_home_description']; ?>
		<meta name="description" content="<?php echo $homedescription ?>" />
	<!-- Inserts META Keywords -->	
	<?php  $homekeywords = $options['if_home_keywords'] ; ?>
		<meta name="keywords" content="<?php echo $homekeywords ?>" />
	<meta name="distribution" content="global" />
	<meta name="language" content="en" />
<!-- Page title -->
	<title>
			<?php  $hometitle = $options['if_home_title']; ?>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title('');  }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_front_page() AND $hometitle == '') {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      elseif (is_front_page() AND $hometitle != '') {
		         bloginfo('name'); echo ' - '; echo $hometitle ; }
		      else {
		         echo ' - '; bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>	
	<?php  $favicon = $options['if_favicon']; ?>
	<link rel="shortcut icon" href="<?php echo stripslashes($favicon); ?>" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
		<?php  
		if ($options['if_font'] == "")
			$font = 'Cantarell';
		else
			$font = $options[('if_font')]; 
			$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );?>
	
	<link href='http://fonts.googleapis.com/css?family=<?php echo $font ?>' rel='stylesheet' type='text/css' />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
	<?php wp_head(); ?>
	
	<script type="text/javascript">
    $(document).ready(function(){
        jQuery('ul.sf-menu').superfish();
    });
	</script>
	
</head>

<body style="font-family:'<?php echo $fontstrip ?>'" <?php body_class(); ?> >
	
	<div id="page-wrap">
		
			<div id="header">
				<div id="headerwrap">
					<!-- Inserts Site Logo -->
					<?php  $logo = $options['if_logo'] ; ?>
						<?php if ($logo != 'hide'  and $logo != ''):?>
							<div id="logo">
								<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($logo); ?>" alt="logo"></a>
							</div>
						<?php endif;?>
						<?php if ($logo == '' ):?>
							<div id="logo">
								<a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/ifeaturelogo.png " alt="iFeature" /></a>
							</div>
						<?php endif;?>
						<?php if ($logo == 'hide' ):?>
							<div id="logo">
								<h1 class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?> </h1></a>
							</div>
						<?php endif;?>
						<?php get_template_part('nav', 'header' ); ?>
				</div><!-- end headerwrap -->
								
			</div><!-- end header -->

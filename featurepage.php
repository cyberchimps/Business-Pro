<?php
/*
Template Name: Business Pro Homepage
*/
$options = get_option('business') ;  
$enabletwitter = $options['bu_enable_twitter']
?>


<?php get_header(); ?>

	
	<!--Insert Feature Slider-->
	<?php 
	
		$hideslider = $options['bu_hide_slider'];
		$sliderplacement = $options['bu_slider_placement'];
	?>
		<?php if ($hideslider != '1' && $sliderplacement != 'blog'):?>
		<div id="fp_slider">
			<?php get_template_part('slider', 'featurepage' ); ?>
			</div>
		<?php endif;?>
		
		<?php if ($enabletwitter == '1') : ?>
		<?php include (TEMPLATEPATH . '/pro/twitter.php' ); ?>
		<?php endif ;?>

<div id="fp_border"></div>
	

		<?php $hidecallout = $options['bu_hide_callout'] ?>
		<?php if ($hidecallout != '1' ):?>
		<div id="fp_callout">
			<?php include (TEMPLATEPATH . '/pro/callout.php' ); ?>
			</div>	
		<?php endif;?>


	
	<?php $hideboxes = $options['bu_hide_boxes']; ?>
		<?php if ($hideboxes != '1' ):?>
		<div id="fp_boxes">	
			<?php include (TEMPLATEPATH . '/pro/boxes.php' ); ?>
			</div>
		<?php endif;?>


<div style="clear:both;"></div>
<?php get_footer(); ?>

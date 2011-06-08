<?php
/*
Template Name: iFeature Pro Homepage
*/
$options = get_option('ifeature') ;  
?>


<?php get_header(); ?>

<div id="fp_slider">	
	<!--Insert Feature Slider-->
	<?php 
	
		$hideslider = $options['if_hide_slider'];
		$sliderplacement = $options['if_slider_placement'];
	?>
		<?php if ($hideslider != '1' && $sliderplacement != 'blog'):?>
			<?php get_template_part('slider', 'featurepage' ); ?>
		<?php endif;?>
</div>
<div id="fp_border"></div>
	
<div id="fp_callout">
		<?php $hidecallout = $options['if_hide_callout'] ?>
		<?php if ($hidecallout != '1' ):?>
			<?php include (TEMPLATEPATH . '/pro/callout.php' ); ?>
		<?php endif;?>
</div>	

<div id="fp_boxes">		
	<?php $hideboxes = $options['if_hide_boxes']; ?>
		<?php if ($hideboxes != '1' ):?>
			<?php include (TEMPLATEPATH . '/pro/boxes.php' ); ?>
		<?php endif;?>
</div>

<div style="clear:both;"></div>
<?php get_footer(); ?>

<?php
/*
Template Name: iFeature Pro Homepage
*/
$options = get_option('ifeature') ;  
?>


<?php get_header(); ?>

<div style="width: 100%;min-height: 380px;margin: auto; padding-top: 30px;
	background: #fff url(http://orangeola.com/business/wp-content/themes/ifeaturepro/images/sliderbg.png) no-repeat center top;">	
	<!--Insert Feature Slider-->
	<?php 
	
		$hideslider = $options['if_hide_slider'];
		$sliderplacement = $options['if_slider_placement'];
	?>
		<?php if ($hideslider != '1' && $sliderplacement != 'blog'):?>
			<?php get_template_part('slider', 'featurepage' ); ?>
		<?php endif;?>
</div>
<div style="height: 1px; width: 990px; margin: auto;border-bottom: 1px dotted #ccc;"> </div>
	
<div style="width: 100%;min-height: 100px;background: #fff;">
		<?php $hidecallout = $options['if_hide_callout'] ?>
		<?php if ($hidecallout != '1' ):?>
			<?php include (TEMPLATEPATH . '/pro/callout.php' ); ?>
		<?php endif;?>
</div>	

<div style="width: 100%;background: #fff;padding-top: 20px;">		
	<?php $hideboxes = $options['if_hide_boxes']; ?>
		<?php if ($hideboxes != '1' ):?>
			<?php include (TEMPLATEPATH . '/pro/boxes.php' ); ?>
		<?php endif;?>
</div>

<div style="clear:both;"></div>
<?php get_footer(); ?>

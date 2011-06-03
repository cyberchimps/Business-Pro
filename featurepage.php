<?php
/*
Template Name: iFeature Pro Homepage
*/
$options = get_option('ifeature') ;  
?>


<?php get_header(); ?>

<div style="width: 100%;min-height: 390px;margin: auto; padding-top: 30px;
	background: #787878 url(http://orangeola.com/business/wp-content/themes/ifeaturepro/images/sliderbg.png) no-repeat center top;">	
	<!--Insert Feature Slider-->
	<?php 
	
		$hideslider = $options['if_hide_slider'];
		$sliderplacement = $options['if_slider_placement'];
	?>
		<?php if ($hideslider != '1' && $sliderplacement != 'blog'):?>
			<?php get_template_part('slider', 'featurepage' ); ?>
		<?php endif;?>
</div>
	
<div style="width: 100%;min-height: 100px;background: #fff;border-top: 1px solid #000;padding-top: 20px;">
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

<?php
/*

	Section: Boxes
	Author: CyberChimps
	Description: Creates widgetized box area
	Version: 0.2
	
*/

$root = get_template_directory_uri();

?>

<div id="box_container">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Left") ) : ?>
			<div class="box1">
				<h2 class="box-widget-title">Professional Design</h2>
				<img src="<?php echo $root ; ?>/images/icons/blueprint.png" height="100" alt="blueprint" class="aligncenter" />
				<p>With <a href="http://cyberchimps.com/businesspro/">Business Pro</a> we've done the design work for you. If we were all designers then every WordPress theme would look this good.</p>
			</div><!--end box1-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Middle") ) : ?>
			<div class="box2">
				<h2 class="box-widget-title">Business Pro Slider</h2>
				<img src="<?php echo $root ; ?>/images/icons/slidericon.png" height="100" alt="slider" class="aligncenter" />
					<p>Business Pro comes with the Business Slider that allows you to display your content professionally, and beautifully without using Flash.</p>
			</div><!--end box2-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Right") ) : ?>
			<div class="box3">			
				<h2 class="box-widget-title">Business Friendly</h2>
				<img src="<?php echo $root ; ?>/images/icons/globe.png" height="100" alt="globe" class="aligncenter" />
						<p>We designed Business Pro to be user friendly, if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">support forum</a>, and <a href="http://www.cyberchimps.com/docs/">precise documentation</a>.</p>
			</div><!--end box3-->
	<?php endif; ?>

</div><!--end boxes.php-->
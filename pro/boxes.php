<?php
/*

	Section: Boxes
	Author: Tyler Cunningham
	Description: Creates widgetized box area
	Version: 0.1
	
*/
?>

<div id="box_container">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box1") ) : ?>
			<div class="box1">
				<h2 class="box-widget-title">Apple-like Design</h2>
					<ul>
						<li>With <a href="http://cyberchimps.com/ifeature-pro/">iFeature Pro</a> we've done the design work for you, all you need to do is select your settings, and add your content.</li>
						<li>&nbsp;</li>
						<li>If we were all designers then every WordPress theme would look this good.</li>
					</ul>
			</div><!--end box1-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box2") ) : ?>
			<div class="box2">
				<h2 class="box-widget-title">iFeature Slider</h2>
					<ul>
						<li>iFeature Pro comes with the iFeature Slider that allows you to display your content professionally, and beautifully without using Flash or losing SEO value.</li>
					</ul>
			</div><!--end box2-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box3") ) : ?>
			<div class="box3">			
				<h2 class="box-widget-title">User Friendly</h2>
					<ul>
						<li>iFeature's settings are easy to setup.</li>
						<li>&nbsp;</li>
						<li>We designed iFeature Pro to be as user friendly as possible, if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">free support forum</a>, and <a href="http://www.cyberchimps.com/ifeature-pro/docs/">precise documentation</a>.</li>
					</ul>
			</div><!--end box3-->
	<?php endif; ?>

</div><!--end boxes.php-->
<?php

/*
	
	Footer
	Establishes the widgetized footer and static post-footer section of Business Pro. 
	Copyright (C) 2011 CyberChimps
	Version 2.0
	
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */	

/* Define variables. */	

	$analytics = $options[$themeslug.'_ga_code'];
	$copyright = $options[$themeslug.'_footer_text'];
	$hidelink  = $options[$themeslug.'_hide_link'];
	$hidefootersocial = $options[$themeslug.'_hide_footer_social'];

/* End variable definition. */	

?>	
		
<div id="footer">
    <div id="footer_wrap">
    	
    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer") ) : ?>
		
		<div class="footer-widgets">
			<h3 class="footer-widget-title">Recent Posts</h3>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=4'); ?>
			</ul>
		</div>
		
		<div class="footer-widgets">
			<h3 class="footer-widget-title">Archives</h3>
			<ul>
				<?php wp_get_archives('type=monthly&limit=16'); ?>
			</ul>
		</div>

		<div class="footer-widgets">
			<h3 class="footer-widget-title">Links</h3>
			<ul>
				<?php wp_list_bookmarks('categorize=0&title_li='); ?>
			</ul>
		</div>

		<div class="footer-widgets">
			<h3 class="footer-widget-title">WordPress</h3>
			<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    		</ul>
		</div>
		
		<div class="footer-widgets">
			<h3 class="footer-widget-title">Search</h3>
			<div id="search_footer">
				<?php get_search_form(); ?>
			</div>
		</div>
		
			<?php endif; ?>
		<div class="clear"></div>

		<!--Inserts Google Analytics Code-->
		
		<?php echo stripslashes($analytics); ?>
			   
		
	</div><!--end footer_wrap-->
</div><!--end footer-->
	
	<div id="afterfooter">
		<div id="afterfooterwrap">
			<!--Inserts Copyright Text-->
				<?php if ($copyright == ''): ?> 
					<div id="afterfootercopyright">
						&copy; <?php echo bloginfo ( 'name' );  ?>
					</div>
				<?php endif;?>
				<?php if ($copyright != ''):?> 
					<div id="afterfootercopyright">
						&copy; <?php echo $copyright; ?>
					</div>
				<?php endif;?>
			<!--Inserts Afterfooter Social Icons -->
		
			<?php if ($hidefootersocial != "1" ):?>
				<div id="social_footer">
					<?php get_template_part('icons', 'header'); ?>
			</div><!-- end social -->
			<?php endif;?>
			
			<!--Inserts Site Credit -->
				<?php if ($hidelink != "1" ):?>
					<div id="credit">
						<a href="http://cyberchimps.com"><img src="<?php echo get_template_directory_uri(); ?>/images/cyberchimps.png" alt="CyberChimps"/></a>
					</div>
				<?php endif;?>
				
		</div>  <!--end afterfooterwrap-->	
	</div> <!--end afterfooter-->	
	<?php wp_footer(); ?>
</body>

</html>

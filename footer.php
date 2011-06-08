<?php

/*
	
	Footer
	
	Establishes the widgetized footer and static post-footer section of iFeature. 
	
	Copyright (C) 2011 CyberChimps
	
*/
$options = get_option('ifeature') ;  
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
			<h3 class="footer-widget-title">Subscribe</h3>
			<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>

			</ul>
		</div>
		
			<?php endif; ?>
		<div class="clear"></div>

		<!--Inserts Google Analytics Code-->
		<?php  $analytics = $options['if_ga_code']; ?>
		<?php echo stripslashes($analytics); ?>
			   
		<?php wp_footer(); ?>
	</div><!--end footer_wrap-->
</div><!--end footer-->
	
	<div id="afterfooter">
		<div id="afterfooterwrap">
			<!--Inserts Copyright Text-->
			<?php  $copyright = $options['if_footer_text']; ?>
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
			<!--Inserts Afterfooter Menu-->
			<div id="afterfootermenu">
				<?php wp_nav_menu('depth=1'); ?>
			</div>
			<!--Inserts iFeature SEO Module-->
			<?php 
								$hidelink		= $options['if_hide_link'];
							?>
							<?php if ($hidelink == "0" ):?>
					<div id="credit">
						<a href="http://cyberchimps.com"><img src="<?php echo get_template_directory_uri(); ?>/images/cyberchimps.png" /></a>
					</div>
			<?php endif;?>
		</div>  <!--end afterfooterwrap-->	
	</div> <!--end afterfooter-->	
	
</body>

</html>

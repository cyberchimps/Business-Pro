<div id="sidebar_left">
	<div id="sidebar240">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Left')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
    	<div class="sidebar-widget-style">    
		<h2 class="sidebar-widget-title">Pages</h2>
    	<?php wp_list_pages('title_li=' ); ?>
    	</div>
        
    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">WordPress</h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" />WordPress</a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>


	<?php endif; ?>
	</div><!--end sidebar150-->
</div><!--end sidebar_left-->
<?php if (dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
		<div class="widget-container">    
		<h2 class="widget-title">Business Pro 3</h2>
		<p>Thank you for purchasing Business Pro 3.</p>
		<p>We designed Business Pro 3 to be as user friendly as possible, but if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">support forum</a>, and <a href="http://www.cyberchimps.com/ifeature-pro/docs/">precise documentation</a>.</p>

    	</div>
		
		<div class="widget-container">    
		<h2 class="widget-title"><?php printf( __('Pages', 'ifeature' )); ?></h2>
		<ul>
    	<?php wp_list_pages('title_li=' ); ?>
    	</ul>
    	</div>
    
		<div class="widget-container">    
    	<h2 class="widget-title"><?php printf( __( 'Archives', 'ifeature' )); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
        
		<div class="widget-container">    
       <h2 class="widget-title"><?php printf( __('Categories', 'ifeature' )); ?></h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>
        
		<div class="widget-container">    
    	<h2 class="widget-title"><?php printf( __('WordPress', 'ifeature' )); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'ifeature' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'ifeature'); ?>"> <?php printf( __('WordPress', 'ifeature' )); ?></a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>
    	
    	<div class="widget-container">
    	<h2 class="widget-title"><?php printf( __('Subscribe', 'ifeature' )); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php printf( __('Entries (RSS)', 'ifeature' )); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php printf( __('Comments (RSS)', 'ifeature' )); ?></a></li>
    	</ul>
    	</div>
	
<?php endif; ?>
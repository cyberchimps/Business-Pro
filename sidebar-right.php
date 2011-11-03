<div id="sidebar_rightsm">
	<div id="sidebar240">

		<div class="sidebar-widget-style">
			<div id="social">
				<?php get_template_part('icons', 'header'); ?>
			</div><!-- end social -->
    	</div>
    	
    	<div class="sidebar-widget-style">
			<div id="searchbar">
				<?php get_search_form(); ?>
			</div>
		</div>

    <?php if (dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All these widgets only shows up if you DON'T have any widgets active in this zone -->
		
		<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">Subscribe</h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
    	</ul>
    	</div>
		
		<div class="sidebar-widget-style">    
		<h2 class="sidebar-widget-title">Recent Posts</h2>
		<ul>
		<?php
			$args = array( 'numberposts' => '5' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $post ){
					echo '<li><a href="' . get_permalink($post["ID"]) . '" title="Look '.$post["post_title"].'" >' .   $post["post_title"].'</a> </li> ';
		}
		?>
		</ul>
    	</div>
    	
    	   	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title">Archives</h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
	
	<?php endif; ?>
	</div><!--end sidebar150-->
</div><!--end sidebar_right-->
<?php
/*

	Section: Navigation
	Author: Tyler Cunningham
	Description: Creates site navigation
	Version: 0.1
	
*/

	$homeimage		= get_option('ne_menuicon') ? '': 'default';

?>
				
<div style ="height: 40px;width: 690px;display: block;margin-top: 36px;">

<div id="navcontainer">
<div id="searchbar">
<?php get_search_form(); ?>
</div>
    <div id="sfwrapper">
        <?php wp_nav_menu( array(
	    'theme_location' => 'header-menu', // Setting up the location for the main-menu, Main Navigation.
	    'menu_class' => 'sf-menu', //Adding the class for dropdowns
	    'container_id' => 'navwrap', //Add CSS ID to the containter that wraps the menu.
	    'fallback_cb' => 'menu_fallback', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
	    )
	);
    ?>
    </div>
</div><!--end navcontainer-->

</div>    
<!--end nav.php-->
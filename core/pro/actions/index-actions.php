<?php
/**
* Index actions used by the CyberChimps Core Framework Pro Extension
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package Pro
* @since 1.0
*/

add_action( 'chimps_index_entry', 'chimps_index_content_slider' );
add_action( 'chimps_index_before_entry', 'chimps_pro_index_before_entry_slider' );

add_action( 'chimps_index_before_entry', 'chimps_index_before_entry_sidebar' );

remove_action( 'chimps_index_after_entry', 'chimps_index_after_entry_sidebar' );
add_action( 'chimps_index_after_entry', 'chimps_pro_index_after_entry_sidebar' );


/**
* Pro index content before entry slider
*
* @since 1.0
*/
function chimps_pro_index_before_entry_slider() { 
	global $options, $themeslug; ?>
		
		<?php if ($options->get($themeslug.'_hide_slider_blog') == '1' && $options->get($themeslug.'_slider_size') == "key2"): ?>
	
			<?php chimps_blog_slider(); ?>
		
		<?php endif;

}

/**
* Index content slider
*
* @since 1.0
*/
function chimps_index_content_slider() { 
	global $options, $themeslug; ?>
		
		<?php if ($options->get($themeslug.'_hide_slider_blog') == '1' && $options->get($themeslug.'_slider_size') != "key2"): ?>
		
			<?php chimps_blog_slider(); ?>
		
		<?php endif;

}

/**
* Before entry sidebar
*
* @since 1.0
*/
function chimps_index_before_entry_sidebar() { 
	global $options, $themeslug, $post; // call globals
	
	$blogsidebar = $options->get($themeslug.'_blog_sidebar');
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);?>
				
	<?php if ($sidebar == "3" OR $blogsidebar == 'right-left' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;
	
}

/**
* After entry sidebar
*
* @since 1.0
*/
function chimps_pro_index_after_entry_sidebar() {
	global $options, $themeslug, $post; // call globals
	
	$blogsidebar = $options->get($themeslug.'_blog_sidebar');
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);?>
	
	
	<?php if ($sidebar == "0" OR $blogsidebar == 'right' OR $blogsidebar == '' ): ?>
	<div id="sidebar" class="grid_4">
		<?php get_sidebar(); ?>
	</div>
	<?php endif;?>
	
	<?php if ($sidebar == "3" OR $blogsidebar == 'two-right' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('left'); ?>
	</div>
	<?php endif;?> 
	
	<?php if ($sidebar == "2" OR $sidebar == "3" OR $blogsidebar == 'two-right' OR $blogsidebar == 'right-left' ): ?>
	<div id="sidebar" class="grid_3">
		<?php get_sidebar('right'); ?>
	</div>
	<?php endif;?> <?php 
}

/**
* End
*/

?>
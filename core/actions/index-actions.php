<?php
/**
* Index actions used by the CyberChimps Synapse Core Framework
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
* @package Synapse
* @since 1.0
*/

/**
* Synapse index actions
*/

add_action( 'synapse_index', 'synapse_index_content');

/**
* Index content
*
* @since 1.0
*/
function synapse_index_content() { 

	global $options, $themeslug, $post, $sidebar, $content_grid; // call globals ?>
	
	<!--Begin @Core sidebar init-->
		<?php synapse_sidebar_init(); ?>
	<!--End @Core sidebar init-->
	<div class="row">
	<!--Begin @Core before content sidebar hook-->
		<?php synapse_before_content_sidebar(); ?>
	<!--End @Core before content sidebar hook-->

		<div id="content" class="<?php echo $content_grid; ?>">
		
		<!--Begin @Core index entry hook-->
		<?php synapse_blog_content_slider(); ?>
		<!--End @Core index entry hook-->

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div class="post_container">
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
				<!--Begin @Core index loop hook-->
					<?php synapse_loop(); ?>
				<!--End @Core index loop hook-->	
			
				<!--Begin @Core link pages hook-->
					<?php synapse_link_pages(); ?>
				<!--End @Core link pages hook-->
			
				<!--Begin @Core post edit link hook-->
					<?php synapse_edit_link(); ?>
				<!--End @Core post edit link hook-->
			
				<!--Begin @Core FB like hook-->
					<?php synapse_fb_like_plus_one(); ?>
				<!--End @Core FB like hook-->
				
				<?php if (is_single() && $options->get($themeslug.'_post_pagination') == "1") : ?>
				<!--Begin @Core post pagination hook-->
					<?php synapse_post_pagination(); ?>
				<!--End @Core post pagination hook-->			
				<?php endif;?>
			
				</div><!--end post_class-->
			</div><!--end post container-->
			
			<?php if (is_single()):?>
			<?php comments_template(); ?>
			<?php endif ?>
			
	
			<?php endwhile; ?>
		
			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>
			
			<!--Begin @Core pagination hook-->
			<?php custom_pagination(); ?>
			<!--End @Core pagination loop hook-->
		
		</div><!--end content-->

	<!--Begin @Core after content sidebar hook-->
		<?php synapse_after_content_sidebar(); ?>
	<!--End @Core after content sidebar hook-->

</div>
<?php }

/**
* End
*/

?>
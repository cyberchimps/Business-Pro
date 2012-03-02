<?php
/**
* Global actions used by the CyberChimps Synapse Core Framework
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
* Synapse global actions
*/

add_action( 'synapse_loop', 'synapse_loop_content' );
add_action( 'synapse_post_byline', 'synapse_post_byline_content' );
add_action( 'synapse_edit_link', 'synapse_edit_link_content' );
add_action( 'synapse_post_tags', 'synapse_post_tags_content' );
add_action( 'synapse_post_bar', 'synapse_post_bar_content' );
add_action( 'synapse_fb_like_plus_one', 'synapse_fb_like_plus_one_content' );

/**
* Check for post format type, apply filter based on post format name for easy modification.
*
* @since 1.0
*/
function synapse_loop_content($content) { 

	global $options, $themeslug, $post; //call globals
	
	if (is_single()) {
		 $post_formats = $options->get($themeslug.'_single_post_formats');
		 $featured_images = $options->get($themeslug.'_single_show_featured_images');
		 $excerpts = $options->get($themeslug.'_single_show_excerpts');
	}
	elseif (is_archive()) {
		 $post_formats = $options->get($themeslug.'_archive_post_formats');
		 $featured_images = $options->get($themeslug.'_archive_show_featured_images');
		 $excerpts = $options->get($themeslug.'_archive_show_excerpts');
	}
	else {
		 $post_formats = $options->get($themeslug.'_post_formats');
		 $featured_images = $options->get($themeslug.'_show_featured_images');
		 $excerpts = $options->get($themeslug.'_show_excerpts');
	}
	
	if (get_post_format() == '') {
		$format = "default";
	}
	else {
		$format = get_post_format();
	} ?>
	<?php ob_start(); ?>
			<?php
				if ( has_post_thumbnail() && $featured_images == '1' ) {
 		 			echo '<div class="featured-image">';
 		 			echo '<a href="' . get_permalink($post->ID) . '" >';
 		 				the_post_thumbnail();
  					echo '</a>';
  					echo '</div>';
				}
			?>	
			<!--Call @Core Meta hook-->
			<div class="row">
			<div class="three columns"><?php synapse_post_byline(); ?></div>
				<div class="entry nine columns">
					<?php if ($post_formats != '0') : ?>
						<div class="postformats"><!--begin format icon-->
							<img src="<?php echo get_template_directory_uri(); ?>/images/formats/<?php echo $format ;?>.png" alt="formats" />
						</div><!--end format-icon-->
					<?php endif; ?>
					<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<?php 
						if ($excerpts == '1' && !is_single() ) {
						the_excerpt();
						}
						else {
							the_content();
						}
					 ?>
				<!--Begin @Core link pages hook-->
					<?php synapse_link_pages(); ?>
				<!--End @Core link pages hook-->
			
				<!--Begin @Core post edit link hook-->
					<?php synapse_edit_link(); ?>
				<!--End @Core post edit link hook-->
				</div><!--end entry-->
			</div><!--end row-->
			<?php	
		
		$content = ob_get_clean();
		$content = apply_filters( 'synapse_post_formats_'.$format.'_content', $content );
	
		echo $content; 
}

/**
* Sets the post byline information (author, date, category). 
*
* @since 1.0
*/
function synapse_post_byline_content() {
	global $options, $themeslug; //call globals.  
	if (is_single()) {
		$hidden = $options->get($themeslug.'_single_hide_byline'); 
	}
	elseif (is_archive()) {
		$hidden = $options->get($themeslug.'_archive_hide_byline'); 
	}
	else {
		$hidden = $options->get($themeslug.'_hide_byline'); 
	}?>
	
	<div class="meta">
	<ul>
		<li class="metadate"><?php if (($hidden[$themeslug.'_hide_date']) != '0'):?><?php printf( __( '', 'core' )); ?><a href="<?php the_permalink() ?>"><?php echo get_the_date(); ?></a><?php endif;?></li>
		<li class="metaauthor"><?php if (($hidden[$themeslug.'_hide_author']) != '0'):?><?php printf( __( '', 'core' )); ?><?php the_author_posts_link(); ?><?php endif;?></li>
		<li class="metacomments"><?php if (($hidden[$themeslug.'_hide_comments']) != '0'):?><?php comments_popup_link( __('No Comments', 'core' ), __('1 Comment', 'core' ), __('% Comments' , 'core' )); //need a filer here ?><?php endif;?></li>
		<li class="metacat"><?php if (($hidden[$themeslug.'_hide_categories']) != '0'):?><?php printf( __( '', 'core' )); ?> <?php the_category(', ') ?><?php endif;?></li>
		<li class="metatags"><?php synapse_post_tags(); ?></li>
	</ul>
	</div> <?php
}

/**
* Sets up the WP edit link
*
* @since 1.0
*/
function synapse_edit_link_content() {
	edit_post_link('Edit', '<p>', '</p>');
}

/**
* Sets up the tag area
*
* @since 1.0
*/
function synapse_post_tags_content() {
	global $options, $themeslug; 
	if (is_single()) {
		$hidden = $options->get($themeslug.'_single_hide_byline'); 
	}
	elseif (is_archive()) {
		$hidden = $options->get($themeslug.'_archive_hide_byline'); 
	}
	else {
		$hidden = $options->get($themeslug.'_hide_byline'); 
	}?>

	<?php if (has_tag() AND ($hidden[$themeslug.'_hide_tags']) != '0'):?>
			<?php the_tags('', ', ', ''); ?>
	<?php endif;
}

/**
* Sets up the Facebook Like and Google Plus One area
*
* @since 3.1
*/
function synapse_fb_like_plus_one_content() {
	global $options, $themeslug; 
	
	if (is_single()) {
		 $fb = $options->get($themeslug.'_single_show_fb_like');
		 $gplus = $options->get($themeslug.'_single_show_gplus');
	}
	elseif (is_archive()) {
		 $fb = $options->get($themeslug.'_archive_show_fb_like');
		 $gplus = $options->get($themeslug.'_archive_show_gplus');
	}
	else {
		 $fb = $options->get($themeslug.'_show_fb_like');
		 $gplus = $options->get($themeslug.'_show_gplus');
	}?>

	<?php if ($gplus == "1"):?>
		<div class="gplusone">	
			<g:plusone size="standard" count="true"></g:plusone>
		</div>
	<?php endif;?>
						
	<?php if ($fb == "1"):?>			
		<div id="fb">
			<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&layout=standard&show_faces=true&width=450&action=like&colorscheme=light" scrolling="no" frameborder="0"  allowTransparency="true" style="border:none; overflow:hidden; width:330px; height:28px"></iframe>
		</div>
	<?php endif;
}

/**
* End
*/

?>
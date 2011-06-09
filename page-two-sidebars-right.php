<?php
/*
Template Name: Two Right Sidebars
Copyright (C) 2011 CyberChimps
*/
?>

<?php get_header(); ?>

<div>
<div class="sidebars_area">

<?php get_sidebar('right'); ?>

	<div class="content_half">
		
		<div class="content_padding">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="post_container">
			
				<div class="post" id="post-<?php the_ID(); ?>">

					<h2 class="posts_title"><?php the_title(); ?></h2>

					<div class="entry">

						<?php the_content(); ?>

						<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

					</div><!--end entry-->

				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

				</div><!--end post-->
		
			<?php comments_template(); ?>

			<?php endwhile; endif; ?>
			</div><!--end post_container-->
			
		</div><!--end content_padding-->
		
	</div><!--end content_left-->
<?php get_sidebar('left'); ?>
</div><!--end content_wrap-->
</div>

<div style=clear:both;></div>
<?php get_footer(); ?>

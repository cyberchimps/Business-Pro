<?php 

/*
	Archive
	Creates the Business Pro archive pages.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

	global $options, $themeslug, $post, $content_grid; // call globals
	
/* Header call. */

	business_sidebar_init();
	get_header(); 
	
/* End header. */

?>

<div class="container">
	<div class="row">
	<!--Begin @business before content sidebar hook-->
		<?php business_before_content_sidebar(); ?>
	<!--End @business before content sidebar hook-->
	<?php if (have_posts()) : ?>
	
		<div id="content" class="<?php echo $content_grid; ?>">
		
		<!--Begin @business before_archive hook-->
			<?php business_before_archive(); ?>
		<!--End @business before_archive hook-->
		
		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post_container">
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<!--Begin @business archive hook-->
				<?php business_loop(); ?>
			<!--End @business archive hook-->
			
			</div><!--end post_class-->	
		</div><!--end post container--> 
		<!--Begin @iFeature post bar hook-->
				<?php business_post_bar(); ?>
			<!--End @iFeature post bar hook-->

		 <?php endwhile; ?>
	 
	 <?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

		<!--Begin @business pagination hook-->
			<?php business_pagination(); ?>
		<!--End @business pagination hook-->
		
		<!--Begin @business after_archive hook-->
			<?php business_after_archive(); ?>
		<!--End @business after_archive hook-->
	
		</div><!--end content_padding-->

	<!--Begin @business after content sidebar hook-->
		<?php business_after_content_sidebar(); ?>
	<!--End @business after content sidebar hook-->
	
		</div><!--end content-->
	</div><!--end row-->
		<?php if ($options->get($themeslug.'_archive_breadcrumbs') == "1") { business_breadcrumbs();}?>
</div><!--end container-->

<?php get_footer(); ?>
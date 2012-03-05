<?php 

/*
	404
	Creates the Business Pro 404 page.
	Copyright (C) 2011 CyberChimps
*/

	global $options, $themeslug, $post, $sidebar, $content_grid; // call globals

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
	<div id="content" class="<?php echo $content_grid; ?>">
		<div class="content_padding">
		
			<!-- Begin @business before_404 hook content-->
      			<?php business_before_404(); ?>
      		<!-- Begin @business before_404 hook content-->
		
      		<!-- Begin @business 404 hook content-->
      			<?php business_404(); ?>
      		<!-- Begin @business 404 hook content-->
      		
      		<!-- Begin @business after_404 hook content-->
      			<?php business_after_404(); ?>
      		<!-- Begin @business after_404 hook content-->
      		
		</div><!--end content_padding-->
	</div><!--end content_left-->
	
	<!--Begin @business after content sidebar hook-->
		<?php business_after_content_sidebar(); ?>
	<!--End @business after content sidebar hook-->
	
</div><!--end content_wrap-->
	</div><!--end row-->
</div><!--end container-->

<?php get_footer(); ?>
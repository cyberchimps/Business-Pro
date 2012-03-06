<?php
/**
 * Create meta box for editing pages in WordPress
 *
 * Compatible with custom post types since WordPress 3.0
 * Support input types: text, textarea, checkbox, checkbox list, radio box, select, wysiwyg, file, image, date, time, color
 *
 * @author: Rilwis
 * @url: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 * @usage: please read document at project homepage and meta-box-usage.php file
 * @version: 3.0.1
 */
 

/********************* BEGIN DEFINITION OF META BOXES ***********************/

add_action('init', 'initialize_the_meta_boxes');

function initialize_the_meta_boxes() {

	global  $themename, $themeslug, $themenamefull, $options; // call globals.
	
	// Call taxonomies for select options
	
	$portfolioterms = get_terms('portfolio_categories', 'hide_empty=0');
	$portfoliooptions = array();

		foreach($portfolioterms as $term) {
			$portfoliooptions[$term->slug] = $term->name;
		}

	
	$carouselterms = get_terms('carousel_categories', 'hide_empty=0');
	$carouseloptions = array();

		foreach($carouselterms as $term) {
			$carouseloptions[$term->slug] = $term->name;
		}

	$terms = get_terms('slide_categories', 'hide_empty=0');
	$slideroptions = array();

		foreach($terms as $term) {
			$slideroptions[$term->slug] = $term->name;
		}

	$terms2 = get_terms('category', 'hide_empty=0');
	$blogoptions = array();
	$blogoptions['all'] = "All";

		foreach($terms2 as $term) {
			$blogoptions[$term->slug] = $term->name;
		}
	
	// End taxonomy call
	
	$meta_boxes = array();

	$mb = new Chimps_Metabox('post_slide_options', $themenamefull.' Slider Options', array('pages' => array('post')));
	$mb
		->tab("Slider Options")
			->single_image('slider_image', 'Slider Image', '')
			->text('slider_text', 'Slider Text', 'Enter your slider text here')
			->checkbox('slider_hidetitle', 'Title Bar', '', array('std' => 'on'))
			->single_image('slider_custom_thumb', 'Custom Thumbnail', 'Use the image uploader to upload a custom navigation thumbnail')
			->sliderhelp('', 'Need Help?', '')
		->end();
		
	$mb = new Chimps_Metabox('Carousel', 'Featured Post Carousel', array('pages' => array($themeslug.'_carousel')));
	$mb
		->tab("Featured Post Carousel Options")
			->single_image('post_image', 'Featured Post Image', '')
			->text('post_url', 'Featured Post URL', '')
			->reorder('reorder_id', 'Reorder', 'Reorder Desc' )
		->end();
		
	$mb = new Chimps_Metabox('Portfolio', 'Portfolio Element', array('pages' => array($themeslug.'_portfolio')));
	$mb
		->tab("Portfolio Element")
			->single_image('portfolio_image', 'Portfolio Image', '')
		->end();

	$mb = new Chimps_Metabox('slides', 'Custom Feature Slides', array('pages' => array($themeslug.'_custom_slides')));
	$mb
		->tab("Custom Slide Options")
			->select('slider_type', 'Select Slider Type', '', array('options' => array('Text and Image', 'Image Only', 'Text Only')) )
			->textarea('slider_caption', 'Custom Slide Caption', '')
			->single_image('slider_image', 'Custom Slide Image', '')
			->textarea('slider_media', 'Slider Media', '')
			->select('slider_text_align', 'Text Align', '', array('options' => array('Left', 'Right')) )
			->text('slider_url', 'Custom Slide Link', '')			
			->checkbox('slider_hidetitle', 'Slide Title Bar', '', array('std' => 'on'))
			->sliderhelp('', 'Need Help?', '')
			->reorder('reorder_id', 'Reorder', 'Reorder Desc' )
		->end();

	$mb = new Chimps_Metabox('pages', $themenamefull.' Page Options', array('pages' => array('page')));
	$mb
		->tab("Page Options")
			->image_select('page_sidebar', 'Select Page Layout', '',  array('options' => array(TEMPLATE_URL . '/images/options/right.png', TEMPLATE_URL . '/images/options/tworight.png', TEMPLATE_URL . '/images/options/rightleft.png', TEMPLATE_URL . '/images/options/none.png', TEMPLATE_URL . '/images/options/left.png')))
			->checkbox('hide_page_title', 'Page Title', '', array('std' => 'on'))
			->section_order('page_section_order', 'Page Elements', '', array('options' => array(
					'page_section' => 'Page',
					'breadcrumbs' => 'Breadcrumbs',
					'page_slider' => 'Content Slider',
					'portfolio_element' => 'Portfolio',
					'callout_section' => 'Callout',
					'twitterbar_section' => 'Twitter Bar',
					'product_element' => 'Product',
					'box_section' => 'Boxes',
					'carousel_section' => 'Carousel',			
					),
					'std' => 'page_section,breadcrumbs'
				))
			->pagehelp('', 'Need Help?', '')
		->tab($themenamefull." Slider Options")
			->select('page_slider_type', 'Select Slider Type', '', array('options' => array('Custom Slides', 'Blog Posts')) )
			->select('slider_category', 'Custom Slide Category', '', array('options' => $slideroptions) )
			->select('slider_blog_category', 'Blog Post Category', '', array('options' => $blogoptions, 'all') )
			->text('slider_blog_posts_number', 'Number of Featured Blog Posts', '', array('std' => '5'))
			->text('slider_height', 'Slider Height', '', array('std' => '330'))
			->text('slider_delay', 'Slider Delay Time (MS)', '', array('std' => '3500'))
			->select('page_slider_animation', 'Slider Animation Type', '', array('options' => array('Horizontal-Push (default)', 'Fade', 'Horizontal-Slide', 'Vertical-Slide')) )
			->select('page_slider_navigation_style', 'Slider Navigation Style', '', array('options' => array('Dots (default)', 'Thumbnails', 'None')) )
			->select('page_slider_caption_style', 'Slider Caption Style', '', array('options' => array('None (default)', 'Bottom', 'Left', 'Right')) )
			->checkbox('hide_arrows', 'Navigation Arrows', '', array('std' => 'on'))
			->checkbox('slider_timer', 'Slider Timer', '', array('std' => 'on'))
			->checkbox('enable_wordthumb', 'WordThumb Image Resizing', '', array('std' => 'off'))
			->sliderhelp('', 'Need Help?', '')
		->tab("Product Options")
			->select('product_text_align', 'Text Align', '', array('options' => array('Left', 'Right')) )
			->text('product_title', 'Product Title', '', array('std' => 'Product'))
			->textarea('product_text', 'Proudct Text', '', array('std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. '))
			->select('product_type', 'Media Type', '', array('options' => array('Image', 'Video')) )
			->single_image('product_image', 'Product Image', '', array('std' =>  TEMPLATE_URL . '/images/pro/product.jpg'))
			->textarea('product_video', 'Video Embed', '')
			->checkbox('product_link_toggle', 'Product Link', '', array('std' => 'on'))
			->text('product_link_url', 'Link URL', '', array('std' => home_url()))
			->text('product_link_text', 'Link URL', '', array('std' => 'Buy Now'))
		->tab("Callout Options")
			->textarea('callout_text', 'Callout Text', '')
			->checkbox('extra_callout_options', 'Custom Callout Options', '', array('std' => 'off'))
			->color('custom_callout_text_color', 'Custom Text Color', '')
			->color('custom_callout_link_color', 'Custom Link Color', '')
			->pagehelp('', 'Need help?', '')
		->tab("Carousel Options")
			->select('carousel_category', 'Carousel Category', '', array('options' => $carouseloptions) )
			->text('carousel_speed', 'Carousel Animation Speed (ms)', '', array('std' => '750'))
		->tab("Portfolio Options")
			->select('portfolio_row_number', 'Images per row', '', array('options' => array('Three (default)', 'Two', 'Four')) )
			->select('portfolio_category', 'Portfolio Category', '', array('options' => $portfoliooptions) )
			->checkbox('portfolio_title_toggle', 'Portfolio Title', '')
			->text('portfolio_title', 'Title', '', array('std' => 'Portfolio'))
		->tab("Twitter Options")
			->text('twitter_handle', 'Twitter Handle', 'Enter your Twitter handle if using the Twitter bar - Requires <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/" target="_blank">Twitter for WordPress Plugin')
		->tab("SEO Options")
			->text('seo_title', 'SEO Title', '')
			->textarea('seo_description', 'SEO Description', '')
			->textarea('seo_keywords', 'SEO Keywords', '')
			->pagehelp('', 'Need help?', '')
		->end();

	foreach ($meta_boxes as $meta_box) {
		$my_box = new RW_Meta_Box_Taxonomy($meta_box);
	}

}

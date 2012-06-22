<?php
/**
* Initializes the Business Pro Theme Options
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
* @package Business Pro
* @since 3.0
*/

require( get_template_directory() . '/core/classy-options/classy-options-framework/classy-options-framework.php');

add_action('init', 'chimps_init_options');

function chimps_init_options() {

global $options, $themeslug, $themename, $themenamefull;
$options = new ClassyOptions($themename, $themenamefull." Options");

$carouselterms2 = get_terms('carousel_categories', 'hide_empty=0');
	$customcarousel = array();                          
    	foreach($carouselterms2 as $carouselterm) {
        	$customcarousel[$carouselterm->slug] = $carouselterm->name;
        }
        
$portfolioterms2 = get_terms('portfolio_categories', 'hide_empty=0');
	$customportfolio = array();                                   
    	foreach($portfolioterms2 as $portfolioterm) {
        	$customportfolio[$portfolioterm->slug] = $portfolioterm->name;
        }

$customterms2 = get_terms('slide_categories', 'hide_empty=0');
	$customslider = array();                                    
    	foreach($customterms2 as $customterm) {
        	$customslider[$customterm->slug] = $customterm->name;
        }

$terms2 = get_terms('category', 'hide_empty=0');
	$blogoptions = array();                                  
	$blogoptions['all'] = "All";
    	foreach($terms2 as $term) {
        	$blogoptions[$term->slug] = $term->name;
        }

$options
	->section("Welcome")
		->info("<h1>Business Pro 3</h1>
		
<p><strong>Business Pro Professional Responsive WordPress Theme</strong></p>

<p>Business Pro 3 from CyberChimps WordPress Themes is a Professional Responsive WordPress Theme perfect for any business on any device. It gives your company the tools to turn WordPress into a modern Drag and Drop Content Management System (CMS).</p>

<p>To get started simply work your way through the menus to the left, select your options, add your content, and always remember to hit save after making any changes.</p>

<p>The Content Feature Slider options are under the Business Pro Page Options which are available below the Page content entry area in WP-Admin when you edit a page. This way you can configure each page individually. You will also find the Drag & Drop Page Elements editor within the Business Pro Page Options as well.</p>

<p>If you are using the Content Feature Slider, Image Carousel, or Portfolio on a Page you can edit your slides from the Content Slides menu available in the WP-Admin menu to the far left. Look for the CyberChimps logo.</p>

<p>We tried to make Business Pro as easy to use as possible, but if you still need help please read the <a href='http://cyberchimps.com/businesspro/docs/' target='_blank'>documentation</a>, and visit our <a href='http://cyberchimps.com/forum/pro/' target='_blank'>support forum</a>.</p>

<p>Thank you for using Business Pro.</p>

<p><strong>A Professional Business WordPress Theme</strong></p>
")
	->section("Design")
		->open_outersection()
			->select($themeslug."_color_scheme", "Select a Skin Color", array( 'options' => array("light" => "Light (default)", "dark" => "Dark"), 'default' => 'light'))
			->checkbox($themeslug."_responsive_video", "Responsive Videos")
		->close_outersection()
		->subsection("Typography")
			->select($themeslug."_font", "Choose a Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Actor" => "Actor", "Coda" => "Coda", "Maven+Pro" => "Maven Pro", "Metrophobic" => "Metrophobic", "News+Cycle" => "News Cycle", "Nobile" => "Nobile", "Tenor+Sans" => "Tenor Sans", "Quicksand" => "Quicksand", "Ubuntu" => "Ubuntu", 'custom' => "Custom")))
			->text($themeslug."_custom_font", "Enter a Custom Font")
		->textarea($themeslug."_typekit", "TypeKit Code")
		->subsection_end()
		->subsection("Custom Colors")
			->color($themeslug."_text_color", "Text Color")
			->color($themeslug."_sitetitle_color", "Site Title Color")
			->color($themeslug."_tagline_color", "Site Description Color")
			->color($themeslug."_link_color", "Link Color")
			->color($themeslug."_link_hover_color", "Link Hover Color")
			->color($themeslug."_posttitle_color", "Post Title Color")
			->color($themeslug."_footer_color", "Footer Color")
		->subsection_end()
			->open_outersection()
				->checkbox($themeslug."_lazy_load", "Lazy Load Image Effect", array('default' => true))
			->close_outersection()
			->open_outersection()
				->textarea($themeslug."_css_options", "Custom CSS")
			->close_outersection()
	->section("Header")
		->open_outersection()
			->section_order("header_section_order", "Drag & Drop Elements", array('options' => array("business_logo_menu" => "Logo + Menu", "business_description_icons" => "Description + Icons"), 'default' => 'business_logo_menu'))
		->close_outersection()
			->subsection("Header Options")
			->checkbox($themeslug."_custom_logo", "Custom Logo" , array('default' => true))
			->upload($themeslug."_logo", "Logo", array('default' => array('url' => TEMPLATE_URL . '/images/logo.png')))
			->upload($themeslug."_favicon", "Custom Favicon")
			->upload($themeslug."_apple_touch", "Apple Touch Icon", array('default' => array('url' => TEMPLATE_URL . '/images/apple-icon.png')))
		->subsection_end()
		->subsection("Menu Options")
			->select($themeslug."_menu_font", "Choose a Menu Font", array( 'options' => array("Lucida Grande" => "Lucida Grande (default)", "Arial" => "Arial", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Actor" => "Actor", "Coda" => "Coda", "Maven+Pro" => "Maven Pro", "Metrophobic" => "Metrophobic", "News+Cycle" => "News Cycle", "Nobile" => "Nobile", "Tenor+Sans" => "Tenor Sans", "Quicksand" => "Quicksand", "Ubuntu" => "Ubuntu", 'custom' => "Custom")))
			->text($themeslug."_custom_menu_font", "Enter a Custom Menu Font")
		->subsection_end()
		->subsection("Social")
			->text($themeslug."_twitter", "Twitter Icon URL", array('default' => 'http://twitter.com'))
			->checkbox($themeslug."_hide_twitter_icon", "Hide Twitter Icon", array('default' => true))
			->text($themeslug."_facebook", "Facebook Icon URL", array('default' => 'http://facebook.com'))
			->checkbox($themeslug."_hide_facebook_icon", "Hide Facebook Icon" , array('default' => true))
			->text($themeslug."_gplus", "Google + Icon URL", array('default' => 'http://plus.google.com'))
			->checkbox($themeslug."_hide_gplus_icon", "Hide Google + Icon" , array('default' => true))
			->text($themeslug."_flickr", "Flickr Icon URL", array('default' => 'http://flikr.com'))
			->checkbox($themeslug."_hide_flickr", "Hide Flickr Icon")
			->text($themeslug."_pinterest", "Pinterest Icon URL", array('default' => 'http://pinterest.com'))
			->checkbox($themeslug."_hide_pinterest", "Hide Pinterest Icon")
			->text($themeslug."_linkedin", "LinkedIn Icon URL", array('default' => 'http://linkedin.com'))
			->checkbox($themeslug."_hide_linkedin", "Hide LinkedIn Icon")
			->text($themeslug."_youtube", "YouTube Icon URL", array('default' => 'http://youtube.com'))
			->checkbox($themeslug."_hide_youtube", "Hide YouTube Icon")
			->text($themeslug."_googlemaps", "Google Maps Icon URL", array('default' => 'http://maps.google.com'))
			->checkbox($themeslug."_hide_googlemaps", "Hide Google maps Icon")
			->text($themeslug."_email", "Email Address")
			->checkbox($themeslug."_hide_email", "Hide Email Icon")
			->text($themeslug."_rsslink", "RSS Icon URL")
			->checkbox($themeslug."_hide_rss_icon", "Hide RSS Icon" , array('default' => true))
		->subsection_end()
		->subsection("Tracking")
			->textarea($themeslug."_ga_code", "Google Analytics Code")
		->subsection_end()
		->section("Front Page")
		->info("<p>The front-page template has been removed in favor of being able to use either a traditional static page or the blog page as the homepage.<br/><br/> For more information  visit our updated documentation page <a href='http://cyberchimps.com/question/using-the-front-page-and-posts-page-in-business-pro/' target='_blank'>here.</a></p>")		
		->section("Blog")
		->open_outersection()
			->section_order($themeslug."_blog_section_order", "Drag & Drop Elements", array('options' => array("business_post" => "Post Page", "business_page_slider" => "Content Slider","business_callout_section" => "Callout Section", "business_twitterbar_section" => "Twitter Bar", "business_index_carousel_section" => "Carousel", "business_portfolio_element" => "Portfolio", "business_product_element" => "Product","business_box_section" => "Boxes"), "default" => 'business_post'))
		->close_outersection()
		->subsection("Blog Options")
			->images($themeslug."_blog_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Post Excerpts")
			->text($themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => 'Continue Reading…'))
			->text($themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Featured Images")
			->multicheck($themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
		->subsection_end()
		->subsection("Blog Slider")
			->select($themeslug.'_blog_customslider_category', 'Custom slide category', array( 'options' => $customslider ))
			->text($themeslug."_blog_slider_height", "Slider height", array('default' => '300'))
			->text($themeslug."_blog_slider_delay", "Slider Delay", array('default' => '3500'))
			->select($themeslug."_blog_slider_animation", "Slider Animation", array( 'options' => array("key1" => "Horizontal-Push", "key2" => "Fade", "key3" => "Horizontal-Slide", "key4" => "Vertical-Slide")))
			->select($themeslug."_blog_slider_nav", "Slider Navigation", array( 'options' => array("key1" => "Dots", "key3" => "none")))
			->checkbox($themeslug."_blog_hide_slider_arrows", "Slider Arrows", array('default' => true))
			->checkbox($themeslug."_blog_enable_wordthumb", "WordThumb Image Resizing")
		->subsection_end()
		->subsection("Callout Options")
			->textarea($themeslug."_blog_callout_text", "Enter your Callout text")
		->subsection_end()
		->subsection("Twtterbar Options")
			->text($themeslug."_blog_twitter", "Enter your Twitter handle")
			->checkbox($themeslug."_blog_twitter_reply", "Show @ Replies")
		->subsection_end()
		->subsection("Carousel Options")
			->select($themeslug.'_carousel_category', 'Select the carousel category', array( 'options' => $customcarousel ))
			->text($themeslug."_carousel_speed", "Carousel Animation Speed (ms)", array('default' => '750'))
		->subsection_end()
		->subsection("Portfolio Options")
			->select($themeslug."_portfolio_number", "Images Per Row", array( 'options' => array("key1" => "Three (default)", "key2" => "Two", "key3" => "Four")))
			->select($themeslug.'_portfolio_category', 'Carousel Category', array( 'options' => $customportfolio ))
			->checkbox($themeslug."_portfolio_title_toggle", "Portfolio Title")
			->text($themeslug."_portfolio_title", "Title", array('default' => 'Portfolio'))
		->subsection_end()
		->subsection("Product Options")
			->select($themeslug."_blog_product_text_align", "Product Layout", array( 'options' => array("key1" => "Text Left - Image Right", "key2" => "Text Right - Image Left")))
			->text($themeslug."_blog_product_title", "Product Title", array('default' =>'Product'))
			->textarea($themeslug."_blog_product_text", "Product Text", array('default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. '))
			->select($themeslug."_blog_product_type", "Media Type", array( 'options' => array("key1" => "Image", "key2" => "Video")))
			->upload($themeslug."_blog_product_image", "Product Image", array('default' => array('url' => TEMPLATE_URL . '/images/pro/product.jpg')))
			->textarea($themeslug."_blog_product_video", "Video Embed")
			->checkbox($themeslug."_blog_product_link_toggle", "Product Link", array('default' => true))
			->text($themeslug."_blog_product_link_url", "Link", array('default' => home_url()))
			->text($themeslug."_blog_product_link_text", "Text", array('default' => 'Buy Now'))
		->subsection_end()
		->subsection("SEO")
			->textarea($themeslug."_home_description", "Home Description")
			->textarea($themeslug."_home_keywords", "Home Keywords")
			->text($themeslug."_home_title", "Optional Home Title")
		->subsection_end()
	->section("Templates")
		->subsection("Single Post")
			->images($themeslug."_single_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_single_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_single_show_featured_images", "Featured Images")
			->checkbox($themeslug."_single_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_single_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments",  $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_single_show_fb_like", "Facebook Like Button")
			->checkbox($themeslug."_single_show_gplus", "Google Plus One Button")
			->checkbox($themeslug."_post_pagination", "Post Pagination Links",  array('default' => true))
		->subsection_end()	
		->subsection("Archive")
			->images($themeslug."_archive_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_archive_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_archive_show_excerpts", "Post Excerpts", array('default' => true))
			->checkbox($themeslug."_archive_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_archive_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_archive_show_fb_like", "Facebook Like Button")
			->checkbox($themeslug."_archive_show_gplus", "Google Plus One Button")

			->subsection_end()
		->subsection("Search")
			->images($themeslug."_search_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_search_show_excerpts", "Post Excerpts", array('default' => true))
		->subsection_end()
		->subsection("404")
			->images($themeslug."_404_sidebar", "Sidebar Options", array( 'options' => array("none" => TEMPLATE_URL . '/images/options/none.png',"two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "left" => TEMPLATE_URL . '/images/options/left.png',  "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))

			->textarea($themeslug."_custom_404", "Custom 404 Content")
		->subsection_end()
	->section("Footer")
		->open_outersection()
			->checkbox($themeslug."_disable_footer", "Footer", array('default' => true))
			->text($themeslug."_footer_text", "Footer Copyright Text")
			->checkbox($themeslug."_hide_link", "CyberChimps Link", array('default' => true))
			->checkbox($themeslug."_disable_afterfooter", "Afterfooter", array('default' => true))
		->close_outersection()
	->section("Import / Export")
		->open_outersection()
			->export("Export Settings")
			->import("Import Settings")
		->close_outersection()
;
}

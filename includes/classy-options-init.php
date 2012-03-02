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
		->info("<h1>Business Pro 4</h1>
		
<p><strong>A Responsive Drag & Drop Premium WordPress Theme</strong></p>

<p>iFeature Pro 4 includes a Responsive Apple-like design (which magically adjusts to mobile devices such as the iPhone and iPad), Responsive iFeature Slider, New Drag & Drop Header Elements, Page and Blog Elements, intuitive Theme Options, and is built with HTML5 and CSS3.</p>

<p>To get started simply work your way through the menus to the left, select your options, add your content, and always remember to hit save after making any changes.</p>

<p>You will find the new Drag & Drop Header Elements editor under Header to the left, and the Drag & Drop Blog Elements editor under Blog.</p>

<p>The iFeature Pro Slider options are under the iFeature Pro Page Options which are available below the Page content entry area in WP-Admin when you edit a page. This way you can configure each page individually. You will also find the Drag & Drop Page Elements editor within the iFeature Pro Page Options as well.</p>

<p>If you are using the iFeature Pro Slider on a Page you can upload, and edit your slides from the iFeature Slides menu available in the WP-Admin menu to the far left. Look for the CyberChimps logo.</p>

<p>We tried to make iFeature Pro as easy to use as possible, but if you still need help please read the <a href='http://cyberchimps.com/ifeaturepro/docs/' target='_blank'>documentation</a>, and visit our <a href='http://cyberchimps.com/forum/pro/' target='_blank'>support forum</a>.</p>

<p>Thank you for using iFeature Pro.</p>

<p><strong>A Different Kind of WordPress Theme</strong></p>
")
	->section("Design")
		->open_outersection()
			->checkbox($themeslug."_responsive_design", "Responsive Design", array('default' => true))
			->select($themeslug."_color_scheme", "Select a Skin Color", array( 'options' => array("light" => "Light (default)", "dark" => "Dark", "blue" => "Blue", "brown" => "Brown", "red" => "Red", ), 'default' => 'lite'))
		->close_outersection()
		->subsection("Typopgraphy")
			->select($themeslug."_font", "Choose a Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Actor" => "Actor", "Coda" => "Coda", "Maven+Pro" => "Maven Pro", "Metrophobic" => "Metrophobic", "News+Cycle" => "News Cycle", "Nobile" => "Nobile", "Tenor+Sans" => "Tenor Sans", "Quicksand" => "Quicksand", "Ubuntu" => "Ubuntu", 'custom' => "Custom")))
			->text($themeslug."_custom_font", "Enter a Custom Font")
						->textarea($themeslug."_typekit", "TypeKit Code")
		->subsection_end()
		->subsection("Custom Colors")
			->color($themeslug."_sitetitle_color", "Site Title Color")
			->color($themeslug."_tagline_color", "Site Description Color")
			->color($themeslug."_link_color", "Link Color")
			->color($themeslug."_link_hover_color", "Link Hover Color")
			->color($themeslug."_posttitle_color", "Post Title Color")
			->color($themeslug."_footer_color", "Footer Color")
		->subsection_end()
			->open_outersection()
				->checkbox($themeslug."_widget_title_background", "Widget Title Background", array('default' => true))
			->close_outersection()
			->open_outersection()
				->checkbox($themeslug."_lazy_load", "Lazy Load Image Effect", array('default' => true))
			->close_outersection()
			->open_outersection()
				->textarea($themeslug."_css_options", "Custom CSS")
			->close_outersection()
	->section("Header")
		->open_outersection()
			->section_order("header_section_order", "Drag drop sections for the Header", array('options' => array("business_logo_menu" => "Logo + Menu", "business_subheader" => "Search + Icons"), 'default' => 'business_logo_menu'))
		->close_outersection()
			->subsection("Header Options")
			->upload($themeslug."_logo", "Custom Logo")
						->text($themeslug."_icon_margin", "Social Icon Margin Top", array('default' => '10px'))
			->upload($themeslug."_favicon", "Custom Favicon")
			->checkbox($themeslug."_disable_breadcrumbs", "Breadcrumbs", array('default' => true))
		->subsection_end()
		->subsection("Menu Options")
			->select($themeslug."_menu_font", "Choose a Menu Font", array( 'options' => array("Arial" => "Arial (default)", "Courier New" => "Courier New", "Georgia" => "Georgia", "Helvetica" => "Helvetica", "Lucida Grande" => "Lucida Grande", "Tahoma" => "Tahoma", "Times New Roman" => "Times New Roman", "Verdana" => "Verdana", "Actor" => "Actor", "Coda" => "Coda", "Maven+Pro" => "Maven Pro", "Metrophobic" => "Metrophobic", "News+Cycle" => "News Cycle", "Nobile" => "Nobile", "Tenor+Sans" => "Tenor Sans", "Quicksand" => "Quicksand", "Ubuntu" => "Ubuntu", 'custom' => "Custom")))
			->text($themeslug."_custom_menu_font", "Enter a Custom Menu Font")
			->checkbox($themeslug."_hide_home_icon", "Home Icon", array('default' => true))
			->checkbox($themeslug."_hide_search", "Searchbar", array('default' => true))
		->subsection_end()
		->subsection("Social")
			->images($themeslug."_icon_style", "Icon set", array( 'options' => array( 'round' => TEMPLATE_URL . '/images/social/thumbs/icons-round.png', 'legacy' => TEMPLATE_URL . '/images/social/thumbs/icons-classic.png', 'default' =>
TEMPLATE_URL . '/images/social/thumbs/icons-default.png' ), 'default' => 'default' ) )
			->text($themeslug."_twitter", "Twitter Icon URL", array('default' => 'http://twitter.com'))
			->checkbox($themeslug."_hide_twitter_icon", "Hide Twitter Icon", array('default' => true))
			->text($themeslug."_facebook", "Facebook Icon URL", array('default' => 'http://facebook.com'))
			->checkbox($themeslug."_hide_facebook_icon", "Hide Facebook Icon" , array('default' => true))
			->text($themeslug."_gplus", "Google + Icon URL", array('default' => 'http://plus.google.com'))
			->checkbox($themeslug."_hide_gplus_icon", "Hide Google + Icon" , array('default' => true))
			->text($themeslug."_flickr", "Flickr Icon URL", array('default' => 'http://flikr.com'))
			->checkbox($themeslug."_hide_flickr", "Hide Flickr Icon")
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
		->open_outersection()
			->section_order($themeslug."_front_section_order", "Front Page Re-Order", array('options' => array("synapse_page_slider" => "Content Slider", "synapse_callout_section" => "Callout Section", "synapse_twitterbar_section" => "Twitter Bar", "synapse_index_carousel_section" => "Carousel", "synapse_portfolio_element" => "Portfolio", "synapse_box_section" => "Boxes"), "default" => 'synapse_page_slider,synapse_callout_section,synapse_twitterbar_section'))
		->close_outersection()
		->subsection("Slider")
			->select($themeslug.'_front_customslider_category', 'Select the custom slide category', array( 'options' => $customslider ))
			->text($themeslug."_front_slider_height", "Slider height", array('default' => '330'))
			->text($themeslug."_front_slider_delay", "Slider Delay", array('default' => '3500'))
			->select($themeslug."_front_slider_animation", "Select the Sidebar Animation", array( 'options' => array("key1" => "Horizontal-Push", "key2" => "Fade", "key3" => "Horizontal-Slide", "key4" => "Vertical-Slide")))
			->select($themeslug."_front_slider_nav", "Select the Slider Navigation", array( 'options' => array("key1" => "Dots", "key2" => "Thumbnails", "key3" => "none")))
			->checkbox($themeslug."_front_hide_slider_arrows", "Slider Arrows", array('default' => true))
			->checkbox($themeslug."_front_slider_timer", "Slider Timer", array('default' => true))
			->checkbox($themeslug."_front_enable_wordthumb", "WordThumb Image Resizing")
		->subsection_end()
		->subsection("Callout")
			->textarea($themeslug."_front_callout_text", "Enter your Callout text")
			->checkbox($themeslug."_front_custom_callout_options", "Custom Callout Options")
			->color($themeslug."_front_callout_text_color", "Custom Callout Text Color")
		->subsection_end()
		->subsection("Twtterbar")
			->text($themeslug."_front_twitter", "Enter your Twitter handle")
			->info('Requires the <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/" target="_blank">Twitter for WordPress</a> plugin')
		->subsection_end()
		->subsection("Carousel")
			->select($themeslug.'_front_carousel_category', 'Select the carousel category', array( 'options' => $customcarousel ))
			->text($themeslug."_front_carousel_speed", "Carousel Animation Speed (ms)", array('default' => '750'))
		->subsection_end()
		->subsection("Portfolio")
			->select($themeslug."_front_portfolio_number", "Images per row", array( 'options' => array("key1" => "Three (default)", "key2" => "Two", "key3" => "Four")))
			->select($themeslug.'_front_portfolio_category', 'Select the carousel category', array( 'options' => $customportfolio ))
			->checkbox($themeslug."_front_portfolio_title_toggle", "Portfolio Title")
			->text($themeslug."_front_portfolio_title", "Title", array('default' => 'Portfolio'))
		->subsection_end()
		->section("Blog")
		->open_outersection()
			->section_order($themeslug."_blog_section_order", "Blog Page Re-Order", array('options' => array("synapse_index" => "Post Page", "synapse_page_slider" => "Content Slider","synapse_callout_section" => "Callout Section", "synapse_twitterbar_section" => "Twitter Bar", "synapse_index_carousel_section" => "Carousel", "synapse_portfolio_element" => "Portfolio", "synapse_box_section" => "Boxes"), "default" => 'synapse_index'))
		->close_outersection()
		->subsection("Blog Options")
			->images($themeslug."_blog_sidebar", "Select the Sidebar Type", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_post_formats", "Post Format Icons",  array('default' => true))
			->checkbox($themeslug."_show_excerpts", "Post Excerpts")
			->text($themeslug."_excerpt_link_text", "Excerpt Link Text", array('default' => 'Continue Reading…'))
			->text($themeslug."_excerpt_length", "Excerpt Character Length", array('default' => '55'))
			->checkbox($themeslug."_show_featured_images", "Featured Images")
			->multicheck($themeslug."_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_share" => "Share", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_show_fb_like", "Facebook Like Button")
			->checkbox($themeslug."_show_gplus", "Google Plus One Button")
		->subsection_end()
		->subsection("Blog Slider")
			->select($themeslug.'_customslider_category', 'Select the custom slide category', array( 'options' => $customslider ))
			->text($themeslug."_slider_delay", "Slider Delay", array('default' => '3500'))
			->select($themeslug."_slider_animation", "Select the Sidebar Animation", array( 'options' => array("key1" => "Horizontal-Push", "key2" => "Fade", "key3" => "Horizontal-Slide", "key4" => "Vertical-Slide")))
			->select($themeslug."_slider_nav", "Select the Slider Navigation", array( 'options' => array("key1" => "Dots", "key2" => "Thumbnails", "key3" => "none")))
			->checkbox($themeslug."_hide_slider_arrows", "Slider Arrows", array('default' => true))
			->checkbox($themeslug."_enable_wordthumb", "WordThumb Image Resizing")
		->subsection_end()
		->subsection("Callout Options")
			->text($themeslug."_blog_callout_title", "Enter your Callout title")
			->textarea($themeslug."_blog_callout_text", "Enter your Callout text")
			->checkbox($themeslug."_blog_callout_button", "Callout Button", array('default' => true))
			->text($themeslug."_blog_callout_button_text", "Enter your Callout Button text")
			->text($themeslug."_blog_callout_button_url", "Enter your Callout Button URL")
			->checkbox($themeslug."_blog_custom_callout_options", "Custom Callout Options")
			->upload($themeslug."_blog_custom_callout_button", "Custom Callout Button")
			->color($themeslug."_blog_callout_bg_color", "Custom Callout Background Color")
			->color($themeslug."_blog_callout_title_color", "Custom Callout Title Color")
			->color($themeslug."_blog_callout_text_color", "Custom Callout Text Color")
			->color($themeslug."_blog_callout_button_color", "Custom Callout Button Color")
			->color($themeslug."_blog_callout_button_text_color", "Custom Callout Button Text Color")
		->subsection_end()
		->subsection("Twtterbar Options")
			->text($themeslug."_blog_twitter", "Enter your Twitter handle")
			->info('Requires the <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/" target="_blank">Twitter for WordPress</a> plugin')
		->subsection_end()
		->subsection("Carousel Options")
			->select($themeslug.'_carousel_category', 'Select the carousel category', array( 'options' => $customcarousel ))
			->text($themeslug."_carousel_speed", "Carousel Animation Speed (ms)", array('default' => '750'))
		->subsection_end()
		->subsection("Portfolio Options")
			->select($themeslug."_portfolio_number", "Images per row", array( 'options' => array("key1" => "Three (default)", "key2" => "Two", "key3" => "Four")))
			->select($themeslug.'_portfolio_category', 'Select the carousel category', array( 'options' => $customportfolio ))
			->checkbox($themeslug."_portfolio_title_toggle", "Portfolio Title")
			->text($themeslug."_portfolio_title", "Title", array('default' => 'Portfolio'))
		->subsection_end()
		->subsection("SEO")
			->textarea($themeslug."_home_description", "Home Description")
			->textarea($themeslug."_home_keywords", "Home Keywords")
			->text($themeslug."_home_title", "Optional Home Title")
		->subsection_end()
	->section("Templates")
		->subsection("Single Post")
			->images($themeslug."_single_sidebar", "Select the Sidebar Type", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_single_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_single_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_single_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_share" => "Share", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_single_show_fb_like", "Facebook Like Button")
			->checkbox($themeslug."_single_show_gplus", "Google Plus One Button")
			->checkbox($themeslug."_post_pagination", "Post Pagination Links",  array('default' => true))
		->subsection_end()	
		->subsection("Archive")
			->images($themeslug."_archive_sidebar", "Select the Sidebar Type", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_archive_breadcrumbs", "Breadcrumbs", array('default' => true))
			->checkbox($themeslug."_archive_show_excerpts", "Post Excerpts", array('default' => true))
			->checkbox($themeslug."_archive_post_formats", "Post Format Icons",  array('default' => true))
			->multicheck($themeslug."_archive_hide_byline", "Post Byline Elements", array( 'options' => array($themeslug."_hide_author" => "Author" , $themeslug."_hide_categories" => "Categories", $themeslug."_hide_date" => "Date", $themeslug."_hide_comments" => "Comments", $themeslug."_hide_share" => "Share", $themeslug."_hide_tags" => "Tags"), 'default' => array( $themeslug."_hide_tags" => true, $themeslug."_hide_share" => true, $themeslug."_hide_author" => true, $themeslug."_hide_date" => true, $themeslug."_hide_comments" => true, $themeslug."_hide_categories" => true ) ) )
			->checkbox($themeslug."_archive_show_fb_like", "Facebook Like Button")
			->checkbox($themeslug."_archive_show_gplus", "Google Plus One Button")

			->subsection_end()
		->subsection("Search")
			->images($themeslug."_search_sidebar", "Select the Sidebar Type", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
			->checkbox($themeslug."_search_show_excerpts", "Post Excerpts", array('default' => true))
		->subsection_end()
		->subsection("404")
			->images($themeslug."_404_sidebar", "Select the Sidebar Type", array( 'options' => array("left" => TEMPLATE_URL . '/images/options/left.png', "two-right" => TEMPLATE_URL . '/images/options/tworight.png', "right-left" => TEMPLATE_URL . '/images/options/rightleft.png', "none" => TEMPLATE_URL . '/images/options/none.png', "right" => TEMPLATE_URL . '/images/options/right.png'), 'default' => 'right'))
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

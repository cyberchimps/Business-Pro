<?php
/**
* Functions related to the Business Theme Options.
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
* @package Business
* @since 3.0
*/

function business_content_layout() {
	global $options, $themeslug, $post;
	
	if (is_single()) {
	$sidebar = $options->get($themeslug.'_single_sidebar');
	}
	elseif (is_archive()) {
	$sidebar = $options->get($themeslug.'_archive_sidebar');
	}
	elseif (is_404()) {
	$sidebar = $options->get($themeslug.'_404_sidebar');
	}
	elseif (is_search()) {
	$sidebar = $options->get($themeslug.'_search_sidebar');
	}
	elseif (is_page()) {
	$sidebar = get_post_meta($post->ID, 'page_sidebar' , true);
	}
	else {
	$sidebar = $options->get($themeslug.'_blog_sidebar');
	}
	
	if ($sidebar == 'two-right' OR $sidebar == '3' ) {
		echo '<style type="text/css">';
		echo "#content.six.columns {width: 52.8%;  margin-right: 2%}";
		echo "#content.six.columns {width: 52.8%;  margin-right: 1.9%\9;}";
		echo "#sidebar-right.three.columns {margin-left: 0%; width: 21.68%;}";
		echo "#sidebar-left.three.columns {margin-left: 0%; width: 21.68%; margin-right:2%}";
		echo "#sidebar-left.three.columns {margin-left: 0%; width: 21.68%; margin-right:1.9%\9;}";
		echo "@-moz-document url-prefix() {#content.six.columns {width: 52.8%;  margin-right: 1.9%} #sidebar-left.three.columns {margin-left: 0%; width: 21.68%; margin-right:1.9%}}";
		echo '</style>';
	}
	if ($sidebar == 'right-left' OR $sidebar == '2' ) {
		echo '<style type="text/css">';
		echo "#content.six.columns {width: 52.8%; margin-left: 2%; margin-right: 2%}";
		echo "#content.six.columns {width: 52.8%; margin-left: 1.9%\9; margin-right: 1.9%\9;}";
		echo "#sidebar-right.three.columns {margin-left: 0%; width: 21.68%;}";
		echo "#sidebar-left.three.columns {margin-left: 0%; width: 21.68%;}";
		echo "@-moz-document url-prefix() {#content.six.columns {width: 52.8%; margin-left: 1.9%; margin-right: 1.9%}}";
		echo '</style>';
	}

}
add_action( 'wp_head', 'business_content_Layout' );

/* Widget Title Background*/

function widget_title_background() {
	global $options, $themeslug;
		
	if ($options->get($themeslug.'_widget_title_background') == '0' ) {
		echo '<style type="text/css">';
		echo ".widget-title {background: none; border-bottom: none;}";
		echo '</style>';
	}

}
add_action( 'wp_head', 'widget_title_background' );

/* Icon margin*/

function icon_margin() {
	global $options, $themeslug;
	$margin = $options->get($themeslug.'_icon_margin');
	
	if ($options->get($themeslug.'_icon_margin') != '10px' ) {
		echo '<style type="text/css">';
		echo ".icons {margin-top: $margin;}";
		echo '</style>';
	}

}
add_action( 'wp_head', 'icon_margin' );

/* Adjust postbar width for full width and 2 sidebar configs*/

function postbar_option() {
	global $options, $themeslug;
	
	if ($options->get($themeslug.'_blog_sidebar') == 'two-right' OR $options->get($themeslug.'_blog_sidebar') == 'right-left') {
		echo '<style type="text/css">';
		echo ".postbar {width: 95.4%;}";
		echo '</style>';
	}
	
	if ($options->get($themeslug.'_blog_sidebar') == 'none') {
		echo '<style type="text/css">';
		echo ".postbar {width: 97.8%;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'postbar_option');

/* Plus 1 Allignment */

function plusone_alignment() {

	global $themename, $themeslug, $options;
	
	if ($options->get($themeslug.'_show_fb_like') == "1" AND $options->get($themeslug.'_show_gplus') == "1" OR $options->get($themeslug.'_single_show_fb_like') == "1" AND $options->get($themeslug.'_single_show_gplus') == "1" ) {

		echo '<style type="text/css">';
		echo ".gplusone {float: right; margin-right: -38px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'plusone_alignment');


/* Featured Image Alignment */

function featured_image_alignment() {

	global $themename, $themeslug, $options;
	
	if ($options->get($themeslug.'_featured_image_align') == "key3" ) {

		echo '<style type="text/css">';
		echo ".featured-image {float: right;}";
		echo '</style>';
		
	}
	
	elseif ($options->get($themeslug.'_featured_image_align') == "key2" ) {

		echo '<style type="text/css">';
		echo ".featured-image {text-align: center;}";
		echo '</style>';
		
	}
	
	else {

		echo '<style type="text/css">';
		echo ".featured-image {float: none;}";
		echo '</style>';
		
	}

	
}
add_action( 'wp_head', 'featured_image_alignment');

/* Post Meta Data width */

function post_meta_data_width() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_blog_sidebar') == "two-right" OR $options->get($themeslug.'_blog_sidebar') == "right-left") {

		echo '<style type="text/css">';
		echo ".postmetadata {width: 480px;}";
		echo '</style>';
		
	}
	
}
add_action( 'wp_head', 'post_meta_data_width');

/* Site Title Color */

function add_sitetitle_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_sitetitle_color') != "") {
		$sitetitle = $options->get($themeslug.'_sitetitle_color'); 
		echo '<style type="text/css">';
		echo ".sitename a {color: $sitetitle;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_sitetitle_color');

/* Link Color */

function add_link_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_link_color') != '') {
		$link = $options->get($themeslug.'_link_color'); 
		echo '<style type="text/css">';
		echo "a {color: $link;}";
		echo ".meta a {color: $link;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_link_color');

/* Link Hover Color */

function add_link_hover_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_link_hover_color') != '') {
		$link = $options->get($themeslug.'_link_hover_color'); 
		echo '<style type="text/css">';
		echo "a:hover {color: $link;}";
		echo ".meta a:hover {color: $link;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_link_hover_color');

/* Tagline Color */

function add_tagline_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_tagline_color') != '') {
		$tagline = $options->get($themeslug.'_tagline_color'); 
		echo '<style type="text/css">';
		echo "#description {color: $tagline;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_tagline_color');

/* Post Title Color */

function add_posttitle_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_posttitle_color') != '') {
		$posttitle = $options->get($themeslug.'_posttitle_color'); 
			
		echo '<style type="text/css">';
		echo ".posts_title a {color: $posttitle;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_posttitle_color');

/* Footer Color */

function add_footer_color() {

	global $themename, $themeslug, $options;

	if ($options->get($themeslug.'_footer_color') != "" ) {
	
		$footercolor = $options->get($themeslug.'_footer_color'); 
	
	
		echo '<style type="text/css">';
		echo "#footer {background: $footercolor;}";
		echo '</style>';
	}
}
add_action( 'wp_head', 'add_footer_color');

/* Menu Font */
 
function add_menu_font() {
		
	global $themename, $themeslug, $options;	
		
	if ($options->get($themeslug.'_menu_font') == "") {
		$font = 'Lucida Grande';
	}		
		
	elseif ($options->get($themeslug.'_menu_font') == 'custom' && $options->get($themeslug.'_custom_menu_font') != "") {
		$font = $options->get($themeslug.'_custom_menu_font');	
	}
	
	else {
		$font = $options->get($themeslug.'_menu_font'); 
	}
	
		$fontstrip =  ereg_replace("[^A-Za-z0-9]", " ", $font );
	
		echo "<link href='http://fonts.googleapis.com/css?family=$font' rel='stylesheet' type='text/css' />";
		echo '<style type="text/css">';
		echo "#nav ul li a {font-family: $fontstrip;}";
		echo '</style>';
}
add_action( 'wp_head', 'add_menu_font'); 

/* Custom CSS */

function custom_css() {

	global $themename, $themeslug, $options;
	
	$custom =$options->get($themeslug.'_css_options');
	echo '<style type="text/css">' . "\n";
	echo  $custom  . "\n";
	echo '</style>' . "\n";
}

function custom_css_filter($_content) {
	$_return = preg_replace ( '/@import.+;( |)|((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/))/i', '', $_content );
	$_return = htmlspecialchars ( strip_tags($_return), ENT_NOQUOTES, 'UTF-8' );
	return $_return;
}
		
add_action ( 'wp_head', 'custom_css' );

?>
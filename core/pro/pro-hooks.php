<?php
/**
* Hook wrappers used by Business Pro.
*
* Author: Tyler Cunningham
* Copyright: © 2012
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

/** 
* Box Section
*/
function business_box_section() {
	do_action ('business_box_section');
}

/** 
* Callout Section
*/
function business_callout_section() {
	do_action ('business_callout_section');
}

/** 
* Carousel Section
*/
function business_index_carousel_section() {
	do_action ('business_index_carousel_section');
}

function business_carousel_section() {
	do_action ('business_carousel_section');
}

/** 
* Entry 
*/
function business_pro_before_entry() {
	do_action('business_pro_before_entry');
}

function business_pro_entry() {
	do_action('business_pro_entry');
}

function business_front_page_custom() {
	do_action('business_front_page_custom');
}

/** 
* Front Page
*/

/** 
* Portfolio
*/
function business_portfolio_element() {
	do_action('business_portfolio_element');
}

/** 
* Product
*/
function business_product_element() {
	do_action('business_product_element');
}

/** 
* Slider
*/
function business_blog_slider() {
	do_action ('business_blog_slider');
}
function business_blog_content_slider() {
	do_action ('business_blog_content_slider');
}
function business_page_slider() {
	do_action ('business_page_slider');
}
function business_page_content_slider() {
	do_action ('business_page_content_slider');
}

/**
* End
*/
		    
?>
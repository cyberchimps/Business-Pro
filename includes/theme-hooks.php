<?php
/**
* Custom hooks used by the Business Pro WordPress Theme
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


/**
* Hook for header content area
*
* @since 3.0
*/
function business_header_content() {
	do_action('business_header_content');
}

/**
* Hook for the Header Contact Area
*
* @since 3.0.5
*/
function business_header_contact_area() {
	do_action('business_header_contact_area');
}

function business_sitename_register() {
	do_action('business_sitename_register');
}

function business_sitename_contact() {
	do_action('business_sitename_contact');
}

function business_description_icons() {
	do_action('business_description_icons');
}

function business_logo_menu() {
	do_action('business_logo_menu');
}

function business_logo_description() {
	do_action('business_logo_description');
}

function business_banner() {
	do_action('business_banner');
}
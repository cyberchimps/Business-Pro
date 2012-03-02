<?php
/**
* Callout section actions used by the CyberChimps Synapse Core Framework Pro Extension
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
* @package Pro
* @since 1.0
*/

/**
* Pro callout actions
*/
add_action ( 'synapse_callout_section', 'synapse_callout_section_content' );

/**
* Retrieves the Callout Section options and sets up the HTML
*
* @since 1.0
*/
function synapse_callout_section_content() {

	global $options, $themeslug, $post; //call globals
	$root = get_template_directory_uri();  

/* Define variables. */	

	if (is_page()) {
		$tcolor = get_post_meta($post->ID, 'custom_callout_text_color' , true);
		$text = get_post_meta($post->ID, 'callout_text' , true);
	}
	elseif (is_front_page()) {
		$tcolor = $options->get($themeslug.'_front_callout_text_color');
		$title = $options->get($themeslug.'_front_callout_title');
	}
	else {
		$tcolor = $options->get($themeslug.'_blog_callout_text_color');
		$text = $options->get($themeslug.'_blog_callout_text');
	}
	
	if ($hidebutton == "on" OR $hidebutton == "1") {
		$grid = 'eight columns';
	}
	else {
		$grid = 'twelve columns';
	}
	
/* End variable definition. */	

/* Echo custom button color. */

	if ($bcolor != "") {
		echo '<style type="text/css" media="screen">';
		echo "#calloutbutton {background: $bcolor ;}";
		echo '</style>';
	}
	
/* End custom button color. */

/* Echo custom button text color. */

	if ($bcolor != "") {
		echo '<style type="text/css" media="screen">';
		echo "#calloutbutton a {color: $btcolor ;}";
		echo '</style>';
	}
	
/* End custom button color. */

/* Echo custom text color. */

	if ($tcolor != "") {
		echo '<style type="text/css" media="screen">';
		echo "#callout_text {color: $tcolor ;}";
		echo '</style>';
	}
	
/* Echo custom title color. */

	if ($ticolor != "") {
		echo '<style type="text/css" media="screen">';
		echo ".callout_title {color: $ticolor ;}";
		echo '</style>';
	}

/* End custom text color. */

/* Echo background color CSS. */	

	if ($customcalloutbgcolor != ''){
		echo '<style type="text/css" media="screen">';
		echo "#calloutwrap {background: $customcalloutbgcolor ;}";
		echo '</style>';
	}
		
/* End CSS. */	

/* Define Callout title. */	

	if ($title == '') {
		$callouttitle = 'Steve Jobs said something but I cannot remember what it was exactly so here is this empty text instead - Tyler Cunningham';
	}
	else {
		$callouttitle = $title;
	}
	
/* End define Callout title. */	

/* Define Callout text. */	

	if ($text == '') {
		$callouttext = 'CyberChimps gives you the tools to turn WordPress into a modern feature rich Content Management System (CMS)';
	}
	else {
		$callouttext = $text;
	}
	
/* End define Callout title. */	

/* Define Callout button text. */

	if ($btext == '') {
		$calloutbuttontext = 'Buy Now';
	}
	else {
		$calloutbuttontext = $btext;
	}

/* End define Callout button text. */	

/* Define Callout button image. */

	if ($image != '') {
		$calloutimage = $image;
	}

/* End define Callout button image. */

/* Define Callout button link. */

	if ($link == '') {
		$calloutlink = 'http://cyberchimps.com';
	}
	else {
		$calloutlink = $link;
	}

/* End define Callout button link. */	

?>
	<div class="calloutbg">
		<div class="row">
			<div id="callout_text" class="twelve columns">
				<h2 class="callout_title" ><?php echo $callouttext ?></h2>
			</div>
		</div>
	</div>

<?php
	
}

/**
* End
*/

?>
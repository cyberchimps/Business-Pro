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

	global $options, $themeslug, $post, $wp_query; //call globals
	$root = get_template_directory_uri();  

/* Define variables. */	

	if (is_page()) {
		$tcolor = get_post_meta($post->ID, 'custom_callout_text_color' , true);
		$text = get_post_meta($post->ID, 'callout_text' , true);
	}
	if (is_front_page()) {
		$tcolor = $options->get($themeslug.'_front_callout_text_color');
		$text = $options->get($themeslug.'_front_callout_text');
	}
	else {
		$tcolor = $options->get($themeslug.'_blog_callout_text_color');
		$text = $options->get($themeslug.'_blog_callout_text');
	}
		
/* End variable definition. */	

/* Echo custom text color. */

	if ($tcolor != "") {
		echo '<style type="text/css" media="screen">';
		echo "#callout_text {color: $tcolor ;}";
		echo '</style>';
	}
			
/* End CSS. */	

/* Define Callout text. */	

	if ($text == '') {
		$callouttext = 'CyberChimps gives you the tools to turn WordPress into a modern feature rich Content Management System (CMS)';
	}
	else {
		$callouttext = $text;
	}
	var_dump($text);
/* End define Callout title. */	


?>
	<div class="calloutbg">
		<div class="container">
		<div class="row">
			<div id="callout_text" class="twelve columns">
				<?php echo $callouttext ?>
			</div>
		</div>
		</div>
	</div>

<?php
	
}

/**
* End
*/

?>
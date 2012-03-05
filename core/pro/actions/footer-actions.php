<?php
/**
* Footer actions used by Business Pro
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
* Adds the CyberChimps Pro credit link.
*
* @since 3.0
*/
function business_pro_secondary_footer_credit() { 
	global $options, $themeslug; //call globals
	
	if ($options->get($themeslug.'_hide_link') == "1") {?>
		
		<div id="credit" class="six columns">
			<a href="http://cyberchimps.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/achimps.png" alt="credit" /></a>
		</div> 
	
	<?php }
}

/**
* End
*/

?>
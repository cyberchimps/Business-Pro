<?php
/**
* Callout actions used by the CyberChimps Core Framework Pro Extension
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

remove_action ( 'chimps_afterfooter', 'chimps_afterfooter_credit' );
add_action ( 'chimps_afterfooter', 'chimps_pro_afterfooter_credit' );

/**
* Adds the CyberChimps Pro credit link.
*
* @since 1.0
*/
function chimps_pro_afterfooter_credit() { 
	global $options, $themeslug; //call globals
	
	if ($options->get($themeslug.'_hide_link') == "1") {?>
		
		<div class="credit">
			<a href="http://cyberchimps.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/achimps.png" alt="credit" /></a>
		</div> 
	
	<?php }
}

/**
* End
*/

?>
<?php
/**
* Front Page actions used by Business.
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
* @package Business 
* @since 3.0
*/

add_action( 'business_front_page_custom', 'business_front_page_custom_content' );

function business_front_page_custom_content(){

global $themeslug, $options; ?>
	
	<div class="container">
		<div class="row">
		
			<div id="front_custom" class="twelve columns">
				
				<?php echo stripslashes ($options->get($themeslug.'_front_custom_html')); 	?>
						
			</div>	
		</div><!--end row-->
	</div>	

<?php	
}

?>
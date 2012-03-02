<?php
/**
* Box section actions used by the CyberChimps Synapse Core Framework Pro Extension
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

add_action( 'synapse_product_element', 'synapse_product_element_content' );

function synapse_product_element_content(){
	global $options, $themeslug, $root, $post, $wp_query;
	
	if (is_page()) {
		$title = get_post_meta($post->ID, 'product_title' , true);
		$text  = get_post_meta($post->ID, 'product_text' , true);
		$image = get_post_meta($post->ID, 'product_image' , true);
		$embed = get_post_meta($post->ID, 'product_media' , true);	
		$align = get_post_meta($post->ID, 'product_text_align' , true);
	}
?>

<div id="productbg">
	<div class="container">
		<div class="row">
			<div id="portfolio_text" class="six columns">
			<?php echo $text; ?>
			</div>
			<div id="portfolio_media" class="six columns">
			<img src="<?php echo $image; ?>">
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
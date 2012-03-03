<?php
/**
* Product element actions used by the CyberChimps Synapse Core Framework Pro Extension
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
* @package Pro
* @since 1.0
*/

add_action( 'synapse_product_element', 'synapse_product_element_content' );

function synapse_product_element_content(){
	global $options, $themeslug, $root, $post;
	
	if (is_front_page()) {
		$text  = $options->get($themeslug.'_front_product_text');
		$title = $options->get($themeslug.'_front_product_title');
		$imgsource = $options->get($themeslug.'_front_product_image');
		$embed = $options->get($themeslug.'_front_product_media');
		$align = $options->get($themeslug.'_front_product_text_align');
		$image = $imgsource['url'];
	}
	elseif (is_page() && !is_front_page()) {
		$title = get_post_meta($post->ID, 'product_title' , true);
		$text  = get_post_meta($post->ID, 'product_text' , true);
		$image = get_post_meta($post->ID, 'product_image' , true);
		$embed = get_post_meta($post->ID, 'product_media' , true);	
		$align = get_post_meta($post->ID, 'product_text_align' , true);
	}
	else {
		$text  = $options->get($themeslug.'_blog_product_text');
		$title = $options->get($themeslug.'_blog_product_title');
		$imgsource = $options->get($themeslug.'_blog_product_image');
		$embed = $options->get($themeslug.'_blog_product_media');
		$align = $options->get($themeslug.'_blog_product_text_align');	
		$image = $imgsource['url'];
	}
	
	if ($align == "0" OR $align =="key1") {
		$output =   "
					<div id='product_text' class='six columns'>
						<span class='product_text_title'>$title</span> <br /> <span class='product_text_text'>$text </span><br /><br />
							<a href='#' class='nice medium radius white button'>Buy Now</a>
					</div>
					<div id='product_media' class='six columns'>
						<img src='$image'>
					</div>
				    "; 
	}
	if ($align == "1" OR $align =="key2"){
		$output =   "
					<div id='product_media' class='six columns'>
						<img src='$image'>
					</div>
					<div id='product_text' class='six columns'>
						<span class='product_text_title'>$title</span> <br /> <span class='product_text_text'>$text </span><br /><br />
							<a href='#' class='nice medium radius white button'>Button Text</a>

					</div>
				    "; 
	}
?>

<div id="productbg">
	<div class="container">
		<div class="row">
			<?php echo $output; ?>
		</div>
	</div>
</div>

<?php
}

/**
* End
*/

?>
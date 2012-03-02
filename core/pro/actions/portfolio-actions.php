<?php
/**
* Portfolio section actions used by the CyberChimps Synapse Core Framework Pro Extension
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
* Synapse Portfolio Section actions
*/
add_action( 'synapse_portfolio_element', 'synapse_portfolio_element_content' );
	
function synapse_portfolio_element_content() {	
	global $options, $post, $themeslug, $root, $wp_query;
	$tmp_query = $wp_query; 
	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	
	if (is_page()){
		$category = get_post_meta($post->ID, 'portfolio_category' , true);
		$num = get_post_meta($post->ID, 'portfolio_row_number' , true);
		$title_enable = get_post_meta($post->ID, 'portfolio_title_toggle' , true);
		$title = get_post_meta($post->ID, 'portfolio_title' , true);;
	}
	if (is_front_page()) {
		$category = $options->get($themeslug.'_front_portfolio_category');
		$num = $options->get($themeslug.'_front_portfolio_number');
		$title_enable = $options->get($themeslug.'_front_portfolio_title_toggle');
		$title = $num = $options->get($themeslug.'_front_portfolio_title');
	}
	else {
		$category = $options->get($themeslug.'_portfolio_category');
		$num = $options->get($themeslug.'_portfolio_number');
		$title_enable = $options->get($themeslug.'_portfolio_title_toggle');
		$title = $num = $options->get($themeslug.'_portfolio_title');
	}
	
	if ($num == '1' OR $num == 'key2') {
		$number = 'six';
	}
	elseif ($num == '2' OR $num == 'key3') {
		$number = 'three';
	}
	else {
		$number = 'four';
	}
	
	if ($title == '') {
		$title = 'Portfolio';
	}
	else {
		$title = $title;
	}
	if ($title_enable == 'on' OR $title_enable == '1') {
		$title_output = "<h1 class='portfolio_title'>$title</h1>";
	}
	
	else {
		$title_output = '';
	}
	
	?>

<div id="portfolio" class="container">
	<div class="row">
	
	<?php query_posts( array ('post_type' => $themeslug.'_portfolio', 'showposts' => 50, 'portfolio_categories' => $category ));
			
	if (have_posts()) :
	  	 $out = " <div id='gallery' class='twelve columns'>$title_output<ul>"; 

	  	$i = 0;
		$no = '50';

		while (have_posts() && $i<$no) : 

		the_post(); 

	    	/* Post-specific variables */	

	    	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	    	$title = get_the_title() ;	    	
	    	
	     	/* Markup for portfolio */

	    	$out .= "
				<li id='portfolio_wrap' class='$number columns'>
	    			<a href='$image' title='$title'><img src='$image'  alt='$title'/>
	    				<div class='portfolio_caption'>$title</div>
	    			</a>	
	  	    	</li>
	    			";

	    	/* End slide markup */	

	      	$i++;
	      	endwhile;
	      	$out .= "</ul></div>";	 
	      	
	      	else:
	      
	      	$out .= "	
	    		<div id='gallery' class='twelve columns'><ul>
	      			<li id='portfolio_wrap' class='four columns'>
	    				<a href='$root/images/portfolio.jpg' title='Image 1'><img src='$root/images/portfolio.jpg'  alt='Image 1'/>
	    					<div class='portfolio_caption'>Image 1</div>
	    				</a>
	    			</li>
	    		
	  	    		<li id='portfolio_wrap' class='four columns'>
	    				<a href='$root/images/portfolio.jpg' title='Image 2'><img src='$root/images/portfolio.jpg'  alt='Image 2'/>
	    					<div class='portfolio_caption'>Image 2</div>
	    				</a>
	    			</li>
	    		
					<li id='portfolio_wrap' class='four columns'>
	    				<a href='$root/images/portfolio.jpg' title='Image 3'><img src='$root/images/portfolio.jpg'  alt='Image 3'/>
	    					<div class='portfolio_caption'>Image 3</div>
	    				</a>
	    			</li>
	    	 	</ul></div>	
	    				
	    			";
     
	endif; 	    
	$wp_query = $tmp_query;    

/* End slide creation */		

	wp_reset_query(); /* Reset post query */ 
	
/* Begin Carousel javascript */ 
    
    $out .= <<<OUT
 <script type="text/javascript">
 	jQuery(document).ready(function ($) {
    $(function() {
        $('#gallery a').lightBox({
    		imageLoading:			'$root/images/portfolio/lightbox-ico-loading.gif',		
			imageBtnPrev:			'$root/images/portfolio/lightbox-btn-prev.gif',			
			imageBtnNext:			'$root/images/portfolio/lightbox-btn-next.gif',			
			imageBtnClose:			'$root/images/portfolio/lightbox-btn-close.gif',		
			imageBlank:				'$root/images/portfolio/lightbox-blank.gif',			
	 });
    });
    });
    </script>
    
    
OUT;

/* End Carousel javascript */ 

echo $out;

/* END */ 
?>
	
	</div>
</div>


<?php
}
?>
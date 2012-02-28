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
	global $options, $post, $themeslug, $root;
	$tmp_query = $wp_query; 
	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	
	if (is_page()){
		$category = get_post_meta($post->ID, 'portfolio_category' , true);
		$num = get_post_meta($post->ID, 'portfolio_row_number' , true);
	}
	else {
	
	}
	
	if ($num == '1') {
			$number = 'six';
		}
		elseif ($num == '2') {
			$number = 'three';
		}
		else {
			$number = 'four';
		}

	?>

<div id="portfolio" class="container">
	<div class="row">
	
	<?php query_posts( array ('post_type' => $themeslug.'_portfolio', 'showposts' => 20, 'portfolio_categories' => $category ));
			
	if (have_posts()) :
	  	 $out = " <div class='row'><div id='gallery' class='twelve columns'><ul>"; 

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
	      	$out .= "</ul></div></div>";	 
	      	
	      	else:
	      
	      	$out .= "	
	    	<ul>
	      			<li>
	      				
	    				<img src='$default' alt='Post 1'/>
	    				
	    			</li>
					<li>
	    				<img src='$default' alt='Post 2' />
	    			</li>
					<li>
	    				<img src='$default' alt='Post 3' />
	    			</li>
					<li>
	    				<img src='$default' alt='Post 4' />
	    			</li>
					<li>
	    				<img src='$default' alt='Post 5' />
	    			</li>
	    			
	    			<li>
	    				<img src='$default' alt='Post 6' />
	    			</li>
	    			
	    			<li>
	    				<img src='$default' alt='Post 6' />
	    			</li>

					<li>
	    				<img src='$default' alt='Post 6' />
	    			</li>
		
	    	</ul>
	    				
	    				
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
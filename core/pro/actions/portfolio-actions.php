<?php
/**
* Portfolio element actions used by Business Pro.
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
* business Portfolio Section actions
*/
add_action( 'business_portfolio_element', 'business_portfolio_element_content' );
	
function business_portfolio_element_content() {	
	global $options, $post, $themeslug, $root, $wp_query;
	$out = '';
	$tmp_query = $wp_query; 
	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	
	if (is_page()){
		$category = get_post_meta($post->ID, 'portfolio_category' , true);
		$num = get_post_meta($post->ID, 'portfolio_row_number' , true);
		$title_enable = get_post_meta($post->ID, 'portfolio_title_toggle' , true);
		$title = get_post_meta($post->ID, 'portfolio_title' , true);;
	}
	
	else {
		$category = $options->get($themeslug.'_portfolio_category');
		$num = $options->get($themeslug.'_portfolio_number');
		$title_enable = $options->get($themeslug.'_portfolio_title_toggle');
		$title = $options->get($themeslug.'_portfolio_title');
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
	
	switch($number){
		case 'four':
				$columns = 3;
				break;
		case 'three':
				$columns = 4;
				break;
		case 'six':
				$columns = 2;
				break;
	}
	
	?>

<div id="portfolio" class="container">
	<div class="row">
	
	<?php query_posts( array ('post_type' => $themeslug.'_portfolio_images', 'portfolio_categories' => $category ));
			
	if (have_posts()) :
				
	  	$out = "<div id='gallery' class='twelve columns'>$title_output<ul>"; 

	  $i = 1;
		while ( have_posts() ) : 

		the_post(); 

	    	/* Post-specific variables */	
	    	$image = get_post_meta($post->ID, 'portfolio_image' , true);
	    	$title = get_the_title() ;	    	
	    	$custom_portfolio_url_toggle = get_post_meta($post->ID, 'custom_portfolio_url_toggle' , true);
			$custom_portfolio_url = get_post_meta($post->ID, 'custom_portfolio_url' , true);
			
			/* setting variables for custom portfolio url  */
			if( $custom_portfolio_url_toggle == "on" && $custom_portfolio_url != "")
			{
				$link = $custom_portfolio_url;
				$class = "custom_portfolio_url";
			}	
			else
			{
				$link = $image;
				$class = "slide";
			}
			
	     	/* Markup for portfolio */

	    	$out .= "
				<li id='portfolio_wrap' class='$number columns'>
	    			<a href='$link' title='$title' class='$class'><img src='$image'  alt='$title'/>
	    				<div class='portfolio_caption'>$title</div>
	    			</a>
	  	    	</li>
	    			";
						
				if( $i %$columns == 0 )
					{
						$out .= "<div class='clear'></div>";
					}
					
	    	/* End slide markup */	

	      	$i++;
	      	endwhile;
	      	$out .= "</ul></div>";	 
	      	
	      	else:
	      
	      	$out .= "	
	    		<div id='gallery' class='twelve columns'><ul>
	      			<li id='portfolio_wrap' class='four columns'>
	    				<a href='$root/images/pro/portfolio.jpg' title='Image 1' class='slide'><img src='$root/images/pro/portfolio.jpg'  alt='Image 1'/>
	    					<div class='portfolio_caption'>Image 1</div>
	    				</a>
	    			</li>
	    		
	  	    		<li id='portfolio_wrap' class='four columns'>
	    				<a href='$root/images/pro/portfolio.jpg' title='Image 2' class='slide'><img src='$root/images/pro/portfolio.jpg'  alt='Image 2'/>
	    					<div class='portfolio_caption'>Image 2</div>
	    				</a>
	    			</li>
	    		
					<li id='portfolio_wrap' class='four columns'>
	    				<a href='$root/images/pro/portfolio.jpg' title='Image 3' class='slide'><img src='$root/images/pro/portfolio.jpg'  alt='Image 3'/>
	    					<div class='portfolio_caption'>Image 3</div>
	    				</a>
	    			</li>
	    	 	</ul></div>	
	    				
	    			";
     
	endif; 	    
	$wp_query = $tmp_query;    

/* End slide creation */		

	wp_reset_query(); /* Reset post query */ 
	
/* Begin Portfolio javascript */ 
    
    $out .= "
 <script type='text/javascript'>
 	jQuery(document).ready(function ($) {
    $(function() {
       if( $(window).width() > 480 ) {
        $('#gallery a.slide').lightBox({
    			imageLoading:			'$root/images/portfolio/lightbox-ico-loading.gif',		
					imageBtnPrev:			'$root/images/portfolio/lightbox-btn-prev.gif',			
					imageBtnNext:			'$root/images/portfolio/lightbox-btn-next.gif',			
					imageBtnClose:			'$root/images/portfolio/lightbox-btn-close.gif',		
					imageBlank:				'$root/images/portfolio/lightbox-blank.gif'
	 			});
			}
			if( $(window).width() < 480 ) {
				$('#gallery a.slide').click(function(e){
					e.preventDefault();
				});
			}
    });
    });
    </script>";

/* End Portfolio javascript */ 

echo $out;

/* END */ 
?>
	
	</div>
</div>


<?php
}
?>
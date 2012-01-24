<?php
/**
* Carousel section actions used by the CyberChimps Synapse Core Framework Pro Extension
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

add_action( 'synapse_index_carousel_section', 'synapse_carousel_section_content' );
add_action( 'synapse_carousel_section', 'synapse_carousel_section_content' );

function synapse_carousel_section_content() {

/* Call globals. */	

	global $themename, $themeslug, $options, $post, $wp_query;

/* End globals. */	

/* Define variables. */	

    $tmp_query = $wp_query; 
	$root = get_template_directory_uri(); 
	$default = "$root/images/pro/carousel.jpg";
	
	if (is_page()) {
		$customcategory = get_post_meta($post->ID, 'carousel_category' , true);
		$speed = get_post_meta($post->ID, 'carousel_speed' , true);

	}
	if (is_front_page()) {
		$customcategory = $options->get($themeslug.'_carousel_category');
		$speed = $options->get($themeslug.'_carousel_speed');
	}
	
/* End define variables. */	 
?>

<div class="row">
	<div id="carousel" class="es-carousel-wrapper">
		<div class="es-carousel"><?php 

/* Query posts  */

query_posts( array ('post_type' => $themeslug.'_featured_posts', 'showposts' => 20, true, 'carousel_categories' => $customcategory ));

/* End query posts based on theme/meta options */
    	
/* Establish post counter */  
  	
	if (have_posts()) :
	    $out = "
	    <ul>
	    
	    "; 
	    $i = 0;

		    $no = '20';


/* End post counter */	    	

/* Initialize slide creation */	

	while (have_posts() && $i<$no) : 

		the_post(); 

	    	/* Post-specific variables */	

	    	$image 		= get_post_meta($post->ID, 'post_image' , true);  
	    	$title 		= get_the_title();  
	    	$link 		= get_post_meta($post->ID, 'post_url' , true);
	

			/* End variables */	

	     	/* Markup for carousel */

	    	$out .= "
	    	
				<li>
	    			<a href='$link'>	
	    				<img src='$image' alt='$title'/>
	    			</a>
	    		</li>
	    	
	    	";

	    	/* End slide markup */	

	      	$i++;
	      	endwhile;
	      	$out .= "</ul>";	 
	      	
	      	else:
	      
	      	$out .= "	<div class='carousel'>
	    <ul>
	      			<li>
	      				
	    				<img src='$default' alt='Post 1' class='captify'/>
	    				
	    			</li>
					<li>
	    				<img src='$default' alt='Post 2' class='captify'/>
	    			</li>
					<li>
	    				<img src='$default' alt='Post 3' class='captify'/>
	    			</li>
					<li>
	    				<img src='$default' alt='Post 4' class='captify'/>
	    			</li>
					<li>
	    				<img src='$default' alt='Post 5' class='captify'/>
	    			</li>
	    			
	    			<li>
	    				<img src='$default' alt='Post 6' class='captify'/>
	    			</li>

	      				
	    			</ul>
	    				</div>		
	    				
	    			";
     
	endif; 	    
	$wp_query = $tmp_query;    

/* End slide creation */		

	    wp_reset_query(); /* Reset post query */ 

/* Begin Carousel javascript */ 
    
    $out .= <<<OUT
	<script type="text/javascript">
			
			$('#carousel').elastislide({
				imageW 		: 140,
				speed 		: $speed,
				margin		: 8,
				minItems 	: 5
			});
			
		</script>
OUT;

/* End Carousel javascript */ 

echo $out;

/* END */ 
?>

		</div>
	</div>
</div> <?php

}

/**
* End
*/

?>
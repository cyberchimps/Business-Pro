<?php 

/*
	Template Name: Portfolio
	Establishes the Business Pro portfolio page tempate.
	Version: 3.0
	Copyright (C) 2011 CyberChimps

*/

/* Header call. */

	get_header(); 
	
/* End header. */	

/* Define global variables. */
	global $options, $post, $themeslug, $root;
	$tmp_query = $wp_query; 
	$image = get_post_meta($post->ID, 'portfolio_image' , true);

	
/* End define global variables. */
?>
<div id="portfolio" class="container">
	<div class="row">
	
	<?php query_posts( array ('post_type' => $themeslug.'_portfolio', 'showposts' => 20, true ));
			
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
	    	
				<li id='portfolio_wrap' class='four columns'>
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
	      		<li id='portfolio_wrap' class='four columns'>
	    			<a href='$root/images/portfolio.jpg' title='Image 1'><img src='$root/images/portfolio.jpg'  alt='Image 1'/>
	    				<div class='portfolio_caption'>Image 1</div>
	    			</a>
	    		</li>
	    		
	  	    	<li id='portfolio_wrap' class='four columns'>
	    			<a href='$root/images/portfolio.jpg' title='Image 2'><img src='$root/images/portfolio.jpg'  alt='Image 2'/>
	    				<div class='portfolio_caption'>Image 3</div>
	    			</a>
	    		</li>
	    		
				<li id='portfolio_wrap' class='four columns'>
	    			<a href='$root/images/portfolio.jpg' title='Image 3'><img src='$root/images/portfolio.jpg'  alt='Image 3'/>
	    				<div class='portfolio_caption'>Image 3</div>
	    			</a>
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


<?php get_footer(); ?>
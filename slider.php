<?php 

/*
	Section: Slider
	Authors: Tyler Cunningham 
	Description: Creates Business Pro slider.
	Version: 1.1.0	
	Portions of this code written by Ivan Lazarevic  (email : devet.sest@gmail.com) Copyright 2010    
*/

    	$tmp_query = $wp_query; 
		$options = get_option('business') ; 
		
		$root = get_template_directory_uri();
		
		if ($options['bu_slider_type'] == '')
		
		$usecustomslides = 'posts';
		
		else
		
		$usecustomslides		= $options['bu_slider_type'];
		
		if ($options['bu_slider_placement'] != 'feature'  && $options['bu_slider_placement'] != '') {
		$default = 'businessprosmall';
		}
		
		else {
		$default = 'businesspro';
		}
		
		if ($usecustomslides == 'custom')
    	query_posts( array ('post_type' => 'bu_custom_slides', 'showposts' => 20 ) );
    	
    	else
    	query_posts('category_name='.$options['bu_slider_category'].'&showposts=50');
	       
    	
	    if (have_posts()) :
	    	$out = "<div id='coin-slider'>"; 
	    	$i = 0;
	    	
	    	if ($options['bu_slider_posts_number'] == '')
	    	$no = '5';
	    	elseif ($usecustomslides == 'custom')
	    	$no = '20';
	    	else $no = $options['bu_slider_posts_number'];
	    	

	    	while (have_posts() && $i<$no) : 
	    	
	    		the_post(); 
	    		
	    		$customimage 		= get_post_meta($post->ID, 'slider_image' , true);
	    		$customtext 		=  $post->post_content;
	    		$customlink 		= get_post_meta($post->ID, 'slider_url' , true);
	    		$permalink 			= get_permalink();
	   			$text 				= get_post_meta($post->ID, 'slider_text' , true);
	   			$image  			= get_post_meta($post->ID, 'slider_post_image' , true);
	   			$title				= get_the_title(); 
	   			$showtitlebar       = get_post_meta($post->ID, 'slider_hidetitle' , true);
	   			
	    		
	    		
	    	if ($customimage != '' && $usecustomslides != 'posts' && $showtitlebar == '') { 
	    			$out .= "<a href='$customlink'>	
	    						<img src='$customimage' alt='BusinessPro' />
	    						
	    					</a>
	    			";
	       } 
	       
	       		elseif 
	    			
	    			($customimage != '' && $usecustomslides != 'posts'  ){ 
	    			$out .= "<a href='$customlink'>	
	    						<img src='$customimage' alt='BusinessPro' />
	    						<span>
	    							<strong>$title</strong><br />
	    							$customtext
	    						</span>
	    					</a>
	    			";
	    			
	    			
	       } 
	       		elseif ($customimage == '' && $usecustomslides != 'posts'&& $showtitlebar == '' ){ 
	       		$out .= "<a href='$customlink'>	
	    						<img src='$root/images/$default.jpg' alt='BusinessPro' />
	    					
	    					</a>
	    			";
	       } 
	       
	       	elseif ($customimage == '' && $usecustomslides != 'posts' ) {
	       		$out .= "<a href='$customlink'>	
	    						<img src='$root/images/$default.jpg' alt='BusinessPro' />
	    						<span>
	    							<strong>$title</strong><br />
	    							$customtext
	    						</span>
	    					</a>
	    			";
	       } 
	       
	       elseif ($image != '' && $usecustomslides == 'posts' && $showtitlebar == ''){
	     
	    		$out .= "<a href='$permalink'>	
	    						<img src='$image' alt='BusinessPro' />
	    						
	    					</a>
	    			";
	       } 
	       
	       elseif ($image != '' && $usecustomslides == 'posts'){
	     
	    		$out .= "<a href='$permalink'>	
	    						<img src='$image' alt='BusinessPro'/>
	    						<span>
	    							<strong>$title</strong><br />
	    							$text
	    						</span>
	    					</a>
	    			";
	       } 
	       
	         elseif ($image == '' && $usecustomslides == 'posts' && $showtitlebar == ''){
	     
	    		$out .= "<a href='$permalink'>	
	    						<img src='$root/images/$default.jpg' alt='iFeaturePro' />
	    						
	    					</a>
	    			";
	       } 
	       
	         else {
	     
	    		$out .= "<a href='$permalink'>	
	    						<img src='$root/images/$default.jpg' />
	    						<span>
	    							<strong>$title</strong><br />
	    							$text
	    						</span>
	    					</a>
	    			";
	       } 
	    	 
	      	$i++;
	      	endwhile;
	      	$out .= "</div>";
	    endif; 
	    
	    $wp_query = $tmp_query;

	    if ($options['bu_slider_animation'] == '')
	    	$csEffect = 'random';
	    else $csEffect = $options['bu_slider_animation'];
	    
	    $csSpw		= get_option('cs-spw') ? get_option('cs-spw') : 7;
	    $csSph		= get_option('cs-sph') ? get_option('cs-sph') : 5;	    
	    
	    if ($options['bu_slider_height'] == '')
	    	$csHeight = '330';
	    else $csHeight = $options['bu_slider_height'];
	    
	    if ($options['bu_slider_delay'] == '')
	    	$csDelay = '3500';
	    else $csDelay = $options['bu_slider_delay'];
	    
	     if ($options['bu_slider_placement'] == 'blog')
	  			$csWidth = '640';
	  	
	  	else $csWidth = '990';
	  	
	  if ($options['bu_slider_navigation'] == '1')
	    	$csNavigation = 'false';
	    else $csNavigation = 'true';
	    ?>
	    <style type="text/css" media="screen">
		#coin-slider-coin-slider { width: <?php echo $csWidth ?>px; margin: auto;}
</style>
<?php	    
	     wp_reset_query();
    $out .= <<<OUT
<script type="text/javascript">
var $ = jQuery.noConflict();
	$("#coin-slider").coinslider({
		width  		: $csWidth,
		height 		: $csHeight,
		spw			: $csSpw,
		sph			: $csSph,
		delay		: $csDelay,
		navigation	: $csNavigation,
		effect		: '$csEffect'
	
	}); 

</script>

OUT;

echo $out;
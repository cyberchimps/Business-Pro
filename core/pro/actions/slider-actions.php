<?php
/**
* Slider section actions used by the CyberChimps Synapse Core Framework Pro Extension
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
* Extend slider actions
*/

add_action ('synapse_blog_slider', 'synapse_slider_content' );
add_action ('synapse_page_slider', 'synapse_slider_content' );

/**
* Extend slider functions
*/
function synapse_slider_content() {

/* Call globals. */	

	global $themename, $themeslug, $options, $wp_query, $post;

/* End globals. */

/* Define variables. */	

    $tmp_query = $wp_query; 
	$root = get_template_directory_uri(); 
	
	if (is_page()) {
		$customcategory = get_post_meta($post->ID, 'slider_category' , true);
		$sliderheight = get_post_meta($post->ID, 'slider_height' , true);
		$sliderdelay = get_post_meta($post->ID, 'slider_delay' , true);
		$slideranimation = get_post_meta($post->ID, 'page_slider_animation' , true);
		$navigationstyle = get_post_meta($post->ID, 'page_slider_navigation_style' , true);
		$hidenav = get_post_meta($post->ID, 'hide_arrows' , true);
		$wordenable = get_post_meta($post->ID, 'enable_wordthumb' , true);	
	}
	
	if (is_front_page()) {
		$customcategory = $options->get($themeslug.'_front_customslider_category');
		$sliderheight = $options->get($themeslug.'_front_slider_height');
		$hidenav = $options->get($themeslug.'_front_hide_slider_arrows');
		$wordenable = $options->get($themeslug.'_front_enable_wordthumb');
		$slideranimation = $options->get($themeslug.'_front_slider_animation');
		$sliderdelay = $options->get($themeslug.'_front_slider_delay');
		$navigationstyle = $options->get($themeslug.'_front_slider_nav');
	}

	else {
		$customcategory = $options->get($themeslug.'_customslider_category');
		$captionstyle = $options->get($themeslug.'_caption_style');
		$sliderheight = $options->get($themeslug.'_slider_height');
		$hidenav = $options->get($themeslug.'_hide_slider_arrows');
		$wordenable = $options->get($themeslug.'_enable_wordthumb');
		$slideranimation = $options->get($themeslug.'_slider_animation');
		$sliderdelay = $options->get($themeslug.'_slider_delay');
		$navigationstyle = $options->get($themeslug.'_slider_nav');
	}

	
/* Row div variable. */	

	$openrow = '<div id="sliderbg"><div class="row">';
	$closerow = '</div></div>';


?>	

<?php echo $openrow; 
	
/* End row riv variables. */	
	
/* End define variables. */	

/* Define animation styles. */	

	if ($slideranimation == 'key2' OR $slideranimation == '1') {
		$animation = 'fade';
	}
	elseif ($slideranimation == 'key3' OR $slideranimation == '2') {
		$animation = 'horizontal-slide' ;
	}
	elseif ($slideranimation == 'key4' OR $slideranimation == '3') {
		$animation = 'vertical-slide' ;
	}
	else {
		$animation = 'horizontal-push';
	}

/* End animation styles. */		

	$wordthumb = "h=240&w=420";
	$wordthumb2 = "h=330&w=980";

/* End define wordthumb. */

/* Define slider width variable */ 

	$csWidth = '980';
	$imgwidth = '420';
	$defaultimage = "$root/images/pro/slider-980.jpg";

/* End slider width variable */ 

	query_posts( array ('post_type' => $themeslug.'_custom_slides', 'showposts' => 20,  'slide_categories' => $customcategory  ) );
 
/* End query posts based on theme/meta options */
    	
/* Establish post counter */  
  	
	if (have_posts()) :
	    $out = "<div id='orbitDemo'>"; 
	    $i = 0;
	if ($usecustomslides == 'posts' OR $postnumber == '' && $type != '0') {
	    $no = '5';    	
	}   	
	elseif ($usecustomslides == 'custom' OR $type == '0') {
	    $no = '20';
	}
	else {
		$no = $postnumber;
	}
	
/* End post counter */	    	

/* Initialize slide creation */	

	while (have_posts() && $i<$no) : 

		the_post(); 

	    	/* Post-specific variables */	

	    	$customimage 		= get_post_meta($post->ID, 'slider_image' , true);  /* Gets slide custom image from page/post meta option */
	    	$slidertype			= get_post_meta($post->ID, 'slider_type' , true);  /* Gets slide custom image from page/post meta option */
	    	$customtext 		= get_post_meta($post->ID, 'slider_caption' , true);  /* Gets slide custom image from page/post meta option */
	    	$media		 		= get_post_meta($post->ID, 'slider_media' , true);  /* Gets slide custom image from page/post meta option */
	    	$align				= get_post_meta($post->ID, 'slider_text_align' , true);  /* Gets slide custom image from page/post meta option */
	    	$customlink 		= get_post_meta($post->ID, 'slider_url' , true); /* Gets link from custom slide meta option */
	    	$permalink 			= get_permalink(); /* Gets post URL for blog post slides */
	   		$blogtext 			= get_post_meta($post->ID, 'slider_text' , true); /* Gets slide caption from post meta option */  		
	   		$title				= get_the_title() ; /* Gets slide title from post/custom slide title */
	   		$hidetitlebar       = get_post_meta($post->ID, 'slider_hidetitle' , true); /* Gets page/post meta option for disabling slide title bar */
	   		$customsized        = "$root/core/pro/library/wt/wordthumb.php?src=$customimage&a=c&$wordthumb"; /* Gets custom image from page/post meta option, applies wordthumb code  */
	   		$fullsized        = "$root/core/pro/library/wt/wordthumb.php?src=$customimage&a=c&$wordthumb2"; /* Gets custom image from page/post meta option, applies wordthumb code  */
	   		$customthumb 		= get_post_meta($post->ID, 'slider_custom_thumb' , true); /* Gets custom thumbnail from page/post meta option */

			/* End variables */	

			/* Controls slide title based on page meta setting */	

			if ($hidetitlebar == 'on' AND $captionstyle != 'key4') {
	   			$caption = "data-caption='#htmlCaption$i'";
	   		}
	   		else {
	   			$caption = '';
	   		}
	   		
	   		/* Slider Text Align */	
	   		
	   		if ($align == '0' OR $align == '') {
	   			$textalign = 'left';
	   			$imagealign = 'right';
	   		}
	   		
	   		elseif ($align == '1') {
	   			$textalign = 'right';
	   			$imagealign = 'left';
	   		}

	    	/* End slide title */

	    	/* Controls slide link */

	    	if ( $type == 'custom' OR $type == '0') {
	    		$link = get_post_meta($post->ID, 'slider_url' , true);
	    	}
	    	else {
	    		$link = get_permalink();
	    	}

	    	/* End slide link */
	    	
	    	/* Establish slider text */
	    	
	    	if ($type == 'custom' OR $type == '0') {
	    		$text = $customtext;
	    	}
	    	else {
	    		$text = $blogtext;
	    	}
	    	
	    	/* End slider text */	

	    	/* Controls slide image and thumbnails */

	    	if ($customimage != '' && $customthumb == '' && $wordenable == '1' OR $customimage != '' && $customthumb == '' && $wordenable == 'on'){ // Custom image, no custom thumb, WordThumb enabled. 
	    		$image = $customsized;
	    		$thumbnail = "$root/core/pro/library/wt/wordthumb.php?src=$customimage&a=c&h=30&w=50";
	    	}
	    	elseif ($customimage != '' && $customthumb != '' && $wordenable == '1' OR $customimage != '' && $customthumb != '' && $wordenable == 'on'){ // Custom image, custom thumb, WordThumb enabled. 
	    		$image = $customimage;
	    		$thumbnail = "$root/core/pro/library/wt/wordthumb.php?src=$customthumb&a=c&h=30&w=50";
	    	}
	    	elseif ($customimage != '' && $customthumb != '' && $wordenable != '1' OR $customimage != '' && $customthumb != '' && $wordenable != 'on'){ // Custom image, custom thumb, WordThumb disabled. 
	    		$image = $customimage;
	    		$thumbnail = $customthumb;
	    	}
	    	elseif ($customimage != '' && $customthumb == '' && $wordenable != '1' OR $customimage != '' && $customthumb == '' && $wordenable != 'on'){ // Custom image, no custom thumb, WordThumb disabled. 
	    		$image = $customimage;
	    		$thumbnail = "$root/images/pro/sliderthumb.jpg";
	    	}
	    	elseif ($customimage != '' && $customthumb == '' && $wordenable == '1' OR $customimage != '' && $customthumb == '' && $wordenable == 'on'){ // Custom image, no custom thumb, WordThumb enabled. 
	    		$image = $customsized;
	    		$thumbnail = "$root/images/pro/sliderthumb.jpg";
	    	}  	
	    	elseif ($customimage == '' && $wordenable != '1' OR $customimage == '' && $wordenable != 'on'){ // No custom image, no custom thumb, full-width slider, WordThumb enabled. 

	    		$image = $defaultimage;
	    		$thumbnail = "$root/images/pro/sliderthumb.jpg";
	    	}
	    	
	    	elseif ($customimage == '' && $wordenable == '1' OR $customimage == '' && $wordenable == 'on'){ // No custom image, no custom thumb, full-width slider, WordThumb enabled. 

	    		$image = $defaultimage;
	    		$thumbnail = "$root/images/pro/sliderthumb.jpg";
	    	}
	    	
	    	if ($media == '') {
	    		$mediacontent = "<img src='$image' width='$imgwidth' height='240' alt='Slider' />";

	    	}
	    	
	    	else {
	    		$mediacontent = $media;
	    	}

			$textimg = "
	  					<div class='slider_content'>
	  						<div id='text_container' class='six columns' style='float: $textalign; '>
	  							<div class='content_title' style='padding-left: 15px; padding-right: 15px;'>$title</div><br />
	  							<div class='content_text' style='padding-left: 15px; padding-right: 15px;'>$customtext</div>
	  						</div>
	  						<div id='image_container' class='six columns' style='padding-top:40px; float: $imagealign;  '>
	  							<div class='media_content'>$mediacontent</div> 						
	  						</div>
	    				</div>
	    			   
	    			   ";
	    			
	    	$fullimg = "
	  					<div class='slider_content'>
	  							 			
	  							<img src='$fullsized' alt='Slider' />
	  						
	    				</div>
	    				";
	    		
	    	$fulltext = "
	  					<div class='slider_content' style='height: 330px;'>
	  							 			
	  						<div id='text_container' class='twelve columns'>
	  							<span class='content_title'>$title</span><br />
	  							<span class='content_text'>$customtext</span>
	  						</div>
	    				</div>
	    				";
	    		
	    		
	    	if ($slidertype == '0' or $slidertype == '') {
	    		$type = $textimg;
	    	}
	    	
	    	elseif ($slidertype == '1') {
	    		$type = $fullimg;
	    	}
	    	
	    	elseif ($slidertype == '2') {
	    		$type = $fulltext;
	    	}


		    /* End image/thumb */	

	     	/* Markup for slides */

	    	
	    $out .= $type;
	    
	    	/* End slide markup */
	      	$i++;
	      	endwhile;
	      	
	      	$out .= "</div>";
	      	
	      	else:
	      
	      	$out .= "	<br /><br /><br /><br />
	    				<font size='6'>Oops! You have not created a Custom Slide.</font> <br /><br />

To learn how to create a custom slide please <a href='http://cyberchimps.com/question/using-the-ifeature-slider/' target='_blank'><font color='blue'>read the documentation</font></a>.<br /><br />

To create a Custom Slide please go to the Custom Slides tab in WP-Admin. Once you have created your first Custom Slide it will display here instead of this warning.<br /><br />
		
	    			";
	endif; 	    
	$wp_query = $tmp_query;    

/* End slide creation */	

/* Define slider delay variable */ 
    
	if ($sliderdelay == "") {
	    $delay = '3500';
	}    

	else {
		$delay = $sliderdelay;
	}

/* End slider delay variable */ 	

/* Define slider navigation variable */ 
  	
	if ($navigationstyle == 'key1' OR $navigationstyle == 'key2' OR $navigationstyle == '0'  OR $navigationstyle == '1' OR $navigationstyle == '') {
	    $dots = 'true';
	}
	else {
		$dots = 'false';
	}
	if ($navigationstyle == 'key2' OR $navigationstyle == '1') {
	    $thumbs = 'true'; ?>
	    
	    <style type="text/css">
		.orbit-bullets {bottom: -50px !important;}
		</style> <?php
	}
	else {
		$thumbs = 'false';
	}

/* End slider navigation variable */ 

?>
	
<?php if ($navigationstyle == 'key3' OR $navigationstyle == '2') :?>
	<style type="text/css" media="screen">
		.slider_nav {display: none;}
		#orbitDemo {margin-bottom: 0px;}
	</style>
<?php endif;?>

<?php
	
/* End slider navigation style */ 
	
	wp_reset_query(); /* Reset post query */ 

/* Begin Orbit javascript */ 
    
    $out .= <<<OUT
<script type="text/javascript">
	 jQuery(document).ready(function ($) {
   $(window).load(function() {
    $('#orbitDemo').orbit({
         animation: '$animation',
         advanceSpeed: $delay,
         captionAnimation: 'slideOpen',		// fade, slideOpen, none
         captionAnimationSpeed: 800,  
         bullets: $dots,
         bulletThumbs: $thumbs
     });
     });
     });
</script>
OUT;

/* End NivoSlider javascript */ 

echo $out; ?>

<?php echo $closerow; 

}

/**
* End
*/

?>
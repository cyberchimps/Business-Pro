<?php
/**
* Custom actions used by the Business Pro WordPress Theme
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimpscom/ CyberChimps LLC}
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
* Business Actions
*/

add_action( 'business_header_content', 'business_header_standard_content');
add_action( 'business_header_contact_area', 'business_header_contact_area_content' );
add_action( 'business_sitename_register', 'business_sitename_register_content');
add_action( 'business_sitename_contact', 'business_sitename_contact_content');
add_action( 'business_description_icons', 'business_description_icons_content');
add_action( 'business_logo_menu', 'business_logo_menu_content');
add_action( 'business_logo_description', 'business_logo_description_content');
add_action( 'business_banner', 'business_banner_content');

remove_action( 'synapse_head_tag', 'synapse_link_rel' );
add_action( 'synapse_head_tag', 'business_link_rel' );

remove_action( 'synapse_box_section', 'synapse_box_section_content' );
add_action( 'synapse_box_section', 'business_box_section_content' );

/**
* Sets up the header contact area
*
* @since 1.0
*/
function business_header_contact_area_content() { 
	global $themeslug, $options; 
	$contactdefault = apply_filters( 'synapse_header_contact_default_text', 'Enter Contact Information Here' ); 
	
	if ($options->get($themeslug.'_header_contact') == '' ) {
		echo "<div id='header_contact'>";
			printf( __( $contactdefault, 'core' )); 
		echo "</div>";
	}
	if ($options->get($themeslug.'_header_contact') != 'hide' ) {
		echo "<div id='header_contact1'>";
		echo stripslashes ($options->get($themeslug.'_header_contact')); 
		echo "</div>";
	}	
	if ($options->get($themeslug.'_header_contact') == 'hide' ) {
		echo "<div style ='height: 10%;'>&nbsp;</div> ";
	}
}

/**
* Sets up the Box Section wigetized area
*
* @since 3.1
*/
function business_box_section_content() { 
	global $post; //call globals
	
	$enableboxes = get_post_meta($post->ID, 'enable_box_section' , true);
	$root = get_template_directory_uri(); ?>

<div class="row" style="margin-top:20px;margin-bottom:20px;border-bottom: 1px dotted #eee;">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 1") ) : ?>
		<div id="box1" class="three columns">
			<h2 class="box-widget-title">Responsive Pro Slider</h2>	
			<p class="boxtext"><img src="<?php echo $root ; ?>/images/icons/iphone.png" height="24" alt="slider" class="alignleft" />"Again, you can't connect the dots looking forward; you can only connect them looking backwards. So you have to trust that the dots will somehow connect in your future." -Steve Jobs</p>
		</div><!--end box1-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 2") ) : ?>
		<div id="box2" class="three columns">
			<h2 class="box-widget-title">Responsive Design</h2>
			<p class="boxtext"><img src="<?php echo $root ; ?>/images/icons/home.png" height="24" alt="slider" class="alignleft" />"Focus and simplicity. Simple can be harder than complex: You have to work hard to get your thinking clean to make it simple. But it's worth it in the end, because once you get there, you can move mountains." -Steve Jobs</p>
		</div><!--end box2-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 3") ) : ?>
		<div id="box3" class="three columns">
			<h2 class="box-widget-title">Excellent Support</h2>
			<p class="boxtext"><img src="<?php echo $root ; ?>/images/icons/cogs.png" height="24" alt="slider" class="alignleft" />"Again, you can't connect the dots looking forward; you can only connect them looking backwards. So you have to trust that the dots will somehow connect in your future." -Steve Jobs</p>
		</div><!--end box3-->
		<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box 4") ) : ?>
		<div id="box4" class="three columns">
			<h2 class="box-widget-title">Excellent Support</h2>
			<p class="boxtext"><img src="<?php echo $root ; ?>/images/icons/search.png" height="24" alt="slider" class="alignleft" />"Again, you can't connect the dots looking forward; you can only connect them looking backwards. So you have to trust that the dots will somehow connect in your future." -Steve Jobs</p>
		</div><!--end box3-->
		<?php endif; ?>
</div>
<?php
}


/**
* Sets the header link rel attributes
*
* @since 3.0.2
*/
function business_link_rel() {
	global $themeslug, $options; //Call global variables
	$favicon = $options->get($themeslug.'_favicon'); //Calls the favicon URL from the theme options 
	
	if ($options->get($themeslug.'_font') == "" AND $options->get($themeslug.'_custom_font') == "") {
		$font = apply_filters( 'synapse_default_font', 'Arial' );
	}		
	elseif ($options->get($themeslug.'_custom_font') != "" && $options->get($themeslug.'_font') == 'custom') {
		$font = $options->get($themeslug.'_custom_font');	
	}	
	else {
		$font = $options->get($themeslug.'_font'); 
	} 
	if ($options->get($themeslug.'_color_scheme') == '') {
		$color = 'blue';
	}
	else {
		$color = $options->get($themeslug.'_color_scheme');
	}?>
	
<link rel="shortcut icon" href="<?php echo stripslashes($favicon['url']); ?>" type="image/x-icon" />

<?php if ($options->get($themeslug.'_responsive_design') == '1') : ?>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/core/css/foundation.css" type="text/css" />
<?php endif; ?>
<?php if ($options->get($themeslug.'_responsive_design') == '0') : ?>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/core/css/foundation-static.css" type="text/css" />
<?php endif; ?>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/core/css/app.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/core/css/ie.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/shortcode.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/color/<?php echo $color; ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/elements.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/style.css" type="text/css" />

<?php if (is_child_theme()) :  //add support for child themes?>
	<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory') ; ?>/style.css" type="text/css" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link href='http://fonts.googleapis.com/css?family=<?php echo $font ; ?>' rel='stylesheet' type='text/css' /> <?php
}

/**
* Sitename/Register
*
* @since 3.0
*/
function business_sitename_register_content() {
global $current_user;
?>

	<div class="container">
		<div class="row">
		
			<div class="seven columns">
				
				<!-- Begin @Core header sitename hook -->
					<?php synapse_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
				
			</div>	
			
			<div id="register" class="five columns">
			
			<?php if(!is_user_logged_in()) :?>

		<li><?php wp_loginout(); ?></li> <?php wp_meta(); ?><li> |<?php wp_register(); ?>  </li>

			<?php else :?>

			Welcome back <strong><?php global $current_user; get_currentuserinfo(); echo ($current_user->user_login); ?></strong> | <?php wp_loginout(); ?>

		<?php endif;?>
				
			</div>	
		</div><!--end row-->
	</div>

<?php
}

/**
* Sitename/Contact
*
* @since 3.0
*/
function business_sitename_contact_content() {
?>
	<div class="container">
		<div class="row">
		
			<div class="seven columns">
				
				<!-- Begin @Core header sitename hook -->
					<?php synapse_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
				
			</div>	
			
			<div class="five columns">
			
			<!-- Begin @Core header contact area hook -->
			<?php business_header_contact_area(); ?>
		<!-- End @Core header contact area hook -->
						
			</div>	
		</div><!--end row-->
	</div>
	
<?php
}

/**
* Full-Width Logo
*
* @since 3.0
*/
function business_banner_content() {
global $themeslug, $options, $root; //Call global variables
$banner = $options->get($themeslug.'_banner'); //Calls the logo URL from the theme options
$default = "$root/images/pro/banner.jpg";

?>
	<div class="container">
		<div class="row">
		
			<div class="twelve columns">
			<div id="banner">
			
			<?php if ($banner != ""):?>
				<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes($banner['url']); ?>" alt="logo"></a>		
			<?php endif; ?>
			
			<?php if ($banner == ""):?>
				<a href="<?php echo home_url(); ?>/"><img src="<?php echo $default; ?>" alt="logo"></a>		
			<?php endif; ?>
			
			</div>		
			</div>	
		</div><!--end row-->
	</div>	

<?php
}

/**
* Logo/Description
*
* @since 3.0
*/
function business_logo_description_content() {
?>
	<div class="container">
		<div class="row">
		
			<div class="seven columns">
				
			<!-- Begin @Core header sitename hook -->
					<?php synapse_header_sitename(); ?> 
			<!-- End @Core header sitename hook -->
			
				
			</div>	
			
			<div class="five columns" style="text-align: right;">
			
			<!-- Begin @Core header description hook -->
				<?php synapse_header_site_description(); ?> 
			<!-- End @Core header description hook -->
						
			</div>	
		</div><!--end row-->
	</div>	

<?php
}

/**
* Description/Icons
*
* @since 3.0
*/
function business_description_icons_content() {
?>
<div id="subheader">

	<div class="container">
		<div class="row">
		
			<div class="five columns">
			<!-- Begin @Core header description hook -->
				<?php synapse_header_site_description(); ?> 
			<!-- End @Core header description hook -->		
			</div>
			
			<div class="seven columns">
			<!-- Begin @Core header social icon hook -->
				<?php synapse_header_social_icons(); ?> 
			<!-- End @Core header contact social icon hook -->			
			</div>	
		</div><!--end row-->
	</div>	
</div>

<?php
}

/**
* Description/Icons
*
* @since 3.0
*/
function business_logo_menu_content() {
?>

<div id="headernu">
	<div class="container">
		<div class="row">	
			
			<div class="five columns"">
				
				<!-- Begin @Core header sitename hook -->
					<?php synapse_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
			</div>	
			
			<div class="seven columns">
			<div id="halfnav">
			<?php wp_nav_menu( array(
			'items_wrap'      => '<ul id="nav_menu">%3$s</ul>',
		    'theme_location' => 'sub-menu' // Setting up the location for the main-menu, Main Navigation.
			    )
			);
	    	?>
			</div>					
			</div>	
		
		</div><!--end row-->
	</div>
</div>
<?php
}

/**
* Header content standard
*
* @since 3.0
*/
function business_header_standard_content() {
?>
	<div class="container">
		<div class="row">
		
			<div class="seven columns">
				
				<!-- Begin @Core header sitename hook -->
					<?php synapse_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
				
			</div>	
			
			<div id ="register" class="five columns">
				
			<!-- Begin @Core header social icon hook -->
				<?php synapse_header_social_icons(); ?> 
			<!-- End @Core header contact social icon hook -->	
				
			</div>	
		</div><!--end row-->
	</div>

<?php
}

?>
<?php
/**
* Custom actions used by the iFeature Pro WordPress Theme
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
* @package iFeature Pro
* @since 3.0
*/

/**
* iFeature Actions
*/

add_action( 'ifeature_header_contact_area', 'ifeature_header_contact_area_content' );

remove_action( 'synapse_head_tag', 'synapse_link_rel' );
add_action( 'synapse_head_tag', 'ifeature_link_rel' );

remove_action( 'synapse_box_section', 'synapse_box_section_content' );
add_action( 'synapse_box_section', 'ifeature_box_section_content' );

/**
* Sets up the header contact area
*
* @since 1.0
*/
function ifeature_header_contact_area_content() { 
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
function ifeature_box_section_content() { 
	global $post; //call globals
	
	$enableboxes = get_post_meta($post->ID, 'enable_box_section' , true);
	$root = get_template_directory_uri(); ?>
	
<div class="row">
	<div id="box_container" class="twelve columns"> <!--box container-->
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Left") ) : ?>
			<div id="box1" class="four columns">
				<h2 class="box-widget-title">iFeature Pro Slider</h2>
					<img src="<?php echo $root ; ?>/images/icons/slidericon.png" height="100" alt="slider" class="aligncenter" />
					<p>The iFeature Pro Slider includes auto-image resizing, new transitions, thumbnails, custom categories, improved captions, and the ability to have a slider on every page.</p>
			</div><!--end box1-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Middle") ) : ?>
			<div id="box2" class="four columns">
				<h2 class="box-widget-title">New Design</h2>
					<img src="<?php echo $root ; ?>/images/icons/blueprint.png" height="100" alt="blueprint" class="aligncenter" />
					<p>With <a href="http://cybersynapse.com/ifeaturepro/">iFeature Pro</a> we’ve done the design work for you, all you need to do is pick a color scheme, select your options, and add your content.</p>
			</div><!--end box2-->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Right") ) : ?>
			<div id="box3" class="four columns">
				<h2 class="box-widget-title">Excellent Support</h2>
				<img src="<?php echo $root ; ?>/images/icons/docs.png" height="100" alt="docs" class="aligncenter" />
				<p>We designed iFeature Pro to be as easy to design with as possible, if you do run into trouble we provide a <a href="http://cybersynapse.com/forum">support forum</a>, and <a href="http://www.cybersynapse.com/ifeaturepro/docs/">precise documentation</a>.</p>
			</div><!--end box3-->
		<?php endif; ?>
</div>
	</div><!--end box_container--><?php
}


/**
* Sets the header link rel attributes
*
* @since 3.0.2
*/
function ifeature_link_rel() {
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
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/color/<?php echo $color; ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/elements.css" type="text/css" />

<?php if (is_child_theme()) :  //add support for child themes?>
	<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory') ; ?>/style.css" type="text/css" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link href='http://fonts.googleapis.com/css?family=<?php echo $font ; ?>' rel='stylesheet' type='text/css' /> <?php
}

/**
* Header content standard
*
* @since 3.0
*/
function ifeature_header_standard_content() {
?>
<div class="container" style="">
		<div class="row">
		
			<div class="eight columns">
				
				<!-- Begin @Core header sitename hook -->
					<?php synapse_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
				
			</div>	
			
			<div class="four columns">
				
			<!-- Begin @Core header social icon hook -->
				<?php synapse_header_social_icons(); ?> 
			<!-- End @Core header contact social icon hook -->	
				
			</div>	
		</div><!--end row-->
		
	</div><!--end container-->


<?php
}

/**
* Header content extra
*
* @since 3.0
*/
function ifeature_header_extra_content() {
global $options, $themeslug;?>
	
	<div class="container_12">
		
		<div class="grid_6">
				
			<!-- Begin @Core header sitename hook -->
				<?php synapse_header_sitename(); ?> 
			<!-- End @Core header sitename hook -->
				
		</div>	
			
				<div id="header_contact" class="grid_6">
				&nbsp;
			<?php if ($options->get($themeslug.'_enable_header_contact') == '1'	): ?>

		<!-- Begin @Core header contact area hook -->
			<?php ifeature_header_contact_area(); ?>
		<!-- End @Core header contact area hook -->
					<?php endif ; ?>
		</div>	
		
	</div>
		
	<div class='clear'>&nbsp;</div>
		
	<div class="container" id="head2">
				
		<div class="grid_6">
		&nbsp;
			<?php if ($options->get($themeslug.'_show_description') == '1'	): ?>
			<!-- Begin @Core header description hook -->
				<?php synapse_header_site_description(); ?> 
			<!-- End @Core header description hook -->
			<?php endif; ?>
		</div>
			
		<div class="grid_6">
			
			<!-- Begin @Core header social icon hook -->
				<?php synapse_header_social_icons(); ?> 
			<!-- End @Core header contact social icon hook -->	
				
		</div>
			
	</div>
		
	<div class='clear'>&nbsp;</div>

<?php
}

/**
* Define header contact based on theme options
*
* @since 3.0
*/
function ifeature_header_content_init() {
	global $options, $themeslug;
	
	if ($options->get($themeslug.'_enable_header_contact') != '1' && $options->get($themeslug.'_show_description') != '1') {
	
			add_action( 'ifeature_header_content', 'ifeature_header_standard_content');
	}
	
	if ($options->get($themeslug.'_enable_header_contact') == '1' OR $options->get($themeslug.'_show_description') == '1') {
	
			add_action( 'ifeature_header_content', 'ifeature_header_extra_content');
	}
}
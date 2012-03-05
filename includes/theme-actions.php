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

/**
* Sets up the header contact area
*
* @since 1.0
*/
function business_header_contact_area_content() { 
	global $themeslug, $options; 
	$contactdefault = apply_filters( 'business_header_contact_default_text', 'Enter Contact Information Here' ); 
	
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
					<?php business_header_sitename(); ?> 
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
					<?php business_header_sitename(); ?> 
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
					<?php business_header_sitename(); ?> 
			<!-- End @Core header sitename hook -->
			
				
			</div>	
			
			<div class="five columns" style="text-align: right;">
			
			<!-- Begin @Core header description hook -->
				<?php business_header_site_description(); ?> 
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
				<?php business_header_site_description(); ?> 
			<!-- End @Core header description hook -->		
			</div>
			
			<div class="seven columns">
			<!-- Begin @Core header social icon hook -->
				<?php business_header_social_icons(); ?> 
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

<div id="header">
	<div class="container">
		<div class="row">	
			
			<div class="five columns"">
				
				<!-- Begin @Core header sitename hook -->
					<?php business_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
			</div>	
			
			<div class="seven columns">
			<div id="nav">
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
					<?php business_header_sitename(); ?> 
				<!-- End @Core header sitename hook -->
			
				
			</div>	
			
			<div id ="register" class="five columns">
				
			<!-- Begin @Core header social icon hook -->
				<?php business_header_social_icons(); ?> 
			<!-- End @Core header contact social icon hook -->	
				
			</div>	
		</div><!--end row-->
	</div>

<?php
}

?>
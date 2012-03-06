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

add_action( 'business_logo_menu', 'business_logo_menu_content');
add_action( 'business_description_icons', 'business_description_icons_content');

/**
* Description/Icons
*
* @since 3.0
*/
function business_description_icons_content() {
?>

<div id="header">
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
* Logo/Menu
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

?>
<?php   

/* 
Portions of this code written by Blogatize http://blogatize.net
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
*/


add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 


$options = get_option('business');

/**
 * Init plugin options to white list our options
 */  
function theme_options_init() {
	
	register_setting( 'bu_options', 'business', 'theme_options_validate' );
	wp_register_script('bujquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
  wp_register_script('bujqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
  wp_register_script('bujquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
  wp_register_script('bucookie', get_template_directory_uri(). '/library/js/cookie.js');
  wp_register_script('bumcolor', get_template_directory_uri(). '/library/js/jscolor/jscolor.js');
  wp_register_style('bucss', get_template_directory_uri(). '/library/options/theme-options.css');
}


$themename = "Business Pro";
$template_url = get_template_directory_uri();


/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $themename, $shortname, $options;
  $page = add_theme_page($themename." Settings", "".$themename."", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'bu_scripts');
  add_action('admin_print_styles-' . $page, 'bu_styles');  
 
}

/*
Custom CSS
*/

function business_add_css() {
	$options = get_option('business');
	$business_css_css = $options['bu_css_options'];
	echo '<style type="text/css">' . "\n";
	echo business_css_filter ( $business_css_css ) . "\n";
	echo '</style>' . "\n";
}

function business_css_filter($_content) {
	$_return = preg_replace ( '/@import.+;( |)|((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/))/i', '', $_content );
	$_return = htmlspecialchars ( strip_tags($_return), ENT_NOQUOTES, 'UTF-8' );
	return $_return;
}

		
add_action ( 'wp_head', 'business_add_css' );

function business_add_header_color() {

$options = get_option('business');
$tdurl = get_template_directory_uri();
$header = $options['bu_header_color'];

if ($header == '' OR $header == "111111") {

			echo '<style type="text/css">';
			echo "#header {background: #111 url($tdurl/images/header.png) repeat-x 50% 100%;}";
			echo '</style>';
}
		else {
			 
			
echo '<style type="text/css">';
		echo "#header {background: #$header;}";
		echo '</style>';
}
}

add_action( 'wp_head', 'business_add_header_color');

function business_header_height() {

$options = get_option('business');
$height = $options['bu_header_height'];
$px  = 'px';
if ($height != '') {

			echo '<style type="text/css">';
			echo ".row {height: $height$px;}";
			echo '</style>';
	}

}

add_action( 'wp_head', 'business_header_height');




$select_font = array(
	'0' => array('value' =>'Maven+Pro','label' => __('Maven Pro (default)')), '1' => array('value' =>'Arial','label' => __('Arial')),'2' => array('value' =>'Courier New','label' => __('Courier New')),'3' => array('value' =>'Georgia','label' => __('Georgia')),'4' => array('value' =>'Lucida Grande','label' => __('Lucida Grande')),'5' => array('value' =>'Tahoma','label' => __('Tahoma')),'6' => array('value' =>'Times New Roman','label' => __('Times New Roman')),'7' => array('value' =>'Verdana','label' => __('Verdana')),'8' => array('value' =>'Allan','label' => __('Allan')),'9' => array('value' =>'Allerta','label' => __('Allerta')),'10' => array('value' =>'Allerta+Stencil','label' => __('Allerta Stencil')),'11' => array('value' =>'Amaranth','label' => __('Amaranth')),'12' => array('value' =>'Annie+Use+Your+Telescope','label' => __('Annie Use Your Telescope')),'13' => array('value' =>'Anonymous+Pro','label' => __('Anonymous Pro')),'14' => array('value' =>'Anton','label' => __('Anton')),'15' => array('value' =>'Architects+Daughter','label' => __('Architects Daughter')),'16' => array('value' =>'Arimo','label' => __('Arimo')),'17' => array('value' =>'Arvo','label' => __('Arvo')),'18' => array('value' =>'Astloch','label' => __('Astloch')),'19' => array('value' =>'Bangers','label' => __('Bangers')),'20' => array('value' =>'Bentham','label' => __('Bentham')),'21' => array('value' =>'Bevan','label' => __('Bevan')),'22' => array('value' =>'Buda','label' => __('Buda')),'23' => array('value' =>'Cabin','label' => __('Cabin')),'24' => array('value' =>'Cabin+Sketch','label' => __('Cabin Sketch')),'25' => array('value' =>'Calligraffitti','label' => __('Calligraffitti')),'26' => array('value' =>'Cantarell','label' => __('Cantarell')),'27' => array('value' =>'Cardo','label' => __('Cardo')),'28' => array('value' =>'Cherry+Cream+Soda','label' => __('Cherry Cream Soda')),'29' => array('value' =>'Chewy','label' => __('Chewy')),'30' => array('value' =>'Coda','label' => __('Coda')),'31' => array('value' =>'Coming+Soon','label' => __('Coming Soon')),'32' => array('value' =>'Copse','label' => __('Copse')),'33' => array('value' =>'Corben','label' => __('Corben')),'34' => array('value' =>'Cousine','label' => __('Cousine')),'35' => array('value' =>'Covered+By+Your+Grace','label' => __('Covered By Your Grace')),'36' => array('value' =>'Crafty+Girls','label' => __('Crafty Girls')),'37' => array('value' =>'Crimson+Text','label' => __('Crimson Text')),'38' => array('value' =>'Crushed','label' => __('Crushed')),'39' => array('value' =>'Cuprum','label' => __('Cuprum')),'40' => array('value' =>'Dancing+Script','label' => __('Dancing Script')),'41' => array('value' =>'Dawning+of+a+New+Day','label' => __('Dawning of a New Day')),'42' => array('value' =>'Droid+Sans','label' => __('Droid Sans')),'43' => array('value' =>'Droid+Sans+Mono','label' => __('Droid Sans Mono')),'44' => array('value' =>'Droid+Serif','label' => __('Droid Serif')),'45' => array('value' =>'EB+Garamond','label' => __('EB Garamond')),'46' => array('value' =>'Expletus+Sans','label' => __('Expletus Sans')),'47' => array('value' =>'Fontdiner+Swanky','label' => __('Fontdiner Swanky')),'48' => array('value' =>'Geo','label' => __('Geo')),'49' => array('value' =>'Goudy+Bookletter+1911','label' => __('Goudy Bookletter 1911')),'50' => array('value' =>'Gruppo','label' => __('Gruppo')),'51' => array('value' =>'Homemade+Apple','label' => __('Homemade Apple')),'52' => array('value' =>'Inconsolata','label' => __('Inconsolata')),'53' => array('value' =>'Indie+Flower','label' => __('Indie Flower')),'54' => array('value' =>'Irish+Grover','label' => __('Irish Grover')),'55' => array('value' =>'Josefin+Sans','label' => __('Josefin Sans')),'56' => array('value' =>'Josefin+Slab','label' => __('Josefin Slab')),'57' => array('value' =>'Just+Another+Hand','label' => __('Just Another Hand')),'58' => array('value' =>'Just+Me+Again+Down+Here','label' => __('Just Me Again Down Here')),'59' => array('value' =>'Kenia','label' => __('Kenia')),'60' => array('value' =>'Kranky','label' => __('Kranky')),'61' => array('value' =>'Kreon','label' => __('Kreon')),'62' => array('value' =>'Kristi','label' => __('Kristi')),'63' => array('value' =>'Lato','label' => __('Lato')),'64' => array('value' =>'League+Script','label' => __('League Script')),'65' => array('value' =>'Lekton','label' => __('Lekton')),'66' => array('value' =>'Lobster','label' => __('Lobster')),'67' => array('value' =>'Luckiest+Guy','label' => __('Luckiest Guy')),'68' => array('value' =>'Maiden+Orange','label' => __('Maiden Orange')),'69' => array('value' =>'Meddon','label' => __('Meddon')),'70' => array('value' =>'MedievalSharp','label' => __('MedievalSharp')),'71' => array('value' =>'Merriweather','label' => __('Merriweather')),'72' => array('value' =>'Michroma','label' => __('Michroma')),'73' => array('value' =>'Miltonian','label' => __('Miltonian')),'74' => array('value' =>'Miltonian+Tattoo','label' => __('Miltonian Tattoo')),'75' => array('value' =>'Molengo','label' => __('Molengo')),'76' => array('value' =>'Mountains+of+Christmas','label' => __('Mountains of Christmas')),'77' => array('value' =>'Neucha','label' => __('Neucha')),'78' => array('value' =>'Neuton','label' => __('Neuton')),'79' => array('value' =>'Nobile','label' => __('Nobile')),'80' => array('value' =>'OFL+Sorts+Mill+Goudy+TT','label' => __('OFL Sorts Mill Goudy TT')),'81' => array('value' =>'Old+Standard+TT','label' => __('Old Standard TT')),'82' => array('value' =>'Orbitron','label' => __('Orbitron')),'83' => array('value' =>'Oswald','label' => __('Oswald')),'84' => array('value' =>'Pacifico','label' => __('Pacifico')),'85' => array('value' =>'Permanent+Marker','label' => __('Permanent Marker')),'86' => array('value' =>'Philosopher','label' => __('Philosopher')),'87' => array('value' =>'Puritan','label' => __('Puritan')),'88' => array('value' =>'Quattrocento','label' => __('Quattrocento')),'89' => array('value' =>'Quattrocento+Sans','label' => __('Quattrocento Sans')),'90' => array('value' =>'Radley','label' => __('Radley')),'91' => array('value' =>'Raleway','label' => __('Raleway')),'92' => array('value' =>'Reenie+Beanie','label' => __('Reenie Beanie')),'93' => array('value' =>'Rock+Salt','label' => __('Rock Salt')),'94' => array('value' =>'Schoolbell','label' => __('Schoolbell')),'95' => array('value' =>'Six+Caps','label' => __('Six Caps')),'96' => array('value' =>'Slackey','label' => __('Slackey')),'97' => array('value' =>'Smythe','label' => __('Smythe')),'98' => array('value' =>'Sniglet','label' => __('Sniglet')),'99' => array('value' =>'Special+Elite','label' => __('Special Elite')),'100' => array('value' =>'Sue+Ellen+Francisco','label' => __('Sue Ellen Francisco')),'101' => array('value' =>'Sunshiney','label' => __('Sunshiney')),'102' => array('value' =>'Syncopate','label' => __('Syncopate')),'103' => array('value' =>'Terminal+Dosis+Light','label' => __('Terminal Dosis Light')),'104' => array('value' =>'The+Girl+Next+Door','label' => __('The Girl Next Door')),'105' => array('value' =>'Tinos','label' => __('Tinos')),'106' => array('value' =>'Ubuntu','label' => __('Ubuntu')),'107' => array('value' =>'Unkempt','label' => __('Unkempt')),'108' => array('value' =>'VT323','label' => __('VT323')),'109' => array('value' =>'Vibur','label' => __('Vibur')),'110' => array('value' =>'Vollkorn','label' => __('Vollkorn')),'111' => array('value' =>'Waiting+for+the+Sunrise','label' => __('Waiting for the Sunrise')),'112' => array('value' =>'Walter+Turncoat','label' => __('Walter Turncoat')),'113' => array('value' =>'Yanone+Kaffeesatz','label' => __('Yanone Kaffeesatz')),

);

$select_slider_effect = array(
	'0' => array('value' => 'random', 'label' => __( 'Random')), '1' => array('value' => 'rain', 'label' => __('Rain')), '2' => array('value' => 'straight', 'label' =>__('Straight')), '3' => array('value' => 'swirl', 'label' => __('Swirl')),
  
);

$select_slider_type = array(
	'0' => array('value' => 'posts', 'label' => __('Post Categeory')), '1' => array('value' => 'custom', 'label' => __( 'Custom Slides')), 
);

$select_slider_placement = array(
	'0' => array('value' => 'feature', 'label' => __( 'Business Pro Homepage')), '1' => array('value' => 'blog', 'label' => __('Default (Post) Template')),
	
);

$shortname = "bu";


$optionlist = array (

array( "id" => $shortname,
	"type" => "open-tab"),

array( "type" => "open"),
array( "type" => "close"),

array( "type" => "close-tab"),

// General

array( "id" => $shortname."-tab1",
	"type" => "open-tab"),

array( "type" => "open"),

array( "name" => "Choose a font:",  
    "desc" => "(Default is Maven Pro)",  
    "id" => $shortname."_font",  
    "type" => "select2",  
    "std" => ""),
    
array( "name" => "Logo URL",  
    "desc" => "Enter the link to your logo image, or to use your site title text leave blank.",  
    "id" => $shortname."_logo",  
    "type" => "text",  
    "std" => ""), 
    
array( "name" => "Header Color",  
    "desc" => "Use the color picker to select the header color. Default is 111111",  
    "id" => $shortname."_header_color",  
      "type" => "color2",  
    "std" => "false"),
    
array( "name" => "Header Height",  
    "desc" => "Enter a custom header height here. The default is 80.",  
    "id" => $shortname."_header_height",  
      "type" => "text",  
    "std" => "80"),
        
array( "name" => "Custom CSS",  
    "desc" => "Override default Business Pro CSS here.",  
    "id" => $shortname."_css_options",  
    "type" => "textarea",  
    "std" => ""),  
    
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "text",  
    "std" => ""),   
    
array( "name" => "Twitter Bar",  
    "desc" => "Enter your Twitter handle for the Twitter Bar",  
    "id" => $shortname."_twitter_bar",  
    "type" => "twitterbar",  
    "std" => ""),  

array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),  

array(  "name" => "Show Facebook Like Button",
        "desc" => "Check this box to show the Facebook Like Button on blog posts",
        "id" => $shortname."_show_fb_like",
        "type" => "checkbox",
        "std" => "false"),  
        
array( "type" => "close"),

array( "type" => "close-tab"),



// Social

array( "id" => $shortname."-tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Hide the Social Icons",  
    "desc" => "Check this box to hide the social icons above the sidebar.",  
    "id" => $shortname."_hide_social",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Search Box",  
    "desc" => "Check this box to hide the search box above the sidebar.",  
    "id" => $shortname."_hide_search",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Facebook URL",  
    "desc" => "Enter your Facebook page URL for the Facebook social icon.",  
    "id" => $shortname."_facebook",  
    "type" => "facebook",  
    "std" => "http://facebook.com"),

array( "name" => "Twitter URL",  
    "desc" => "Enter your Twitter URL for Twitter social icon.",  
    "id" => $shortname."_twitter",  
    "type" => "twitter",  
    "std" => "http://twitter.com"),
    
array( "name" => "LinkedIn URL",  
    "desc" => "Enter your LinkedIn URL for the LinkedIn social icon.",  
    "id" => $shortname."_linkedin",  
    "type" => "linkedin",  
    "std" => "http://linkedin.com"),  
    
array( "name" => "YouTube URL",  
    "desc" => "Enter your YouTube URL for the YouTube social icon.",  
    "id" => $shortname."_youtube",  
    "type" => "youtube",  
    "std" => "http://youtube.com"),  
    
array( "name" => "Google Maps URL",  
    "desc" => "Enter your Google Maps URL for the Google Maps social icon.",  
    "id" => $shortname."_googlemaps",  
    "type" => "googlemaps",  
    "std" => "http://google.com/maps"),  

array( "name" => "Email",  
    "desc" => "Enter your contact email address for email social icon.",  
    "id" => $shortname."_email",  
    "type" => "email",  
    "std" => "no@way.com"),
    
array( "name" => "Custom RSS Link",  
    "desc" => "Enter Feedburner URL, or leave blank for default RSS feed.",  
    "id" => $shortname."_rsslink",  
    "type" => "rss",  
    "std" => ""),   
 
array( "type" => "close"),

array( "type" => "close-tab"),

//Blog

array( "id" => $shortname."-tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Show Excerpts",  
    "desc" => "Check this box to show post excerpts instead of full-length content.",  
    "id" => $shortname."_show_excerpts",  
      "type" => "checkbox",  
    "std" => "false"),

array( "name" => "Hide the Author",  
    "desc" => "Check this box to hide the author link on posts.",  
    "id" => $shortname."_hide_author",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Categories",  
    "desc" => "Check this box to hide the categories link on posts.",  
    "id" => $shortname."_hide_categories",  
      "type" => "checkbox",  
    "std" => "false"),
        
array( "name" => "Hide the Date",  
    "desc" => "Check this box to hide the date link on posts.",  
    "id" => $shortname."_hide_date",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Comments",  
    "desc" => "Check this box to hide the comments link on posts.",  
    "id" => $shortname."_hide_comments",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Share Icons",  
    "desc" => "Check this box to hide the share icons on posts.",  
    "id" => $shortname."_hide_share",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Tags",  
    "desc" => "Check this box to hide the tags link on posts.",  
    "id" => $shortname."_hide_tags",  
      "type" => "checkbox",  
    "std" => "false"),

array( "type" => "close"),
array( "type" => "close-tab"),


//SEO

array( "id" => $shortname."-tab4",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Home Description",  
    "desc" => "Enter the META description of your homepage here.",  
    "id" => $shortname."_home_description",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Home Keywords",  
    "desc" => "Enter the META keywords of your homepage here (separated by commas).",  
    "id" => $shortname."_home_keywords",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Optional Home Title",  
    "desc" => "Enter an alternative title of your homepage here (default is site tagline).",  
    "id" => "bu_home_title",  
    "type" => "text",  
    "std" => ""),
 


array( "type" => "close"),
array( "type" => "close-tab"),

// Callout Section

array( "id" => $shortname."-tab5",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Hide Callout Section",  
    "desc" => "Check this box to hide the Callout Section on the homepage.",  
    "id" => $shortname."_hide_callout",  
     "type" => "checkbox",  
    "std" => "false"), 
  
array( "name" => "Callout Title",  
    "desc" => "Enter callout title, you can use HTML.",  
    "id" => $shortname."_callout_title",  
    "type" => "text",
    "std" => ""),

array( "name" => "Callout Text",  
    "desc" => "Enter callout text, you can use HTML.",  
    "id" => $shortname."_callout_text",  
    "type" => "textarea",
    "std" => ""),

array( "name" => "Callout Button Text",  
    "desc" => "Enter text for your callout button",  
    "id" => $shortname."_callout_button_text",  
    "type" => "text",
    "std" => "BUY NOW"),
    
array( "name" => "Callout Button Link",  
    "desc" => "Enter a URL for the Callout button's link.",  
    "id" => $shortname."_callout_image_link",  
    "type" => "text",
    "std" => ""),

array( "type" => "close"), 

array( "type" => "close-tab"),

// Business Slider

array( "id" => $shortname."-tab6",
	"type" => "open-tab"),

array( "type" => "open"),

array( "name" => "Hide Business Slider",  
    "desc" => "Check this box to hide the Feature Slider on the homepage.",  
    "id" => $shortname."_hide_slider",  
    "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Select the slider type:",  
    "desc" => "(Choose between custom feature slides or a post category)",  
    "id" => $shortname."_slider_type",  
    "type" => "select4",  
    "std" => ""), 
    
array( "name" => "Select the slider placement:",  
    "desc" => "(Choose between the feature template or the posts page)",  
    "id" => $shortname."_slider_placement",  
    "type" => "select5",  
    "std" => ""), 
    
array( "name" => "Show posts from category:",  
    "desc" => "(Default is all - WARNING: do not enter a category that does not exist or slider will not display)",  
    "id" => $shortname."_slider_category",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Number of featured posts:",  
    "desc" => "(Default is 5)",  
    "id" => $shortname."_slider_posts_number",  
    "type" => "text",  
    "std" => ""),  

array( "name" => "Slider delay time (in milliseconds):",  
    "desc" => "(Default is 3500)",  
    "id" => $shortname."_slider_delay",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Choose the slider animation:",  
    "desc" => "(Default is random)",  
    "id" => $shortname."_slider_animation",  
    "type" => "select3",  
    "std" => ""), 
    
array( "name" => "Hide the navigation:",  
    "desc" => "Check to disable the slider navigation",  
    "id" => $shortname."_slider_navigation",    
   	"type" => "checkbox",
        "std" => "false"),   
  

array( "type" => "close"),   

array( "type" => "close-tab"),


// Footer

array( "id" => $shortname."-tab7",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Hide the Boxes Section",  
    "desc" => "Check this box to hide the widgetized Boxes Section on the homepage.",  
    "id" => $shortname."_hide_boxes",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Hide the Social Icons",  
    "desc" => "Check this box to hide the social icons in the footer.",  
    "id" => $shortname."_hide_footer_social",  
      "type" => "checkbox",  
    "std" => "false"),    
  
array( "name" => "Footer Copyright",  
    "desc" => "Enter Copyright text used on the right side of the footer. It can be HTML (default is your blog title)",  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Hide our link",  
    "desc" => "Check this box to hide the link back to CyberChimps.com.",  
    "id" => $shortname."_hide_link",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "type" => "close"),

array( "type" => "close-tab"),

// Import/Export

array( "id" => $shortname."-tab8",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Import Business Settings",  
    "desc" => "To import your settings, Paste the Business Pro export code here and press Save Settings.",  
    "id" => $shortname."_import_code",  
    "type" => "import",  
    "process" => "business_import_options",
    "std" => ""), 
    
array( "name" => "Export Business Settings",  
    "desc" => "Copy the following code, Paste it into a text file and save it. This code can be used to import your settings into another Business Pro site.",  
    "id" => $shortname."_export_code",  
    "type" => "export",  
    "std" => ""), 
    
array( "type" => "close"),

array( "type" => "close-tab"),


);  

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $themename, $shortname, $optionlist, $select_font, $select_slider_effect, $select_slider_type, $select_slider_placement;
  

	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
  if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'business'";
            $wpdb->query($query);
            
            die;
     } 
   
?>

	<div class="wrap">
  

<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $themename; ?> Settings</h2><br />

<p>Need help? Follow the links below to visit our support forum and documentation pages:</p>
<a href="http://cyberchimps.com/businesspro/docs"><img src="<?php echo get_template_directory_uri();?>/images/docs.png?>" alt="Docs"></a> <a href="http://cyberchimps.com/forum"><img src="<?php echo get_template_directory_uri(); ?>/images/forum.png?>" alt="Forum"></a> 

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$themename.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#bu-tab1"><span>General</span></a></li>
        <li><a href="#bu-tab2"><span>Social</span></a></li>
        <li><a href="#bu-tab3"><span>Blog</span></a></li>
        <li><a href="#bu-tab4"><span>SEO</span></a></li>
        <li><a href="#bu-tab5"><span>Callout Section</span></a></li>
        <li><a href="#bu-tab6"><span>Business Slider</span></a></li>        
        <li><a href="#bu-tab7"><span>Footer</span></a></li>
        <li><a href="#bu-tab8"><span>Import/Export</span></a></li>
    
    </ul>
    
    <div class="tabContainer">
		
			<?php settings_fields( 'bu_options' ); ?>
			<?php $options = get_option( 'business' ); ?>

			<table class="form-table">   

      <?php foreach ($optionlist as $value) {  
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />
 
<?php break;


case "open-tab":
?>

<div id="<?php echo $value['id']; ?>">

 
<?php break;
 
case "close-tab":
?>


</div>
 
<?php break; 
 
case 'color2':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('business');

if (isset($options['bu_header_color']) == "")
			$picker = '111111';
			
		else
			$picker = $options['bu_header_color']; 
?>

<input type="text" class="color{required:false}" id="business[bu_header_color]" name="business[bu_header_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'twitterbar':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'ne['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />

<br /><br />

<input type="checkbox" id="business[bu_enable_twitter]" name="business[bu_enable_twitter]" value="1" <?php checked( '1', $options['bu_enable_twitter'] ); ?>> - Check this box to enable the Twitter Bar on the Business Pro Homepage (Requires <a href="http://wordpress.org/extend/plugins/twitter-for-wordpress/">Twitter for WordPress Plugin</a>)
</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


 
case 'textarea':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'business['.$value['id'].']'; ?>" name="<?php echo 'business['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'import':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'business['.$value['id'].']'; ?>" name="<?php echo 'business['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'export':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'business['.$value['id'].']'; ?>" name="<?php echo 'business['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo (serialize($options));?></textarea></td>  

 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'text':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'facebook':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_facebook]" name="business[bu_hide_facebook]" value="1" <?php checked( '1', $options['bu_hide_facebook'] ); ?>> - Check this box to hide the Facebook icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'twitter':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_twitter]" name="business[bu_hide_twitter]" value="1" <?php checked( '1', $options['bu_hide_twitter'] ); ?>> - Check this box to hide the Twitter icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'linkedin':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_linkedin]" name="business[bu_hide_linkedin]" value="1" <?php checked( '1', $options['bu_hide_linkedin'] ); ?>> - Check this box to hide the LinkedIn icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'youtube':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_youtube]" name="business[bu_hide_youtube]" value="1" <?php checked( '1', $options['bu_hide_youtube'] ); ?>> - Check this box to hide the YouTube icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'googlemaps':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_googlemaps]" name="business[bu_hide_googlemaps]" value="1" <?php checked( '1', $options['bu_hide_googlemaps'] ); ?>> - Check this box to hide the Google Maps icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'email':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_email]" name="business[bu_hide_email]" value="1" <?php checked( '1', $options['bu_hide_email'] ); ?>> - Check this box to hide the Email icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'rss':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'bu['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />
    
    <br /><br />
    <input type="checkbox" id="business[bu_hide_rss]" name="business[bu_hide_rss]" value="1" <?php checked( '1', $options['bu_hide_rss'] ); ?>> - Check this box to hide the RSS icon. 
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_menu_color as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select>

<br /> <br />

Or enter your own font below (Google Fonts with more than one word format as follows: Maven+Pro)
<br /> <br />

<input style="width:300px;" name="business[bu_custom_font]" id="business[bu_custom_font]" type="text" value="<?php echo $options['bu_custom_font'] ?>"  />

</td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_effect as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select4':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_type as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select5':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'business['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_placement as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'business['.$value['id'].']'; ?>" id="<?php echo 'business['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php break;
 
}
}
?>
      </div>  
    </div>    

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>
		</form>

    
    <form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>WARNING, THIS RESTORES TO DEFAULT</small>
</p>
</form> 



	</div>
	<?php
}



function theme_options_validate( $input ) {
	global  $select_font, $select_slider_effect, $select_slider_type, $select_slider_placement;

	// Assign checkbox value
  

    if ( ! isset( $input['bu_enable_twitter'] ) )
		$input['bu_enable_twitter'] = null;
	$input['bu_enable_twitter'] = ( $input['bu_enable_twitter'] == 1 ? 1 : 0 ); 

   
   if ( ! isset( $input['bu_hide_footer_social'] ) )
		$input['bu_hide_footer_social'] = null;
	$input['bu_hide_footer_social'] = ( $input['bu_hide_footer_social'] == 1 ? 1 : 0 ); 
   
   if ( ! isset( $input['bu_show_excerpts'] ) )
		$input['bu_show_excerpts'] = null;
	$input['bu_show_excerpts'] = ( $input['bu_show_excerpts'] == 1 ? 1 : 0 ); 
 
    if ( ! isset( $input['bu_hide_facebook'] ) )
		$input['bu_hide_facebook'] = null;
	$input['bu_hide_facebook'] = ( $input['bu_hide_facebook'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_twitter'] ) )
		$input['bu_hide_twitter'] = null;
	$input['bu_hide_twitter'] = ( $input['bu_hide_twitter'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_linkedin'] ) )
		$input['bu_hide_linkedin'] = null;
	$input['bu_hide_linkedin'] = ( $input['bu_hide_linkedin'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_youtube'] ) )
		$input['bu_hide_youtube'] = null;
	$input['bu_hide_youtube'] = ( $input['bu_hide_youtube'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_googlemaps'] ) )
		$input['bu_hide_googlemaps'] = null;
	$input['bu_hide_googlemaps'] = ( $input['bu_hide_googlemaps'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_email'] ) )
		$input['bu_hide_email'] = null;
	$input['bu_hide_email'] = ( $input['bu_hide_email'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_rss'] ) )
		$input['bu_hide_rss'] = null;
	$input['bu_hide_rss'] = ( $input['bu_hide_rss'] == 1 ? 1 : 0 ); 

  if ( ! isset( $input['bu_hide_callout'] ) )
		$input['bu_hide_callout'] = null;
	$input['bu_hide_callout'] = ( $input['bu_hide_callout'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_author'] ) )
		$input['bu_hide_author'] = null;
	$input['bu_hide_author'] = ( $input['bu_hide_author'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_categories'] ) )
		$input['bu_hide_categories'] = null;
	$input['bu_hide_categories'] = ( $input['bu_hide_categories'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_date'] ) )
		$input['bu_hide_date'] = null;
	$input['bu_hide_date'] = ( $input['bu_hide_date'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_comments'] ) )
		$input['bu_hide_comments'] = null;
	$input['bu_hide_comments'] = ( $input['bu_hide_comments'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_share'] ) )
		$input['bu_hide_share'] = null;
	$input['bu_hide_share'] = ( $input['bu_hide_share'] == 1 ? 1 : 0 ); 
	
	 if ( ! isset( $input['bu_hide_tags'] ) )
		$input['bu_hide_tags'] = null;
	$input['bu_hide_tags'] = ( $input['bu_hide_tags'] == 1 ? 1 : 0 ); 
		 
	if ( ! isset( $input['bu_hide_social'] ) )
		$input['bu_hide_social'] = null;
	$input['bu_hide_social'] = ( $input['bu_hide_social'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['bu_hide_search'] ) )
		$input['bu_hide_search'] = null;
	$input['bu_hide_search'] = ( $input['bu_hide_search'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['bu_show_fb_like'] ) )
		$input['bu_show_fb_like'] = null;
	$input['bu_show_fb_like'] = ( $input['bu_show_fb_like'] == 1 ? 1 : 0 ); 
  
  
     if ( ! isset( $input['bu_hide_slider'] ) )
		$input['bu_hide_slider'] = null;
	$input['bu_hide_slider'] = ( $input['bu_hide_slider'] == 1 ? 1 : 0 ); 
  
  
    if ( ! isset( $input['bu_hide_boxes'] ) )
		$input['bu_hide_boxes'] = null;
	$input['bu_hide_boxes'] = ( $input['bu_hide_boxes'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['bu_hide_link'] ) )
		$input['bu_hide_link'] = null;
	$input['bu_hide_link'] = ( $input['bu_hide_link'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['bu_slider_navigation'] ) )
		$input['bu_slider_navigation'] = null;
	$input['bu_slider_navigation'] = ( $input['bu_slider_navigation'] == 1 ? 1 : 0 ); 
  
  	// Strip HTML from certain options
  	
   $input['bu_logo'] = wp_filter_nohtml_kses( $input['bu_logo'] );
  
   $input['bu_facebook'] = wp_filter_nohtml_kses( $input['bu_facebook'] ); 
    
   $input['bu_twitter'] = wp_filter_nohtml_kses( $input['bu_twitter'] ); 
  
   $input['bu_linkedin'] = wp_filter_nohtml_kses( $input['bu_linkedin'] );   
  
   $input['bu_youtube'] = wp_filter_nohtml_kses( $input['bu_youtube'] );  
  
   $input['bu_rsslink'] = wp_filter_nohtml_kses( $input['bu_rsslink'] );  
  
   $input['bu_email'] = wp_filter_nohtml_kses( $input['bu_email'] );   
  

	return $input;    

}

?>
<?php
  
/* Custom Menu */   
  
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}


// Add scripts and stylesheet

  function bu_scripts() {
        wp_enqueue_script('bujquery');
        wp_enqueue_script('bujqueryui');
        wp_enqueue_script('bujquerycookie');
         wp_enqueue_script('bumcolor');
        wp_enqueue_script('bucookie');
   }
    
 function bu_styles() {
       wp_enqueue_style('bucss');
   }

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
	
/* Redirect after resetting theme options */

if ( isset( $_REQUEST['reset'] ))
  wp_redirect( 'themes.php?page=theme_options' );
  
/* Update theme options after saving the import code */
  
if ( isset( $_REQUEST['updated'] ))

  $options = get_option('business') ; 
  $checkimport = $options['bu_import_code'];
		
		if ($checkimport != '' ) {
			
			$options = get_option('business') ;  
			$import = $options['bu_import_code'];
			
			$options_array = (unserialize($import));
  			update_option( 'business', $options_array );
		}   		

?>
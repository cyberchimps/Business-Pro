<?php   

/* 
Portions of this code written by Blogatize http://blogatize.net
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
*/


add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 


$options = get_option('ifeature');

/**
 * Init plugin options to white list our options
 */  
function theme_options_init() {
	
	register_setting( 'if_options', 'ifeature', 'theme_options_validate' );
	wp_register_script('ifjquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
  wp_register_script('ifjqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
  wp_register_script('ifjquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
  wp_register_script('ifcookie', get_template_directory_uri(). '/library/js/cookie.js');
  wp_register_style('ifcss', get_template_directory_uri(). '/library/options/theme-options.css');
}


$themename = "iFeature Pro";
$template_url = get_template_directory_uri();


/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $themename, $shortname, $options;
  $page = add_object_page($themename." Settings", "".$themename."", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'if_scripts');
  add_action('admin_print_styles-' . $page, 'if_styles');  
 
}

/*
Custom CSS
*/

function ifeature_add_css() {
	$options = get_option('ifeature');
	$ifeature_css_css = $options['if_css_options'];
	echo '<style type="text/css">' . "\n";
	echo ifeature_css_filter ( $ifeature_css_css ) . "\n";
	echo '</style>' . "\n";
}

function ifeature_css_filter($_content) {
	$_return = preg_replace ( '/@import.+;( |)|((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/))/i', '', $_content );
	$_return = htmlspecialchars ( strip_tags($_return), ENT_NOQUOTES, 'UTF-8' );
	return $_return;
}

		
add_action ( 'wp_head', 'ifeature_add_css' );


$select_menu_color = array(
	'0' => array('value' =>	'Grey','label' => __( 'Grey (default)' )),'1' => array('value' =>	'Blue','label' => __( 'Blue' )),'2' => array('value' =>	'Red','label' => __( 'Red' )),'3' => array('value' =>	'Orange','label' => __( 'Orange' )),'4' => array('value' =>	'Pink','label' => __( 'Pink' )),            
);

$select_font = array(
	'0' => array('value' =>'Cantarell','label' => __('Cantarell (default)')), '1' => array('value' =>'Arial','label' => __('Arial')),'2' => array('value' =>'Courier New','label' => __('Courier New')),'3' => array('value' =>'Georgia','label' => __('Georgia')),'4' => array('value' =>'Lucida Grande','label' => __('Lucida Grande')),'5' => array('value' =>'Tahoma','label' => __('Tahoma')),'6' => array('value' =>'Times New Roman','label' => __('Times New Roman')),'7' => array('value' =>'Verdana','label' => __('Verdana')),'8' => array('value' =>'Allan','label' => __('Allan')),'9' => array('value' =>'Allerta','label' => __('Allerta')),'10' => array('value' =>'Allerta+Stencil','label' => __('Allerta Stencil')),'11' => array('value' =>'Amaranth','label' => __('Amaranth')),'12' => array('value' =>'Annie+Use+Your+Telescope','label' => __('Annie Use Your Telescope')),'13' => array('value' =>'Anonymous+Pro','label' => __('Anonymous Pro')),'14' => array('value' =>'Anton','label' => __('Anton')),'15' => array('value' =>'Architects+Daughter','label' => __('Architects Daughter')),'16' => array('value' =>'Arimo','label' => __('Arimo')),'17' => array('value' =>'Arvo','label' => __('Arvo')),'18' => array('value' =>'Astloch','label' => __('Astloch')),'19' => array('value' =>'Bangers','label' => __('Bangers')),'20' => array('value' =>'Bentham','label' => __('Bentham')),'21' => array('value' =>'Bevan','label' => __('Bevan')),'22' => array('value' =>'Buda','label' => __('Buda')),'23' => array('value' =>'Cabin','label' => __('Cabin')),'24' => array('value' =>'Cabin+Sketch','label' => __('Cabin Sketch')),'25' => array('value' =>'Calligraffitti','label' => __('Calligraffitti')),'26' => array('value' =>'Candal','label' => __('Candal')),'27' => array('value' =>'Cardo','label' => __('Cardo')),'28' => array('value' =>'Cherry+Cream+Soda','label' => __('Cherry Cream Soda')),'29' => array('value' =>'Chewy','label' => __('Chewy')),'30' => array('value' =>'Coda','label' => __('Coda')),'31' => array('value' =>'Coming+Soon','label' => __('Coming Soon')),'32' => array('value' =>'Copse','label' => __('Copse')),'33' => array('value' =>'Corben','label' => __('Corben')),'34' => array('value' =>'Cousine','label' => __('Cousine')),'35' => array('value' =>'Covered+By+Your+Grace','label' => __('Covered By Your Grace')),'36' => array('value' =>'Crafty+Girls','label' => __('Crafty Girls')),'37' => array('value' =>'Crimson+Text','label' => __('Crimson Text')),'38' => array('value' =>'Crushed','label' => __('Crushed')),'39' => array('value' =>'Cuprum','label' => __('Cuprum')),'40' => array('value' =>'Dancing+Script','label' => __('Dancing Script')),'41' => array('value' =>'Dawning+of+a+New+Day','label' => __('Dawning of a New Day')),'42' => array('value' =>'Droid+Sans','label' => __('Droid Sans')),'43' => array('value' =>'Droid+Sans+Mono','label' => __('Droid Sans Mono')),'44' => array('value' =>'Droid+Serif','label' => __('Droid Serif')),'45' => array('value' =>'EB+Garamond','label' => __('EB Garamond')),'46' => array('value' =>'Expletus+Sans','label' => __('Expletus Sans')),'47' => array('value' =>'Fontdiner+Swanky','label' => __('Fontdiner Swanky')),'48' => array('value' =>'Geo','label' => __('Geo')),'49' => array('value' =>'Goudy+Bookletter+1911','label' => __('Goudy Bookletter 1911')),'50' => array('value' =>'Gruppo','label' => __('Gruppo')),'51' => array('value' =>'Homemade+Apple','label' => __('Homemade Apple')),'52' => array('value' =>'Inconsolata','label' => __('Inconsolata')),'53' => array('value' =>'Indie+Flower','label' => __('Indie Flower')),'54' => array('value' =>'Irish+Grover','label' => __('Irish Grover')),'55' => array('value' =>'Josefin+Sans','label' => __('Josefin Sans')),'56' => array('value' =>'Josefin+Slab','label' => __('Josefin Slab')),'57' => array('value' =>'Just+Another+Hand','label' => __('Just Another Hand')),'58' => array('value' =>'Just+Me+Again+Down+Here','label' => __('Just Me Again Down Here')),'59' => array('value' =>'Kenia','label' => __('Kenia')),'60' => array('value' =>'Kranky','label' => __('Kranky')),'61' => array('value' =>'Kreon','label' => __('Kreon')),'62' => array('value' =>'Kristi','label' => __('Kristi')),'63' => array('value' =>'Lato','label' => __('Lato')),'64' => array('value' =>'League+Script','label' => __('League Script')),'65' => array('value' =>'Lekton','label' => __('Lekton')),'66' => array('value' =>'Lobster','label' => __('Lobster')),'67' => array('value' =>'Luckiest+Guy','label' => __('Luckiest Guy')),'68' => array('value' =>'Maiden+Orange','label' => __('Maiden Orange')),'69' => array('value' =>'Meddon','label' => __('Meddon')),'70' => array('value' =>'MedievalSharp','label' => __('MedievalSharp')),'71' => array('value' =>'Merriweather','label' => __('Merriweather')),'72' => array('value' =>'Michroma','label' => __('Michroma')),'73' => array('value' =>'Miltonian','label' => __('Miltonian')),'74' => array('value' =>'Miltonian+Tattoo','label' => __('Miltonian Tattoo')),'75' => array('value' =>'Molengo','label' => __('Molengo')),'76' => array('value' =>'Mountains+of+Christmas','label' => __('Mountains of Christmas')),'77' => array('value' =>'Neucha','label' => __('Neucha')),'78' => array('value' =>'Neuton','label' => __('Neuton')),'79' => array('value' =>'Nobile','label' => __('Nobile')),'80' => array('value' =>'OFL+Sorts+Mill+Goudy+TT','label' => __('OFL Sorts Mill Goudy TT')),'81' => array('value' =>'Old+Standard+TT','label' => __('Old Standard TT')),'82' => array('value' =>'Orbitron','label' => __('Orbitron')),'83' => array('value' =>'Oswald','label' => __('Oswald')),'84' => array('value' =>'Pacifico','label' => __('Pacifico')),'85' => array('value' =>'Permanent+Marker','label' => __('Permanent Marker')),'86' => array('value' =>'Philosopher','label' => __('Philosopher')),'87' => array('value' =>'Puritan','label' => __('Puritan')),'88' => array('value' =>'Quattrocento','label' => __('Quattrocento')),'89' => array('value' =>'Quattrocento+Sans','label' => __('Quattrocento Sans')),'90' => array('value' =>'Radley','label' => __('Radley')),'91' => array('value' =>'Raleway','label' => __('Raleway')),'92' => array('value' =>'Reenie+Beanie','label' => __('Reenie Beanie')),'93' => array('value' =>'Rock+Salt','label' => __('Rock Salt')),'94' => array('value' =>'Schoolbell','label' => __('Schoolbell')),'95' => array('value' =>'Six+Caps','label' => __('Six Caps')),'96' => array('value' =>'Slackey','label' => __('Slackey')),'97' => array('value' =>'Smythe','label' => __('Smythe')),'98' => array('value' =>'Sniglet','label' => __('Sniglet')),'99' => array('value' =>'Special+Elite','label' => __('Special Elite')),'100' => array('value' =>'Sue+Ellen+Francisco','label' => __('Sue Ellen Francisco')),'101' => array('value' =>'Sunshiney','label' => __('Sunshiney')),'102' => array('value' =>'Syncopate','label' => __('Syncopate')),'103' => array('value' =>'Terminal+Dosis+Light','label' => __('Terminal Dosis Light')),'104' => array('value' =>'The+Girl+Next+Door','label' => __('The Girl Next Door')),'105' => array('value' =>'Tinos','label' => __('Tinos')),'106' => array('value' =>'Ubuntu','label' => __('Ubuntu')),'107' => array('value' =>'Unkempt','label' => __('Unkempt')),'108' => array('value' =>'VT323','label' => __('VT323')),'109' => array('value' =>'Vibur','label' => __('Vibur')),'110' => array('value' =>'Vollkorn','label' => __('Vollkorn')),'111' => array('value' =>'Waiting+for+the+Sunrise','label' => __('Waiting for the Sunrise')),'112' => array('value' =>'Walter+Turncoat','label' => __('Walter Turncoat')),'113' => array('value' =>'Yanone+Kaffeesatz','label' => __('Yanone Kaffeesatz')),

);

$select_slider_effect = array(
	'0' => array('value' => 'random', 'label' => __( 'Random')), '1' => array('value' => 'rain', 'label' => __('Rain')), '2' => array('value' => 'straight', 'label' =>__('Straight')), '3' => array('value' => 'swirl', 'label' => __('Swirl')),
  
);

$select_slider_type = array(
	'0' => array('value' => 'posts', 'label' => __('Post Categeory')), '1' => array('value' => 'custom', 'label' => __( 'Custom Slides')), 
);

$select_slider_placement = array(
	'0' => array('value' => 'feature', 'label' => __( 'iFeature Pro Homepage')), '1' => array('value' => 'blog', 'label' => __('Default (Post) Template')),
	
);

$shortname = "if";


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


array(  "name" => "Choose iMenu Color",
        "desc" => "(Default is Grey)",
        "id" => $shortname."_menu_color",
        "type" => "select1",
        "std" => ""
),

array( "name" => "Choose a font:",  
    "desc" => "(Default is Cantarell)",  
    "id" => $shortname."_font",  
    "type" => "select2",  
    "std" => ""),
    
array( "name" => "Custom CSS",  
    "desc" => "Override default iFeature CSS here.",  
    "id" => $shortname."_css_options",  
    "type" => "textarea",  
    "std" => ""),  
    
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "text",  
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



// Header

array( "id" => $shortname."-tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Logo URL",  
    "desc" => "Enter the link to your logo image (max-height 60px), or to use your site title text enter the word: hide.",  
    "id" => $shortname."_logo",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "Custom Menu Icon",  
    "desc" => "Enter the link to your custom menu icon (optional).",  
    "id" => $shortname."_menuicon",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Header Contact Area",  
    "desc" => "Enter contact info such as phone number for the top right corner of the header. It can be HTML (to hide enter the word: hide).",  
    "id" => $shortname."_header_contact",  
    "type" => "textarea",
    "std" => ""),

array( "name" => "Facebook URL",  
    "desc" => "Enter your Facebook page URL to display the Facebook social icon (to hide enter the word: hide).",  
    "id" => $shortname."_facebook",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Twitter URL",  
    "desc" => "Enter your Twitter URL to display the Twitter social icon (to hide enter the word: hide).",  
    "id" => $shortname."_twitter",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "LinkedIn URL",  
    "desc" => "Enter your LinkedIn URL to display the LinkedIn social icon (to hide enter the word: hide).",  
    "id" => $shortname."_linkedin",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "YouTube URL",  
    "desc" => "Enter your YouTube URL to display the YouTube social icon (to hide enter the word: hide).",  
    "id" => $shortname."_youtube",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "Google Maps URL",  
    "desc" => "Enter your Google Maps URL to display the Google Maps social icon (to hide enter the word: hide).",  
    "id" => $shortname."_googlemaps",  
    "type" => "text",  
    "std" => ""),  

array( "name" => "Email",  
    "desc" => "Enter your contact email address to display the email social icon (to hide enter the word: hide.",  
    "id" => $shortname."_email",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Custom RSS Link",  
    "desc" => "Enter Feedburner URL, or leave blank for default RSS feed (to hide enter the word: hide).",  
    "id" => $shortname."_rsslink",  
    "type" => "text",  
    "std" => ""),   
 
array( "type" => "close"),

array( "type" => "close-tab"),

array( "id" => $shortname."-tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),

//SEO

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
    "id" => "if_home_title",  
    "type" => "text",  
    "std" => ""),


array( "type" => "close"),
array( "type" => "close-tab"),

// Callout Section

array( "id" => $shortname."-tab4",
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

array( "name" => "Callout Image",  
    "desc" => "Enter HTML to display call out image (max-height: 60px, max-width 180px, you can use callout.psd).",  
    "id" => $shortname."_callout_img",  
    "type" => "text",
    "std" => ""),
    
array( "name" => "Callout Image Link",  
    "desc" => "Enter a URL for the Callout Image's link.",  
    "id" => $shortname."_callout_image_link",  
    "type" => "text",
    "std" => ""),

array( "type" => "close"), 

array( "type" => "close-tab"),

// iFeature Slider

array( "id" => $shortname."-tab5",
	"type" => "open-tab"),

array( "type" => "open"),

array( "name" => "Hide iFeature Slider",  
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
    
array( "name" => "Slider height:",  
    "desc" => "(Default is 330)",  
    "id" => $shortname."_slider_height",  
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

array( "id" => $shortname."-tab6",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Hide the Boxes Section",  
    "desc" => "Check this box to hide the widgetized Boxes Section on the homepage.",  
    "id" => $shortname."_hide_boxes",  
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

array( "id" => $shortname."-tab7",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Import iFeature Settings",  
    "desc" => "To import your settings, Paste the iFeature Pro export code here and press Save Settings.",  
    "id" => $shortname."_import_code",  
    "type" => "import",  
    "process" => "ifeature_import_options",
    "std" => ""), 
    
array( "name" => "Export iFeature Settings",  
    "desc" => "Copy the following code, Paste it into a text file and save it. This code can be used to import your settings into another iFeature Pro site.",  
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
	global $themename, $shortname, $optionlist,  $select_menu_color, $select_font, $select_slider_effect, $select_slider_type, $select_slider_placement;
  

	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
  if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'ifeature'";
            $wpdb->query($query);
            
            die;
     } 
   
?>

	<div class="wrap">
  

<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $themename; ?> Settings</h2><br />

<p>Need help? Follow the links below to visit our support forum and documentation pages:</p>
<a href="http://cyberchimps.com/ifeaturepro/docs"><img src="<?php echo get_template_directory_uri();?>/images/docs.png?>" alt="Docs"></a> <a href="http://cyberchimps.com/forum"><img src="<?php echo get_template_directory_uri(); ?>/images/forum.png?>" alt="Forum"></a> 

		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$themename.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#if-tab1"><span>General</span></a></li>
        <li><a href="#if-tab2"><span>Header</span></a></li>
        <li><a href="#if-tab3"><span>SEO</span></a></li>
        <li><a href="#if-tab4"><span>Callout Section</span></a></li>
        <li><a href="#if-tab5"><span>iFeature Slider</span></a></li>        
        <li><a href="#if-tab6"><span>Footer</span></a></li>
        <li><a href="#if-tab7"><span>Import/Export</span></a></li>
    
    </ul>
    
    <div class="tabContainer">
		
			<?php settings_fields( 'if_options' ); ?>
			<?php $options = get_option( 'ifeature' ); ?>

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
 

 
case 'textarea':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'import':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'export':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'ifeature['.$value['id'].']'; ?>" name="<?php echo 'ifeature['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo (serialize($options));?></textarea></td>  

 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'text':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'if['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

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
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

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

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

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
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

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
<td width="85%"><select style="width:300px;" name="<?php echo 'ifeature['.$value['id'].']'; ?>">

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
<input type="checkbox" name="<?php echo 'ifeature['.$value['id'].']'; ?>" id="<?php echo 'ifeature['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
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
	global  $select_menu_color, $select_font, $select_slider_effect, $select_slider_type, $select_slider_placement;

	// Assign checkbox value
  
  if ( ! isset( $input['if_hide_callout'] ) )
		$input['if_hide_callout'] = null;
	$input['if_hide_callout'] = ( $input['if_hide_callout'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['if_show_fb_like'] ) )
		$input['if_show_fb_like'] = null;
	$input['if_show_fb_like'] = ( $input['if_show_fb_like'] == 1 ? 1 : 0 ); 
  
  
     if ( ! isset( $input['if_hide_slider'] ) )
		$input['if_hide_slider'] = null;
	$input['if_hide_slider'] = ( $input['if_hide_slider'] == 1 ? 1 : 0 ); 
  
  
    if ( ! isset( $input['if_hide_boxes'] ) )
		$input['if_hide_boxes'] = null;
	$input['if_hide_boxes'] = ( $input['if_hide_boxes'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['if_hide_link'] ) )
		$input['if_hide_link'] = null;
	$input['if_hide_link'] = ( $input['if_hide_link'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['if_slider_navigation'] ) )
		$input['if_slider_navigation'] = null;
	$input['if_slider_navigation'] = ( $input['if_slider_navigation'] == 1 ? 1 : 0 ); 
  
  	// Strip HTML from certain options
  	
   $input['if_logo'] = wp_filter_nohtml_kses( $input['if_logo'] );
  
   $input['if_facebook'] = wp_filter_nohtml_kses( $input['if_facebook'] ); 
    
   $input['if_twitter'] = wp_filter_nohtml_kses( $input['if_twitter'] ); 
  
   $input['if_linkedin'] = wp_filter_nohtml_kses( $input['if_linkedin'] );   
  
   $input['if_youtube'] = wp_filter_nohtml_kses( $input['if_youtube'] );  
  
   $input['if_rsslink'] = wp_filter_nohtml_kses( $input['if_rsslink'] );  
  
   $input['if_email'] = wp_filter_nohtml_kses( $input['if_email'] );   
  

	return $input;    

}

?>
<?php


/* Truncate */

function truncate ($str, $length=10, $trailing='..')
{
 $length-=mb_strlen($trailing);
 if (mb_strlen($str)> $length)
	  {
 return mb_substr($str,0,$length).$trailing;
  }
 else
  {
 $res = $str;
  }
 return $res;
} 


/* Get first image */

function get_first_image() {
 global $post, $posts;
 $first_img = '';
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 if(isset($matches[1][0])){
 $first_img = $matches [1][0];
 return $first_img;
 }  
}  

function ud_setting_filename() {
  }
  
/* Custom Menu */   
  
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}


// Add scripts and stylesheet

  function if_scripts() {
        wp_enqueue_script('ifjquery');
        wp_enqueue_script('ifjqueryui');
        wp_enqueue_script('ifjquerycookie');
        wp_enqueue_script('ifcookie');
   }
    
 function if_styles() {
       wp_enqueue_style('ifcss');
   }

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
	
/* Redirect after resetting theme options */

if ( isset( $_REQUEST['reset'] ))
  wp_redirect( 'themes.php?page=theme_options' );
  
/* Update theme options after saving the import code */
  
if ( isset( $_REQUEST['updated'] ))

  $options = get_option('ifeature') ; 
  $checkimport = $options['if_import_code'];
		
		if ($checkimport != '' ) {
			
			$options = get_option('ifeature') ;  
			$import = $options['if_import_code'];
			
			$options_array = (unserialize($import));
  			update_option( 'ifeature', $options_array );
		}   		

?>
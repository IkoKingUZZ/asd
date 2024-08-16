<?php
/*
Author: Creepy studio
URL: http://www.creepy.cz/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/


/************* INCLUDE NEEDED FILES ***************/

/*

*/
require_once( 'library/creepy.php' ); // if you remove this, bones will break

// require_once( 'library/admin.php' ); // this comes turned off by default

//require_once( 'library/register-team-template.php' ); //registering team template

require_once( 'library/register-slider-template.php' ); //registering team template

// require_once( 'library/translation/translation.php' ); // this comes turned off by default

require( get_stylesheet_directory() . '/library/skins-functions.php' ); //registering team template

//		Global variables
$skins = array();
$active_skin = array();

//		Get Avaible Skins and Currently active skin.
$skins = get_avaible_skins();
$active_skin = $skins[ get_theme_mod('creepy_skins') ];

function set_theme_skin(){
	global $active_skin;

		// If is checked box for original colours.
		if ( true == get_theme_mod( 'set_skin_colours' ) ){

			// Set original skin colors for theme;
			set_theme_mod('creepy_body_color', $active_skin['creepy_body_color'] );
			set_theme_mod('creepy_menu_color', $active_skin['creepy_menu_color'] );
			set_theme_mod('creepy_menu_hover_color', $active_skin['creepy_menu_hover_color'] );
			set_theme_mod('creepy_slider_color', $active_skin['creepy_slider_color'] );
			set_theme_mod('creepy_heading_color', $active_skin['creepy_heading_color'] );
			set_theme_mod('creepy_text_color', $active_skin['creepy_text_color'] );
			set_theme_mod('creepy_link_color', $active_skin['creepy_link_color'] );
			set_theme_mod('creepy_link_hover_color', $active_skin['creepy_link_hover_color'] );
			set_theme_mod('creepy_footer_bg_color', $active_skin['creepy_footer_bg_color'] );
			set_theme_mod('creepy_footer_text_color', $active_skin['creepy_footer_text_color'] );
			set_theme_mod('creepy_slider_font_size', $active_skin['creepy_slider_font_size'] );
			set_theme_mod('creepy_font', $active_skin['creepy_font'] );
			set_theme_mod('set_skin_colours', false );

		}
}
add_action( 'init', 'set_theme_skin');


require( get_stylesheet_directory() . '/library/customizer.php' );


define('THEMEROOT',get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/library/images');
/************* THUMBNAIL SIZE OPTIONS *************/

// Removes attributes width and height from img, so it can scale in responsive.
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );  
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 ); 
function remove_thumbnail_dimensions( $html ) {     
$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );     
return $html; }

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'bones-thumb-750', 750, 200, true );
//add_image_size( 'magicraft-main', 410, 255, true );
add_image_size( 'magicraft-post', 224, 162, true );
add_image_size( 'magicraft-slider', 690, 332, true );
add_image_size( 'magicraft-single', 690, 332, true );


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="inner-widget clearfix">',
		'after_widget' => '</div><div class="creepy-content-border creepy-3d-border widget-border"><span class="border-left"></span><span class="border-middle"><span></span></span><span class="border-right"></span></div></div>',
		'before_title' => '<h4 class="widgettitle"><div class="inner-title">',
		'after_title' => '</div><div class="creepy-main-border creepy-3d-border widget-border"><span class="border-left"></span><span class="border-middle"><span></span></span><span class="border-right"></span></div></h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php
	*/

	// Gets number of footer widgets from customizer, and aply right class
	$footer_widgets_number = get_theme_mod('creepy_footer_widgets');
	if ($footer_widgets_number == '1'){ $footer_widgets_number = 'twelvecol';}
	else if ($footer_widgets_number == '2'){ $footer_widgets_number = 'sixcol';}
	else if ($footer_widgets_number == '3'){ $footer_widgets_number = 'fourcol';}
	else if ($footer_widgets_number == '4'){ $footer_widgets_number = 'threecol';}

	register_sidebar( array(
		'name' => 'Footer Widgets',
		'id' => 'footer-widgets',
		'description' => 'Widgets in footer area',
		'before_widget' => '<div id="%1$s" class="widget %2$s '.$footer_widgets_number.'">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=56" class="load-gravatar avatar avatar-56 photo" height="56" width="56" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Váš komentář je nachystaný.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="search" action="' . home_url( '/' ) . '" >
		<input type="text" value="' . get_search_query() . '" name="s" class="search" placeholder="' . esc_attr__( 'Search...', 'bonestheme' ) . '" />
	</form>';
	return $form;
} // don't remove this bracket!


/*******************
	Theme settings
********************/

function creepymc_menu() {

	/*
	 * Use the add_option_page function
	 * <?php add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); ?>
	 *
	*/

	add_menu_page(
		'Minecraft Server Settings',
		'Server Settings',
		'manage_options',
		'creepymc-menu',
		'creepymc_options_page'
	);

}

function creepy_register_script_menu_page(){
	wp_enqueue_script( 'options-page', get_template_directory_uri() . '/library/js/options-page.js', array('jquery'), '', true );
}
add_action( 'admin_enqueue_scripts' , 'creepy_register_script_menu_page');

function creepy_register_css_menu_page(){
	wp_enqueue_style( 'options-page-css', get_template_directory_uri() . '/library/css/options-page-wrapper.css' );
}
add_action( 'admin_head' , 'creepy_register_css_menu_page');



// Get all stats of server
function mccreepy_get_server_stats( $adress, $port ){

/*	// Port and Timeout
	if ( !defined('MQ_SERVER_PORT') ) {
		define( 'MQ_SERVER_PORT', 25565 );
	}
	*/
	if ( !defined('MQ_TIMEOUT') ) {
		define( 'MQ_TIMEOUT', 12 );
	}
	

	// Display everything in browser, because some people can't look in logs for errors
	Error_Reporting( E_ALL | E_STRICT );
	Ini_Set( 'display_errors', true );

	require_once('library/minecraft-query/MinecraftPingException.php');
	require_once('library/minecraft-query/MinecraftPing.php');


	$Timer = MicroTime( true );

	$Info = false;
	$Query = null;

	try
	{
		$Query = new MinecraftPing( $adress, $port, MQ_TIMEOUT );

		$Info = $Query->Query( );

		if( $Info === false )
		{
			/*
			 * If this server is older than 1.7, we can try querying it again using older protocol
			 * This function returns data in a different format, you will have to manually map
			 * things yourself if you want to match 1.7's output
			 *
			 * If you know for sure that this server is using an older version,
			 * you then can directly call QueryOldPre17 and avoid Query() and then reconnection part
			 */

			$Query->Close( );
			$Query->Connect( );

			$Info = $Query->QueryOldPre17( );
		}
	}
	catch( MinecraftPingException $e )
	{
		$Exception = $e;
	}

	if( $Query !== null )
	{
		$Query->Close( );
	}

	$Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );

	if ($Info) {
		//is set
		$server_stats = $Info;
		$server_stats['error'] = 0;
	}else{
		// $Info is false
		$server_stats['error'] = 1;
	}

	return $server_stats;


}

function mccreepy_refresh_server() {

	$options = array();
	$options = get_option('creepymc_server_stats');
	$last_updated = $options['last_updated'];

	$update_difference = time() - $last_updated;

	if( $update_difference > 42 ) {

		$server_info = $options['server_info'];

		$server_stats = array();
		foreach ($server_info as $server) {

			$server_stats[] = mccreepy_get_server_stats( $server['server_ip'], $server['server_port'] );
		}

		$options['server_stats'] = $server_stats;
		$options['last_updated'] = time();

		update_option( 'creepymc_server_stats', $options);
	}

	die();
}
add_action( 'wp_ajax_mccreepy_refresh_server', 'mccreepy_refresh_server');
add_action( 'wp_ajax_nopriv_mccreepy_refresh_server', 'mccreepy_refresh_server' );

function mccreepy_server_enable_frontend_ajax() {
?>
	<script>

		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

	</script>
<?php

}
add_action( 'wp_head', 'mccreepy_server_enable_frontend_ajax' );

// Get rid of whitespaces on start and end
function creepy_trim_value(&$value) 
{ 
    $value = trim($value); 
}



add_action( 'admin_menu' , 'creepymc_menu' );
// Render options page for plugin
function creepymc_options_page() {

	if ( !current_user_can( 'manage_options' ) ) {
		wp_die( 'You do not have suggificient permissions to acces this page.' );
	}

	global $plugin_url;
	global $options;
	global $servers;

	$debug = false;


	if ( isset($_POST['save']) ) {

		$server_names = $_POST['server_name'];
		$server_ips = $_POST['server_ip'];
		$server_port = $_POST['server_port'];

		if ( is_array($server_names) ) {	array_walk($server_names, 'creepy_trim_value');	}else {	trim($server_names);}
		if ( is_array($server_ips) ) {	array_walk($server_ips, 'creepy_trim_value');	}else {	trim($server_ips);}
		if ( is_array($server_port) ) {	array_walk($server_port, 'creepy_trim_value');	}else {	trim($server_port);}

		// now edit them

		$count = 0;
		$server_stats = array();
		$server_info = array();

		if ( isset($server_ips) ){
			foreach ($server_ips as $ip) {

				// If is set ip and name for server, save name, ip and server info.
				if ( $ip != '' && isset( $ip ) ){

					// Aditionaly set name and ip of server
					$server_info[$count]['server_name'] = esc_html( $server_names[$count] );
					$server_info[$count]['server_ip'] = esc_html( $ip );

					if ( $server_port[$count] != '' && isset($server_port[$count]) ) {
						$server_info[$count]['server_port'] = esc_html( $server_port[$count] );
					} else { // If its not set, make it default value
						$server_info[$count]['server_port'] = "25565";
					}

					$server_stats[] = mccreepy_get_server_stats( $ip, $server_info[$count]['server_port'] );

				}

				$count++;
			}
		}

		// Actual data from server
		$options['server_stats'] = $server_stats;
		//user input about server
		$options['server_info'] = $server_info;

		$options['last_updated'] = time();

		// Update options was saving it like a string when had multiple servers and made whitespace at start
		// I know... WTF?
		if ( add_option('creepymc_server_stats', $options, '','yes') == false ){
			delete_option('creepymc_server_stats');
			add_option('creepymc_server_stats', $options, '','yes');
		}

		//update_option('creepymc_server_stats', $options);	

	}

	if ( !isset($options) ) {
		$options = array();
		$options = get_option('creepymc_server_stats');
	}

	$server_stats = $options['server_stats'];
	$server_info = $options['server_info'];


	require ( 'library/options-page-wrapper.php' );

}





/***************
Server status 
*****************/
// Single server
class Mcsolo_Server_Status extends WP_Widget {

	function mcsolo_server_status() {
		// Instantiate the parent object
		parent::__construct( false, 'Minecraft Server - single' );

	}

	function widget( $args, $instance ) {
		// Widget output
		global $options;

		extract( $args );
		$title = apply_filters( 'widget_title' , $instance['title'] );
		$display_title = $instance['display_title'];
		$chosen_server = $instance['server'];
		$users_ip = $instance['users_ip'];
		$server_version = $instance['server_version'];
		$server_description = $instance['server_description'];

		$options = get_option( 'creepymc_server_stats' );

		if ( $options != ''){
			$server_stats = $options['server_stats'];
			$server_info = $options['server_info'];

			$server_stats = $server_stats[$chosen_server];
			$server_info = $server_info[$chosen_server];

		}

		if ( !isset($server_info) ){

			echo "<p>You need to set your server info first.<p>";
		}else{

		require( 'library/widget/mcsolo-front-end.php' );
		
		}

	}

	function update( $new_instance, $old_instance ) {
		// Save widget options

		$instance = $old_instance;
		$instance['title'] = trim( strip_tags($new_instance['title']) );
		$instance['display_title'] = trim( strip_tags($new_instance['display_title']) );
		$instance['server'] = trim( strip_tags($new_instance['server']) );
		$instance['users_ip'] = trim( strip_tags($new_instance['users_ip']) );
		$instance['server_version'] = trim( strip_tags($new_instance['server_version']) );
		$instance['server_description'] = trim( strip_tags($new_instance['server_description']) );
		
		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form

		$title = trim( esc_attr($instance['title']) );
		$display_title = esc_attr($instance['display_title']);
		$chosen_server = $instance['server'];
		$users_ip = trim( esc_attr($instance['users_ip']) );
		$server_version = trim( esc_attr($instance['server_version']) );
		$server_description = trim( esc_attr($instance['server_description']) );

		$options = get_option('creepymc_server_stats');
		$server_info = $options['server_info'];

		if ( !isset($server_info)){
			echo "<p>You need to set your server info first.<p>";
		}else{
		
		require( 'library/widget/mcsolo-widget-fields.php' );
		
		}

	}
}

// Multi server widget
class Mcmulti_Server_Status extends WP_Widget {

	function mcmulti_server_status() {
		// Instantiate the parent object
		parent::__construct( false, 'Minecraft Server - Multi' );

	}

	function widget( $args, $instance ) {
		// Widget output

		extract( $args );
		$title = apply_filters( 'widget_title' , $instance['title'] );
		$display_title = $instance['display_title'];

		$options = get_option( 'creepymc_server_stats' );

		if ( $options != ''){
			$server_stats = $options['server_stats'];
			$server_info = $options['server_info'];
		}

		if ( !isset($server_info) ){

			echo "<p>You need to set your server info first.<p>";
		}else{
		
		$chosen_servers = array();
		$custom_ips = array();
		$count = 0;
		// save each checked elemen into $chosen_servers array;
		foreach ($server_info as $server) {
			if ( $instance['server'.$count] == 1){
				$chosen_servers[] = $count;
			}
			$custom_ips[] = $instance['custom_ip'.$count];
			$count++;
		}
		
		
		require( 'library/widget/mcmulti-front-end.php' );
		
		}

	}

	function update( $new_instance, $old_instance ) {
		// Save widget options

		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['display_title'] = strip_tags($new_instance['display_title']);

		$options = get_option( 'creepymc_server_stats' );
		$server_info = $options['server_info'];
		$count = 0;
		foreach ($server_info as $server) {
			$instance['server'.$count] = strip_tags($new_instance['server'.$count]);
			$instance['custom_ip'.$count] = trim( strip_tags($new_instance['custom_ip'.$count]) );
			$count++;
		}

		return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form

		$options = get_option('creepymc_server_stats');
		$server_info = $options['server_info'];


		$title = esc_attr($instance['title']);
		$display_title = esc_attr($instance['display_title']);
		
		if ( !isset($server_info) ){

			echo "<p>You need to set your servers info first.<p>";
		}else{


		$chosen_servers = array();
		$custom_ips = array();
		$count = 0;
		// save each checked elemen into $chosen_servers array;
		foreach ($server_info as $server) {
			if ( $instance['server'.$count] == 1){
				$chosen_servers[] = $count;
			}
			$custom_ips[] = $instance['custom_ip'.$count];
			$count++;
		}
		
		require( 'library/widget/mcmulti-widget-fields.php' );
		
		}
	}
}


function minecraft_server_stats_register_widget() {
	register_widget( 'Mcsolo_Server_Status' );
	register_widget( 'Mcmulti_Server_Status' );
}

add_action( 'widgets_init', 'minecraft_server_stats_register_widget' );


/***********************
Custom login form
**************************/

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/library/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );



/**************************
Custom admin footer text
****************************/
add_filter('admin_footer_text', 'remove_footer_admin'); //change admin footer text
function remove_footer_admin () {
echo '<a href="http://themes.creepy.cz/" target="_blank"  rel="copyright">Magicraft</a> theme crafted with love by Creepy Studio.';
}

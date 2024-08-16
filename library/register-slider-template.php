<?php
/**
 * Register `slide` post type
 */
function slider_post_type() {
   
   // Labels
	$labels = array(
		'name' => _x("Slider", "post type general name"),
		'singular_name' => _x("Slider", "post type singular name"),
		'menu_name' => 'Slider',
		'add_new' => _x("Add New", "team item"),
		'add_new_item' => __("Add New Slide"),
		'edit_item' => __("Edit Slide"),
		'new_item' => __("New Slide"),
		'view_item' => __("View Slide"),
		'search_items' => __("Search Slides"),
		'not_found' =>  __("No Slides Found"),
		'not_found_in_trash' => __("No Slides Found in Trash"),
		'parent_item_colon' => ''
	);
	
	// Register post type
	register_post_type('slider' , array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'menu_icon' => THEMEROOT.'/library/images/team-icon.png',
		'rewrite' => false,
		'supports' => array('title', 'editor', 'thumbnail')
	) );
}
add_action( 'init', 'slider_post_type', 0 );

/**
 * Register `department` taxonomy
 */
function slider_taxonomy() {
	
	// Labels
	$singular = 'Department';
	$plural = 'Departments';
	$labels = array(
		'name' => _x( $plural, "taxonomy general name"),
		'singular_name' => _x( $singular, "taxonomy singular name"),
		'search_items' =>  __("Search $singular"),
		'all_items' => __("All $singular"),
		'parent_item' => __("Parent $singular"),
		'parent_item_colon' => __("Parent $singular:"),
		'edit_item' => __("Edit $singular"),
		'update_item' => __("Update $singular"),
		'add_new_item' => __("Add New $singular"),
		'new_item_name' => __("New $singular Name"),
	);

	// Register and attach to 'team' post type
	register_taxonomy( strtolower($singular), 'team', array(
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'hierarchical' => true,
		'query_var' => true,
		'rewrite' => false,
		'labels' => $labels
	) );
}
add_action( 'init', 'slider_taxonomy', 0 );
?>
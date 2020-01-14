<?php 
/**
* Post Type: Properties.
*/
function cptui_register_search_cpts_properties() {

	$labels = array(
		"name" => __( "Properties", "twentynineteen" ),
		"singular_name" => __( "Property", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Properties", "twentynineteen" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "properties", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-admin-multisite",
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "author" ),
		"taxonomies" => array( "category", "post_tag" ),
	);

	register_post_type( "properties", $args );
}

add_action( 'init', 'cptui_register_search_cpts_properties' );
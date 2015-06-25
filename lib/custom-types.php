<?php 

/* 
 * 
 * Custom Post Types
 *
 */

// Add your custom types here. 
// http://generatewp.com is nice!

// You only need to copy the arguments and register_post_type function - the post types are officially added in functions.php.

// Sources post type

$labels = array(
	'name'                => _x( 'Sources', 'Post Type General Name', 'kmg' ),
	'singular_name'       => _x( 'Source', 'Post Type Singular Name', 'kmg' ),
	'menu_name'           => __( 'Sources', 'kmg' ),
	'parent_item_colon'   => __( 'Parent Source:', 'kmg' ),
	'all_items'           => __( 'All Sources', 'kmg' ),
	'view_item'           => __( 'View Source', 'kmg' ),
	'add_new_item'        => __( 'Add New Source', 'kmg' ),
	'add_new'             => __( 'Add New', 'kmg' ),
	'edit_item'           => __( 'Edit Source', 'kmg' ),
	'update_item'         => __( 'Update Source', 'kmg' ),
	'search_items'        => __( 'Search Source', 'kmg' ),
	'not_found'           => __( 'Not found', 'kmg' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'kmg' ),
);
$rewrite = array(
	'slug'                => 'sources',
	'with_front'          => true,
	'pages'               => true,
	'feeds'               => true,
);
$args = array(
	'label'               => __( 'source', 'kmg' ),
	'description'         => __( 'Sources for portfolio', 'kmg' ),
	'labels'              => $labels,
	'supports'            => array( 'title' ),
	'taxonomies'          => array( 'category', 'post_tag' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-admin-links',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => true,
	'publicly_queryable'  => true,
	'rewrite'             => $rewrite,
	'capability_type'     => 'page',
);
register_post_type( 'source', $args );


 ?>
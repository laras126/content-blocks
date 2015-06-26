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
	'name'                => _x( 'Sources', 'Post Type General Name', 'tsk' ),
	'singular_name'       => _x( 'Source', 'Post Type Singular Name', 'tsk' ),
	'menu_name'           => __( 'Sources', 'tsk' ),
	'parent_item_colon'   => __( 'Parent Source:', 'tsk' ),
	'all_items'           => __( 'All Sources', 'tsk' ),
	'view_item'           => __( 'View Source', 'tsk' ),
	'add_new_item'        => __( 'Add New Source', 'tsk' ),
	'add_new'             => __( 'Add New', 'tsk' ),
	'edit_item'           => __( 'Edit Source', 'tsk' ),
	'update_item'         => __( 'Update Source', 'tsk' ),
	'search_items'        => __( 'Search Source', 'tsk' ),
	'not_found'           => __( 'Not found', 'tsk' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'tsk' ),
);
$rewrite = array(
	'slug'                => 'sources',
	'with_front'          => true,
	'pages'               => true,
	'feeds'               => true,
);
$args = array(
	'label'               => __( 'source', 'tsk' ),
	'description'         => __( 'Sources attached to posts.', 'tsk' ),
	'labels'              => $labels,
	'supports'            => array( 'title' ),
	'taxonomies'          => array( 'source_type', 'post_tag' ),
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
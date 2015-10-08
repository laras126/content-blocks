<?php 

	// ----
	// Pieces Custom Type
	// ----

	$labels = array(
		'name'                => _x( 'Collection', 'Post Type General Name', 'yld' ),
		'singular_name'       => _x( 'Collection', 'Post Type Singular Name', 'yld' ),
		'menu_name'           => __( 'Collections', 'yld' ),
		'name_admin_bar'      => __( 'Collection', 'yld' ),
		'parent_item_colon'   => __( 'Parent Collection:', 'yld' ),
		'all_items'           => __( 'All Collections', 'yld' ),
		'add_new_item'        => __( 'Add New Collection', 'yld' ),
		'add_new'             => __( 'Add New', 'yld' ),
		'new_item'            => __( 'New Collection', 'yld' ),
		'edit_item'           => __( 'Edit Collection', 'yld' ),
		'update_item'         => __( 'Update Collection', 'yld' ),
		'view_item'           => __( 'View Collection', 'yld' ),
		'search_items'        => __( 'Search Collection', 'yld' ),
		'not_found'           => __( 'Not found', 'yld' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'yld' ),
	);
	$rewrite = array(
		'slug'                => 'collections',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'collection_type', 'yld' ),
		'description'         => __( 'The Collection post type.', 'yld' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-gallery',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	// register_post_type( 'collection_type', $args );
 


	// ----
	// Pieces Custom Type
	// ----

	$labels = array(
		'name'                => _x( 'Piece', 'Post Type General Name', 'yld' ),
		'singular_name'       => _x( 'Piece', 'Post Type Singular Name', 'yld' ),
		'menu_name'           => __( 'Pieces', 'yld' ),
		'name_admin_bar'      => __( 'Piece', 'yld' ),
		'parent_item_colon'   => __( 'Parent Piece:', 'yld' ),
		'all_items'           => __( 'All Pieces', 'yld' ),
		'add_new_item'        => __( 'Add New Piece', 'yld' ),
		'add_new'             => __( 'Add New', 'yld' ),
		'new_item'            => __( 'New Piece', 'yld' ),
		'edit_item'           => __( 'Edit Piece', 'yld' ),
		'update_item'         => __( 'Update Piece', 'yld' ),
		'view_item'           => __( 'View Piece', 'yld' ),
		'search_items'        => __( 'Search Piece', 'yld' ),
		'not_found'           => __( 'Not found', 'yld' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'yld' ),
	);
	$rewrite = array(
		'slug'                => 'pieces',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'piece', 'yld' ),
		'description'         => __( 'The Piece post type.', 'yld' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions' ),
		'taxonomies'          => array( 'category', 'post_tag', 'collection' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-image',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'piece', $args );
 

	// ----
	// Projects Custom Type
	// ----

	$labels = array(
		'name'                => _x( 'Project', 'Post Type General Name', 'yld' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'yld' ),
		'menu_name'           => __( 'Client Projects', 'yld' ),
		'name_admin_bar'      => __( 'Project', 'yld' ),
		'parent_item_colon'   => __( 'Parent Project:', 'yld' ),
		'all_items'           => __( 'All Projects', 'yld' ),
		'add_new_item'        => __( 'Add New Project', 'yld' ),
		'add_new'             => __( 'Add New', 'yld' ),
		'new_item'            => __( 'New Project', 'yld' ),
		'edit_item'           => __( 'Edit Project', 'yld' ),
		'update_item'         => __( 'Update Project', 'yld' ),
		'view_item'           => __( 'View Project', 'yld' ),
		'search_items'        => __( 'Search Project', 'yld' ),
		'not_found'           => __( 'Not found', 'yld' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'yld' ),
	);
	$rewrite = array(
		'slug'                => 'projects',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'project', 'yld' ),
		'description'         => __( 'The Project post type.', 'yld' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail', 'revisions'),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-slides',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'project', $args );
 


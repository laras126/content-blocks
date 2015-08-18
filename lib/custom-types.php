<?php 

	// ----
	// Custom Type Example
	// ----

	$labels = array(
		'name'                => _x( 'Chapter', 'Post Type General Name', 'tsk' ),
		'singular_name'       => _x( 'Chapter', 'Post Type Singular Name', 'tsk' ),
		'menu_name'           => __( 'Chapters', 'tsk' ),
		'name_admin_bar'      => __( 'Chapter', 'tsk' ),
		'parent_item_colon'   => __( 'Parent Chapter:', 'tsk' ),
		'all_items'           => __( 'All Chapters', 'tsk' ),
		'add_new_item'        => __( 'Add New Chapter', 'tsk' ),
		'add_new'             => __( 'Add New', 'tsk' ),
		'new_item'            => __( 'New Chapter', 'tsk' ),
		'edit_item'           => __( 'Edit Chapter', 'tsk' ),
		'update_item'         => __( 'Update Chapter', 'tsk' ),
		'view_item'           => __( 'View Chapter', 'tsk' ),
		'search_items'        => __( 'Search Chapter', 'tsk' ),
		'not_found'           => __( 'Not found', 'tsk' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'tsk' ),
	);
	$rewrite = array(
		'slug'                => 'chapter',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'chapter', 'tsk' ),
		'description'         => __( 'The Chapter post type.', 'tsk' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', 'thumbnail'),
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
		'capability_type'     => 'page',
	);
	register_post_type( 'chapter', $args );
 

 ?>
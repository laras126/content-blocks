<?php 

/* 
 * 
 * Taxonomies
 *
 */

// Same as with Custom Types, you only need the arguments and register_taxonomy function here. They are hooked into WordPress in functions.php.

	$labels = array(
		'name'                       => _x( 'Source Types', 'Taxonomy General Name', 'tsk' ),
		'singular_name'              => _x( 'Source Type', 'Taxonomy Singular Name', 'tsk' ),
		'menu_name'                  => __( 'Source Type', 'tsk' ),
		'all_items'                  => __( 'All Types', 'tsk' ),
		'parent_item'                => __( 'Parent Type', 'tsk' ),
		'parent_item_colon'          => __( 'Parent Type:', 'tsk' ),
		'new_item_name'              => __( 'New Type Name', 'tsk' ),
		'add_new_item'               => __( 'Add New Type', 'tsk' ),
		'edit_item'                  => __( 'Edit Type', 'tsk' ),
		'update_item'                => __( 'Update Type', 'tsk' ),
		'view_item'                  => __( 'View Type', 'tsk' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'tsk' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'tsk' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'tsk' ),
		'popular_items'              => __( 'Popular Types', 'tsk' ),
		'search_items'               => __( 'Search Types', 'tsk' ),
		'not_found'                  => __( 'Not Found', 'tsk' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'source_type', array( 'source' ), $args );

 ?>
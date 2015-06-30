<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package 	WordPress
 * @subpackage 	Timber
 * @since 		Timber 0.2
 */

		$templates = array('archive.twig', 'index.twig');

		$data = Timber::get_context();

		$data['title'] = 'Archive';
		if (is_day()){
			$data['title'] = 'Archive: '.get_the_date( 'D M Y' );
		} else if (is_month()){
			$data['title'] = 'Archive: '.get_the_date( 'M Y' );
		} else if (is_year()){
			$data['title'] = 'Archive: '.get_the_date( 'Y' );
		} else if (is_tag()){
			$data['title'] = 'Tagged: '.single_tag_title('', false);
		} else if (is_category()){
			$data['title'] = 'Category: '.single_cat_title('', false);
			array_unshift($templates, 'archive-'.get_query_var('cat').'.twig');
		} else if (is_tax()){
			// TODO: Not great to have these hardcoded
		    $term = get_queried_object();
		    if(get_taxonomy('source_type')) {
				$data['title'] = 'Resource: '.$term->name;
		    }
			// array_unshift($templates, 'taxonomy.twig', 'taxonomy-'.get_query_var('cat').'.twig');
		} else if (is_post_type_archive()){
			$data['title'] = post_type_archive_title('', false);
			array_unshift($templates, 'archive-'.get_post_type().'.twig');
		}

		$data['posts'] = Timber::get_posts();

		Timber::render($templates, $data);

<?php

/*
 * Template Name: Long Form
 * Description: A Page Template using the "Complex Content" ACF structure.
 */

$sources_args = array( 
				'post_type' => 'source', 
				'posts_per_page' => -1,
				'paged' => $paged
			);

$context = Timber::get_context();
$post = new TimberPost();
$context['sources'] = Timber::get_posts($sources_args);
$context['categories'] = Timber::get_terms('category');
$context['post'] = $post;
Timber::render(array('pages/page-sources.twig', 'pages/page.twig'), $context);
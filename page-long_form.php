<?php

/*
 * Template Name: Long Form
 * Description: A Page Template using the "Complex Content" ACF structure.
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render('pages/page-long_form.twig', $context);

?>
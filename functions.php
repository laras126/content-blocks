<?php

	if (!class_exists('Timber')){
		add_action( 'admin_notices', function(){
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
		});
		return;
	}

	class StarterSite extends TimberSite {

		function __construct(){
			add_theme_support('post-formats');
			add_theme_support('post-thumbnails');
			add_theme_support('menus');
			add_filter('timber_context', array($this, 'add_to_context'));
			add_filter('get_twig', array($this, 'add_to_twig'));
			add_action('init', array($this, 'register_post_types'));
			add_action('init', array($this, 'register_taxonomies'));
			parent::__construct();
		}


		// Note that the following included files only need to contain the taxonomy/CPT/Menu arguments and register_whatever function. They are initialized here.
		// http://generatewp.com is nice
		
		function register_post_types(){
			require('lib/custom-types.php');
		}

		function register_taxonomies(){
			require('lib/taxonomies.php');
		}

		function register_menus() {
			require('lib/menus.php');
		}

		function add_to_context($context){
			$context['foo'] = 'bar';
			$context['stuff'] = 'I am a value set in your functions.php file';
			$context['notes'] = 'These values are available everytime you call Timber::get_context();';
			$context['menu'] = new TimberMenu();
			$context['site'] = $this;
			return $context;
		}

		function add_to_twig($twig){
			/* this is where you can add your own fuctions to twig */
			$twig->addExtension(new Twig_Extension_StringLoader());
			$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
			return $twig;
		}

	}

	new StarterSite();

	
	/*
	 **************************
	 * Custom Theme Functions *
	 **************************
	 *
	 * Namespaced "tsk" - find and replace with your own three-letter-thing.
	 * 
	 */ 

	// Enqueue scripts
	function tsk_scripts() {

		// Use jQuery from CDN, enqueue in footer
		if (!is_admin()) {
			wp_deregister_script('jquery');
			wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, true);
			wp_enqueue_script('jquery');
		}

		// Enqueue stylesheet
		if( WP_ENV == 'production' ) {
			wp_enqueue_style( 'tsk-styles', get_template_directory_uri() . '/assets/css/main.min.css', 1.0);
		} else {
			wp_enqueue_style( 'tsk-styles', get_template_directory_uri() . '/assets/css/main.css', 1.0);
		}

		// Add our JS
		wp_enqueue_script( 'js', get_template_directory_uri() . '/assets/js/build/scripts.js', array('jquery'), '1.0.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'tsk_scripts' );

	
	 

	/* 
	 * 
	 * Nice to Haves
	 *
	 * These functions aren't necessary, more things I find myself writing over and over
	 */

	

	// Change Title field placeholders for Custom Post Types
	// (You'll need to register the types, of course)

	function tsk_title_placeholder_text ( $title ) {
		if ( get_post_type() == 'service' ) {
			$title = __( 'Service Name' );
		} else if ( get_post_type() == 'cast-study' ) {
	        $title = __( 'Case Study Name' );
		} else if ( get_post_type() == 'testimonial' ) {
	        $title = __( 'Testimonial Nickname' );
		}
		return $title;
	} 
	// add_filter( 'enter_title_here', 'tsk_title_placeholder_text' );



	// Customize the editor style
	// NOTE: You need to make this file yourself (not included in Simple Sassy Starter). I usually snipe the one from Roots, which is just the Bootstrap Typography, but does a nice job:
	// https://github.com/roots/roots-sass/blob/master/assets/css/editor-style.css
	function tsk_editor_styles() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'tsk_editor_styles' );



		


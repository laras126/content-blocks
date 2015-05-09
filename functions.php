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

		// Enqueue stylesheet and scripts. Use minified for production.
		if( WP_ENV == 'production' ) {
			wp_enqueue_style( 'tsk-styles', get_template_directory_uri() . '/assets/css/build/main.min.css', 1.0);
			wp_enqueue_script( 'js', get_template_directory_uri() . '/assets/js/build/scripts.min.js', array('jquery'), '1.0.0', true );
		} else {
			wp_enqueue_style( 'tsk-styles', get_template_directory_uri() . '/assets/css/main.css', 1.0);
			wp_enqueue_script( 'js', get_template_directory_uri() . '/assets/js/build/scripts.js', array('jquery'), '1.0.0', true );
		}

	}
	add_action( 'wp_enqueue_scripts', 'tsk_scripts' );

	
	 

	/* 
	 * 
	 * Nice to Haves
	 *
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
	// It's just the Bootstrap typography, but I like it. Got the idea from Roots.io.
	
	function tsk_editor_styles() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'tsk_editor_styles' );



	// Add excerpts to pages
	function tsk_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}
	add_action( 'init', 'tsk_add_excerpts_to_pages' );
	


	// Remove inline gallery styles
	add_filter( 'use_default_gallery_style', '__return_false' );


	
	// Add a 'Very Simple' toolbar style for the WYSIWYG editor in ACF
	// http://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/
	function tsk_acf_wysiwyg_toolbar( $toolbars ) {

		$toolbars['Text Based'] = array();

		// Only one row of buttons
		$toolbars['Text Based'][1] = array('formatselect' , 'bold' , 'link' , 'italic' , 'unlink' );

		return $toolbars;
	}
	// add_filter( 'acf/fields/wysiwyg/toolbars' , 'tsk_acf_wysiwyg_toolbar'  );




	/*
	 * 
	 * Plugin Helpers
	 *
	 */


	// Load Gravity Forms JS in the footer...really? Sheesh.
	// https://bjornjohansen.no/load-gravity-forms-js-in-footer

	function nl_wrap_gform_cdata_open( $content = '' ) {
		$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
		return $content;
	}
	add_filter( 'gform_cdata_open', 'nl_wrap_gform_cdata_open' );

	function nl_wrap_gform_cdata_close( $content = '' ) {
		$content = ' }, false );';
		return $content;
	}
	add_filter( 'gform_cdata_close', 'nl_wrap_gform_cdata_close' );




	// Make custom fields work with Yoast SEO (only impacts the light, but helpful!)
	// https://imperativeideas.com/making-custom-fields-work-yoast-wordpress-seo/

	if ( is_admin() ) { // check to make sure we aren't on the front end
		add_filter('wpseo_pre_analysis_post_content', 'tsk_add_custom_to_yoast');

		function nl_add_custom_to_yoast( $content ) {
			global $post;
			$pid = $post->ID;
			
			$custom = get_post_custom($pid);
			unset($custom['_yoast_wpseo_focuskw']); // Don't count the keyword in the Yoast field!

			foreach( $custom as $key => $value ) {
				if( substr( $key, 0, 1 ) != '_' && substr( $value[0], -1) != '}' && !is_array($value[0]) && !empty($value[0])) {
				  $custom_content .= $value[0] . ' ';
				}
			}

			$content = $content . ' ' . $custom_content;
			return $content;

			remove_filter('wpseo_pre_analysis_post_content', 'tsk_add_custom_to_yoast'); // don't let WP execute this twice
		}
	}


	
	// Google Analytics snippet from HTML5 Boilerplate
	// Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM

	define('GOOGLE_ANALYTICS_ID', 'UA-XXXXXX-X');
	function mtn_google_analytics() { ?>
	<script>
	  <?php if (WP_ENV === 'production') : ?>
	    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
	    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
	    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
	    e.src='//www.google-analytics.com/analytics.js';
	    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
	  <?php else : ?>
	    function ga() {
	      console.log('GoogleAnalytics: ' + [].slice.call(arguments));
	    }
	  <?php endif; ?>
	  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
	</script>

	<?php }

	if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
	  add_action('wp_footer', 'mtn_google_analytics', 20);
	}



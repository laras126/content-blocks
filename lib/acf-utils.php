<?php

	/* 	
		Add a 'Links Only' toolbar style for the following fields:
		- Text/Image Block: text_caption
		- Site-wide Settings: site_callout_text, site_footer_credits

		Credit: http://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/
	*/

	function tsk_acf_wysiwyg_toolbar( $toolbars ) {

		$toolbars['Links Only'] = array();
		$toolbars['Text Based'] = array();

		// Only one row of buttons
		$toolbars['Links Only'][1] = array('link', 'unlink' );
		$toolbars['Text Based'][1] = array('formatselect', 'bold', 'italic', 'link', 'unlink', 'bullist', 'numlist' );

		return $toolbars;
	}
	add_filter( 'acf/fields/wysiwyg/toolbars' , 'tsk_acf_wysiwyg_toolbar'  );


	// Register the Site-wide Options Page
	if( function_exists('acf_add_options_page') ) {	
		acf_add_options_page('Site-wide Options');
	}

	// Add stylesheet with custom ACF styles
	function tsk_acf_admin_head() {
		?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/acf.css">
		<?php
	}
	add_action('acf/input/admin_head', 'tsk_acf_admin_head');



?>
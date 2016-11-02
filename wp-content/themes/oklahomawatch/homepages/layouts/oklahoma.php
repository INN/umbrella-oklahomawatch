<?php

include_once get_template_directory() . '/homepages/homepage-class.php';

class OklahomaWatch extends Homepage {
	function __construct($options=array()) {
		$defaults = array(
			'name' => __('Oklahoma Watch', 'oklahoma'),
			'description' => __('Custom Homepage Layout for Oklahoma Watch', 'oklahoma'),
			'template' => get_stylesheet_directory() . '/homepages/templates/oklahoma-template.php',
			'assets' => array(
				array(
					'oklahoma',
					get_stylesheet_directory_uri() . '/homepages/assets/css/oklahoma.min.css',
					array()
				)
			),
			'rightRail' 		=> true,
			'prominenceTerms' 	=> array(
				array(
					'name' 			=> __( 'Homepage Top Story', 'largo' ),
					'description' 	=> __( 'The main story on the homepage', 'largo' ),
					'slug' 			=> 'top-story'
				),
				array(
					'name' 			=> __( 'Homepage Featured', 'largo' ),
					'description' 	=> __( 'The other stories in the main river on the homepage' ),
					'slug' 			=> 'homepage-featured'
				)
			)
		);
		$options = array_merge($defaults, $options);
		parent::__construct($options);
	}
}
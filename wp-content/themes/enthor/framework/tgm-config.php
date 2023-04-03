<?php
add_action( 'tgmpa_register', 'enthor_register_required_plugins' );
function enthor_register_required_plugins() {
	$plugins = array(
		array(
			'name' 		=> 'Redux Framework',
			'slug' 		=> 'redux-framework',
			'required' 	=> true
		),  
		
		array(
			'name' 		=> 'Elementor',
			'slug' 		=> 'elementor',
			'required' 	=> true
		),    


		array(
			'name' 		=> 'Contact Form 7',
			'slug' 		=> 'contact-form-7',
			'required' 	=> true
		),


		array(
			'name' 		=> 'Breadcrumb Navxt',
			'slug' 		=> 'breadcrumb-navxt',
			'required' 	=> true
		),

		array(
			'name' 		=> 'Mailchimp for WordPress',
			'slug' 		=> 'mailchimp-for-wp',
			'required' 	=>  false
		),

		
		array(
			'name' 		=> 'One Click Demo Import',
			'slug' 		=> 'one-click-demo-import',
			'required' 	=> true
		),
		
		array(
			'name'               => 'Back Core Elements', 
			'slug'               => 'back-core-elements',
			'source'             => get_template_directory() .'/framework/plugins/back-core-elements.zip', 
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),	
	);
	
	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'enthor';
	$config = array(
		'domain'       		=> 	$theme_text_domain,         
		'default_path' 		=> '',                         	
		'parent_menu_slug' 	=> 'themes.php', 				
		'parent_url_slug' 	=> 'themes.php', 				
		'menu'         		=> 'install-required-plugins', 
		'has_notices'      	=> true,                       	
		'is_automatic'    	=> true,					   	
		'message' 			=> '',							
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', "enthor" ),
			'menu_title'                       			=> __( 'Install Plugins', "enthor" ),
			'installing'                       			=> __( 'Installing Plugin: %s', "enthor" ),
			'oops'                             			=> __( 'Something went wrong with the plugin API.', "enthor" ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','enthor' ),
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','enthor' ),
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','enthor' ),
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','enthor' ),
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ,'enthor'),
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','enthor' ),
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ,'enthor'),
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ,'enthor'),
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins','enthor' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ,'enthor'),
			'return'                           			=> __( 'Return to Required Plugins Installer', "enthor" ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', "enthor" ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', "enthor" ), // %1$s = dashboard link
			'nag_type'									=> 'updated'
		)
	);
	tgmpa( $plugins, $config );
}
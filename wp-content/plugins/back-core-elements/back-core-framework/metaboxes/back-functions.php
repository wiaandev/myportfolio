<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'back_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 $cmb CMB2 object.
 *
 * @return bool      True if metabox should show
 */
function back_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}



/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function back_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function back_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
		<p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label></p>
		<p><input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo esc_html( $description ); ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function back_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array      $field_args Array of field parameters.
 * @param  CMB2_Field $field      Field object.
 */
function back_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}


add_action( 'cmb2_admin_init', 'back_register_header_metabox' );
function back_register_header_metabox() {
	$prefix = 'back_'; 

 /**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_back = new_cmb2_box( array(
		'id'      => $prefix . 'metabox',
		'title'     => esc_html__( 'Page Options', 'back' ),
		'object_types' => array( 'mp-event','page','post','teams','portfolios','services','product','archive' ), // Post type
		'vertical_tabs' => true, // Set vertical tabs, default false
		'tabs' => array(
	      	array(
	        'id'  => 'tab-1',
	        'icon' => 'dashicons-admin-page',
	        'title' => 'Page Settings',
		        'fields' => array(
		          	'primary-colors',
		          	'content_top',
		          	'content_bottom',
		        ),
	      	),
	      	array(
		        'id'  => 'tab-2',
		        'icon' => 'dashicons-admin-generic',
		        'title' => 'Topbar Settings',
		        'fields' => array(
		          	'select-top',
		          	'topbar-area-bg',
		          	'topbar-text-color',
		          	'topbar_link_hovercolor',
		          	'topbar-border-color',
		        ),
	 		), 
	      	array(
		        'id'  => 'tab-3',
		        'icon' => 'dashicons-admin-generic',
		        'title' => 'Header Settings',
		        'fields' => array(
		          	'header_logo_img',
		          	'header_sticky_logo_img',
		          	'header_select',
		          	'header_width_custom',
		          	'select-search',
		          	'search_icon_color',
		          	'show-cart-icon',
		          	'cart_icon_color',
		          	'show-off-canvas',
		          	'show-quote',
		          	'sticky_hamburgeback_secondary_color',
		          	'normal_hamburgeback_secondary_color',
		          	'quote_button_bg_color',
		          	'quote_button_color',
		          	'quote_button_bg_hover_color',
		          	'quote_button_hover_color',
		        ),
	 		),
	      	array(
		        'id'  => 'tab-4',
		        'icon' => 'dashicons-admin-generic',
		        'title' => 'Menu Settings',
		        'fields' => array(
		          	'menu_select',
		          	'menu-type-bg',
		          	'menu-text-color',
		          	'menu-text-hover-color',
		          	'main_menu_top',
		          	'main_menu_bottom',
		          	'menu_sticky_bgcolor',
		          	'menu_sticky_txtcolor',
		          	'menu_sticky_txt_hovercolor',
		          	'menu_bg_dropdowncolor',
		          	'menu_text_dropdowncolor',
		          	'menu_text_hover_dropdowncolor',
		          	'center-menus',
		          	'menu-hides',
		        ),
	 		),
	      	array(
		        'id'  => 'tab-5',
		        'icon' => 'dashicons-admin-generic',
		        'title' => 'Banner Settings',
		        'fields' => array(
		          	'banner_image',
		          	'banner_hide',
		          	'content_banner',
		          	'select-title',
		          	'select-bread',
		          	'banner_top',
		          	'banner_bottom',
		        ),
	 		),
	      	array(
		        'id'  => 'tab-6',
		        'icon' => 'dashicons-admin-generic',
		        'title' => 'Footer Settings',
		        'fields' => array(
		          	'hide_footer',
		          	'hide_foot_widgets',
		          	'footer_width_custom',
		          	'footer_bg_img',
		          	'footer_bg_position',
		          	'footer_bg',
		          	'footer_logo_img',
		          	'footer_primary_color',
		          	'footer_texts_color'
		        ),
	 		),
	      	array(
		        'id'  => 'tab-7',
		        'icon' => 'dashicons-admin-generic',
		        'title' => 'Copyright Settings',
		        'fields' => array(
		          	'copyright_bg',
		          	'copyright_text',
		          	'copyright_text_hover',
		          	'copyright_text_dots',
		          	'copyright_border',
		          	'copyright_padding',
		        ),
	 		),
 		)		
)	);

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Custom Header Logo', 'cmb2' ),
		'desc'    => esc_html__( 'Select header logo', 'cmb2' ),
		'id'      => 'header_logo_img',
		'type'    => 'file',		
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Custom Sticky Logo', 'cmb2' ),
		'desc'    => esc_html__( 'Select Sticky logo', 'cmb2' ),
		'id'      => 'header_sticky_logo_img',
		'type'    => 'file',		
	) );

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Select Header Style', 'back' ),
		'desc'             => esc_html__( 'chosse your individual header style', 'back' ),
		'id'               => 'header_select',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'header1' => esc_html__( 'Header Style 1', 'back' ),
			'header2' => esc_html__( 'Header Style 2', 'back' ),													
		),
	));

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Select Header Width', 'back' ),
		'desc'             => esc_html__( 'Choose your individual header width', 'back' ),
		'id'               => 'header_width_custom',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'container' => esc_html__( 'Container', 'back' ),
			'full' => esc_html__( 'Container Fluid', 'back' ),	
		),
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Primary Color', 'back' ),
		'desc'    => esc_html__( 'chosse your background', 'back' ),
		'id'      => 'primary-colors',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Show Top Bar', 'back' ),
		'desc'             => esc_html__( 'You can show/hide topbar', 'back' ),
		'id'               => 'select-top',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Topbar Area Background', 'back' ),
		'desc'    => esc_html__( 'chosse your background', 'back' ),
		'id'      => 'topbar-area-bg',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Topbar Text Color', 'back' ),
		'desc'    => esc_html__( 'chosse your color', 'back' ),
		'id'      => 'topbar-text-color',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Topbar Link Hover Color', 'back' ),
		'desc'    => esc_html__( 'chosse your link color', 'back' ),
		'id'      => 'topbar_link_hovercolor',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Topbar Border Color', 'back' ),
		'desc'    => esc_html__( 'chosse your color', 'back' ),
		'id'      => 'topbar-border-color',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Select Menu Here', 'back' ),
		'desc'             => esc_html__( 'Chosse Your Individual Menu Style', 'back' ),
		'id'               => 'menu_select',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'default_menu' => esc_html__( 'Default Page Template', 'back' ),
			'single_menu' => esc_html__( 'Single Page Template', 'back' ),													
		),
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Menu Area Background', 'back' ),
		'desc'    => esc_html__( 'chosse your background', 'back' ),
		'id'      => 'menu-type-bg',		
		'type'    => 'colorpicker',
		'default' => '',
	) );


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Main Menu Text Color', 'back' ),
		'desc'    => esc_html__( 'chosse your Text Color', 'back' ),
		'id'      => 'menu-text-color',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Main Menu Text Hover Color', 'back' ),
		'desc'    => esc_html__( 'chosse your Text Color', 'back' ),
		'id'      => 'menu-text-hover-color',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Main Top Padding', 'back' ),
		'desc'    => esc_html__( 'example(45px)', 'back' ),
		'id'      => 'main_menu_top',
		'type'    => 'text_medium',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Main Bottom Padding', 'back' ),
		'desc'    => esc_html__( 'example(45px)', 'back' ),
		'id'      => 'main_menu_bottom',
		'type'    => 'text_medium',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Sticky Menu Bg Color', 'back' ),
		'desc'    => esc_html__( 'chosse your sticky bg color', 'back' ),
		'id'      => 'menu_sticky_bgcolor',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Sticky Menu Text Color', 'back' ),
		'desc'    => esc_html__( 'chosse your sticky text color', 'back' ),
		'id'      => 'menu_sticky_txtcolor',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Sticky Menu Hover Text Color', 'back' ),
		'desc'    => esc_html__( 'chosse your sticky hover text color', 'back' ),
		'id'      => 'menu_sticky_txt_hovercolor',		
		'type'    => 'colorpicker',
		'default' => '',
	) );


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Dropdown Menu Background Color', 'back' ),
		'desc'    => esc_html__( 'chosse your Bg Color', 'back' ),
		'id'      => 'menu_bg_dropdowncolor',		
		'type'    => 'colorpicker',
		'default' => '',
	) );


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Dropdown Menu Text Color', 'back' ),
		'desc'    => esc_html__( 'chosse your text color', 'back' ),
		'id'      => 'menu_text_dropdowncolor',		
		'type'    => 'colorpicker',
		'default' => '',
	) );


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Dropdown Menu hover Text Color', 'back' ),
		'desc'    => esc_html__( 'chosse your hover text color', 'back' ),
		'id'      => 'menu_text_hover_dropdowncolor',		
		'type'    => 'colorpicker',
		'default' => '',
	) );


	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Main Menu Center', 'back' ),
		'desc'             => esc_html__( 'Main menu center here', 'back' ),
		'id'               => 'center-menus',
		'type'             => 'select',
		'show_option_none' => '',
		'options'          => array(
			'no' => esc_html__( 'Default', 'back' ),
			'yes' => esc_html__( 'Main Menu Center', 'back' ),			
		),
	) );

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Main menu Show or Hide (Desktop)', 'back' ),
		'desc'             => esc_html__( 'You Can Show or Hide Main menu', 'back' ),
		'id'               => 'menu-hides',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	) );


	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Show Header Search', 'back' ),
		'desc'             => esc_html__( 'You can show/hide search', 'back' ),
		'id'               => 'select-search',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Search Icon Color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose Search Icon color', 'cmb2' ),
		'id'      => 'search_icon_color',
		'type'    => 'colorpicker',
		'default' => '',		
	) );

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Cart Icon Show At Menu Area', 'back' ),
		'desc'             => esc_html__( 'You can show/hide cart icon', 'back' ),
		'id'               => 'show-cart-icon',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	) );
	
	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Cart Icon Color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose Cart Icon color', 'cmb2' ),
		'id'      => 'cart_icon_color',
		'type'    => 'colorpicker',
		'default' => '',		
	) );

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Show off Canvas', 'back' ),
		'desc'             => esc_html__( 'You can show/hide off canvas', 'back' ),
		'id'               => 'show-off-canvas',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	) );


	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Show Quote Button', 'back' ),
		'desc'             => esc_html__( 'You can show/hide quote button', 'back' ),
		'id'               => 'show-quote',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	) );


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Normal Hamburger Color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose Hamburger color', 'cmb2' ),
		'id'      => 'normal_hamburgeback_secondary_color',
		'type'    => 'colorpicker',
		'default' => '',		
	) );


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Sticky Hamburger Color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose Hamburger color', 'cmb2' ),
		'id'      => 'sticky_hamburgeback_secondary_color',
		'type'    => 'colorpicker',
		'default' => '',		
	) );


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Quote Button Background Color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose Quote Button Background color', 'cmb2' ),
		'id'      => 'quote_button_bg_color',
		'type'    => 'colorpicker',
		'default' => '',		
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Quote Button Color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose Quote Button color', 'cmb2' ),
		'id'      => 'quote_button_color',
		'type'    => 'colorpicker',
		'default' => '',		
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Quote Button Hover Bg color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose Quote Button Bg Border color', 'cmb2' ),
		'id'      => 'quote_button_bg_hover_color',
		'type'    => 'colorpicker',
		'default' => '',		
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Quote Button Hover Color', 'cmb2' ),
		'desc'    => esc_html__( 'Choose Quote Button Hover color', 'cmb2' ),
		'id'      => 'quote_button_hover_color',
		'type'    => 'colorpicker',
		'default' => '',		
	));
	$cmb_back->add_field( array(
		'name' => esc_html__( 'Select Banner Image', 'back' ),
		'desc' => esc_html__( 'Upload an image or enter a URL for page banner.', 'back' ),
		'id'   => 'banner_image',
		'type' => 'file',
	));
    
    $cmb_back->add_field( array(
		'name'             => esc_html__( 'Banner Hide', 'back' ),
		'desc'             => esc_html__( 'You Can Show or Hide Banner', 'back' ),
		'id'               => 'banner_hide',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	));


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Page Banner Text', 'back' ),
		'desc'    => esc_html__( 'Enter some text in banner', 'back' ),
		'id'      => 'content_banner',
		'type'    => 'textarea_small',
	));

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Show Page Title', 'back' ),
		'desc'             => esc_html__( 'You can show/hide page title', 'back' ),
		'id'               => 'select-title',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	));

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Show Breadcurmbs', 'back' ),
		'desc'             => esc_html__( 'You can show/hide  breadcurmbs here', 'back' ),
		'id'               => 'select-bread',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'back' ),
			'hide' => esc_html__( 'Hide', 'back' ),			
		),
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Top Padding', 'back' ),
		'desc'    => esc_html__( 'example(100px)', 'back' ),
		'default' => esc_attr__( '', 'back' ),
		'id'      => 'banner_top',
		'type'    => 'text_medium',
	) );

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Bottom Padding', 'back' ),
		'desc'    => esc_html__( 'example(100px)', 'back' ),
		'default' => esc_attr__( '', 'back' ),
		'id'      => 'banner_bottom',
		'type'    => 'text_medium',
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Content Top Padding', 'back' ),
		'desc'    => esc_html__( 'example(100px)', 'back' ),
		'default' => esc_attr__( '100px', 'back' ),
		'id'      => 'content_top',
		'type'    => 'text_medium',
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Content Bottom Padding', 'back' ),
		'desc'    => esc_html__( 'example(100px)', 'back' ),
		'default' => esc_attr__( '100px', 'back' ),
		'id'      => 'content_bottom',
		'type'    => 'text_medium',
	));
	
	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Hide Footer', 'back' ),
		'desc'             => esc_html__( 'You can show/hide footer here', 'back' ),
		'id'               => 'hide_footer',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'no' => esc_html__( 'No', 'back' ),
			'yes' => esc_html__( 'Yes', 'back' ),		
		),
	));


	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Hide Footer Widgets', 'back' ),
		'desc'             => esc_html__( 'You can show/hide footer widgets here', 'back' ),
		'id'               => 'hide_foot_widgets',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'no' => esc_html__( 'No', 'back' ),
			'yes' => esc_html__( 'Yes', 'back' ),		
		),
	));


	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Select Footer Width', 'back' ),
		'desc'             => esc_html__( 'Choose your individual header width', 'back' ),
		'id'               => 'footer_width_custom',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'container' => esc_html__( 'Container', 'back' ),
			'full' => esc_html__( 'Container Fluid', 'back' ),
				
		),
	));


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Footer Background Image', 'cmb2' ),
		'desc'    => esc_html__( 'select footer background image', 'cmb2' ),
		'id'      => 'footer_bg_img',
		'type'    => 'file',		
	));

	$cmb_back->add_field( array(
		'name'             => esc_html__( 'Background Position', 'back' ),
		'desc'             => esc_html__( 'choose background position', 'back' ),
		'id'               => 'footer_bg_position',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'center center' => esc_html__( 'Center Center', 'back' ),
			'center top'    =>  esc_html__( 'Center Top', 'back' ),			
			'center bottom' =>  esc_html__( 'Center Bottom', 'back' ),			
			'left top'      =>  esc_html__( 'Left Top', 'back' ),			
			'left bottom'   =>  esc_html__( 'Left Bottom', 'back' ),			
			'right top'     =>  esc_html__( 'Right Top', 'back' ),			
			'right bottom'  =>  esc_html__( 'Right Bottom', 'back' ),			
		),
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Footer Background', 'cmb2' ),
		'desc'    => esc_html__( 'select footer background', 'cmb2' ),
		'id'      => 'footer_bg',
		'type'    => 'colorpicker',
		'default' => '',		
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Footer Logo', 'cmb2' ),
		'desc'    => esc_html__( 'Select footer logo', 'cmb2' ),
		'id'      => 'footer_logo_img',
		'type'    => 'file',		
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Footer Primary Color', 'cmb2' ),
		'desc'    => esc_html__( 'Footer Primary Color', 'cmb2' ),
		'id'      => 'footer_primary_color',
		'type'    => 'colorpicker',
		'default' => '',		
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Footer Text Color', 'cmb2' ),
		'desc'    => esc_html__( 'Footer Text Color', 'cmb2' ),
		'id'      => 'footer_texts_color',
		'type'    => 'colorpicker',
		'default' => '',		
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Copyright Background', 'cmb2' ),
		'desc'    => esc_html__( 'select copyright background', 'cmb2' ),
		'id'      => 'copyright_bg',
		'type'    => 'colorpicker',
		'default' => '',		
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Copyright Text Color', 'cmb2' ),
		'desc'    => esc_html__( 'Select Text Color', 'cmb2' ),
		'id'      => 'copyright_text',
		'type'    => 'colorpicker',
		'default' => '',		
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Copyright Link Color (Hover)', 'cmb2' ),
		'desc'    => esc_html__( 'Select Link Color', 'cmb2' ),
		'id'      => 'copyright_text_hover',
		'type'    => 'colorpicker',
		'default' => '',		
	));

	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Copyright Border Color', 'cmb2' ),
		'desc'    => esc_html__( 'select border color', 'cmb2' ),
		'id'      => 'copyright_border',
		'type'    => 'colorpicker',
		'default' => '',
		'options' => array( 'alpha' => true ),		
	));


	$cmb_back->add_field( array(
		'name'    => esc_html__( 'Copyright Padding', 'cmb2' ),
		'desc'    => esc_html__( 'example(10px 5px)', 'back' ),
		'id'      => 'copyright_padding',
		'type'    => 'text_medium',
		'default' => esc_attr__( '0px', 'back' ),		
	));
}


/**
 * Callback to define the optionss-saved message.
 *
 * @param CMB2  $cmb The CMB2 object.
 * @param array $args {
 *     An array of message arguments
 *
 *     @type bool   $is_options_page Whether current page is this options page.
 *     @type bool   $should_notify   Whether options were saved and we should be notified.
 *     @type bool   $is_updated      Whether options were updated with save (or stayed the same).
 *     @type string $setting         For add_settings_error(), Slug title of the setting to which
 *                                   this error applies.
 *     @type string $code            For add_settings_error(), Slug-name to identify the error.
 *                                   Used as part of 'id' attribute in HTML output.
 *     @type string $message         For add_settings_error(), The formatted message text to display
 *                                   to the user (will be shown inside styled `<div>` and `<p>` tags).
 *                                   Will be 'Settings updated.' if $is_updated is true, else 'Nothing to update.'
 *     @type string $type            For add_settings_error(), Message type, controls HTML class.
 *                                   Accepts 'error', 'updated', '', 'notice-warning', etc.
 *                                   Will be 'updated' if $is_updated is true, else 'notice-warning'.
 * }
 */
function back_options_page_message_callback( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) ) {

		if ( $args['is_updated'] ) {

			// Modify the updated message.
			$args['message'] = sprintf( esc_html__( '%s &mdash; Updated!', 'back' ), $cmb->prop( 'title' ) );
		}

		add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
	}
}

/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function back_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}


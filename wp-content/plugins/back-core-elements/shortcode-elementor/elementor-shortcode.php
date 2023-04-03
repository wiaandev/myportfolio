<?php
define( 'BACKElements__FILE__', __FILE__ );
define( 'BACKElements_PLUGIN_BASE', plugin_basename( BACKElements__FILE__ ) );
define( 'BACKElements_URL', plugins_url( '/', BACKElements__FILE__ ) );
define( 'BACKElements_PATH', plugin_dir_path( BACKElements__FILE__ ) );
define( 'BACKElements_ASSETS_URL', BACKElements_URL . 'includes/assets/' );

require_once( BACKElements_PATH . 'includes/post-type.php' );
require_once( BACKElements_PATH . 'includes/settings.php' );


class backElements_Pro_Elementor_Shortcode{

	function __construct(){
		add_action( 'manage_backelements_pro_posts_custom_column' , array( $this, 'backelements_pro_back_global_templates_columns' ), 10, 2);
		add_filter( 'manage_backelements_pro_posts_columns', array($this,'rselements_pro_custom_edit_global_templates_posts_columns' ));		
	}

	function rselements_pro_custom_edit_global_templates_posts_columns($columns) {		
		$columns['backpro_shortcode_column'] = esc_html__( 'Shortcode', 'back' );
		return $columns;
	}


	function backelements_pro_back_global_templates_columns( $column, $post_id ) {
		switch ( $column ) {
			case 'backpro_shortcode_column' :
			echo '<input type=\'text\' class=\'widefat\' value=\'[SHORTCODE_ELEMENTOR id="'.$post_id.'"]\' readonly="">';
			break;
		}
	}
	
}
new backElements_Pro_Elementor_Shortcode();
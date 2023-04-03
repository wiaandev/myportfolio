<?php 
/**
 *Plugin Name: Back Core Elements
 * Description: Back Core Elements is the most advanced frontend drag & drop page builder addon. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.
 * Plugin URI:  backtheme
 * Version:     1.0.0
 * Author:      backtheme
 * Author URI:  backtheme
 * Text Domain: back-core-elements
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


define( 'BACK_CORE_ELEMENTS_DIR_PATH_PRO', plugin_dir_path( __FILE__ ) );
define( 'BACK_CORE_ELEMENTS_DIR_URL_PRO', plugin_dir_url( __FILE__ ) );
define( 'Back_CORE_ELEMENTS_ASSETS_PRO', trailingslashit( BACK_CORE_ELEMENTS_DIR_URL_PRO . 'assets' ) );

require BACK_CORE_ELEMENTS_DIR_PATH_PRO . 'base.php';
require BACK_CORE_ELEMENTS_DIR_PATH_PRO . 'post-type/post-type.php';
//require BACK_CORE_ELEMENTS_DIR_PATH_PRO . 'shortcode-elementor/elementor-shortcode.php';
require BACK_CORE_ELEMENTS_DIR_PATH_PRO . 'back-core-framework/back-core-framework.php';

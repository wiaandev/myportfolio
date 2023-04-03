<?php
/**
 * Main Elementor Backaddon Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class back_Core_Elementor_Pro_Extension {
	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.4';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'back-core-elements' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_category' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'backaddon_register_plugin_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'backaddon_admin_defualt_css' ] );		
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'backaddon_register_plugin_admin_styles' ] );
		$this->include_files();	
	}


	public function backaddon_register_plugin_styles() {
		$dir = plugin_dir_url(__FILE__);
        wp_enqueue_style( 'headding-title', $dir.'assets/css/headding-title.css' );   
        wp_enqueue_script( 'headding-title', $dir.'assets/js/headding-title.js' , array('jquery'), '201513434', true);   	
    }

    public function backaddon_register_plugin_admin_styles(){
    	$dir = plugin_dir_url(__FILE__);
    	wp_enqueue_style( 'backaddons-admin-pro', $dir.'assets/css/admin/admin.css' );
    	wp_enqueue_style( 'backaddons-admin-floaticon-pro', $dir.'assets/fonts/flaticon.css' );
    } 

    public function backaddon_admin_defualt_css(){
    	$dir = plugin_dir_url(__FILE__);
    	wp_enqueue_style( 'backaddons-admin-pro-style', $dir.'assets/css/admin/style.css' );    	
    }

     public function include_files() {       
        require( __DIR__ . '/inc/back-addon-icons.php' ); 
        require( __DIR__ . '/inc/form.php' );  
        require( __DIR__ . '/inc/helper.php' );  
    }

	public function add_category( $elements_manager ) {
        $elements_manager->add_category(
            'backthemecore_category',
            [
                'title' => esc_html__( 'Back Core Widgets', 'back-core-elements' ),
                'icon' => 'fa fa-smile-o',
            ]
        );
    }

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'back-core-elements' ),
			'<strong>' . esc_html__( 'Back Addon Custom Elementor Addon', 'back-core-elements' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'back-core-elements' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'back-core-elements' ),
			'<strong>' . esc_html__( 'AF Addon Custom Elementor Addon', 'back-core-elements' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'back-core-elements' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'back-core-elements' ),
			'<strong>' . esc_html__( 'Back Addon Custom Elementor Addon', 'back-core-elements' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'back-core-elements' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {	

		require_once( __DIR__ . '/widgets/heading/heading.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Theme_Elementor_Pro_Heading_Widget() );

		require_once( __DIR__ . '/widgets/animated-heading/animated-heading.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_pro_Animated_Heading_Widget() );

		require_once( __DIR__ . '/widgets/services/service-grid.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Services_Grid_Widget() );

		require_once( __DIR__ . '/widgets/portfolio-filter/portfolio-filter-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_pro_portfolio_Grid_Widget() );

		require_once( __DIR__ . '/widgets/portfolio-slider/portfolio-slider-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Portfolio_Slider_Pro_Widget() );

		require_once( __DIR__ . '/widgets/portfolio-grid/portfolio-grid-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Portfolio_pro_Grid_Widget() );

		require_once( __DIR__ . '/widgets/pricing-table/pricing-table.php' );	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_pro_Pricing_Table_Widget() );		

		require_once( __DIR__ . '/widgets/button/button.php' );	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Button_Widget() );

		require_once( __DIR__ . '/widgets/logo-widget/logo.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_pro_Logo_Showcase_Widget() );
		
		require_once( __DIR__ . '/widgets/cf7/contact-cf7.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_pro_bkCF7_Widget() );

		require_once( __DIR__ . '/widgets/back-slider/back-slider-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_banner_Slider_Widget() );

		require_once( __DIR__ . '/widgets/contact-box/contact-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_pro_bkcontactbox_Grid_Widget() );

		require_once( __DIR__ . '/widgets/counter/counter.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_pro_bkCounter_Widget() );

		require_once( __DIR__ . '/widgets/cta/cta.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_pro_CTA_Widget() );

		require_once( __DIR__ . '/widgets/team-member/team-grid-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_pro_Team_Grid_Widget() );

		require_once( __DIR__ . '/widgets/team-member-slider/team-slider-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_Team_Slider_Pro_Widget() );

		require_once( __DIR__ . '/widgets/blog-grid/blog-grid-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \backaddon_Elementor_pro_Blog_Grid_Widget() );

		require_once( __DIR__ . '/widgets/video/video.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Elementor_pro_backvideo_Widget() );

		require_once( __DIR__ . '/widgets/testimonial-slider/testimonail-slider-widget.php' );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Testimonial_Slider_Widget() );
		
		require_once( __DIR__ . '/widgets/blog-slider/blog-slider-widget.php' );	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_Blog_Slider_Widget() );	

		require_once( __DIR__ . '/widgets/tab/tab.php' );	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Backaddon_pro_Tab_Widget() );

		require_once( __DIR__ . '/widgets/portfolio-repeater/portfolio-repeater.php' );	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \back_pro_portfolio__repeater_Showcase_Widget() );	
	
		add_action( 'elementor/elements/categories_registered', [$this, 'add_category'] );
	}
}
back_Core_Elementor_Pro_Extension::instance();
<?php
/**
 * Team custom post type
 * This file is the basic custom post type for use any where in theme.
 * 
 * @author Backtheme
 * @link #
 */
?>
<?php
class back_Elementor_pro_Portfolio{	

	public function __construct() {
		add_action( 'init', array( $this, 'back_portfolio_register_post_type' ) );		
		add_action( 'init', array( $this, 'back_create_portfolio' ) );
	}


	// Register Portfolio Post Type
	function back_portfolio_register_post_type() {
		$labels = array(
			'name'               => esc_html__( 'Portfolio', 'back'),
			'singular_name'      => esc_html__( 'Portfolio', 'back'),
			'add_new'            => esc_html__( 'Add New Portfolio', 'back'),
			'add_new_item'       => esc_html__( 'Add New Portfolio', 'back'),
			'edit_item'          => esc_html__( 'Edit Portfolio', 'back'),
			'new_item'           => esc_html__( 'New Portfolio', 'back'),
			'all_items'          => esc_html__( 'All Portfolio', 'back'),
			'view_item'          => esc_html__( 'View Portfolio', 'back'),
			'search_items'       => esc_html__( 'Search Portfolio', 'back'),
			'not_found'          => esc_html__( 'No Portfolio found', 'back'),
			'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash', 'back'),
			'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'back'),
			'menu_name'          => esc_html__( 'Portfolio', 'back'),
		);

		global $enthor_option;
		$portfolio_slug = (!empty($enthor_option['portfolio_slug']))? $enthor_option['portfolio_slug'] :'portfolios';
		
		$args = array(
			'labels'             => $labels,
			'public'             => true,	
			'show_in_menu'       => true,
			'show_in_admin_bar'  => true,
			'can_export'         => true,
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 20,	
			'rewrite' => 		 array('slug' => $portfolio_slug,'with_front' => false),	
			'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
			'supports'           => array( 'title', 'thumbnail','editor','excerpt' ),		
		);
		register_post_type( 'portfolios', $args );
	}

	function back_create_portfolio() {	
		global $enthor_option;
		$portfolio_slug_cat = (!empty($enthor_option['portfolio_cat_slug']))? $enthor_option['portfolio_cat_slug'] :'portfolio-category';	

		$portfolio_level = (!empty($enthor_option['portfolio_level']))? $enthor_option['portfolio_level'] :'Portfolio Categories';	

		register_taxonomy(
			'portfolio-category',
			'portfolios',
			array(
				'label' => $portfolio_level,			
				'hierarchical' => true,
				'show_admin_column' => true,
				'rewrite' =>  array('slug' => $portfolio_slug_cat,'with_front' => false),
			)
		);
	}
}
new back_Elementor_pro_Portfolio();
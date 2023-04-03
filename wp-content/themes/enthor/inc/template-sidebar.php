<?php
/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */

function enthor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'enthor' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'This is sidebar area for blog post and single post.', 'enthor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Shop', 'enthor' ),
			'id'            => 'sidebar_shop',
			'description'   => esc_html__( 'Sidebar Shop', 'enthor' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	if (class_exists( 'ReduxFramework' )){
		register_sidebar( array(
			'name'          => esc_html__( 'Off Canvas Sidebar', 'enthor' ),
			'id'            => 'sidebarcanvas-1',
			'description'   => esc_html__( 'Off canvas widget area.', 'enthor' ),
			'before_widget' => '<div id="%1$s" class="widget icon-list %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	

	register_sidebar( array(
			'name' => esc_html__( 'Footer One Widget Area', 'enthor' ),
			'id' => 'footer1',
			'description' => esc_html__( 'Footer 1 widget area', 'enthor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 		 				



		 register_sidebar( array(
				'name' => esc_html__( 'Footer Two Widget Area', 'enthor' ),
				'id' => 'footer2',
				'description' => esc_html__( 'Footer 2 widget area', 'enthor' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="footer-title">',
				'after_title' => '</h3>'
		) ); 
	
	 register_sidebar( array(
			'name' => esc_html__( 'Footer Three Widget Area', 'enthor' ),
			'id' => 'footer3',
			'description' => esc_html__( 'Footer 3 widget area', 'enthor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Footer Four Widget Area', 'enthor' ),
			'id' => 'footer4',
			'description' => esc_html__( 'Footer 4 widget area', 'enthor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) );

	if (class_exists( 'ReduxFramework' )){
		register_sidebar( array(
				'name' => esc_html__( 'Copyright Right', 'enthor' ),
				'id' => 'copy_right',
				'description' => esc_html__( 'Copyright Right widget area', 'enthor' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="footer-title">',
				'after_title' => '</h3>'
		) ); 
	}
}

add_action( 'widgets_init', 'enthor_widgets_init' );
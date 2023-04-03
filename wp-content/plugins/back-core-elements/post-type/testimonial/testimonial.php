<?php
class back_Testimonial_pro_Post_Type{
	public function __construct() {
		add_action( 'init', array( $this, 'back_testimonial_register_post_type' ) );		
		add_action( 'init', array( $this, 'back_testimoanl_create_taxonomy' ) );		
		add_action( 'admin_menu', array( $this, 'back_testimonials_meta_box' ) );		
		add_action( 'save_post', array( $this, 'back_save_testimonials_meta' ) );
	}

	function back_testimonial_register_post_type() {
		$labels = array(
			'name'               => esc_html__( 'Testimonial', 'back'),
			'singular_name'      => esc_html__( 'Testimonial', 'back'),
			'add_new'            => esc_html__( 'Add New Testimonial', 'back'),
			'add_new_item'       => esc_html__( 'Add New Testimonial', 'back'),
			'edit_item'          => esc_html__( 'Edit Testimonial', 'back'),
			'new_item'           => esc_html__( 'New Testimonial', 'back'),
			'all_items'          => esc_html__( 'All Testimonial', 'back'),
			'view_item'          => esc_html__( 'View Testimonial', 'back'),
			'search_items'       => esc_html__( 'Search Testimonials', 'back'),
			'not_found'          => esc_html__( 'No Testimonials found', 'back'),
			'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash', 'back'),
			'parent_item_colon'  => esc_html__( 'Parent Testimonial:', 'back'),
			'featured_image'     => esc_html__('Author Image'),
			'set_featured_image' => esc_html__('Upload Author Image'),
			'menu_name'          => esc_html__( 'Testimonials', 'back'),
		);	
		
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_in_menu'       => true,
			'show_in_admin_bar'  => true,
			'can_export'         => true,
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 20,		
			'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
			'supports'           => array( 'title', 'thumbnail', 'editor' )
		);
		register_post_type( 'testimonials', $args );
	}

	function back_testimoanl_create_taxonomy() {
		
		register_taxonomy(
			'testimonial-category',
			'testimonials',
			array(
				'label'             => esc_html__( 'Testimonial Categories','back'),			
				'hierarchical'      => true,
				'show_admin_column' => true,		
			)
		);
	}

	//registering metabox

	function back_testimonials_meta_box() {
		add_meta_box(
			'testimonial_info_meta',
			esc_html__( 'Author Info', 'back' ),
			array( $this, 'back_testimonials_meta_callback' ),
			array( 'testimonials', 'advanced', 'high', 1 )
		);		
	}

	// testimonial info callback
	function back_testimonials_meta_callback( $testimonial_info ) {
		wp_nonce_field( 'testimonial_social_metabox', 'testimonial_social_metabox_nonce' ); ?>
		<div class="back-admin-input"><label for="designation"><?php esc_html_e( 'Designation', 'cl-testimonial' ) ?></label>
		<?php $designation = get_post_meta( $testimonial_info->ID, 'designation', true ); ?>

		<input type="text" name="designation" id="designation" class="designation" value="<?php echo esc_html($designation); ?>"/>
		</div>

	    <div class="back-admin-input">
	    <label for="ratings"><?php esc_html_e( 'Select Ratings', 'cl-testimonial') ?></label>
        <?php 
	      	$ratings_cl = get_post_meta( $testimonial_info->ID, 'ratings', true ); 
		  	if($ratings_cl !='' ){
			  	$rating_style = $ratings_cl;
		  	}
		  	else{
			   $rating_style = 'Select Ratings';
		  	}
	    ?>          
	    <select name="ratings">
			<option selected="selected" value="<?php echo esc_html($rating_style);?>"><?php echo esc_html($rating_style);?></option>
			<option value="Select Ratings"><?php echo esc_html__('Select Ratings','back');?></option>
			<option value="1"><?php echo esc_html__('1','back');?></option>
			<option value="1.5"><?php echo esc_html__('1.5','back');?></option>
			<option value="2"><?php echo esc_html__('2','back');?></option>
			<option value="2.5"><?php echo esc_html__('2.5','back');?></option>
			<option value="3"><?php echo esc_html__('2','back');?></option>
			<option value="3.5"><?php echo esc_html__('3.5','back');?></option>
			<option value="4"><?php echo esc_html__('4','back');?></option>
			<option value="4.5"><?php echo esc_html__('4.5','back');?></option>
			<option value="5"><?php echo esc_html__('5','back');?></option>
	    </select>	       
	   </div>
	<?php }

	/*--------------------------------------------------------------
	 *			Save testimonial social meta
	*-------------------------------------------------------------*/
	function back_save_testimonials_meta( $post_id ) {
		if ( ! isset( $_POST['testimonial_social_metabox_nonce'] ) ) {
			return $post_id;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		if ( 'clt_testimonials' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		 if( isset ($_POST[ 'designation' ] ) ) {
	        update_post_meta( $post_id, 'designation', sanitize_text_field($_POST[ 'designation' ] ));
	    }
	  	if( isset( $_POST[ 'ratings' ] ) ) {
	        update_post_meta( $post_id, 'ratings', sanitize_text_field($_POST[ 'ratings' ] ));
	    }
	}

}
new back_Testimonial_pro_Post_Type();
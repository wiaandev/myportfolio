<?php
/**
 * Elementor Team Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class back_Elementor_pro_Team_Grid_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve team widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'backteam';
	}		

	/**
	 * Get widget title.
	 *
	 * Retrieve Back Team widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Back Team Grid', 'back' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Back Team widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-network';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Back Team widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
        return [ 'backthemecore_category' ];
    }

	/**
	 * Register Back Team widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'General Settings', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'team_grid_style',
			[
				'label'   => esc_html__( 'Select Style', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',				
				'options' => [
					'style1' => esc_html__('Style 1', 'back'),
				],
				'separator' => 'before',										
			]
		);

		$this->add_control(
			'team_category',
			[
				'label'   => esc_html__( 'Category', 'back' ),
				'type'    => Controls_Manager::SELECT2,	
				'default' => 0,			
				'options' => $this->getCategories(),
				'multiple' => true,	
				'separator' => 'before',					
			]
		);


		$this->add_control(
			'per_page',
			[
				'label' => esc_html__( 'Team Show Per Page', 'back' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'example 3', 'back' ),
				'separator' => 'before',				
			]
		);
	
		$this->add_control(
			'team_columns',
			[
				'label'   => esc_html__( 'Columns', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 4,			
				'options' => [
					'6' => esc_html__( '2 Column', 'back' ),
					'4' => esc_html__( '3 Column', 'back' ),
					'3' => esc_html__( '4 Column', 'back' ),
					'2' => esc_html__( '6 Column', 'back' ),
					'12' => esc_html__( '1 Column', 'back' ),					
				],
				'separator' => 'before',			
			]
		);


		$this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'separator' => 'before',
            ]
        ); 

        $this->add_control(
			'image_spacing_custom',
			[
				'label'      => esc_html__( 'Item Bottom Gap', 'back' ),
				'type'       => Controls_Manager::SLIDER,
				'show_label' => true,
				'separator'  => 'before',
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 20,
				],				

				'selectors' => [
                    '{{WRAPPER}} .back-team-grid.back-team .single-team .team-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
			]
		);  
				
		$this->end_controls_section();

		$this->start_controls_section(
			'section_general_style',
			[
				'label' => esc_html__( 'General Style Here', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title Style Here', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img .team-info .name a' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img .team-info .name a' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-team .single-team .team-img .team-info .name a',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_designation_style',
			[
				'label' => esc_html__( 'Designation Style Here', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
		    'designation_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-team .single-team .team-img .team-info .desgnation' => 'color: {{VALUE}};',

		        ],                
		    ]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desgnation_typography',
				'label' => esc_html__( 'Typography', 'back' ),
				'selector' => 
                    '{{WRAPPER}} .back-team .single-team .team-img .team-info .desgnation',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_soial_style',
			[
				'label' => esc_html__( 'Social Share Style Here', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
		    'link_share__tab',
		    [
		        'label' => esc_html__( 'Normal', 'back' ),
		    ]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'social_bg_style',
				'label' => esc_html__( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-team .single-team .team-img .social-links li a',
			]
		);

		$this->add_control(
		    'social_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-team .single-team .team-img .social-links li a' => 'color: {{VALUE}};',

		        ],                
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'social_border',
		        'selector' => '{{WRAPPER}} .back-team .single-team .team-img .social-links li a',
		    ]
		);

		$this->end_controls_tab();


		$this->start_controls_tab(
		    'link_share__tab_hover',
		    [
		        'label' => esc_html__( 'Hover', 'back' ),
		    ]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'social_bg_style_hover',
				'label' => esc_html__( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-team .single-team .team-img .social-links li a:hover',
			]
		);

		$this->add_control(
		    'social_color_hover',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-team .single-team .team-img .social-links li a:hover' => 'color: {{VALUE}};',

		        ],                
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'social_border_hover',
		        'selector' => '{{WRAPPER}} .back-team .single-team .team-img .social-links li a:hover',
		    ]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Render Back Team widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display(); 	

		if('style1' == $settings['team_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style1.php";
		}		 	
	}

	public function getCategories(){
        $cat_list = [];
         	if ( post_type_exists( 'teams' ) ) { 
          	$terms = get_terms( array(
             	'taxonomy'    => 'team-category',
             	'hide_empty'  => true            
         	) );           
         
  
	        foreach($terms as $post) {
	        	$cat_list[$post->slug]  = [$post->name];
	        }
    	}  
        return $cat_list;
    }
}
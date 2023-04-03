<?php
/**
 * Elementor back Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class back_Portfolio_pro_Grid_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve back widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'backportfolio';
	}		

	/**
	 * Get widget title.
	 *
	 * Retrieve back widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Back Portfolio Grid', 'back' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve back widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the back widget belongs to.
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
	 * Register back widget controls.
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
				'label' => esc_html__( 'Content Settings Here', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'portfolio_grid_style',
			[
				'label'   => esc_html__( 'Select Style', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',				
				'options' => [
					'1' => 'Style 1',
					'2' => 'Style 2',
					'3' => 'Style 3',				
					'4' => 'Style 4',				
					'5' => 'Style 5',								
					'6' => 'List Style',								
					'7' => 'Style 7',															
				],											
			]
		);


		$this->add_control(
			'portfolio_category',
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
				'label' => esc_html__( 'Project Show Per Page', 'back' ),
				'type' => Controls_Manager::TEXT,
				'default' => -1,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'portfolio_grid_order',
			[
				'label'   => esc_html__( 'Select Order', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',				
				'options' => [
					'ASC' => 'ASC',
					'DESC' => 'DESC',								
				],											
			]
		);
	
		$this->add_control(
			'portfolio_columns',
			[
				'label'   => esc_html__( 'Columns', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '4',				
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

		$this->add_control(
            'exce_content_show_hide',
            [
                'label' => esc_html__( 'Excerpt Show/Hide', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'back' ),
                    'no' => esc_html__( 'No', 'back' ),
                ],                
                'separator' => 'before',
                'condition' => [
                    'portfolio_grid_style' => ['6'],
                ],
            ]
        );

		$this->add_control(
			'excerpt_word_show',
			[
				'label' => esc_html__( 'Show Excerpt Limit', 'back' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '20', 'back' ),
				'separator' => 'before',
				'condition' => [
                    'exce_content_show_hide' => 'yes',
                ],
                'condition' => [
                    'portfolio_grid_style' => ['6'],
                ],
			]
		);


		$this->add_control(
			'port_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'back' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'View Details',
				'placeholder' => esc_html__( 'Button Text', 'back' ),
				'separator' => 'before',
				'condition' => [
				    'portfolio_grid_style' => ['6', '7'],
				],
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


        $this->add_responsive_control(
			'image_spacing_custom',
			[
				'label' => esc_html__( 'Item Bottom Gap', 'back' ),
				'type' => Controls_Manager::SLIDER,
				'show_label' => true,
				'separator' => 'before',
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 20,
				],			

				'selectors' => [
                    '{{WRAPPER}} .single-case-studies' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
			]
		);   
				
		$this->end_controls_section();


		$this->start_controls_section(
			'general_style_here',
			[
				'label' => esc_html__( 'Default Style Here', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
				    'portfolio_grid_style!' => '2',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background_style',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .inner-case-studies .case-img:before, {{WRAPPER}} .back-portfolio-grid-style4 .single-case-studies .inner-case-studies .case-img:before, {{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .inner-case-studies .case-img:before',
				'condition' => [
				    'portfolio_grid_style!' => ['1', '2'],
				],
			]
		);

		$this->add_control(
		    'portfoli_overly_color',
		    [
		        'label' => esc_html__( 'Background Color (Overlay)', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-case-studies .single-case-studies .case-img::after' => 'background-color: {{VALUE}}'
		        ],
		        'condition' => [
		            'portfolio_grid_style' => '1',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'poort_border',
		        'selector' => '{{WRAPPER}} .back-portfolio-grid-style7 .back-port-meta',
		        'condition' => [
		            'portfolio_grid_style' => '7',
		        ]
		    ]
		);

		$this->end_controls_section();
		
        $this->start_controls_section(
			'title_style_here',
			[
				'label' => esc_html__( 'Title Style Here', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title a, {{WRAPPER}} .back-portfolio-grid-style2 .single-case-studies .case-content .case-title a, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .case-content .case-title a, {{WRAPPER}} .back-portfolio-grid-style4 .single-case-studies .case-content .case-title a, {{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .case-content .case-title a, {{WRAPPER}} .back-portfolio-grid-style7 .single-case-studies .case-content .back-port-title a, {{WRAPPER}}  .back-portfolio-grid-style6 .single-case-studies .inner-case-studies .case-content .back-port-title a' => 'color: {{VALUE}};',                   
                ],                
            ]
        );

        $this->add_control(
            'title_bg_hover_style',
            [
                'label' => esc_html__( 'Background Hover Title', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-portfolio-grid-style7 .single-case-studies:hover .back-port-btn' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'portfolio_grid_style' => ['7'],
                ]
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Hover Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title a:hover, {{WRAPPER}} .back-portfolio-grid-style2 .single-case-studies .case-content .case-title a:hover, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .case-content .case-title a:hover, {{WRAPPER}} .back-portfolio-grid-style4 .single-case-studies .case-content .case-title a:hover, {{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .case-content .case-title a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]            
        );       

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title, {{WRAPPER}} .back-portfolio-grid-style2 .single-case-studies .case-content .case-title, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .case-content .case-title, {{WRAPPER}} .back-portfolio-grid-style4 .single-case-studies .case-content .case-title, {{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .case-content .case-title',                    
			]
		);
 
        $this->end_controls_section();

        $this->start_controls_section(
			'category_style_here',
			[
				'label' => esc_html__( 'Category Style Here', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'cate_bg_style',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-portfolio-grid-style2 .single-case-studies .case-content .case-subtitle a',
				'condition' => [
				    'portfolio_grid_style' => ['2'],
				],
			]
		);

        $this->add_control(
            'cate_color',
            [
                'label' => esc_html__( 'Category Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style2 .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style4 .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style7 .back-port-meta .back-cate a, {{WRAPPER}} .back-portfolio-grid-style7 .back-port-meta, {{WRAPPER}} .back-portfolio-grid-style6 .single-case-studies .inner-case-studies .case-content .back-cate a' => 'color: {{VALUE}};',                   
                ],                
            ]
        );



        $this->add_control(
            'cate_color_hover',
            [
                'label' => esc_html__( 'Category Hover Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-subtitle a:hover, {{WRAPPER}} .back-portfolio-grid-style2 .single-case-studies .case-content .case-subtitle a:hover, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .case-content .case-subtitle a:hover, {{WRAPPER}} .back-portfolio-grid-style4 .single-case-studies .case-content .case-subtitle a:hover, {{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .case-content .case-subtitle a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]            
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => esc_html__( 'Category Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style2 .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style4 .single-case-studies .case-content .case-subtitle a, {{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .case-content .case-subtitle a',                    
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'link_button_here',
			[
				'label' => esc_html__( 'Button Style Here', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
				    'portfolio_grid_style' => ['3', '5', '6'],
				],
			]
		);

        $this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
		    'link_button__tab',
		    [
		        'label' => esc_html__( 'Normal', 'back' ),
		    ]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btnlink_style',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .inner-case-studies .case-img .back__icon, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .inner-case-studies .case-img .back__icon, {{WRAPPER}} .back-portfolio-grid-style6 .single-case-studies .inner-case-studies .case-content .back-port-btn a',
			]
		);

		$this->add_control(
		    'link_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .inner-case-studies .case-img .back__icon, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .inner-case-studies .case-img .back__icon, {{WRAPPER}} .back-portfolio-grid-style6 .single-case-studies .inner-case-studies .case-content .back-port-btn a' => 'color: {{VALUE}};',                   
		        ],                
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_border',
		        'selector' => '{{WRAPPER}} .back-portfolio-grid-style6 .single-case-studies .inner-case-studies .case-content .back-port-btn a',
		    ]
		);

		$this->end_controls_tab();


		$this->start_controls_tab(
		    'link_button__tab_hover',
		    [
		        'label' => esc_html__( 'Hover', 'back' ),
		    ]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'btnlink_style_hover',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .inner-case-studies .case-img .back__icon:hover, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .inner-case-studies .case-img .back__icon:hover, {{WRAPPER}} .back-portfolio-grid-style6 .single-case-studies .inner-case-studies .case-content .back-port-btn a:hover',
			]
		);

		$this->add_control(
		    'link_color_hover',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-portfolio-grid-style5 .single-case-studies .inner-case-studies .case-img .back__icon:hover, {{WRAPPER}} .back-portfolio-grid-style3 .single-case-studies .inner-case-studies .case-img .back__icon:hover, {{WRAPPER}} .back-portfolio-grid-style6 .single-case-studies .inner-case-studies .case-content .back-port-btn a:hover' => 'color: {{VALUE}};',                   
		        ],                
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_border_hover',
		        'selector' => '{{WRAPPER}} .back-portfolio-grid-style6 .single-case-studies .inner-case-studies .case-content .back-port-btn a:hover',
		    ]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();
	}

	/**
	 * Render back widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

	$settings = $this->get_settings_for_display();

	?>
		

    <?php
    
		if('1' == $settings['portfolio_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style1.php";
		}

		if('2' == $settings['portfolio_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style2.php";
		}

		if('3' == $settings['portfolio_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style3.php";
		}

		if('4' == $settings['portfolio_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style4.php";
		}

		if('5' == $settings['portfolio_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style5.php";
		}

		if('6' == $settings['portfolio_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style6.php";
		}
		if('7' == $settings['portfolio_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style7.php";
		}
		if('8' == $settings['portfolio_grid_style']){
			require_once plugin_dir_path(__FILE__)."/style8.php";
		}
	?>
			
	<?php	

	}
	public function getCategories(){
        $cat_list = [];
         	if ( post_type_exists( 'portfolios' ) ) { 
          	$terms = get_terms( array(
             	'taxonomy'    => 'portfolio-category',
             	'hide_empty'  => true            
         	) );           
         
  
	        foreach($terms as $post) {
	        	$cat_list[$post->slug]  = [$post->name];
	        }
    	}  
        return $cat_list;
    }
}
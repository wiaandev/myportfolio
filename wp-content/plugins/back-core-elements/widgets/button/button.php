<?php
/**
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

defined( 'ABSPATH' ) || die();

class back_Button_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'back-button';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve counter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Back Button', 'back' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-menu';
	}

	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_categories() {
        return [ 'backthemecore_category' ];
    }

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'button' ];
	}

	/**
	 * Register counter widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Content', 'back' ),
			]
		);

		$this->add_control(
			'button_style',
			[
				'label'   => esc_html__( 'Select Button Style', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [					
					'style1' => esc_html__( 'Style 1', 'back'),
					'style2' => esc_html__( 'Style 2', 'back'),
				],
			]
		);

		
		$this->add_control(
			'btn_text',
			[
				'label'       => esc_html__( 'Button Text', 'back' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'Sample',
				'placeholder' => esc_html__( 'Button Text', 'back' ),
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label'       => esc_html__( ' Button Link', 'back' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,						
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'back' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'back' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'back' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'back' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'back' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .back-btn' => 'text-align: {{VALUE}}'
                ]
            ]
        );

		$this->add_control(
            'icon',
            [
				'label' => esc_html__( 'Icon', 'back' ),
				'type'  => Controls_Manager::HEADING,               
            ]
        );

		$this->add_control(
            'show_icon',
            [
				'label'        => esc_html__( 'Show Icon', 'back' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'back' ),
				'label_off'    => esc_html__( 'Hide', 'back' ),
				'return_value' => 'yes',
				'default'      => 'yes',
            ]
        );

		$this->add_control(
		    'btn_icon_spacing',
		    [
		        'label' => esc_html__( 'Icon Spacing', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 10
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .back-btn i' => 'margin-left: {{SIZE}}{{UNIT}};',		            
		        ],
		        'condition' => [
					'show_icon' => 'yes',
				],	
		    ]
		);		
		
		$this->end_controls_section();	


		$this->start_controls_section(
		    '_section_style_button',
		    [
		        'label' => esc_html__( 'Button', 'back' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'back' ),
            ]
        ); 

		$this->add_control(
		    'btn_text_color',
		    [
		        'label' => esc_html__( 'Text Color', 'back' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .back-view-btn a, {{WRAPPER}} .back-btn a' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
		    'link_padding',
		    [
		        'label' => esc_html__( 'Padding', 'back' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'btn_typography',
		        'selector' => '{{WRAPPER}} .back-view-btn a, {{WRAPPER}} .back-btn a',
		    ]
		);

		$this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'background_normal',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-btn a',
			]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_border',
		        'selector' => '{{WRAPPER}} .back-btn a',
		    ]
		);

		$this->add_control(
		    'button_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'back' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'button_box_shadow',
		        'selector' => '{{WRAPPER}} .back-btn a',
		    ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'back' ),
            ]
        ); 

		$this->add_control(
		    'btn_text_hover_color',
		    [
		        'label' => esc_html__( 'Text Color', 'back' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .back-view-btn a, {{WRAPPER}} .back-btn a:hover' => 'color: {{VALUE}};',
		        ],
		    ]
		);


		$this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-btn a:hover',
			]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'button_hover_border',
		        'selector' => '{{WRAPPER}} .back-btn a:hover',
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'button_hover_box_shadow',
		        'selector' => '{{WRAPPER}} .back-btn a:hover',
		    ]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Render counter widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	/**
	 * Render counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {	
	
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'btn_text', 'basic' );
        $this->add_render_attribute( 'btn_text', 'class', 'btn_text' );	

	?>		
		<div class="back-btn">
			<?php $target = $settings['btn_link']['is_external'] ? 'target=_blank' : '';?>
			<a class="back-btn readon" href="<?php echo esc_url($settings['btn_link']['url']);?>" <?php echo esc_attr($target);?>>				
				<span <?php echo wp_kses_post($this->print_render_attribute_string('btn_text'));?>><?php echo esc_html($settings['btn_text']);?></span>
				<?php if(!empty($settings['show_icon'])) : ?>
					<?php if(($settings['button_style'] == 'style2') ){ ?>
						<i class="ri-arrow-right-up-line"></i>
					<?php } else { ?>
					<i class="ri-send-plane-fill"></i>
					<?php }?>
				<?php endif; ?>
			</a>
		</div>   
	<?php 
	}
}
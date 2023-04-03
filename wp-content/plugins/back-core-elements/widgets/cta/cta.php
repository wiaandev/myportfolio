<?php
/**
 * Elementor CTA Widget.
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

class back_pro_CTA_Widget extends \Elementor\Widget_Base {

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
		return 'back-cta';
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
		return esc_html__( 'Back Cta', 'back' );
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
		return 'glyph-icon flaticon-error';
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
			'section_cta',
			[
				'label' => esc_html__( 'CTA Content', 'back' ),
			]
		);				

		$this->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'back' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

		$this->add_control(
			'cta_title',
			[
				'label' => esc_html__( 'CTA Title', 'back' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('Default Call To Action', 'back'),
				'placeholder' => esc_html__( 'Title', 'back' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'cta_link',
			[
				'label' => esc_html__( 'Link', 'back' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,						
			]
		);
		
		$this->add_control(
			'cta_desc',
			[
				'label' => esc_html__( 'CTA Description', 'back' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('With thousands of Flash Components, Files and Templates, Star & Shield is the largest library of stock Flash online. Starting at just $2 and by a huge community.', 'back'),
				'placeholder' => esc_html__( 'Description', 'back' ),
				'separator' => 'before',
			]
		);


		$this->add_control(
            'button',
            [
                'label' => esc_html__( 'Button', 'back' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

		
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'back' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('View More', 'back'),
				'placeholder' => esc_html__( 'Button Text', 'back' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( ' Button Link', 'back' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,						
			]
		);
		
		$this->end_controls_section();


		$this->start_controls_section(
		    '_section_style_cta',
		    [
		        'label' => esc_html__( 'CTA', 'back' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
			'cta_full_width',
			[
		        'label' => esc_html__( 'Full Width ', 'back' ),
		        'type'    => Controls_Manager::SELECT,
		        'default' => 'flex',
		        'options' => [
		            'block' => esc_html__( 'Enable', 'back' ),
                    'flex' => esc_html__( 'Disable', 'back' ),
		        ],
                'selectors' => [
                    '{{WRAPPER}} .back-cta' => 'display: {{VALUE}};',
                ],
		    ]
		);

		$this->add_responsive_control(
            'cta_top_position',
            [
                'label' => esc_html__( 'Align Items', 'back' ),
                'type'    => Controls_Manager::SELECT,
		        'default' => '',
		        'options' => [
		            'center' => esc_html__( 'Center', 'back' ),
                    'start' => esc_html__( 'Start', 'back' ),
                    'baseline' => esc_html__( 'Baseline', 'back' ),
                    'unset' => esc_html__( 'Unset
                    	', 'back' ),
		        ],
                'selectors' => [
                    '{{WRAPPER}} .back-cta' => 'align-items: {{VALUE}};',
                ],
            ]
        );

		$this->add_responsive_control(
            'cta_top_space_between',
            [
                'label' => esc_html__( 'Justify Content', 'back' ),
                'type'    => Controls_Manager::SELECT,
		        'default' => '',
		        'options' => [
		            'default' => esc_html__( 'Default', 'back' ),
		            'space-between' => esc_html__( 'justify-content', 'back' ),
		        ],
                'selectors' => [
                    '{{WRAPPER}} .back-cta' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_cta' );

		$this->start_controls_tab(
            'cta_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'back' ),
            ]
        ); 

		$this->add_responsive_control(
            'cta_padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'cta_margin',
            [
                'label' => esc_html__( 'Margin', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-cta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cta_border',
                'selector' => '{{WRAPPER}} .back-cta',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cta_box_shadow',
                'selector' => '{{WRAPPER}} .back-cta',
            ]
        ); 

        $this->add_responsive_control(
            'cta_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .back-cta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
                ],               
            ]
        );

        $this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'cta_bg_color',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-cta',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
            'cta_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'back' ),
            ]
        ); 


        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'cta_hover_box_shadow',
                'selector' => '{{WRAPPER}} .back-cta:hover',
            ]
        ); 

		$this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'cta_hover_bg_color',
				'label' => esc_html__( 'Hover Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-cta:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


		$this->start_controls_section(
		    '_section_style_content',
		    [
		        'label' => esc_html__( 'Content', 'back' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'content_width',
		    [
		        'label' => esc_html__( 'Width', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-cta .cta-content' => 'width: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
            'content_position',
            [
                'label' => esc_html__( 'Position', 'back' ),
                'type' => Controls_Manager::SELECT,
				'default' => '-1',
                'options' => [
                    '-1' => esc_html__( 'Left', 'back'),
					'15' => esc_html__( 'Right', 'back'),
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .back-cta .cta-content' => 'order: {{VALUE}};'
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'content_align',
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
                    '{{WRAPPER}} .back-cta .cta-content' => 'text-align: {{VALUE}}'
                ]
            ]
        );

		$this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-cta .cta-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__( 'Margin', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-cta .cta-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'selector' => '{{WRAPPER}} .back-cta .cta-content',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_box_shadow',
                'selector' => '{{WRAPPER}} .back-cta .cta-content',
            ]
        ); 

        $this->add_responsive_control(
            'content_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .back-cta .cta-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',           
                ],               
            ]
        );        

        $this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'content_bg_color',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-cta .cta-content',
			]
		);

        
        $this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'content_hover_bg_color',
				'label' => esc_html__( 'Background Hover Color', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-cta:hover .cta-content',
			]
		);

		$this->add_control(
            'title_style',
            [
                'label' => esc_html__( 'Title Style', 'back' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title HTML Tag', 'back' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => esc_html__( 'H1', 'back' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => esc_html__( 'H2', 'back' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => esc_html__( 'H3', 'back' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => esc_html__( 'H4', 'back' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => esc_html__( 'H5', 'back' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => esc_html__( 'H6', 'back' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h3',
                'toggle' => false,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}}  .cta-title .title',
                'separator'   => 'before',
            ]
        );

        $this->add_responsive_control(
		    'title_gap',
		    [
		        'label' => esc_html__( 'Title Gap', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .cta-title .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'title_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .cta-title .title' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'title_hover_color',
		    [
		        'label' => esc_html__( 'Hover Color', 'back' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .back-cta:hover .cta-title .title' => 'color: {{VALUE}};',
		        ],
		    ]
		);
		
		$this->add_control(
            'desc_style',
            [
                'label' => esc_html__( 'Description Style', 'back' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}}  .cta-text .desc',
                'separator'   => 'before',
            ]
        );

        $this->add_responsive_control(
		    'desc_gap',
		    [
		        'label' => esc_html__( 'Description Gap', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .cta-text .desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'desc_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .cta-text .desc' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'desc_hover_color',
		    [
		        'label' => esc_html__( 'Hover Color', 'back' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .back-cta:hover .cta-text .desc' => 'color: {{VALUE}};',
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

		$this->add_control(
            'btn_style',
            [
                'label' => esc_html__( 'Button Style', 'back' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
		    'btn_width',
		    [
		        'label' => esc_html__( 'Width', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-cta .back-btn' => 'width: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_responsive_control(
            'btn_position',
            [
                'label' => esc_html__( 'Position', 'back' ),
                'type' => Controls_Manager::SELECT,
				'default' => '14',
                'options' => [
                    '-2' => esc_html__( 'Left', 'back'),
					'14' => esc_html__( 'Right', 'back'),
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .back-cta .back-btn' => 'order: {{VALUE}};'
                ],
				'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'btn_align',
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
                    '{{WRAPPER}} .back-cta .back-btn' => 'text-align: {{VALUE}}'
                ]
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
		            '{{WRAPPER}} .back-btn a' => 'color: {{VALUE}};',
		        ],
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

		$this->add_control(
            'btn_opacity',
            [
                'label' => esc_html__( 'Opacity', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-btn a' => 'opacity: {{SIZE}};',
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

		$this->add_responsive_control(
		    'link_margin',
		    [
		        'label' => esc_html__( 'Margin', 'back' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'btn_typography',
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
		            '{{WRAPPER}} .back-cta .back-btn a:hover' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'back' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .back-cta .back-btn a:hover',
			]
		);

		$this->add_control(
            'btn_hover_opacity',
            [
                'label' => esc_html__( 'Opacity', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-btn:hover a' => 'opacity: {{SIZE}};',
                ],
            ]
        );

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
                'name'     => 'button_hover_border',
                'selector' => '{{WRAPPER}} .back-cta .back-btn a:hover',
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
                'name'     => 'button_hover_box_shadow',
                'selector' => '{{WRAPPER}} .back-cta .back-btn a:hover',
		    ]
		);

		$this->add_control(
            'hover_animation',
            [
                'label' => esc_html__( 'Hover Animation', 'back' ),
                'type' => Controls_Manager::HOVER_ANIMATION,
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

            $this->add_inline_editing_attributes( 'cta_title', 'basic' );
            $this->add_render_attribute( 'cta_title', 'class', 'title' );

            $this->add_inline_editing_attributes( 'cta_desc', 'basic' );
            $this->add_render_attribute( 'cta_desc', 'class', 'desc' ); 

            $this->add_inline_editing_attributes( 'btn_text', 'basic' );
            $this->add_render_attribute( 'btn_text', 'class', 'btn_text' ); 
        ?>
		<div class="back-cta">
			<div class="cta-content">
				<?php if(!empty($settings['cta_title'])):?>
			        <div class="cta-title">
			        	<?php $target = $settings['cta_link']['is_external'] ? 'target=_blank' : '';?>

			            <<?php echo esc_attr($settings['title_tag']);?> class="title"> 
			            	<a <?php echo wp_kses_post($this->print_render_attribute_string('cta_title'));?> href="<?php echo esc_url($settings['cta_link']['url']);?>" <?php echo esc_attr($target);?>>				
			            		<?php echo wp_kses_post ($settings['cta_title']);?>
			            	</a>

			            </<?php echo esc_attr($settings['title_tag']);?>>

			        </div>
				<?php endif;?>
				<?php if(!empty($settings['cta_desc'])):?>
			        <div class="cta-text">
			            <p <?php echo wp_kses_post($this->print_render_attribute_string('cta_desc'));?>> <?php echo wp_kses_post ($settings['cta_desc']);?></p>
			        </div>
				<?php endif;?>
			</div>

            <?php if(!empty($settings['btn_text'])): ?>
			
    			<div class="back-btn">

    				<?php $target = $settings['btn_link']['is_external'] ? 'target=_blank' : '';?>

    				<a class="readon elementor-animation-<?php echo esc_html($settings['hover_animation']);?>" href="<?php echo esc_url($settings['btn_link']['url']);?>" <?php echo esc_attr($target);?>>				
    					<span <?php echo wp_kses_post($this->print_render_attribute_string('btn_text'));?>><?php echo esc_html($settings['btn_text']);?></span>
    				</a>

    			</div>
            <?php endif; ?>    

		</div>   
	<?php 
	}
}
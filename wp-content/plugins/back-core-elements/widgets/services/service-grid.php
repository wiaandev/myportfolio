<?php
/**
 *
 * @since 1.0.0
 */
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

defined( 'ABSPATH' ) || die();

class back_Services_Grid_Widget extends \Elementor\Widget_Base {

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
		return 'back-service-grid-boxes';
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
		return esc_html__( 'Back Services Grid', 'back' );
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
		return 'glyph-icon flaticon-support';
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
	 * Register services widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_services',
			[
				'label' => esc_html__( 'Services Global', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'services_style',
			[
				'label'   => esc_html__( 'Select Services Style', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [					
					'style1' => esc_html__( 'Style 1', 'back'),
				],
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
                    '{{WRAPPER}} .back-addon-services .services-part' => 'text-align: {{VALUE}}'
                ],
				'separator' => 'before',
            ]
        );

        $this->add_control(
        	'hover__shape_enable',
        	[
        		'label'   => esc_html__( 'Shape Enable / Disable (Hover)', 'back' ),
        		'type'    => Controls_Manager::SELECT,
        		'default' => 'shape_disable',
        		'options' => [					
        			'shape_enable' => esc_html__( 'Enable', 'back'),
        			'shape_disable' => esc_html__( 'Disable', 'back'),
        		],
        	]
        );
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'shape_bg_color',
                'label' => esc_html__( 'Background Color', 'back' ),
                'types' => [ 'classic', 'gradient' ],
                'condition' => [
		            'hover__shape_enable' => 'shape_enable',
		        ],
                'selector' => '{{WRAPPER}} .back-addon-services.shape_enable:before'
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon / Image', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label'   => esc_html__( 'Select Icon Type', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'icon',			
				'options' => [					
					'icon' => esc_html__( 'Icon', 'back'),
					'image' => esc_html__( 'Image', 'back'),								
				],
				'separator' => 'before',
			]
		);


		$this->add_control(
			'selected_icon',
			[
				'label'     => esc_html__( 'Select Icon', 'back' ),
				'type'      => Controls_Manager::ICON,			
				'default'   => 'eicon-text-smile-o',
				'separator' => 'before',
				'condition' => [
					'icon_type' => 'icon',
				],				
			]
		);

		$this->add_control(
			'selected_image',
			[
				'label' => esc_html__( 'Choose Image', 'back' ),
				'type'  => Controls_Manager::MEDIA,				
				
				'condition' => [
					'icon_type' => ['image'],
				],
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title & Description', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
	
		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Services Title', 'back' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'Services Title',
				'placeholder' => esc_html__( 'Services Title', 'back' ),
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'title_link',
			[
				'label'       => esc_html__( 'Title Link', 'back' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,						
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
		        'default' => 'h2',
		        'toggle' => false,
		    ]
		);

		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Services Text', 'back' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,				
				'default' => esc_html__( 'Quisque placerat vitae lacus ut scelerisque. Fusce luctus odio ac nibh luctus, in porttitor theo lacus egestas. Dummy text generator.', 'back' ),
				'separator' => 'before',
			]			
		);

		$this->end_controls_section();		


		$this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Button', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'btn_type',
			[
				'label'   => esc_html__( 'Select Button Type', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'icon',			
				'options' => [					
					'icon' => esc_html__( 'Icon', 'back'),
					'text' => esc_html__( 'Text', 'back'),								
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'services_btn_text',
			[
				'label' => esc_html__( 'Services Button Text', 'back' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
				'placeholder' => esc_html__( 'Services Button Text', 'back' ),
				'separator' => 'before',
				'condition' => [
				    'btn_type' => 'text'
				],
			]
		);


		$this->add_control(
			'services_btn_link',
			[
				'label'       => esc_html__( ' Button Link', 'back' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,						
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
		    '_section_area_style',
		    [
		        'label' => esc_html__( 'Global Style', 'back' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'item_padding_area',
		    [
		        'label' => esc_html__( 'Padding', 'back' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services .services-part' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);


		$this->add_control(
		    'icon_color_circle',
		    [
		        'label' => esc_html__( 'Icon Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services.services-style5 .services-part .icon_image i' => 'color: {{VALUE}} !important',
		        ],
		        'condition' => [
		            'services_style' => 'style5'
		        ]
		    ]
		);

		$this->add_control(
		    'icon_bg_color_cirle',
		    [
		        'label' => esc_html__( 'Icon Background Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services.services-style5 .services-part .icon_image i' => 'background: {{VALUE}} !important',
		        ],
		        'condition' => [
		            'services_style' => 'style5'
		        ]
		    ]
		);

		$this->end_controls_section();


		$this->start_controls_section(
		    '_section_media_style',
		    [
		        'label' => esc_html__( 'Icon / Image', 'back' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_responsive_control(
		    'icon_size',
		    [
		        'label' => esc_html__( 'Size', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px' ],
		        'range' => [
		            'px' => [
		                'min' => 10,
		                'max' => 300,
		            ],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .services-icon' => 'font-size: {{SIZE}}{{UNIT}} !important;',
		            '{{WRAPPER}} .services-icon i:before' => 'font-size: {{SIZE}}{{UNIT}} !important;',
		        ],
		        'condition' => [
		            'icon_type' => 'icon'
		        ]
		    ]
		);

		$this->add_responsive_control(
		    'image_width',
		    [
		        'label' => esc_html__( 'Width', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => [ 'px', '%' ],
		        'range' => [
		            'px' => [
		                'min' => 1,
		                'max' => 400,
		            ],
		            '%' => [
		                'min' => 1,
		                'max' => 100,
		            ],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .services-icon.icon' => 'min-width: {{SIZE}}{{UNIT}};',
		            '{{WRAPPER}} .services-icon img' => 'width: {{SIZE}}{{UNIT}};',
		        ],
		        'separator' => 'before',
		    ]
		);

		$this->add_responsive_control(
            'align_icon',
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
                    '{{WRAPPER}} .back-addon-services .services-part .services-icon' => 'text-align: {{VALUE}}'
                ],
                'condition' => [
		            'icon_type' => 'icon'
		        ],
                'separator' => 'before',
            ]
        );
		

		$this->add_responsive_control(
		    'media_padding',
		    [
		        'label' => esc_html__( 'Padding', 'back' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .services-icon > img, {{WRAPPER}} .services-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'icon_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .services-icon' => 'color: {{VALUE}} !important',
		        ],
		        'condition' => [
		            'icon_type' => 'icon'
		        ]
		    ]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
		    '_section_title_style',
		    [
		        'label' => esc_html__( 'Title & Description', 'back' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_control(
		    'title_heading',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => esc_html__( 'Title', 'back' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'title_spacing',
		    [
		        'label' => esc_html__( 'Bottom Spacing', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services .services-part .services-text .services-title .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'title_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .services-title h3, {{WRAPPER}} .services-title h3 a, {{WRAPPER}} .services-title .title, {{WRAPPER}} .services-title .title a' => 'color: {{VALUE}}',
		        ],
		    ]
		);



		$this->add_control(
		    'title_hover_color',
		    [
		        'label' => esc_html__( 'Hover Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		        	'{{WRAPPER}} .services-title .title a:hover' => 'color: {{VALUE}}',
		        ],
		    ]
		);


		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'title_typography',
		        'label' => esc_html__( 'Typography', 'back' ),
		        'selector' => '{{WRAPPER}} .services-title .title',
		    ]
		);		


		$this->add_control(
		    'description_heading',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => esc_html__( 'Description', 'back' ),
		        'separator' => 'before'
		    ]
		);

		$this->add_responsive_control(
		    'description_spacing',
		    [
		        'label' => esc_html__( 'Bottom Spacing', 'back' ),
		        'type' => Controls_Manager::SLIDER,
		        'size_units' => ['px'],
		        'selectors' => [
		            '{{WRAPPER}} .services-txt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'description_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .services-txt' => 'color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'description_typography',
		        'label' => esc_html__( 'Typography', 'back' ),
		        'selector' => '{{WRAPPER}} .services-txt',
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

		$this->add_responsive_control(
		    'link_padding',
		    [
		        'label' => esc_html__( 'Padding', 'back' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services .services-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'btn_typography',
		        'selector' => '{{WRAPPER}} .back-addon-services .services-btn',
		    ]
		);

		$this->add_control(
		    'button_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'back' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services .services-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'button_box_shadow',
		        'selector' => '{{WRAPPER}} .back-addon-services .services-btn',
		    ]
		);

		$this->add_control(
		    'hr',
		    [
		        'type' => Controls_Manager::DIVIDER,
		        'style' => 'thick',
		    ]
		);

		$this->start_controls_tabs( '_tabs_button' );

		$this->start_controls_tab(
		    '_tab_button_normal',
		    [
		        'label' => esc_html__( 'Normal', 'back' ),
		    ]
		);

		$this->add_control(
		    'link_color',
		    [
		        'label' => esc_html__( 'Text Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '',
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services .services-btn' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_bg_color',
		    [
		        'label' => esc_html__( 'Background Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services .services-btn' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		    '_tab_button_hover',
		    [
		        'label' => esc_html__( 'Hover', 'back' ),
		    ]
		);

		$this->add_control(
		    'button_hover_color',
		    [
		        'label' => esc_html__( 'Text Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services .services-btn:hover' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'button_hover_bg_color',
		    [
		        'label' => esc_html__( 'Background Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-addon-services .services-btn' => 'background-color: {{VALUE}};',
		        ],
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
		
		$this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'title' );

        $this->add_inline_editing_attributes( 'text', 'basic' );
        $this->add_render_attribute( 'text', 'class', 'services-txt' );
        $this->add_inline_editing_attributes( 'services_btn_text', 'basic' );
        $this->add_render_attribute( 'services_btn_text', 'class', 'btn_text' );
		?>
		
		<div class="back-addon-services services-<?php echo esc_attr( $settings['services_style'] ); ?> <?php echo esc_attr( $settings['hover__shape_enable'] ); ?>">
		    <div class="services-part">

		    	<?php if( !empty($settings['selected_icon']) || !empty($settings['selected_image']['url'])){?>		    			
	    			<div class="services-icon <?php echo esc_html( $settings['icon_type'] );?>">
			    		<?php if(!empty($settings['selected_icon'])) : ?>
			    			<i class="fa <?php echo esc_html( $settings['selected_icon'] );?>"></i>
			    		<?php endif; ?>
			    		
			    		<?php if( !empty($settings['selected_image']['url'])){?>
			    			<img class="main-img" src="<?php echo esc_url( $settings['selected_image']['url'] );?>" alt="image"/>	
			    		<?php } ?>
		    		</div>
		    	<?php } ?>
		    		       
			    <div class="services-text">

	    	    	<?php if(!empty($settings['title'])){ ?>
	    		    	<div class="services-title">
	    		    	<?php if(!empty($settings['title_link']['url'])) : ?>
	    		    	<?php $target = $settings['title_link']['is_external'] ? 'target=_blank' : '';?>		    		  							    			
	    		    		<<?php echo esc_html($settings['title_tag']);?>  <?php  echo wp_kses_post($this->print_render_attribute_string( 'title' )); ?>> <a href="<?php echo esc_url($settings['title_link']['url']);?>" ><?php echo wp_kses_post($settings['title']);?></a></<?php echo esc_html($settings['title_tag']);?>>
	    		    		<?php else: ?>
	    		    			<<?php echo esc_html($settings['title_tag']);?> <?php  echo wp_kses_post($this->print_render_attribute_string( 'title' )); ?>> <?php echo wp_kses_post($settings['title']);?></<?php echo esc_html($settings['title_tag']);?>>
	    		    		<?php endif; ?>				    		
	    		    	</div>
	    	    	<?php } ?>
				    
			    	<?php if(!empty($settings['text'])) : ?>
			    		<p <?php  echo wp_kses_post($this->print_render_attribute_string( 'text' )); ?>>  <?php echo wp_kses_post($settings['text']);?></p>	
			    	<?php endif; ?>
			    	
    	    		<?php if('text' == $settings['btn_type']){ ?>
	    	    		<?php if(!empty($settings['services_btn_text'])){ ?>
		    		    	<div class="services-btn-part">
		    		    		<?php $target = $settings['services_btn_link']['is_external'] ? 'target=_blank' : '';?>
	    		    			<a class="services-btn services-btn-text" href="<?php echo esc_url($settings['services_btn_link']['url']);?>">
	    		    				<span <?php echo wp_kses_post($this->print_render_attribute_string( 'services_btn_text' )); ?>>
	    		    					<?php echo esc_html($settings['services_btn_text']);?> <i class="ri-arrow-right-line"></i>   						
	    		    				</span>    		    				
	    		    			</a>
		    		    	</div>
		    	    	<?php } ?>
		    	    <?php } else { ?>
		    	    	<div class="services-btn-part">
		    	    		<?php $target = $settings['services_btn_link']['is_external'] ? 'target=_blank' : '';?>
			    	    	<a class="services-icon-btn" href="<?php echo esc_url($settings['services_btn_link']['url']);?>">
			    	    		<i class="ri-arrow-right-line"></i>    		    				
			    	    	</a>
			    	    </div>
		    	    <?php } ?>
			    </div>
			</div>
		</div>	
		
	<?php
	}
}

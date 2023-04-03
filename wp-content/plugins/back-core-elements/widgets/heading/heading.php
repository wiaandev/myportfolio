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
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class back_Theme_Elementor_Pro_Heading_Widget extends \Elementor\Widget_Base {

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
		return 'back-core-heading';
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
		return esc_html__( 'Back Heading', 'back-core-elements' );
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
		return 'glyph-icon flaticon-letter';
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
				'label' => esc_html__( 'Heading Info', 'back-core-elements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		
		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Select Heading Style', 'back-core-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'back-core-elements'),				
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Heading Text', 'back-core-elements' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Heading Style', 'back-core-elements' ),				
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Select Heading Tag', 'back-core-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [						
					'h1' => esc_html__( 'H1', 'back-core-elements'),
					'h2' => esc_html__( 'H2', 'back-core-elements'),
					'h3' => esc_html__( 'H3', 'back-core-elements' ),
					'h4' => esc_html__( 'H4', 'back-core-elements' ),
					'h5' => esc_html__( 'H5', 'back-core-elements' ),
					'h6' => esc_html__( 'H6', 'back-core-elements' ),				
					
				],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'     => esc_html__( 'Sub Heading Text', 'back-core-elements' ),
				'type'      => Controls_Manager::TEXT,				
				'default'   => esc_html__( 'Sub Heading', 'back-core-elements' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'watermark',
			[
				'label' => esc_html__( 'Watermark Text', 'back-core-elements' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Watermark', 'back-core-elements' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content',
			[
				'label'   => esc_html__( 'Description', 'back-core-elements' ),
				'type'    => Controls_Manager::WYSIWYG,
				'rows'    => 10,			
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'back-core-elements' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'back-core-elements' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'back-core-elements' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'back-core-elements' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'back-core-elements' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .back-heading' => 'text-align: {{VALUE}}'
                ]
            ]
        );
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'back-core-elements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
	    $this->add_control(
            'title_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Title', 'back-core-elements' ),
                'separator' => 'before',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'back-core-elements' ),
				'selector' => '{{WRAPPER}} .back-heading .title-inner .title',
			]
		);

		$this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'back-core-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-heading .title-inner .title' => 'color: {{VALUE}};',
                ],                
            ]
        );


        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'back-core-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-heading .title-inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'sub_title_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Sub Title', 'back-core-elements' ),
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Subtitle Typography', 'back-core-elements' ),
				'selector' => '{{WRAPPER}} .back-heading .title-inner .sub-text',
			]
		);

		$this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Subtitle Color', 'back-core-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-heading .title-inner .sub-text' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'sub_border_color',
            [
                'label' => esc_html__( 'Border Color', 'back-core-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .back-heading .title-inner .sub-text::before' => 'background: {{VALUE}};',
				]
            ]
        );


        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => esc_html__( 'Subtitle Margin', 'back-core-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-heading .title-inner .sub-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'des_style',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Description', 'back-core-elements' ),
                'separator' => 'before',
            ]
        ); 

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Description Typography', 'back-core-elements' ),
				'selector' => '{{WRAPPER}} .back-heading .description p, {{WRAPPER}} .back-heading .description',
			]
		);

		$this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'back-core-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-heading .description' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .back-heading .description p' => 'color: {{VALUE}};',
                ],                
            ]
        ); 

        $this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__( 'Description Margin', 'back-core-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-heading .description p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .back-heading .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'back-core-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .back-heading.style2:after '                        => 'background: {{VALUE}};',
					'{{WRAPPER}} .back-heading.style1 .description:after '           => 'background: {{VALUE}};',
					'{{WRAPPER}} .back-heading.style4 .title-inner .sub-text:after'  => 'background: {{VALUE}};',
					'{{WRAPPER}} .back-heading.style4 .title-inner .sub-text:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .back-heading.style8 .title-inner:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} .back-heading.style8 .description:after' => 'background: {{VALUE}};',
				]
            ]
        );             

		$this->end_controls_section();

		$this->start_controls_section(
			'title_highlight_style',
			[
				'label' => esc_html__( 'Highlight Title', 'prelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'highlight_color',
            [
                'label' => esc_html__( 'Highlight Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-heading .title-inner .title span' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hightlight_typography',
				'label' => esc_html__( 'Hightlight Typography', 'prelements' ),
				'selector' => '{{WRAPPER}} .back-heading .title-inner .title span',
			]
		);

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
		$watermark_text = ($settings['watermark']) ? '<span class="watermark">'.($settings['watermark']).'</span>' : '';

		$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title"><span class="watermark">'.$settings['watermark'].'</span>'.wp_kses_post($settings['title']).'</'.$settings['title_tag'].'>' : '';

		$sub_text       = ($settings['subtitle'])  ? '<span class="sub-text ">'.($settings['subtitle']) .'</span>' : '';
		    
        // Fill $html var with data
      ?>
        <div class="back-heading <?php echo esc_attr($settings['style']);?> <?php echo esc_attr($settings['align']);?> ">
            <div class="title-inner">        		      		
	            <?php 
					echo wp_kses_post($sub_text);
					echo wp_kses_post($main_title);
				?>
	        </div>
	        <?php if ($settings['content']) { ?>
            	<div class="description">
            		<?php echo wp_kses_post($settings['content']);?>            		
            	</div>
        	<?php } ?>
        </div>

        <?php 
	}
} ?>
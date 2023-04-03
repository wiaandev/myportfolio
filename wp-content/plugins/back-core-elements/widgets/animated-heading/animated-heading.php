<?php
/**
 * Elementor Animated Heading
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Group_Control_Css_Filter;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class back_Elementor_pro_Animated_Heading_Widget extends \Elementor\Widget_Base {

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
		return 'back-animated-heading';
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
		return esc_html__( 'Back Animated Heading', 'back' );
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
		return 'glyph-icon flaticon-files-and-folders';
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
			'global_content_section',
			[
				'label' => esc_html__( 'Global', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
						'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
						'title' => esc_html__( 'Center', 'back' ),
						'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
						'title' => esc_html__( 'Right', 'back' ),
						'icon'  => 'eicon-text-align-right',
                    ],
                    'justify' => [
						'title' => esc_html__( 'Justify', 'back' ),
						'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .back-animated-heading' => 'text-align: {{VALUE}}'
                ]
            ]
        );
		$this->end_controls_section();


		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Normal Title', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Normal Text', 'back' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Animated Heading', 'back' ),				
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Select Heading Tag', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [						
					'h1' => esc_html__( 'H1', 'back'),
					'h2' => esc_html__( 'H2', 'back'),
					'h3' => esc_html__( 'H3', 'back' ),
					'h4' => esc_html__( 'H4', 'back' ),
					'h5' => esc_html__( 'H5', 'back' ),
					'h6' => esc_html__( 'H6', 'back' ),				
					
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'animated_section',
			[
				'label' => esc_html__( 'Animated Title', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,							
			]
		);
		$this->add_control(
			'animated_text',
			[
				'type' => Controls_Manager::WYSIWYG,
				'rows' => 10,				
				'placeholder' => esc_html__( 'Animated Text here', 'back' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'content_section_after',
			[
				'label' => esc_html__( 'After Animate Title', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'title_after',
			[
				'label' => esc_html__( 'Text', 'back' ),
				'type' => Controls_Manager::TEXT,							
				'separator' => 'before',
			]
		);
	
		$this->end_controls_section();


		$this->start_controls_section(
			'des_section',
			[
				'label' => esc_html__( 'Description Text', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content',
			[
				'type' => Controls_Manager::WYSIWYG,
				'rows' => 10,				
				'placeholder' => esc_html__( 'Type your description here', 'back' ),
			]
		);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Normal', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-animated-heading .title-inner .title' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-animated-heading .title-inner .title',
			]
		);

		$this->add_responsive_control(
		    'title__margin',
		    [
		        'label' => esc_html__( 'Margin', 'back' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .back-animated-heading .title-inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);
               
		$this->end_controls_section();


		$this->start_controls_section(
			'animate_heading_style',
			[
				'label' => esc_html__( 'Animated', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'animate_style',
			[
				'label'   => esc_html__( 'Animated Style', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'clip',
				'options' => [
					'rotate-1'    => esc_html__( 'Rotate', 'back'),
					'loading-bar' => esc_html__( 'Loading-bar', 'back'),
					'slide' 	  => esc_html__( 'Slide', 'back'),
					'slide' 	  => esc_html__( 'Slide', 'back'),
					'clip' 	  	  => esc_html__( 'Clip', 'back'),
					'zoom' 	  	  => esc_html__( 'Zoom', 'back'),
					'push' 	  	  => esc_html__( 'Push', 'back'),
				],
			]
		);


		$this->add_control(
            'animate_title_color',
            [
                'label' => esc_html__( 'Title Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-animated-heading .title-inner .title .cd-headline p' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'animate_title_typography',
				'label' => esc_html__( 'Title Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-animated-heading .title-inner .title .cd-headline p',
			]
		);
            
		$this->end_controls_section();


		$this->start_controls_section(
			'section_heading_style_after',
			[
				'label' => esc_html__( 'After Title', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'title_after_style',
            [
                'label' => esc_html__( 'Title Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-animated-heading .title-inner .title' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography_after',
				'label' => esc_html__( 'Title Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-animated-heading .title-inner .title',
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

		$show_animate_title = ($settings['animated_text']) ? '<span class="cd-headline '.$settings['animate_style'].'">
			<div class="cd-words-wrapper">
				'.$settings['animated_text'].'
			</div>
		</span>' : '';

		$last_title     = ($settings['title_after']) ? $settings['title_after'] : '';
		$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title">'.wp_kses_post($settings['title']).''.$show_animate_title.' '.$last_title.'
		</'.$settings['title_tag'].'>' : ''; 
        ?>
        <div class="back-animated-heading  <?php echo esc_attr($settings['align']);?>">
        	<div class="title-inner">		
	            <?php 
					echo  wp_kses_post($main_title);
				?>
	        </div>
	        <?php if ($settings['content']) { ?>
            	<div class="description">
            		<?php echo wp_kses_post($settings['content']);?>
            	</div>
        	<?php } ?>

        </div>
        <?php 

        echo '<script>
			jQuery(document).ready(function($) {
				$(".back-animated-heading .cd-words-wrapper p:first-child").addClass("is-visible");
			});
		</script>';	
	}
}
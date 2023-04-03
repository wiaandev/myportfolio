<?php
/**
 * Elementor RS video Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Utils;
use Elementor\Group_Control_Background;

defined( 'ABSPATH' ) || die();

class back_Elementor_pro_backvideo_Widget extends \Elementor\Widget_Base {

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
		return 'back-video';
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
		return __( 'Back Video', 'back' );
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
		return 'glyph-icon flaticon-multimedia';
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
		return [ 'video' ];
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
			'section_counter',
			[
				'label' => esc_html__( 'Content', 'back' ),
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Title Alignment', 'back' ),
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
                'default'     => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .back-video' => 'text-align: {{VALUE}}'
                ],
				'separator' => 'before',
            ]
        );

        $this->add_control(
			'back_video_style',
			[
				'label'   => esc_html__( 'Select Video Style', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [					
					'style1' => esc_html__( 'Style 1', 'back'),
					'style2' => esc_html__( 'Style 2', 'back'),
				],
			]
		);

		$this->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Enter Link Here', 'back' ),
				'type' => Controls_Manager::TEXT,
				'default'     => '#',
				'placeholder' => esc_html__( 'Video link here', 'back' ),				
				'separator' => 'before',
			]
		);

		$this->add_control(
			'selected_image',
			[
				'label' => esc_html__( 'Choose Image', 'back' ),
				'type'  => Controls_Manager::MEDIA,				
				
				'condition' => [
					'icon_type' => 'image',
					'back_video_style' => 'style2',
				],
			]
		);			
		
		$this->end_controls_section();

			
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'icon_btn',
			[
				'label' => esc_html__( 'Button Color', 'back' ),
				'type' => Controls_Manager::COLOR,				
				'selectors' => [
					'{{WRAPPER}} .back-video.style2 .back-icon-inner .back-icon-btn a' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
				'condition' => [
		            'back_video_style' => 'style2'
		        ],
			]
		);


		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'back' ),
				'type' => Controls_Manager::COLOR,				
				'selectors' => [
					'{{WRAPPER}} .back-video .popup-videos i:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .back-video.style2 .back-icon-inners .animate-border .popup-border i' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[	'label' => esc_html__( 'Typography', 'back' ),
				'name' => 'typography_icon',				
				'selector' => '{{WRAPPER}} .back-video .popup-videos i, {{WRAPPER}} .back-video.style2 .back-icon-inners .animate-border .popup-border i',
				'separator' => 'before',
			]
		);

		

		$this->add_group_control(
		    \Elementor\Group_Control_Background::get_type(),
		    [
		        'name' => 'background',
		        'label' => __( 'Background', 'plugin-domain' ),
		        'types' => [ 'classic', 'gradient' ],
		        'selector' => '{{WRAPPER}} .back-video .popup-videos, {{WRAPPER}} .back-video .popup-videos:before, {{WRAPPER}} .back-video.style2 .back-icon-inners .animate-border .popup-border',
		    ]
		);


		$this->add_control(
			'icon_border',
			[
				'label' => esc_html__( 'Icon Border Color', 'back' ),
				'type' => Controls_Manager::COLOR,				
				'selectors' => [
					'{{WRAPPER}} .back-video .overly-border' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .back-video.style2 .back-icon-inners .animate-border .popup-border:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .back-video.style2 .back-icon-inners .animate-border .popup-border:after' => 'border-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
            'video_icon_postion_ver',
            [
                'label' => esc_html__( 'Icon Position Vertical', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                
                'selectors' => [
                    '{{WRAPPER}} .back-video .overly-border' => 'top: {{SIZE}}%;',                   
                    '{{WRAPPER}} .back-video.style2 .back-icon-inners .animate-border .popup-border' => 'top: {{SIZE}}px;',                   
                ],
            ]
        );

		$this->add_responsive_control(
            'video_icon_postion_ht',
            [
                'label' => esc_html__( 'Icon Position Horizontal', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                
                'selectors' => [
                    '{{WRAPPER}} .back-video .overly-border' => 'left: {{SIZE}}%;',                   
                    '{{WRAPPER}} .back-video.style2 .back-icon-inners .animate-border .popup-border' => 'left: {{SIZE}}%;',                   
                ],
            ]
        );

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
		$rand = rand(12, 3330);

		$this->add_inline_editing_attributes( 'description', 'basic' );
        $this->add_render_attribute( 'description', 'class', 'video-desc' ); 

		?>
  		<div class="back-video video-item-<?php echo esc_attr($rand);?> <?php echo esc_html($settings['align']);?> <?php echo esc_html($settings['back_video_style']);?>">

			<?php if($settings['back_video_style'] == 'style1') { ?>	
				<div class="overly-border">
				    <a class="popup-videos" href="<?php echo esc_url($settings['video_link']);?>">
						<i class="ri-play-fill"></i>
					</a>
				</div>
			<?php } ?>

			<?php if($settings['back_video_style'] == 'style2') { ?>	
				<div class="overly-border">					    
			    	<?php if( !empty($settings['selected_image']['url'])){?>
			    		<div class="icon-area">
				    		<?php if(!empty($settings['selected_image']['url'])) :?>
				    			<a class="popup-videos image-type" href="<?php echo esc_url($settings['video_link']);?>"><img src="<?php echo esc_url($settings['selected_image']['url']);?>" alt="image"/></a>
				    		<?php endif;?>
			    		</div>
			    	<?php } ?>
				</div>
			<?php } ?>				    
		</div>	


		<script type="text/javascript">			
			jQuery(document).ready(function(){
				jQuery('.popup-videos').magnificPopup({
			        disableOn: 10,
			        type: 'iframe',
			        mainClass: 'mfp-fade',
			        removalDelay: 160,
			        preloader: false,

			        fixedContentPos: false
			    }); 
			});
		</script>
    
<?php 
	}
}
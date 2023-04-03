<?php
/**
 * Elementor Team Widget.
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

class back_Elementor_Team_Slider_Pro_Widget extends \Elementor\Widget_Base {

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
		return 'backteam-slider';
	}		

	/**
	 * Get widget title.
	 *
	 * Retrieve team widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Back Team Slider', 'back' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve back team widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-slider-1';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the back team widget belongs to.
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
	 * Register back team widget controls.
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
				'label' => esc_html__( 'Team Settings', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'team_slider_style',
			[
				'label'   => esc_html__( 'Select Style', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',				
				'options' => [
					'style1' => 'Style 1',
				],											
			]
		);


		$this->add_control(
			'team_link_condition',
			[
				'label'   => esc_html__( 'Link Enable / Disable', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'enable',				
				'options' => [
					'enable' => 'Enable',
					'disable' => 'Disable',
				],											
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
		
		$this->end_controls_section();

		$this->start_controls_section(
			'slider_section',
			[
				'label' => esc_html__( 'Slider Settings', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'col_lg',
			[
				'label'   => esc_html__( 'Desktops > 1199px', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 3,
				'options' => [
					'1' => esc_html__( '1 Column', 'back' ),	
					'2' => esc_html__( '2 Column', 'back' ),
					'3' => esc_html__( '3 Column', 'back' ),
					'4' => esc_html__( '4 Column', 'back' ),
					'6' => esc_html__( '6 Column', 'back' ),					
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'col_md',
			[
				'label'   => esc_html__( 'Desktops > 991px', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 3,			
				'options' => [
					'1' => esc_html__( '1 Column', 'back' ),	
					'2' => esc_html__( '2 Column', 'back' ),
					'3' => esc_html__( '3 Column', 'back' ),
					'4' => esc_html__( '4 Column', 'back' ),
					'6' => esc_html__( '6 Column', 'back' ),						
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'col_sm',
			[
				'label'   => esc_html__( 'Tablets > 767px', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 2,			
				'options' => [
					'1' => esc_html__( '1 Column', 'back' ),	
					'2' => esc_html__( '2 Column', 'back' ),
					'3' => esc_html__( '3 Column', 'back' ),
					'4' => esc_html__( '4 Column', 'back' ),
					'6' => esc_html__( '6 Column', 'back' ),					
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'col_xs',
			[
				'label'   => esc_html__( 'Tablets < 768px', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 1,			
				'options' => [
					'1' => esc_html__( '1 Column', 'back' ),	
					'2' => esc_html__( '2 Column', 'back' ),
					'3' => esc_html__( '3 Column', 'back' ),
					'4' => esc_html__( '4 Column', 'back' ),
					'6' => esc_html__( '6 Column', 'back' ),					
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'slides_ToScroll',
			[
				'label'   => esc_html__( 'Slide To Scroll', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 2,			
				'options' => [
					'1' => esc_html__( '1 Item', 'back' ),
					'2' => esc_html__( '2 Item', 'back' ),
					'3' => esc_html__( '3 Item', 'back' ),
					'4' => esc_html__( '4 Item', 'back' ),					
				],
				'separator' => 'before',
							
			]
			
		);

		

		$this->add_control(
			'slider_dots',
			[
				'label'   => esc_html__( 'Navigation Dots', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'Enable', 'back' ),
					'false' => esc_html__( 'Disable', 'back' ),				
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'slider_nav',
			[
				'label'   => esc_html__( 'Navigation Nav', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 'false',			
				'options' => [
					'true' => esc_html__( 'Enable', 'back' ),
					'false' => esc_html__( 'Disable', 'back' ),				
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'slider_autoplay',
			[
				'label'   => esc_html__( 'Autoplay', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 'false',			
				'options' => [
					'true' => esc_html__( 'Enable', 'back' ),
					'false' => esc_html__( 'Disable', 'back' ),				
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'slider_autoplay_speed',
			[
				'label'   => esc_html__( 'Autoplay Slide Speed', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 3000,			
				'options' => [
					'1000' => esc_html__( '1 Seconds', 'back' ),
					'2000' => esc_html__( '2 Seconds', 'back' ),	
					'3000' => esc_html__( '3 Seconds', 'back' ),	
					'4000' => esc_html__( '4 Seconds', 'back' ),	
					'5000' => esc_html__( '5 Seconds', 'back' ),	
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'slider_stop_on_hover',
			[
				'label'   => esc_html__( 'Stop on Hover', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'false',				
				'options' => [
					'true' => esc_html__( 'Enable', 'back' ),
					'false' => esc_html__( 'Disable', 'back' ),				
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'slider_interval',
			[
				'label'   => esc_html__( 'Autoplay Interval', 'back' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 3000,			
				'options' => [
					'5000' => esc_html__( '5 Seconds', 'back' ),	
					'4000' => esc_html__( '4 Seconds', 'back' ),	
					'3000' => esc_html__( '3 Seconds', 'back' ),	
					'2000' => esc_html__( '2 Seconds', 'back' ),	
					'1000' => esc_html__( '1 Seconds', 'back' ),		
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'slider_loop',
			[
				'label'   => esc_html__( 'Loop', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'Enable', 'back' ),
					'false' => esc_html__( 'Disable', 'back' ),
				],
				'separator' => 'before',
							
			]
			
		);

		$this->add_control(
			'slider_centerMode',
			[
				'label'   => esc_html__( 'Center Mode', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'Enable', 'back' ),
					'false' => esc_html__( 'Disable', 'back' ),
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
                    '{{WRAPPER}} .back-team .single-team .team-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
			]
		); 
				
		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_style',
			[
				'label' => esc_html__( 'Team Style', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'image_overlay',
            [
                'label' => esc_html__( 'Image Overlay', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img::before' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_background',
            [
                'label' => esc_html__( 'Navigation Arrow Bg', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-next, .back-unique-slider .slick-prev' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_icon_color',
            [
                'label' => esc_html__( 'Navigation Icon Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-next:before' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_dot_border_color',
            [
                'label' => esc_html__( 'Background Color (Dots)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-dots li button' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Background Color (Dots Active)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-dots li.slick-active button' => 'background: {{VALUE}};',
                ],                
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Team Title & Designation Style', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img .team-info .name, {{WRAPPER}} .back-team .single-team .team-img .team-info .name a' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img .team-info .name a:hover' => 'color: {{VALUE}};',
                ],                
            ]            
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-team .single-team .team-img .team-info .name, {{WRAPPER}} .back-team .single-team .team-img .team-info .name a',
			]
		);


        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Designation Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img .team-info .desgnation' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-team .single-team .team-img .team-info .desgnation',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_share_style',
			[
				'label' => esc_html__( 'Social Share Style', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
		    'icon_color',
		    [
		        'label' => esc_html__( 'Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-team .single-team .team-img .social-links li a' => 'color: {{VALUE}};',
		        ],
		        'separator' => 'before',                
		    ]
		);

		$this->add_control(
		    'icon_border_color',
		    [
		        'label' => esc_html__( 'Border Color', 'back' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .back-team .single-team .team-img .social-links li a' => 'border-color: {{VALUE}};',
		        ],
		        'separator' => 'before',                
		    ]
		);

        $this->add_control(
            'icon_section_hover_bg',
            [
                'label' => esc_html__( 'Background Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img .social-links li a:hover' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );
		

        $this->add_control(
            'icon_section_border_bg',
            [
                'label' => esc_html__( 'Border Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img .social-links li a:hover' => 'border-color: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );


        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__( 'Icon Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-team .single-team .team-img .social-links li a:hover' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]            
        );
		$this->end_controls_section();
	}

	/**
	 * Render back team widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display(); 
				
		$slidesToShow    = !empty($settings['col_lg']) ? $settings['col_lg'] : 3;
		$autoplaySpeed   = $settings['slider_autoplay_speed'];
		$interval        = $settings['slider_interval'];
		$slidesToScroll  = $settings['slides_ToScroll'];
		$slider_autoplay = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
		$pauseOnHover    = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
		$sliderDots      = $settings['slider_dots'] == 'true' ? 'true' : 'false';
		$sliderNav       = $settings['slider_nav'] == 'true' ? 'true' : 'false';		
		$infinite        = $settings['slider_loop'] === 'true' ? 'true' : 'false';
		$centerMode      = $settings['slider_centerMode'] === 'true' ? 'true' : 'false';
		$col_lg          = $settings['col_lg'];
		$col_md          = $settings['col_md'];
		$col_sm          = $settings['col_sm'];
		$col_xs          = $settings['col_xs'];

		$unique = rand(2012,35120);
		$slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay','pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs');
		
		?>	 

		<div class="back-unique-slider back-team team-slider-<?php echo esc_attr($settings['team_slider_style']); ?>">
			<div id="back-slick-slider-<?php echo esc_attr($unique); ?>" class="back-addon-slider">
				<?php 	
				 	if('style1' == $settings['team_slider_style']){
						require_once plugin_dir_path(__FILE__)."/style1.php";
					}
				?>
			</div>
		<div class="back-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
	</div>

	<script type="text/javascript"> 
		jQuery(document).ready(function(){
			jQuery( '.back-addon-slider' ).each(function( index ) {        
	        var slider_id       = jQuery(this).attr('id'); 
	        var slider_conf     = jQuery.parseJSON( jQuery(this).closest('.back-unique-slider').find('.back-slider-conf').attr('data-conf'));
	       
	        if( typeof(slider_id) != 'undefined' && slider_id != '' ) {
            jQuery('#'+slider_id).not('.slick-initialized').slick({
            slidesToShow    : parseInt(slider_conf.col_lg),
            centerMode      : (slider_conf.centerMode)  == "true" ? true : false,
            dots            : (slider_conf.sliderDots)  == "true" ? true : false,
            arrows          : (slider_conf.sliderNav) == "true" ? true : false,
            autoplay        : (slider_conf.slider_autoplay) == "true" ? true : false,
            slidesToScroll  : parseInt(slider_conf.slidesToScroll),
            centerPadding   : '15px',
            autoplaySpeed   : parseInt(slider_conf.autoplaySpeed),
            pauseOnHover    : (slider_conf.pauseOnHover) == "true" ? true : false,
            loop : false,

            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: parseInt(slider_conf.col_md),
                }
            }, 
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: parseInt(slider_conf.col_sm),
                }
            }, 
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: parseInt(slider_conf.col_xs),
                }
            }, ]
            });
        }
	   
		});
	});
    </script>
	<?php 
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
}?>
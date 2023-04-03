<?php
/**
 * Elementor Portfolio Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class back_Portfolio_Slider_Pro_Widget extends \Elementor\Widget_Base {

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
		return 'back-portfolio-slider';
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
		return __( 'Back Portfolio Slider', 'back' );
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
		return 'glyph-icon flaticon-slider-3';
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
				'label' => esc_html__( 'Content', 'back' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'portfolio_slider_style',
			[
				'label'   => esc_html__( 'Select Style', 'back' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',				
				'options' => [
					'1' => 'Style 1',					
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
				'label' => esc_html__( 'Portfolio Show Per Page', 'back' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'example 3', 'back' ),
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

        $this->end_controls_section();


		$this->start_controls_section(
			'content_slider',
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
			'slider_center_pad3',
			[
				'label'   => esc_html__( 'Center Mode Padding', 'back' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',				
				'separator' => 'before',	
				'condition' => [
				    'slider_centerMode' => 'true',
				]						
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
			'slider_centeback_pad',
			[
				'label'   => esc_html__( 'Center Mode Padding', 'back' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',				
				'separator' => 'before',	
				'condition' => [
				    'slider_centerMode' => 'true',
				]						
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
			'slider_centeback_pad2',
			[
				'label'   => esc_html__( 'Center Mode Padding', 'back' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',				
				'separator' => 'before',	
				'condition' => [
				    'slider_centerMode' => 'true',
				]						
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

		$this->add_control(
			'slider_centerMode_pad',
			[
				'label'   => esc_html__( 'Center Mode Padding', 'back' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',				
				'separator' => 'before',	
				'condition' => [
				    'slider_centerMode' => 'true',
				]						
			]			
		);
				
		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_style',
			[
				'label' => esc_html__( 'Item Style', 'back' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title a, {{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title' => 'color: {{VALUE}};',                   

                ],                
            ]
        );



        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
            
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'back' ),
				'selector' => '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title a, {{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title',                    
			]
		);


        $this->add_control(
            'category_color',
            [
                'label' => esc_html__( 'Category Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-subtitle a' => 'color: {{VALUE}};',                   

                ],                
            ]
        );

        $this->add_control(
            'category_color_hover',
            [
                'label' => esc_html__( 'Category Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-subtitle a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]            
        );  

        $this->add_control(
            'image_overlay',
            [
                'label' => esc_html__( 'Image Overlay', 'back' ),
                'type' => Controls_Manager::COLOR,               
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .slider-style-5 .back-portfolio4 .portfolio-item' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .back-portfolio-style3 .portfolio-item .portfolio-content' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .back-portfolio-style2 .portfolio-item:before' => 'background: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
			'arrow_options',
			[
				'label' => esc_html__( 'Arrow Style', 'back' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
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
			'bullet_options',
			[
				'label' => esc_html__( 'Bullet Style', 'back' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


        $this->add_control(
            'navigation_dot_border_color',
            [
                'label' => esc_html__( 'background Color (Normal)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-dots li button' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Background Color (Active)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-dots li.slick-active button' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
			'bullet_spacing_custom',
			[
				'label' => esc_html__( 'Top Gap', 'back' ),
				'type' => Controls_Manager::SLIDER,
				'show_label' => true,				
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 25,
				],			
				'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .inner-case-studies' => 'margin-bottom:{{SIZE}}{{UNIT}};',                    
                ],
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

		$settings              = $this->get_settings_for_display();				
		$slidesToShow          = !empty($settings['col_lg']) ? $settings['col_lg'] : 3;		
		$autoplaySpeed         = $settings['slider_autoplay_speed'];
		$interval              = $settings['slider_interval'];
		$slidesToScroll        = $settings['slides_ToScroll'];
		$slider_autoplay       = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
		$pauseOnHover          = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
		$sliderDots            = $settings['slider_dots'] == 'true' ? 'true' : 'false';
		$sliderNav             = $settings['slider_nav'] == 'true' ? 'true' : 'false';		
		$infinite              = $settings['slider_loop'] === 'true' ? 'true' : 'false';
		$centerMode            = $settings['slider_centerMode'] === 'true' ? 'true' : 'false';
		$slider_centerMode_pad = !empty($settings['slider_centerMode_pad']) ? $settings['slider_centerMode_pad'] : '400px';
		$col_lg                = $settings['col_lg'];
		$col_md                = $settings['col_md'];
		$col_sm                = $settings['col_sm'];
		$col_xs                = $settings['col_xs'];
		$slider_centeback_pad    = $settings['slider_centeback_pad'];
		$slider_centeback_pad2   = $settings['slider_centeback_pad2'];
		$slider_center_pad3   = $settings['slider_center_pad3'];

		$unique = rand(2012,35120);

		$slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay','pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs', 'slider_centerMode_pad', 'slider_centeback_pad', 'slider_centeback_pad2', 'slider_center_pad3');	

		?>	 

		<div class="back-unique-slider back-case-studies back-portfolio-style<?php echo esc_attr($settings['portfolio_slider_style']); ?>">
			<div id="back-slick-slider-<?php echo esc_attr($unique); ?>" class="back-addon-sliders">
			<?php 	
			 	if('1' == $settings['portfolio_slider_style']){ 
					require_once plugin_dir_path(__FILE__)."/style1.php";
				}		
			?>
		</div>
		<div class="back-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
	</div>
	<script type="text/javascript"> 
		jQuery(document).ready(function(){
			jQuery( '.back-addon-sliders' ).each(function( index ) {        
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
            centerPadding   : slider_conf.slider_centerMode_pad,
            autoplaySpeed   : parseInt(slider_conf.autoplaySpeed),
            pauseOnHover    : (slider_conf.pauseOnHover) == "true" ? true : false,
            loop : false,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: parseInt(slider_conf.col_md),
                    slidesToScroll: 1,              
                }
            },
            {
                breakpoint: 1199,
                settings: {
                    centerPadding   : slider_conf.slider_center_pad3,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: parseInt(slider_conf.col_sm),
                    slidesToScroll: 1,
                    centerPadding   : slider_conf.slider_centeback_pad,
                }
            }, 
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: parseInt(slider_conf.col_xs),
                    slidesToScroll: 1,
                    centerPadding   : slider_conf.slider_centeback_pad2,
                }
            }, 
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    slidesToScroll: 1,
                    centerPadding   : '0px',
                }
            }]
            });
        }
	   
		});
	});
    </script>
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
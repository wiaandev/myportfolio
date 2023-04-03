<?php
/**
 * Logo widget class
 *
 */
use Elementor\Group_Control_Css_Filter;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class back_pro_Logo_Showcase_Widget extends \Elementor\Widget_Base {
    /**
     * Get widget name.
     *
     * Retrieve logo widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'back-logo';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    public function get_title() {
        return esc_html__( 'Back Logo', 'back' );
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-gallery-grid';
    }


    public function get_categories() {
        return [ 'backthemecore_category' ];
    }

    public function get_keywords() {
        return [ 'logo', 'clients', 'brand', 'parnter', 'image' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__( 'Logo Grid', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'back_logo_style',
            [
                'label'   => esc_html__( 'Select Style', 'back' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [                  
                    'style1' => esc_html__( 'Style 1', 'back'),
                    'style2' => esc_html__( 'Style 2', 'back'),
                ],
            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Logo', 'back'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'image2',
            [
                'label' => esc_html__('Logo', 'back'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'back'),
                'type' => Controls_Manager::URL,                
            ]
        ); 

        $this->add_control(
            'logo_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
                'default' => [
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
            ]
        );        

        $this->end_controls_section();

        $this->start_controls_section(
            '_images_settings',
            [
                'label' => esc_html__( 'Image Settings', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__( 'Image Height', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-img img' => 'max-height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => esc_html__( 'Settings', 'back' ),
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
                    '{{WRAPPER}} .back-grid-figure' => 'text-align: {{VALUE}}',
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
                ]
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => esc_html__( 'Select Style', 'back' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'grid' => esc_html__( 'Grid', 'back' ),
                    'slider' => esc_html__( 'Slider', 'back' ),
                   
                ],
                'default' => 'slider',            
            ]
        );

        $this->add_control(
            'logo_grid_style',
            [
                'label'   => esc_html__( 'Select Grid Style', 'back' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [                  
                    'style1' => esc_html__( 'Style 1', 'back'),                   
                    'style2' => esc_html__( 'Style 2', 'back'),                   
                ],
                'condition' => [
                    'layout' => 'grid'
                ],
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 4,
                'options' => [
                    6 => esc_html__( '2 Columns', 'back' ),
                    4 => esc_html__( '3 Columns', 'back' ),
                    3 => esc_html__( '4 Columns', 'back' ),                  
                    2 => esc_html__( '6 Columns', 'back' ),
                ],                           
            ]
        );

        $this->add_control(
            'columns-gap',
            [
                'label' => esc_html__( 'Columns Gap', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__( 'Default', 'back' ),
                    'no-padding' => esc_html__( 'No Gap', 'back' ),                   
                ],                           
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'content_slider',
            [
                'label' => esc_html__( 'Slider Settings', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout' => 'slider'
                ],
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
                    '5' => esc_html__( '5 Column', 'back' ),
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
                    '5' => esc_html__( '5 Column', 'back' ),
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
                    '5' => esc_html__( '5 Column', 'back' ),
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
                    '5' => esc_html__( '5 Column', 'back' ),
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

        $this->add_responsive_control(
            'item_gap_custom',
            [
                'label' => esc_html__( 'Item Gap', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'show_label' => true,               
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 15,
                ],          

                'selectors' => [
                    '{{WRAPPER}} .back-addon-slider .grid-item' => 'padding:0 {{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 
                
        $this->end_controls_section();

   
        $this->start_controls_section(
            '_section_style_grid',
            [
                'label' => esc_html__( 'Item', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-grid-figure' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'margin',
            [
                'label' => esc_html__( 'Margin', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-grid-figure' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        

        $this->start_controls_tabs(
            '_tabs_image_effects',
            [
                'separator' => 'before'
            ]
        );

        $this->start_controls_tab(
            '_tab_image_effects_normal',
            [
                'label' => esc_html__( 'Normal', 'back' ),
            ]
        );

        $this->add_control(
            'image_opacity',
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
                    '{{WRAPPER}} .back-grid-figure .back-grid-img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'image_blur',
            [
                'label' => esc_html__( 'Blur', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                        'min' => 0,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-grid-figure .back-grid-img' => 'filter: blur({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filters',
                'selector' => '{{WRAPPER}} .back-grid-figure .back-grid-img',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab( 'hover',
            [
                'label' => esc_html__( 'Hover', 'back' ),
            ]
        );

        $this->add_control(
            'image_opacity_hover',
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
                    '{{WRAPPER}} .back-grid-figure:hover .back-grid-img' => 'opacity: {{SIZE}};',
                ],
            ]
        );

        $this->add_control(
            'image_blur_hover',
            [
                'label' => esc_html__( 'Blur', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                        'min' => 0,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-grid-figure:hover .back-grid-img' => 'filter: blur({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'image_css_filte_hover',
                'selector' => '{{WRAPPER}} .back-grid-figure:hover .back-grid-img',
            ]
        );

        $this->add_control(
            'image_scale',
            [
                'label' => esc_html__( 'Zoom', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-grid-figure:hover .back-grid-img' => 'transform: scale({{image_scale.SIZE}})',
                ],
            ]
        );

        $this->add_control(
            'image_bg_hover_transition',
            [
                'label' => esc_html__( 'Transition Duration', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 3,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-grid-figure:hover .back-grid-img' => 'transition-duration: {{SIZE}}s',
                ],
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

        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__( 'Slider Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout' => 'slider'
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
                'label' => esc_html__( 'Background', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-addon-slider .slick-next, .back-addon-slider .slick-prev' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .back-addon-slider .slick-next, .back-addon-slider .slick-next' => 'background: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-addon-slider .slick-next::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .back-addon-slider .slick-prev::before' => 'color: {{VALUE}};',

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
                'label' => esc_html__( 'Border Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-addon-slider .slick-dots li button' => 'border-color: {{VALUE}};',

                ],                
            ]
        );



        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Background Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-addon-slider .slick-dots li button:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .back-addon-slider .slick-dots li.slick-active button' => 'background: {{VALUE}};',

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
                    '{{WRAPPER}} .back-addon-slider .slick-dots' => 'margin-bottom:-{{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 

        

        $this->end_controls_section();
    }

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

        if ( empty($settings['logo_list'] ) ) {
            return;
        }
        ?>

        <?php

            /*----------grid style-------
            -----------------------------*/

            if ( 'style1' == $settings['logo_grid_style'] ){?>
            <div class="back-logo-grid logo-grid-<?php echo esc_attr($settings['logo_grid_style']); ?> back_<?php echo esc_attr( $settings['back_logo_style'] ); ?>">
                <div class="row">
                <?php
                    foreach ( $settings['logo_list'] as $index => $item ) :
                        $image = wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = Utils::get_placeholder_image_src();
                        }

                        $target = !empty($item['link']['is_external']) ? 'target=_blank' : '';  

                        $link = !empty($item['link']['url']) ? $item['link']['url'] : '';

                        $gap = $settings['columns-gap'] == 'no-padding' ? 'no-padding' : '';

                        $show_tooltip = $settings['show_tooltip'] == 'yes' ? 'data-toggle= tooltip data-placement= top ' : '';

                        $animation = !empty($settings['hover_animation'])? 'elementor-animation-'.$settings['hover_animation'].'':'';

                        ?>
                        <div class="col-lg-<?php echo esc_attr($settings['columns']);?> col-md-3 col-sm-4 col-6 <?php echo esc_attr( $gap );?>">
                            <div  class="back-grid-figure">
                                <div class="logo-img">
                                    <a href="<?php echo esc_url($link);?>" <?php echo wp_kses_post($target);?>><img class="back-grid-img <?php echo esc_attr( $animation ); ?>" src="<?php echo esc_url( $image ); ?>" alt="image"></a>
                                </div>                                
                            </div>
                        </div>                   
                    <?php endforeach; ?>
                </div>
            </div>
            <?php } 

            elseif( 'style2' == $settings['logo_grid_style'] ){ ?>
            <div class="back-logo-grid back_style2 style2tws logo-grid-<?php echo esc_attr($settings['logo_grid_style']); ?> back_<?php echo esc_attr( $settings['back_logo_style'] ); ?>">
                <div class="row">
                <?php
                    foreach ( $settings['logo_list'] as $index => $item ) :
                        $image = wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size'] );
                        $image2 = wp_get_attachment_image_url( $item['image2']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = Utils::get_placeholder_image_src();
                        }
                        if ( ! $image2 ) {
                            $image2 = Utils::get_placeholder_image_src();
                        }

                        $target = !empty($item['link']['is_external']) ? 'target=_blank' : '';  

                        $link = !empty($item['link']['url']) ? $item['link']['url'] : '';

                        $gap = $settings['columns-gap'] == 'no-padding' ? 'no-padding' : '';

                        $show_tooltip = $settings['show_tooltip'] == 'yes' ? 'data-toggle= tooltip data-placement= top ' : '';

                        $animation = !empty($settings['hover_animation'])? 'elementor-animation-'.$settings['hover_animation'].'':'';

                        ?>
                        <div class="col-lg-<?php echo esc_attr($settings['columns']);?> col-sm-4 col-6 <?php echo esc_attr( $gap );?> cols grid-item">
                            <div  class="back-grid-figure">
                                <div class="logo-img">
                                    <a href="<?php echo esc_url($link);?>" <?php echo wp_kses_post($target);?>><img class="hoveback-logos back-grid-img <?php echo esc_attr( $animation ); ?>" src="<?php echo esc_url( $image2 ); ?>" alt="image">
                                        <img class="mains-logos back-grid-img <?php echo esc_attr( $animation ); ?>" src="<?php echo esc_url( $image ); ?>" alt="image"></a>
                                </div>
                            </div>                            
                        </div>                   
                    <?php endforeach; ?>
                </div>
            </div>
            <?php } else { ?>

            <div class="back-unique-slider">
                <div id="back-slick-slider-<?php echo esc_attr($unique); ?>" class="back-addon-slider back_<?php echo esc_attr( $settings['back_logo_style'] ); ?>">                   
                        
                        <?php
                            foreach ( $settings['logo_list'] as $index => $item ) :
                                $image = wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size'] );
                                if ( ! $image ) {
                                    $image = Utils::get_placeholder_image_src();
                                }
                                
                                $target       = !empty($item['link']['is_external']) ? 'target=_blank' : '';  
                                $link         = !empty($item['link']['url']) ? $item['link']['url'] : '';
                                $gap          = $settings['columns-gap'] == 'no-padding' ? 'no-padding' : '';                            
                                $show_tooltip = $settings['show_tooltip'] == 'yes' ? 'data-toggle= tooltip data-placement= top ' : '';
                                $animation    = !empty($settings['hover_animation'])? 'elementor-animation-'.$settings['hover_animation'].'':'';
                                ?>
                                <div class="grid-item <?php echo esc_attr( $gap );?>">
                                    <div  class="back-grid-figure">
                                        <div class="logo-img">
                                            <a href="<?php echo esc_url($link);?>" <?php echo wp_kses_post($target);?>><img class="hoveback-logos back-grid-img <?php echo esc_attr( $animation ); ?>" src="<?php echo esc_url( $image ); ?>" alt="image">
                                            <img class="mains-logos back-grid-img <?php echo esc_attr( $animation ); ?>" src="<?php echo esc_url( $image ); ?>" alt="image"></a>
                                        </div>
                                    </div>
                                </div>           
                            <?php endforeach; ?>
                      
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
        <?php }

    }
}
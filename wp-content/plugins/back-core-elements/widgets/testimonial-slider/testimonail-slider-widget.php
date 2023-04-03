<?php
/**
 * Elementor testimonial Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class back_Testimonial_Slider_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve testimonial widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'back-testimonial-slider';
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
        return esc_html__( 'Back Testimonial Slider', 'back' );
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
        return 'glyph-icon flaticon-slider-2';
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
            'testimonial_style',
            [
                'label'   => esc_html__( 'Select Testimonial Style', 'back' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [                  
                    'style1' => esc_html__( 'Style 1', 'back'),
                    'style2' => esc_html__( 'Style 2', 'back'),
                ],
            ]
        );

        $this->add_control(
            'testimonial_category',
            [
                'label'   => esc_html__( 'Category', 'back' ),
                'type'    => Controls_Manager::SELECT2,
                
                'options'   => $this->getCategories(),
                'multiple' => true, 
                'separator' => 'before',        
            ]

        );
        

        $this->add_control(
            'per_page',
            [
                'label' => esc_html__( 'Testimonial Show Per Page', 'back' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '5', 'back' ),
                'separator' => 'before',
            ]
        );  

        $this->add_control(
            'align',
            [
                'label' => esc_html__( 'Content Alignment', 'back' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
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
                   
                ],
                'toggle' => false,
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .testimonial-items .back-content' => 'text-align: {{VALUE}}'
                ]
               
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
            'icon_type',
            [
                'label'   => esc_html__( 'Select Icon Type', 'back' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'image',            
                'options' => [                  
                    'image' => esc_html__( 'Image', 'back'),                                
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'selected_image',
            [
                'label' => esc_html__( 'Choose Quote Image', 'back' ),
                'type'  => Controls_Manager::MEDIA,             
                
                'condition' => [
                    'icon_type' => 'image',
                ],
                'separator' => 'before',
            ]
        );


        $this->end_controls_section();

         $this->start_controls_section(
            '_section_ratings',
            [
                'label' => esc_html__( 'Ratings', 'back' ),
            ]
        );

        $this->add_control(
            'show_ratings',
            [
                'label'        => esc_html__( 'Show', 'back' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'back' ),
                'label_off'    => esc_html__( 'Hide', 'back' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );    
       

        $this->end_controls_section();

         $this->start_controls_section(
            'content_slider',
            [
                'label' => esc_html__( 'Slider Settings', 'back' ),
                'tab'   => Controls_Manager::TAB_CONTENT,               
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

        $this->add_responsive_control(
            'arrows_tops_positions',
            [
                'label'      => esc_html__( 'Top Position', 'back' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -5000,
                        'max' => 5000,
                    ],
                ],
             
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-prev' => 'top: {{SIZE}}{{UNIT}}; visibility: visible;',
                ],
                'separator' => 'before',
            ]
        );  

        $this->add_responsive_control(
            'arrows_lefts_positions',
            [
                'label'      => esc_html__( 'Left Position', 'back' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -5000,
                        'max' => 5000,
                    ],
                ],
             
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-prev' => 'left: {{SIZE}}{{UNIT}}; visibility: visible;',
                ],
                'separator' => 'before',
            ]
        );  

        $this->add_responsive_control(
            'arrow_tos_positions',
            [
                'label'      => esc_html__( 'Top Position', 'back' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -5000,
                        'max' => 5000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-next' => 'top: {{SIZE}}{{UNIT}}; visibility: visible;',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'arrows_rights_positions',
            [
                'label'      => esc_html__( 'Right Position', 'back' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -5000,
                        'max' => 5000,
                    ],
                ],          
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-next' => 'right: {{SIZE}}{{UNIT}}; visibility: visible;',
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
            'item_gap_custom',
            [
                'label' => esc_html__( 'Item Middle Gap', 'back' ),
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
                    '{{WRAPPER}} .back-clients-slider .inner-items' => 'margin-left:{{SIZE}}{{UNIT}};',     
                    '{{WRAPPER}} .back-clients-slider .inner-items' => 'margin-right:{{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 

         $this->add_control(
            'item_gap_custom_bottom',
            [
                'label' => esc_html__( 'Item Bottom Gap', 'back' ),
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
                    '{{WRAPPER}} .back-clients-slider .inner-items' => 'margin-bottom:{{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 
                
        $this->end_controls_section();

        $this->start_controls_section(
            'section_default_style',
            [
                'label' => esc_html__( 'Default Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item__bg',
            [
                'label' => esc_html__( 'Item Bg', 'back' ),
                'type' => Controls_Manager::COLOR,            
                'selectors' => [
                    '{{WRAPPER}} .back-clients-slider .inner-items, {{WRAPPER}} .back-clients-slider .inner-items .back-bottom' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item__border',
                'selector' => '{{WRAPPER}} .back-clients-slider .inner-items',
            ]
        );

        $this->add_responsive_control(
            'item_default_area',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-clients-slider2 .inner-items .back-testimonial-content, {{WRAPPER}} .back-clients-slider .inner-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__( 'Title/Designation/Ratings', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-clients-slider .inner-items .back-bottom .back-author-name em, {{WRAPPER}} .back-clients-slider2 .inner-items .back-bottom .back-author-name' => 'color: {{VALUE}};',             

                ],                
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-clients-slider .inner-items .back-bottom .back-author-name em',                     
            ]
        );


        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Designation Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .back-clients-slider .inner-items .back-bottom .back-author-name, {{WRAPPER}} .back-clients-slider2 .inner-items .back-bottom .back-author-name em' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => esc_html__( 'Designation Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-clients-slider .inner-items .back-bottom .back-author-name',                    
            ]
        );  

        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_content_style',
            [
                'label' => esc_html__( 'Testimonial Content', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Content Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-clients-slider .inner-items .back-content, {{WRAPPER}} .back-clients-slider .inner-items .back-content p, {{WRAPPER}} .back-clients-slider2 .inner-items .back-testimonial-content p' => 'color: {{VALUE}};',                    

                ],                
            ]
        );

        $this->add_responsive_control(
            'caontent__padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-clients-slider2 .inner-items .back-testimonial-content div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'testimonial_style' => 'style2'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => esc_html__( 'Content Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-clients-slider .inner-items .back-content, {{WRAPPER}} .back-clients-slider .inner-items .back-content p, {{WRAPPER}} .back-clients-slider2 .inner-items .back-testimonial-content p'
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'section_quote_style',
            [
                'label' => esc_html__( 'Quote Image', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_width_author',
            [
                'label' => esc_html__( 'Width', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-clients-slider2 .inner-items .back-content .quote-image img, {{WRAPPER}} .back-clients-slider .inner-items .back-content .quote-image img' => 'width: {{SIZE}}{{UNIT}};',                    
                ],
                'condition' => [
                    'icon_type' => 'image',
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_slider_style_arrow',
            [
                'label' => esc_html__( 'Slider Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,

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
            'navigation_arrow_background_hover',
            [
                'label' => esc_html__( 'Background Hover', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-addon-slider .slick-next:hover, .back-addon-slider .slick-prev:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .back-addon-slider .slick-next:hover, .back-addon-slider .slick-next:hover' => 'background: {{VALUE}};',

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
            'navigation_arrow_icon_color_hover',
            [
                'label' => esc_html__( 'Icon Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-addon-slider .slick-next:hover:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .back-addon-slider .slick-prev:hover:before' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'selector' => '{{WRAPPER}} .back-addon-slider .slick-next, {{WRAPPER}} .back-addon-slider .slick-prev',
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
                'label' => esc_html__( 'Background Color (Default)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-dots li button' => 'background-color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Background Color (Active)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-dots li.slick-active button' => 'background-color: {{VALUE}};',
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
            <?php if('style1' == $settings['testimonial_style']){?>  
            <div class="back-unique-slider back-clients-slider">
            <?php } else { ?>
                <div class="back-unique-slider back-clients-slider2">
            <?php } ?>
                <?php if('style1' == $settings['testimonial_style']){?> 
                    <div id="back-slick-slider-<?php echo esc_attr($unique); ?>" class="back-addon-slider" >
                        <?php
                            $url = plugin_dir_url( __FILE__ );
                            $cat = $settings['testimonial_category'];
                            if(empty($cat)){
                                $best_wp = new wp_Query(array(
                                    'post_type'      => 'testimonials',
                                    'posts_per_page' => $settings['per_page'],                              
                                ));   
                            }   
                            else{
                                $best_wp = new wp_Query(array(
                                   
                                    'post_type'      => 'testimonials',
                                    'posts_per_page' => $settings['per_page'],              
                                    'tax_query'      => array(
                                        array(
                                            'taxonomy' => 'testimonial-category',
                                            'field'    => 'slug', //can be set to ID
                                            'terms'    => $cat //if field is ID you can reference by cat/term number
                                        ),
                                    )
                                ));   
                            }                           

                            while($best_wp->have_posts()): $best_wp->the_post();
                            $designation  = !empty(get_post_meta( get_the_ID(), 'designation', true )) ? get_post_meta( get_the_ID(), 'designation', true ):'';
                            $ratings  = !empty(get_post_meta( get_the_ID(), 'ratings', true )) ? get_post_meta( get_the_ID(), 'ratings', true ):''; 
                            ?>                           
                              
                            <div class="testimonial-items">
                                <div class="inner-items">
                                    <div class="back-top">
                                        <?php if($settings['show_ratings'] == 'yes' && $ratings != ''): ?>
                                            <div class="ratings"><img src="<?php echo esc_url($url); ?>/img/<?php echo esc_html($ratings); ?>.png" alt="ratings" /></div>
                                        <?php endif;?> 
                                    </div>
                                    <div class="back-content">
                                        <?php if(!empty($settings['selected_image']['url'])) :?>
                                            <span class="quote-image"><img src="<?php echo esc_url( $settings['selected_image']['url'] );?>" alt="image"/></span>
                                        <?php endif;?>
                                        <?php the_content(); ?> 
                                    </div>
                                    <div class="back-bottom">
                                        <span class="back-author">
                                            <?php the_post_thumbnail($settings['thumbnail_size']); ?>
                                        </span>
                                        <span class="back-author-name">
                                            <em><?php the_title();?></em> 
                                            <?php echo esc_html( $designation );?>
                                        </span>                                    
                                    </div>
                                </div>
                            </div>
                                
                            <?php   
                            endwhile;
                            wp_reset_query(); 

                         ?>  
                    </div>
                <?php } else { ?>
                    <div id="back-slick-slider-<?php echo esc_attr($unique); ?>" class="back-addon-slider">
                        <?php
                            $url = plugin_dir_url( __FILE__ );

                            $cat = $settings['testimonial_category'];
                            if(empty($cat)){
                                $best_wp = new wp_Query(array(
                                    'post_type'      => 'testimonials',
                                    'posts_per_page' => $settings['per_page'],                              
                                ));   
                            }   
                            else{
                                $best_wp = new wp_Query(array(
                                   
                                    'post_type'      => 'testimonials',
                                    'posts_per_page' => $settings['per_page'],              
                                    'tax_query'      => array(
                                        array(
                                            'taxonomy' => 'testimonial-category',
                                            'field'    => 'slug', //can be set to ID
                                            'terms'    => $cat //if field is ID you can reference by cat/term number
                                        ),
                                    )
                                ));   
                            }

                            while($best_wp->have_posts()): $best_wp->the_post();
                            $designation  = !empty(get_post_meta( get_the_ID(), 'designation', true )) ? get_post_meta( get_the_ID(), 'designation', true ):'';
                            $ratings  = !empty(get_post_meta( get_the_ID(), 'ratings', true )) ? get_post_meta( get_the_ID(), 'ratings', true ):''; 
                            ?>                           
                              
                            <div class="testimonial-items">

                                <div class="inner-items">
                                    <div class="back-author">
                                        <?php the_post_thumbnail($settings['thumbnail_size']); ?>
                                    </div>
                                    <div class="back-testimonial-content">
                                        
                                        <div class="back-content">
                                            <?php if(!empty($settings['selected_image']['url'])) :?>
                                                <span class="quote-image"><img src="<?php echo esc_url( $settings['selected_image']['url'] );?>" alt="image"/></span>
                                            <?php endif;?>
                                            <div><?php if($settings['show_ratings'] == 'yes' && $ratings != ''): ?>
                                                <img src="<?php echo esc_url($url); ?>/img/<?php echo esc_html($ratings); ?>.png" class="back__star" alt="ratings" />
                                            <?php endif;?><?php the_content(); ?></div>
                                        </div>
                                        <div class="back-bottom">                                        
                                            <span class="back-author-name">
                                                <em><?php the_title();?></em> 
                                                <?php echo esc_html( $designation );?>
                                            </span>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <?php   
                            endwhile;
                            wp_reset_query(); 

                         ?>  
                    </div>
                <?php } ?>
                <div class="back-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
            </div>



            <?php if(('style1' == $settings['testimonial_style']) || ('style2' == $settings['testimonial_style'])):?>  
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
            <?php endif; ?>
        <?php        
    }

    public function getCategories(){
         $cat_list = [];
         if ( post_type_exists( 'testimonials' ) ) { 
          $terms = get_terms( array(
             'taxonomy'    => 'testimonial-category',
             'hide_empty'  => true            
         ) );
       
        foreach($terms as $post) {

          $cat_list[$post->slug]  = [$post->name];

        }
      }  
        return $cat_list;
     }
}
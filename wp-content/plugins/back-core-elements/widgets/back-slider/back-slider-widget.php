<?php
/**
 * Logo widget class
 *
 */

use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class back_banner_Slider_Widget extends \Elementor\Widget_Base {
    /**
     * Get widget name.
     *
     * Retrieve Back Slider Widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'back-hero-slider';
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
        return esc_html__( 'Back Hero Slider', 'back' );
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
        return [ 'slider', 'slide', 'banner', 'image' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__( 'Back Slider', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Slide', 'back'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $repeater->add_control(
            'sub_text',
            [
                'label' => esc_html__('Slide Sub Text', 'back'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'back'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Slide Sub Text', 'back' ),
                'separator'   => 'before',
            ]
        );        

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Slide Text', 'back'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'back'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Slide Text', 'back' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Slide Description', 'back'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('', 'back'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Description', 'back' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'back'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'back'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Disover More', 'back' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label'       => esc_html__( ' Button Link', 'back' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,                      
            ]
        );

        
        $this->add_control(
            'slide_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
                'default' => [
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
            ]
        );  

        $this->add_control(
            'video_link',
            [
                'label'       => esc_html__( 'Video Link', 'back' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Video Link', 'back' ),                     
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
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .hero-inner-slide' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_sub_title_style_grid',
            [
                'label' => esc_html__( 'Sub Title Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}}  .back-hero-slider .hero-inner-slide .sub-title h4',
                'separator'   => 'before',
            ]
        );

        $this->add_responsive_control(
            'sub_title_padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .sub-title h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .sub-title h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_title_style_grid',
            [
                'label' => esc_html__( 'Title Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}}  .back-hero-slider .hero-inner-slide .slider-title .title',
                'separator'   => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .slider-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .slider-title .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_desc_style_grid',
            [
                'label' => esc_html__( 'Description Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}}  .back-hero-slider .hero-inner-slide .slider-desc',
                'separator'   => 'before',
            ]
        );

        $this->add_responsive_control(
            'desc_padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .slider-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .slider-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_button_style_grid',
            [
                'label' => esc_html__( 'Button Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Color (Normal)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .back-slide-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_color_hover',
            [
                'label' => esc_html__( 'Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .back-slide-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_bg',
            [
                'label' => esc_html__( 'Background (Normal)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .back-slide-btn' => 'background: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'btn_bg_hover',
            [
                'label' => esc_html__( 'Background (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .back-slide-btn:hover' => 'background: {{VALUE}};',
                ],                
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}}  .back-hero-slider .hero-inner-slide .back-slide-btn',
                'separator'   => 'before',
            ]
        );

        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .back-slide-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );        

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__( 'Margin', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .back-slide-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_video_style_grid',
            [
                'label' => esc_html__( 'Video Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color (Normal)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .video-icon:after' => 'border-left-color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'border_color_animision',
            [
                'label' => esc_html__( 'Border Color (Animation)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .video-icon:after' => 'border-top-color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'border_color_animision2',
            [
                'label' => esc_html__( 'Border Color (Animation)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .video-icon:after' => 'border-right-color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'border_color_animision3',
            [
                'label' => esc_html__( 'Border Color (Animation)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .video-icon:after' => 'border-bottom-color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'video_icon_color',
            [
                'label' => esc_html__( 'Video Icon Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-hero-slider .hero-inner-slide .video-icon .popup-videos i' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_slider_style',
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
                    '{{WRAPPER}} .back-unique-slider .slick-next, {{WRAPPER}} .back-unique-slider .slick-prev' => 'background: {{VALUE}};',
                ],                
            ]
        );

        $this->add_control(
            'navigation_arrow_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-prev::before' => 'color: {{VALUE}};',
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
                'label' => esc_html__( 'Background Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-dots li.slick-active button' => 'background-color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'navigation_dot_icon_background',
            [
                'label' => esc_html__( 'Background Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-unique-slider .slick-dots li button:hover, {{WRAPPER}} .back-unique-slider .slick-dots li.slick-active button' => 'background: {{VALUE}};',
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
                    '{{WRAPPER}} .back-unique-slider .slick-dots' => 'margin-top:{{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $autoplaySpeed   = $settings['slider_autoplay_speed'];
        $slider_autoplay = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
        $pauseOnHover    = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
        $sliderDots      = $settings['slider_dots'] == 'true' ? 'true' : 'false';
        $sliderNav       = $settings['slider_nav'] == 'true' ? 'true' : 'false';        
        $infinite        = $settings['slider_loop'] === 'true' ? 'true' : 'false';
        $unique = rand(2012,35120);

        $slider_conf = compact('autoplaySpeed', 'slider_autoplay', 'pauseOnHover', 'sliderDots', 'sliderNav', 'infinite');   

        if ( empty($settings['slide_list'] ) ) {
            return;
        }
        ?>

            <div class="back-unique-slider back-hero-slider">
                <div id="back-slick-slider-<?php echo esc_attr($unique); ?>" class="back-addons-slider">                        
                <?php
                    foreach ( $settings['slide_list'] as $index => $item ) :
                        $image = wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = Utils::get_placeholder_image_src();
                        }                                
                        $sub_text           = !empty($item['sub_text']) ? $item['sub_text'] : '';                                
                        $title              = !empty($item['name']) ? $item['name'] : '';                                
                        $title_tag          = !empty($settings['title_tag']) ? $settings['title_tag'] : 'h1';
                        $description        = !empty($item['description']) ? $item['description'] : '';
                        $button_text        = !empty($item['button_text']) ? $item['button_text'] : '';
                        $target             = !empty($item['button_link']['is_external']) ? 'target=_blank' : '';
                        $link               = !empty($item['button_link']['url']) ? $item['button_link']['url'] : '';                        
                        ?>
                        <div class="slide-item">
                            <?php if(!empty($item['image']['url'])){?>  
                            <div  class="back-hero-slide" style="background-image: url(<?php echo $image; ?>);">
                            <?php } else { ?>
                                <div  class="back-hero-slide">
                            <?php } ?>
                                <div class="hero-inner-slide">  
                                    <div class="container">                              
                                        <?php if(!empty($item['sub_text'])):?>                                            
                                            <div class="sub-title">
                                                <h4 class="sub-title"> <?php echo wp_kses_post($sub_text);?></h4>                                   
                                            </div>                                           
                                        <?php endif;?>

                                        <?php if(!empty($item['name'])):?>                                            
                                            <div class="slider-title">
                                                <<?php echo esc_attr($title_tag);?> class="title"> <?php echo wp_kses_post($title);?></<?php echo esc_attr($title_tag);?>>                                   
                                            </div>                                           
                                        <?php endif;?>
                                        <?php if(!empty($item['description'])):?>                                            
                                            <div class="slider-desc">
                                                <p class="description"> <?php echo wp_kses_post($description);?> </p>
                                            </div>
                                        <?php endif;?>


                                        <?php if(!empty($item['button_text'])):?> 
                                            <a href="<?php echo esc_url($link);?>" class="back-slide-btn" <?php echo esc_attr($target);?>><?php echo esc_attr($button_text);?></a> 
                                        <?php endif; ?> 

                                        <?php if( !empty( $settings['video_link'])) : ?>
                                            <div class="video-icon">
                                                <a class="popup-videos" href="<?php echo esc_url($settings['video_link']);?>">
                                                    <i class="ri-play-fill"></i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>                                       
                                </div>                                       
                            </div>
                        </div>           
                    <?php endforeach; ?>   
                </div>
                <div class="back-slider-conf wpsisac-hide" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
            </div>
            <script type="text/javascript"> 
                jQuery(document).ready(function(){
                    jQuery( '.back-addons-slider' ).each(function( index ) {        
                    var slider_id       = jQuery(this).attr('id'); 
                    var slider_conf     = jQuery.parseJSON( jQuery(this).closest('.back-unique-slider').find('.back-slider-conf').attr('data-conf'));
                   
                    if( typeof(slider_id) != 'undefined' && slider_id != '' ) {
                    jQuery('#'+slider_id).not('.slick-initialized').slick({
                    slidesToShow    : 1,
                    centerMode      : false,
                    dots            : (slider_conf.sliderDots)  == "true" ? true : false,
                    arrows          : (slider_conf.sliderNav) == "true" ? true : false,
                    autoplay        : (slider_conf.slider_autoplay) == "true" ? true : false,
                    slidesToScroll  : 1,
                    centerPadding   : '0px',
                    autoplaySpeed   : parseInt(slider_conf.autoplaySpeed),
                    pauseOnHover    : (slider_conf.pauseOnHover) == "true" ? true : false,
                    loop : (slider_conf.infinite)  == "true" ? true : false,
                    });
                }
                });
            });
            </script>
        <?php

    }
}
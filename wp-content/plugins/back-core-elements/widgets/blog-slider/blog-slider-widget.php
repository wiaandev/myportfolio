<?php
/**
 * Elementor Blog Slider Widget.
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

defined( 'ABSPATH' ) || die();

class back_Blog_Slider_Widget extends \Elementor\Widget_Base {

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
        return 'backblog-slider';
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
        return esc_html__( 'Back Blog Slider', 'back' );
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
        return 'glyph-icon flaticon-slider-1';
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

        $category_dropdown[0] = 'Select Category';
        
        $terms  = get_terms( array( 'taxonomy' => "category", 'fields' => 'id=>name' ) );       
        foreach ( $terms as $id => $name ) {
            $category_dropdown[$id] = $name;
        } 


        //Title Settings Here
        $this->start_controls_section(
            '_title_settings',
            [
                'label' => esc_html__( 'Title Settings', 'back' ),
            ]
        ); 

        $this->add_control(
            'blog_title_show_hide',
            [
                'label' => esc_html__( 'Title', 'back' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'options' => [
                    'label_on' => esc_html__( 'Show', 'back' ),
                    'label_off' => esc_html__( 'Hide', 'back' ),
                ],                
            ]
        ); 

        $this->add_control(
            'blog_title_word_show',
            [
                'label' => esc_html__( 'Word Limit', 'back' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( '200', 'back' ),
                'condition' => [
                    'blog_title_show_hide' => 'yes',
                ]
            ]
        );  

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content Settings', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

       
        $this->add_control(
            'category',
            [
                'label'   => esc_html__( 'Category', 'back' ),
                'type'    => Controls_Manager::SELECT2, 
                'default' => 0,         
                'options' => [      
                        
                ]+ $category_dropdown,
                'multiple' => true, 
                'separator' => 'before',        
            ]

        );
        


        $this->add_control(
            'per_page',
            [
                'label' => esc_html__( 'Blog Show Per Page', 'back' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '6', 'back' ),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_content_postion_style',
            [
                'label' => esc_html__( 'Content Style', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__( 'Default', 'back' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_category_style',
            [
                'label' => esc_html__( 'Category Style', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__( 'Default', 'back' ),
                    'style2' => esc_html__( 'Top', 'back' ),
                ],                
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'blog_avatar_show_hide',
            [
                'label' => esc_html__( 'Author Show/Hide', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'back' ),
                    'no' => esc_html__( 'No', 'back' ),
                ],                
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'blog_cat_show_hide',
            [
                'label' => esc_html__( 'Category Show/Hide', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'back' ),
                    'no' => esc_html__( 'No', 'back' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_meta_show_hide',
            [
                'label' => esc_html__( 'Date Show/Hide', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'back' ),
                    'no' => esc_html__( 'No', 'back' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_content_show_hide',
            [
                'label' => esc_html__( 'Description Show/Hide', 'back' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'back' ),
                    'no' => esc_html__( 'No', 'back' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_word_show',
            [
                'label' => esc_html__( 'Show Content Limit', 'back' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( '20', 'back' ),
                'separator' => 'before',
                'condition' => [
                    'blog_content_show_hide' => 'yes',
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
                    '{{WRAPPER}} .back-blog-grid .blog-down-wrap' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_button',
            [
                'label' => esc_html__( 'Button Settings', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'blog_btn_text',
            [
                'label' => esc_html__( 'Blog Button Text', 'back' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
                'placeholder' => esc_html__( 'Blog Button Text', 'back' ),
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'blog_btn_text_color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .blog-back-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
         $this->add_control(
            'blog_btn_text_hover_color',
            [
                'label' => esc_html__( 'Color (Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .blog-back-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'blog_btn_text_typography',
                'selector' => '{{WRAPPER}} .blog-back-btn',
            ]
        );

        $this->end_controls_section();

        //start slider settings
        $this->start_controls_section(
            'section_slider_settings',
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

        $this->end_controls_section(); //end slider settings


        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__( 'Blog Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'blog_item_bg_color',
            [
                'label' => esc_html__( 'Item Bg Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blog_meta_color',
            [
                'label' => esc_html__( 'Meta Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap .blog-meta' => 'color: {{VALUE}};',

                ],                
            ]
        );
      
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap .post-title a' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Color(Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap .post-title a:hover' => 'color: {{VALUE}};',
                ],                
            ]

            
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Title Typography', 'back' ),
                'selector' => 
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap .post-title',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Content Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .back-excerpt' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'category_icon_color',
            [
                'label' => esc_html__( 'Category Icon Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap .category_list:before' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => esc_html__( 'Category Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap .category_list ul li a' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'category_hover',
            [
                'label' => esc_html__( 'Category  Color(Hover)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap .category_list ul li a:hover' => 'color: {{VALUE}};',

                ],                
            ]
        );

        $this->add_control(
            'meta_border__color',
            [
                'label' => esc_html__( 'Meta Border Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap .blog-meta' => 'border-color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_responsive_control(
            'blog_content_padding',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 30,
                ],  
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .blog-down-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-blog-grid .blog-inner-wrap .image-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),
                'selector' => '{{WRAPPER}} .back-blog-grid .blog-inner-wrap',
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
       
        $unique = rand(100,31120);

        $slider_conf = compact('slidesToShow', 'autoplaySpeed', 'interval', 'slidesToScroll', 'slider_autoplay','pauseOnHover', 'sliderDots', 'sliderNav', 'infinite', 'centerMode', 'col_lg', 'col_md', 'col_sm', 'col_xs');
        ?>
            <div class="back-unique-slider back-blog-grid">
                <div id="back-slick-slider-<?php echo esc_attr($unique); ?>" class="back-addon-slider">
                    <?php 
                        $cat = $settings['category'];
                        if(empty($cat)){
                            $back_best_wp = new wp_Query(array(
                                'post_type'      => 'post',
                                'posts_per_page' => $settings['per_page'],              
                            ));   
                        }   
                        else{
                            $back_best_wp = new wp_Query(array(
                                'post_type'      => 'post',
                                'posts_per_page' => $settings['per_page'],
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field'    => 'term_id', 
                                        'terms'    => $cat 
                                    ),
                                )
                            ));   
                        }
                      
                        while($back_best_wp->have_posts()): $back_best_wp->the_post(); 

                        $full_date      = get_the_date();
                        $blog_date      = get_the_date('d M Y');    
                        $post_admin     = get_the_author();

                        if(!empty($settings['blog_word_show'])){
                            $limit = $settings['blog_word_show'];
                        }
                        else{
                            $limit = 20;
                        }

                        if(!empty($settings['blog_title_word_show'])){
                            $limits = $settings['blog_title_word_show'];
                        }
                        else{
                            $limits = 200;
                        }

                        ?>                       
                        <div class="blog-item <?php echo esc_html($settings['blog_content_postion_style']);?> cate__<?php echo esc_html($settings['blog_category_style']);?>">
                            <div class="blog-inner-wrap">
                                <div class="image-wrap">
                                    <a href="<?php the_permalink();?>">
                                        <?php the_post_thumbnail($settings['thumbnail_size']); ?>
                                    </a> 
                                </div>
                                <div class="blog-down-wrap">
                                    <?php if(($settings['blog_cat_show_hide'] == 'yes') ){ ?>
                                        <div class="category_list">
                                            <?php the_category( ); ?>
                                        </div>
                                    <?php } ?>
                                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"> <?php echo wp_trim_words( get_the_title(), $limits, '' ); ?> </a></h3>
                                    <?php if(($settings['blog_content_show_hide'] == 'yes') ){ ?>
                                        <div class="back-excerpt"><?php echo wp_trim_words( get_the_content(), $limit, '...' ); ?></div>
                                    <?php } ?>

                                    <?php if(!empty($settings['blog_btn_text'])){ ?>
                                        <div class="back-blog-btn-part">
                                            <a class="blog-back-btn" href="<?php the_permalink(); ?>">
                                                <?php echo esc_html($settings['blog_btn_text']);?> <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                                    <?php if(($settings['blog_avatar_show_hide'] == 'yes') || ($settings['blog_meta_show_hide'] == 'yes')){ ?>
                                        <div class="blog-meta">
                                            <?php if(($settings['blog_meta_show_hide'] == 'yes') ){ ?>
                                                <div class="date"> <i class="ri-calendar-line"></i> <?php echo esc_html($blog_date);?></div>
                                            <?php } ?>
                                            <?php if(($settings['blog_avatar_show_hide'] == 'yes') ){ ?>
                                                 
                                                <?php if(!empty($post_admin)){ ?>                                                    
                                                    <div class="admin"><?php echo get_avatar(get_the_author_meta( 'ID' ), 30);?><?php echo esc_html($post_admin);?></div>
                                                <?php } ?>
                                            <?php } ?> 
                                        </div>
                                    <?php } ?> 
                                </div>   
                            </div>
                        </div>
                        <?php
                        endwhile;
                        wp_reset_query();  ?>
                
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
            centerPadding   : '0px',
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
}?>
<?php
/**
 * Elementor portfolio Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class back_Elementor_pro_portfolio_Grid_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve Portfolio widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'back-portfolio';
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
        return __( 'Back Portfolio Filter', 'back' );
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
        return 'glyph-icon flaticon-grid';
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
            'portfolio_grid_style',
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
                'label' => esc_html__( 'Project Show Per Page', 'back' ),
                'type' => Controls_Manager::TEXT,
                'default' => -1,
                'separator' => 'before',
            ]
        );
    
        $this->add_control(
            'portfolio_columns',
            [
                'label'   => esc_html__( 'Columns', 'back' ),
                'type'    => Controls_Manager::SELECT,              
                'options' => [
                    '6' => esc_html__( '2 Column', 'back' ),
                    '4' => esc_html__( '3 Column', 'back' ),
                    '3' => esc_html__( '4 Column', 'back' ),
                    '2' => esc_html__( '6 Column', 'back' ),
                    '1' => esc_html__( '1 Column', 'back' ),                 
                ],
                'separator' => 'before',                            
            ]
        );

        $this->add_control(
            'show_filter',
            [
                'label'   => esc_html__( 'Show Filter', 'back' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'filter_show', 
                'condition' => [
                    'portfolio_grid_style!' => ['9', '8']
                ],          
                'options' => [
                    'filter_show' => 'Show',
                    'filter_hide' => 'Hide',                
                ],                                          
            ]
        );

        $this->add_control(
            'filter_title',
            [
                'label' => esc_html__( 'Filter Default Title', 'back' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'All',
                'condition' => [
                    'show_filter' => 'filter_show',
                ],
                'condition' => [
                    'portfolio_grid_style!' => ['9', '8']
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
                    '{{WRAPPER}} .single-case-studies' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );   


        $this->add_control(
            'gap_conditon',
            [
                'label' => esc_html__( 'left Right Gap', 'back' ),
                'type' => Controls_Manager::SELECT,
                'separator' => 'before',
                'options' => [
                    ''   => 'Yes',
                    'no-gutters' => 'No'                
                ],  
                'default' => '',
            ]
        ); 
                
        $this->end_controls_section();


        $this->start_controls_section(
            'menu_style',
            [
                'label' => esc_html__( 'Menu Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_filter' => 'filter_show',
            ]
        );

        $this->add_responsive_control(
            'align_filter',
            [
                'label' => esc_html__( 'Alignment Filter Menu', 'back' ),
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
                    '{{WRAPPER}} .portfolio-filter' => 'text-align: {{VALUE}}'
                ],
                'separator' => 'before',
                'condition' => [
                    'show_filter' => 'filter_show',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_menu' );

        $this->start_controls_tab(
            '_tab_menu_normal',
            [
                'label' => esc_html__( 'Normal', 'back' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'menu_bg_color',
                'label' => esc_html__( 'Background Color', 'back' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .portfolio-filter button'
            ]
        );

        $this->add_control(
            'menu_color',
            [
                'label' => esc_html__( 'Menu Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter button' => 'color: {{VALUE}};',                   

                ],                
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'label' => esc_html__( 'Title Typography', 'back' ),
                'selector' => '{{WRAPPER}} .portfolio-filter button',                    
            ]
        );

        $this->add_control(
            'menu_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'menu_padding_area',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'menu_margin_area',
            [
                'label' => esc_html__( 'Margin', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'menu_box_shadow',
                'selector' => '{{WRAPPER}} .portfolio-filter button',
            ]
        );

        

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_menu_hover',
            [
                'label' => esc_html__( 'Hover', 'back' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'menu_bg_color_active',
                'label' => esc_html__( 'Background Color', 'back' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .portfolio-filter button.active, {{WRAPPER}} .portfolio-filter button:hover'
            ]
        );

        $this->add_control(
            'menu_active_color',
            [
                'label' => esc_html__( 'Menu Active Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter button.active, {{WRAPPER}} .portfolio-filter button:hover' => 'color: {{VALUE}};',                   

                ],                
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        
        $this->start_controls_section(
            'section_slider_style',
            [
                'label' => esc_html__( 'General Style Here', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'portfoli_overly_color',
            [
                'label' => esc_html__( 'Background Color (Overlay)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .inner-case-studies:before, {{WRAPPER}} .back-case-studies .single-case-studies .case-img::before' => 'background-color: {{VALUE}}; opacity: 1;',
                    '{{WRAPPER}} .back-case-studies .single-case-studies .inner-case-studies::after' => 'opacity: 0;',
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-img img' => 'mix-blend-mode: normal;',
                ],
            ]
        );

        $this->end_controls_section();


        //Title Settings Here
        $this->start_controls_section(
            '__title_style_here',
            [
                'label' => esc_html__( 'Title Style Here', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title a' => 'color: {{VALUE}};',                   

                ],                
            ]
        );

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Hover Color', 'back' ),
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
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-title',                    
            ]
        );

        $this->end_controls_section();


        //Category Settings Here
        $this->start_controls_section(
            '__category_style_here',
            [
                'label' => esc_html__( 'Category Style Here', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                'label' => esc_html__( 'Category Hover Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-subtitle a:hover' => 'color: {{VALUE}};',                    
                ],                
            ]
        ); 

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'label' => esc_html__( 'Category Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-case-studies .single-case-studies .case-content .case-subtitle a',                    
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
    ?>
        <div class="back-case-studies back-portfolio-filter-style<?php echo esc_attr($settings['portfolio_grid_style']); ?> back-portfolio-filter">
            <?php if('filter_show' == $settings['show_filter']){?>
                <div class="back-filter portfolio-filter">
                    <button class="active" data-filter="*"><?php echo esc_html($settings['filter_title']);?></button>

                    <?php $taxonomy = "portfolio-category";
                        $select_cat = $settings['portfolio_category'];
                        foreach ($select_cat as $catid) {
                        $term = get_term_by('slug', $catid, $taxonomy);
                        $term_name  =  $term->name;
                        $term_slug  =  $term->slug;
                    ?>
                        <button data-filter=".filter_<?php echo esc_html($term_slug);?>"><?php echo esc_html($term_name);?></button>
                    <?php  } ?>

                </div>
            <?php } ?>
    
            <div class="grid row pi-grid <?php echo esc_html($settings['gap_conditon']);?>">

                <?php
                    if('1' == $settings['portfolio_grid_style']){
                        include plugin_dir_path(__FILE__)."/style1.php";
                    }                    
                ?>
            </div>
        </div>
    
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
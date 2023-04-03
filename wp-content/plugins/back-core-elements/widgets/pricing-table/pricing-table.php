<?php
/**
 * Pricing table widget class
 *
 */
use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

defined( 'ABSPATH' ) || die();

class back_Elementor_pro_Pricing_Table_Widget extends \Elementor\Widget_Base {

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
        return 'backprice';
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
        return esc_html__( 'Back Pricing Table', 'backaddon' );
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
        return 'glyph-icon flaticon-price';
    }


    public function get_categories() {
        return [ 'backthemecore_category' ];
    }

    public function get_keywords() {
        return [ 'pricing', 'table', 'package', 'product', 'plan' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            '_section_pricing',
            [
                'label' => esc_html__( 'Pricing Settings', 'backaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => esc_html__( 'Currency', 'backaddon' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    '' => esc_html__( 'None', 'backaddon' ),
                    'baht' => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'backaddon' ),
                    'bdt' => '&#2547; ' . _x( 'BD Taka', 'Currency Symbol', 'backaddon' ),
                    'dollar' => '&#36; ' . _x( 'Dollar', 'Currency Symbol', 'backaddon' ),
                    'euro' => '&#128; ' . _x( 'Euro', 'Currency Symbol', 'backaddon' ),
                    'franc' => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'backaddon' ),
                    'guilder' => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'backaddon' ),
                    'krona' => 'kr ' . _x( 'Krona', 'Currency Symbol', 'backaddon' ),
                    'lira' => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'backaddon' ),
                    'peseta' => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'backaddon' ),
                    'peso' => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'backaddon' ),
                    'pound' => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'backaddon' ),
                    'real' => 'R$ ' . _x( 'Real', 'Currency Symbol', 'backaddon' ),
                    'ruble' => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'backaddon' ),
                    'rupee' => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'backaddon' ),
                    'indian_rupee' => '&#8377; ' . _x( 'Rupee (Indian)', 'Currency Symbol', 'backaddon' ),
                    'shekel' => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'backaddon' ),
                    'won' => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'backaddon' ),
                    'yen' => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'backaddon' ),
                    'custom' => esc_html__( 'Custom', 'backaddon' ),
                ],
                'default' => 'dollar',
            ]
        );

        $this->add_control(
            'currency_custom',
            [
                'label' => esc_html__( 'Custom Symbol', 'backaddon' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'currency' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => esc_html__( 'Price', 'backaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => '24',
            ]
        );

        $this->add_control(
            'period',
            [
                'label' => esc_html__( 'Period', 'backaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Per Month', 'backaddon' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_header',
            [
                'label' => esc_html__( 'Header Settings', 'backaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'backaddon' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'default' => esc_html__( 'Basic', 'backaddon' ),
            ]
        );

        $this->end_controls_section();

        

        $this->start_controls_section(
            '_section_features',
            [
                'label' => esc_html__( 'Features Settings', 'backaddon' ),
            ]
        );

        $this->add_control(
            'features_title',
            [
                'label' => esc_html__( 'Title', 'backaddon' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Features', 'backaddon' ),
                'separator' => 'after',
            ]
        );


        $this->add_control(
            'icon_show',
            [
                'label' => esc_html__( 'Show', 'backaddon' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'backaddon' ),
                'label_off' => esc_html__( 'Hide', 'backaddon' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'icon_postion',
            [
                'label'   => esc_html__( 'Icon Position', 'backaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [                  
                    'left' => esc_html__( 'Left', 'backaddon'),
                    'right_position' => esc_html__( 'Right', 'backaddon'),
                ],
                'condition' => [
                    'icon_show' => 'yes'
                ]
            ]
        );

      
        $repeater = new Repeater();

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'backaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Exciting Feature', 'backaddon' ),

            ]
        );

        

        $repeater->add_control(
            'icon_show',
            [
                'label' => esc_html__( 'Show', 'backaddon' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'backaddon' ),
                'label_off' => esc_html__( 'Hide', 'backaddon' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater->add_control(
            'icon',
            [
                'label'   => esc_html__( 'Icon', 'backaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [                  
                    'ri ri-check-fill' => esc_html__( 'Check', 'backaddon'),
                    'fi ri-close-fill' => esc_html__( 'Cross', 'backaddon'),
                ],
                'condition' => [
                    'icon_show' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'features_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'text' => esc_html__( 'Awesome Features', 'backaddon' ),
                    ],
                    [
                        'text' => esc_html__( 'Responsive Pricing Table', 'backaddon' ),
                    ],
                    [
                        'text' => esc_html__( 'Yearly Subscribe', 'backaddon' ),
                    ],
                    [
                        'text' => esc_html__( 'Professional Design', 'backaddon' ),
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_footer',
            [
                'label' => esc_html__( 'Button Settings', 'backaddon' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'backaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Subscribe', 'backaddon' ),
                'placeholder' => esc_html__( 'Type button text here', 'backaddon' ),
                'label_block' => false,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Link', 'backaddon' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'https://example.com/', 'backaddon' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();
    
        $this->start_controls_section(
            '_section_style_general',
            [
                'label' => esc_html__( 'General', 'backaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'backaddon' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'backaddon' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'backaddon' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'backaddon' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'backaddon' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}  .elementor-widget-container' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->add_responsive_control(
            'general_padding',
            [
                'label' => esc_html__( 'Padding', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-price-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_responsive_control(
            'general_margin',
            [
                'label' => esc_html__( 'Margin', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-price-table' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->end_controls_section();       

        $this->start_controls_section(
            '_section_style_header',
            [
                'label' => esc_html__( 'Header', 'backaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => esc_html__( 'Bottom Spacing', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_header' );

        $this->start_controls_tab(
            'header_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'backaddon' ),
            ]
        ); 

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'title_bg',
                'label' => esc_html__( 'Background Color', 'backaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .back-pricing-table-header',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'backaddon' ),
            ]
        ); 

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'title_hover_bg',
                'label' => esc_html__( 'Hover Background Color', 'backaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .back-price-table:hover .back-pricing-table-header',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .back-pricing-table-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'selector' => '{{WRAPPER}} .back-pricing-table-title',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_pricing',
            [
                'label' => esc_html__( 'Pricing', 'backaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'pricing_inline',
            [
                'label' => esc_html__( 'Display Inline', 'backaddon' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Disable', 'backaddon' ),
                    'display-inline' => esc_html__( 'Enable', 'backaddon' ),
                    'display-inline2' => esc_html__( 'Enable 2', 'backaddon' ),
                ],
            ]
        );

        $this->add_control(
            '_heading_price',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Price', 'backaddon' ),
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => esc_html__( 'Padding', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_spacing',
            [
                'label' => esc_html__( 'Bottom Spacing', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_pricing' );

        $this->start_controls_tab(
            'pricing_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'backaddon' ),
            ]
        ); 

        $this->add_control(
            'price_color',
            [
                'label' => esc_html__( 'Price Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-price-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'price_bg',
                'label' => esc_html__( 'Background Color', 'backaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .back-pricing-table-price',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'pricing_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'backaddon' ),
            ]
        ); 

        $this->add_control(
            'price_hover_color',
            [
                'label' => esc_html__( 'Price Hover Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-price-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'price_hover_bg',
                'label' => esc_html__( 'Hover Background Color', 'backaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .back-price-table:hover .back-pricing-table-price',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .back-pricing-table-price .back-pricing-table-price-tag .back-pricing-table-price-text',
            ]
        );

        $this->add_control(
            '_heading_currency',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Currency', 'backaddon' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'currency_spacing',
            [
                'label' => esc_html__( 'Side Spacing', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-currency' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'currency_color',
            [
                'label' => esc_html__( 'Currency Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-currency' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'currency_hover_color',
            [
                'label' => esc_html__( 'Currency Hover Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-currency' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'currency_typography',
                'selector' => '{{WRAPPER}} .back-pricing-table-price .back-pricing-table-currency',
            ]
        );

        $this->add_control(
            '_heading_period',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Period', 'backaddon' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'period_padding',
            [
                'label' => esc_html__( 'Padding', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-period' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'period_spacing',
            [
                'label' => esc_html__( 'Top Spacing', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-period' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'period_color',
            [
                'label' => esc_html__( 'Period Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-period' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'period_hover_color',
            [
                'label' => esc_html__( 'Period Hover Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-period' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'period_typography',
                'selector' => '{{WRAPPER}} .back-pricing-table-period',
            ]
        );

        $this->add_control(
            '_heading_separator',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Separator', 'backaddon' ),
                'separator' => 'before',
                'condition' => [
                    'pricing_inline' => 'display-inline'
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_height',
            [
                'label' => esc_html__( 'Height', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-period::before' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pricing_inline' => 'display-inline'
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_width',
            [
                'label' => esc_html__( 'Width', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-period::before' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pricing_inline' => 'display-inline'
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_spacing_left',
            [
                'label' => esc_html__( 'Left Position', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-period::before' => 'left: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pricing_inline' => 'display-inline'
                ],
            ]
        );

        $this->add_responsive_control(
            'separator_spacing_top',
            [
                'label' => esc_html__( 'Top Position', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-period::before' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pricing_inline' => 'display-inline'
                ],
            ]
        );

        $this->add_control(
            'separator_color',
            [
                'label' => esc_html__( 'Separator Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-period::before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'pricing_inline' => 'display-inline'
                ],
            ]
        );

        $this->add_control(
            'seperator_hover_color',
            [
                'label' => esc_html__( 'Separator Hover Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-period::before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'pricing_inline' => 'display-inline'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_features',
            [
                'label' => esc_html__( 'Features', 'backaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'align_features',
            [
                'label' => esc_html__( 'Alignment', 'backaddon' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'backaddon' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'backaddon' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'backaddon' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'backaddon' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-features-list' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            '_heading_features_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Title', 'backaddon' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'features_title_spacing',
            [
                'label' => esc_html__( 'Bottom Spacing', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-features-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_title_color',
            [
                'label' => esc_html__( 'Feature Title Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-features-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'features_title_hover_color',
            [
                'label' => esc_html__( 'Feature Title Hover Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-features-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_title_typography',
                'selector' => '{{WRAPPER}} .back-pricing-table-features-title',
            ]
        );

        $this->add_control(
            '_heading_features_list',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'List', 'backaddon' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'features_list_padding',
            [
                'label' => esc_html__( 'List Padding', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-features-list > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-features-list li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_list_spacing',
            [
                'label' => esc_html__( 'Spacing Between', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-features-list > li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_list' );

        $this->start_controls_tab(
            'list_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'backaddon' ),
            ]
        ); 

        $this->add_control(
            'features_list_color',
            [
                'label' => esc_html__( 'List Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-features-list > li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'features_list_bg',
                'label' => esc_html__( 'Background Color', 'backaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .back-pricing-table-features-list > li',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'feature_list_border',
                'selector' => '{{WRAPPER}} .back-pricing-table-features-list li',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'list_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'backaddon' ),
            ]
        ); 

        $this->add_control(
            'features_list_hover_color',
            [
                'label' => esc_html__( 'List Hover Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-features-list > li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'features_list_hover_bg',
                'label' => esc_html__( 'Background Color', 'backaddon' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .back-price-table:hover .back-pricing-table-features-list > li',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'feature_list_hover_border',
                'selector' => '{{WRAPPER}} .back-pricing-table-features-list li',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_list_typography',
                'selector' => '{{WRAPPER}} .back-pricing-table-features-list > li',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_footer',
            [
                'label' => esc_html__( 'Button', 'backaddon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( '_tabs_footer' );

        $this->start_controls_tab(
            'footer_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'backaddon' ),
            ]
        ); 

        $this->add_responsive_control(
            'footer_padding',
            [
                'label' => esc_html__( 'Margin', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .btn-part' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'footer_border',
                'selector' => '{{WRAPPER}} .btn-part',
            ]
        );

        $this->add_control(
            'footer_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .btn-part' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'footer_box_shadow',
                'selector' => '{{WRAPPER}} .btn-part',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'footer_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'backaddon' ),
            ]
        ); 

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'footer_hover_border',
                'selector' => '{{WRAPPER}} .back-price-table .btn-part:hover',
            ]
        );


        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->add_control(
            '_heading_button',
            [
                'type' => Controls_Manager::HEADING,
                'label' => esc_html__( 'Button', 'backaddon' ),
            ]
        );


        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__( 'Padding', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );   
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .back-pricing-table-btn',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => esc_html__( 'Normal', 'backaddon' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => esc_html__( 'Text Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .back-pricing-table-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .back-pricing-table-btn',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => esc_html__( 'Hover', 'backaddon' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__( 'Text Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-btn:hover, {{WRAPPER}} .back-pricing-table-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-btn:hover, {{WRAPPER}} .back-pricing-table-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_hover_border',
                'selector' => '{{WRAPPER}} .back-pricing-table-btn:hover',
            ]
        );

        $this->add_control(
            'button_hover_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_hover_box_shadow',
                'selector' => '{{WRAPPER}} .back-pricing-table-btn:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_badge',
            [
                'label' => esc_html__( 'Badge', 'backaddon' ),
                'tab'   => Controls_Manager::TAB_STYLE,                
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_top_position',
            [
                'label' => esc_html__( 'Top Position', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-badge' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_bottom_position',
            [
                'label' => esc_html__( 'Bottom Position', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-badge' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_left_position',
            [
                'label' => esc_html__( 'Left Position', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-badge' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_right_position',
            [
                'label' => esc_html__( 'Right Position', 'backaddon' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-badge' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_padding',
            [
                'label' => esc_html__( 'Padding', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_badge' );

        $this->start_controls_tab(
            '_tab_badge_normal',
            [
                'label' => esc_html__( 'Normal', 'backaddon' ),
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => esc_html__( 'Badge Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-badge' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'badge_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-badge' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'badge_border',
                'selector' => '{{WRAPPER}} .back-pricing-table-badge',
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-pricing-table-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_box_shadow',
                'selector' => '{{WRAPPER}} .back-pricing-table-badge',
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => esc_html__( 'Typography', 'backaddon' ),
                'selector' => '{{WRAPPER}} .back-pricing-table-badge',
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        ); 

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_badge_hover',
            [
                'label' => esc_html__( 'Hover', 'backaddon' ),
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'badge_hover_color',
            [
                'label' => esc_html__( 'Badge Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-badge' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'badge_hover_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'backaddon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-badge' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'badge_hover_border',
                'selector' => '{{WRAPPER}} .back-price-table:hover .back-pricing-table-badge',
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'badge_hover_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'backaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-price-table:hover .back-pricing-table-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_hover_box_shadow',
                'selector' => '{{WRAPPER}} .back-price-table:hover .back-pricing-table-badge',
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_hover_typography',
                'label' => esc_html__( 'Typography', 'backaddon' ),
                'selector' => '{{WRAPPER}} .back-price-table:hover .back-pricing-table-badge',
                'condition' => [
                    'show_badge' => 'yes'
                ],
            ]
        );         

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    private static function get_currency_symbol( $symbol_name ) {
        $symbols = [
            'baht' => '&#3647;',
            'bdt' => '&#2547;',
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'guilder' => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound' => '&#163;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'rupee' => '&#8360;',
            'real' => 'R$',
            'krona' => 'kr',
            'won' => '&#8361;',
            'yen' => '&#165;',
        ];

        return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'badge_text', 'class',
            [
                'back-pricing-table-badge',                
            ]
        );

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'back-pricing-table-title' );

        $this->add_inline_editing_attributes( 'price', 'none' );
        $this->add_render_attribute( 'price', 'class', 'back-pricing-table-price-text' );

        $this->add_inline_editing_attributes( 'period', 'none' );
        $this->add_render_attribute( 'period', 'class', 'back-pricing-table-period' );

        $this->add_inline_editing_attributes( 'features_title', 'basic' );
        $this->add_render_attribute( 'features_title', 'class', 'back-pricing-table-features-title' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', 'back-pricing-table-btn' );

        $this->add_render_attribute( 'button_text', 'href', esc_url( $settings['button_link']['url'] ) );
        if ( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button_text', 'target', '_blank' );
        }
        if ( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button_text', 'rel', 'nofollow' );
        }

        if ( $settings['currency'] === 'custom' ) {
            $currency = $settings['currency_custom'];
        } else {
            $currency = self::get_currency_symbol( $settings['currency'] );
        }
        ?>
        


        <div class="back-price-table"> 
            <?php if ( $settings['show_badge'] ) : ?>
                <span <?php $this->print_render_attribute_string( 'badge_text' ); ?>><?php echo esc_html($settings['badge_text']); ?></span>
            <?php endif; ?>

            <div class="back-pricing-table-price <?php echo esc_attr($settings['pricing_inline']); ?>">
                <div class="back-pricing-table-price-tag">
                    <span class="back-pricing-table-currency"><?php echo esc_html( $currency ); ?></span><span <?php $this->print_render_attribute_string( 'price' ); ?>><?php echo esc_html($settings['price']); ?></span><span <?php $this->print_render_attribute_string( 'period' ); ?>><?php echo esc_html($settings['period']); ?></span>
                </div>
            </div>

            <div class="back-pricing-table-header">
                <?php if ( $settings['title'] ) : ?>
                    <h3 <?php $this->print_render_attribute_string( 'title' ); ?>><?php echo esc_html($settings['title']); ?></h3>
                <?php endif; ?>
            </div>

            

            <div class="back-pricing-table-body">
                <?php if ( $settings['features_title'] ) : ?>
                    <div <?php $this->print_render_attribute_string( 'features_title' ); ?>><?php echo wp_kses_post( $settings['features_title'] ); ?></div>
                <?php endif; ?>

                <?php if ( is_array( $settings['features_list'] ) ) : ?>
                    <ul class="back-pricing-table-features-list <?php echo($settings['icon_postion']);?>">
                        <?php foreach ( $settings['features_list'] as $index => $feature ) :
                            $name_key = $this->get_repeater_setting_key( 'text', 'features_list', $index );
                            $this->add_inline_editing_attributes( $name_key, 'basic' );
                            $this->add_render_attribute( $name_key, 'class', 'back-pricing-table-feature-text' );
                            ?>
                            <li class="<?php echo esc_attr( 'elementor-repeater-item-' . $feature['_id'] ); ?>">
                                <?php if ( $settings['icon_show'] ) : 
                                    if ( $feature['icon'] ) : ?>
                                        <i class="<?php echo esc_attr( $feature['icon'] ); ?>"></i>

                                <?php endif; endif; ?>

                                <span <?php $this->print_render_attribute_string( $name_key ); ?>><?php echo wp_kses_post( $feature['text'] ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <?php if ( $settings['button_text'] ) : ?>
                <div class="btn-part">
                    <a <?php $this->print_render_attribute_string( 'button_text' ); ?>><?php echo esc_html( $settings['button_text'] ); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

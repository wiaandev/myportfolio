<?php
/**
 * Tab widget class
 *
 */
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Backaddon_pro_Tab_Widget extends \Elementor\Widget_Base {
    /**
     * Get widget name.
     *
     * Retrieve Tab Widget Name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'back-tab';
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
        return esc_html__( 'Back Experience, Education & Skills Tab', 'back' );
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
        return 'glyph-icon flaticon-tabs-1';
    }


    public function get_categories() {
        return [ 'backthemecore_category' ];
    }

    public function get_keywords() {
        return [ 'tab', 'vertical', 'icon', 'horizental' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_experience',
            [
                'label' => esc_html__( 'Experience Settings', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'experience_title',
            [
                'label'       => esc_html__( 'Menu Title', 'back' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => 'Experience',
                'placeholder' => esc_html__( 'Experience', 'back' ),
                'separator'   => 'before',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' => esc_html__( 'Title & Description', 'back' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Item Title', 'back' ),
                'placeholder' => esc_html__( 'Item Title', 'back' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tab_content',
            [
                'label' => esc_html__( 'Content', 'back' ),
                'default' => esc_html__( 'Tab Content', 'back' ),
                'placeholder' => esc_html__( 'Tab Content', 'back' ),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
            ]
        );

        
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Experience Content', 'back' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [

                        'tab_title' => esc_html__( 'Item #1', 'back' ),
                        'tab_content' => esc_html__( 'Items data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],
                    [
                        'tab_title' => esc_html__( 'Item #2', 'back' ),
                        'tab_content' => esc_html__( 'Working data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],

                    [
                        'tab_title' => esc_html__( 'Item #3', 'back' ),
                        'tab_content' => esc_html__( 'Your data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_education',
            [
                'label' => esc_html__( 'Education Settings', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'education_title',
            [
                'label'       => esc_html__( 'Menu Title', 'back' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => 'Education',
                'placeholder' => esc_html__( 'Education', 'back' ),
                'separator'   => 'before',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title1',
            [
                'label' => esc_html__( 'Title & Description', 'back' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Item Title', 'back' ),
                'placeholder' => esc_html__( 'Item Title', 'back' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tab_content1',
            [
                'label' => esc_html__( 'Content', 'back' ),
                'default' => esc_html__( 'Tab Content', 'back' ),
                'placeholder' => esc_html__( 'Tab Content', 'back' ),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
            ]
        );
        
        $this->add_control(
            'tabs1',
            [
                'label' => esc_html__( 'Education Content', 'back' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [

                        'tab_title1' => esc_html__( 'Item #1', 'back' ),
                        'tab_content' => esc_html__( 'Items data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],
                    [
                        'tab_title1' => esc_html__( 'Item #2', 'back' ),
                        'tab_content' => esc_html__( 'Working data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],

                    [
                        'tab_title1' => esc_html__( 'Item #3', 'back' ),
                        'tab_content' => esc_html__( 'Your data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],
                ],
                'title_field' => '{{{ tab_title1 }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_skills',
            [
                'label' => esc_html__( 'Skills Settings', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'skills_title',
            [
                'label'       => esc_html__( 'Menu Title', 'back' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => 'Skills',
                'placeholder' => esc_html__( 'Skills', 'back' ),
                'separator'   => 'before',
            ]
        );

        $this->add_control(
            'sill_message',
            [
                'label' => esc_html__( 'Skill Content', 'back' ),
                'default' => esc_html__( 'Skill Content', 'back' ),
                'placeholder' => esc_html__( 'Skill Content', 'back' ),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
            ]
        ); 

        $repeater = new Repeater();  

        $repeater->add_control(
            'tab_title2',
            [
                'label' => esc_html__( 'Choose Image', 'back' ),
                'type'  => Controls_Manager::MEDIA,             
            ]
        );

        $repeater->add_control(
            'tab_content2',
            [
                'label' => esc_html__( 'Content', 'back' ),
                'default' => esc_html__( 'Tab Content', 'back' ),
                'placeholder' => esc_html__( 'Tab Content', 'back' ),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
            ]
        );
        
        $this->add_control(
            'tabs2',
            [
                'label' => esc_html__( 'Skills Content', 'back' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [

                        'Item #1' => esc_html__( 'Item #1', 'back' ),
                        'tab_content' => esc_html__( 'Items data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],
                    [
                        'Item #1' => esc_html__( 'Item #2', 'back' ),
                        'tab_content' => esc_html__( 'Working data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],

                    [
                        'Item #1' => esc_html__( 'Item #3', 'back' ),
                        'tab_content' => esc_html__( 'Your data click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.', 'back' ),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_button',
            [
                'label' => esc_html__( 'Button Settings', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'back' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
                'placeholder' => esc_html__( 'Button Text', 'back' ),
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'btn_link',
            [
                'label'       => esc_html__( ' Button Link', 'back' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,                      
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'nav_setting',
            [
                'label' => esc_html__( 'Tab Nav Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'nav__color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here ul.nav.nav-tabs li button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'nav_bg_color',
            [
                'label' => esc_html__( 'Button Bg Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here ul.nav.nav-tabs li button' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'nav_bg_color_active',
            [
                'label' => esc_html__( 'Bg Color (Active)', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here ul.nav.nav-tabs li button.active' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nav_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-tab-here ul.nav.nav-tabs li button',
            ]
        );

        $this->add_responsive_control(
            'nav_padding_area',
            [
                'label' => esc_html__( 'Padding', 'back' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here ul.nav.nav-tabs li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_spacing',
            [
                'label' => esc_html__( 'Right Spacing', 'back' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here ul.nav.nav-tabs li button' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_setting',
            [
                'label' => esc_html__( 'Title', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title__color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here ul.back__experience li h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-tab-here ul.back__experience li h4',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'sub_title_setting',
            [
                'label' => esc_html__( 'Sub Title', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title__color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here ul.back__experience li .back_tab__content strong' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-tab-here ul.back__experience li .back_tab__content strong',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'des__setting',
            [
                'label' => esc_html__( 'Description', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'des__color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here ul.back__experience li .back_tab__content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'des_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-tab-here ul.back__experience li .back_tab__content',
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            'btn_setting_style',
            [
                'label' => esc_html__( 'Button Style', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn__color',
            [
                'label' => esc_html__( 'Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .back-tab-here .back-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_bg__color',
            [
                'label' => esc_html__( 'Bg Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                     '{{WRAPPER}} .back-tab-here .back-btn' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_bg__color_hover',
            [
                'label' => esc_html__( 'Bg Hover Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                     '{{WRAPPER}} .back-tab-here .back-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'label' => esc_html__( 'Typography', 'back' ),
                'selector' => '{{WRAPPER}} .back-tab-here .back-btn',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render tabs widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $tabs = $this->get_settings_for_display('tabs');  
        $tabs1 = $this->get_settings_for_display('tabs1');  
        $tabs2 = $this->get_settings_for_display('tabs2');  
        $settings = $this->get_settings_for_display();  
        $id_int = substr( $this->get_id_int(), 0, 3 ); 
        
        ?>
        <div class="back-tab-here">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><?php echo esc_html($settings['experience_title']); ?></button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php echo esc_html($settings['education_title']); ?></button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <?php echo esc_html($settings['skills_title']); ?>                
                    </button>
                </li>
            </ul>
            <div class="tab-content clearfix">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <ul class="back__experience">
                        <?php
                        $i = 1; 
                        foreach ( $settings['tabs'] as $item ) { ?>
                            <li> 
                                <h4><?php echo esc_html($item['tab_title']); ?> </h4>
                                <div class="back_tab__content"><?php echo wp_kses_post($item['tab_content']); ?> </div>
                            </li>
                            <?php 
                            if ($i % 2 == 0) { ?>
                                <li class="back_brack_line"></li>
                            <?php } ?>                            
                        <?php $i++; } ?> 
                    </ul>
                    <?php $target = $settings['btn_link']['is_external'] ? 'target=_blank' : '';?>
                    <a class="back-btn" href="<?php echo esc_url($settings['btn_link']['url']);?>" <?php echo esc_attr($target);?>>
                        <?php echo esc_html($settings['btn_text']);?> <i class="ri-download-cloud-2-line"></i>
                    </a> 
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <ul class="back__education">
                        
                        <?php 
                        foreach ( $settings['tabs1'] as $item ) { ?>
                            <li> 
                                <h4><?php echo esc_html($item['tab_title1']); ?> </h4>
                                <div class="back_tab__content"><?php echo wp_kses_post($item['tab_content1']); ?></div>
                            </li>                             
                        <?php } ?> 
                    </ul>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <ul class="back__skills">

                        <?php if (!empty($settings['sill_message'])) { ?>
                            <li class="back__skill_text"><?php echo esc_html($settings['sill_message']);?> </li>
                        <?php } ?>

                        <?php foreach ( $settings['tabs2'] as $item ) { ?>
                            <li> 
                                <div class="back_icon"><img src="<?php echo esc_html($item['tab_title2']['url']); ?>" alt="image"></div>
                                <div class="back_tab__content"><?php echo wp_kses_post($item['tab_content2']); ?> </div>
                            </li>                             
                        <?php } ?> 
                    </ul>
                </div>
                
            </div>
        </div>
        <?php
    }
}
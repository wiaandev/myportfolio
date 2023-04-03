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

class back_pro_portfolio__repeater_Showcase_Widget extends \Elementor\Widget_Base {
   
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
        return 'back-portfolio-repeater';
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
        return esc_html__( 'Back Portfolio Custom', 'back' );
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
        return [ 'cortfolio', 'grid', 'brand', 'image' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            '_section_portfolio',
            [
                'label' => esc_html__( 'Portfolio Item', 'back' ),
                'tab' => Controls_Manager::TAB_CONTENT,
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

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'back'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'back'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'file_number',
            [
                'label' => esc_html__('File Number', 'back'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'back'),
                'type' => Controls_Manager::TEXTAREA,
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
                ]
            ]
        );        
        $this->end_controls_section();

        $this->start_controls_section(
            'item__section',
            [
                'label' => esc_html__( 'Default Style Here', 'back' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'portfoli_overly_color',
            [
                'label' => esc_html__( 'Background Color', 'back' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio_style_8 .back-grid__item-bg' => 'background-color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $unique = rand(2012,35120);   

        if ( empty($settings['logo_list'] ) ) {
            return;
        }
        ?>

        <div class="main-sec portfolio_style_8">
            <div class="back-grid-wrap">
                <div class="bgrids">
                <?php
                foreach ( $settings['logo_list'] as $index => $item ) :
                    $image = wp_get_attachment_image_url( $item['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = Utils::get_placeholder_image_src();
                    }

                    $title = !empty($item['title']) ? $item['title'] : '';
                    $file_number = !empty($item['file_number']) ? $item['file_number'] : '';
                    
                    ?>

                    <a href="#" class="back-grid__item">
                        <div class="back-grid__item-bg"></div>
                        <div class="back-grid__item-wrap">
                            <img class="back-grid__item-img" src="<?php echo esc_url( $image ); ?>" alt="image">
                        
                        </div>
                        <h3 class="back-grid__item-title"><?php echo $title; ?></h3>
                        <h4 class="back-grid__item-number"><?php echo $file_number; ?></h4>
                    </a>    

                    <?php endforeach; ?>
                
                </div>
            </div><!-- /grid-wrap -->
            <div class="content"> 
                <?php
                foreach ( $settings['logo_list'] as $indexs => $items ) :
                    $image = wp_get_attachment_image_url( $items['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = Utils::get_placeholder_image_src();
                    }
                    $title = !empty($items['title']) ? $items['title'] : '';
                    $description = !empty($items['description']) ? $items['description'] : '';
                    ?>
                                  
                <div class="content__item">
                    <div class="back_popup_content">                        
                        <div class="content__item-intro">                            
                             <img class="content__item-img" src="<?php echo esc_url( $image ); ?>" alt="image">
                        </div>                            
                        <div class="content__item-text">
                            <h2 class="content__item-title"><?php echo $title; ?></h2>                   
                            <p><?php echo $description; ?></p>
                        </div>                        
                    </div>
                </div>
                <?php endforeach; ?> 

                <button class="content__close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                <svg class="content__indicator icon icon--caret"><use xlink:href="#icon-caret"></use></svg>
            </div>
        </div>           
        <?php 
    }
}
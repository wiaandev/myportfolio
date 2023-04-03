<?php
/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */
?>
     
</div><!-- .main-container -->
<?php
global $enthor_option;
$hide_footer ='';
$hide_footer =  get_post_meta(get_queried_object_id(), 'hide_footer', true);

if($hide_footer != 'yes'):
// Footer Options here
require get_parent_theme_file_path('inc/footer/footer-options.php');

if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
   $enthor_shop_id    = get_option( 'woocommerce_shop_page_id' ); 
   $header_width_meta = get_post_meta($enthor_shop_id, 'footer_width_custom', true);
} elseif (is_home() && !is_front_page() || is_home() && is_front_page()){
    $header_width_meta = get_post_meta(get_queried_object_id(), 'footer_width_custom', true);
}else{
    $header_width_meta = get_post_meta(get_queried_object_id(), 'footer_width_custom', true);
}  

if ($header_width_meta != ''){
    $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
}else{
    $header_width = !empty($enthor_option['header-grid2']) ? $enthor_option['header-grid2'] : '' ;
    $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
}

if(!empty( $footer_bg_img)):?>
    <footer id="back-footer" class="<?php echo esc_attr($footer_select);?> back-footer footer-style-1" style="background-image: url('<?php echo esc_url($footer_bg_img); ?>'); background-position: <?php echo esc_attr($footer_bg_pos); ?>; <?php if (!empty($footer_bg)): ?> background-color: <?php echo esc_attr($footer_bg) ?> <?php endif; ?>">

<?php elseif(!empty( $footer_bg)):?>
    <footer id="back-footer" class="<?php echo esc_attr($footer_select);?> back-footer footer-style-1" style="background: <?php echo esc_attr($footer_bg);?>; background-position: <?php echo esc_attr($footer_bg_pos); ?>">

<?php elseif( !empty( $enthor_option['footer_bg_image']['url'])):?>
    <footer id="back-footer" class="<?php echo esc_attr($footer_select);?> back-footer footer-style-1" style="background-image: url('<?php echo esc_url($enthor_option['footer_bg_image']['url']);?>'); background-position: <?php echo esc_attr($footer_bg_pos); ?>">
    <?php else:?>
        <footer id="back-footer" class="<?php echo esc_attr($footer_select);?> back-footer footer-style-1" >
<?php 
endif; 
 get_template_part( 'inc/footer/footer','top' ); 
?>
<div class="footer-bottom" <?php if(!empty( $copyright_bg)): ?> style="background: <?php echo esc_attr($copyright_bg); ?> !important;" <?php elseif(!empty( $copy_trans)): ?> style="background: <?php echo esc_attr($copy_trans); ?> !important;" <?php endif; ?>>
    <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">  
            <?php if(is_active_sidebar( 'copy_right'  )): ?>                      
                <div class="col-md-6 col-sm-12 back-copy-menu">
                    <div class="copyright text-left" <?php if(!empty( $copy_space)): ?> style="padding: <?php echo esc_attr($copy_space); ?>" <?php endif; ?> >
                        <?php if(!empty($enthor_option['copyright'])){?>
                        <p><?php echo wp_kses($enthor_option['copyright'], 'enthor'); ?></p>
                        <?php }
                         else{
                            ?>
                        <p><?php echo esc_html('&copy;')?> <?php echo date("Y");?>. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> 
                        </p>
                        <?php
                         }   
                        ?>
                    </div>
                </div>            
                <div class="col-md-6 col-sm-12">
                    <div class="copyright-widget text-right" <?php if(!empty( $copy_space)): ?> style="padding: <?php echo esc_attr($copy_space); ?>" <?php endif; ?> >
                        <?php dynamic_sidebar( 'copy_right'); ?>
                    </div>
                </div>
            <?php else:?>
                <div class="col-md-12 col-sm-12">
                    <div class="copyright text-center" <?php if(!empty( $copy_space)): ?> style="padding: <?php echo esc_attr($copy_space); ?>" <?php endif; ?> >
                        <?php if(!empty($enthor_option['copyright'])){?>
                        <p><?php echo wp_kses($enthor_option['copyright'], 'enthor'); ?></p>
                        <?php }
                         else{
                            ?>
                        <p><?php echo esc_html('&copy;')?> <?php echo date("Y");?>. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> 
                        </p>
                        <?php
                         }   
                        ?>
                    </div>
                </div> 
            <?php endif ?>
        </div>
    </div>
</div>
</footer>
<?php endif; ?>
</div><!-- #page -->
<?php 
if(!empty($enthor_option['show_top_bottom'])){

    $show_top_bottom_postition = !empty($enthor_option['show_top_bottom_postition']) ? $enthor_option['show_top_bottom_postition'] : 'right'
?>
 <!-- start scrollUp  -->
<div id="scrollUp" class="<?php echo esc_attr($show_top_bottom_postition);?>">
    <i class="ri-arrow-up-line"></i>
</div>   
<?php } 
 wp_footer(); ?>
  </body>
</html>

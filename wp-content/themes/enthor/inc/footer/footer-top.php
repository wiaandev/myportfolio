<?php
    global $enthor_option; 
    $footer_width_here = "";
    $hide_foot_widgets='';
    $footer_logo_size = !empty($enthor_option['footer-logo-height']) ? 'style="height: '.$enthor_option['footer-logo-height'].'"' : '';

    if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {

       $enthor_shop_id    = get_option( 'woocommerce_shop_page_id' ); 
       $header_width_meta = get_post_meta($enthor_shop_id, 'footer_width_custom', true);
       $hide_foot_widgets = get_post_meta($enthor_shop_id, 'hide_foot_widgets', true);
       $footer_logo       = get_post_meta($enthor_shop_id, 'footer_logo_img', true);

    }elseif (is_home() && !is_front_page() || is_home() && is_front_page()){

        $header_width_meta = get_post_meta(get_queried_object_id(), 'footer_width_custom', true);
        $hide_foot_widgets =  get_post_meta(get_queried_object_id(), 'hide_foot_widgets', true);
        $footer_logo       =  get_post_meta(get_queried_object_id(), 'footer_logo_img', true);

    } else {

       $header_width_meta = get_post_meta(get_queried_object_id(), 'footer_width_custom', true);
       $hide_foot_widgets =  get_post_meta(get_queried_object_id(), 'hide_foot_widgets', true);
       $footer_logo       =  get_post_meta(get_queried_object_id(), 'footer_logo_img', true);
    }  
    
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = !empty($enthor_option['header-grid2']) ? $enthor_option['header-grid2'] : '' ;
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
    if($hide_foot_widgets !== 'yes'){
?>


<?php

    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (   ! is_active_sidebar( 'footer1'  )
        && ! is_active_sidebar( 'footer2' )
        && ! is_active_sidebar( 'footer3'  )
        && ! is_active_sidebar( 'footer4' )
    ){
      
    } 
?>

<?php $footer_widgets =  array(0=>12, 1=>6, 2=>4, 3=>3);


if ( !empty( $footer_widgets ) && (is_active_sidebar( 'footer1'  ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) ||  is_active_sidebar( 'footer4' ))):

    ?>
    <div class="footer-top">
        <div class="<?php echo esc_attr($header_width);?>">
            <div class="row"> 

            <?php 

            $total_widgets = (int)is_active_sidebar( 'footer1'  ) + (int)is_active_sidebar( 'footer2'  ) + (int)is_active_sidebar( 'footer3'  ) + (int)is_active_sidebar( 'footer4'  );
            $count = '';
            if( $total_widgets == 1){
                $count = 12;
            }
            if( $total_widgets == 2){
                $count = 6;
            }
            if( $total_widgets == 3){
                $count = 4;
            }
            if( $total_widgets == 4){
                $count = 3;
            }

            foreach ( $footer_widgets as $i => $column) :           
            ?>
                <?php if ( is_active_sidebar( 'footer'.( $i+1 ) ) ): ?>
                    <div class="<?php echo esc_attr( 'col-lg-' . $count ); ?> footer-<?php echo esc_attr($i); ?>">
                        <?php 
                     
                        if( $i == 0) :                    
                            if($footer_logo !=''){ ?>
                                <div class="footer-logo-wrap">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                                        <img <?php echo wp_kses($footer_logo_size, 'enthor');?> src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                                    </a>
                                </div>  
                            
                            <?php } else { 
                                if(!empty($enthor_option['footer_logo']['url'])) { ?>
                                    <div class="footer-logo-wrap">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-top-logo">
                                            <img <?php echo wp_kses($footer_logo_size, 'enthor');?> src="<?php  echo esc_url($enthor_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                                        </a>
                                    </div>
                                <?php }
                            } endif;?>
                        <?php dynamic_sidebar( 'footer'.( $i+1 ) ); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; 
}
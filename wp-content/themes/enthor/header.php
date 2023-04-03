<?php

/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="//gmpg.org/xfn/11">
<?php global $enthor_option; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
	<?php 
		if( ! function_exists( 'wp_body_open' ) ) {
		    function wp_body_open() {
		    	do_action( 'wp_body_open' );
		    }
		}
        
	$back_offcanvas      = get_post_meta(get_queried_object_id(), 'show-off-canvas', true);
    $menu_text_plus_icon = (!empty($enthor_option['menu_text_plus_icon'])) ? 'sub-menu-plus-show' : '';

    $page_title_align = (!empty($enthor_option['breadcrumb-align'])) ? $enthor_option['breadcrumb-align'] : '';

    if(!empty($enthor_option['off_canvas']) || ($back_offcanvas == 'show') ): ?>
        <div class="back-offcanvas"></div>
    <?php endif; ?>

    <?php if(!empty( $enthor_option['show-comingsoon']) && !is_user_logged_in()){
        get_template_part( 'coming-soon' );
        die();
    } ?>
     
    

    <!--Preloader start here-->
    <?php get_template_part( 'inc/header/preloader' ); ?>
    <!--Preloader area end here-->
    <div id="page" class="site <?php echo esc_attr($menu_text_plus_icon);?> <?php echo esc_attr($page_title_align);?>">
        <?php
            get_template_part('inc/header/header'); 
        ?> 
        <!-- End Header Menu End -->
        <?php 
            $page_bg = get_post_meta(get_the_ID(), 'page_bg', true);
            if($page_bg !='' && is_page()): ?>
                <div class="main-contain offcontents" style="background-image: url('<?php echo esc_url( $page_bg );?>'); ">
            <?php else: ?>
                <div class="main-contain offcontents">                
            <?php endif;
        ?>

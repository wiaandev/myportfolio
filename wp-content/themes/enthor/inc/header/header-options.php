<?php
    if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
   
        $enthor_shop_id   = get_option( 'woocommerce_shop_page_id' ); 
        $header_width_meta = get_post_meta($enthor_shop_id, 'header_width_custom', true);
        $main_menu_hides   = !empty(get_post_meta($enthor_shop_id, 'menu-hides', true)) ? get_post_meta($enthor_shop_id, 'menu-hides', true) : '';
        $back_top_search     = get_post_meta($enthor_shop_id, 'select-search', true);
        $back_show_cart      = get_post_meta($enthor_shop_id, 'show-cart-icon', true);
        $back_offcanvas      = get_post_meta($enthor_shop_id, 'show-off-canvas', true);
        $back_show_quote     = get_post_meta($enthor_shop_id, 'show-quote', true);
        $back_top_bar = get_post_meta($enthor_shop_id, 'select-top', true);
        $menu_bg           = get_post_meta($enthor_shop_id, 'menu-type-bg', true); 
        $menu_center_page  = get_post_meta($enthor_shop_id, 'center-menus', true);

    } elseif (is_home() && !is_front_page() || is_home() && is_front_page()){
        $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom', true);
        $main_menu_hides   = !empty(get_post_meta(get_queried_object_id(), 'menu-hides', true)) ? get_post_meta(get_queried_object_id(), 'menu-hides', true) : '';
        $back_top_search     = get_post_meta(get_queried_object_id(), 'select-search', true);
        $back_show_cart      = get_post_meta(get_queried_object_id(), 'show-cart-icon', true);
        $back_offcanvas      = get_post_meta(get_queried_object_id(), 'show-off-canvas', true);
        $back_show_quote     = get_post_meta(get_queried_object_id(), 'show-quote', true);
        $menu_bg           = get_post_meta(get_queried_object_id(), 'menu-type-bg', true);
        $menu_center_page  = get_post_meta(get_queried_object_id(), 'center-menus', true);
        $back_top_bar = get_post_meta(get_queried_object_id(), 'select-top', true);

    } else {
        $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom', true);
        $main_menu_hides   = !empty(get_post_meta(get_queried_object_id(), 'menu-hides', true)) ? get_post_meta(get_queried_object_id(), 'menu-hides', true) : '';
        $back_top_search     = get_post_meta(get_queried_object_id(), 'select-search', true);
        $back_show_cart      = get_post_meta(get_queried_object_id(), 'show-cart-icon', true);
        $back_offcanvas      = get_post_meta(get_queried_object_id(), 'show-off-canvas', true);
        $back_show_quote     = get_post_meta(get_queried_object_id(), 'show-quote', true);
        $menu_bg           = get_post_meta(get_queried_object_id(), 'menu-type-bg', true);
        $menu_center_page = get_post_meta(get_queried_object_id(), 'center-menus', true);
        $back_top_bar = get_post_meta(get_queried_object_id(), 'select-top', true);
}  

$main_menu_icon = (!empty($enthor_option['main_menu_icon'])) ? 'main-menu-icon-hide' : '';
$main_menu_center = (!empty($enthor_option['main_menu_center'])) || ($menu_center_page == 'yes')  ? 'main-menu-center' : '';

if ($header_width_meta != ''){
    $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
}else{
    $header_width = !empty($enthor_option['header-grid']) ? $enthor_option['header-grid'] : '';
    $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
}

<?php

/*
Header Style 1
*/

global $enthor_option;
$sticky = !empty($enthor_option['off_sticky']) ? $enthor_option['off_sticky'] : ''; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky stuck' : '';

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');
//off convas here
get_template_part('inc/header/off-canvas');
?> 


<header id="back-header" class="back-header-two back-mainsmenu<?php echo esc_attr($main_menu_hides);?> <?php echo esc_attr($main_menu_center);?> <?php echo esc_attr($main_menu_icon);?>">
    <?php 
      //include sticky search here
      get_template_part('inc/header/search');
    ?>
    <div class="header-inner <?php echo esc_attr($sticky_menu);?>">
        <!-- Toolbar Start -->
        <?php       
           get_template_part('inc/header/top-head/top-head','two');
        ?>
        <!-- Toolbar End -->
        
        <!-- Header Menu Start -->
        <?php
        $menu_bg_color = !empty($menu_bg) ? 'style=background:'.$menu_bg.'' : '';
        ?>
        <div class="menu-area" <?php echo wp_kses($menu_bg_color, 'enthor');?>>
            <div class="<?php echo esc_attr($header_width);?>">
                <div class="back-table-wrap">
                    <div class="back-cols header-logo">
                    <?php get_template_part('inc/header/logo');  ?>
                    </div>
                    <div class="back-cols back-menu-responsive">  
                        <?php             
                            require get_parent_theme_file_path('inc/header/menu.php'); 
                        ?>
                    </div>
                    <div class="back-cols back-header-quote">    
                        <?php
                            if(!empty($enthor_option['back_phone'])){ ?>
                                <div class="back-phone">
                                <i class="ri-phone-fill"></i> <a href="tel:<?php echo esc_attr(str_replace(" ","",($enthor_option['back_phone'])))?>"> <?php echo esc_html($enthor_option['back_phone']); ?></a> 
                            </div>
                        <?php } ?> 

                        <?php 
                     
                        if($back_top_search != 'hide'){
                            if(!empty($enthor_option['off_search'])): ?>
                                <div class="sidebarmenu-search-here">
                                    <div class="sidebarmenu-search-here">
                                        <div class="back_sticky_search_here"> 
                                            <i class="ri-search-line"></i> 
                                        </div>
                                    </div>
                                </div>                        
                            <?php endif; 
                        }

                        //include Cart here
                        if($back_show_cart != 'hide'){
                            if(!empty($enthor_option['wc_cart_icon'])) { ?>
                            <?php  get_template_part('inc/header/cart'); ?>
                        <?php } }            

                        
                        if($back_offcanvas != 'hide'):
                        if(!empty($enthor_option['off_canvas']) || ($back_offcanvas == 'show') ): ?>
                            <div class="sidebarmenu-area">
                                <?php if(!empty($enthor_option['off_canvas']) || ($back_offcanvas == 'show') ){
                                        $off = $enthor_option['off_canvas'];
                                        if( ($off == 1) || ($back_offcanvas == 'show') ){
                                   ?>
                                    <ul class="offcanvas-icon">
                                        <li class="back-nav-link">
                                            <span class="nav-menu-link menu-button">
                                                <i class="ri-menu-add-fill"></i>               
                                            </span>
                                        </li>
                                    </ul>
                                    <?php } 
                                } ?> 
                            </div>
                        <?php endif; endif; 

                        if($back_show_quote != 'hide'){
                            if(!empty($enthor_option['quote_btns']) || ($back_show_quote == 'show') ){ ?>
                            <?php $quote_btns_link = !empty($enthor_option['quote_btns_link']) ? 'target="_blank"' : '';
                                 ?>
                                <div class="back-quote"><a href="<?php echo esc_url($enthor_option['quote_link']); ?>" <?php echo wp_kses_post($quote_btns_link);?> class="quote-button"><?php  echo esc_html($enthor_option['quote']); ?></a></div>
                        <?php } }?>
                        <div class="sidebarmenu-area back-mobile-hamburger">                                    
                            <ul class="offcanvas-icon">
                                <li class="back-nav-link">
                                    <span class="nav-menu-link menu-button">
                                        <i class="ri-menu-add-fill"></i>               
                                    </span>
                                </li>
                            </ul>                                       
                        </div>        
                    </div>
                </div>
            </div> 
        </div>
        <!-- Header Menu End -->
    </div>
     <!-- End Slider area  -->
   <?php 
    get_template_part( 'inc/breadcrumbs' );
  ?>
</header>
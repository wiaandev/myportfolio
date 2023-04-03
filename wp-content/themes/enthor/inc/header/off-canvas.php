<?php 
global $enthor_option;
$back_offcanvas = get_post_meta(get_the_ID(), 'show-off-canvas', true);
$logo_height = !empty($enthor_option['logo-height']) ? 'style = "max-height: '.$enthor_option['logo-height'].'"' : '';
    //off convas here
?>
    
<nav class="back-menu-wrap-offcanvas back-nav-container nav back-menu-offcanvas">       
<div class="inner-offcan">
    <div class="back-nav-link"> 
        <?php if(!empty($enthor_option['Offcanvas_layout']) && $enthor_option['Offcanvas_layout'] == 'style2'){ ?> 
            <a href='#' class="nav-menu-link close-button styles2" id="close-button2">                                         
                <i class="ri-close-fill"></i>
            </a> 
        <?php } else { ?>  
        <a href='#' class="nav-menu-link close-button" id="close-button2">          
            <i class="ri-close-fill"></i>
        </a> 
        <?php } ?>
    </div> 
    <div class="sidenav offcanvas-icon">
            <div id="back_mobile_menu_here">
                <?php
                $menu_select = get_post_meta(get_queried_object_id(), 'menu_select', true);
                if($menu_select == 'single_menu'){
                    if ( has_nav_menu( 'menu-2' ) ) {
                        // User has assigned menu to this location;
                        // output it
                        ?>
                        <div class="widget widget_nav_menu mobile-menus">  
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'menu-2',
                                    'menu_id'        => 'primary-menu-single',
                                    'walker'        => ''
                                ) );
                            ?>
                        </div>                        
                        <?php
                    }
                } else {
                
                    if ( has_nav_menu( 'menu-1' ) ) {
                        // User has assigned menu to this location;
                        // output it
                        ?>                                
                            <div class="widget widget_nav_menu mobile-menus">      
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-1',
                                        'menu_id'        => 'primary-menu-single1',
                                    ) );
                                ?>
                            </div>                                
                        <?php
                    }
                }
                ?>                    
            </div>            
        <?php 
        if(!empty( $enthor_option['off_canvas'] ) || ($back_offcanvas == 'show') ){
            $off = $enthor_option['off_canvas'];
            if( ($off == 1) || ($back_offcanvas == 'show')){?>            
            <div class="back-offcanvas-contents"> 
                <?php dynamic_sidebar('sidebarcanvas-1');?>
            </div>            
            <?php }
        }?>
    </div>
    </div>
</nav>
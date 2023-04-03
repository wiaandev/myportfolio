<?php
/* Top Header part for enthor Theme
*/
global $enthor_option;

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($back_top_bar != 'hide'){
  if(!empty($enthor_option['show-top']) || ($back_top_bar == 'show')){
       if( !empty($enthor_option['top-email']) || !empty($enthor_option['phone']) || !empty($enthor_option['show-social'])){    

        $show_topbar_mobile = " ";
        if ( empty($enthor_option ['mobile-show-top']) ){
            $show_topbar_mobile= 'mobile_topbar_hide';
        } ?>

          <div class="toolbar-area <?php echo esc_attr($show_topbar_mobile); ?>">
            <div class="container2 <?php echo esc_attr($header_width);?>">
              <div class="row">
                <div class="col-lg-8">
                  <div class="toolbar-contact">
                    <ul class="back-contact-info">                        

                        <?php if(!empty($enthor_option['top-email'])) { ?>
                        <li class="back-contact-email">
                            <i class="glyph-icon flaticon-email"></i>                  
                                  <a href="mailto:<?php echo esc_attr($enthor_option['top-email'])?>"><?php echo esc_html($enthor_option['top-email'])?></a>                   
                        </li>
                        <?php } ?>

                        <?php if(!empty($enthor_option['phone'])) { ?>
                        <li class="back-contact-phone">
                          <i class="fa fa-phone"></i>                                      
                              <a href="tel:<?php echo esc_attr(str_replace(" ","",($enthor_option['phone'])))?>"> <?php echo esc_html($enthor_option['phone']); ?></a>                   
                        </li>
                        <?php } 
                        ?>  
                  </ul>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="toolbar-sl-share">
                    <ul class="clearfix">
                      <?php
                      if(!empty($enthor_option['show-social'])){
                        $top_social = $enthor_option['show-social']; 
                    
                          if($top_social == '1'){ 

                            if(!empty($enthor_option['facebook'])) { ?>
                            <li> <a href="<?php echo esc_url($enthor_option['facebook']);?>" target="_blank"> <i class="ri-facebook-fill"></i> </a></li>
                            <?php } ?>
                            <?php if(!empty($enthor_option['twitter'])) { ?>
                            <li> <a href="<?php echo esc_url($enthor_option['twitter']);?> " target="_blank"> <i class="ri-twitter-fill"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($enthor_option['rss'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['rss']);?> " target="_blank"> <i class="ri-rss-fill"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($enthor_option['pinterest'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['pinterest']);?> " target="_blank"> <i class="ri-pinterest-line"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($enthor_option['linkedin'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['linkedin']);?> " target="_blank"><i class="ri-linkedin-fill"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($enthor_option['instagram'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['instagram']);?> " target="_blank"> <i class="ri-instagram-line"></i></a> </li>
                            <?php } ?>
                            <?php if(!empty($enthor_option['vimeo'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['vimeo']);?> " target="_blank"> <i class="ri-vimeo-fill"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($enthor_option['tumblr'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['tumblr']);?> " target="_blank"><i class="ri-tumblr-fill"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($enthor_option['youtube'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['youtube']);?> " target="_blank"> <i class="ri-youtube-fill"></i> </a> </li>
                            <?php } ?> 

                            <?php if (!empty($enthor_option['whatsapp'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['whatsapp']);?>" target="_blank"> <i class="ri-whatsapp-line"></i> </a> </li>
                            <?php } ?> 

                            <?php if (!empty($enthor_option['telegram'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['telegram']);?>" target="_blank"> <i class="ri-telegram-fill"></i> </a> </li>
                            <?php } ?> 

                            <?php if (!empty($enthor_option['soundcloud'])) { ?>
                            <li> <a href="<?php  echo esc_url($enthor_option['soundcloud']);?>" target="_blank"> <i class="ri-sun-cloudy-line"></i> </a> </li>
                            <?php } ?> 
                            

                            <?php }
                            }
                         ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php 
    }
  }
} ?>
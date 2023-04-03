<?php
/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */
wp_head();  
global $enthor_option;
$error_bg = !empty($enthor_option['error_bg']) ? 'style="background:url('.$enthor_option['error_bg']['url'].')"': '';?>

<div class="page-error <?php if($enthor_option){
    echo esc_attr('not-found-bg');
}?>" <?php echo wp_kses_post( $error_bg ); ?>>
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            
                            <?php
                            if (!empty( $enthor_option['error__404_image']['url'] ) ) { ?>
                            <img src="<?php echo esc_url( $enthor_option['error__404_image']['url']); ?>" alt="<?php echo esc_html__( 'error', 'enthor' ); ?>">
                            <h2 class="error_number">                                                     
                                <?php

                                 if(!empty($enthor_option['text_404'])){
                                      echo wp_kses($enthor_option['text_404'], 'enthor');
                                 }
                                 else{
                                  echo esc_html__( 'oops! page not found', 'enthor' ); }
                                 ?>
                            </h2>
                            <?php } else { ?>     
                            
                            <h2>
                                <span>
                                    
                                    <?php
                                        if(!empty($enthor_option['title_404'])){
                                            echo wp_kses($enthor_option['title_404'], 'enthor');
                                        }
                                        else{
                                            echo esc_html__( '404', 'enthor' ); 
                                        }
                                    ?>
                                </span>                      
                                <?php

                                 if(!empty($enthor_option['text_404'])){
                                      echo wp_kses($enthor_option['text_404'], 'enthor');
                                 }
                                 else{
                                  echo esc_html__( 'oops! page not found', 'enthor' ); }
                                 ?>
                            </h2>
                            <?php } ?>
                            <a class="readon" href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php
                                 if(!empty($enthor_option['back_home'])){
                                     echo esc_html($enthor_option['back_home']);
                                 }
                                 else{
                                     esc_html_e('Or back to homepage', 'enthor'); 
                                  }
                                ?>
                            <i class="fa flaticon-right-arrow"></i></a>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
wp_footer();
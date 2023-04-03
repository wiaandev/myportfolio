<?php 
// Register and load the widget
function backframework_contact_information_widget() {
    register_widget( 'contact_information_widget' );
}
add_action( 'widgets_init', 'backframework_contact_information_widget' );

//Contact info Widget 
class contact_information_widget extends WP_Widget {
 
   /** constructor */
   function __construct() {
    parent::__construct(
      'contact_information_widget', 
      __('Back Contact Details', 'backframework'),
      array( 'description' => __( 'Display your contact info!', 'backframework' ), )
    );
  }
 
    /** @see WP_Widget::widget */
    function widget($args, $instance) { 
        extract( $args );
        $image_src = '';
        $title              = apply_filters('widget_title', $instance['title']);    
        $address_title      = isset($instance['address_title']) ? $instance['address_title'] : '' ;       
        $email_title        = isset($instance['email_title']) ? $instance['email_title'] : '' ;       
        $phone_title        = isset($instance['phone_title']) ? $instance['phone_title'] : '' ;       
        $hour_title         = isset($instance['hour_title']) ? $instance['hour_title'] : '' ;       
        $address2           = isset($instance['address2']) ? $instance['address2'] : '' ;       
        $email              =  $instance['email'];
        $phone              = $instance['phone'];
        $hour               = $instance['hour'];
      
        echo wp_kses_post($before_widget); 
        if ( $title )
        echo wp_kses_post($before_title . $title . $after_title); 
  
    ?>
    <ul class="fa-ul back-info">
    <?php           
        if (!empty($address2)){ ?>
            <li class="address">
            <i class="ri-map-pin-line"></i>
                <span>
                <?php if (!empty($address_title)){ ?>
                <em><?php echo nl2br($address_title); ?></em>
                <?php } ?>
                <?php  echo nl2br($address2); ?>
                </span>
            </li>
        <?php } ?>

        <?php
        if (!empty($phone)){ ?>
            <li>
            <i class="ri-phone-line"></i>
            <span>
                <?php if (!empty($phone_title)){ ?>
                <em><?php echo nl2br($phone_title); ?></em>
                <?php } ?>
                <a href="tel:<?php echo esc_attr(str_replace(" ","", ($phone))) ?>"><?php echo esc_html($phone); ?> </a>
            </span>
            </li>
        <?php } ?>

        <?php if (!empty($email)) { ?>
        <li class="back-email">
        <i class="ri-mail-add-line"></i>
        <span>
            <?php if (!empty($email_title)){ ?>
            <em><?php echo nl2br($email_title); ?></em>
            <?php } ?>
        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?> </a>
        </span>
        </li>
        <?php } ?>

        <?php if (!empty($hour)){ ?>
            <li>
                <i class="ri-time-line"></i>                
                <span>
                    <?php if (!empty($hour_title)){ ?>
                    <em><?php echo nl2br($hour_title); ?></em>
                    <?php } ?>
                    <?php echo nl2br($hour); ?>
                </span>
            </li>
        <?php } ?>
    </ul>

    <?php echo wp_kses_post($after_widget); ?>
     <?php
    }
 
    /** @see WP_Widget::update  */
    function update($new_instance, $old_instance) {   
        $instance            = $old_instance;
        $instance['title']   = strip_tags($new_instance['title']);
        $instance['address_title'] = wp_kses_post($new_instance['address_title']);  
        $instance['address2'] = wp_kses_post($new_instance['address2']);  
        $instance['hour_title'] = wp_kses_post($new_instance['hour_title']);  
        $instance['phone_title'] = wp_kses_post($new_instance['phone_title']);  
        $instance['email_title'] = wp_kses_post($new_instance['email_title']);  
        $instance['email']   = strip_tags($new_instance['email']);
        $instance['phone']   = strip_tags($new_instance['phone']);
        $instance['hour']    = strip_tags($new_instance['hour']);
        $instance['url']     = strip_tags($new_instance['url']);      
        return $instance;
    }
 
    /** @see WP_Widget::form */
    function form($instance) {  

       $title   = (isset($instance['title']))? $instance['title'] : '';      
       $address_title = (isset($instance['address_title']))? $instance['address_title'] :''; 
       $email_title = (isset($instance['email_title']))? $instance['email_title'] :''; 
       $phone_title = (isset($instance['phone_title']))? $instance['phone_title'] :''; 
       $hour_title = (isset($instance['hour_title']))? $instance['hour_title'] :''; 
       $address2 = (isset($instance['address2']))? $instance['address2'] :''; 
       $email   = (isset($instance['email']))? $instance['email'] : '';
       $phone   = (isset($instance['phone']))? $instance['phone'] : '';
       $hour    = (isset($instance['hour']))? $instance['hour'] : '';    

     ?>      
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_js( $title); ?>" />
        </p>


        <p>
          <label for="<?php echo esc_attr($this->get_field_id('address_title')); ?>"><?php esc_html_e('Pre Title', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address_title')); ?>" name="<?php echo esc_attr($this->get_field_name('address_title')); ?>" type="text" value="<?php echo esc_js($address_title); ?>" />
        </p>  

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('address2')); ?>"><?php esc_html_e('Address:', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address2')); ?>" name="<?php echo esc_attr($this->get_field_name('address2')); ?>" type="text" value="<?php echo esc_js($address2); ?>" />
        </p>


        <p>
          <label for="<?php echo esc_attr($this->get_field_id('phone_title')); ?>"><?php esc_html_e('Pre Title:', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_title')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title')); ?>" type="text" value="<?php echo esc_js($phone_title); ?>" />
        </p>


        <p>
          <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_js($phone); ?>" />
        </p>
       
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('email_title')); ?>"><?php esc_html_e('Pre Title:', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_title')); ?>" name="<?php echo esc_attr($this->get_field_name('email_title')); ?>" type="text" value="<?php echo esc_js($email_title); ?>" />
        </p> 

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_js($email); ?>" />
        </p>       
        
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('hour_title')); ?>"><?php esc_html_e('Pre Title', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('hour_title')); ?>" name="<?php echo esc_attr($this->get_field_name('hour_title')); ?>" type="text" value="<?php echo esc_js($hour_title); ?>" />
        </p>  

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('hour')); ?>"><?php esc_html_e('Hour:', 'backframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('hour')); ?>" name="<?php echo esc_attr($this->get_field_name('hour')); ?>" type="text" value="<?php echo esc_js($hour); ?>" />
        </p>
       
        <?php 
    }

 
} // end class

<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "enthor_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'enthor/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        'page_priority'        => 8,
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Enthor Options', 'enthor' ),
        'page_title'           => esc_html__( 'Enthor Options', 'enthor' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,

        // OPTIONAL -> Give you extra features
        'page_priority'        => 20,        
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        'force_output' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( 'Enthor Theme', 'enthor' ), $v );
    } else {
        $args['intro_text'] = esc_html__( 'Enthor Theme', 'enthor' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTSenthor
      
     */     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Sections', 'enthor' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'container_size',
                'title'    => esc_html__( 'Container Size', 'enthor' ),
                'subtitle' => esc_html__( 'Container Size example(1200px)', 'enthor' ),
                'type'     => 'text',
                'default'  => ''                
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Default Logo', 'enthor' ),
                'subtitle' => esc_html__( 'Upload your logo', 'enthor' ),
                'url'=> true                
            ),

            array(
                    'id'       => 'logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'enthor' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'enthor' ),
                    'type'     => 'text',
                    'default'  => '40px'                    
            ), 

            array(
                'id'       => 'rswplogo_sticky',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Sticky Logo', 'enthor' ),
                'subtitle' => esc_html__( 'Upload your sticky logo', 'enthor' ),
                'url'=> true                
            ),

            array(
                'id'       => 'sticky_logo_height',                               
                'title'    => esc_html__( 'Sticky Logo Height', 'enthor' ),
                'subtitle' => esc_html__( 'Sticky Logo max height example(20px)', 'enthor' ),
                'type'     => 'text',
                'default'  => '40px'    
            ), 

            array(
                'id'       => 'logo-height-mobile',                               
                'title'    => esc_html__( 'Mobile Logo Height', 'enthor' ),
                'subtitle' => esc_html__( 'Mobile Logo max height example(50px)', 'enthor' ),
                'type'     => 'text',
                'default'  => ''                    
            ),

            
                       
            array(
                'id'       => 'back_favicon',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Favicon', 'enthor' ),
                'subtitle' => esc_html__( 'Upload your faviocn here', 'enthor' ),
                'url'=> true            
            ),           
 
     
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Go to Top', 'enthor'),
                'subtitle' => esc_html__('You can show or hide here', 'enthor'),
                'default'  => false,
            ), 

            array(
                'id'       => 'show_top_bottom_postition',
                'type'     => 'button_set',
                'title'    => __('Go to Top Position', 'enthor'),                
                'options' => array(
                    'left' => 'Left', 
                    'center' => 'Center', 
                    'right' => 'Right'
                 ), 
                'default' => 'right',
                'required' => array(
                    array(
                        'show_top_bottom',
                        'equals',
                        1,
                    ),
                ), 
            ),
        )
    ));
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'enthor' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'icon' => 'el el-certificate',       
         
        'fields'           => array(
        array(
            'id'     => 'notice_critical',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Top Area', 'enthor')            
        ),
        
        array(
            'id'       => 'show-top',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Top Bar', 'enthor'),
            'subtitle' => esc_html__('You can select top bar show or hide', 'enthor'),
            'default'  => false,
        ),         
        
        array(
            'id'       => 'mobile-show-top',
            'type'     => 'switch', 
            'title'    => esc_html__('Mobile Show Top Bar', 'enthor'),
            'subtitle' => esc_html__('You can select mobile top bar show or hide', 'enthor'),
            'default'  => true,
            'required' => array(
                array(
                    'show-top',
                    'equals',
                    1,
                ),
            ), 
        ), 


        array(
            'id'       => 'top-email',                               
            'title'    => esc_html__( 'Email Address', 'enthor' ),
            'subtitle' => esc_html__( 'Enter Email Address', 'enthor' ),
            'type'     => 'text',
            'validate' => 'email',
            'msg'      => esc_html__('Email Address Not Valid', 'enthor'),
            'required' => array(
                array(
                    'show-top',
                    'equals',
                    1,
                ),
            ), 
        ), 

        array(
            'id'       => 'phone',                               
            'title'    => esc_html__( ' Phone Number', 'enthor' ),
            'subtitle' => esc_html__( 'Enter Phone Number', 'enthor' ),
            'type'     => 'text', 
            'required' => array(
                array(
                    'show-top',
                    'equals',
                    1,
                ),
            ),    
        ),
               
        array(
            'id'       => 'open_hours',                               
            'title'    => esc_html__( 'Message Here', 'enthor' ),
            'subtitle' => esc_html__( 'Enter Message', 'enthor' ),
            'type'     => 'textarea',
            'required' => array(
                array(
                    'show-top',
                    'equals',
                    1,
                ),
            ),            
        ),        
      
        array(
            'id'       => 'show-social',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Social Icons Toolbar Area', 'enthor'),
            'subtitle' => esc_html__('You can select Social Icons show or hide', 'enthor'),
            'default'  => true,
        ),  
                    
          array(
            'id'     => 'notice_critical2',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Area', 'enthor')            
        ),

        array(
            'id'               => 'header-grid',
            'type'             => 'select',
            'title'            => esc_html__('Header Area Width', 'enthor'),                 
            //Must provide key => value pairs for select options
            'options'          => array(                                     
            
                'container' => esc_html__('Container', 'enthor'),
                'full'      => esc_html__('Container Fluid', 'enthor'),
            ),
            'default'          => 'container',            
        ),  

        array(
            'id'       => 'back_phone',                               
            'title'    => esc_html__( ' Phone Number', 'enthor' ),
            'subtitle' => esc_html__( 'Enter Phone Number', 'enthor' ),
            'type'     => 'text',     
        ),

        array(
            'id'       => 'quote_btns',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Quote Button', 'enthor'),
            'subtitle' => esc_html__('You can show or hide Quote Button', 'enthor'),
            'default'  => false,

        ),
            
        array(
            'id'       => 'quote',                               
            'title'    => esc_html__( 'Quote Button Text', 'enthor' ),                  
            'type'     => 'text',
            'required' => array(
                array(
                    'quote_btns',
                    'equals',
                    1,
                ),
            ),  
        ), 


        
        array(
            'id'       => 'quote_link',                               
            'title'    => esc_html__( 'Quote Button Link', 'enthor' ),
            'subtitle' => esc_html__( 'Enter Quote Button Link Here', 'enthor' ),
            'type'     => 'text', 
            'required' => array(
                array(
                    'quote_btns',
                    'equals',
                    1,
                ),
            ),                
        ),

        array(
            'id'       => 'quote_btns_link',
            'type'     => 'switch', 
            'title'    => esc_html__('Open New Window', 'enthor'),            
            'default'  => false,
            'required' => array(
                array(
                    'quote_btns',
                    'equals',
                    1,
                ),
            ), 
        ), 

        array(
            'id'        => 'quote_btns_bg',
            'type'      => 'color',                       
            'title'     => esc_html__('Quote Button Bg Color (Normal)','enthor'),
            'subtitle'  => esc_html__('Pick color', 'enthor'),   
            'default'   => '',                        
            'validate'  => 'color',
            'required' => array(
                array(
                    'quote_btns',
                    'equals',
                    1,
                ),
            ), 
            'output' => array(                 
            'background'            => '#back-header .back-quote a'
            )
        ), 

        array(
            'id'        => 'quote_btns_color',
            'type'      => 'color',                       
            'title'     => esc_html__('Quote Button Color','enthor'),
            'subtitle'  => esc_html__('Pick color', 'enthor'),   
            'default'   => '',                        
            'validate'  => 'color',
            'required' => array(
                array(
                    'quote_btns',
                    'equals',
                    1,
                ),
            ), 
            'output' => array(                 
            'color'            => '#back-header .back-quote a'
            )
        ),

        array(
            'id'        => 'quote_btns_bg_hover',
            'type'      => 'color',                       
            'title'     => esc_html__('Quote Button Bg Color (Hover)','enthor'),
            'subtitle'  => esc_html__('Pick color', 'enthor'),   
            'default'   => '',                        
            'validate'  => 'color',
            'required' => array(
                array(
                    'quote_btns',
                    'equals',
                    1,
                ),
            ), 
            'output' => array(                 
            'background'            => '#back-header .back-quote a:hover'
            )
        ), 

        array(
            'id'       => 'off_search',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Search', 'enthor'),
            'subtitle' => esc_html__('You can show or hide search icon at menu area', 'enthor'),
            'default'  => false,
        ),     
        )
    ) 
);  
   

Redux::setSection( $opt_name, array(
'title'            => esc_html__( 'Header Layout', 'enthor' ),
'id'               => 'header-style',
'customizer_width' => '450px',
'subsection' =>true,      
'fields'    => array(  
                array(
                    'id'       => 'header_layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Header Layout', 'enthor'), 
                    'subtitle' => esc_html__('Select header layout. Choose between 1, 2 or 3 layout.', 'enthor'),
                    'options'  => array(
                    'style1'   => array(
                        'alt'      => 'Header Style 1', 
                        'img'      => get_template_directory_uri().'/libs/img/style_1.png'
                    ),                        
                    'style2' => array(
                        'alt'    => 'Header Style 2', 
                        'img'    => get_template_directory_uri().'/libs/img/style_2.png'
                    ),               
                ),
                'default' => 'style1'
            ),     
        )
    ) 
);

                                   
//Topbar settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Toolbar area', 'enthor' ),
        'desc'   => esc_html__( 'Toolbar area Style Here', 'enthor' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                array(
                    'id'        => 'toolbar_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar background Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Text Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'transparent_toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Text Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'        => 'toolbar_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Hover Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'transparent_toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Link Hover Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_icn_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Icon Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_soci_icn_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Social Icon Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Toolbar Font Size','enthor'),
                    'subtitle'  => esc_html__('Font Size', 'enthor'),    
                    'default'   => '',                                            
                ), 

                array(
                    'id'        => 'toolbar_borders',
                    'type'      => 'color_rgba',                       
                    'title'     => esc_html__('Seperator Border Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),   
                      
                    'default'  => array(
                        'color'     => '',
                        'alpha'     => 1                    
                    ),
                    'output' => array(                 
                    'border-color'            => '#back-header .toolbar-area .toolbar-contact ul li, #back-header .toolbar-area .opening, #back-header.back-header-two .toolbar-area .toolbar-contact ul li, #back-header.back-header-two .toolbar-area .opening, #back-header.back-header-two .toolbar-area'
                    )
                ),  
                
        )
    )
);

    //Preloader settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Preloader Style', 'enthor' ),
        'desc'   => esc_html__( 'Preloader Style Here', 'enthor' ),        
        'icon' => 'el el-brush',
        'fields' => array( 
                array(
                    'id'       => 'show_preloader',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Show Preloader', 'enthor'),
                    'subtitle' => esc_html__('You can show or hide preloader', 'enthor'),
                    'default'  => false,
                ), 

                array(
                    'id'        => 'preloader_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Preloader Background Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'show_preloader',
                            'equals',
                            1,
                        ),
                    ), 
                    'output' => array(                 
                        'background-color'            => '#back__preloader'
                    ),                      
                ), 

                
                array(
                    'id'        => 'preloader_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Preloader Color (Half)','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'show_preloader',
                            'equals',
                            1,
                        ),
                    ),                       
                ),
                


                array(
                    'id'        => 'preloader_color_left',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Preloader Color (Half)','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'show_preloader',
                            'equals',
                            1,
                        ),
                    ),                       
                ), 

                array(
                    'id'    => 'preloader_img', 
                    'url'   => true,     
                    'title' => esc_html__( 'Preloader Image', 'enthor' ),                 
                    'type'  => 'media', 
                    'required' => array(
                        array(
                            'show_preloader',
                            'equals',
                            1,
                        ),
                    ),                                 
                ),       
            )
        )
    );    
    //End Preloader settings  

    // -> START Style Section
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Global Style', 'enthor' ),
        'desc'   => esc_html__( 'Style your theme', 'enthor' ),    
        'icon' => 'el el-brush',    
        'subsection' =>false,  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                           
                            'title'     => esc_html__('Body Backgroud Color','enthor'),
                            'subtitle'  => esc_html__('Pick body background color', 'enthor'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => esc_html__('Text Color','enthor'),
                            'subtitle'  => esc_html__('Pick text color', 'enthor'),
                            'default'   => '#55575c',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                            'id'        => 'primary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Primary Color','enthor'),
                            'subtitle'  => esc_html__('Select Primary Color.', 'enthor'),
                            'default'   => '#5800FF',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'secondary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Secondary Color','enthor'),
                            'subtitle'  => esc_html__('Select Secondary Color.', 'enthor'),
                            'default'   => '#590696',
                            'validate'  => 'color',                        
                        ),  

                        array(
                            'id'        => 'dark_bg_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Dark Bg Color One','enthor'),
                            'subtitle'  => esc_html__('Select Dark Bg Color.', 'enthor'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 

                      
                        array(
                            'id'        => 'dark_txt_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Dark Text Color','enthor'),
                            'subtitle'  => esc_html__('Select Dark Text Color.', 'enthor'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                       
                ) 
        ) 
    ); 

       
    
    //Menu settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu Style', 'enthor' ),
        'desc'   => esc_html__( 'Main Menu Style Here', 'enthor' ),  
        'icon' => 'el el-brush',      
        'subsection' =>false,  
        'fields' => array( 

                        array(
                            'id'     => 'notice_critical_menu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Main Menu Settings', 'enthor'),                                           
                        ),                        

                        array(
                            'id'        => 'menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Background Color','enthor'),
                            'subtitle'  => esc_html__('Pick color', 'enthor'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color','enthor'),
                            'subtitle'  => esc_html__('Pick color', 'enthor'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color (Hover)','enthor'),
                            'subtitle'  => esc_html__('Pick color', 'enthor'),           
                            'default'   => '',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color (Active)','enthor'),
                            'subtitle'  => esc_html__('Pick color', 'enthor'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),
                        
                        array(
                            'id'        => 'transparent_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Text Color','enthor'),
                            'subtitle'  => esc_html__('Pick color', 'enthor'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'transparent_menu_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Color (Hover)','enthor'),
                            'subtitle'  => esc_html__('Pick color', 'enthor'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ),  

                        array(
                            'id'        => 'transparent_menu_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Color (Active)','enthor'),
                            'subtitle'  => esc_html__('Pick color', 'enthor'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 

                        
                        array(
                            'id'        => 'menu_desc_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Description Text Color','enthor'),
                            'subtitle'  => esc_html__('Pick color', 'enthor'),
                            'default'   => '',
                            'validate'  => 'color',
                            'output' => array(                 
                                'color'            => '.navbar-menu span.description'
                            )                         
                        ),

                        array(
                            'id'        => 'menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Left Right Gap','enthor'),   
                            'default'   => '',                             
                        ),

                        array(
                            'id'        => 'menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Top Gap','enthor'),   
                            'default'   => '',                             
                        ),                        

                        array(
                            'id'        => 'menu_item_gap3',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Bottom Gap','enthor'),   
                            'default'   => '',                             
                        ),

                        array(
                            'id'       => 'menu_text_trasform',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Menu Text Uppercase', 'enthor' ),
                            'on'       => esc_html__( 'Enabled', 'enthor' ),
                            'off'      => esc_html__( 'Disabled', 'enthor' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'main_menu_center',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Center', 'enthor' ),
                            'on'       => esc_html__( 'Enabled', 'enthor' ),
                            'off'      => esc_html__( 'Disabled', 'enthor' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'main_menu_icon',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Icon Hide', 'enthor' ),
                            'on'       => esc_html__( 'Enabled', 'enthor' ),
                            'off'      => esc_html__( 'Disabled', 'enthor' ),
                            'default'  => false,
                        ),

                        array(
                            'id'     => 'notice_critical_dropmenu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Dropdown Menu Settings', 'enthor'),                                           
                        ),
                                               
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','enthor'),
                            'subtitle'  => esc_html__('Pick bg color', 'enthor'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','enthor'),
                            'subtitle'  => esc_html__('Pick text color', 'enthor'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','enthor'),
                            'subtitle'  => esc_html__('Pick text color', 'enthor'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),                              
                     

                        array(
                            'id'       => 'menu_text_trasform2',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Text Uppercase', 'enthor' ),
                            'on'       => esc_html__( 'Enabled', 'enthor' ),
                            'off'      => esc_html__( 'Disabled', 'enthor' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'menu_text_plus_icon',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Icon', 'enthor' ),
                            'on'       => esc_html__( 'Enabled', 'enthor' ),
                            'off'      => esc_html__( 'Disabled', 'enthor' ),
                            'default'  => false,
                        ),
                        
                )
            )
        ); 

    //Sticky Menu settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sticky Menu Style', 'enthor' ),
        'desc'       => esc_html__( 'Sticky Menu Style Here', 'enthor' ), 
        'icon' => 'el el-brush',       
        'subsection' =>false,  
        'fields' => array(
                    array(
                        'id'       => 'off_sticky',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Sticky Menu', 'enthor'),
                        'subtitle' => esc_html__('You can show or hide sticky menu here', 'enthor'),
                        'default'  => false,
                    ),

                    array(
                        'id'        => 'stiky_menu_areas_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Menu Area Background Color','enthor'),
                        'subtitle'  => esc_html__('Pick color', 'enthor'),    
                        'default'   => '',                        
                        'validate'  => 'color',
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                        
                    ), 
                        
                    array(
                        'id'        => 'stikcy_menu_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Menu Text Color','enthor'),
                        'subtitle'  => esc_html__('Pick color', 'enthor'),    
                        'default'   => '',                        
                        'validate'  => 'color',
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                        
                    ), 
                       

                    array(
                        'id'        => 'sticky_menu_text_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Menu Text Color (Hover)','enthor'),
                        'subtitle'  => esc_html__('Pick color', 'enthor'),           
                        'default'   => '',                 
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                       
                    ), 

                    array(
                        'id'        => 'stikcy_menu_text_active_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Main Menu Text Color (Active)','enthor'),
                        'subtitle'  => esc_html__('Pick color', 'enthor'),
                        'default'   => '',
                        'validate'  => 'color',
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                        
                    ),                     
                    array(
                        'id'        => 'sticky_drop_down_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Dropdown Menu Background Color','enthor'),
                        'subtitle'  => esc_html__('Pick bg color', 'enthor'),
                        'default'   => '',
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                       
                    ), 
                            
                        
                    array(
                        'id'        => 'stikcy_drop_text_color',
                        'type'      => 'color',                     
                        'title'     => esc_html__('Dropdown Menu Text Color','enthor'),
                        'subtitle'  => esc_html__('Pick text color', 'enthor'),
                        'default'   => '',
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                       
                    ), 
                        
                    array(
                        'id'        => 'sticky_drop_text_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Dropdown Menu Text Color (Hover)','enthor'),
                        'subtitle'  => esc_html__('Pick text color', 'enthor'),
                        'default'   => '',
                        'validate'  => 'color',
                        'required' => array(
                            array(
                                'off_sticky',
                                'equals',
                                1,
                            ),
                        ),                        
                    ),                        
                )
            )
        ); 

    //Breadcrumb settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Breadcrumb Style', 'enthor' ),     
        'icon' => 'el el-brush', 
        'subsection' =>false,  
        'fields' => array(

                    array(
                        'id'       => 'off_breadcrumb_area',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show / Hide Breadcrumb Area', 'enthor'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'enthor'),
                        'default'  => true,
                    ),

                    array(
                        'id'       => 'off_breadcrumb',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show / Hide Breadcrumb', 'enthor'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'enthor'),
                        'default'  => true,
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),
                    ),

                    array(
                        'id'        => 'breadcrumb_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','enthor'),
                        'subtitle'  => esc_html__('Pick color', 'enthor'),    
                        'default'   => '',                        
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                       
                    ),                     

                     array(
                        'id'       => 'page_banner_main',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Background Banner', 'enthor' ),
                        'subtitle' => esc_html__( 'Upload your banner', 'enthor' ), 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                 
                    ), 

                     array(
                        'id'        => 'breadcrumb_title',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Title Font Size','enthor'),                          
                        'default'   => '',
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                                                     
                    ), 

                    array(
                        'id'               => 'breadcrumb-align',
                        'type'             => 'select',
                        'title'            => esc_html__('Title & Breadcrumb Alignment', 'enthor'),                   
                        'desc'             => esc_html__('Change your title and breadcrumb text alignment', 'enthor'),
                    //Must provide key => value pairs for select options
                    'options'          => array(
                        'left'               => esc_html__('Left','enthor'),                                   
                        'center'                => esc_html__('Center', 'enthor'),                                         
                        'right'                => esc_html__('Right', 'enthor'),
                       
                        ),
                        'default'          => 'center',
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                  
                    ),  
                    
                    array(
                        'id'        => 'breadcrumb_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','enthor'),
                        'subtitle'  => esc_html__('Pick color', 'enthor'),    
                        'default'   => '',                        
                        'validate'  => 'color', 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                       
                    ),                   

                    array(
                        'id'        => 'breadcrumb_seperator_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Breadcrumb Seperator Color','enthor'),
                        'subtitle'  => esc_html__('Pick color', 'enthor'),    
                        'default'   => '',                        
                        'validate'  => 'color',  
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                      
                    ),  
                    
                  
                    array(
                        'id'        => 'breadcrumb_top_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap','enthor'),                          
                        'default'   => '',  
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                            
                    ),


                    array(
                        'id'        => 'breadcrumb_bottom_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap','enthor'),                          
                        'default'   => '',
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                             
                    ),

                    array(
                        'id'        => 'breadcrumb_top_gap_mobile',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap (Mobile)','enthor'),                          
                        'default'   => '', 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                             
                    ), 

                    array(
                        'id'        => 'breadcrumb_bottom_gap_mobile',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap (Mobile)','enthor'),                          
                        'default'   => '', 
                        'required' => array(
                            array(
                                'off_breadcrumb_area',
                                'equals',
                                1,
                            ),
                        ),                                            
                    ),        
                )
            )
        );
    
    //offcanvas  settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Offcanvas Style', 'enthor' ),
        'desc'   => esc_html__( 'Offcanvas Style Here', 'enthor' ),
        'icon' => 'el el-brush',        
        'subsection' =>false,  
        'fields' => array( 

                array(
                    'id'       => 'off_canvas',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Show off Canvas', 'enthor'),
                    'subtitle' => esc_html__('You can show or hide off canvas here', 'enthor'),
                    'default'  => false,
                ), 

                array(
                    'id'        => 'offcan_bgs_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Background Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                       
                ), 

                array(
                    'id'        => 'offcan_title_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Title Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

   
                array(
                    'id'        => 'offcan_txt_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Text Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

                array(
                    'id'        => 'offcan_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

                array(
                    'id'        => 'offcan_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link hover Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),


                array(
                    'id'        => 'offcan_social_icon_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Social Icon Bg Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                       
                ),


                array(
                    'id'        => 'offcan_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Icon Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                       
                ),

                array(
                    'id'        => 'offcan_social_icon__color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Social Icon Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                       
                ),  


                array(
                    'id'        => 'offcanvas_closede_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Close Bg Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color', 
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                        
                ),

                array(
                    'id'        => 'offcanvas_icon_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Icon Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'off_canvas',
                            'equals',
                            1,
                        ),
                    ),                          
                ),
            )
        )
    );
    

    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'enthor' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'You can specify your body and heading font here','enthor'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'enthor' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'enthor' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '16px',
                    'font-family' => 'Josefin Sans',
                    'font-weight' => '400',
                ),
            ),
             array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__( 'Navigation Font', 'enthor' ),
                'subtitle' => esc_html__( 'Specify the menu font properties.', 'enthor' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#202427',                    
                    'font-family' => 'Josefin Sans',
                    'google'      => true,
                    'font-size'   => '15px',                    
                    'font-weight' => '600',                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H1', 'enthor' ),
                'font-backup' => true,                
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'enthor' ),
                'default'     => array(
                    'color'       => '#2C163C',
                    'font-style'  => '700',
                    'font-family' => 'Josefin Sans',
                    'google'      => true,
                    'font-size'   => '50px',
                    'line-height' => '60px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H2', 'enthor' ),
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'enthor' ),
                'default'     => array(
                    'color'       => '#2C163C',
                    'font-style'  => '700',
                    'font-family' => 'Josefin Sans',
                    'google'      => true,
                    'font-size'   => '40px',
                    'line-height' => '50px'
                    
                ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H3', 'enthor' ),             
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'enthor' ),
                'default'     => array(
                    'color'       => '#2C163C',
                    'font-style'  => '700',
                    'font-family' => 'Josefin Sans',
                    'google'      => true,
                    'font-size'   => '30px',
                    'line-height' => '40px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H4', 'enthor' ),                
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'enthor' ),
                'default'     => array(
                    'color'       => '#2C163C',
                    'font-style'  => '700',
                    'font-family' => 'Josefin Sans',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '30px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H5', 'enthor' ),                
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'enthor' ),
                'default'     => array(
                    'color'       => '#2C163C',
                    'font-style'  => '700',
                    'font-family' => 'Josefin Sans',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H6', 'enthor' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'enthor' ),
                'default'     => array(
                    'color'       => '#2C163C',
                    'font-style'  => '700',
                    'font-family' => 'Josefin Sans',
                    'google'      => true,
                    'font-size'   => '16px',
                    'line-height' => '20px'
                ),
            ),
                
        )
    )                   
    );

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Section', 'enthor' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
        );
        
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Settings', 'enthor' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                array(
                    'id'    => 'blog_banner_main', 
                    'url'   => true,     
                    'title' => esc_html__( 'Blog Page Banner', 'enthor' ),                 
                    'type'  => 'media',                                  
                ),

                array(
                    'id'        => 'banner__top__gap',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Banner Top Gap','enthor'),   
                    'default'   => '',                             
                ),                        

                array(
                    'id'        => 'banner__btm__gap',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Banner Bottom Gap','enthor'),   
                    'default'   => '',                             
                ),  

                array(
                    'id'        => 'blog_bg_color',
                    'type'      => 'color',                           
                    'title'     => esc_html__('Body Backgroud Color','enthor'),
                    'subtitle'  => esc_html__('Pick body background color', 'enthor'),
                    'default'   => '#fbfbfb',
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'blog_bg_sidebar_color',
                    'type'      => 'color',                           
                    'title'     => esc_html__('Sidebar Backgroud Color','enthor'),
                    'subtitle'  => esc_html__('Pick Sidebar background color', 'enthor'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'blog_meta_color',
                    'type'      => 'color',                           
                    'title'     => esc_html__('Meta Color','enthor'),
                    'subtitle'  => esc_html__('Pick Meta color', 'enthor'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'breadcrumb__title_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Title Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),
                
                array(
                    'id'       => 'blog_title',                               
                    'title'    => esc_html__( 'Blog  Title', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter Blog  Title Here', 'enthor' ),
                    'type'     => 'text',                                   
                ),
                
                array(
                    'id'               => 'blog-layout',
                    'type'             => 'image_select',
                    'title'            => esc_html__('Select Blog Layout', 'enthor'), 
                    'subtitle'         => esc_html__('Select your blog layout', 'enthor'),
                    'options'          => array(
                    'full'             => array(
                    'alt'              => 'Blog Style 1', 
                    'img'              => get_template_directory_uri().'/libs/img/1c.png'                                      
                ),
                    '2right'           => array(
                    'alt'              => 'Blog Style 2', 
                    'img'              => get_template_directory_uri().'/libs/img/2cr.png'
                ),
                '2left'            => array(
                'alt'              => 'Blog Style 3', 
                'img'              => get_template_directory_uri().'/libs/img/2cl.png'
                ),                                  
                ),
                'default'          => '2right'
                ),                      
                
                array(
                    'id'               => 'blog-grid',
                    'type'             => 'select',
                    'title'            => esc_html__('Select Blog Gird', 'enthor'),                   
                    'desc'             => esc_html__('Select your blog gird layout', 'enthor'),
                //Must provide key => value pairs for select options
                'options'          => array(
                    '12'               => esc_html__('1 Column','enthor'),                                   
                    '6'                => esc_html__('2 Column', 'enthor'),                                         
                    '4'                => esc_html__('3 Column', 'enthor'),
                    '3'                => esc_html__('4 Column', 'enthor'),
                    ),
                    'default'          => '12',                                  
                ),  
                
                array(
                'id'               => 'blog-author-post',
                'type'             => 'select',
                'title'            => esc_html__('Show Author Info ', 'enthor'),                   
                'desc'             => esc_html__('Select author info show or hide', 'enthor'),
                //Must provide key => value pairs for select options
                'options'          => array(                                            
                'show'             => esc_html__('Show','enthor'), 
                'hide'             => esc_html__('Hide', 'enthor'),
                ),
                'default'          => 'show',
                
                ), 

                

                array(
                'id'               => 'blog-category',
                'type'             => 'select',
                'title'            => esc_html__('Show Category', 'enthor'),                   
               
                //Must provide key => value pairs for select options
                'options'          => array(                                            
                'show'             => esc_html__('Show','enthor'), 
                'hide'             => esc_html__('Hide', 'enthor'),
                ),
                'default'          => 'show',
                
                ),  
                

                array(
                'id'               => 'blog-date',
                'type'             => 'select',
                'title'            => esc_html__('Show Date', 'enthor'),                   
                'desc'             => esc_html__('Select Date show or hide', 'enthor'),
                //Must provide key => value pairs for select options
                'options'          => array(                                            
                'show'             => esc_html__('Show','enthor'), 
                'hide'             => esc_html__('Hide', 'enthor'),
                ),
                'default'          => 'show',
                ), 
                array(
                    'id'               => 'blog_readmore',                               
                    'title'            => esc_html__( 'Blog  ReadMore Text', 'enthor' ),
                    'subtitle'         => esc_html__( 'Enter Blog  ReadMore Here', 'enthor' ),
                    'type'             => 'text',                                   
                ),
                
            )
        )       
    );
    
    
    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post', 'enthor' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
            array(
                    'id'       => 'blog_banner', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Blog Single page banner', 'enthor' ),                  
                    'type'     => 'media',
                    
            ),  
           
            array(
               'id'       => 'blog-meta-single',
               'type'     => 'switch', 
               'title'    => esc_html__('Show Meta? (just on this option)', 'enthor'),
               'subtitle' => esc_html__('You can show or hide Meta', 'enthor'),
               'default'  => false,
            ),   
           
            array(
               'id'       => 'blog-pagination',
               'type'     => 'switch', 
               'title'    => esc_html__('Single Post Pagination Show/Hide', 'enthor'),
               'subtitle' => esc_html__('You can show or hide single post pagination', 'enthor'),
               'default'  => false,
            ),     
        )
    ));

    /*Department Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Section', 'enthor' ),
        'id'               => 'Portfolio',
        'customizer_width' => '450px',
        'icon' => 'el el-align-right',
        'fields'           => array(
            array(
            'id'       => 'disable_portfoli_banner',
            'type'     => 'switch', 
            'title'    => esc_html__('Disable Portfolio Details Banner', 'enthor'),
            'subtitle' => esc_html__('You can show or hide banner here', 'enthor'),
            'default'  => true,
        ),
        
        array(
            'id'       => 'department_single_image', 
            'url'      => true,     
            'title'    => esc_html__( 'Portfolio Single page banner image', 'enthor' ),                    
            'type'     => 'media',
            'required' => array(
                array(
                    'disable_portfoli_banner',
                    'equals',
                    1,
                ),
            ),    
        ),           


        array(
            'id'       => 'portfolio_slug',                               
            'title'    => esc_html__( 'Portfolio Slug', 'enthor' ),
            'subtitle' => esc_html__( 'Enter Portfolio Slug Here', 'enthor' ),
            'type'     => 'text',
            'default'  => 'portfolio', 
            'required' => array(
                array(
                    'disable_portfoli_banner',
                    'equals',
                    1,
                ),
            ), 
        ), 

        array(
            'id'       => 'portfolio_cat_slug',                               
            'title'    => esc_html__( 'Portfolio Category Slug', 'enthor' ),
            'subtitle' => esc_html__( 'Enter Portfolio Cat Slug Here', 'enthor' ),
            'type'     => 'text',
            'default'  => '',
            'required' => array(
                array(
                    'disable_portfoli_banner',
                    'equals',
                    1,
                ),
            ),                
        ), 

        array(
            'id'       => 'portfolio_level',                               
            'title'    => esc_html__( 'Portfolio Category Level', 'enthor' ),
            'subtitle' => esc_html__( 'Enter Level Here Here', 'enthor' ),
            'type'     => 'text',
            'default'  => 'Portfolio Categorires',
            'required' => array(
                array(
                    'disable_portfoli_banner',
                    'equals',
                    1,
                ),
            ),
        ), 
        )
    ) 
);




    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Icons', 'enthor' ),
        'desc'   => esc_html__( 'Add your social icon here', 'enthor' ),
        'icon'   => 'el el-share',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
            array(
                'id'       => 'facebook',                               
                'title'    => esc_html__( 'Facebook Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Facebook Link', 'enthor' ),
                'type'     => 'text',                     
            ),
                
             array(
                'id'       => 'twitter',                               
                'title'    => esc_html__( 'Twitter Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Twitter Link', 'enthor' ),
                'type'     => 'text'
            ),
            
                array(
                'id'       => 'rss',                               
                'title'    => esc_html__( 'Rss Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Rss Link', 'enthor' ),
                'type'     => 'text'
            ),
                    
            array(
                'id'       => 'pinterest',                               
                'title'    => esc_html__( 'Pinterest Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Pinterest Link', 'enthor' ),
                'type'     => 'text'
            ),
            array(
                'id'       => 'linkedin',                               
                'title'    => esc_html__( 'Linkedin Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Linkedin Link', 'enthor' ),
                'type'     => 'text',            
            ),

            array(
                'id'       => 'instagram',                               
                'title'    => esc_html__( 'Instagram Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Instagram Link', 'enthor' ),
                'type'     => 'text',                       
            ),

             array(
                'id'       => 'youtube',                               
                'title'    => esc_html__( 'Youtube Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Youtube Link', 'enthor' ),
                'type'     => 'text',                       
            ),

            array(
                'id'       => 'tumblr',                               
                'title'    => esc_html__( 'Tumblr Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Tumblr Link', 'enthor' ),
                'type'     => 'text',                       
            ),

            array(
                'id'       => 'vimeo',                               
                'title'    => esc_html__( 'Vimeo Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Vimeo Link', 'enthor' ),
                'type'     => 'text',                       
            ),  

            array(
                'id'       => 'telegram',                               
                'title'    => esc_html__( 'Telegram Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Telegram Link', 'enthor' ),
                'type'     => 'text',                       
            ), 

            array(
                'id'       => 'whatsapp',                               
                'title'    => esc_html__( 'Whatsapp Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Whatsapp Link', 'enthor' ),
                'type'     => 'text',                       
            ),

            array(
                'id'       => 'soundcloud',                               
                'title'    => esc_html__( 'Soundcloud Link', 'enthor' ),
                'subtitle' => esc_html__( 'Enter Soundcloud Link', 'enthor' ),
                'type'     => 'text',                       
            ),                          
            ) 
        ) 
    );

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Mouse Pointer Here', 'enthor' ),
        'desc'   => esc_html__( 'Add your Mouse Pointer here', 'enthor' ),
        'icon'   => 'el el-hand-up',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                array(
                    'id'       => 'show_pointer',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Show Pointer', 'enthor'),
                    'subtitle' => esc_html__('You can show or hide mouse pointer', 'enthor'),
                    'default'  => false,
                ), 

                array(
                    'id'        => 'pointer_border',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Pointer Border Color','enthor'),
                    'subtitle'  => esc_html__('Pick color', 'enthor'),    
                    'default'   => '#1273eb',                        
                    'validate'  => 'color',    
                    'required' => array(
                        array(
                            'show_pointer',
                            'equals',
                            1,
                        ),
                    )                    
                ), 

                array(
                    'id'        => 'pointer_bg',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Pointer Bg','enthor'),
                    'subtitle'  => esc_html__('Enter Pointer Background color', 'enthor'),    
                    'default'   => 'transparent',                        
                    'validate'  => 'color',
                    'required' => array(
                        array(
                            'show_pointer',
                            'equals',
                            1,
                        ),
                    )                        
                ),

                array(
                    'id'       => 'border_width',                               
                    'title'    => esc_html__( 'Border Width', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter Pointer Border Width', 'enthor' ),
                    'type'     => 'text',
                    'default'   => '2', 
                    'required' => array(
                        array(
                            'show_pointer',
                            'equals',
                            1,
                        ),
                    )                        
                ), 

                array(
                    'id'       => 'diameter',                               
                    'title'    => esc_html__( 'Diameter', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter Pointer Size', 'enthor' ),
                    'type'     => 'text',  
                    'default'   => '35',   
                    'required' => array(
                        array(
                            'show_pointer',
                            'equals',
                            1,
                        ),
                    )                 
                ),   

                array(
                    'id'       => 'speed',                               
                    'title'    => esc_html__( 'Pointer Speed', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter Pointer Scale Size', 'enthor' ),
                    'type'     => 'text',
                    'default'   => '6',  
                    'required' => array(
                        array(
                            'show_pointer',
                            'equals',
                            1,
                        ),
                    )                       
                ),                     

                array(
                    'id'       => 'scale',                               
                    'title'    => esc_html__( 'Hover Scale', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter Pointer Scale Size', 'enthor' ),
                    'type'     => 'text',
                    'default'   => '1.3',    
                    'required' => array(
                        array(
                            'show_pointer',
                            'equals',
                            1,
                        ),
                    )                     
                ),
            ) 
        ) 
    );
   
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer Option', 'enthor' ),
    'desc'   => esc_html__( 'Footer style here', 'enthor' ),
    'icon'   => 'el el-th-large',   
    'fields' => array(

        array(
            'id'        => 'footer_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Bg Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),

        array(
            'id'       => 'footer_bg_image', 
            'url'      => true,     
            'title'    => esc_html__( 'Footer Background Image', 'enthor' ),                 
            'type'     => 'media',                                  
        ),

        array(
            'id'       => 'footer_logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Footer Logo', 'enthor' ),
            'subtitle' => esc_html__( 'Upload your footer logo', 'enthor' ),                  
        ), 

     
        array(
            'id'       => 'footer-logo-height',                               
            'title'    => esc_html__( 'Logo Height', 'enthor' ),
            'subtitle' => esc_html__( 'Logo max height example(50px)', 'enthor' ),
            'type'     => 'text',
            'default'  => ''                    
        ), 

        array(
            'id'               => 'footer_width_here',
            'type'             => 'select',
            'title'            => esc_html__('Footer Area Width', 'enthor'),             
            'options'          => array(                                     
                'container' => esc_html__('Container', 'enthor'),
                'full'      => esc_html__('Container Fluid', 'enthor')
            ),
            'default'          => 'container',            
        ),

        array(
            'id'        => 'foot_social_color',
            'type'      => 'color',
            'title'     => esc_html__('Social Icon Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),                   

        array(
            'id'        => 'foot_social_border_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Social Border Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),                   

        array(
            'id'        => 'foot_social_hover',
            'type'      => 'color',
            'title'     => esc_html__('Social Icon Hover','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),   


        array(
            'id'        => 'footer_h3_size',
            'type'      => 'text',                       
            'title'     => esc_html__('Footer Title Font Size','enthor'),
            'subtitle'  => esc_html__('Font Size', 'enthor'),    
            'default'   => '',                                            
        ),

        array(
            'id'        => 'footer_text_size',
            'type'      => 'text',                       
            'title'     => esc_html__('Footer Font Size','enthor'),
            'subtitle'  => esc_html__('Font Size', 'enthor'),    
            'default'   => '',                                            
        ),  

          

        array(
            'id'        => 'footer_link_size',
            'type'      => 'text',                       
            'title'     => esc_html__('Footer Link Font Size','enthor'),
            'subtitle'  => esc_html__('Font Size', 'enthor'),    
            'default'   => '',                                            
        ), 
        array(
            'id'        => 'footer_title_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Title Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ), 

        array(
            'id'        => 'footer_title_border_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Title Border Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color', 
            'output' => array(                 
            'background-color'            => '.back-footer .footer-top h3.footer-title:after'
            )                       
        ),   

        array(
            'id'        => 'footer_text_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Text Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),

        array(
            'id'        => 'footer_icon_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Icon Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color', 
            'output' => array(                 
            'color'            => '.back-footer .fa-ul li i, .back-footer .recent-post-widget .show-featured .post-desc i'
            )                       
        ),   

        array(
            'id'        => 'footer_link_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Link Hover Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),

        array(
            'id'        => 'footer_input_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Input Bg Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),    

        array(
            'id'        => 'footer_button_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Button Bg Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ), 

        array(
            'id'        => 'footer_button_bg_hover_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Button Hover Bg Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),

        array(
            'id'        => 'footer_button_text_color',
            'type'      => 'color',
            'title'     => esc_html__('Footer Button Text Color','enthor'),
            'subtitle'  => esc_html__('Pick color.', 'enthor'),
            'default'   => '',
            'validate'  => 'color',                        
        ),                  
                       
                
            array(
                'id'       => 'copyright',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Footer CopyRight', 'enthor' ),
                'subtitle' => esc_html__( 'Change your footer copyright text ?', 'enthor' ),
                'default'  => esc_html__( '2023 All Rights Reserved', 'enthor' ),
            ),  

            array(
                'id'       => 'copyright_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Background', 'enthor' ),
                'subtitle' => esc_html__( 'Copyright Background Color', 'enthor' ),      
                'default'  => '',            
            ),

            array(
                'id'        => 'copyright_borders',
                'type'      => 'color_rgba',                       
                'title'     => esc_html__('Copyright Border Color','enthor'),
                'subtitle'  => esc_html__('Pick color', 'enthor'),   
                  
                'default'  => array(
                    'color'     => '',
                    'alpha'     => 1                    
                ),
                'output' => array(                 
                    'border-color'            => '.footer-bottom .container, .footer-bottom .container-fluid'
                )
            ),

            array(
                'id'       => 'copyright_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Text Color', 'enthor' ),
                'subtitle' => esc_html__( 'Copyright Text Color', 'enthor' ),      
                'default'  => '',            
            ), 

            array(
                'id'        => 'copyright_dots_color',
                'type'      => 'color',
                'title'     => esc_html__('Copyright Dots Color','enthor'),
                'subtitle'  => esc_html__('Pick color.', 'enthor'),
                'default'   => '',
                'validate'  => 'color', 
                'output' => array(                 
                'background-color'            => '.footer-bottom .copyright-widget .widget_nav_menu ul.menu li a:after'
                )                       
            ), 
        ) 
    ) 
    );

    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Error Page', 'enthor' ),
    'desc'   => esc_html__( '404 details  here', 'enthor' ),
    'icon'   => 'el el-error-alt',    
    'fields' => array(

                array(
                    'id'       => 'error__404_image',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Error Image', 'enthor' ),
                    'subtitle' => esc_html__( 'Upload your image', 'enthor' ),
                    'url'=> true,               
                ), 

                array(
                    'id'       => 'title_404',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Title', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter title for 404 page', 'enthor' ), 
                    'default'  => esc_html__('404', 'enthor')                
                ),  
                
                array(
                    'id'       => 'text_404',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Text', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter text for 404 page', 'enthor' ),  
                    'default'  => esc_html__('Page Not Found', 'enthor')             
                ),                      
                       
                
                array(
                    'id'       => 'back_home',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Back to Home Button Label', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter label for "Back to Home" button', 'enthor' ),
                    'default'  => esc_html__('Back to Homepage', 'enthor') 
                ),

                array(
                    'id'       => 'error_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload 404 Page Bg', 'enthor' ),
                    'subtitle' => esc_html__( 'Upload your image', 'enthor' ),
                    'url'=> true                
                ),                             
            ) 
        ) 
    ); 


    /***************************************************
    ********* Coming Soon Here ***********
    ****************************************************/
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Coming Soon Page', 'enthor' ),
    'desc'   => esc_html__( 'You can set coming soon/maintenance mode here', 'enthor' ),
    'icon'   => 'el el-time',    
    'fields' => array(

                array(
                    'id'       => 'show-comingsoon',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Enable Coming Soon', 'enthor'),
                    'subtitle' => esc_html__('You can enable/disable coming soon', 'enthor'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'coming_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Page Background', 'enthor' ),
                    'subtitle' => esc_html__( 'Upload your image', 'enthor' ),
                    'url'=> true,
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),

                array(
                    'id'       => 'coming_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Coming Soon Logo', 'enthor' ),
                    'subtitle' => esc_html__( 'Upload your image', 'enthor' ),
                    'url'=> true,
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),

                array(
                    'id'       => 'coming-logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'enthor' ),
                    'subtitle' => esc_html__( 'Logo max height example(40px)', 'enthor' ),
                    'type'     => 'text',
                    'default'  => '',
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),                    
                ), 

                array(
                    'id'       => 'coming_title',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Title', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter title for coming soon page', 'enthor' ), 
                    'default'  => esc_html__('Coming Soon', 'enthor'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),  
                
                array(
                    'id'       => 'coming_text',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Text here', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter text coming soon page', 'enthor' ),  
                    'default'  => esc_html__('Our Exciting Website Is Coming Soon! Check Back Later', 'enthor'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),            
                ),                         
                
                array(
                    'id'            => 'opt-date-time',
                    'type'          => 'text',
                    'title'         => esc_html__('Date/Time', 'enthor'),
                    'subtitle'      => esc_html__('Add Date/Time ex(Y-m-d  H:m:s)','enthor'), 
                    'default'  =>   esc_html__('2024-10-22 18:46:16','enthor'),   
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),                       
                ),
                array(
                    'id'       => 'coming_day',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Day Text', 'enthor' ),                  
                    'default'  => esc_html__('Days', 'enthor'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),

                array(
                    'id'       => 'coming_hour',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Hour Text', 'enthor' ),                  
                    'default'  => esc_html__('Hours', 'enthor'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),                
                ), 

                array(
                    'id'       => 'coming_min',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Minute Text', 'enthor' ),                  
                    'default'  => esc_html__('Minutes', 'enthor'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),               
                ),                   

                array(
                    'id'       => 'coming_sec',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Second Text', 'enthor' ),                  
                    'default'  => esc_html__('Seconds', 'enthor'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),             
                ),                   

                array(
                    'id'       => 'fllows_title_here',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Social Title', 'enthor' ),
                    'subtitle' => esc_html__( 'Enter title', 'enthor' ), 
                    'default'  => esc_html__('', 'enthor'),
                    'required' => array(
                        array(
                            'show-comingsoon',
                            'equals',
                            1,
                        ),
                    ),             
                ),                       
            ) 
        ) 
    ); 

    /***************************************************
    ********* Custom CSS Here =***********
    ****************************************************/
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Custom CSS Here', 'enthor'),
        'icon'      => 'el-icon-bookmark',
        'icon_class' => 'el-icon-large',
        'fields'    => array(
                array(
                    'id'        => 'custom-css',
                    'type'      => 'ace_editor',
                    'mode'      => 'css',
                    'title'     => esc_html__('Custom CSS', 'enthor'),
                    'subtitle' => esc_html__('you can add here your custom css code', 'enthor'),
                    'default'   => '',
                ),                                                                      
            ) 
        ) 
    );   


    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";           
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.     
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'enthor' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'enthor' ),
                'icon'   => 'el el-paper-clip',              
                'fields' => array()
            );
            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );              
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
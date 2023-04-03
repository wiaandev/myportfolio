<?php
/**
 * @author  backtheme
 */
function enthor_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'enthor_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function enthor_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}
add_action( 'wp_head', 'enthor_pingback_header' );

/**  kses_allowed_html */

/*
Register Fonts theme google font
*/
function enthor_studio_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'enthor' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Josefin Sans:400,500,600,700,800,900|Yeseva One:400,500,600,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*
Enqueue scripts and styles.
*/
function enthor_studio_scripts() {
    wp_enqueue_style( 'enthor-fonts', enthor_studio_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'enthor_studio_scripts' );


//Favicon Icon
function enthor_site_icon() {
 if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {     
    global $enthor_option;
     
    if(!empty($enthor_option['back_favicon']['url']))
    {?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(($enthor_option['back_favicon']['url'])); ?>"> 
  <?php 
    }
  }
}
add_filter('wp_head', 'enthor_site_icon');


//excerpt for specific section
function enthor_wpex_get_excerpt( $args = array() ) {
  // Defaults
  $defaults = array(
    'post'            => '',
    'length'          => 48,
    'readmore'        => false,
    'readmore_text'   => esc_html__( 'read more', 'enthor' ),
    'readmore_after'  => '',
    'custom_excerpts' => true,
    'disable_more'    => false,
  );
  // Apply filters
  $defaults = apply_filters( 'enthor_wpex_get_excerpt_defaults', $defaults );
  // Parse args
  $args = wp_parse_args( $args, $defaults );
  // Apply filters to args
  $args = apply_filters( 'enthor_wpex_get_excerpt_args', $defaults );
  // Extract
  extract( $args );
  // Get global post data
  if ( ! $post ) {
    global $post;
  }

  // Get post ID
  $post_id = $post->ID;

  // Check for custom excerpt
  if ( $custom_excerpts && has_excerpt( $post_id ) ) {
    $output = $post->post_excerpt;
  }
  // No custom excerpt...so lets generate one
  else {
    // Readmore link
    $readmore_link = '<a href="' . get_permalink( $post_id ) . '" class="readmore">' . $readmore_text . $readmore_after . '</a>';
    // Check for more tag and return content if it exists
    if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
      $output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
    }
    // No more tag defined so generate excerpt using wp_trim_words
    else {
      // Generate excerpt
      $output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );
      // Add readmore to excerpt if enabled
      if ( $readmore ) {
        $output .= apply_filters( 'enthor_wpex_readmore_link', $readmore_link );
      }

    }

  }
  // Apply filters and echo
  return apply_filters( 'enthor_wpex_get_excerpt', $output );
}

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );


//Demo content file include here

function enthor_import_files() {
  return array(
    array(
      'import_file_name'           => 'Enthor Light Demo Import',
      'categories'                 => array( 'Light Demo' ),
      'import_file_url'            => trailingslashit( get_template_directory_uri() ) . 'ocdi/enthor-content.xml',
      'import_widget_file_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/enthor-widget.wie',      
      'import_redux'               => array(
        array(
          'file_url'    => trailingslashit( get_template_directory_uri() ) . 'ocdi/enthor-options.json',
          'option_name' => 'enthor_option',
        ),
      ),
      
      'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'enthor' ),
      
    ),

    array(
      'import_file_name'           => 'Enthor Dark Demo Import',
      'categories'                 => array( 'Dark Demo' ),
      'import_file_url'            => trailingslashit( get_template_directory_uri() ) . 'ocdi/dark/enthor-content.xml',
      'import_widget_file_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/dark/enthor-widget.wie',      
      'import_redux'               => array(
        array(
          'file_url'    => trailingslashit( get_template_directory_uri() ) . 'ocdi/dark/enthor-options.json',
          'option_name' => 'enthor_option',
        ),
      ),
      
      'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'enthor' ),
      
    ),
    
  );
}

add_filter( 'pt-ocdi/import_files', 'enthor_import_files' );

function enthor_after_import_setup() {
  // Assign menus to their locations.
  $main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' ); 
  $single_menu = get_term_by( 'name', 'Single Menu', 'nav_menu' ); 
  set_theme_mod( 'nav_menu_locations', array(
      'menu-1' => $main_menu->term_id,        
      'menu-2' => $single_menu->term_id        
    )
  );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Home' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'enthor_after_import_setup' );
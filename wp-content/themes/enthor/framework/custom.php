<?php
/*
dynamic css file. please don't edit it. it's update automatically when settins changed
*/
add_action('wp_head', 'enthor_custom_colors', 160);
function enthor_custom_colors() { 
global $enthor_option;	
/***styling options
------------------*/
	if(!empty($enthor_option['body_bg_color']))
	{
	$body_bg         = $enthor_option['body_bg_color'];
	$body_color       = $enthor_option['body_text_color'];	
	$site_color       = $enthor_option['primary_color'];
	$secondary_color  = $enthor_option['secondary_color'];	
	$footer_bgcolor   = $enthor_option['footer_bg_color'];

	if(!empty($enthor_option['menu_text_color'])){		
		$menu_text_color         = $enthor_option['menu_text_color'];
	}
	if(!empty($enthor_option['menu_text_hover_color'])){		
		$menu_text_hover_color   = $enthor_option['menu_text_hover_color'];
	}
	if(!empty($enthor_option['menu_text_active_color'])){		
		$menu_active_color       = $enthor_option['menu_text_active_color'];
	}
	
	if(!empty($enthor_option['menu_text_hover_bg'])){		
		$menu_text_hover_bg      = $enthor_option['menu_text_hover_bg'];
	}
	if(!empty($enthor_option['menu_text_active_bg'])){		
		$menu_text_active_bg     = $enthor_option['menu_text_active_bg'];
	}
	
	if(!empty($enthor_option['drop_text_color'])){		
		$dropdown_text_color     = $enthor_option['drop_text_color'];
	}
	
	if(!empty($enthor_option['drop_text_hover_color'])){		
		$drop_text_hover_color   = $enthor_option['drop_text_hover_color'];
	}			
	
	if(!empty($enthor_option['drop_text_hoverbg_color'])){		
		$drop_text_hoverbg_color = $enthor_option['drop_text_hoverbg_color'];
	}
	
	if(!empty($enthor_option['drop_down_bg_color'])){		
		$drop_down_bg_color = $enthor_option['drop_down_bg_color'];
	}	
	
	$back_top_style = get_post_meta(get_the_ID(), 'topbar-color', true);
    if($back_top_style =='toplight' || $back_top_style==''){
		$toolbar_bg    = $enthor_option['toolbar_bg_color'];
		$toolbar_text  = $enthor_option['toolbar_text_color'];
		$toolbar_link  = $enthor_option['toolbar_link_color'];
		$toolbar_hover = $enthor_option['toolbar_link_hover_color'];
	} else{
		$toolbar_bg    = $enthor_option['toolbar_bg_color2'];
		$toolbar_text  = $enthor_option['toolbar_text_color2'];
		$toolbar_link  = $enthor_option['toolbar_link_color2'];
		$toolbar_hover = $enthor_option['toolbar_link_hover_color2'];
    }

	//typography extract for body
	
	if(!empty($enthor_option['opt-typography-body']['color']))
	{
		$body_typography_color = $enthor_option['opt-typography-body']['color'];
	}
	if(!empty($enthor_option['opt-typography-body']['line-height']))
	{
		$body_typography_lineheight = $enthor_option['opt-typography-body']['line-height'];
	}
		
	$body_typography_font      = $enthor_option['opt-typography-body']['font-family'];
	$body_typography_font_size = $enthor_option['opt-typography-body']['font-size'];

	//typography extract for menu
	$menu_typography_color       = $enthor_option['opt-typography-menu']['color'];	
	$menu_typography_weight      = $enthor_option['opt-typography-menu']['font-weight'];	
	$menu_typography_font_family = $enthor_option['opt-typography-menu']['font-family'];
	$menu_typography_font_fsize  = $enthor_option['opt-typography-menu']['font-size'];
		
	if(!empty($enthor_option['opt-typography-menu']['line-height']))
	{
		$menu_typography_line_height=$enthor_option['opt-typography-menu']['line-height'];
	}
	
	//typography extract for heading
	
	$h1_typography_color=$enthor_option['opt-typography-h1']['color'];		
	if(!empty($enthor_option['opt-typography-h1']['font-weight']))
	{
		$h1_typography_weight=$enthor_option['opt-typography-h1']['font-weight'];
	}
		
	$h1_typography_font_family=$enthor_option['opt-typography-h1']['font-family'];
	$h1_typography_font_fsize=$enthor_option['opt-typography-h1']['font-size'];	
	if(!empty($enthor_option['opt-typography-h1']['line-height']))
	{
		$h1_typography_line_height=$enthor_option['opt-typography-h1']['line-height'];
	}
	
	$h2_typography_color=$enthor_option['opt-typography-h2']['color'];	

	$h2_typography_font_fsize=$enthor_option['opt-typography-h2']['font-size'];	
	if(!empty($enthor_option['opt-typography-h2']['font-weight']))
	{
		$h2_typography_font_weight=$enthor_option['opt-typography-h2']['font-weight'];
	}	
	$h2_typography_font_family=$enthor_option['opt-typography-h2']['font-family'];
	$h2_typography_font_fsize=$enthor_option['opt-typography-h2']['font-size'];	
	if(!empty($enthor_option['opt-typography-h2']['line-height']))
	{
		$h2_typography_line_height=$enthor_option['opt-typography-h2']['line-height'];
	}
	
	$h3_typography_color=$enthor_option['opt-typography-h3']['color'];	
	if(!empty($enthor_option['opt-typography-h3']['font-weight']))
	{
		$h3_typography_font_weightt=$enthor_option['opt-typography-h3']['font-weight'];
	}	
	$h3_typography_font_family = $enthor_option['opt-typography-h3']['font-family'];
	$h3_typography_font_fsize  = $enthor_option['opt-typography-h3']['font-size'];	
	if(!empty($enthor_option['opt-typography-h3']['line-height']))
	{
		$h3_typography_line_height = $enthor_option['opt-typography-h3']['line-height'];
	}

	$h4_typography_color = $enthor_option['opt-typography-h4']['color'];	
	if(!empty($enthor_option['opt-typography-h4']['font-weight']))
	{
		$h4_typography_font_weight = $enthor_option['opt-typography-h4']['font-weight'];
	}	
	$h4_typography_font_family = $enthor_option['opt-typography-h4']['font-family'];
	$h4_typography_font_fsize  = $enthor_option['opt-typography-h4']['font-size'];	
	if(!empty($enthor_option['opt-typography-h4']['line-height']))
	{
		$h4_typography_line_height = $enthor_option['opt-typography-h4']['line-height'];
	}
	
	$h5_typography_color = $enthor_option['opt-typography-h5']['color'];	
	if(!empty($enthor_option['opt-typography-h5']['font-weight']))
	{
		$h5_typography_font_weight = $enthor_option['opt-typography-h5']['font-weight'];
	}	
	$h5_typography_font_family = $enthor_option['opt-typography-h5']['font-family'];
	$h5_typography_font_fsize  = $enthor_option['opt-typography-h5']['font-size'];	
	if(!empty($enthor_option['opt-typography-h5']['line-height']))
	{
		$h5_typography_line_height = $enthor_option['opt-typography-h5']['line-height'];
	}
	
	$h6_typography_color = $enthor_option['opt-typography-6']['color'];	
	if(!empty($enthor_option['opt-typography-6']['font-weight']))
	{
		$h6_typography_font_weight = $enthor_option['opt-typography-6']['font-weight'];
	}
	$h6_typography_font_family = $enthor_option['opt-typography-6']['font-family'];
	$h6_typography_font_fsize  = $enthor_option['opt-typography-6']['font-size'];	
	if(!empty($enthor_option['opt-typography-6']['line-height']))
	{
		$h6_typography_line_height = $enthor_option['opt-typography-6']['line-height'];
	}
	
?>

<!-- Typography -->
<?php if(!empty($body_color)){
	global $enthor_option;
	$hex = $site_color;
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	$site_color_rgb = "$r, $g, $b";


	$hex2 = $secondary_color;
	list($r, $g, $b) = sscanf($hex2, "#%02x%02x%02x");
	$second_color_rgb = "$r, $g, $b";

	?>

	<style>
		<?php if(!empty($enthor_option['copyright_bg']))
			{
				$copyright_bg = $enthor_option['copyright_bg'];
			?>
			.footer-bottom{
				background:<?php echo esc_attr($copyright_bg); ?> !important;
			}
		<?php } ?>
		
		body{
			background:<?php echo esc_attr($body_bg); ?>;
			color:<?php echo esc_attr($body_color); ?> !important;
			font-family: <?php echo esc_attr($body_typography_font);?> !important;    
		    font-size: <?php echo esc_attr($body_typography_font_size);?> !important;
		}

		h1{
			color:<?php echo esc_attr($h1_typography_color);?>;
			font-family:<?php echo esc_attr($h1_typography_font_family);?>;
			font-size:<?php echo esc_attr($h1_typography_font_fsize);?>;
			<?php if(!empty($h1_typography_weight)){
			?>
			font-weight:<?php echo esc_attr($h1_typography_weight);?>;
			<?php }?>
			
			<?php if(!empty($h1_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h1_typography_line_height);?>;
			<?php } ?>		
		}

		h2{
			color:<?php echo esc_attr($h2_typography_color);?>; 
			font-family:<?php echo esc_attr($h2_typography_font_family);?>;
			font-size:<?php echo esc_attr($h2_typography_font_fsize);?>;
			<?php if(!empty($h2_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h2_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h2_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h2_typography_line_height);?>
			<?php }?>
		}

		h3{
			color:<?php echo esc_attr($h3_typography_color);?> ;
			font-family:<?php echo esc_attr($h3_typography_font_family);?>;
			font-size:<?php echo esc_attr($h3_typography_font_fsize);?>;
			<?php if(!empty($h3_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h3_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h3_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h3_typography_line_height);?>;
			<?php }?>
		}

		h4{
			color:<?php echo esc_attr($h4_typography_color);?>;
			font-family:<?php echo esc_attr($h4_typography_font_family);?>;
			font-size:<?php echo esc_attr($h4_typography_font_fsize);?>;
			<?php if(!empty($h4_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h4_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h4_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h4_typography_line_height);?>;
			<?php }?>
			
		}

		h5{
			color:<?php echo esc_attr($h5_typography_color);?>;
			font-family:<?php echo esc_attr($h5_typography_font_family);?>;
			font-size:<?php echo esc_attr($h5_typography_font_fsize);?>;
			<?php if(!empty($h5_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h5_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h5_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h5_typography_line_height);?>;
			<?php }?>
		}

		h6{
			color:<?php echo esc_attr($h6_typography_color);?> ;
			font-family:<?php echo esc_attr($h6_typography_font_family);?>;
			font-size:<?php echo esc_attr($h6_typography_font_fsize);?>;
			<?php if(!empty($h6_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h6_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h6_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h6_typography_line_height);?>;
			<?php }?>
		}

		.menu-area .navbar ul li > a,
		.sidenav .widget_nav_menu ul li a{
			font-weight:<?php echo esc_attr($menu_typography_weight); ?>;
			font-family:<?php echo esc_attr($menu_typography_font_family); ?>;
			font-size:<?php echo esc_attr($menu_typography_font_fsize); ?>;
		}

		<?php if(!empty($enthor_option['toolbar_bg_color'])) : ?>
			#back-header .toolbar-area,
			#back-header.back-header-two .toolbar-area{
			background:<?php echo esc_attr($enthor_option['toolbar_bg_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['toolbar_text_color'])) : ?>
			#back-header .toolbar-area{
			color:<?php echo esc_attr($enthor_option['toolbar_text_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['toolbar_link_color'])) : ?>
			#back-header .toolbar-area .toolbar-contact ul li a,
			#back-header .toolbar-area .toolbar-sl-share ul li.opening a{
			color:<?php echo esc_attr($enthor_option['toolbar_link_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['toolbar_link_hover_color'])) : ?>
			#back-header .toolbar-area .toolbar-contact ul li a:hover,
			#back-header .toolbar-area .toolbar-sl-share ul li.opening a:hover{
			color:<?php echo esc_attr($enthor_option['toolbar_link_hover_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['transparent_toolbar_text_color'])) : ?>
			#back-header.back-header-two .toolbar-area .toolbar-contact ul li a,
			#back-header.back-header-two .toolbar-area .opening{
			color:<?php echo esc_attr($enthor_option['transparent_toolbar_text_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['transparent_toolbar_link_hover_color'])) : ?>
			#back-header.back-header-two .toolbar-area .toolbar-contact ul li a:hover,
			#back-header.back-header-two .toolbar-area .toolbar-sl-share ul li.opening a:hover{
			color:<?php echo esc_attr($enthor_option['transparent_toolbar_link_hover_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['toolbar_icn_color'])) : ?>
			#back-header .toolbar-area .toolbar-contact ul li i{
			color:<?php echo esc_attr($enthor_option['toolbar_icn_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['toolbar_soci_icn_color'])) : ?>
			#back-header .toolbar-area .toolbar-sl-share ul li a i{
			color:<?php echo esc_attr($enthor_option['toolbar_soci_icn_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['toolbar_text_size'])) : ?>
			#back-header .toolbar-area, 
			#back-header.back-header-two .toolbar-area .opening,
			#back-header .toolbar-area .toolbar-contact ul li a, 
			#back-header .toolbar-area .toolbar-sl-share ul li.opening a{
			font-size:<?php echo esc_attr($enthor_option['toolbar_text_size']); ?> 
		}
		<?php endif; ?>


		<?php if(!empty($enthor_option['primary_color'])) : ?>
			.comment-respond .form-submit #submit,
			#scrollUp i,
			.page-error.back-coming-soon .countdown-inner .time_circles div,
			.page-error.back-coming-soon .follow-us-sbuscribe ul li a:hover,
			.bs-sidebar .widget_categories ul li:hover:after,
			.back-blog-details .bs-info.tags a:hover,
			.bs-sidebar .tagcloud a:hover{
			background:<?php echo esc_attr($enthor_option['primary_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['primary_color'])) : ?>
			.bs-sidebar .tagcloud a:hover,
			.back-blog-details .bs-info.tags a:hover{
			border-color:<?php echo esc_attr($enthor_option['primary_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['primary_color'])) : ?>
			.back-blog .blog-item .blog-button a:hover,
			a,
			.single .ps-navigation .prev:hover span,
			.bs-sidebar ul a:hover,
			.single-post .single-posts-meta li span i,
			.back-blog-details .type-post .tag-line a:hover,
			.back-blog-details .type-post .tag-line i:before,
			.single-post .single-posts-meta li.post-comment i:before,
			.full-blog-content .btm-cate li i:before,
			.btm-cate li a:hover,
			.full-blog-content .author i,
			.full-blog-content .blog-title a:hover,
			.bs-sidebar .widget_search button:hover:before,
			.bs-sidebar .widget_search button, .bs-sidebar .bs-search button,
			.bs-sidebar .recent-post-widget .post-desc a:hover,
			.bs-sidebar .recent-post-widget .post-desc span i,
			.bs-sidebar .recent-post-widget .post-desc span i:before,
			.single .ps-navigation .next:hover span{
			color:<?php echo esc_attr($enthor_option['primary_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['secondary_color'])) : ?>
			.comment-respond .form-submit #submit:hover{
			background:<?php echo esc_attr($enthor_option['secondary_color']); ?> 
		}
		<?php endif; ?>

		

		<?php if(!empty($enthor_option['breadcrumb_text_color'])) : ?>
			.back-breadcrumbs .breadcrumbs-title span a span,
			.back-breadcrumbs .page-title,
			.back-breadcrumbs .breadcrumbs-title .current-item{
			color:<?php echo esc_attr($enthor_option['breadcrumb_text_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['breadcrumb_seperator_color'])) : ?>
			.back-breadcrumbs .breadcrumbs-title span a:before{
			background:<?php echo esc_attr($enthor_option['breadcrumb_seperator_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['breadcrumb_title'])) : ?>
			.back-breadcrumbs .page-title{
			font-size:<?php echo esc_attr($enthor_option['breadcrumb_title']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['breadcrumb-align'])) : ?>
			.back-breadcrumbs .breadcrumbs-inner{
			text-align:<?php echo esc_attr($enthor_option['breadcrumb-align']); ?> 
		}
		<?php endif; ?>	


		<?php if(!empty($enthor_option['breadcrumb_top_gap'])) : ?>
			.back-breadcrumbs .breadcrumbs-inner{
				padding-top:<?php echo esc_attr($enthor_option['breadcrumb_top_gap']); ?> 
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['breadcrumb_bottom_gap'])) : ?>
			.back-breadcrumbs .breadcrumbs-inner{
				padding-bottom:<?php echo esc_attr($enthor_option['breadcrumb_bottom_gap']); ?> 
			}
		<?php endif; ?>


		<?php if(!empty($enthor_option['offcan_bgs_color'])) : ?>
			.back-menu-wrap-offcanvas,
			.back-offcanvas{
			background:<?php echo esc_attr($enthor_option['offcan_bgs_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['offcan_txt_color'])) : ?>
			.back-menu-wrap-offcanvas .inner-offcan{
			color:<?php echo esc_attr($enthor_option['offcan_txt_color']); ?> 
		}
		<?php endif; ?>		

		<?php if(!empty($enthor_option['offcan_link_color'])) : ?>
			.sidenav .fa-ul.back-info li a{
			color:<?php echo esc_attr($enthor_option['offcan_link_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['offcan_link_hover_color'])) : ?>
			.sidenav .fa-ul.back-info li a:hover{
			color:<?php echo esc_attr($enthor_option['offcan_link_hover_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['offcan_icon_color'])) : ?>
			.sidenav .fa-ul.back-info li i{
			color:<?php echo esc_attr($enthor_option['offcan_icon_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['offcanvas_closede_color'])) : ?>
			.back-menu-wrap-offcanvas .inner-offcan .back-nav-link .close-button{
			background:<?php echo esc_attr($enthor_option['offcanvas_closede_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['body_bg_color'])) : ?>
			body{
			background:<?php echo esc_attr($enthor_option['body_bg_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['blog_meta_color'])) : ?>
			.single-post .single-posts-meta li,
			.back-blog-details .type-post .tag-line a{
			color:<?php echo esc_attr($enthor_option['blog_meta_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['blog_bg_sidebar_color'])) : ?>
			.bs-sidebar .widget{
			background:<?php echo esc_attr($enthor_option['blog_bg_sidebar_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['blog_bg_sidebar_color'])) : ?>
			.bs-sidebar .widget{
			border-color:<?php echo esc_attr($enthor_option['blog_bg_sidebar_color']); ?> 
		}
		<?php endif; ?>


		<?php if(!empty($enthor_option['dark_bg_color'])) : ?>
			.comments-area p.comment-form-author input,
			.bs-sidebar .tagcloud a,
			.back-blog-details blockquote,
			.back-blog-details .bs-info.tags a,
			.comments-area p.comment-form-email input,
			.blog .back-blog .blog-item, .archive .back-blog .blog-item,
			.comments-area p.comment-form-comment textarea{
			background:<?php echo esc_attr($enthor_option['dark_bg_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['dark_bg_color'])) : ?>
			.comments-area p.comment-form-author input,
			.blog .back-blog .blog-item, .archive .back-blog .blog-item,
			.comments-area p.comment-form-email input,
			.back-blog-details .bs-info.tags a,
			.comments-area p.comment-form-comment textarea{
			border-color:<?php echo esc_attr($enthor_option['dark_bg_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['dark_bg_color'])) : ?>
			.bs-sidebar .tagcloud a{
			border-color:<?php echo esc_attr($enthor_option['dark_bg_color']); ?> 
		}
		<?php endif; ?>	
			
		<?php if(!empty($enthor_option['dark_txt_color'])) : ?>
			.bs-sidebar .recent-post-widget .post-desc a,
			.bs-sidebar ul a,
			.bs-sidebar .widget_block h2, 
			.bs-sidebar .recent-post-widget .post-desc span,
			.bs-sidebar .tagcloud a,
			a,
			.back-blog-details .bs-info.tags a,
			.full-blog-content .blog-title a,
			.back-blog .blog-item .blog-button a,
			.full-blog-content .author,
			.full-blog-content .blog-date,
			.btm-cate li a,
			body .full-blog-content .btm-cate li i:before,
			body .bs-sidebar .recent-post-widget .post-desc span i:before,
			.back-blog-details blockquote,
			.back-blog-details blockquote em,
			.single .ps-navigation .link_text,
			.ps-navigation ul a,
			.back-blog-details .bs-info.tags,
			.bs-sidebar label.wp-block-search__label, .bs-sidebar .widget-title,
			.comments-area p.comment-form-comment textarea{
			color:<?php echo esc_attr($enthor_option['dark_txt_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['blog_bg_color'])) : ?>
			body.single-post, body.blog, body.archive, 
			body.single-services, body.single-mp-event,
			.back-blog-details .type-post{
			background:<?php echo esc_attr($enthor_option['blog_bg_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['offcan_social_icon_bg_color'])) : ?>
			.sidenav .footer_social li a i{
			background:<?php echo esc_attr($enthor_option['offcan_social_icon_bg_color']); ?> 
		}
		<?php endif; ?>


		<?php if(!empty($enthor_option['offcan_social_icon__color'])) : ?>
			.sidenav .footer_social li a i{
			color:<?php echo esc_attr($enthor_option['offcan_social_icon__color']); ?> 
		}
		<?php endif; ?>	
		
		<?php if(!empty($enthor_option['offcan_title_color'])) : ?>
			.sidenav .fa-ul li em{
			color:<?php echo esc_attr($enthor_option['offcan_title_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['offcanvas_icon_color'])) : ?>
			.back-menu-wrap-offcanvas .inner-offcan .back-nav-link .close-button{
			color:<?php echo esc_attr($enthor_option['offcanvas_icon_color']); ?> 
		}
		<?php endif; ?>


		<?php if(!empty($enthor_option['menu_area_bg_color'])) : ?>
			#back-header .menu-sticky .menu-area{
			background:<?php echo esc_attr($enthor_option['menu_area_bg_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_text_color'])) : ?>		
			.menu-area .navbar ul > li > a,
			#back-header .back_sticky_search_here i:before{
				color:<?php echo esc_attr($enthor_option['menu_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_text_color'])) : ?>		
			.offcanvas-icon .back-nav-link .nav-menu-link span{
				background:<?php echo esc_attr($enthor_option['menu_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_text_hover_color'])) : ?>		
			.menu-area .navbar ul > li:hover > a,
			#back-header .back_sticky_search_here:hover i:before{
				color:<?php echo esc_attr($enthor_option['menu_text_hover_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_text_hover_color'])) : ?>		
			.offcanvas-icon .back-nav-link .nav-menu-link:hover span{
				background:<?php echo esc_attr($enthor_option['menu_text_hover_color']); ?>;
			}		
		<?php endif; ?>
		

		<?php if(!empty($enthor_option['menu_text_active_color'])) : ?>		
			.menu-area .navbar ul > li.current-menu-item > a,
			.menu-area .navbar ul li ul.sub-menu li.current-menu-ancestor > a, 
			.menu-area .navbar ul li ul.sub-menu li.current_page_item > a{
				color:<?php echo esc_attr($enthor_option['menu_text_active_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['transparent_menu_text_color'])) : ?>		
			.back-header-two .menu-area .navbar ul > li > a,
			.back-phone a,
			.offcanvas-icon .back-nav-link .nav-menu-link i,
			.back-phone i,
			#back-header.back-header-two .back_sticky_search_here i:before{
				color:<?php echo esc_attr($enthor_option['transparent_menu_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['transparent_menu_text_color'])) : ?>		
			.back-header-two .offcanvas-icon .back-nav-link .nav-menu-link span{
				background:<?php echo esc_attr($enthor_option['transparent_menu_text_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($enthor_option['transparent_menu_hover_color'])) : ?>		
			.back-header-two .offcanvas-icon .back-nav-link .nav-menu-link:hover span{
				background:<?php echo esc_attr($enthor_option['transparent_menu_hover_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['transparent_menu_hover_color'])) : ?>		
			.back-header-two .menu-area .navbar ul > li:hover > a,
			.back-phone a:hover,
			.offcanvas-icon .back-nav-link .nav-menu-link i:hover,		
			#back-header.back-header-two .back_sticky_search_here:hover i:before{
				color:<?php echo esc_attr($enthor_option['transparent_menu_hover_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['transparent_menu_active_color'])) : ?>
			.back-header-two .menu-area .navbar ul > li.current-menu-ancestor > a,		
			.back-header-two .menu-area .navbar ul > li.current_page_item > a,		
			.back-header-two .menu-area .navbar ul li ul.sub-menu li.current-menu-ancestor > a, 
			.back-header-two .menu-area .navbar ul li ul.sub-menu li.current_page_item > a{
				color:<?php echo esc_attr($enthor_option['transparent_menu_active_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_item_gap'])) : ?>
			.menu-area .navbar ul > li{
				padding-left:<?php echo esc_attr($enthor_option['menu_item_gap']); ?>;
				padding-right:<?php echo esc_attr($enthor_option['menu_item_gap']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_item_gap2'])) : ?>
			.menu-area .navbar ul > li{
				padding-top:<?php echo esc_attr($enthor_option['menu_item_gap2']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_item_gap3'])) : ?>
			.menu-area .navbar ul > li{
				padding-bottom:<?php echo esc_attr($enthor_option['menu_item_gap3']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_text_trasform'])) : ?>
			.menu-area .navbar ul > li > a{
				text-transform:uppercase;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['drop_down_bg_color'])) : ?>		
			.menu-area .navbar ul li .sub-menu{
				background:<?php echo esc_attr($enthor_option['drop_down_bg_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['drop_text_color'])) : ?>		
			.menu-area .navbar ul li ul.sub-menu li a{
				color:<?php echo esc_attr($enthor_option['drop_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['drop_text_hover_color'])) : ?>		
			.menu-area .navbar ul li ul.sub-menu li:hover > a{
				color:<?php echo esc_attr($enthor_option['drop_text_hover_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_text_trasform2'])) : ?>
			.menu-area .navbar ul.sub-menu  li  a{
				text-transform:uppercase !important;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['container_size'])) : ?>
			@media only screen and (min-width: 1300px) {
				.container{
					max-width:<?php echo esc_attr($enthor_option['container_size']); ?>;
				}
			}
		<?php endif; ?>


		<?php if(!empty($enthor_option['stiky_menu_areas_bg_color'])) : ?>
			#back-header .menu-sticky.sticky .menu-area{
				background:<?php echo esc_attr($enthor_option['stiky_menu_areas_bg_color']); ?> !important; 
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['stikcy_menu_text_color'])) : ?>		
			.menu-sticky.sticky .menu-area .navbar ul > li > a,
			.menu-sticky.sticky .back-phone a,
			.menu-sticky.sticky .offcanvas-icon .back-nav-link .nav-menu-link i,
			.menu-sticky.sticky .back-phone i,
			#back-header .menu-sticky.sticky .back_sticky_search_here i:before{
				color:<?php echo esc_attr($enthor_option['stikcy_menu_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['stikcy_menu_text_color'])) : ?>		
			.menu-sticky.sticky .offcanvas-icon .back-nav-link .nav-menu-link span{
				background:<?php echo esc_attr($enthor_option['stikcy_menu_text_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($enthor_option['sticky_menu_text_hover_color'])) : ?>		
			.menu-sticky.sticky .offcanvas-icon .back-nav-link .nav-menu-link:hover span{
				background:<?php echo esc_attr($enthor_option['sticky_menu_text_hover_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($enthor_option['sticky_menu_text_hover_color'])) : ?>		
			.menu-sticky.sticky .menu-area .navbar ul > li:hover > a,
			.menu-sticky.sticky .back-phone a:hover,
			.menu-sticky.sticky .offcanvas-icon .back-nav-link .nav-menu-link i:hover,
			#back-header .menu-sticky.sticky .back_sticky_search_here:hover i:before{
				color:<?php echo esc_attr($enthor_option['sticky_menu_text_hover_color']); ?>;
			}		
		<?php endif; ?>



		<?php if(!empty($enthor_option['stikcy_menu_text_active_color'])) : ?>		
			.menu-sticky.sticky .menu-area .navbar ul > li.current-menu-item > a,
			.menu-sticky.sticky .menu-area .navbar ul li ul.sub-menu li.current-menu-ancestor > a, 
			.menu-sticky.sticky .menu-area .navbar ul li ul.sub-menu li.current_page_item > a{
				color:<?php echo esc_attr($enthor_option['stikcy_menu_text_active_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($enthor_option['sticky_drop_down_bg_color'])) : ?>		
			.menu-sticky.sticky .menu-area .navbar ul li .sub-menu{
				background:<?php echo esc_attr($enthor_option['sticky_drop_down_bg_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['stikcy_drop_text_color'])) : ?>		
			.menu-sticky.sticky .menu-area .navbar ul li ul.sub-menu li a{
				color:<?php echo esc_attr($enthor_option['stikcy_drop_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($enthor_option['sticky_drop_text_hover_color'])) : ?>		
			.menu-sticky.sticky .menu-area .navbar ul li ul.sub-menu li:hover > a{
				color:<?php echo esc_attr($enthor_option['sticky_drop_text_hover_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($enthor_option['footer_bg_color'])) : ?>
			.back-footer{
				background:<?php echo esc_attr($enthor_option['footer_bg_color']); ?> !important;
			}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['foot_social_color'])) : ?>
			.back-footer ul.footer_social li a{
				color:<?php echo esc_attr($enthor_option['foot_social_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['foot_social_border_color'])) : ?>
			.back-footer ul.footer_social li a{
				border-color:<?php echo esc_attr($enthor_option['foot_social_border_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['foot_social_hover'])) : ?>
			.back-footer ul.footer_social li a:hover{
				background:<?php echo esc_attr($enthor_option['foot_social_hover']); ?> !important;
				border-color:<?php echo esc_attr($enthor_option['foot_social_hover']); ?> !important;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['footer_text_size'])) : ?>
			.back-footer, .back-footer h3, .back-footer a, 
			.back-footer .fa-ul li a, 
			.back-footer .recent-post-widget .show-featured .post-desc span,
			.back-footer .widget.widget_nav_menu ul li a{
				font-size:<?php echo esc_attr($enthor_option['footer_text_size']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['footer_h3_size'])) : ?>
			.back-footer h3, .back-footer .footer-top h3.footer-title{
				font-size:<?php echo esc_attr($enthor_option['footer_h3_size']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['footer_link_size'])) : ?>
			.back-footer a{
				font-size:<?php echo esc_attr($enthor_option['footer_link_size']); ?>;
			}
		<?php endif; ?>	

		<?php if(!empty($enthor_option['footer_text_color'])) : ?>
			.back-footer, .back-footer .footer-top h3.footer-title, .back-footer a, .back-footer .fa-ul li a,
			.back-footer .widget.widget_nav_menu ul li a,
			.back-footer .recent-post-widget .show-featured .post-desc span,
			.back-footer .footer-top input[type="email"]::placeholder
			{
				color:<?php echo esc_attr($enthor_option['footer_text_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['footer_title_color'])) : ?>
			.back-footer .footer-top h3.footer-title
			{
				color:<?php echo esc_attr($enthor_option['footer_title_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['footer_link_color'])) : ?>
			.back-footer a:hover, .back-footer .widget.widget_nav_menu ul li a:hover,
			.back-footer .fa-ul li a:hover,
			.back-footer .widget.widget_pages ul li a:hover, .back-footer .widget.widget_recent_comments ul li:hover, .back-footer .widget.widget_archive ul li a:hover, .back-footer .widget.widget_categories ul li a:hover,
			.back-footer .widget a:hover{
				color:<?php echo esc_attr($enthor_option['footer_link_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['footer_input_bg_color'])) : ?>
			.back-footer .footer-top .mc4wp-form-fields input[type="email"]{
				background:<?php echo esc_attr($enthor_option['footer_input_bg_color']); ?>
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['footer_button_bg_color'])) : ?>
			.back-footer .footer-top .mc4wp-form-fields .back-subs input[type="submit"],
			.back-footer .footer-top .mc4wp-form-fields input[type="submit"]{
				background:<?php echo esc_attr($enthor_option['footer_button_bg_color']); ?>
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['footer_button_bg_hover_color'])) : ?>
			.back-footer .footer-top .mc4wp-form-fields input[type="submit"]:hover{
				background:<?php echo esc_attr($enthor_option['footer_button_bg_hover_color']); ?>;
			}
		<?php endif; ?>
		

		<?php if(!empty($enthor_option['footer_button_text_color'])) : ?>
			.back-footer .footer-top .mc4wp-form-fields input[type="submit"]{
				color:<?php echo esc_attr($enthor_option['footer_button_text_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['copyright_text_color'])) : ?>
			.footer-bottom .copyright p, 
			.footer-bottom .copyright p a, 
			.footer-bottom .copyright a{
				color:<?php echo sanitize_hex_color($enthor_option['copyright_text_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['logo-height-mobile'])) : ?>
			@media only screen and (max-width: 991px) {
				#back-header .logo-area a img{
					max-height:<?php echo esc_attr($enthor_option['logo-height-mobile']); ?> !important;
				}
			}
		<?php endif; ?>


		<?php if(!empty($enthor_option['breadcrumb_top_gap_mobile'])) : ?>
			@media only screen and (max-width: 991px) {
				<?php if(!empty($enthor_option['breadcrumb_top_gap_mobile'])) : ?>
					.back-breadcrumbs .breadcrumbs-inner{
					padding-top:<?php echo esc_attr($enthor_option['breadcrumb_top_gap_mobile']); ?> 
				}
				<?php endif; ?>

				<?php if(!empty($enthor_option['breadcrumb_bottom_gap_mobile'])) : ?>
					.back-breadcrumbs .breadcrumbs-inner{
					padding-bottom:<?php echo esc_attr($enthor_option['breadcrumb_bottom_gap_mobile']); ?> 
				}
				<?php endif; ?>
			}
		<?php endif; ?>


		<?php if(!empty($enthor_option['preloader_color'])) : ?>
			#back__circle_loader{
				border-top-color:<?php echo esc_attr($enthor_option['preloader_color']);?>;
				border-right-color:<?php echo esc_attr($enthor_option['preloader_color']);?>;
			}			
		<?php endif; ?>

		<?php if(!empty($enthor_option['preloader_color_left'])) : ?>
			#back__circle_loader{
				border-bottom-color:<?php echo esc_attr($enthor_option['preloader_color_left']);?>;
				border-left-color:<?php echo esc_attr($enthor_option['preloader_color_left']);?>;
			}			
		<?php endif; ?>

		

		<?php if(!empty($enthor_option['menu_item_gap'])) : ?>
			.menu-area .navbar ul li{
				padding-left:<?php echo esc_attr($enthor_option['menu_item_gap']); ?>;
				padding-right:<?php echo esc_attr($enthor_option['menu_item_gap']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_item_gap2'])) : ?>
			.menu-area .navbar ul > li,
			.menu-cart-area,
			#back-header .back-menu-responsive .sidebarmenu-search-here .back_sticky_search_here{
				padding-top:<?php echo esc_attr($enthor_option['menu_item_gap2']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($enthor_option['menu_item_gap3'])) : ?>
			.menu-area .navbar ul > li,
			.menu-cart-area,
			#back-header .back-menu-responsive .sidebarmenu-search-here .back_sticky_search_here{
				padding-bottom:<?php echo esc_attr($enthor_option['menu_item_gap3']); ?>;
			}
		<?php endif; ?>
	</style>
<?php } ?>
<?php
	
	if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {

			$enthor_shop_id        = get_option( 'woocommerce_shop_page_id' );			
			$padding_top           = get_post_meta($enthor_shop_id, 'content_top', true);
			$padding_bottom        = get_post_meta($enthor_shop_id, 'content_bottom', true);			
			$padding_top_footer    = get_post_meta($enthor_shop_id, 'content_top_footer', true);
			$padding_bottom_footer = get_post_meta($enthor_shop_id, 'content_bottom_footer', true);

  		if($padding_top != '' || $padding_bottom != '' || $padding_top_footer != '' || $padding_bottom_footer != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}

	  	  	<?php if(!empty($padding_top_footer)): ?>
	  	  	#back-footer{
	  	  		padding-top:<?php echo esc_attr($padding_top_footer);?> !important;	  	  		
	  	  	}
	  	  	<?php endif; ?>	  

	  	  	<?php if(!empty($padding_bottom_footer)): ?>	  	
	  	  	#back-footer .footer-top{	  	  		
	  	  		padding-bottom:<?php echo esc_attr($padding_bottom_footer);?> !important;
	  	  	}
	  	  	<?php endif; ?>

	  	  </style>	
	  	  <?php
	 	}
	}
	elseif(is_home() && !is_front_page() || is_home() && is_front_page()){
		$padding_top    = get_post_meta(get_queried_object_id(), 'content_top', true);
		$padding_bottom = get_post_meta(get_queried_object_id(), 'content_bottom', true);
		$padding_top_footer    = get_post_meta(get_queried_object_id(), 'content_top_footer', true);
		$padding_bottom_footer = get_post_meta(get_queried_object_id(), 'content_bottom_footer', true);

  		if($padding_top != '' || $padding_bottom != '' || $padding_top_footer != '' || $padding_bottom_footer != ''){
	  	?>
	  	  	<style>
	  	  		.main-contain #content{
	  	  			<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  			<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  		}

	  	  		<?php if(!empty($padding_top_footer)): ?>
	  	  		#back-footer{
	  	  			padding-top:<?php echo esc_attr($padding_top_footer);?> !important;	  	  		
	  	  		}
	  	  		<?php endif; ?>	  

	  	  		<?php if(!empty($padding_bottom_footer)): ?>	  	
	  	  		#back-footer .footer-top{	  	  		
	  	  			padding-bottom:<?php echo esc_attr($padding_bottom_footer);?> !important;
	  	  		}
	  	  		<?php endif; ?>

	  	  	</style>	
	  	<?php
	  }
  }
  	else{
		$padding_top    = get_post_meta(get_the_ID(), 'content_top', true);
		$padding_bottom = get_post_meta(get_the_ID(), 'content_bottom', true);
		$padding_top_footer    = get_post_meta(get_the_ID(), 'content_top_footer', true);
		$padding_bottom_footer = get_post_meta(get_the_ID(), 'content_bottom_footer', true);

  		if($padding_top != '' || $padding_bottom != '' || $padding_top_footer != '' || $padding_bottom_footer != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}

	  	  	<?php if(!empty($padding_top_footer)): ?>
	  	  	#back-footer{
	  	  		padding-top:<?php echo esc_attr($padding_top_footer);?> !important;	  	  		
	  	  	}
	  	  	<?php endif; ?>	  

	  	  	<?php if(!empty($padding_bottom_footer)): ?>	  	
	  	  	#back-footer .footer-top{	  	  		
	  	  		padding-bottom:<?php echo esc_attr($padding_bottom_footer);?> !important;
	  	  	}
	  	  	<?php endif; ?>

	  	  </style>	
	  	<?php
	  }
  	}

  	$quote_button_color           		    = get_post_meta(get_the_ID(), 'quote_button_color', true);
  	$quote_button_hover_color           	= get_post_meta(get_the_ID(), 'quote_button_hover_color', true);
  	$quote_button_bg_color           		= get_post_meta(get_the_ID(), 'quote_button_bg_color', true);
  	$quote_button_bg_hover_color           	= get_post_meta(get_the_ID(), 'quote_button_bg_hover_color', true);
  	$content_top           					= get_post_meta(get_the_ID(), 'content_top', true);
	$footer_links_colors   					= get_post_meta(get_the_ID(), 'footer_link_colorss', true);
	$primary_colors        					= get_post_meta(get_the_ID(), 'primary-colors', true);
	$copyright_text        					= get_post_meta(get_the_ID(), 'copyright_text', true);
	$copyright_border        				= get_post_meta(get_the_ID(), 'copyright_border', true);
	$copyright_text_dots        			= get_post_meta(get_the_ID(), 'copyright_text_dots', true);
	$copyright_text_hover        			= get_post_meta(get_the_ID(), 'copyright_text_hover', true);
	$footer_primary_color        			= get_post_meta(get_the_ID(), 'footer_primary_color', true);
	$menu_text_color        			    = get_post_meta(get_the_ID(), 'menu-text-color', true);
	$menu_text_hover_color        			= get_post_meta(get_the_ID(), 'menu-text-hover-color', true);
	
	?>

	  	<style>

	  		<?php 
	  		if(!empty($footer_links_colors)): ?>
	  			body .back-footer a, 
	  			body .back-footer .fa-ul li a, 
	  			body .back-footer .widget.widget_nav_menu ul li a{
	  				color:<?php echo esc_attr($footer_links_colors);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($menu_text_color)): ?>
	  			body:not(.search-results) .back-header-two .menu-area .navbar ul > li > a,
				body:not(.search-results) .back-phone a,
				body:not(.search-results) .offcanvas-icon .back-nav-link .nav-menu-link i,
				body:not(.search-results) .back-phone i,
				body:not(.search-results) #back-header.back-header-two .back_sticky_search_here i:before{
	  				color:<?php echo esc_attr($menu_text_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($copyright_border)): ?>
	  			body .footer-bottom .container, body .footer-bottom .container-fluid{
	  				border-color:<?php echo esc_attr($copyright_border);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($menu_text_hover_color)): ?>
	  			body:not(.search-results) .back-header-two .menu-area .navbar ul > li:hover > a, 
	  			body:not(.search-results) .back-header-two .menu-area .navbar ul > li.current_page_ancestor > a, 
	  			body:not(.search-results) .back-phone a:hover, 
	  			body:not(.search-results) .offcanvas-icon .back-nav-link .nav-menu-link i:hover, 
	  			body:not(.search-results) #back-header.back-header-two .back_sticky_search_here:hover i::before{
	  				color:<?php echo esc_attr($menu_text_hover_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($footer_primary_color)): ?>
	  			body .back-footer .fa-ul li i,
	  			body .back-footer .fa-ul li a:hover{
	  				color:<?php echo esc_attr($footer_primary_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($footer_primary_color)): ?>
	  			body .back-footer .footer-top h3.footer-title::after,
	  			body .back-footer .footer-top .mc4wp-form-fields .back-subs input[type="submit"],
	  			body .back-footer ul.footer_social li a:hover{
	  				background:<?php echo esc_attr($footer_primary_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($footer_primary_color)): ?>
	  			body .back-footer ul.footer_social li a:hover{
	  				border-color:<?php echo esc_attr($footer_primary_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($copyright_text)): ?>
	  			body .footer-bottom .copyright p, 
	  			body .footer-bottom .copyright a,
	  			body .footer-bottom .copyright-widget .widget_nav_menu ul.menu li a,
	  			body .footer-bottom .copyright p a,
	  			body .footer-bottom .copyright{
	  				color:<?php echo esc_attr($copyright_text);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($quote_button_color)): ?>
	  			body #back-header .back-quote a{
	  				color:<?php echo esc_attr($quote_button_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($quote_button_hover_color)): ?>
	  			body #back-header .back-quote a:hover{
	  				color:<?php echo esc_attr($quote_button_hover_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($quote_button_bg_color)): ?>
	  			body #back-header .back-quote a{
	  				background-color:<?php echo esc_attr($quote_button_bg_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($quote_button_bg_hover_color)): ?>
	  			body #back-header .back-quote a:hover{
	  				background-color:<?php echo esc_attr($quote_button_bg_hover_color);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($copyright_text_dots)): ?>
	  			body .footer-bottom .copyright-widget .widget_nav_menu ul.menu li a::after{
	  				background-color:<?php echo esc_attr($copyright_text_dots);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  		if(!empty($copyright_text_hover)): ?>
	  			body .footer-bottom .copyright a:hover,
	  			body .back-footer .footer-bottom .widget.widget_nav_menu ul li a:hover,
	  			body .footer-bottom .copyright p a:hover{
	  				color:<?php echo esc_attr($copyright_text_hover);?>;
	  			}
	  		<?php endif; ?>

			<?php 
				$output = '';
				if(isset($enthor_option['custom-css'])){
			   		$output = $enthor_option['custom-css'];
					echo esc_attr($output);
				}
			?> 	
		  	</style>
	<?php
}
}
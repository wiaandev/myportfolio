<div class="back-portfolio-grid-style4">
	<div class="row">
<?php 
	$settings = $this->get_settings_for_display();
    $cat = $settings['portfolio_category']; 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if(empty($cat)){
    	$best_wp = new wp_Query(array(
			'post_type'      => 'portfolios',
			'posts_per_page' => $settings['per_page'],
			'order' => $settings['portfolio_grid_order'],								
		));	  
    }   
    else{
    	$best_wp = new wp_Query(array(
				'post_type'      => 'portfolios',
				'posts_per_page' => $settings['per_page'],
				'order' => $settings['portfolio_grid_order'],		
				'tax_query'      => array(
			        array(
						'taxonomy' => 'portfolio-category',
						'field'    => 'slug', //can be set to ID
						'terms'    => $cat //if field is ID you can reference by cat/term number
			        ),
			    )
		));	  
    }
    $x = 1;
	while($best_wp->have_posts()): $best_wp->the_post();	
	$content       = get_the_content();
	$client        = get_post_meta( get_the_ID(), 'client', true );
	$location      = get_post_meta( get_the_ID(), 'location', true );
	$surface_area  = get_post_meta( get_the_ID(), 'surface_area', true );
	$created       = get_post_meta( get_the_ID(), 'created', true );
	$date          = get_post_meta( get_the_ID(), 'date', true );
	$project_value = get_post_meta( get_the_ID(), 'project_value', true );		
	
	$cats_show     = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', '<span class="separator">,</span> ');
								
	?>	
		<div class="col-lg-<?php echo esc_html($settings['portfolio_columns']);?> col-md-6 col-xs-1 grid-item ">
			<div class="single-case-studies">
				<div class="inner-case-studies">
					<?php if(has_post_thumbnail()){ ?>
					    <div class="case-img">
					        <?php  the_post_thumbnail($settings['thumbnail_size']);?>
					    </div>
					<?php } ?>

				    <div class="case-content">
				    	<?php if(get_the_title()):?>
				        	<h5 class="case-subtitle"><?php echo wp_kses_post($cats_show); ?></h5>
				        <?php endif; ?>
				        <h4 class="case-title"> <a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
				    </div>
				</div>
			</div>
		</div>
	<?php	
	$x++;
	endwhile;
	wp_reset_query();  
?>  
	</div>
</div>
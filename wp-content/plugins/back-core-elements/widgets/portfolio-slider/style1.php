<?php 
    $cat = $settings['portfolio_category']; 

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if(empty($cat)){
    	$best_wp = new wp_Query(array(
				'post_type'      => 'portfolios',
				'posts_per_page' => $settings['per_page'],								
		));	  
    }   
    else{
    	$best_wp = new wp_Query(array(
				'post_type'      => 'portfolios',
				'posts_per_page' => $settings['per_page'],				
				'tax_query'      => array(
			        array(
						'taxonomy' => 'portfolio-category',
						'field'    => 'slug', //can be set to ID
						'terms'    => $cat //if field is ID you can reference by cat/term number
			        ),
			    )
		));	  
    }

	while($best_wp->have_posts()): $best_wp->the_post();			
		$cats_show = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', '<span class="separator">,</span> ');							
	?>	

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
	<?php	
	endwhile;
	wp_reset_query();  
 ?>  

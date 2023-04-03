<?php //******************//
$cat = $settings['team_category'];

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if(empty($cat)){
	$best_wp = new wp_Query(array(
			'post_type'      => 'teams',
			'posts_per_page' => $settings['per_page'],
			'paged'          => $paged					
	));	  
}   
else{
	$best_wp = new wp_Query(array(
			'post_type'      => 'teams',
			'posts_per_page' => $settings['per_page'],
			'paged'          => $paged,
			'tax_query'      => array(
		        array(
					'taxonomy' => 'team-category',
					'field'    => 'slug', //can be set to ID
					'terms'    => $cat //if field is ID you can reference by cat/term number
		        ),
		    )
	));	  
}

while($best_wp->have_posts()): $best_wp->the_post();

    $designation  = !empty(get_post_meta( get_the_ID(), 'designation', true )) ? get_post_meta( get_the_ID(), 'designation', true ):'';			
    $content = get_the_content();									   
	//retrive social icon values			
	$facebook    = get_post_meta( get_the_ID(), 'facebook', true );
	$twitter     = get_post_meta( get_the_ID(), 'twitter', true );
	$google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
	$linkedin    = get_post_meta( get_the_ID(), 'linkedin', true );
	$show_phone  = get_post_meta( get_the_ID(), 'phone', true );
	$show_email  = get_post_meta( get_the_ID(), 'email', true );
	
	$fb   ='';
	$tw   ='';
	$gp   ='';
	$ldin ='';

	if($facebook!=''){
		$fb='<li><a href="'.$facebook.'" class="social-icon"><i class="ri-facebook-fill"></i></a></li>';
	}
	if($twitter!=''){
		$tw='<li><a href="'.$twitter.'" class="social-icon"><i class="ri-twitter-fill"></i></a></li>';
	}
	if($google_plus!=''){
		$gp='<li><a href="'.$google_plus.'" class="social-icon"><i class="ri-instagram-line"></i></a></li>';
	}
	if($linkedin!=''){
		$ldin='<li><a href="'.$linkedin.'" class="social-icon"><i class="ri-linkedin-fill"></i></a></li>';
	}
?>
	
<div class="single-team">
	<div class="team-img">
        <?php if('enable' == $settings['team_link_condition']){ ?>
        <a href="<?php the_permalink(); ?>">
        	<?php the_post_thumbnail($settings['thumbnail_size']); ?>
        </a>
        <?php } else { ?>
        	<?php the_post_thumbnail($settings['thumbnail_size']); ?>
        <?php } ?>

        <div class="team-info">
            <p class="desgnation"><?php echo esc_html( $designation );?></p>
            <h3 class="name">
                <?php if('enable' == $settings['team_link_condition']){ ?>
                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                <?php } else { ?>
                	<?php the_title();?>
                <?php } ?>
            </h3>

        </div>
        
		<?php if( $fb || $gp || $tw || $ldin ): ?>
			<ul class="social-links">
				<?php echo wp_kses_post($fb); ?>
				<?php echo wp_kses_post($gp);?>
				<?php echo wp_kses_post($tw);?>
				<?php echo wp_kses_post($ldin); ?>
	        </ul>
	    <?php endif; ?>                
        
    </div>					
</div>

<?php
endwhile;
wp_reset_query();  
?>  

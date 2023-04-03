<?php
global $enthor_option;
$back_top_search = get_post_meta(get_queried_object_id(), 'select-search', true);
//search page here
if(!empty($enthor_option['off_search'])):
    $back_sticky_search_here = $enthor_option['off_search'];
else:
    $back_sticky_search_here ='';
endif;
if(($back_sticky_search_here == '1') || ($back_top_search == 'show') ):
 ?>
	<div class="sticky_form">
		<div class="sticky_form_full">
		  <?php get_search_form(); ?> 
		</div><i class="ri-close-line close-search back_sticky_search_here sticky_form_search"></i>
		
	</div>
<?php endif; ?>


<?php
/**
 * Hide Posts Rendered by Featured Posts Area from Main Query
 */
 
//Create an Array to Store Post Ids of all posts that have been displayed already.

$ihbp_fpost_ids = array();
if ( get_theme_mod('ihbp_featposts_enable') ) :
	
	$args = array( 
		'posts_per_page' => 3,
		'cat' => esc_html(get_theme_mod('ihbp_featposts_cat')),
		'ignore_sticky_posts' => true,
	);
	
	$lastposts = new WP_Query($args);
	
	while ( $lastposts->have_posts() ) :
	  $lastposts->the_post(); 
	  
	  global $ihbp_fpost_ids;
	  $ihbp_fpost_ids[] = get_the_id(); 
	  
	 endwhile;
	 wp_reset_postdata(); 
endif;				
		
function ihbp_exclude_single_posts_home($query) {		
	global $ihbp_fpost_ids;

	if ($query->is_home() && $query->is_main_query()) {
	    $query->set('post__not_in', $ihbp_fpost_ids);
	  }
}	
add_action('pre_get_posts', 'ihbp_exclude_single_posts_home');

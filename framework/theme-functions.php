<?php
/*
 * @package , Copyright Rohit Tripathi, inkhive.com
 * This file contains Custom Theme Related Functions.
 */

//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/nav_walkers.php';
require get_template_directory() . '/framework/admin_modules/exclude_posts.php';
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/section_titles.php';


/*
** Function to check if Sidebar is enabled on Current Page 
*/
function ihbp_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('ihbp_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('ihbp_disable_sidebar_posts',true) && is_single() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('ihbp_disable_sidebar_pages',true) && is_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
** Add Body Class
*/
function ihbp_body_class( $classes ) {
	
	$sidebar_class_name =  ihbp_load_sidebar() ? "sidebar-enabled" : "sidebar-disabled" ;
    return array_merge( $classes, array( $sidebar_class_name ) );   
}
add_filter( 'body_class', 'ihbp_body_class' );


/*
**	Determining Sidebar and Primary Width
*/
function ihbp_primary_class() {
	$sw = esc_html(get_theme_mod('ihbp_sidebar_width',4));
	$class = "col-md-".(12-$sw);
	
	if ( !ihbp_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('ihbp_primary-width', 'ihbp_primary_class');

function ihbp_secondary_class() {
	$sw = esc_html(get_theme_mod('ihbp_sidebar_width',4));
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('ihbp_secondary-width', 'ihbp_secondary_class');

/*
**	Helper Function to Convert Colors
*/
function ihbp_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}

function ihbp_fade($color, $val) {
	return "rgba(".ihbp_hex2rgb($color).",". $val.")";
}

//Function to Trim Excerpt Length & more..
function ihbp_excerpt_length( $length ) {
	return 23;
}
add_filter( 'excerpt_length', 'ihbp_excerpt_length', 999 );

function ihbp_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'ihbp_excerpt_more' );



/*
** Function to Get Theme Layout 
*/
function ihbp_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('ihbp_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('ihbp_blog_layout') );
	else :
		get_template_part( $ldir ,'ihbp');	
	endif;	
}
add_action('ihbp_blog_layout', 'ihbp_get_blog_layout');

/*
** Function to Set Masonry Class 
*/
function ihbp_set_masonry_class(){
	if ( get_theme_mod('ihbp_blog_layout') != "masonry" ) :
		//DO NOTHING
	else :
		echo "masonry-main";	
	endif;	
}
add_action('ihbp_masonry_class', 'ihbp_set_masonry_class');



/*
** Load Custom Widgets
*/

require get_template_directory() . '/framework/widgets/recent-posts.php';

require get_template_directory() . '/framework/recommended-plugins/customizer-notify.php';



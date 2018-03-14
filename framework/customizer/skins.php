<?php
function ihbp_customize_register_skins( $wp_customize ) {
	
	$wp_customize->get_section('colors')->panel = "ihbp_design_panel";
	$wp_customize->get_section('custom_css')->panel = "ihbp_design_panel";
	//Replace Header Text Color with, separate colors for Title and Description
	$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','ih-business-pro');
	$wp_customize->add_setting('ihbp_header_desccolor', array(
	    'default'     => '#000',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'ihbp_header_desccolor', array(
			'label' => __('Site Tagline Color','ih-business-pro'),
			'section' => 'colors',
			'settings' => 'ihbp_header_desccolor',
			'type' => 'color'
		) ) 
	);
}
add_action( 'customize_register', 'ihbp_customize_register_skins' );
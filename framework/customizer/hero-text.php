<?php
function ihbp_customize_register_header_heading( $wp_customize ) {
	
	$wp_customize->add_section('ihbp_hero_text', array(
		'title' => __('Header Title & Button','ih-business-pro'),
		'panel' => 'ihbp_header_panel'	
	));
	
	$wp_customize->add_setting( 'ihbp_heading' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'ihbp_heading', array(
		'label' => __('Heading','ih-business-pro'),
		'section' => 'ihbp_hero_text',
		'settings' => 'ihbp_heading',
		'type' => 'text',
	) );
	
	$wp_customize->add_setting( 'ihbp_btn' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'ihbp_btn', array(
		'label' => __('Button','ih-business-pro'),
		'section' => 'ihbp_hero_text',
		'settings' => 'ihbp_btn',
		'type' => 'text',
	) );
	
	$wp_customize->add_setting( 'ihbp_h_url' , array(
	    'sanitize_callback' => 'esc_url_raw'
	) );
	
	$wp_customize->add_control(
	'ihbp_h_url', array(
		'label' => __('Button URL','ih-business-pro'),
		'section' => 'ihbp_hero_text',
		'settings' => 'ihbp_h_url',
		'type' => 'url',
	) );
	
}
add_action( 'customize_register', 'ihbp_customize_register_header_heading' );
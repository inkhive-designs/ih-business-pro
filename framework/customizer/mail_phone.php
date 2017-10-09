<?php
function ihbp_customize_register_header_mail( $wp_customize ) {
	
	$wp_customize->add_section('ihbp_mail', array(
		'title' => __('Email & Phone','ih-business-pro'),
		'panel' => 'ihbp_header_panel'	
	));
	
	$wp_customize->add_setting( 'ihbp_mail_id' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'ihbp_mail_id', array(
		'label' => __('Your Email','ih-business-pro'),
		'section' => 'ihbp_mail',
		'settings' => 'ihbp_mail_id',
		'type' => 'text',
	) );
	
	$wp_customize->add_setting( 'ihbp_phone' , array(
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	
	$wp_customize->add_control(
	'ihbp_phone', array(
		'label' => __('Your Phone No.','ih-business-pro'),
		'section' => 'ihbp_mail',
		'settings' => 'ihbp_phone',
		'type' => 'text',
	) );
	
}
add_action( 'customize_register', 'ihbp_customize_register_header_mail' );
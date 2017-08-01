<?php
function ihbp_customize_register_header( $wp_customize ) {
	//Settings for Header Image
	$wp_customize->add_panel('ihbp_header_panel', array(
		'priority' => 20,
		'title' => __('Header Settings','ih-business-pro')	
	));
	
	$wp_customize->get_section('header_image')->panel = 'ihbp_header_panel';
	$wp_customize->get_section('title_tagline')->panel = 'ihbp_header_panel';
	
	$wp_customize->add_setting( 'ihbp_himg_style' , array(
	    'default'     => 'cover',
	    'sanitize_callback' => 'ihbp_sanitize_himg_style'
	) );
	
	/* Sanitization Function */
	function ihbp_sanitize_himg_style( $input ) {
		if (in_array( $input, array('contain','cover') ) )
			return $input;
		else
			return 'ih-business-pro';	
	}
	
	$wp_customize->add_control(
	'ihbp_himg_style', array(
		'label' => __('Header Image Arrangement','ih-business-pro'),
		'section' => 'header_image',
		'settings' => 'ihbp_himg_style',
		'type' => 'select',
		'choices' => array(
				'contain' => __('Contain','ih-business-pro'),
				'cover' => __('Cover Completely (Recommended)','ih-business-pro'),
				)
	) );
	
	$wp_customize->add_setting( 'ihbp_himg_align' , array(
	    'default'     => 'center',
	    'sanitize_callback' => 'ihbp_sanitize_himg_align'
	) );
	
	/* Sanitization Function */
	function ihbp_sanitize_himg_align( $input ) {
		if (in_array( $input, array('center','left','right') ) )
			return $input;
		else
			return 'ih-business-pro';	
	}
	
	$wp_customize->add_control(
	'ihbp_himg_align', array(
		'label' => __('Header Image Alignment','ih-business-pro'),
		'section' => 'header_image',
		'settings' => 'ihbp_himg_align',
		'type' => 'select',
		'choices' => array(
				'center' => __('Center','ih-business-pro'),
				'left' => __('Left','ih-business-pro'),
				'right' => __('Right','ih-business-pro'),
			)
	) );
	
	$wp_customize->add_setting( 'ihbp_himg_repeat' , array(
	    'default'     => true,
	    'sanitize_callback' => 'ihbp_sanitize_checkbox'
	) );
	
	$wp_customize->add_control(
	'ihbp_himg_repeat', array(
		'label' => __('Repeat Header Image','ih-business-pro'),
		'section' => 'header_image',
		'settings' => 'ihbp_himg_repeat',
		'type' => 'checkbox',
	) );
}
add_action( 'customize_register', 'ihbp_customize_register_header' );
<?php
function ihbp_customize_register_header_heading( $wp_customize ) {
	
	$wp_customize->add_section('ihbp_hero_text', array(
		'title' => __('Header Title & Button','ih-business-pro'),
		'panel' => 'ihbp_header_panel'	
	));

	$wp_customize->add_setting( 'ihbp_hero_text_enable', array(
	    'sanitize_callback' => 'ihbp_sanitize_checkbox',
        'transport' => 'postMessage',
    ));

	$wp_customize->add_control( 'ihbp_hero_text_enable', array(
	    'label' => __('Enable', 'ih-business-pro'),
        'section' => 'ihbp_hero_text',
        'settings' => 'ihbp_hero_text_enable',
        'type' => 'checkbox'
    ));
	
	$wp_customize->add_setting( 'ihbp_heading' , array(
	    'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	
	$wp_customize->add_control(
	'ihbp_heading', array(
		'label' => __('Heading','ih-business-pro'),
		'section' => 'ihbp_hero_text',
		'settings' => 'ihbp_heading',
		'type' => 'text',
        'active_callback' => 'ihbp_show_hero_text_options'

    ) );
	
	$wp_customize->add_setting( 'ihbp_btn' , array(
	    'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
	
	$wp_customize->add_control(
	'ihbp_btn', array(
		'label' => __('Button','ih-business-pro'),
		'section' => 'ihbp_hero_text',
		'settings' => 'ihbp_btn',
		'type' => 'text',
        'active_callback' => 'ihbp_show_hero_text_options'
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
        'active_callback' => 'ihbp_show_hero_text_options'
	) );

	function ihbp_show_hero_text_options($control) {
	    $option = $control->manager->get_setting('ihbp_hero_text_enable');
	    return $option->value() == true;
    }
	
}
add_action( 'customize_register', 'ihbp_customize_register_header_heading' );
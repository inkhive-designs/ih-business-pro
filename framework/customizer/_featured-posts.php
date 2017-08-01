<?php
function ihbp_customize_register_fp( $wp_customize ) {
	//FEATURED POSTS	
	$wp_customize->add_section(
	    'ihbp_featposts',
	    array(
	        'title'     => __('Featured Posts','ih-business-pro'),
	        'priority'  => 35,
	    )
	);
	
	$wp_customize->add_setting(
		'ihbp_featposts_enable',
		array( 'sanitize_callback' => 'ihbp_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'ihbp_featposts_enable', array(
		    'settings' => 'ihbp_featposts_enable',
		    'label'    => __( 'Enable', 'ih-business-pro' ),
		    'section'  => 'ihbp_featposts',
		    'type'     => 'checkbox',
		)
	);	
	
	$wp_customize->add_setting(
		    'ihbp_featposts_cat',
		    array( 'sanitize_callback' => 'ihbp_sanitize_category' )
		);
	
		
	$wp_customize->add_control(
	    new Hanne_WP_Customize_Category_Control(
	        $wp_customize,
	        'ihbp_featposts_cat',
	        array(
	            'label'    => __('Category For Featured Posts','ih-business-pro'),
	            'settings' => 'ihbp_featposts_cat',
	            'section'  => 'ihbp_featposts'
	        )
	    )
	);
}
add_action( 'customize_register', 'ihbp_customize_register_fp' );
<?php
function ihbp_customize_register_fonts( $wp_customize ) {
		$wp_customize->add_section(
	    'ihbp_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','ih-business-pro'),
	        'panel' => 'ihbp_design_panel',
	        'priority'  => 41,
	    )
	);
	
	$font_array = array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'ihbp_title_font',
		array(
			'default'=> 'HIND',
			'sanitize_callback' => 'ihbp_sanitize_gfont' 
			)
	);
	
	function ihbp_sanitize_gfont( $input ) {
		if ( in_array($input, array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
			return $input;
		else
			return 'ih-business-pro';	
	}
	
	$wp_customize->add_control(
		'ihbp_title_font',array(
				'label' => __('Title','ih-business-pro'),
				'settings' => 'ihbp_title_font',
				'section'  => 'ihbp_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'ihbp_body_font',
			array(	'default'=> 'Open Sans',
					'sanitize_callback' => 'ihbp_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'ihbp_body_font',array(
				'label' => __('Body','ih-business-pro'),
				'settings' => 'ihbp_body_font',
				'section'  => 'ihbp_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);

}
add_action( 'customize_register', 'ihbp_customize_register_fonts' );
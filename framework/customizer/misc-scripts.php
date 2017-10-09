<?php
function ihbp_customize_register_misc( $wp_customize ) {
	$wp_customize->add_section(
	    'ihbp_sec_upgrade',
	    array(
	        'title'     => __('IHBP - Help & Support','ih-business-pro'),
	        'priority'  => 45,
	    )
	);
	
	$wp_customize->add_setting(
			'ihbp_upgrade',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new ihbp_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'ihbp_upgrade',
	        array(
	            'label' => __('Free Email Support','ih-business-pro'),
	            'description' => __('Currently We are Offering Free Email Support with our theme. If you have any queries or require help please <a href="https://inkhive.com/product/ih-business-pro/">Read our FAQs</a> and if your problem is still not solved then contact us. <br><br>','ih-business-pro'),
	            'section' => 'ihbp_sec_upgrade',
	            'settings' => 'ihbp_upgrade',			       
	        )
		)
	);
}
add_action( 'customize_register', 'ihbp_customize_register_misc' );
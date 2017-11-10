<?php
function ihbp_customize_register_frontpage( $wp_customize ) {
	
	$wp_customize->add_panel('ihbp_front_panel', array(
	    'priority'       => 35,
	    'title'          => __('Configure Front Page','ih-business-pro'),
	) );
	
	
	$wp_customize->get_section('static_front_page')->title = __('Enable Front Page','ih-business-pro');
	$wp_customize->get_section('static_front_page')->panel = 'ihbp_front_panel';

	$wp_customize->add_section(
	    'ihbp_sec_fp_basic_settings',
        array(
            'title' => __('Basic Settings', 'ih-business-pro'),
            'priority' => 1,
            'panel' => 'ihbp_front_panel'
        )
    );

    $wp_customize->add_setting(
	    'ihbp_fp_basic_settings_blog_set',
        array( 'sanitize_callback' => 'ihbp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
	    'ihbp_fp_basic_settings_blog_set',
	    array(
            'label' => __('Disable showing "From The Blog" section on front page', 'ih-business-pro'),
            'setting' => 'ihbp_fp_basic_settings_blog_set',
            'section' => 'ihbp_sec_fp_basic_settings',
            'type' => 'checkbox'
        )
    );

    //Front Page Content
    $wp_customize->add_setting(
        'ihbp_fp_content_set',
        array( 'sanitize_callback' => 'ihbp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'ihbp_fp_content_set',
        array(
            'label' => __('Disable showing Front Page Content section on front page', 'ih-business-pro'),
            'setting' => 'ihbp_fp_content_set',
            'section' => 'ihbp_sec_fp_basic_settings',
            'type' => 'checkbox'
        )
    );

	$wp_customize->add_section(
	    'ihbp_sec_fp_info',
	    array(
	        'title'     => __('Usage Instructions','ih-business-pro'),
	        'priority'  => 3,
	        'panel' => 'ihbp_front_panel'
	    )
	);
	
	$wp_customize->add_setting(
			'ihbp_fp_info',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new ihbp_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'ihbp_fp_info',
	        array(
	            'label' => __('IH Business Pro Works with a Static Front Page!','ih-business-pro'),
	            'description' => __('To Enable the Features of this theme like Showcases, Hero Sections, Sliders, Counters and much more. You need to Enable a static front page for your site. Go to the previous screen and choose a static front page and only then you will be able to fully utilize all the amazing features this theme has to offer. <br/> <br/>
	            
	            You can assign any page to be your front page. Its recommeneded that you create a new empty page, and set it as the front page.
	            <br/> <br/> If you plan on using this theme for your Personal Blog or you dont require a static front page, you can simple ignore this.','ih-business-pro'),
	            'section' => 'ihbp_sec_fp_info',
	            'settings' => 'ihbp_fp_info',			       
	        )
		)
	);
}
add_action( 'customize_register', 'ihbp_customize_register_frontpage' );
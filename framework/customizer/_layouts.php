<?php
function ihbp_customize_register_layouts( $wp_customize ) {
	// Layout and Design
	$wp_customize->add_panel( 'ihbp_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Design & Layout','ih-business-pro'),
	) );
	
	$wp_customize->add_section(
	    'ihbp_design_options',
	    array(
	        'title'     => __('Blog Layout','ih-business-pro'),
	        'priority'  => 0,
	        'panel'     => 'ihbp_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'ihbp_blog_layout',
		array( 'sanitize_callback' => 'ihbp_sanitize_blog_layout', 'default' => 'ihbp' )
	);
	
	function ihbp_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('ihbp','grid','grid_2_column','grid_3_column') ) )
			return $input;
		else 
			return 'ihbp';	
	}
	
	$wp_customize->add_control(
		'ihbp_blog_layout',array(
				'label' => __('Select Layout','ih-business-pro'),
				'description' => __('This is the Layout for your Recent Posts Page, Categories & Archives Pages. The Front Page of your site would use a Separate Layout.','ih-business-pro'),
				'settings' => 'ihbp_blog_layout',
				'section'  => 'ihbp_design_options',
				'type' => 'select',
				'choices' => array(
						'ihbp' => __('Default Theme Layout','ih-business-pro'),
						'grid' => __('Basic Blog Layout','ih-business-pro'),
						'grid_2_column' => __('Grid - 2 Column','ih-business-pro'),
						'grid_3_column' => __('Grid - 3 Column','ih-business-pro'),
						
					)
			)
	);
	
	$wp_customize->add_section(
	    'ihbp_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','ih-business-pro'),
	        'priority'  => 0,
	        'panel'     => 'ihbp_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'ihbp_disable_sidebar',
		array( 'sanitize_callback' => 'ihbp_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'ihbp_disable_sidebar', array(
		    'settings' => 'ihbp_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','ih-business-pro' ),
		    'section'  => 'ihbp_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);

	$wp_customize->add_setting(
		'ihbp_disable_sidebar_posts',
		array( 'sanitize_callback' => 'ihbp_sanitize_checkbox' )
	);

	$wp_customize->add_control(
			'ihbp_disable_sidebar_posts', array(
		    'settings' => 'ihbp_disable_sidebar_posts',
		    'label'    => __( 'Disable Sidebar on Posts.','ih-business-pro' ),
		    'section'  => 'ihbp_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'ihbp_show_sidebar_options',
		    'default'  => false
		)
	);

	$wp_customize->add_setting(
		'ihbp_disable_sidebar_pages',
		array( 'sanitize_callback' => 'ihbp_sanitize_checkbox' )
	);

	$wp_customize->add_control(
			'ihbp_disable_sidebar_pages', array(
		    'settings' => 'ihbp_disable_sidebar_pages',
		    'label'    => __( 'Disable Sidebar on Pages.','ih-business-pro' ),
		    'section'  => 'ihbp_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'ihbp_show_sidebar_options',
		    'default'  => false
		)
	);

	
	$wp_customize->add_setting(
		'ihbp_sidebar_width',
		array(
			'default' => 4,
		    'sanitize_callback' => 'ihbp_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'ihbp_sidebar_width', array(
		    'settings' => 'ihbp_sidebar_width',
		    'label'    => __( 'Sidebar Width','ih-business-pro' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','ih-business-pro'),
		    'section'  => 'ihbp_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'ihbp_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	/* Active Callback Function */
	function ihbp_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('ihbp_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	function ihbp_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'ihbp_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','ih-business-pro'),
    	'description'	=> __('Enter your Own Copyright Text.','ih-business-pro'),
    	'priority'		=> 11,
    	'panel'			=> 'ihbp_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'ihbp_footer_text',
	array(
		'default'		=> 'ih-business-pro',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'ihbp_footer_text',
	        array(
	            'section' => 'ihbp_custom_footer',
	            'settings' => 'ihbp_footer_text',
	            'type' => 'text'
	        )
	);
}
add_action( 'customize_register', 'ihbp_customize_register_layouts' );
<?php
function ihbp_customize_register_social( $wp_customize ) {
		// Social Icons
	$wp_customize->add_section('ihbp_social_section', array(
			'title' => __('Social Icons','ih-business-pro'),
			'priority' => 44 ,
			'panel' => 'ihbp_header_panel'
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','ih-business-pro'),
					'facebook' => __('Facebook','ih-business-pro'),
					'twitter' => __('Twitter','ih-business-pro'),
					'google-plus' => __('Google Plus','ih-business-pro'),
					'instagram' => __('Instagram','ih-business-pro'),
					'rss' => __('RSS Feeds','ih-business-pro'),
					'vine' => __('Vine','ih-business-pro'),
					'vimeo-square' => __('Vimeo','ih-business-pro'),
					'youtube' => __('Youtube','ih-business-pro'),
					'flickr' => __('Flickr','ih-business-pro'),
                    'linkedin' => __('Linked In','ih-business-pro'),
    );
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'ihbp_social_'.$x, array(
				'sanitize_callback' => 'ihbp_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'ihbp_social_'.$x, array(
					'settings' => 'ihbp_social_'.$x,
					'label' => __('Icon ','ih-business-pro').$x,
					'section' => 'ihbp_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'ihbp_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'ihbp_social_url'.$x, array(
					'settings' => 'ihbp_social_url'.$x,
					'description' => __('Icon ','ih-business-pro').$x.__(' Url','ih-business-pro'),
					'section' => 'ihbp_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function ihbp_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr',
                    'linkedin'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return 'ih-business-pro';	
	}
}
add_action( 'customize_register', 'ihbp_customize_register_social' );
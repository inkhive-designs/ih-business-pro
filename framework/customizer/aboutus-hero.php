<?php
function ihbp_customize_register_aboutus_hero($wp_customize) {
    //About Us Hero
    $wp_customize->add_section('ihbp_aboutus_hero_section',
        array(
            'title' => __('About Us HERO', 'ih-business-pro'),
            'priority' => 40,
        )
    );

    $wp_customize->add_setting(
        'ihbp_aboutus_hero_enable',
        array(
            'sanitize_callback' => 'ihbp_sanitize_checkbox',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
            'ihbp_aboutus_hero_enable',
            array(
                'settings'		=> 'ihbp_aboutus_hero_enable',
                'section'		=> 'ihbp_aboutus_hero_section',
                'label'			=> __( 'Enable About Us Hero', 'ih-business-pro' ),
                'type' 	=> 'checkbox'
            )
    );


    $wp_customize->add_setting('ihbp_aboutus_hero_background_image',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'ihbp_aboutus_hero_background_image',
            array (
                'setting' => 'ihbp_aboutus_hero_background_image',
                'section' => 'ihbp_aboutus_hero_section',
                'label' => __('Background Image', 'ih-business-pro'),
                'description' => __('Upload an image to display in background of HERO', 'ih-business-pro'),
                'active_callback' => 'ihbp_aboutus_hero_active_callback'
            )
        )
    );

    $wp_customize->add_setting('ihbp_aboutus_hero_selectpage',
        array(
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control('ihbp_aboutus_hero_selectpage',
        array(
            'setting' => 'ihbp_aboutus_hero_selectpage',
            'section' => 'ihbp_aboutus_hero_section',
            'label' => __('Title', 'ih-business-pro'),
            'description' => __('Select a Page to display Title', 'ih-business-pro'),
            'type' => 'dropdown-pages',
            'active_callback' => 'ihbp_aboutus_hero_active_callback'
        )
    );

    $wp_customize->add_setting('ihbp_aboutus_hero_full_content',
        array(
            'sanitize_callback' => 'ihbp_sanitize_checkbox'
        )
    );

    $wp_customize->add_control('ihbp_aboutus_hero_full_content',
        array(
            'setting' => 'ihbp_aboutus_hero_full_content',
            'section' => 'ihbp_aboutus_hero_section',
            'label' => __('Show Full Content instead of excerpt', 'ih-business-pro'),
            'type' => 'checkbox',
            'default' => false,
            'active_callback' => 'ihbp_aboutus_hero_active_callback'
        )
    );

    $wp_customize->add_setting('ihbp_aboutus_hero_button',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control('ihbp_aboutus_hero_button',
        array(
            'setting' => 'ihbp_aboutus_hero_button',
            'section' => 'ihbp_aboutus_hero_section',
            'label' => __('Button Name', 'ih-business-pro'),
            'description' => __('Leave blank to disable Button.', 'ih-business-pro'),
            'type' => 'text',
            'active_callback' => 'ihbp_aboutus_hero_active_callback'
        )
    );

    for ($i=1; $i<=3; $i++):
        $wp_customize->add_setting('ihbp_aboutus_hero_loadbar_title'.$i,
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'transport' => 'postMessage'
            )
        );
        $wp_customize->add_control('ihbp_aboutus_hero_loadbar_title'.$i,
            array(
                'setting' => 'ihbp_aboutus_hero_loadbar_title'.$i,
                'section' => 'ihbp_aboutus_hero_section',
                'label' => __('Enter Title for laodbar ', 'ih-business-pro').$i,
                'description' => __('Leave blank to disable Loadbar.', 'ih-business-pro'),
                'type' => 'text',
                'active_callback' => 'ihbp_aboutus_hero_active_callback'
            )
        );

        $wp_customize->add_setting('ihbp_aboutus_hero_loadbar'.$i,
            array(
                'sanitize_callback' => 'absint',
                'transport' => 'postMessage'
            )
        );
        $wp_customize->add_control('ihbp_aboutus_hero_loadbar'.$i,
            array(
                'setting' => 'ihbp_aboutus_hero_loadbar'.$i,
                'section' => 'ihbp_aboutus_hero_section',
                'label' => __('Loadbar Number(%) ', 'ih-business-pro').$i,
                'description' => __('Leave blank to disable Loadbar.', 'ih-business-pro'),
                'type' => 'text',
                'active_callback' => 'ihbp_aboutus_hero_active_callback'
            )
        );
    endfor;

    /* Active Callback Function */
    function ihbp_aboutus_hero_active_callback( $control ) {
        $option = $control->manager->get_setting('ihbp_aboutus_hero_enable');
        return $option->value() == true;
    }
}
add_action('customize_register', 'ihbp_customize_register_aboutus_hero');
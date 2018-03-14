<?php
function ihbp_customize_register_misc( $wp_customize ) {

    //Upgrade to Pro
    $wp_customize->add_section(
        'ihbp_sec_pro',
        array(
            'title'     => __('Important Links','ih-business-pro'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'ihbp_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new ihbp_WP_Customize_Upgrade_Control(
            $wp_customize,
            'ihbp_pro',
            array(
                'description'	=> '<a class="ihbp-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'ih-business-pro').'</a>
                                    <a class="ihbp-important-links" href="https://inkhive.com/documentation/ih-business-full-version/" target="_blank">'.__('IHBP Documentation', 'ih-business-pro').'</a>
                                    <a class="ihbp-important-links" href="https://demo.inkhive.com/ih-business-full-version/" target="_blank">'.__('IHBP Full Version Live Demo', 'ih-business-pro').'</a>
                                    <a class="ihbp-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'ih-business-pro').'</a>
                                    <a class="ihbp-important-links" href="https://wordpress.org/support/theme/ih-business-pro/reviews" target="_blank">'.__('Review IH Business Pro on WordPress', 'ih-business-pro').'</a>',
                'section' => 'ihbp_sec_pro',
                'settings' => 'ihbp_pro',
            )
        )
    );
}
add_action( 'customize_register', 'ihbp_customize_register_misc' );
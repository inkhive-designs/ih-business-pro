<?php
/*
 * Notifications in customize
 */
require get_template_directory() . '/ti-customizer-notify/class-themeisle-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'ih-sliders-showcases' => array(
			'recommended' => true,
			/* translators: s - ThemeIsle Companion */
			'description' => sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer(like showcases, testimonials, parallax sections, etc) please install and activate %s.', 'ih-business-pro' ), sprintf( '<strong>%s</strong>', 'IH Sliders & Showcases Plugin' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'ih-business-pro' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugins', 'ih-business-pro' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'ih-business-pro' ),
	'activate_button_label'     => esc_html__( 'Activate', 'ih-business-pro' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'ih-business-pro' ),
);
Themeisle_Customizer_Notify::init( apply_filters( 'ihbp_customizer_notify_array', $config_customizer ) );
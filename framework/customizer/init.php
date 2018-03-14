<?php
/**
 * ihbp Theme Customizer
 *
 * @package ihbp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ihbp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    $wp_customize->remove_section("background_image");
}
add_action( 'customize_register', 'ihbp_customize_register' );

//Load All Individual Settings Based on Sections/Panels.
require_once get_template_directory().'/framework/customizer/_customizer_controls.php';
require_once get_template_directory().'/framework/customizer/_googlefonts.php';
require_once get_template_directory().'/framework/customizer/_layouts.php';
require_once get_template_directory().'/framework/customizer/front-page.php';
require_once get_template_directory().'/framework/customizer/_sanitization.php';
require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/mail_phone.php';
require_once get_template_directory().'/framework/customizer/hero-text.php';
require_once get_template_directory().'/framework/customizer/skins.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/misc-scripts.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ihbp_customize_preview_js() {
	if(is_customize_preview()) {
		wp_enqueue_script( 'ihbp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
	}	
}
add_action( 'customize_preview_init', 'ihbp_customize_preview_js' );

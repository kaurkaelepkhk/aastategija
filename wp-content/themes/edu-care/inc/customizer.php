<?php
/**
 * Edu Care Theme Customizer
 *
 * @package Edu_Care
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function edu_care_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
    // Load custom controls.
    require get_template_directory() . '/inc/customizer/control.php';

    // Load customize helpers.
    require get_template_directory() . '/inc/customizer/options.php';

    // Load customize sanitize.
    require get_template_directory() . '/inc/customizer/sanitize.php';

}
add_action( 'customize_register', 'edu_care_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function edu_care_customize_preview_js() {    

	wp_enqueue_script( 'edu-care-customizer', get_template_directory_uri() . '/assest/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'edu_care_customize_preview_js' );

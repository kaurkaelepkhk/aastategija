<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Edu_Care
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses edu_care_header_style()
 */
function edu_care_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'edu_care_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
        'header-text'            => false,
	) ) );
}
add_action( 'after_setup_theme', 'edu_care_custom_header_setup' );

<?php 
//=============================================================
// Select/radio santitization
//=============================================================
if ( ! function_exists( 'edu_care_sanitize_select' ) ) :

    function edu_care_sanitize_select( $input, $setting ) {
      
        $input = sanitize_key( $input );
      
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;


//=============================================================
// Checkbox santitization
//=============================================================
if ( ! function_exists( 'edu_care_sanitize_checkbox' ) ) :

    function edu_care_sanitize_checkbox( $input ) {

        if ( $input == 1 ) {

            return 1;

        } else {

            return '';

        }
    }

endif;


//=============================================================
// Integer Number Sanitization
//=============================================================
if ( ! function_exists( 'edu_care_sanitize_number' ) ) :

    function edu_care_sanitize_number( $input, $setting ) {

        $input = absint( $input );

        return ( $input ? $input : $setting->default );

    }

endif;


//=============================================================
// Active callback for type of banner 
//=============================================================
if ( ! function_exists( 'edu_care_slider_type_banner' ) ) :

    function edu_care_slider_type_banner( $control ) { 
        
        if( 'banner-image' == $control->manager->get_setting('edu_care[main_slider_type]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;


//=============================================================
// Active callback for type of slider
//=============================================================
if ( ! function_exists( 'edu_care_slider_type_category' ) ) :

    function edu_care_slider_type_category( $control ) { 

        if( 'slider' == $control->manager->get_setting('edu_care[main_slider_type]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }
    }

endif;


//=============================================================
// Sanitize number range
//=============================================================

if ( ! function_exists( 'edu_care_sanitize_number_range' ) ) :
    
    function edu_care_sanitize_number_range( $input, $setting ) {

        // Ensure input is an absolute integer.
        $input = absint( $input );

        // Get the input attributes associated with the setting.
        $atts = $setting->manager->get_control( $setting->id )->input_attrs;

        // Get min.
        $min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

        // Get max.
        $max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

        // Get Step.
        $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

        // If the input is within the valid range, return it; otherwise, return the default.
        return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );

    }

endif;

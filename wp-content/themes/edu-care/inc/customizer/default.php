<?php
/**
 * Default theme options.
 *
 * @package Edu_Care
 */

if ( ! function_exists( 'edu_care_default_theme_options' ) ) :

    /**
     * Default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function edu_care_default_theme_options() {

        $defaults = array();

        // Header.
        $defaults['sticky_header']                  = 1;
        $defaults['top_search']                     = 1;
        $defaults['top_menu']                       = 1;
        $defaults['top_telephone']                  = '';
        $defaults['top_address']                    = '';
        $defaults['top_hours']                      = '';

        $defaults['enable_cart']                    = 1;

        $defaults['slider_enable']                  = 1;
        $defaults['slider_excerpt_enable']          = 1;
        $defaults['main_slider_type']               = 'slider';
        $defaults['slider_cat']                     = '';
        $defaults['slider_transition_delay']        = 5;
        $defaults['slider_transition_duration']     = 5;
        $defaults['banner_image']                   = '';

        $defaults['info_icon_1']                    = 'fa-book';
        $defaults['info_icon_2']                    = 'fa-newspaper-o';
        $defaults['info_icon_3']                    = 'fa-search-minus';
        $defaults['sidebar']                        = 'right';
        $defaults['breadcrumb_enable']              = 'enable';
        $defaults['enable_shop_side']               = '';

        $defaults['home_content']                   = 1;
        $defaults['ec_info']                        = '';
        $defaults['ec_welcome']                     = '';
        $defaults['welcome_page_design']            = 'design-1';

        $defaults['enable_social_links']            = '';
        $defaults['facebook']                       = '';
        $defaults['twitter']                        = '';
        $defaults['google_plus']                    = '';
        $defaults['instagram']                      = '';
        $defaults['linkedin']                       = '';
        $defaults['pinterest']                      = '';
        $defaults['youtube']                        = '';
        $defaults['vimeo']                          = '';
        $defaults['flickr']                         = '';
        $defaults['behance']                        = '';
        $defaults['dribbble']                       = '';
        $defaults['tumblr']                         = '';
        $defaults['github']                         = '';


        $defaults['course_content']                 = '';
        $defaults['course_title']                   = esc_html__('Our popular courses', 'edu-care');
        $defaults['course_sub_title']               = '';
        $defaults['no_of_courses']                  = 6;
        $defaults['course_order_by']                = 'date';
        $defaults['course_order']                   = 'DESC';

        $defaults['ec_news']                        = '';
        $defaults['news_short_info']                = '';
        $defaults['ec_newsletter']                  = '';
        $defaults['ec_events']                      = '';
        $defaults['ec_blogs']                       = '';
        $defaults['ec_contact']                     = '';


        $defaults['copyright_text']                 = esc_html__('Copyright 2017. All rights reserved', 'edu-care');
        $defaults['enable_scroll_top']              = true;

        

        // Pass through filter.
        return apply_filters( 'edu_care_defaults', $defaults );

    }

endif;


/**
*  Get theme options
*/
if ( !function_exists('edu_care_theme_options') ) :

    function edu_care_theme_options() {

        $edu_care_defaults = edu_care_default_theme_options();

        $edu_care_option_values = get_theme_mod( 'edu_care');

        if( is_array($edu_care_option_values )){

            return array_merge( $edu_care_defaults ,$edu_care_option_values );

        }
        else{

            return $edu_care_defaults;

        }

    }
endif;

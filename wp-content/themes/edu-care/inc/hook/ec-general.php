<?php
/**
 * Theme functions related to general.
 *
 * This file contains general hook functions.
 *
 * @package Edu_Care
 */

if ( ! function_exists( 'edu_care_doctype' ) ) :
    /**
     * Doctype Declaration
     *
     * @since 1.0.0
     */
    function edu_care_doctype() {
    ?><!DOCTYPE html><html <?php language_attributes(); ?>><?php
    }
endif;

add_action( 'edu_care_action_doctype', 'edu_care_doctype', 10 );


if ( ! function_exists( 'edu_care_head' ) ) :
    /**
     * Header Codes
     *
     * @since 1.0.0
     */
    function edu_care_head() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;
add_action( 'edu_care_action_head', 'edu_care_head', 10 );

if ( ! function_exists( 'edu_care_page_start' ) ) :
    /**
     * Page start
     *
     * @since 1.0.0
     */
    function edu_care_page_start() {
    ?><div id="page"><?php
    }
endif;

add_action( 'edu_care_action_page_start', 'edu_care_page_start', 10 );

if ( ! function_exists( 'edu_care_skip_to_content' ) ) :
    /**
     * Skip to content
     *
     * @since 1.0.0
     */
    function edu_care_skip_to_content() {
    ?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'edu-care' ); ?></a><?php
    }
endif;

add_action( 'edu_care_action_page_start', 'edu_care_skip_to_content', 20 );


if ( ! function_exists( 'edu_care_content_start' ) ) :
    /**
     * Content start
     *
     * @since 1.0.0
     */
    function edu_care_content_start() {
    ?><div id="content" class="site-content"><?php
    }
endif;

add_action( 'edu_care_action_content_start', 'edu_care_content_start', 10 );

if ( ! function_exists( 'edu_care_page_header' ) ) :
    /**
     * Page Header
     *
     * @since 1.0.0
     */
    function edu_care_page_header() {
        if( !is_front_page() ) {
            get_template_part( 'template-parts/page', 'header' );
        } elseif( is_home() ) {
            get_template_part( 'template-parts/page', 'header' );  
        }
        
    }
endif;

add_action( 'edu_care_action_page_header', 'edu_care_page_header', 10 );


if ( ! function_exists( 'edu_care_action_after_page_header' ) ) :
    /**
     * After page Header
     *
     * @since 1.0.0
     */
    function edu_care_action_after_page_header() {
    ?>
    <div class="container">
        <div class="row">
    <?php
    }
endif;

add_action( 'edu_care_action_page_header', 'edu_care_action_after_page_header', 20 );


if ( ! function_exists( 'edu_care_action_page_content_end' ) ) :
    /**
     * Page content end
     *
     * @since 1.0.0
     */
    function edu_care_action_page_content_end() {
    ?>
        </div><!-- row -->
    </div>
    <?php
    }
endif;

add_action( 'edu_care_action_content_end', 'edu_care_action_page_content_end', 10 );



if ( ! function_exists( 'edu_care_content_end' ) ) :
    /**
     * Content end
     *
     * @since 1.0.0
     */
    function edu_care_content_end() {
    ?></div><?php
    }
endif;

add_action( 'edu_care_action_content_end', 'edu_care_content_end', 20 );


//Check if page content is enable or not in home page
if (!function_exists('edu_care_home_content_check')) :

    function edu_care_home_content_check($status) {

        if ( is_home() ) {

            $theme_options = edu_care_theme_options();

            $home_content = $theme_options['home_content'];

            if (0 === $home_content || empty($home_content)) {

                $status = false;
            }

        } elseif ( !is_front_page() ) {


            $theme_options = edu_care_theme_options();

            $home_content = $theme_options['home_content'];

            if (0 === $home_content || empty($home_content)) {

                $status = false;
            }

        }

        return $status;
    }

endif;

add_filter('edu_care_home_content_status', 'edu_care_home_content_check');

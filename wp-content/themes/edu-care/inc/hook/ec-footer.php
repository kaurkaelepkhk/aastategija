<?php
/**
 * Theme functions related to footer
 *
 * This file contains footer hook functions
 *
 * @package Edu_Care
 */


if ( ! function_exists( 'edu_care_footer_start' ) ) :
    /**
     * Footer start
     *
     * @since 1.0.0
     */
    function edu_care_footer_start() {
    ?>
    <footer id="colophon" class="site-footer">
        <div class="container">
    <?php
    }
endif;

add_action( 'edu_care_action_footer', 'edu_care_footer_start', 10 );


if ( ! function_exists( 'edu_care_footer_widget' ) ) :
    /**
     * Footer Wrapper end
     *
     * @since 1.0.0
     */
    function edu_care_footer_widget() {

        $sidebar_names = array('footer-1', 'footer-2', 'footer-3', 'footer-4'  );

        $widget_count = edu_care_widget_count( $sidebar_names ); 

        if( 0 < $widget_count ): ?>

        <div class="footer-wrapper top-bottom-space">
            <div class="row">

        <?php
            $column_class = '';

            if( 1  === $widget_count ){
                $column_class = 'col-12';
            } elseif( 2  === $widget_count ){
                $column_class = 'col-6';
            } elseif( 3  === $widget_count ){
                $column_class = 'col-4';
            }elseif( 4  === $widget_count ){
                $column_class = 'col-3';
            } 

            foreach ($sidebar_names as $key => $value) { 

                if( is_active_sidebar( $value ) ){ ?>

                    <div class="<?php echo esc_attr( $column_class ); ?>">

                    <?php

                        dynamic_sidebar( $value );

                    ?>

                    </div><!-- .col -->

                    <?php   
                    } 
                } ?>

                </div>
            </div><!-- .footer-wrapper -->

            <?php 
        endif;
    }
endif;

add_action( 'edu_care_action_footer', 'edu_care_footer_widget', 20 );


if ( ! function_exists( 'edu_care_copyright' ) ) :
    /**
     * Footer end
     *
     * @since 1.0.0
     */
    function edu_care_copyright() {

        $theme_options  = edu_care_theme_options();

    ?>
    <div class="bottom-footer">

        <?php
        // For social links                    
        if( 1 == $theme_options['enable_social_links'] ){
            do_action( 'edu_care_social_links' );
        }
        ?>

        <span>
        <?php 
        $powered_by_text = sprintf( __( 'Theme of %s', 'edu-care' ), '<a target="_blank" rel="designer" href="http://rigorousthemes.com/">Rigorous Themes</a>' ); ?>

        <?php echo esc_html( $theme_options['copyright_text'] ); ?> | <?php echo $powered_by_text;?>
        </span>
    </div><!-- .bottom-footer -->

    <?php
    }
endif;

add_action( 'edu_care_action_footer', 'edu_care_copyright', 30 );



if ( ! function_exists( 'edu_care_footer_end' ) ) :
    /**
     * Footer end
     *
     * @since 1.0.0
     */
    function edu_care_footer_end() {
    ?>
        </div><!-- .container -->
    </footer>
    <?php
    }
endif;

add_action( 'edu_care_action_footer', 'edu_care_footer_end', 40 );


if ( ! function_exists( 'edu_care_move_to_top' ) ) :
    /**
     * Move to top
     *
     * @since 1.0.0
     */
    function edu_care_move_to_top() {
    ?>
    <?php $theme_options  = edu_care_theme_options();  
    if ( true == $theme_options['enable_scroll_top'] ): ?>
    
        <div class="back-to-top">
            <a href="#masthead" class="fa-angle-up"></a>       
        </div>
    <?php endif;
    }
endif;

add_action( 'edu_care_action_page_end', 'edu_care_move_to_top', 10 );


if ( ! function_exists( 'edu_care_page_end' ) ) :
    /**
     * Page end
     *
     * @since 1.0.0
     */
    function edu_care_page_end() {
    ?></div><!-- #page -->
    <?php
    }
endif;

add_action( 'edu_care_action_page_end', 'edu_care_page_end', 20 );

<?php
/**
 * Theme functions related to header
 *
 * This file contains header hook functions
 *
 * @package Edu_Care
 */

if ( ! function_exists( 'edu_care_top_nav_start' ) ) :
    /**
     * Top nav start
     *
     * @since 1.0.0
     */
function edu_care_top_nav_start() {
    ?>
    <div class="top-nav"><?php
    }
    endif;
    add_action( 'edu_care_action_top_nav', 'edu_care_top_nav_start', 10 );


if ( ! function_exists( 'edu_care_top_nav' ) ) :
    /**
     * Top navigation
     *
     * @since 1.0.0
     */
function edu_care_top_nav() {

    $theme_options  = edu_care_theme_options();
    ?>
    <div class="top-nav-wrapper">
        <?php if( !empty( $theme_options['top_telephone'] ) || !empty( $theme_options['top_address'] ) || !empty( $theme_options['top_hours'] ) ) { ?>               
            <address>
                <ul>
                    <?php if( !empty( $theme_options['top_telephone'] ) ){ 

                        $telephone  = $theme_options['top_telephone'];

                        $phone      = str_replace( ' ', '', $telephone );

                        $phone      = str_replace( '(', '', $phone );

                        $phone      = str_replace( ')', '', $phone );

                        $phone      = str_replace( '-', '', $phone );

                        ?>
                        <li><a href="tel:<?php echo esc_attr( $phone ); ?>"><i class="fa fa-phone"></i> <?php echo esc_html( $telephone ); ?> </a></li>
                        <?php } ?>
                        <?php if( !empty( $theme_options['top_address'] ) ){ ?>
                            <li><i class="fa fa-map-marker"></i> <?php echo esc_html( $theme_options['top_address'] ); ?> </li>
                            <?php } ?>
                            <?php if( !empty( $theme_options['top_hours'] ) ){ ?>
                                <li><i class="fa fa-clock-o"></i> <?php echo esc_html( $theme_options['top_hours'] ); ?> </li>
                                <?php } ?>
                            </ul>
                        </address>
                        <?php } ?>
                        <div class="top-nav-login">
                        	<div class="top-right-nav">

                            <?php
                                $theme_options  = edu_care_theme_options();
                                if( 1 === $theme_options['top_menu'] ){
                            ?>

                            <?php wp_nav_menu( array( 'theme_location' => 'top-bar', 'menu_class'=> 'ec-top-header-nav', 'fallback_cb' => 'edu_care_menu_fallback', 'container'=> false, 'depth' => 1 ) ); } ?>

                            <?php if ( class_exists( 'WooCommerce' ) && 1 == $theme_options['enable_cart'] ) : ?>
                            <div class="btn-header-cart">
                                <?php edu_care_cart_link(); ?>
                            </div>
                        <?php endif; ?>

                        <?php 
                            $theme_options  = edu_care_theme_options();
                            if( 1 === $theme_options['top_search'] ){ 
                        ?>
                        <div class="top-search" id="search-bar">
                            <a href="#" id="searchtoggl"> 
                                <i><span class="fa fa-search" aria-hidden="true"></span>
                                    <div id="searchbar" class="searchbar-box">
                                        <div class="search-box-wrapper">
                                            <div class="search-wrapper">

                                                <?php get_search_form();?>

                                            </div>
                                            <!-- .search-wrapper -->
                                        </div>
                                    </div>
                                </i>                           
                            </a>
                        </div>

                        <?php
                            }
                        ?>

                        </div>
                    </div><!-- .top-nav-login -->

                </div><!-- .top-nav-wrapper -->
                <?php
            }
            endif;

            add_action( 'edu_care_action_top_nav', 'edu_care_top_nav', 30 );


            if ( ! function_exists( 'edu_care_top_nav_end' ) ) :
    /**
     * Top nav end
     *
     * @since 1.0.0
     */
function edu_care_top_nav_end() {
    ?></div><!-- .top-nav -->
    <?php
}
endif;

add_action( 'edu_care_action_top_nav', 'edu_care_top_nav_end', 40 );

if ( ! function_exists( 'edu_care_nav_start' ) ) :
    /**
     * Site branding
     *
     * @since 1.0.0
     */
function edu_care_nav_start() {
    ?><div class="hgroup-wrap">
    <div class="container">
        <?php
    }
    endif;

    add_action( 'edu_care_action_nav', 'edu_care_nav_start', 10 );

    if ( ! function_exists( 'edu_care_site_branding' ) ) :
    /**
     * Site branding
     *
     * @since 1.0.0
     */
function edu_care_site_branding() {
    ?>
    <div class="site-branding">

        <?php

        if ( has_custom_logo() ) {

            the_custom_logo();

        } ?>
        <h1 class="site-title">
            <?php
            if ( is_front_page() && is_home() ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <?php
        endif;

        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
        <?php
        endif; ?>

    </h1>

</div> <!-- .site-branding -->
<?php
}
endif;

add_action( 'edu_care_action_nav', 'edu_care_site_branding', 20 );


if ( ! function_exists( 'edu_care_main_nav' ) ) :
    /**
     * Top nav end
     *
     * @since 1.0.0
     */
function edu_care_main_nav() {
    ?>
    <div class="menu-holder">
        <nav class="main-navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'wp_page_menu ', 'container'=> false ) ); ?>                     
        </nav><!-- .main-navigation -->
    </div><!-- .menu-holder -->
    <?php
}
endif;

add_action( 'edu_care_action_nav', 'edu_care_main_nav', 30 );

if ( ! function_exists( 'edu_care_nav_end' ) ) :
    /**
     * Top nav end
     *
     * @since 1.0.0
     */
function edu_care_nav_end() {
    ?></div><!-- .continer -->
</div><!-- .hgroup-wrap -->
<?php
}
endif;

add_action( 'edu_care_action_nav', 'edu_care_nav_end', 40 );

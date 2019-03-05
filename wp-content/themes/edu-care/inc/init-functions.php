<?php
/**
 * Load files
 *
 * @package Edu_Care
 */

/**
 * Include default theme options
 */
require_once get_template_directory() . '/inc/customizer/default.php';

/**
 * Implement the Custom Header feature
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file
 */
require_once get_template_directory() . '/inc/jetpack.php';

/**
 * Tgmp
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Load headers hooks
 */
require_once get_template_directory() . '/inc/hook/ec-header.php';

/**
 * Load general hooks
 */
require_once get_template_directory() . '/inc/hook/ec-general.php';

/**
 * Load home content hooks
 */
require_once get_template_directory() . '/inc/hook/ec-home-content.php';

/**
 * Load socail link hooks
 */
require_once get_template_directory() . '/inc/hook/ec-social-links.php';

/**
 * Load footer hooks
 */
require_once get_template_directory() . '/inc/hook/ec-footer.php';

/**
 * Demo Class
 */
require_once get_template_directory() . '/inc/demo.php';


//=============================================================
// Menu Fallback function
//=============================================================

if ( !function_exists('edu_care_menu_fallback') ) :

function edu_care_menu_fallback(){

    echo '<ul id="menu-main-menu" class="menu ec-fallback-menu">';
        echo '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home', 'edu-care' ). '</a></li>';
        wp_list_pages( array(
            'title_li' => '',
            'depth'    => 1,
            'number'   => 5,
        ) );
        echo '</ul>';
    
}

endif;


//=============================================================
// Function to limit the number of words.
//=============================================================

function edu_care_limit_words($string, $word_limit) {

    $words = explode(' ', $string, ($word_limit + 1));

    if(count($words) > $word_limit) {

        if(count($words) > $word_limit) {

            array_pop($words);

            return implode(' ', $words).'...';
            
        }
    } else {  

        return $string;

    }
}


//=============================================================
// Function to check widget status
//=============================================================
 if ( ! function_exists( 'edu_care_widget_count' ) ) :

 function edu_care_widget_count( $sidebar_names ){

    $status = 0;

    foreach ($sidebar_names as $sidebar) {
      
        if( is_active_sidebar( $sidebar )){
            $status = $status+1;
        }
    }

    return $status;        
 }

endif;

//=============================================================
// Active callback for info post section below slider
//=============================================================
if ( ! function_exists( 'edu_care_info_post' ) ) :

    function edu_care_info_post( $control ) { 

        $info_post = $control->manager->get_setting('edu_care[ec_info]')->value();

        if( !empty( $info_post ) ){

            return true;

        } else {

            return false;

        }
    }
 
endif;



//=============================================================
// Active callback for short info below news section
//=============================================================
if ( ! function_exists( 'edu_care_news_short_info' ) ) :

    function edu_care_news_short_info( $control ) { 

        $short_info = $control->manager->get_setting('edu_care[ec_news]')->value();

        if( !empty( $short_info ) ){

            return true;

        } else {

            return false;

        }
    }
 
endif;

//=============================================================
// Active callback for woocommerce enable/disable
//=============================================================
if ( ! function_exists( 'edu_care_woocommerce' ) ) :

    function edu_care_woocommerce( $control ) { 

        if ( class_exists( 'WooCommerce' ) ) {

            return true;

        } else {

            return false;

        }
    }
 
endif;


//======================================================================
// Function for Edu care cart
//======================================================================

if ( ! function_exists( 'edu_care_cart_link' ) ) {
    function edu_care_cart_link() { ?>
            <a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'edu-care' ); ?>">
            <i class="fa fa-shopping-cart"></i> ( <?php echo wp_kses_data( sprintf(  WC()->cart->get_cart_contents_count() ) ); ?> )
            </a>
        <?php
    }
}


//======================================================================
// Function for owlcarousel dynamic slideSpeed and autoplayTimeout
//======================================================================

if ( ! function_exists( 'edu_care_load_owl_scripts' ) ) {

function edu_care_load_owl_scripts() {
    $theme_options = edu_care_theme_options();

    wp_localize_script('edu-care-custom', 'edu_care_script_vars', array(
            'slideSpeed'        => absint($theme_options['slider_transition_duration']*1000),
            'autoplayTimeout'   => absint($theme_options['slider_transition_delay']*1000),
        ));
    }
}

add_action('wp_enqueue_scripts', 'edu_care_load_owl_scripts');

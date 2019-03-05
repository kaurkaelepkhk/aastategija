<?php
/**
 * The template for displaying woocommerce section.
 *
 * @package Edu_Care
 */

get_header(); ?>

<?php
	$theme_options  = edu_care_theme_options();
    
    $enable_shop_sidebar         = $theme_options['enable_shop_side'];
    $shop_cls = '';
	if( is_shop() && '1' != $enable_shop_sidebar ) {
	 	$shop_cls = 'col-12';
	} else {
	 	$shop_cls = 'col-8';
	}
?>
    
    <div id="primary" class="content-area <?php echo esc_attr( $shop_cls ); ?> top-bottom-space">
        <main id="main" class="site-main" role="main">

            <?php woocommerce_content(); ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
	if( is_shop() && '1' == $enable_shop_sidebar ) {
 		get_sidebar();
 	} elseif( ! is_shop() ) {
 		get_sidebar( );
 	}
get_footer();

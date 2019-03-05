<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edu_Care
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$theme_options = edu_care_theme_options();
if( isset( $theme_options['sidebar'] ) && 'sidebar-no' == $theme_options['sidebar'] ) {
	return;
}
?>

<div id="secondary" class="widget-area col-4 top-bottom-space" role="complementary">
    <div class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- .sidebar -->
</div><!-- #secondary -->

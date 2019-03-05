<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edu_Care
 */

?><?php
	/**
	 * Hook - edu_care_action_doctype
	 *
	 * @hooked edu_care_doctype - 10
	 */
	do_action( 'edu_care_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - edu_care_action_head
	 *
	 * @hooked edu_care_head - 10
	 */
	do_action( 'edu_care_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - edu_care_action_page_start
	 *
	 * @hooked edu_care_page_start - 10
	 * @hooked edu_care_skip_to_content - 20
	 */
	do_action( 'edu_care_action_page_start' );
	?>

	<header id="masthead" class="site-header">

	<?php
	/**
	 * Hook - edu_care_action_top_nav
	 *
	 * @hooked edu_care_top_nav_start - 10
	 * @hooked edu_care_top_search - 20
	 * @hooked edu_care_top_nav - 30
	 * @hooked edu_care_top_nav_end - 40
	 */
	do_action( 'edu_care_action_top_nav' );
	?>

	<?php
	/**
	 * Hook - edu_care_action_nav
	 ** @hooked edu_care_nav_start - 10
	 * @hooked edu_care_site_branding - 20
	 * @hooked edu_care_main_nav - 30
	 * @hooked edu_care_nav_end - 40
	 */
	do_action( 'edu_care_action_nav' );
	?>

	</header>

	<?php
	/**
	 * Hook - edu_care_action_content_start
	 */
	do_action( 'edu_care_action_content_start' );
	?>

	<?php
	if( ! is_home() && is_front_page() ){
		/**
		 * Hook - edu_care_action_home_content
		 */
		do_action( 'edu_care_action_home_content' );
	}
	?>

	<?php
	/**
	 * Hook - edu_care_action_page_header - 10
	 * Hook - edu_care_action_after_page_header - 20
	 */
	do_action( 'edu_care_action_page_header' );
	?>

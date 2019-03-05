<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edu_Care
 */

get_header(); ?>

<?php

	$theme_options = edu_care_theme_options();

    $home_content = $theme_options['home_content'];

    	if( (! is_home() && is_front_page() && 1 == $home_content ) || (is_page() && !is_front_page() ) ) :
?>
<?php 
$theme_options = edu_care_theme_options();
if( isset( $theme_options['sidebar'] ) && 'sidebar-no' == $theme_options['sidebar'] ) {
    $sidebar_class = 'col-12';    
} else{
	$sidebar_class = 'col-8';
}
?>
	<div id="primary" class="content-area <?php echo esc_attr( $sidebar_class );?> top-bottom-space">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
endif;
get_footer();

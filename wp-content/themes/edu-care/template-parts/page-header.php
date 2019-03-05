<?php
/**
 * Breadcrumbs.
 *
 * @package Edu_Care
 */

$theme_options  = edu_care_theme_options();
$enable_breadcrumb = $theme_options['breadcrumb_enable'];


if ( ! function_exists( 'edu_care_breadcrumb_trail' ) ) {
	require_once trailingslashit( get_template_directory() ) . '/inc/breadcrumbs/breadcrumbs.php';
}
?>

<?php
    if ( get_header_image() ) {   
        $bg_image_url = get_header_image();
    ?>
    <section class="banner-bg bg-overlay" style="background:url(<?php echo esc_url( $bg_image_url ); ?>) top center no-repeat; background-size:cover;">
    <?php } else { ?>
    <section class="banner-bg-color">
    <?php } ?>
    <div class="caption-wrapper">
        <header class="entry-header">
            <h3 class="entry-title"> 

            <?php
            if ( is_archive() ) {
                the_archive_title();
            } else {
                echo single_post_title();
            }

            ?>

            </h3>
        </header>
            <div class="entry-content">

            <?php
            if ( 'enable' === $enable_breadcrumb ) {
				$breadcrumb_args = array(
					'container'   => 'nav',
					'show_browse' => false,
					'before'          => '',
					'after'           => '',
					'show_on_front'   => true,
					'network'         => false,
					'show_title'      => true,
					'echo'            => true

				);
				edu_care_breadcrumb_trail( $breadcrumb_args );
			}
			?>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon fill="#fff" points="0,100 100,0 100,100"/></polygon>
        </svg>

    </section>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edu_Care
 */

?>
    <?php
    /**
     * Hook - edu_care_action_page_content_end - 10
     * Hook - edu_care_action_content_end - 20
     */
    do_action( 'edu_care_action_content_end' );
    ?>

    <?php
    /**
     * Hook - edu_care_action_footer.
     *
     * @hooked edu_care_footer_start - 10
     * @hooked edu_care_footer_widget - 20
     * @hooked edu_care_copyright - 30
     * @hooked edu_care_footer_end - 40
     */
    do_action( 'edu_care_action_footer' );
    ?>

    <?php
    /**
     * Hook - edu_care_action_page_end.
     *
     * @hooked edu_care_move_to_top - 10
     * @hooked edu_care_page_end - 20
     */
    do_action( 'edu_care_action_page_end' );
?>

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Demo configuration
 *
 * @package Edu_Care
 */

/**
* Remove branding
*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/*Import demo data*/
if ( ! function_exists( 'edu_care_demo_import_files' ) ) :
    function edu_care_demo_import_files() {
        return array(
			array(
				'import_file_name'             => esc_html__( 'Edu Care', 'edu-care' ),
				'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/edu-care.wordpress.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/edu-care-widgets.wie',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/edu-care-export.dat',
			),
        );  
    }
    add_filter( 'pt-ocdi/import_files', 'edu_care_demo_import_files' );
endif;

/**
 * Action that happen after import
 */
if ( ! function_exists( 'edu_care_after_demo_import' ) ) :
function edu_care_after_demo_import( $selected_import ) {
    
        //Set Menu
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu'); 
        $top_menu 	= get_term_by('name', 'Top Menu', 'nav_menu'); 
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary_menu->term_id,
              'top-bar' => $top_menu->term_id,
             ) 
        );

    // Set Up the Front page
        $front_page = get_page_by_title( 'Home' );
        $blog_page  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page -> ID );
        update_option( 'page_for_posts', $blog_page -> ID );
  
    
}
add_action( 'pt-ocdi/after_import', 'edu_care_after_demo_import' );
endif;
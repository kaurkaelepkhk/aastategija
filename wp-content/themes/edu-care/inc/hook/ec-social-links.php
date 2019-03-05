<?php
/**
 * The social link hook for our theme.
 *
 * This is the template that displays social links of the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edu_Care
 */

if ( ! function_exists( 'edu_care_social_links_section' ) ) :

    function edu_care_social_links_section(){

        $theme_options  = edu_care_theme_options(); 

        $facebook       = $theme_options['facebook'];
        $twitter        = $theme_options['twitter'];
        $google_plus    = $theme_options['google_plus'];
        $instagram      = $theme_options['instagram'];
        $linkedin       = $theme_options['linkedin'];
        $pinterest      = $theme_options['pinterest'];
        $youtube        = $theme_options['youtube'];
        $vimeo          = $theme_options['vimeo'];
        $flickr         = $theme_options['flickr'];
        $behance        = $theme_options['behance'];
        $dribbble       = $theme_options['dribbble'];
        $tumblr         = $theme_options['tumblr'];
        $github         = $theme_options['github'];
        ?> 

        <div class="social-links">
        <ul>
            <?php if( $facebook ){ ?>
                <li>
                    <a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Facebook', 'edu-care'); ?></span></a>
                </li>
            <?php } ?>

            <?php if( $twitter ){ ?>
                <li>
                    <a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Twitter', 'edu-care'); ?></span></a>
                </li>
            <?php } ?>

            <?php if( $google_plus ){ ?>
                <li>
                    <a href="<?php echo esc_url( $google_plus ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Google+', 'edu-care'); ?></span></a>
                </li>
            <?php } ?>

            <?php if( $instagram ){ ?>
                <li>
                    <a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Instagram', 'edu-care'); ?></span></a>
                </li>
            <?php } ?> 

            <?php if( $linkedin ){ ?>
                <li>
                    <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('LinkedIn', 'edu-care'); ?></span></a>
                </li>
            <?php } ?>  
            
            <?php if( $pinterest ){ ?>
                <li>
                    <a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Pinterest', 'edu-care'); ?></span></a>
                </li>
            <?php } ?>             

            <?php if( $youtube ){ ?>
                <li>
                    <a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Youtube', 'edu-care'); ?></span></a>
                </li>
            <?php } ?>  

            <?php if( $vimeo ){ ?>
                <li>
                    <a href="<?php echo esc_url( $vimeo ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Vimeo', 'edu-care'); ?></span></a>
                </li>
            <?php } ?>  

            <?php if( $flickr ){ ?>
                <li>
                    <a href="<?php echo esc_url( $flickr ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Flickr', 'edu-care'); ?></span></a>
                </li>
            <?php } ?>  

            <?php if( $behance ){ ?>
                <li>
                    <a href="<?php echo esc_url( $behance ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Behance', 'edu-care'); ?></span></a>
                </li>
            <?php } ?> 

            <?php if( $dribbble ){ ?>
                <li>
                    <a href="<?php echo esc_url( $dribbble ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Dribbble', 'edu-care'); ?></span></a>
                </li>
            <?php } ?> 

            <?php if( $tumblr ){ ?>
                <li>
                    <a href="<?php echo esc_url( $tumblr ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Tumblr', 'edu-care'); ?></span></a>
                </li>
            <?php } ?> 

            <?php if( $github ){ ?>
                <li>
                    <a href="<?php echo esc_url( $github ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e('Github', 'edu-care'); ?></span></a>
                </li>
            <?php } ?> 
          
        </ul>
        </div>

    <?php }

endif;

add_action( 'edu_care_social_links', 'edu_care_social_links_section', 10 );

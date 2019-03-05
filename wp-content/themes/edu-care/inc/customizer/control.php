<?php
/**
 * Edu Care Theme Custom Customizer Controls.
 *
 * @package Edu_Care
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
  return NULL;
}

/**
 * Customize Category Control.
 */

if (class_exists('WP_Customize_Control') && ! class_exists( 'Edu_Care_Customize_Category_Control' ) ) {

    class Edu_Care_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => 'edu-care-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'edu-care' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                    'hide_empty'        => 0,                   

                )
            ); 
            
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
            esc_html($this->label),
            esc_html($this->description),
            $dropdown

            );
        }
    }
}


/**
 * Customize sidebar layout control.
 */

if (class_exists('WP_Customize_Control') && ! class_exists( 'Edu_Care_Customize_Sidebar_Control' ) ) {

    class Edu_Care_Customize_Sidebar_Control extends WP_Customize_Control {
        public function render_content() {

            if ( empty( $this->choices ) )
                return;

            $name = '_customize-radio-' . $this->id;

            ?>
            
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <ul class="controls" id='edu-care-layouts-container'>
            <?php
                foreach ( $this->choices as $value => $label ) :

                    $class = ($this->value() == $value) ? 'edu-care-sidebar-img-selected edu-care-sidebar-img' : 'edu-care-sidebar-img';
                    ?>
                    <li>
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                        <img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo esc_attr( $class ); ?>' />
                    </label>
                    </li>
                    <?php
                endforeach;
            ?>
            </ul>
            <?php
        }
    }
}

function edu_care_customize_script() {

    wp_enqueue_style( 'edu-care-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );

    wp_enqueue_script( 'edu-care-customize-script', get_template_directory_uri() . '/assest/js/customize.js', array('jquery'), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'edu_care_customize_script' );

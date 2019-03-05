<?php
/**
 * Theme Options.
 *
 * @package Edu_Care
 */

$default = edu_care_default_theme_options();

// Option Panel Starts
$wp_customize->add_panel(
    'edu_care_basic_panel', 
    array(
        'title'             => esc_html__('Theme Options', 'edu-care'),
        'priority'          => 200,         
        'description'       => esc_html__('Option to change general settings', 'edu-care') 
    )
);

// Header Setting Section starts
$wp_customize->add_section(
    'edu_care_header', 
    array(    
        'title'       => esc_html__('Header', 'edu-care'),
        'panel'       => 'edu_care_basic_panel'    
    )
);  

// Sticky header
$wp_customize->add_setting(
    'edu_care[sticky_header]',
    array(
        'default'           => $default['sticky_header'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[sticky_header]', 
    array(
        'label'       => esc_html__('Enable sticky header', 'edu-care'),
        'section'     => 'edu_care_header',   
        'settings'    => 'edu_care[sticky_header]',     
        'type'        => 'checkbox'
    )
);

// Enable/Disable search form at top header
$wp_customize->add_setting(
    'edu_care[top_search]',
    array(
        'default'           => $default['top_search'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[top_search]', 
    array(
        'label'       => esc_html__('Enable search form at top header', 'edu-care'),
        'section'     => 'edu_care_header',   
        'settings'    => 'edu_care[top_search]',     
        'type'        => 'checkbox'
    )
);

// Enable/Disable menu at top header
$wp_customize->add_setting(
    'edu_care[top_menu]',
    array(
        'default'           => $default['top_menu'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[top_menu]', 
    array(
        'label'       => esc_html__('Enable menu at top header', 'edu-care'),
        'section'     => 'edu_care_header',   
        'settings'    => 'edu_care[top_menu]',     
        'type'        => 'checkbox'
    )
);

// Enable Shopping cart
$wp_customize->add_setting(
    'edu_care[enable_cart]',
    array(
        'default'           => $default['enable_cart'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[enable_cart]', 
    array(
        'label'                 => esc_html__('Enable shopping cart on right top bar', 'edu-care'),
        'section'               => 'edu_care_header',   
        'settings'              => 'edu_care[enable_cart]',        
        'type'                  => 'checkbox',
        'active_callback'       => 'edu_care_woocommerce',
    )
);

// Top Header Telephone
$wp_customize->add_setting(
    'edu_care[top_telephone]', 
    array(
        'default'           => $default['top_telephone'],
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[top_telephone]', 
    array(
        'label'             => esc_html__('Telephone', 'edu-care'),  
        'section'           => 'edu_care_header',  
        'settings'          => 'edu_care[top_telephone]',       
        'type'              => 'text',
    )
);

// Top Header Address
$wp_customize->add_setting(
    'edu_care[top_address]', 
    array(
        'default'           => $default['top_address'],
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[top_address]', 
    array(
        'label'             => esc_html__('Address', 'edu-care'),  
        'section'           => 'edu_care_header',  
        'settings'          => 'edu_care[top_address]',     
        'type'              => 'text',
    )
);

// Top Header Opening Hours
$wp_customize->add_setting(
    'edu_care[top_hours]', 
    array(
        'default'           => $default['top_hours'],
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[top_hours]', 
    array(
        'label'             => esc_html__('Opening hours', 'edu-care'),
        'description'   => esc_html__( 'Eg. 08 AM - 10 PM', 'edu-care' ), 
        'section'           => 'edu_care_header',  
        'settings'          => 'edu_care[top_hours]',       
        'type'              => 'text',
    )
);

// Slider Setting Section starts
$wp_customize->add_section(
    'edu_care_slider', 
    array(    
        'title'       => esc_html__('Slider', 'edu-care'),
        'panel'       => 'edu_care_basic_panel'    
    )
);    

// Enable/Disable Slider
$wp_customize->add_setting(
    'edu_care[slider_enable]', 
    array(
        'default'           => $default['slider_enable'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[slider_enable]', 
    array(
        'label'       => esc_html__('Enable slider or banner image', 'edu-care'),
        'section'     => 'edu_care_slider',   
        'settings'    => 'edu_care[slider_enable]',     
        'type'        => 'checkbox'
    )
);  

// Show/Hide slider excerpt
$wp_customize->add_setting(
    'edu_care[slider_excerpt_enable]', 
    array(
        'default'           => $default['slider_excerpt_enable'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[slider_excerpt_enable]', 
    array(
        'label'       => esc_html__('Display slider excerpts', 'edu-care'),
        'section'     => 'edu_care_slider',   
        'settings'    => 'edu_care[slider_excerpt_enable]',     
        'type'        => 'checkbox',
    )
);

// Slider type
$wp_customize->add_setting(
    'edu_care[main_slider_type]', 
    array(
        'default'           => $default['main_slider_type'],        
        'sanitize_callback' => 'edu_care_sanitize_select'
    )
);

$wp_customize->add_control(
    'edu_care[main_slider_type]', 
    array(      
        'label'     => esc_html__('Select slider type', 'edu-care'),
        'section'   => 'edu_care_slider',
        'settings'  => 'edu_care[main_slider_type]',
        'type'      => 'radio',
        'choices'   => array(
            'slider'        => esc_html__('Slider', 'edu-care'),
            'banner-image'  => esc_html__('Banner image', 'edu-care'),              
        ),
    )
);  

//Slider category
$wp_customize->add_setting(
    'edu_care[slider_cat]', 
    array(
        'default'           => $default['slider_cat'],        
        'sanitize_callback' => 'edu_care_sanitize_number'
    )
);

$wp_customize->add_control(
    new Edu_Care_Customize_Category_Control(
        $wp_customize,
        'edu_care[slider_cat]',
        array(
            'label'             => esc_html__( 'Category for slider', 'edu-care' ),
            'description'       => esc_html__( 'Posts of selected category will be used as sliders', 'edu-care' ),
            'settings'          => 'edu_care[slider_cat]',
            'section'           => 'edu_care_slider', 
            'active_callback'   => 'edu_care_slider_type_category',        
        )
    )
);

// Slider Transition Delay.
$wp_customize->add_setting( 'edu_care[slider_transition_delay]',
    array(
    'default'           => $default['slider_transition_delay'],
    'sanitize_callback' => 'edu_care_sanitize_number_range',
    )
);

$wp_customize->add_control( 'edu_care[slider_transition_delay]',
    array(
        'label'             => esc_html__( 'Transition delay', 'edu-care' ),
        'description'       => esc_html__( 'In second(s)', 'edu-care' ),
        'settings'          => 'edu_care[slider_transition_delay]',
        'section'           => 'edu_care_slider',
        'type'              => 'number',
        'input_attrs'       => array( 'min' => 1, 'max' => 10, 'step' => 1, 'style' => 'width: 55px;' ),
        'active_callback'   => 'edu_care_slider_type_category',
    )
);

// Slider Transition Duration.
$wp_customize->add_setting( 'edu_care[slider_transition_duration]',
    array(
    'default'           => $default['slider_transition_duration'],
    'sanitize_callback' => 'edu_care_sanitize_number_range',
    )
);

$wp_customize->add_control( 'edu_care[slider_transition_duration]',
    array(
    'label'             => esc_html__( 'Transition duration', 'edu-care' ),
    'description'       => esc_html__( 'In second(s)', 'edu-care' ),
    'settings'          => 'edu_care[slider_transition_duration]',
    'section'           => 'edu_care_slider',
    'type'              => 'number',
    'input_attrs'       => array( 'min' => 1, 'max' => 10, 'step' => 1, 'style' => 'width: 55px;' ),
    'active_callback'   => 'edu_care_slider_type_category',
    )
);

// Banner image
$wp_customize->add_setting(
    'edu_care[banner_image]', 
    array(
        'default'               => $default['banner_image'],             
        'sanitize_callback'     => 'edu_care_sanitize_number',          
    )
);  

$wp_customize->add_control(
    'edu_care[banner_image]', 
    array(
        'label'             => esc_html__('Banner image', 'edu-care'),   
        'description'       => esc_html__( 'Enter the ID of post to use as a banner image.', 'edu-care' ), 
        'settings'          => 'edu_care[banner_image]',
        'section'           => 'edu_care_slider',
        'type'              => 'text',
        'active_callback'   => 'edu_care_slider_type_banner',          
    )
);

// Home Section starts
$wp_customize->add_section(
    'edu_care_home', 
    array(    
        'title'       => esc_html__('Home Sections', 'edu-care'),
        'panel'       => 'edu_care_basic_panel'    
    )
);

// Show Home Page content
$wp_customize->add_setting(
    'edu_care[home_content]', 
    array(
        'default'           => $default['home_content'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[home_content]', 
    array(
        'label'       => esc_html__('Show home Content', 'edu-care'),
        'description' => esc_html__( 'Check this to show page content in home page', 'edu-care'),
        'section'     => 'edu_care_home',   
        'settings'    => 'edu_care[home_content]',      
        'type'        => 'checkbox'
    )
);

// Information section
$wp_customize->add_setting(
    'edu_care[ec_info]', 
    array(
        'default'           => $default['ec_info'],      
        'sanitize_callback' => 'edu_care_sanitize_number'
    )
);  

$wp_customize->add_control(
    new Edu_Care_Customize_Category_Control(
        $wp_customize,
        'edu_care[ec_info]',
        array(
            'label'       => esc_html__('Information Section', 'edu-care' ),
            'description' => esc_html__('Leave blank if you do not wish to display this section.', 'edu-care'),
            'settings'    => 'edu_care[ec_info]',
            'section'     => 'edu_care_home',                    
        )
    )
);

// Welcome/About section
$wp_customize->add_setting(
    'edu_care[ec_welcome]', 
    array(
        'default'               => $default['ec_welcome'],             
        'sanitize_callback'     => 'edu_care_sanitize_number',          
    )
);  

$wp_customize->add_control(
    'edu_care[ec_welcome]', 
    array(
        'label'       => esc_html__('Welcome/About Section', 'edu-care'),   
        'description' => esc_html__( 'Select page from dropdown OR leave blank if you do not wish to display this section.', 'edu-care' ), 
        'settings'    => 'edu_care[ec_welcome]',
        'section'     => 'edu_care_home',
        'type'        => 'dropdown-pages',            
    )
);

// Choose Welocme Design
$wp_customize->add_setting( 'edu_care[welcome_page_design]',
    array(
        'default'           => $default['welcome_page_design'],
        'sanitize_callback' => 'edu_care_sanitize_select',
    )
);
$wp_customize->add_control( 'edu_care[welcome_page_design]',
    array(
        'label'       =>esc_html__( 'Choose Welocme page design', 'edu-care' ),
        'section'     => 'edu_care_home',   
        'settings'    => 'edu_care[welcome_page_design]',
        'type'        => 'radio',
        'choices'     => array(
            'design-1'   =>esc_html__( 'Design I', 'edu-care' ),
            'design-2'   =>esc_html__( 'Design II', 'edu-care' ),
        ),
    )
); 

// News section
$wp_customize->add_setting(
    'edu_care[ec_news]', 
    array(
        'default'           => $default['ec_news'],      
        'sanitize_callback' => 'edu_care_sanitize_number'
    )
);  

$wp_customize->add_control(
    new Edu_Care_Customize_Category_Control(
        $wp_customize,
        'edu_care[ec_news]',
        array(
            'label'       => esc_html__('News Section', 'edu-care' ),
            'description' => esc_html__('Leave blank if you do not wish to display this section.', 'edu-care'),
            'settings'    => 'edu_care[ec_news]',
            'section'     => 'edu_care_home',                    
        )
    )
);

// News section short info below heading
$wp_customize->add_setting(
    'edu_care[news_short_info]', 
    array(
        'default'           => $default['news_short_info'],
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[news_short_info]', 
    array(
        'label'             => esc_html__('Short info', 'edu-care'),
        'description'       => esc_html__('Short information below news section heading', 'edu-care'),
        'section'           => 'edu_care_home',  
        'settings'          => 'edu_care[news_short_info]',       
        'type'              => 'text',
        'active_callback'   => 'edu_care_news_short_info',
    )
);


// Newsletter section
$wp_customize->add_setting(
    'edu_care[ec_newsletter]', 
    array(
        'default'               => $default['ec_newsletter'],             
        'sanitize_callback'     => 'edu_care_sanitize_number',          
    )
);  

$wp_customize->add_control(
    'edu_care[ec_newsletter]', 
    array(
        'label'       => esc_html__('Newsletter', 'edu-care'),   
        'description' => esc_html__( 'Select page from dropdown OR leave blank if you do not wish to display this section.', 'edu-care' ), 
        'settings'    => 'edu_care[ec_newsletter]',
        'section'     => 'edu_care_home',
        'type'        => 'dropdown-pages',            
    )
); 

// Events section
$wp_customize->add_setting(
    'edu_care[ec_events]', 
    array(
        'default'           => $default['ec_events'],      
        'sanitize_callback' => 'edu_care_sanitize_number'
    )
);  

$wp_customize->add_control(
    new Edu_Care_Customize_Category_Control(
        $wp_customize,
        'edu_care[ec_events]',
        array(
            'label'       => esc_html__('Event Section', 'edu-care' ),
            'description' => esc_html__('Leave blank if you do not wish to display this section.', 'edu-care'),
            'settings'    => 'edu_care[ec_events]',
            'section'     => 'edu_care_home',                    
        )
    )
);

// Blog section
$wp_customize->add_setting(
    'edu_care[ec_blogs]', 
    array(
        'default'           => $default['ec_blogs'],      
        'sanitize_callback' => 'edu_care_sanitize_number'
    )
);  

$wp_customize->add_control(
    new Edu_Care_Customize_Category_Control(
        $wp_customize,
        'edu_care[ec_blogs]',
        array(
            'label'       => esc_html__('Blog Section', 'edu-care' ),
            'description' => esc_html__('Leave blank if you do not wish to display this section.', 'edu-care'),
            'settings'    => 'edu_care[ec_blogs]',
            'section'     => 'edu_care_home',                    
        )
    )
);

// Contact section
$wp_customize->add_setting(
    'edu_care[ec_contact]', 
    array(
        'default'               => $default['ec_contact'],             
        'sanitize_callback'     => 'edu_care_sanitize_number',          
    )
);  

$wp_customize->add_control(
    'edu_care[ec_contact]', 
    array(
        'label'       => esc_html__('Contact Section', 'edu-care'),   
        'description' => esc_html__( 'Select page from dropdown OR leave blank if you do not wish to display this section.', 'edu-care' ), 
        'settings'    => 'edu_care[ec_contact]',
        'section'     => 'edu_care_home',
        'type'        => 'dropdown-pages',            
    )
); 


// Course Section starts
$wp_customize->add_section(
    'edu_care_course', 
    array(    
        'title'       => esc_html__('Our Courses', 'edu-care'),
        'panel'       => 'edu_care_basic_panel'    
    )
);

// Show Home Page content
$wp_customize->add_setting(
    'edu_care[course_content]', 
    array(
        'default'           => $default['course_content'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[course_content]', 
    array(
        'label'       => esc_html__('Enable course', 'edu-care'),
        'description' => esc_html__( 'Check this to show our courses in home page.', 'edu-care'),
        'section'     => 'edu_care_course',   
        'settings'    => 'edu_care[course_content]',      
        'type'        => 'checkbox',
        'active_callback'   => 'edu_care_woocommerce',
    )
);

// Course title
$wp_customize->add_setting(
    'edu_care[course_title]', 
    array(
      'default'           => $default['course_title'],  
      'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[course_title]', 
        array(
        'label'       => esc_html__('Title', 'edu-care'),
        'settings'    => 'edu_care[course_title]',
        'section'     => 'edu_care_course',
        'type'        => 'text',
        'active_callback'   => 'edu_care_woocommerce',
    )
);

// Course sub-title
$wp_customize->add_setting(
    'edu_care[course_sub_title]', 
    array(
        'default'           => $default['course_sub_title'],
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[course_sub_title]', 
    array(
        'label'             => esc_html__('Sub-Title', 'edu-care'),  
        'section'           => 'edu_care_course',  
        'settings'          => 'edu_care[course_sub_title]',       
        'type'              => 'text',
        'active_callback'   => 'edu_care_woocommerce',
    )
);

// Select no.s of courses to show
$wp_customize->add_setting(
    'edu_care[no_of_courses]', 
    array(
        'default'           => $default['no_of_courses'],
        'sanitize_callback' => 'edu_care_sanitize_select'
    )
);

$wp_customize->add_control(
    'edu_care[no_of_courses]',
    array(
        'type'      => 'select',
        'label'     => esc_html__('Select no. of courses', 'edu-care' ),
        'description'   => esc_html__( 'Select no.s of courses you want to show in home page', 'edu-care' ),
        'section'   => 'edu_care_course',
        'settings'  => 'edu_care[no_of_courses]',
        'choices'   => array(
            '3'     => 3,
            '6'     => 6,
            '9'     => 9,
            ),
        'active_callback'   => 'edu_care_woocommerce',
    )
);

// Select courses orderby
$wp_customize->add_setting(
    'edu_care[course_order_by]', 
    array(
        'default'           => $default['course_order_by'],
        'sanitize_callback' => 'edu_care_sanitize_select'
    )
);

$wp_customize->add_control(
    'edu_care[course_order_by]',
    array(
        'type'      => 'select',
        'label'     => esc_html__('Order by', 'edu-care' ),
        'description'   => esc_html__( 'Select the type you want to order by courses in home page', 'edu-care' ),
        'section'   => 'edu_care_course',
        'settings'  => 'edu_care[course_order_by]',
        'choices'   => array(
            'date'     => 'Date',
            'title'    => 'Title',
            ),
        'active_callback'   => 'edu_care_woocommerce',
    )
);

// Select courses order
$wp_customize->add_setting(
    'edu_care[course_order]', 
    array(
        'default'           => $default['course_order'],
        'sanitize_callback' => 'edu_care_sanitize_select'
    )
);

$wp_customize->add_control(
    'edu_care[course_order]',
    array(
        'type'      => 'select',
        'label'     => esc_html__('Order by', 'edu-care' ),
        'description'   => esc_html__( 'Select the type you want to order courses in home page', 'edu-care' ),
        'section'   => 'edu_care_course',
        'settings'  => 'edu_care[course_order]',
        'choices'   => array(
            'ASC'     => 'ASC',
            'DESC'    => 'DESC',
            ),
        'active_callback'   => 'edu_care_woocommerce',
    )
);




// General setting 
$wp_customize->add_section(
    'edu_care_general', 
    array(    
        'title'       => esc_html__('General Setting', 'edu-care'),
        'panel'       => 'edu_care_basic_panel'    
    )
);      

// Info post icon first
$wp_customize->add_setting(
    'edu_care[info_icon_1]', 
    array(
      'default'           => $default['info_icon_1'],  
      'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[info_icon_1]', 
        array(
        'label'       => esc_html__('Font awesome icon 1', 'edu-care'),
        'description' => esc_html__( 'Insert font awesome icon you want to display in post just below slider section', 'edu-care' ),   
        'settings'    => 'edu_care[info_icon_1]',
        'section'     => 'edu_care_general',
        'type'        => 'text',
        'active_callback'   => 'edu_care_info_post',
    )
);

// Info post icon second
$wp_customize->add_setting(
    'edu_care[info_icon_2]', 
    array(
      'default'           => $default['info_icon_2'],  
      'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[info_icon_2]', 
        array(
        'label'       => esc_html__('Font awesome icon 2', 'edu-care'),
        'description' => esc_html__( 'Insert font awesome icon you want to display in post just below slider section', 'edu-care' ),   
        'settings'    => 'edu_care[info_icon_2]',
        'section'     => 'edu_care_general',
        'type'        => 'text',
        'active_callback'   => 'edu_care_info_post',
    )
);

// Info post icon third
$wp_customize->add_setting(
    'edu_care[info_icon_3]', 
    array(
      'default'           => $default['info_icon_3'],  
      'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[info_icon_3]', 
        array(
        'label'       => esc_html__('Font awesome icon 3', 'edu-care'),
        'description' => esc_html__( 'Insert font awesome icon you want to display in post just below slider section', 'edu-care' ),   
        'settings'    => 'edu_care[info_icon_3]',
        'section'     => 'edu_care_general',
        'type'        => 'text',
        'active_callback'   => 'edu_care_info_post',
    )
);

// Page layout
$wp_customize->add_setting(
    'edu_care[sidebar]', 
    array(
        'default'           => $default['sidebar'],     
        'sanitize_callback' => 'edu_care_sanitize_select'
    )
);

$wp_customize->add_control(
    new Edu_Care_Customize_Sidebar_Control(
        $wp_customize, 
        'edu_care[sidebar]', 
        array(
            'type'      => 'radio-image',
            'label'     => esc_html__('Page layout', 'edu-care' ),
            'section'   => 'edu_care_general',
            'settings'  => 'edu_care[sidebar]',
            'choices'   => array(
                'left'  => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
                'right' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
                'sidebar-no' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.png',
                )
        )
    )
);


// Breadcrumb enable/disable 
$wp_customize->add_setting( 'edu_care[breadcrumb_enable]',
    array(
        'default'           => $default['breadcrumb_enable'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'edu_care_sanitize_select',
    )
);
$wp_customize->add_control( 'edu_care[breadcrumb_enable]',
    array(
        'label'       =>esc_html__( 'Enable/Disable breadcrumb', 'edu-care' ),
        'section'     => 'edu_care_general',
        'type'        => 'radio',
        'choices'     => array(
            'enable'    =>esc_html__( 'Enable', 'edu-care' ),
            'disable'   =>esc_html__( 'Disable', 'edu-care' ),
        ),
    )
);

// Show / hide sidebar in main shop page
$wp_customize->add_setting(
    'edu_care[enable_shop_side]', 
    array(
        'default'           => $default['enable_shop_side'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[enable_shop_side]', 
    array(
        'label'       => esc_html__('Enable sidebar in main shop page', 'edu-care'),
        'description' => esc_html__( 'Check this box to show sidebar in main shop page, WooCommerce main shop page.', 'edu-care'),
        'section'     => 'edu_care_general',   
        'settings'    => 'edu_care[enable_shop_side]',      
        'type'        => 'checkbox',
        'active_callback'   => 'edu_care_woocommerce',
    )
);




//For Social Option
$wp_customize->add_section(
    'edu_care_social', 
    array(    
        'title'       => esc_html__('Social Links', 'edu-care'),
        'panel'       => 'edu_care_basic_panel'    
        ));

// Show / hide social links
$wp_customize->add_setting(
    'edu_care[enable_social_links]', 
    array(
        'default'           => $default['enable_social_links'],       
        'sanitize_callback' => 'edu_care_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'edu_care[enable_social_links]', 
    array(
        'label'       => esc_html__('Enable social links as footer', 'edu-care'),
        'section'     => 'edu_care_social',   
        'settings'    => 'edu_care[enable_social_links]',      
        'type'        => 'checkbox',
    )
);

//Social link text field
$social_options = array('facebook', 'twitter', 'google_plus', 'instagram', 'linkedin', 'pinterest', 'youtube', 'vimeo', 'flickr', 'behance', 'dribbble', 'tumblr', 'github' );

foreach($social_options as $social) {

    $social_name = ucwords(str_replace('_', ' ', $social));

    $label = '';

    switch ($social) {

        case 'facebook':
        $label = esc_html__('Facebook', 'edu-care');
        break;

        case 'twitter':
        $label = esc_html__( 'Twitter', 'edu-care' );
        break;

        case 'google_plus':
        $label = esc_html__( 'Google Plus', 'edu-care' );
        break;

        case 'instagram':
        $label = esc_html__( 'Instagram', 'edu-care' );
        break;

        case 'linkedin':
        $label = esc_html__( 'LinkedIn', 'edu-care' );
        break;

        case 'pinterest':
        $label = esc_html__( 'Pinterest', 'edu-care' );
        break;

        case 'youtube':
        $label = esc_html__( 'Youtube', 'edu-care' );
        break;

        case 'vimeo':
        $label = esc_html__( 'vimeo', 'edu-care' );
        break;

        case 'flickr':
        $label = esc_html__( 'Flickr', 'edu-care' );
        break;

        case 'behance':
        $label = esc_html__( 'Behance', 'edu-care' );
        break;

        case 'dribbble':
        $label = esc_html__( 'Dribbble', 'edu-care' );
        break;

        case 'tumblr':
        $label = esc_html__( 'Tumblr', 'edu-care' );
        break;

        case 'github':
        $label = esc_html__( 'Github', 'edu-care' );
        break;

    }
    
    $wp_customize->add_setting( 'edu_care['.$social.']', array(
        'sanitize_callback'     => 'esc_url_raw',
        'sanitize_js_callback'  =>  'esc_url_raw'
        ));

    $wp_customize->add_control( 'edu_care['.$social.']', array(
        'label'     => $label,
        'type'      => 'text',
        'section'   => 'edu_care_social',
        'settings'  => 'edu_care['.$social.']'
        ));
}






// Footer Options 
$wp_customize->add_section(
    'edu_care_footer', 
    array(    
        'title'       => esc_html__('Footer', 'edu-care'),
        'panel'       => 'edu_care_basic_panel'    
    )
); 

// Footer Copyright
$wp_customize->add_setting(
    'edu_care[enable_scroll_top]', 
    array(
      'default'           => $default['enable_scroll_top'],  
      'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[enable_scroll_top]', 
        array(
        'label'       => esc_html__('Enable scroll to top', 'edu-care'),    
        'settings'    => 'edu_care[enable_scroll_top]',
        'section'     => 'edu_care_footer',
        'type'        => 'checkbox'
    )
);     

// Footer Copyright
$wp_customize->add_setting(
    'edu_care[copyright_text]', 
    array(
      'default'           => $default['copyright_text'],  
      'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'edu_care[copyright_text]', 
        array(
        'label'       => esc_html__('Copyright text', 'edu-care'),    
        'settings'    => 'edu_care[copyright_text]',
        'section'     => 'edu_care_footer',
        'type'        => 'text'
    )
);


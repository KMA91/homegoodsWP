<?php 
add_action( 'customize_register', 'styleisharya_customize_register_custom_controls', 9 );
function styleisharya_customize_register_custom_controls( $wp_customize ) {
    get_template_part( 'assets/proupgrade/styleisharya','sectionpro');
}
function styleisharya_customize_controls_js() {
    $theme = wp_get_theme();
    wp_enqueue_script( 'styleisharya-customizer-section-pro-jquery', get_template_directory_uri() . '/assets/proupgrade/styleisharya-customize-controls.js', array( 'customize-controls' ), $theme->get( 'Version' ), true );
    wp_enqueue_style( 'styleisharya-customizer-section-pro', get_template_directory_uri() . '/assets/proupgrade/styleisharya-customize-controls.css', $theme->get( 'Version' ) );
}
add_action( 'customize_controls_enqueue_scripts', 'styleisharya_customize_controls_js' );
?>
<?php
function styleisharya_enqueue_comments_reply() {
if( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'comment_form_before', 'styleisharya_enqueue_comments_reply' );
?>
<?php 
if ( ! function_exists( 'styleisharya_sanitize_page' ) ) :
    function styleisharya_sanitize_page( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
    }

endif;
function styleisharya_customize_register($wp_customize){

    // Register custom section types.
    $wp_customize->register_section_type( 'styleisharya_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section( new styleisharya_Customize_Section_Pro(
        $wp_customize,
        'theme_go_pro',
        array(
            'priority' => 1,
            'title'    => esc_html__( 'StyleishArya Pro', 'styleisharya' ),
            'pro_text' => esc_html__( 'Upgrade To Pro', 'styleisharya' ),
            'pro_url'  => 'https://themestulip.com/themes/styleisharya-fashion-wordpress-theme/',
        )
    ) );

        $wp_customize->add_section('styleisharya_header', array(
        'title'    => esc_html__('StyleishArya Header Phone and Email', 'styleisharya'),
        'description' => '',
        'priority' => 30,
    ));
    
     $wp_customize->add_section('styleisharya_social', array(
        'title'    => esc_html__('StyleishArya Social', 'styleisharya'),
        'description' => '',
        'priority' => 35,
    ));
    
    //  =============================
    //  = Text Input phone number                =
    //  =============================
    $wp_customize->add_setting('styleisharya_phone', array(
        'default'        => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
 
    $wp_customize->add_control('styleisharya_phone', array(
        'label'      => esc_html__('Phone Number', 'styleisharya'),
        'section'    => 'styleisharya_header',
        'setting'   => 'styleisharya_phone',
        'type'    => 'text'
    ));
    
    //  =============================
    //  = Text Input Email                =
    //  =============================
    $wp_customize->add_setting('styleisharya_address_email',array(
            'sanitize_callback' => 'sanitize_email'
    ));
    
    $wp_customize->add_control('styleisharya_address_email',array(
            'type'  => 'text',
            'label' => __('Add email address here.','styleisharya'),
            'section'   => 'styleisharya_header',
            'setting' => 'styleisharya_address_email'
    ));
       
    //  =============================
    //  = Text Input facebook                =
    //  =============================
    $wp_customize->add_setting('styleisharya_fb', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('styleisharya_fb', array(
        'label'      => esc_html__('Facebook', 'styleisharya'),
        'section'    => 'styleisharya_social',
        'setting'   => 'styleisharya_fb',
    ));
    //  =============================
    //  = Text Input Twitter                =
    //  =============================
    $wp_customize->add_setting('styleisharya_twitter', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('styleisharya_twitter', array(
        'label'      => esc_html__('Twitter', 'styleisharya'),
        'section'    => 'styleisharya_social',
        'setting'   => 'styleisharya_twitter',
    ));
    //  =============================
    //  = Text Input googleplus                =
    //  =============================
    $wp_customize->add_setting('styleisharya_glplus', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('styleisharya_glplus', array(
        'label'      => esc_html__('Google Plus', 'styleisharya'),
        'section'    => 'styleisharya_social',
        'setting'   => 'styleisharya_glplus',
    ));
    //  =============================
    //  = Text Input linkedin                =
    //  =============================
    $wp_customize->add_setting('styleisharya_in', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control('styleisharya_in', array(
        'label'      => esc_html__('Linkedin', 'styleisharya'),
        'section'    => 'styleisharya_social',
        'setting'   => 'styleisharya_in',
    ));
    

    //  =============================
    //  = slider section              =
    //  =============================
    $wp_customize->add_section('styleisharya_banner', array(
        'title'    => esc_html__('StyleishArya Home slider', 'styleisharya'),
        'description' => esc_html__('banner Size Should be ( 1600x750 ).','styleisharya'),
        'priority' => 36,
    ));
   
    $wp_customize->add_setting('banner1',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'styleisharya_sanitize_page'
    ));
    
    $wp_customize->add_control('banner1',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner first:','styleisharya'),
            'section'   => 'styleisharya_banner'
    )); 

    $wp_customize->add_setting('banner2',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'styleisharya_sanitize_page'
    ));
    
    $wp_customize->add_control('banner2',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner second:','styleisharya'),
            'section'   => 'styleisharya_banner'
    )); 

    $wp_customize->add_setting('banner3',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'styleisharya_sanitize_page'
    ));
    
    $wp_customize->add_control('banner3',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner third:','styleisharya'),
            'section'   => 'styleisharya_banner'
    )); 
// Slider Read More Button Text
    $wp_customize->add_setting('slider_readmore',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('slider_readmore',array( 
            'type'  => 'text',
            'label' => esc_html__('Add slider Read more button name here','styleisharya'),
            'section'   => 'styleisharya_banner',
            'setting'   => 'slider_readmore'
    )); // Slider Read More Button Text

//  =============================
    //  = box section              =
    //  =============================
    $wp_customize->add_section('styleisharya_box', array(
        'title'    => esc_html__('StyleishArya HomePage fashion Box', 'styleisharya'),
        'description' => esc_html__('Upload image, it will auto crop with 400*250.','styleisharya'),
        'priority' => 36,
    ));
   
    $wp_customize->add_setting('box1',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'styleisharya_sanitize_page'
    ));
    
    $wp_customize->add_control('box1',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box first:','styleisharya'),
            'section'   => 'styleisharya_box'
    )); 

    $wp_customize->add_setting('box2',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'styleisharya_sanitize_page'
    ));
    
    $wp_customize->add_control('box2',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box second:','styleisharya'),
            'section'   => 'styleisharya_box'
    )); 

    $wp_customize->add_setting('box3',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'styleisharya_sanitize_page'
    ));
    
    $wp_customize->add_control('box3',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box third:','styleisharya'),
            'section'   => 'styleisharya_box'
    )); 

//  =============================
    //  = box section              =
    //  =============================
    $wp_customize->add_section('styleisharya_welcome_to_homepage', array(
        'title'    => esc_html__('StyleishArya HomePage welcome section', 'styleisharya'),
        'description' => esc_html__('It will shows on homepage, upload image size width:583px','styleisharya'),
        'priority' => 36,
    ));
   
    $wp_customize->add_setting('welcome_section',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'styleisharya_sanitize_page'
    ));
    
    $wp_customize->add_control('welcome_section',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for homepage welcome:','styleisharya'),
            'section'   => 'styleisharya_welcome_to_homepage'
    )); 


  //  =============================
    //  = Footer              =
    //  =============================

    $wp_customize->add_section('styleisharya_footer', array(
        'title'    => esc_html__('styleisharya Footer', 'styleisharya'),
        'description' => '',
        'priority' => 37,
    ));

	// Footer design and developed
	 $wp_customize->add_setting('styleisharya_design', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('styleisharya_design', array(
        'label'      => esc_html__('Design and developed', 'styleisharya'),
        'section'    => 'styleisharya_footer',
        'setting'   => 'styleisharya_design',
		'type'	   =>'textarea'
    ));
	// Footer copyright
	 $wp_customize->add_setting('styleisharya_copyright', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('styleisharya_copyright', array(
        'label'      => esc_html__('Copyright', 'styleisharya'),
        'section'    => 'styleisharya_footer',
        'setting'   => 'styleisharya_copyright',
		'type'	   =>'textarea'
    ));	
}
add_action('customize_register', 'styleisharya_customize_register');
?>
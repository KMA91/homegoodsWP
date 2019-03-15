<?php
/**
 * fcommerce functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

if ( ! function_exists( 'fcommerce_setup' ) ) :
	/**
	 * fcommerce setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function fcommerce_setup() {

		/*
		 * Make theme available for translation.
		 *
		 * Translations can be filed in the /languages/ directory
		 *
		 * If you're building a theme based on fcommerce, use a find and replace
		 * to change 'fcommerce' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fcommerce', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
	 	 */
		add_editor_style( array( 'css/editor-style.css', 
								 get_template_directory_uri() . '/css/font-awesome.css',
								 fcommerce_fonts_url()
						  ) );

		/*
		 * Set Custom Background
		 */				 
		add_theme_support( 'custom-background', array ('default-color'  => '#ffffff') );

		// add WooCommerce support
		add_theme_support( 'woocommerce' );

		// Set the default content width.
		$GLOBALS['content_width'] = 900;

		// This theme uses wp_nav_menu() in header menu
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'fcommerce' ),
			'footer'    => __( 'Footer Menu', 'fcommerce' ),
		) );

		$defaults = array(
	        'flex-height' => false,
	        'flex-width'  => false,
	        'header-text' => array( 'site-title', 'site-description' ),
	    );
	    add_theme_support( 'custom-logo', $defaults );
	}
endif; // fcommerce_setup
add_action( 'after_setup_theme', 'fcommerce_setup' );

if ( ! function_exists( 'fcommerce_nav_wrap' ) ) :

	function fcommerce_nav_wrap() {

		// open the <ul>, set 'menu_class' and 'menu_id' values
  		$wrap  = '<ul id="%1$s" class="%2$s">';
  
	  	// get nav items as configured in /wp-admin/
	  	$wrap .= '%3$s';

	  	if ( class_exists( 'WooCommerce' ) ) {

	  		global $woocommerce;

			$wrap .= '<li><a class="cart-contents-icon" href="'.wc_get_cart_url().'" title="'.__('View your shopping cart', 'fcommerce')
					   .'"></a><div id="cart-popup-content"><div class="widget_shopping_cart_content"></div></div></li>';

		}
  
  		// close the <ul>
  		$wrap .= '</ul>';
  
  		// return the result
  		return $wrap;
	}

endif; // fcommerce_nav_wrap

if ( ! function_exists( 'fcommerce_fonts_url' ) ) :
	/**
	 *	Load google font url used in the fcommerce theme
	 */
	function fcommerce_fonts_url() {

	    $fonts_url = '';
	 
	    /* Translators: If there are characters in your language that are not
	    * supported by Catamaran, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $questrial = _x( 'on', 'Catamaran font: on or off', 'fcommerce' );

	    if ( 'off' !== $questrial ) {
	        $font_families = array();
	 
	        $font_families[] = 'Catamaran';
	 
	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	    }
	 
	    return $fonts_url;
	}
endif; // fcommerce_fonts_url

if ( ! function_exists( 'fcommerce_load_scripts' ) ) :
	/**
	 * the main function to load scripts in the fcommerce theme
	 * if you add a new load of script, style, etc. you can use that function
	 * instead of adding a new wp_enqueue_scripts action for it.
	 */
	function fcommerce_load_scripts() {

		// load main stylesheet.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( ) );
		wp_enqueue_style( 'fcommerce-style', get_stylesheet_uri(), array() );
		
		wp_enqueue_style( 'fcommerce-fonts', fcommerce_fonts_url(), array(), null );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Load Utilities JS Script
		wp_enqueue_script( 'fcommerce-utilities',
			get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', ) );
	}
endif; // fcommerce_load_scripts
add_action( 'wp_enqueue_scripts', 'fcommerce_load_scripts' );

if ( ! function_exists( 'fcommerce_widgets_init' ) ) :
	/**
	 *	widgets-init action handler. Used to register widgets and register widget areas
	 */
	function fcommerce_widgets_init() {
		
		// Register Sidebar Widget.
		register_sidebar( array (
							'name'	 		 =>	 __( 'Sidebar Widget Area', 'fcommerce'),
							'id'		 	 =>	 'sidebar-widget-area',
							'description'	 =>  __( 'The sidebar widget area', 'fcommerce'),
							'before_widget'	 =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
							'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
						) );

		// Register Footer Column #1
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #1', 'fcommerce' ),
								'id' 			 =>  'footer-column-1-widget-area',
								'description'	 =>  __( 'The Footer Column #1 widget area', 'fcommerce' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #2
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #2', 'fcommerce' ),
								'id' 			 =>  'footer-column-2-widget-area',
								'description'	 =>  __( 'The Footer Column #2 widget area', 'fcommerce' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
		
		// Register Footer Column #3
		register_sidebar( array (
								'name'			 =>  __( 'Footer Column #3', 'fcommerce' ),
								'id' 			 =>  'footer-column-3-widget-area',
								'description'	 =>  __( 'The Footer Column #3 widget area', 'fcommerce' ),
								'before_widget'  =>  '',
								'after_widget'	 =>  '',
								'before_title'	 =>  '<h2 class="footer-title">',
								'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
							) );
	}
endif; // fcommerce_widgets_init
add_action( 'widgets_init', 'fcommerce_widgets_init' );

if ( ! function_exists( 'fcommerce_show_copyright_text' ) ) :
	/**
	 *	Displays the copyright text.
	 */
	function fcommerce_show_copyright_text() {

		$footerText = get_theme_mod('fcommerce_footer_copyright', null);

		if ( !empty( $footerText ) ) {

			echo esc_html( $footerText ) . ' | ';		
		}
	}
endif; // fcommerce_show_copyright_text

if ( ! function_exists( 'fcommerce_custom_header_setup' ) ) :
  /**
   * Set up the WordPress core custom header feature.
   *
   * @uses fcommerce_header_style()
   */
  function fcommerce_custom_header_setup() {

  	add_theme_support( 'custom-header', array (
                         'default-image'          => '',
                         'flex-height'            => true,
                         'flex-width'             => true,
                         'uploads'                => true,
                         'width'                  => 900,
                         'height'                 => 100,
                         'default-text-color'     => '#434343',
                         'wp-head-callback'       => 'fcommerce_header_style',
                      ) );
  }
endif; // fcommerce_custom_header_setup
add_action( 'after_setup_theme', 'fcommerce_custom_header_setup' );

if ( ! function_exists( 'fcommerce_header_style' ) ) :

  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see fcommerce_custom_header_setup().
   */
  function fcommerce_header_style() {

  	$header_text_color = get_header_textcolor();

      if ( ! has_header_image()
          && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
               || 'blank' === $header_text_color ) ) {

          return;
      }

      $headerImage = get_header_image();
  ?>
      <style id="fcommerce-custom-header-styles" type="text/css">

          <?php if ( has_header_image() ) : ?>

                  #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

          <?php endif; ?>

          <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                      && 'blank' !== $header_text_color ) : ?>

                  #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

          <?php endif; ?>
      </style>
  <?php
  }
endif; // End of fcommerce_header_style.

if ( class_exists('WP_Customize_Section') ) {
	class fcommerce_Customize_Section_Pro extends WP_Customize_Section {

		// The type of customize section being rendered.
		public $type = 'fcommerce';

		// Custom button text to output.
		public $pro_text = '';

		// Custom pro button URL.
		public $pro_url = '';

		// Add custom parameters to pass to the JS via JSON.
		public function json() {
			$json = parent::json();

			$json['pro_text'] = $this->pro_text;
			$json['pro_url']  = esc_url( $this->pro_url );

			return $json;
		}

		// Outputs the template
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					{{ data.title }}

					<# if ( data.pro_text && data.pro_url ) { #>
						<a href="{{ data.pro_url }}" class="button button-primary alignright" target="_blank">{{ data.pro_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}

/**
 * Singleton class for handling the theme's customizer integration.
 */
final class fcommerce_Customize {

	// Returns the instance.
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	// Constructor method.
	private function __construct() {}

	// Sets up initial actions.
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	// Sets up the customizer sections.
	public function sections( $manager ) {

		// Load custom sections.

		// Register custom section types.
		$manager->register_section_type( 'fcommerce_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new fcommerce_Customize_Section_Pro(
				$manager,
				'fcommerce',
				array(
					'title'    => esc_html__( 'tCommerce', 'fcommerce' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'fcommerce' ),
					'pro_url'  => esc_url( 'https://tishonator.com/product/tcommerce' )
				)
			)
		);
	}

	// Loads theme customizer CSS.
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'fcommerce-customize-controls', trailingslashit( get_template_directory_uri() ) . 'js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'fcommerce-customize-controls', trailingslashit( get_template_directory_uri() ) . 'css/customize-controls.css' );
	}
}

// Doing this customizer thang!
fcommerce_Customize::get_instance();

if ( ! function_exists( 'fcommerce_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function fcommerce_customize_register( $wp_customize ) {

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'fcommerce_footer_section',
			array(
				'title'       => __( 'Footer', 'fcommerce' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'fcommerce_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcommerce_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'fcommerce' ),
	            'section'        => 'fcommerce_footer_section',
	            'settings'       => 'fcommerce_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);

		/**
		 * Add Animations Section
		 */
		$wp_customize->add_section(
			'fcommerce_animations_display',
			array(
				'title'       => __( 'Animations', 'fcommerce' ),
				'capability'  => 'edit_theme_options',
			)
		);

		// Add display Animations option
		$wp_customize->add_setting(
				'fcommerce_animations_display',
				array(
						'default'           => 1,
						'sanitize_callback' => 'fcommerce_sanitize_checkbox',
				)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
							'fcommerce_animations_display',
								array(
									'label'          => __( 'Enable Animations', 'fcommerce' ),
									'section'        => 'fcommerce_animations_display',
									'settings'       => 'fcommerce_animations_display',
									'type'           => 'checkbox',
								)
							)
		);
	}
endif; // fcommerce_customize_register
add_action( 'customize_register', 'fcommerce_customize_register' );


if ( ! function_exists( 'fcommerce_sanitize_checkbox' ) ) :

	function fcommerce_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif; // fcommerce_sanitize_checkbox

function fcommerce_disable_woo_commerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
}
add_action('init', 'fcommerce_disable_woo_commerce_sidebar');

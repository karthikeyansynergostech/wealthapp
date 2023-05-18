<?php
/**
 * wealthapp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage wealthapp
 * @since wealthapp 1.0
 */


if ( ! function_exists( 'wealthapp_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since wealthapp 1.0
	 *
	 * @return void
	 */
	function wealthapp_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		

	}

endif;

add_action( 'after_setup_theme', 'wealthapp_support' );

if ( ! function_exists( 'wealthapp_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since wealthapp 1.0
	 *
	 * @return void
	 */
	function wealthapp_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'wealthapp-style',
			get_template_directory_uri() . '/style.css',

			array(),
			$version_string
		);

		wp_register_style(
			'owl-carousel-style',
			get_template_directory_uri() . '/assets/plugin/owl.carousel.min.css',
			
			array(),
			$version_string
		);
		wp_register_style(
			'owl-theme-style',
			get_template_directory_uri() . '/assets/plugin/owl.theme.default.min.css',
			
			array(),
			$version_string
		);

		wp_register_style(
			'font',
			'https://use.typekit.net/aow0yvc.css',
			array(),
			$version_string
		);

		wp_register_style(
			'flex-style',
			get_template_directory_uri() . '/assets/plugin/flexslider.css',
			
			array(),
			$version_string
		);

		wp_register_style(
			'animate',
			get_template_directory_uri() . '/assets/plugin/animate.css',
			
			array(),
			$version_string
		);


		// Enqueue theme stylesheet.
		wp_enqueue_style( 'font' );
		wp_enqueue_style( 'owl-carousel-style' );
		wp_enqueue_style( 'owl-theme-style' );
// 		wp_enqueue_style( 'animate' );

		wp_enqueue_style( 'wealthapp-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'wealthapp_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

function custom_javascript() { ?>
   
   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/js/jquery-3.6.4.min.js'></script>
   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/plugin/scrollify.min.js'></script>
   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/plugin/owl.carousel.min.js'></script>
   <!-- <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/plugin/flexslider.js'></script> -->
   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/custom.js'></script>

<?php }

add_action('wp_footer', 'custom_javascript');

add_action('wp_enqueue_scripts', 'ti_custom_javascript');


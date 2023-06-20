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

	<link rel="stylesheet" href='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/plugin/fancybox/fancybox.css'>
   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/js/jquery-3.6.4.min.js'></script>
   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/plugin/scrollify.min.js'></script>
   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/plugin/owl.carousel.min.js'></script>
   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/custom.js'></script>
   <!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script> -->

   <script src='https://wealthapp.dotncube.in/wp-content/themes/wealthapp/assets/plugin/fancybox/fancybox.js'></script>
   <script src="https://www.google.com/recaptcha/api.js?render=6LfDspYmAAAAABVKqFBf1bij5edMS7pGjCeMEPNn"></script>

   <script>
   	var load_captcha_status =false;
   	function load_captcha(){
   		if(load_captcha_status==false){
   			var head = document.getElementsByTagName('head')[0];
				var script = document.createElement('script');
				script.type = 'text/javascript';
				script.src = "https://www.google.com/recaptcha/api.js?render=6LfDspYmAAAAABVKqFBf1bij5edMS7pGjCeMEPNn";
				head.appendChild(script);
				script.onload = function() {
	   			load_captcha_status = true;
	   			var bf_form = document.getElementById('bf-recaptcha');
			      if(bf_form){
			         grecaptcha.ready(function() {
				        	grecaptcha.execute('6LfDspYmAAAAABVKqFBf1bij5edMS7pGjCeMEPNn', {action:'validate_captcha'}).then(function(token) {
				            	document.getElementById('bf-recaptcha').value = token;
				        	});
			    		});
			      }

			      var sf_form = document.getElementById('sf-recaptcha');
			      if(sf_form){
			         grecaptcha.ready(function() {
				        	grecaptcha.execute('6LfDspYmAAAAABVKqFBf1bij5edMS7pGjCeMEPNn', {action:'validate_captcha'}).then(function(token) {
				            	document.getElementById('sf-recaptcha').value = token;
				        	});
				 		});
			      }

			      var pf_form = document.getElementById('pf-recaptcha');
			      if(pf_form){
			         grecaptcha.ready(function() {
				        	grecaptcha.execute('6LfDspYmAAAAABVKqFBf1bij5edMS7pGjCeMEPNn', {action:'validate_captcha'}).then(function(token) {
				            	document.getElementById('pf-recaptcha').value = token;
				        	});
				 		});
			      }
			      var cf_form = document.getElementById('cf-recaptcha');
			      if(cf_form){
			         grecaptcha.ready(function() {
				        	grecaptcha.execute('6LfDspYmAAAAABVKqFBf1bij5edMS7pGjCeMEPNn', {action:'validate_captcha'}).then(function(token) {
				            	document.getElementById('cf-recaptcha').value = token;
				        	});
				 		});
			      }

			   }   
   		}
   	}

   	$(window).on('load',function() {
   		setTimeout(setTimeout(load_captcha, 5000));
		});

		// $(window).load(function() {
   	// 	setTimeout(setTimeout(load_captcha, 5000));
		// });

		$('body').one('mousemove', function() { 
			load_captcha()
		 });

		$(document).on('click','#fancybox-close',function(){
			$('body').removeClass('stop-scroll');
		});
		$(document).on('click','.iframe',function(){
			$('body').addClass('stop-scroll');
		});
		
		// $(".various").fancybox({
		// 	'transitionIn'	: 'none',
		// 	'transitionOut'	: 'none'
		// });
		$('.various').on('click',function(){
			var url = $(this).attr('rel');
			Fancybox.show([
			  {
			    src: url,
			    type: "video",
			    ratio: 16 / 10,
			    width: 640,
			    height: 360,
			  },
			]);
		});

		$('.popimg').on('click',function(){
			var url = $(this).attr('rel');
			Fancybox.show([
			  {
			    src: url,
			  },
			]);
		});


		Fancybox.bind('[data-fancybox="gallery"]', {Thumbs: {
    type: "classic",
  },}); 


		
            
  </script>


<?php }



add_action('wp_footer', 'custom_javascript');



add_action('wp_enqueue_scripts', 'ti_custom_javascript');




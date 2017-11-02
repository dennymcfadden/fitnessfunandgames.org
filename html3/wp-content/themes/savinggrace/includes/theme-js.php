<?php
if ( ! is_admin() ) { add_action( 'wp_print_scripts', 'woothemes_add_javascript' ); }

if ( ! function_exists( 'woothemes_add_javascript' ) ) {
	function woothemes_add_javascript() {
	
		global $woo_options;
	
		wp_enqueue_script( 'jquery' );    
		wp_enqueue_script( 'superfish', get_template_directory_uri() . '/includes/js/superfish.js', array( 'jquery' ) );
		
		// Load slider.
		if ($woo_options['woo_slider'] == "true" && ( is_home() || is_front_page() ) ) {

			wp_enqueue_script( 'woo-jcarousellite', get_template_directory_uri() . '/includes/js/woo-jcarousellite.js', array( 'jquery' ) );
	
		} // End IF Statement
		
		wp_enqueue_script( 'woo-general', get_template_directory_uri() . '/includes/js/general.js', array( 'jquery' ) );
		
		// Load the custom jCarouselLite settings only if necessary.
		if ( is_front_page() ) {
		
			$autoStart = 0;
			$slideSpeed = 600;
			
			if ( get_option( 'woo_slider_auto' ) == 'true' ) {
			   $autoStart = get_option( 'woo_slider_interval' );
			} else { 
			   $autoStart = 'null';
			}
			
			if ( get_option( 'woo_slider_speed' ) != '' ) {
				$slideSpeed = get_option(' woo_slider_speed' );
			}
		
			// Allow our JavaScript file (the general one) to see our slider setup data.
			$data = array(
						'auto' => $autoStart, 
						'speed' => $slideSpeed
						);
			
			wp_localize_script( 'woo-general', 'woo_jcarousel_settings', $data );
		
		} // End IF Statement
		
	} // End woothemes_add_javascript()
} // End IF Statement
?>
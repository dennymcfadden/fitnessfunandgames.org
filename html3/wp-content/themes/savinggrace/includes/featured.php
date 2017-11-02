<?php
	global $woo_options;
	
	$slides = array();
	if ( is_home() || is_front_page() ) {
		$slides = get_posts( 'suppress_filters=0&post_type=slide&showposts=' . $woo_options[ 'woo_slider_entries' ] );
	}
	
	// Remove any slides that don't have images.
	if ( ! empty( $slides ) ) {
		foreach ( $slides as $k => $post ) {
			setup_postdata( $post );
			
			if ( ! woo_image( 'key=image&return=true' ) ) { unset( $slides[$k] ); }
		}
	}
	
	// Take the last slide and move it to the beginning, removing it from the end.
	array_unshift( $slides, $slides[count( $slides )-1] );
	unset( $slides[count( $slides )-1] );
	
	/* Setup the scrolling images in the background.
	--------------------------------------------------*/
	if ( !empty( $slides ) ) {
	
		$html = '';
		
		// This is used and then removed by the JavaScript.
		$html .= '<input type="hidden" name="woo-true-slide-count" value="' . count( $slides ) . '" />' . "\n";
		
		$html .= '<div id="scrolling-images" class="slides">' . "\n";
		$html .= '<ul>' . "\n";
			
			foreach ( $slides as $k => $post ) {
				$html .= '<li class="slide slide-number-' . ( $k + 1 ) . ' slide-id-' . get_the_ID() . '"><div class="content">' . woo_image( 'return=true&width=480&height=360&link=img' ) . '</div></li><!--/.slide-->' . "\n";
			}
		
		$html .= '</ul>' . "\n";
		$html .= '</div><!--/#scrolling-images.slides-->' . "\n";
		
		echo $html;
	
	}
?>

<div id="donate" class="col-full">
<?php
	/* Main Slider
	--------------------------------------------------*/

	if ( ! empty( $slides ) ) {
		$html  = '';
		
		// Add the "Previous" and "Next" buttons.
		$html .= '<div id="slide-navigator" class="navigation">' . "\n";
			$html .= '<a href="#" class="pager btn-previous">' . __( 'Previous', 'woothemes' ) . '</a>';
			$html .= '<a href="#" class="pager btn-next">' . __( 'Next', 'woothemes' ) . '</a>' . "\n";
		
		if ( @$woo_options['woo_donate_customlink'] != '' ) {
		
			$html .= '<a href="' . $woo_options['woo_donate_customlink'] . '" class="donate-button button">' . $woo_options['woo_donate_btn_text'] . '</a>' . "\n";
		
		} else {
		
			// Add the donation button to the navigator.
			if ( $woo_options['woo_donate_btn'] == 'true' && @$woo_options['woo_donate_paypal'] != '' ) {
			
				$currency = $woo_options['woo_donate_currency'];
			
				$html .= '<div class="donate-button">' . "\n";					
				$html .= '<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">' . "\n";
				$html .= '<input type="hidden" name="cmd" value="_xclick">' . "\n";
				$html .= '<input type="hidden" name="business" value="' . $woo_options['woo_donate_paypal'] . '">' . "\n";
				$html .= '<input type="hidden" name="item_name" value="' . __( 'Donate', 'woothemes' ) . '">' . "\n";
				$html .= '<input type="hidden" name="currency_code" value="' . $currency . '">' . "\n";
				$html .= '<input type="hidden" name="amount" value="' . $woo_options['woo_donate_amount'] . '">' . "\n";
				$html .= '<input value="' . $woo_options['woo_donate_btn_text'] . '" class="submit" type="submit" name="submit" alt="' . __( 'Make payments with PayPal - it\'s fast, free and secure!', 'woothemes' ) . '">' . "\n";
				$html .= '</form>' . "\n";
				$html .= '</div><!--/.donate-button -->' . "\n";
			
			}
		
		}
		
		// Add the "Learn More" link to the navigator.
		if ( @$woo_options['woo_donate_more'] != 'Select a page:' ) {
			$html .= '<div class="learn-more">' . "\n";
				$html .= '<span class="or-text">' . __( 'or', 'woothemes' ) . '</span><!--/.or-text-->' . "\n";
				$html .= '<a href="' . get_permalink(get_page_id($woo_options['woo_donate_more'])) . '" class="more-link">' . __( 'Learn More', 'woothemes' ) . '</a>' . "\n";
			$html .= '</div><!--/.learn-more-->' . "\n";
		}
		
		$html .= '</div><!--/#slide-navigator.navigation-->' . "\n";
		
		$html .= '<div id="slides" class="slides">' . "\n";
		$html .= '<ul>' . "\n";
		
			foreach ( $slides as $k => $post ) {
				setup_postdata( $post );
				
				$html .= '<li class="slide slide-number-' . ( $k + 1 ) . ' slide-id-' . get_the_ID() . '">' . "\n";
				
				// if an url is added to the image
				if (get_post_meta($post->ID, 'url', true))
					$slide_image = '<a href="'.get_post_meta($post->ID, 'url', true).'">'.woo_image( 'return=true&width=480&height=360&link=img' ).'</a>';
				else
					$slide_image = woo_image( 'return=true&width=480&height=360&link=img' );			
				
				$html .= '<div class="slide-image">' . $slide_image . '</div><!--/.slide-image-->' . "\n";
				$html .= '<div class="slide-content">' . "\n";
				$html .= '<h2 class="slide-title">' . get_the_title() . '</h2><!--/.slide-title-->' . "\n";
				if ($woo_options[ 'woo_slider_content' ] == "true") { $html .= '<div class="slide-entry">' . get_the_excerpt() . '</div><!--/.slide-entry-->' . "\n"; }
				$html .= '</div><!--/.slide-content-->' . "\n";
				$html .= '</li><!--/.slide-->' . "\n";
			}
			
		$html .= '</ul>' . "\n";
		$html .= '</div><!--/#slides.slides-->' . "\n";
		
		echo $html;
	}

?>
</div><!--/#donate.col-full-->
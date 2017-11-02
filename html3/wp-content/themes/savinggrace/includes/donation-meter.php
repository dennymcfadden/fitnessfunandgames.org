<?php
	global $woo_options;
	
	/* Donation meter.
	--------------------------------------------------*/

	if ( $woo_options['woo_donate_meter'] == 'true' ) {
		$html = '';
		
		$currency_symbol = $woo_options['woo_donate_currency_symbol'];
		
		$currency_symbol = apply_filters( 'woo_donate_currency_symbol', $currency_symbol );
		
		$money_raised = 0;
		$money_target = 0;
		$money_percent = 0;
		
		$money_raised = intval( @$woo_options['woo_donate_raised'] );
		$money_target = intval( @$woo_options['woo_donate_target'] );
		
		if ( $money_raised && $money_target ) {
			$money_percent = ceil( ( $money_raised / $money_target ) * 100 );
			
			if ( $money_percent > 100 ) { $money_percent = 100; } // Make sure we never have more than 100 returned.
		}
		
		$percentage_height_attr = ' style="height: ' . $money_percent . '%;"';
		if ( $money_percent == 0 ) { $percentage_height_attr = ''; }
		
		$details = '<div class="details"><div class="details-inner">' . "\n";
		$details .= '<span class="text-raised">' . __( 'Raised', 'woothemes' ) . '</span>' . "\n";
		$details .= '<span class="money-raised">' . $currency_symbol . $money_raised . '</span>' . "\n";
		$details .= '<span class="text-ofour"><span>' . __( 'of our', 'woothemes' ) . '</span></span>' . "\n";
		$details .= '<span class="money-target">' . $currency_symbol . $money_target . '</span>' . "\n";
		$details .= '<span class="text-goal">' . __( 'goal', 'woothemes' ) . '</span>' . "\n";
		$details .= '</div></div>' . "\n";
		
		$html .= '<div id="donate-meter" class="donate-meter">' . "\n";
			$html .= '<span' . $percentage_height_attr . '>' . "\n";
				$html .= '<a href="#" class="total-raised">' . __( 'Total Raised', 'woothemes' ) . '</a>';
				$html .= $details;
			$html .= '</span>' . "\n";
			
		$html .= '</div><!--/#donate-meter.donate-meter-->' . "\n";
		
		echo $html;
	
	}
?>
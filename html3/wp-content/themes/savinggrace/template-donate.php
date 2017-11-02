<?php
/*
Template Name: Donate
*/
global $woo_options;
get_header();

$donate_title = get_the_title();

if ( @$woo_options[ 'woo_donate_title' ] != '' ) {
	$donate_title = $woo_options[ 'woo_donate_title' ];
}
?>
       
	<div id="donate" class="col-full">
	
		<div class="title">
			<h2><?php echo $donate_title; ?></h2>
		</div>
		<div id="intro">
			<?php if ( @$woo_options[ 'woo_donate_desc' ] ) { ?>
			<?php echo apply_filters( 'the_content', $woo_options[ 'woo_donate_desc' ] ); ?>
			<?php } ?>
		
			<?php 	
			
				if ( @$woo_options['woo_donate_meter_large'] == 'true' ) {
					
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
			?>
			<div class="meter">
     			<span style="width: <?php echo $money_percent; ?>%"><span class="money-so-far"><?php echo $currency_symbol.$money_raised; ?></span></span>
			</div><!--/.meter -->
			<?php } // End IF Statement (toggle donation meter) ?>
			<div class="donate-button-wrap">
			<?php 
			if ( @$woo_options['woo_donate_customlink'] != '' ) {
			
				$html .= '<a href="' . $woo_options['woo_donate_customlink'] . '" class="donate-button button">' . $woo_options['woo_donate_btn_text'] . '</a>' . "\n";
			
			} else {
			
				if ( $woo_options['woo_donate_btn'] == 'true' && @$woo_options['woo_donate_paypal'] != '' ) {
					
					$html = '';
					$html .= '<div class="donate-button">' . "\n";					
					$html .= '<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">' . "\n";
					$html .= '<input type="hidden" name="cmd" value="_xclick">' . "\n";
					$html .= '<input type="hidden" name="business" value="' . $woo_options['woo_donate_paypal'] . '">' . "\n";
					$html .= '<input type="hidden" name="item_name" value="' . __( 'Donate', 'woothemes' ) . '">' . "\n";
					$html .= '<input type="hidden" name="currency_code" value="' . $woo_options['woo_donate_currency'] . '">' . "\n";
					$html .= '<input type="hidden" name="amount" value="' . $woo_options['woo_donate_amount'] . '">' . "\n";
					$html .= '<input value="' . $woo_options['woo_donate_btn_text'] . '" class="submit" type="submit" name="submit" alt="' . __( 'Make payments with PayPal - it\'s fast, free and secure!', 'woothemes' ) . '">' . "\n";
					$html .= '</form>' . "\n";
					$html .= '</div><!--/.donate-button -->' . "\n";
				
				}
				
			}
				
				echo $html;		
			
			?>
			</div><!--/donate-button-wrap -->
			
		</div><!--/#intro -->
	
	</div><!--/#donate -->
 
    <div id="content" class="page col-full">
		<div id="main" class="col-right">
		           
		<?php if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) { ?>
			<div id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</div><!--/#breadcrumbs -->
		<?php } ?>  			

        <?php if ( have_posts() ) { $count = 0; ?>
        <?php while ( have_posts() ) { the_post(); $count++; ?>
                                                                    
            <div <?php post_class(); ?>>

			    <h1 class="title"><?php the_title(); ?></h1>

                <div class="entry">
                	<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
               	</div><!-- /.entry -->

				<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
                
            </div><!-- /.post -->
            
            <?php
            	$comm = $woo_options['woo_comments'];
            	if ( ( $comm == 'page' || $comm == 'both' ) ) {
            		comments_template();
            	}
            ?>                                   
		<?php
				}
			} else {
		?>
			<div <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </div><!-- /.post -->
        <?php } ?>  
        
		</div><!-- /#main -->

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>
<?php global $woo_options; ?>

	<div id="footer-top" class="col-full">
	
		<?php if ( $woo_options[ 'woo_footer_social' ] == 'true' ) { ?>
		<div class="social-icons fl">
			<ul>
				<?php if ( $woo_options[ 'woo_connect_twitter' ] != '' ) { ?>
				<li class="twitter"><a href="<?php echo $woo_options[ 'woo_connect_twitter' ]; ?>"><?php _e( 'Twitter', 'woothemes' ); ?></a></li>
				<?php } if ( $woo_options[ 'woo_connect_facebook' ] != '' ) { ?>
				<li class="facebook"><a href="<?php echo $woo_options[ 'woo_connect_facebook' ]; ?>"><?php _e( 'Facebook', 'woothemes' ); ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
		
		<?php if ( function_exists( 'has_nav_menu') && has_nav_menu( 'footer-menu') ) { ?>
		
		<div class="footer-menu fr">
			<?php wp_nav_menu( array( 'depth' => 1, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'footer-menu', 'menu_class' => 'nav', 'theme_location' => 'footer-menu' ) ); ?>
		</div><!-- /.footer-menu  -->
		
		<?php } ?>
		
		<div class="fix"></div>
	
	</div><!-- /#footer-top  -->
    
	<div id="footer" class="col-full">
	
		<div id="copyright" class="col-left">
		<?php if( $woo_options[ 'woo_footer_left' ] == 'true' ) {
		
				echo stripslashes( $woo_options[ 'woo_footer_left_text' ] );	

		} else { ?>
			<p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo(); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
		<?php } ?>
		</div>
		
		<div id="credit" class="col-right">
        <?php if( $woo_options[ 'woo_footer_right' ] == 'true' ){
		
        	echo stripslashes( $woo_options[ 'woo_footer_right_text' ] );
       	
		} else { ?>
			<p><?php _e( 'Powered by', 'woothemes' ); ?> <a href="http://www.wordpress.org">WordPress</a>. <?php _e( 'Designed by', 'woothemes' ); ?> <a href="<?php $aff = $woo_options[ 'woo_footer_aff_link' ]; if( ! empty( $aff ) ) { echo $aff; } else { echo 'http://www.woothemes.com'; } ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/woothemes.png" width="74" height="19" alt="Woo Themes" /></a></p>
		<?php } ?>
		</div>
		
	</div><!-- /#footer  -->

</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>
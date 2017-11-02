<?php

/*-----------------------------------------------------------------------------------

TABLE OF CONTENTS

- Register WP Menus
- Page navigation
- Post Meta
- Subscribe & Connect
- CPT Slides

-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Register WP Menus */
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'wp_nav_menu') ) {
	add_theme_support( 'nav-menus' );
	register_nav_menus( array( 'primary-menu' => __( 'Primary Menu', 'woothemes' ) ) );
	register_nav_menus( array( 'secondary-menu' => __( 'Secondary Menu', 'woothemes' ) ) );
	register_nav_menus( array( 'top-menu' => __( 'Top Menu', 'woothemes' ) ) );
	register_nav_menus( array( 'footer-menu' => __( 'Footer Menu', 'woothemes' ) ) );
}


/*-----------------------------------------------------------------------------------*/
/* Page navigation */
/*-----------------------------------------------------------------------------------*/
if (!function_exists( 'woo_pagenav')) {
	function woo_pagenav() {

		global $woo_options;

		// If the user has set the option to use simple paging links, display those. By default, display the pagination.
		if ( array_key_exists( 'woo_pagination_type', $woo_options ) && $woo_options[ 'woo_pagination_type' ] == 'simple' ) {
			if ( get_next_posts_link() || get_previous_posts_link() ) {
		?>

            <div class="nav-entries">
                <?php next_posts_link( '<span class="nav-prev fl">'. __( '<span class="meta-nav">&larr;</span> Older posts', 'woothemes' ) . '</span>' ); ?>
                <?php previous_posts_link( '<span class="nav-next fr">'. __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'woothemes' ) . '</span>' ); ?>
                <div class="fix"></div>
            </div>

		<?php
			} 
		} else {
			woo_pagination();
		} 
	
	} 
}


/*-----------------------------------------------------------------------------------*/
/* Post Meta */
/*-----------------------------------------------------------------------------------*/

if (!function_exists( 'woo_post_meta')) {
	function woo_post_meta( ) {
?>
<div class="post-meta">

    <div class="comments"><span class="meta-title"><?php _e('Comments', 'woothemes'); ?></span><?php comments_popup_link(__( 'Leave a comment', 'woothemes' ), __( '1 Comment', 'woothemes' ), __( '% Comments', 'woothemes' )); ?></div>
    <div class="post-category"><span class="meta-title"><?php _e('Categories', 'woothemes'); ?></span><?php the_category( ', ') ?></div>
    <div class="post-author"><span class="meta-title"><?php _e('Author', 'woothemes'); ?></span><?php the_author_posts_link(); ?></div>
    
    <div class="fix"></div>
    
</div>
<?php
	}
}


/*-----------------------------------------------------------------------------------*/
/* Subscribe / Connect */
/*-----------------------------------------------------------------------------------*/

if (!function_exists( 'woo_subscribe_connect')) {
	function woo_subscribe_connect($widget = 'false', $title = '', $form = '', $social = '') {

		global $woo_options;

		// Setup title
		if ( $widget != 'true' )
			$title = $woo_options[ 'woo_connect_title' ];

		// Setup related post (not in widget)
		$related_posts = '';
		if ( $woo_options[ 'woo_connect_related' ] == "true" AND $widget != "true" )
			$related_posts = do_shortcode( '[related_posts limit="5"]' );

?>
	<?php if ( $woo_options[ 'woo_connect' ] == "true" OR $widget == 'true' ) : ?>
	<div id="connect">
		<h3 class="title"><?php if ( $title ) echo $title; else _e( 'Subscribe', 'woothemes' ); ?></h3>

		<div <?php if ( $related_posts != '' ) echo 'class="col-left"'; ?>>
			<p><?php if ($woo_options[ 'woo_connect_content' ] != '') echo stripslashes($woo_options[ 'woo_connect_content' ]); else _e( 'Subscribe to our e-mail newsletter to receive updates.', 'woothemes' ); ?></p>

			<?php if ( $woo_options[ 'woo_connect_newsletter_id' ] != "" AND $form != 'on' ) : ?>
			<form class="newsletter-form<?php if ( $related_posts == '' ) echo ' fl'; ?>" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open( 'http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $woo_options[ 'woo_connect_newsletter_id' ]; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520' );return true">
				<input class="email" type="text" name="email" value="<?php esc_attr_e( 'E-mail', 'woothemes' ); ?>" onfocus="if (this.value == '<?php _e( 'E-mail', 'woothemes' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'E-mail', 'woothemes' ); ?>';}" />
				<input type="hidden" value="<?php echo $woo_options[ 'woo_connect_newsletter_id' ]; ?>" name="uri"/>
				<input type="hidden" value="<?php bloginfo( 'name' ); ?>" name="title"/>
				<input type="hidden" name="loc" value="en_US"/>
				<input class="submit" type="submit" name="submit" value="<?php _e( 'Submit', 'woothemes' ); ?>" />
			</form>
			<?php endif; ?>

			<?php if ( $social != 'on' ) : ?>
			<div class="social<?php if ( $related_posts == '' AND $woo_options[ 'woo_connect_newsletter_id' ] != "" ) echo ' fr'; ?>">
		   		<?php if ( $woo_options[ 'woo_connect_rss' ] == "true" ) { ?>
		   		<a href="<?php if ( $woo_options[ 'woo_feed_url' ] ) { echo $woo_options[ 'woo_feed_url' ]; } else { echo get_bloginfo_rss( 'rss2_url' ); } ?>" class="subscribe"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-social-rss.png" title="<?php esc_attr_e( 'Subscribe to our RSS feed', 'woothemes' ); ?>" alt=""/></a>

		   		<?php } if ( $woo_options[ 'woo_connect_twitter' ] != "" ) { ?>
		   		<a href="<?php echo $woo_options[ 'woo_connect_twitter' ]; ?>" class="twitter"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-social-twitter.png" title="<?php esc_attr_e( 'Follow us on Twitter', 'woothemes' ); ?>" alt=""/></a>

		   		<?php } if ( $woo_options[ 'woo_connect_facebook' ] != "" ) { ?>
		   		<a href="<?php echo $woo_options[ 'woo_connect_facebook' ]; ?>" class="facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-social-facebook.png" title="<?php esc_attr_e( 'Connect on Facebook', 'woothemes' ); ?>" alt=""/></a>

		   		<?php } if ( $woo_options[ 'woo_connect_youtube' ] != "" ) { ?>
		   		<a href="<?php echo $woo_options[ 'woo_connect_youtube' ]; ?>" class="youtube"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-social-youtube.png" title="<?php esc_attr_e( 'Watch on YouTube', 'woothemes' ); ?>" alt=""/></a>

		   		<?php } if ( $woo_options[ 'woo_connect_flickr' ] != "" ) { ?>
		   		<a href="<?php echo $woo_options[ 'woo_connect_flickr' ]; ?>" class="flickr"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-social-flickr.png" title="<?php esc_attr_e( 'See photos on Flickr', 'woothemes' ); ?>" alt=""/></a>

		   		<?php } if ( $woo_options[ 'woo_connect_linkedin' ] != "" ) { ?>
		   		<a href="<?php echo $woo_options[ 'woo_connect_linkedin' ]; ?>" class="linkedin"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-social-linkedin.png" title="<?php esc_attr_e( 'Connect on LinkedIn', 'woothemes' ); ?>" alt=""/></a>

		   		<?php } if ( $woo_options[ 'woo_connect_delicious' ] != "" ) { ?>
		   		<a href="<?php echo $woo_options[ 'woo_connect_delicious' ]; ?>" class="delicious"><img src="<?php echo get_template_directory_uri(); ?>/images/ico-social-delicious.png" title="<?php esc_attr_e( 'Discover on Delicious', 'woothemes' ); ?>" alt=""/></a>

				<?php } ?>
			</div>
			<?php endif; ?>

		</div><!-- col-left -->

		<?php if ( $woo_options[ 'woo_connect_related' ] == "true" AND $related_posts != '' ) : ?>
		<div class="related-posts col-right">
			<h4><?php _e( 'Related Posts:', 'woothemes' ); ?></h4>
			<?php echo $related_posts; ?>
		</div><!-- col-right -->
		<?php wp_reset_query(); endif; ?>

        <div class="fix"></div>
	</div>
	<?php endif; ?>
<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/* Custom Post Type - Slides */
/*-----------------------------------------------------------------------------------*/

add_action('init', 'woo_add_slides');
function woo_add_slides() 
{
  $labels = array(
    'name' => _x('Slides', 'post type general name', 'woothemes', 'woothemes'),
    'singular_name' => _x('Slide', 'post type singular name', 'woothemes'),
    'add_new' => _x('Add New', 'slide', 'woothemes'),
    'add_new_item' => __('Add New Slide', 'woothemes'),
    'edit_item' => __('Edit Slide', 'woothemes'),
    'new_item' => __('New Slide', 'woothemes'),
    'view_item' => __('View Slide', 'woothemes'),
    'search_items' => __('Search Slides', 'woothemes'),
    'not_found' =>  __('No slides found', 'woothemes'),
    'not_found_in_trash' => __('No slides found in Trash', 'woothemes'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => false,
    'publicly_queryable' => false,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_icon' => get_template_directory_uri() .'/functions/images/option-icon-slider.png',
    'menu_position' => null,
    'supports' => array('title','editor','thumbnail'/*'author','thumbnail','excerpt','comments'*/)
  ); 
  register_post_type('slide',$args);
}


/*-----------------------------------------------------------------------------------*/
/* END */
/*-----------------------------------------------------------------------------------*/
?>
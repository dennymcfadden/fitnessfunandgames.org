<?php
	global $woo_options;
	get_header();
?>
    
    <div id="content" class="col-full">
		<div id="main" class="col-right">
            
		<?php if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) { ?>
			<div id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</div><!--/#breadcrumbs -->
		<?php } ?>  

		<?php if (have_posts()) { $count = 0; ?>
        
            <?php if (is_category()) { ?>
        	<span class="archive_header"><span class="fl cat"><?php _e( 'Archive', 'woothemes' ); ?> | <?php echo single_cat_title(); ?></span> <span class="fr catrss"><?php $cat_obj = $wp_query->get_queried_object(); $cat_id = $cat_obj->cat_ID; echo '<a href="'; get_category_rss_link(true, $cat, '' ); echo '">'; _e( "RSS feed for this section", "woothemes" ); echo '</a>'; ?></span></span>        
        
            <?php } elseif (is_day()) { ?>
            <span class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( get_option( 'date_format' ) ); ?></span>

            <?php } elseif (is_month()) { ?>
            <span class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( 'F, Y' ); ?></span>

            <?php } elseif (is_year()) { ?>
            <span class="archive_header"><?php _e( 'Archive', 'woothemes' ); ?> | <?php the_time( 'Y' ); ?></span>

            <?php } elseif (is_author()) { ?>
            <span class="archive_header"><?php _e( 'Archive by Author', 'woothemes' ); ?></span>

            <?php } elseif (is_tag()) { ?>
            <span class="archive_header"><?php _e( 'Tag Archives:', 'woothemes' ); ?> <?php echo single_tag_title( '', true ); ?></span>
            
            <?php } ?>
            <div class="fix"></div>
        
        <?php while ( have_posts() ) { the_post(); $count++; ?>
                                                                    
            <!-- Post Starts -->
	            <div <?php post_class(); ?>> 
	                
	                <div class="post-date">
	                	<span class="month"><?php the_time( 'M' ); ?></span>
	                	<span class="day"><?php the_time( 'd' ); ?></span>
	                </div>
	                
	                <h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'echo' => 0 ) ); ?>"><?php the_title(); ?></a></h2>
	                                
	                <div class="entry">
	                	
	                	<?php if ( $woo_options[ 'woo_post_content' ] != 'content' ) { woo_image( 'width='.$woo_options['woo_thumb_w'].'&height='.$woo_options['woo_thumb_h'].'&class=thumbnail '.$woo_options['woo_thumb_align']); } ?>
	                
	                    <?php if ( $woo_options[ 'woo_post_content' ] == 'content' ) { the_content( __( 'Continue Reading &rarr;', 'woothemes' ) ); } else { the_excerpt(); } ?>
		                
	                    <?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
	                    
		                <div class="post-more">      
		                	<?php if ( $woo_options[ 'woo_post_content' ] == 'excerpt' ) { ?>
		                    <span class="read-more"><a href="<?php the_permalink(); ?>" title="<?php esc_attr( __( 'Continue Reading &rarr;', 'woothemes' ) ); ?>"><?php _e( 'Continue Reading &rarr;', 'woothemes' ); ?></a></span>	                    
		                    <?php } ?>
		                </div><!-- .post-more -->	
	                                        
	                </div><!-- .entry --> 
	                                                       	                
	                <?php woo_post_meta(); ?>
	                
	                <div class="fix"></div>
	                                                     
	            </div><!-- /.post -->
            
        <?php
        		} // End WHILE Loop
        	} else {
        ?>
        
            <div <?php post_class(); ?>>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </div><!-- /.post -->
        
        <?php } // End IF Statement ?>  
    
			<?php woo_pagenav(); ?>
                
		</div><!-- /#main -->

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>
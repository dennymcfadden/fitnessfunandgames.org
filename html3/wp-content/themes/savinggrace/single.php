<?php get_header(); ?>
<?php global $woo_options; ?>
       
    <div id="content" class="col-full">
		<div id="main" class="col-right">
		           
		<?php if ( $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
			<div id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</div><!--/#breadcrumbs -->
		<?php } ?>  

        <?php if ( have_posts() ) { $count = 0; ?>
        <?php while ( have_posts() ) { the_post(); $count++; ?>
        
	            <div <?php post_class(); ?>> 
	                
	                <div class="post-date">
	                	<span class="month"><?php the_time( 'M' ); ?></span>
	                	<span class="day"><?php the_time( 'd' ); ?></span>
	                </div>
	                
	                <h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'echo' => 0 ) ); ?>"><?php the_title(); ?></a></h2>
	                                
	                <div class="entry">
	                	
	                	<?php if ( $woo_options['woo_post_content'] != 'content' ) { woo_image( 'width='.$woo_options['woo_thumb_w'].'&height='.$woo_options['woo_thumb_h'].'&class=thumbnail '.$woo_options['woo_thumb_align'] ); } ?>
	                
	                     <?php the_content( __( 'Continue Reading &rarr;', 'woothemes' ) ); ?>
	                    
		                <div class="post-more">      
		                	
		                    <?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
		                </div><!-- .post-more -->
	                                        
	                </div><!-- .entry -->
	                
	                <?php woo_post_meta(); ?>
	                
	                <div class="fix"></div>
	                                                     
	            </div><!-- /.post -->

				<?php if ( $woo_options[ 'woo_post_author' ] == 'true' ) { ?>
				<div id="post-author">
					<div class="profile-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), '70' ); ?></div>
					<div class="profile-content">
						<h3 class="title"><?php printf( esc_attr__( 'About %s', 'woothemes' ), get_the_author() ); ?></h3>
						<?php the_author_meta( 'description' ); ?>
						<div class="profile-link">
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'woothemes' ), get_the_author() ); ?>
							</a>
						</div><!-- #profile-link -->
					</div><!-- .post-entries -->
					<div class="fix"></div>
				</div><!-- #post-author -->
				<?php } ?>

				<?php woo_subscribe_connect(); ?>

	        <div id="post-entries">
	            <div class="nav-prev fl"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
	            <div class="nav-next fr"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
	            <div class="fix"></div>
	        </div><!-- #post-entries -->
            
            <?php
            	$comm = $woo_options['woo_comments'];
            	if ( ( $comm == 'post' || $comm == 'both' ) ) {
            		comments_template( '', true);
            	}
            ?>                                   
		<?php
				}
			} else {
		?>
			<div <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
			</div><!-- .post -->             
       	<?php } ?>  
        
		</div><!-- #main -->

        <?php get_sidebar(); ?>

    </div><!-- #content -->
		
<?php get_footer(); ?>
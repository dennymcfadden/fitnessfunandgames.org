<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<?php global $woo_options; ?>

    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full">
    
        <!-- #main Starts -->
        <div id="main" class="col-right">      
                    
		<?php if ( $woo_options['woo_breadcrumbs_show'] == 'true' ) { ?>
			<div id="breadcrumbs">
				<?php woo_breadcrumbs(); ?>
			</div><!--/#breadcrumbs -->
		<?php } ?>  

        <?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page') ) { $paged = get_query_var( 'page' ); } else { $paged = 1; } ?>
        <?php query_posts( "post_type=post&paged=$paged" ); ?>
        <?php if ( have_posts() ) { $count = 0; while ( have_posts() ) { the_post(); $count++; ?>
                                                                    
            <!-- Post Starts -->
            <div <?php post_class(); ?>> 
                
                <div class="post-date">
                	<span class="month"><?php the_time( 'M' ); ?></span>
                	<span class="day"><?php the_time( 'd' ); ?></span>
                </div>
                
                <h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'echo' => 0 ) ); ?>"><?php the_title(); ?></a></h2>
                                
                <div class="entry">
                	
                	<?php if ( $woo_options[ 'woo_post_content' ] != 'content' ) { woo_image( 'width='.$woo_options['woo_thumb_w'].'&height='.$woo_options['woo_thumb_h'].'&class=thumbnail '.$woo_options['woo_thumb_align'] ); } ?>
                
                    <?php if ( $woo_options[ 'woo_post_content' ] == 'content' ) { the_content( __( 'Continue Reading &rarr;', 'woothemes' ) ); } else { the_excerpt(); } ?>
                    
	                <div class="post-more">      
	                	<?php if ( $woo_options[ 'woo_post_content' ] == 'excerpt' ) { ?>
	                    <span class="read-more"><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'Continue Reading &rarr;', 'woothemes' ); ?>"><?php _e( 'Continue Reading &rarr;', 'woothemes' ); ?></a></span>	                  
	                    <?php } ?>
	                </div><!-- .post-more -->
                                        
                </div><!-- .entry -->
                
                <?php woo_post_meta(); ?>
                
                <div class="fix"></div>
                                                     
            </div><!-- /.post -->
                                                
        <?php
        		}
        	} else {
        ?>
            <div <?php post_class(); ?>>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </div><!-- /.post -->
        <?php } ?>  
    
            <?php woo_pagenav(); ?>
			<?php wp_reset_query(); ?>                

        </div><!-- /#main -->
            
		<?php get_sidebar(); ?>

    </div><!-- /#content -->    
		
<?php get_footer(); ?>
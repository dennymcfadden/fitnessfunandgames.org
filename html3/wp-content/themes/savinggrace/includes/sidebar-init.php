<?php
// Register widgetized areas

if (!function_exists( 'the_widgets_init')) {
	function the_widgets_init() {
	    if ( !function_exists( 'register_sidebar') )
	        return;
	
	    register_sidebar(array( 'name' => 'Sidebar','id' => 'primary','description' => "", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}
}

add_action( 'init', 'the_widgets_init' );  
?>
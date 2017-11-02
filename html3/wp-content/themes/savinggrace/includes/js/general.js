/*-------------------------------------------------------------------------------------

FILE INFORMATION

Description: JavaScript on the "Saving Grace" WooTheme.
Date Created: 2011-04-07.
Author: Tiago and Matty.
Since: 1.0.0


TABLE OF CONTENTS

- Toggle Donations Popup on Donation Meter
- Featured Slider Setup (jCarouselLite)
- Add alt-row styling to tables.
- Superfish navigation dropdown.
- Detect and adjust the heights of the main columns to match.
- Tougle Search Form

- function clearText() - Clear Comment Form.

-------------------------------------------------------------------------------------*/

jQuery(document).ready(function() {

/*-----------------------------------------------------------------------------------*/
/* Toggle Donations Popup on Donation Meter */
/*-----------------------------------------------------------------------------------*/

	if ( jQuery( '.donate-meter .details' ).length ) {
	
		jQuery( 'a.total-raised' ).hover(
			function () {
				jQuery( '.donate-meter .details' ).addClass( 'active' );
			}, // Over...
			function () {
				jQuery( '.donate-meter .details' ).removeClass( 'active' );
			} // ... and Out.
		);
	
	}

/*-----------------------------------------------------------------------------------*/
/* Featured Slider Setup (jCarouselLite) */
/*-----------------------------------------------------------------------------------*/

	if ( jQuery( '.slides' ).length ) {
	
	var totalSlides = 0;
	totalSlides = jQuery( 'input[name="woo-true-slide-count"]' ).val();
	totalSlides = parseInt( totalSlides );
	
	jQuery( 'input[name="woo-true-slide-count"]' ).remove();

	if ( woo_jcarousel_settings.auto > 0 ) {
		woo_jcarousel_settings.auto = parseInt( woo_jcarousel_settings.auto );
	} else {
		woo_jcarousel_settings.auto = null;
	}
	
	woo_jcarousel_settings.speed = parseInt( woo_jcarousel_settings.speed );
	
		jQuery('#scrolling-images.slides').jCarouselLite({
		
			circular: true, 
			auto: woo_jcarousel_settings.auto, 
			speed: woo_jcarousel_settings.speed, 
			visible: totalSlides, // This cannot be greater than the number of slides available.
			btnNext: '.btn-next', 
			btnPrev: '.btn-previous', 
			scroll: 1,  
			vertical: true
			
		});
		
		jQuery('#slides.slides').jCarouselLite({
		
			circular: true, 
			auto: woo_jcarousel_settings.auto, 
			speed: woo_jcarousel_settings.speed,
			visible: 1, 
			btnNext: '.btn-next', 
			btnPrev: '.btn-previous', 
			scroll: 1, 
			start: 1, 
			beforeStart: function( e ) {
				jQuery( e ).parent().fadeTo( 'fast', 0);
			},
			afterEnd: function( e ) {
				jQuery( e ).parent().fadeTo( 'slow', 1);
				
				/*
				, function () {
					if ( jQuery( e ).prev().hasClass( 'slide-number-1' ) ) {
						jQuery( '#scolling-images.slides .slide-number-1, #slides.slides .slide-number-1' ).remove();
					}
				}
				*/
			}
			
		});

	} // End IF Statement

/*-----------------------------------------------------------------------------------*/
/* Add alt-row styling to tables. */
/*-----------------------------------------------------------------------------------*/

	jQuery( '.entry table tr:odd').addClass( 'alt-table-row' );

/*-----------------------------------------------------------------------------------*/
/* Superfish navigation dropdown. */
/*-----------------------------------------------------------------------------------*/

if( jQuery().superfish ) {
	jQuery( 'ul.nav' ).superfish({
		delay: 200,
		animation: {opacity:'show', height:'show'},
		speed: 'fast',
		dropShadows: false
	});
}

/*-----------------------------------------------------------------------------------*/
/* Detect and adjust the heights of the main columns to match. */
/*-----------------------------------------------------------------------------------*/

	// Detect the heights of the two main columns.
	
	var content;
	content = jQuery("#main");
	
	var contentHeight = content.height();
	
	var sidebar;
	sidebar = jQuery("#sidebar");
	
	var sidebarHeight = sidebar.height();
	
	// Determine the ideal new sidebar height.
	
	var newSidebarHeight;
	var contentPadding;
	var sidebarPadding;
	
	contentPadding = parseInt( content.css( 'padding-top' ) ) + parseInt( content.css( 'padding-bottom' ) );
	sidebarPadding = parseInt( sidebar.css( 'padding-top' ) ) + parseInt( sidebar.css( 'padding-bottom' ) );
	
	if( contentHeight < sidebarHeight ) {
	
		content.height( sidebarHeight + sidebarPadding );
		sidebar.height( sidebarHeight + sidebarPadding );
		
		newSidebarHeight = sidebarHeight + sidebarPadding;
		
		content.css( 'padding-bottom', 8 );
	
	} // End IF Statement
	
	if( contentHeight > sidebarHeight ) {
	
		sidebar.height( contentHeight + contentPadding );
		content.height( contentHeight + contentPadding );
		
		newSidebarHeight = contentHeight + contentPadding;
		
		content.css( 'padding-bottom', 8 );
	
	} // End IF Statement
	
	newSidebarHeight = Math.ceil( newSidebarHeight );
	
	// Make the height of the sidebar the same as the container.
	// sidebar.css( 'height', String( newSidebarHeight + 'px' ) );


/*-----------------------------------------------------------------------------------*/
/* Toggle Search Form. */
/*-----------------------------------------------------------------------------------*/

jQuery( '.top-search a' ).click( function() {

	var searchAnchorObj = jQuery( this );

	if ( searchAnchorObj.parent().hasClass( 'close' ) ) {
		searchAnchorObj.fadeTo( 'slow', 0, function () {
			searchAnchorObj.parent().removeClass( 'close' );
			searchAnchorObj.text( 'Search' ).fadeTo( 'slow', 1 );
		});
	} else {
		searchAnchorObj.fadeTo( 'slow', 0, function () {
			searchAnchorObj.parent().addClass( 'close' );
			searchAnchorObj.text( 'Close' ).fadeTo( 'slow', 1 );
		});
	}

	jQuery( '#search-top' ).slideToggle( 'slow', function() {});

	return false;
});

}); // End jQuery()

/*-----------------------------------------------------------------------------------*/
/* clearText() - Clear Comment Form. */
/*-----------------------------------------------------------------------------------*/

function clearText( field ) {

    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;

}
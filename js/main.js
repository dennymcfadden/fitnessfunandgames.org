// Replaces #nav-placeholder with nav.html //
$("#nav-placeholder").load("nav.html", function() {
	// Adds .active class to <a> tags with current URL //
	$(document).activeNavigation("nav");
	// Toggles visibility of 'nav' on click of 'nav-btn' //
	$('#nav-btn').click(function()
    {
    $('nav').slideToggle();
    });
});


// When user resizes the window
$(window).resize(function(){
   // Get the width of the page
   var width = $(window).width();
   // If width > breakpoint and nav is hidden
   if(width > 768 && nav.is(':hidden')) {
      // Change display property to empty
      nav.css('display','');
   }
});
// Replaces #nav-placeholder with nav.html //
$("#nav-placeholder").load("nav.html", {}, function() {
	// Adds .active class to <a> tags with current URL //
	$(document).activeNavigation("nav");
	// Toggles visibility of 'nav' on click of 'nav-btn' //
	$('#nav-btn').click(function()
    {
    $('nav').slideToggle();
    });
});
// Replaces #nav-placeholder with nav.html //
$(function()
  {
  $("#nav-placeholder").load("nav.html");
  });

// Adds .active class to <a> tags with current URL //
$(document).ready(function()
  {
    $(document).activeNavigation("nav")
  });

// Toggles visibility of 'nav' on click of 'nav-btn' //
$('#nav-btn').click(function()
  {
    $('nav').slideToggle();
  });
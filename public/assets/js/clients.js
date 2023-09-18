var gfhfgjj24 = 1; $('.no-touch .project-list li:nth-child(3), .no-touch .project-list li:nth-child(8)').hover(function(e) {
  $(this).parents('.client-meta').next('.overflow-wrapper').find('img:nth-child(1)').toggleClass('show-image');
});

$('.no-touch .project-list li:nth-child(4), .no-touch .project-list li:nth-child(9)').hover(function(e) {
  $(this).parents('.client-meta').next('.overflow-wrapper').find('img:nth-child(2)').toggleClass('show-image');
});

$('.no-touch .project-list li:nth-child(5), .no-touch .project-list li:nth-child(9)').hover(function(e) {
  $(this).parents('.client-meta').next('.overflow-wrapper').find('img:nth-child(3)').toggleClass('show-image');
});

$('.no-touch .project-list li:nth-child(6), .no-touch .project-list li:nth-child(10)').hover(function(e) {
  $(this).parents('.client-meta').next('.overflow-wrapper').find('img:nth-child(4)').toggleClass('show-image');
});

$('.no-touch .project-list li:nth-child(7), .no-touch .project-list li:nth-child(11)').hover(function(e) {
  $(this).parents('.client-meta').next('.overflow-wrapper').find('img:nth-child(5)').toggleClass('show-image');
});

// Reset 
$('.touch .client-wrap').click(function(event){
	  var target = $( event.target );
	  if ( target.hasClass( "client-close" ) ) {
		  $('.client-wrap div.client').addClass('reset');
	  }
	  else{
		  $('.client-wrap div.client').removeClass('reset');
	  }
});

// White BG for client top
$('.no-touch .project-list li').hover(function(e) {
  $(this).parents('.client-meta').next('.overflow-wrapper').toggleClass('white-bg');
  $('.touch .client-wrap').toggleClass('.solid');
});

// David Walsh simple lazy loading 
[].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
  img.setAttribute('src', img.getAttribute('data-src'));
  img.onload = function() {
    img.removeAttribute('data-src');
  };
});

// For the demo 
$('.hover .toggle-switch').click(function(e) {
  $('.hover .toggle-switch').toggleClass('switched-off');
  $('.client-wrap').toggleClass('opacity-focus');
});
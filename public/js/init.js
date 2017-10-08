(function($){
  $(function(){
  	$(document).ready(function() {
	});
    $('.button-collapse').sideNav();
    $('.parallax').parallax();

    // $(window).scroll(function() {
    //   $('.dictionary-container').delay(500).fadeOut();
    //   	$('.dictionary-example').delay(1500).fadeIn();
    // });
    $(document).ready(function(){
      $('.collapsible').collapsible();
      $('.parallax').parallax();
    });

    $(window).scroll(function(){
     //  $(".parallax-container").css("opacity", 1 - ($(window).scrollTop())/ window.innerHeight);
    	// $(".heading").css("opacity", 1 - ($(window).scrollTop()-window.innerHeight )/ window.innerHeight);
     //  $(".section-1").css("opacity", 1 - ($(window).scrollTop() - 2 * window.innerHeight )/ window.innerHeight);
  	});

    /*
  	$(window).scroll(function(){
    	$(".section-1").css("opacity", 1 - ($(window).scrollTop() - 2 * window.innerHeight )/ window.innerHeight);
  	});
*/

  }); // end of document ready
})(jQuery); // end of jQuery name space


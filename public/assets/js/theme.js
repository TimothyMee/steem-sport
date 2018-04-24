
(function($) {
    "use strict";

/*---------------------
  Preloader
--------------------- */

    $(window).on('load', function() {
        $('#preloader').fadeOut('slow', function() { $(this).remove(); });
    });
	
/*----------------------------
 Header-search
------------------------------ */

	$(".icon-search,.icon-nav ").on("click", function(){
		$(this).parent().find('.toogle-content').slideToggle('medium');
	})

/*----------------------------
 Nivo-slider
------------------------------ */
$('#mainSlider').nivoSlider({
	directionNav: true,
	animSpeed: 2000,
	slices: 18,
	pauseTime: 50000,
	pauseOnHover: false,
	controlNav: true,
	manualAdvance: true,
	prevText: '<i class="fa fa-long-arrow-left nivo-prev-icon"></i>',
	nextText: '<i class="fa fa-long-arrow-right nivo-next-icon"></i>'
});	
		
/*----------------------------
   Waypoint js active
------------------------------ */
    $('#waypoint').waypoint(function() {
        $(this).toggleClass('animated');
    }, { offset: 'bottom-in-view' });
	
/*----------------------------
 jQuery MeanMenu
------------------------------ */
	jQuery('#mobile-menu').meanmenu();		
	

/*----------------------------
  Sticky Header
------------------------------ */
$(window).on('scroll',function() {    
	var scroll = $(window).scrollTop();
	if (scroll < 200) {
	$(".main_h").removeClass("sticky");
	}else{
	$(".main_h").addClass("sticky");
	}
});
	
	
/*-------------------
  Scroll-up
--------------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-double-up " aria-hidden="true"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

/*---------------------
  Smooth scroll
--------------------- */
    $('.smoothscroll').on('click', function(e) {
        e.preventDefault();
        var target = this.hash;

        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top - 80
        }, 1200);
    });
	
/*---------------------
  Countdown
--------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>DD</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>HR</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>MIN</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>SEC</p></span>'));
        });
    });	
	
/*---------------------
 Vedio PopUp 
--------------------- */	
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 300,
        preloader: false,
        fixedContentPos: false
    });


}(jQuery));


$ = jQuery;
$(document).ready(function(){
	"use strict";
	console.log('hi');
	var window_width 	 = $(window).width(),
	window_height 		 = window.innerHeight,
	header_height 		 = $(".default-header").height(),
	header_height_static = $(".site-header.static").outerHeight(),
	fitscreen 			 = window_height - header_height;


	// $(window).on('load', function() {
 //        // Animate loader off screen
 //        $(".preloader").fadeOut("slow");;
 //    });

	$(".fullscreen").css("height", window_height)
	$(".fitscreen").css("height", fitscreen);

    //-------- Active Sticky Js ----------//
     $(".sticky-header").sticky({topSpacing:0});

     // -------   Active Mobile Menu-----//

     $(".mobile-btn").on('click', function(e){
        e.preventDefault();
        $(".main-menu").slideToggle();
        $("span", this).toggleClass("lnr-menu lnr-cross");
        $(".main-menu").addClass('mobile-menu');
    });
     $(".main-menu li a").on('click', function(e){
        e.preventDefault();
        $(".mobile-menu").slideUp();
        $(".mobile-btn span").toggleClass("lnr-menu lnr-cross");
    });

		// Initialize wow js animation scripts
		if ($.fn.init) {
				new WOW().init();
		}


    // $(function(){
    //     $('#Container').mixItUp();
    // });
    var mixer = mixitup('#filter-content');
    $(".controls .filter").on('click', function(event){
        $(".controls .filter").removeClass('active');
        $(this).addClass('active');
    });
    // Add smooth scrolling to Menu links
         $(".main-menu li a, .smooth").on('click', function(event) {
                if (this.hash !== "") {
                  event.preventDefault();
                  var hash = this.hash;
                  $('html, body').animate({
                    scrollTop: $(hash).offset().top - (-10)
                }, 600, function(){

                    window.location.hash = hash;
                });
            }
        });
    var owl = $(".active-case-carousel");
    owl.owlCarousel({
        loop:true,
        dot: false,
        //items: 3,
        margin: 30,
        autoplay:true,
        autoplayTimeout:2000,
        navSpeed: 20000,
        //dragEndSpeed: 4000,
        autoplayHoverPause:false,
        animateOut: 'fadeOutLeft',
        animateIn: 'fadeInRight',
        pagination: false,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
             }
        }
    });

  //  $('.active-case-carousel').mouseover(function() {

      //console.log('Hell');
       // owl.trigger('owl.next');
        //owl.trigger('owl.autoplay',[1000]);
        //owl.trigger('next.owl.carousel' ,[24000]);

  //  });


		//$(document).ready(function(){
		//Change logo after scrolling
		$(function() {
		    var logo = $(".logo"); $(window).scroll(function() {
		    var scroll = $(window).scrollTop();

		    if (scroll >= 350) {
		        //$(".smooth").text('MM');
						//{
     				$("#my_image").attr('src','http://tanvir.pro/dev/wp-content/uploads/2018/10/Maxco_2x.png');
		    }
		    else {
		        $("#my_image").attr('src','http://tanvir.pro/dev/wp-content/uploads/2018/09/maxco.png');
		    }
			});
		});


		// SlickNav
		// $(function(){
		// $('#primary-menu').slicknav({
		// 		label: "hdfjsf",
		// 	});
		// });


});


//superfish
var superfishInit = function() {
	var $selector = $( "ul.sf-menu" );
	$selector.superfish( {
		delay: 100,
		speed: "fast",
		autoArrows: false
	} );
};

$( function() {
	superfishInit();
} );
( function() {
    var nav = document.getElementById( 'site-navigation' ), button, menu;
    if ( ! nav ) {
        return;
    }

    button = nav.getElementsByTagName( 'button' )[0];
    menu   = nav.getElementsByTagName( 'ul' )[0];
    if ( ! button ) {
        return;
    }

    // Hide button if menu is missing or empty.
    if ( ! menu || ! menu.childNodes.length ) {
        button.style.display = 'none';
        return;
    }

    button.onclick = function() {
        if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
            menu.className = 'nav-menu';
        }

        if ( -1 !== button.className.indexOf( 'toggled-on' ) ) {
            button.className = button.className.replace( ' toggled-on', '' );
            menu.className = menu.className.replace( ' toggled-on', '' );
        } else {
            button.className += ' toggled-on';
            menu.className += ' toggled-on';
        }
    };
} )(jQuery);

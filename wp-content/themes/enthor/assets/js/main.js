/**
*
*
* --------------------------------------------------------------------
*
* Template : Enthor - Creative Portfolio WordPress Theme
* Author : backtheme
* Author URI : https://backtheme.tech/
*
* --------------------------------------------------------------------
*
*
**/

(function($) {
    "use strict";
    // sticky menu
    var header = $('.menu-sticky');
    var win = $(window);
    var headerinnerHeight = $(".header-inner").innerHeight();

    win.on('scroll', function() {
       var scroll = win.scrollTop();
       if (scroll < headerinnerHeight) {
           header.removeClass("sticky");
           
       } else {
           header.addClass("sticky");
       }
    });

    $('.header-inner').waypoint('sticky', {
        offset: 0
    });

    $(".widget_nav_menu li a").filter(function(){
        return $.trim($(this).html()) == '';
    }).hide();

    // Slider init   
    $('.back-slider-carousel').slick({
        centerPadding: '0px',
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
    });

    // collapse hidden
    $(function(){ 
        var navMain = $(".navbar-collapse"); // avoid dependency on #id
         // when you have dropdown inside navbar
         navMain.on("click", "a:not([data-toggle])", null, function () {
             navMain.collapse('hide');
        });
     });

    if($('.main-sec .back-grid__item').length) {
        $('.main-sec .back-grid__item').on('click', function(e) {
            $('body, section.elementor-section').addClass('back-remove-contact');
            e.stopPropagation();
        }); 
    }

    if($('.content__close').length) {
        $('.content__close').on('click', function(e) {
            $('body, section.elementor-section').removeClass('back-remove-contact');
            e.stopPropagation();
        }); 
    }
    
    // Offcanvas Js Here
    $(document).ready(function(){
        $(".menu-button, .close-button, .offwrap, .back-offcanvas").on('click', function() {
            $(".nav-toggle, .back-menu-offcanvas, .close-button, body").toggleClass("back-offcanvas-open");
        });
    });
    
    // video 
    if ($('.player').length) {
        $(".player").YTPlayer();
    }    

    $(".menu-area .navbar ul > li.menu-item-has-children").hover(
        function () {
            $(this).addClass('back-min');
        },
        function () {
            $(this).removeClass("back-min");
        }
    );


    $('.back_sticky_search_here').on('click', function(event) {        
        $('.sticky_form').slideToggle('show');
        $( '.sticky_form input' ).focus();
    });



    $('.sticky_form_search').on('click', function() {      
        $('body, html').removeClass('back-search-active').removeClass('back-search-close');
          if ($(this).hasClass('close-search')) {
          $('body, html').addClass('back-search-close');

        }
        else {
          $('body, html').addClass('back-search-active');
        }
        return false;
    });

    // Mouse Pointer Here

    if ($('.pointer-wrap').length) {
        const cursor = cursorDot({
            diameter: parseInt(pointer_data.diameter),
            borderWidth: parseInt(pointer_data.border_width),
            borderColor: String(pointer_data.pointer_border),
            easing: parseInt(pointer_data.speed),
            background: String(pointer_data.pointer_bg)           
        })
        cursor.over("a", {
            scale: parseFloat(pointer_data.scale)
        });
    }


    //One page menu js here
    if ($('.nav').length) {
        $('.menu li:first-child, .sidenav li:first-child').addClass('active');
        $('.menu li a, .sidenav a').on('click', function(){
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
              $('.menu li, .sidenav li').removeClass('active');
              $(this).parent('li').addClass('active');
              if (target.length) {
                $('html, body').animate({
                  scrollTop: (target.offset().top - 70)
                }, 1000, "easeInOutExpo");
                return false;
              }
            }
        });

        var navChildren = $(".menu li.menu-item").children("a");
        var aArray = [];
        for (var i = 0; i < navChildren.length; i++) {
            var aChild = navChildren[i];
            var ahref = $(aChild).attr('href');
            aArray.push(ahref);
        }
    }

    $('.menu li a').on('click', function () {
        $('.back-nav-container').removeClass('nav-active-menu-container')
    });


    $('.menu li a').on('click', function () {
        $('.back-menu-wrap-offcanvas').removeClass('back-offcanvas-open');
        $('body').removeClass('back-offcanvas-open')
    });


    $(function(){ 
        $( "ul.children" ).addClass( "sub-menu" );
    });

    $(".back-products-grid .product-btn .button").addClass("glyph-icon flaticon-shopping-bag");

    // Portfolio Single Carousel
    if ($('.portfolio-carousel').length) {
        $('.portfolio-carousel').owlCarousel({
            loop: true,
            nav:true,
            autoHeight:true,
            items:1
        })
    }

    
     //Videos popup jQuery activation code
    $('.popup-videos').magnificPopup({
        disableOn: 10,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    //type writer
    $(".back-banner .cd-words-wrapper p:first-child").addClass("is-visible");


    //CountDown Timer Here
    var CountTimer = $('.CountDownTimer');
    if(CountTimer.length){ 
        $(".CountDownTimer").TimeCircles({
            fg_width: 0.030,
            bg_width: 0.8,
            circle_bg_color: "#ffffff",
            circle_fg_color: "#ffffff",
            time: {
                Days:{
                    text: countdown_data.day_text, 
                    color: "#fff"
                },
                Hours:{
                    text: countdown_data.hour_text, 
                    color: "#fff"
                },
                Minutes:{
                    text: countdown_data.sec_text, 
                    color: "#fff"
                },
                Seconds:{
                    text: countdown_data.min_text, 
                    color: "#fff"
                }
            }
        }); 
    }

       
    // Sticky Sidebar Js Here
    $('.contents-sticky, .sticky-sidebar').theiaStickySidebar({
        additionalMarginTop: 160,
        additionalMarginBottom: 20,
    });


    //Preloader js here
    $(window).on( 'load', function() {
        $("#back__preloader").delay(400).fadeOut(300);
        $("#back__preloader").delay(400).fadeOut(300);
    })

    // image loaded portfolio init
    $('.grid').imagesLoaded(function() {
        $('.portfolio-filter').on('click', 'button', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        var $grid = $('.grid').isotope({

            animationOptions: {
             duration: 750,
             easing: 'linear',
             queue: false
           },

            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-item',
            }
        });
    });
            
    // portfolio Filter
    $('.portfolio-filter button').on('click', function(event) {
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        event.preventDefault();
    });

        
    // Counter Up Js Here
    $('.back-counter').counterUp({
        delay: 20,
        time: 1500
    });

    
    // Scroll Top Here
    var win=$(window);
    var totop = $('#scrollUp');    
    win.on('scroll', function() {
        if (win.scrollTop() > 150) {
            totop.fadeIn();
        } else {
            totop.fadeOut();
        }
    });
    totop.on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    });   


    // Children Sub Here
    $(function(){ 
        $( "ul.children" ).addClass( "sub-menu" );
    });    
    
    $( ".comment-body, .comment-respond" ).wrap( "<div class='comment-full'></div>" ); 
    $('.back-heading .description p:empty').remove();
    
    //woocommerce Quantity Style Here

    if ( ! String.prototype.getDecimals ) {
          String.prototype.getDecimals = function() {
              var num = this,
                  match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
              if ( ! match ) {
                  return 0;
              }
              return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
          }
      }
    // Quantity "plus" and "minus" buttons
    $( document.body ).on( 'click', '.plus, .minus', function() {
        var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr( 'max' ) ),
            min         = parseFloat( $qty.attr( 'min' ) ),
            step        = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( $( this ).is( '.plus' ) ) {
            if ( max && ( currentVal >= max ) ) {
                $qty.val( max );
            } else {
                $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
            }
        } else {
            if ( min && ( currentVal <= min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
            }
        }

        // Trigger Change Event Here
        $qty.trigger( 'change' );
    });

})(jQuery);  
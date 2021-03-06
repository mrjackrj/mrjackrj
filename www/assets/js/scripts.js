/*
 MR Jack - Assistência Técnica
*/

;(function () {

    "use strict"; // use strict to start

    $(document).ready(function () {


        /* === Preloader === */
        $("#preloader").delay(200).fadeOut("slow");


        /* === Alternate menu appear === */
        $("#matrox-menu-alt").html('<ul class="menuzord-menu">' + $("#menu-list").html() + "</ul>");


        /* === Matrox Mega Menu === */
        jQuery("#matrox-menu, #matrox-menu-alt").menuzord({
            indicatorFirstLevel: "<i class='fa fa-angle-down'></i>",
            indicatorSecondLevel: "<i class='fa fa-angle-right'></i>"
        });


        /* === nav sticky header === */
        var navBottom = $(".nav-bottom").offset();

        $(window).on('scroll', function () {
            var w = $(window).width();
            if ($(".nav-bottom").length == 0) {
                if (w > 768) {
                    if ($(this).scrollTop() > 1) {
                        $('header').addClass("sticky");
                    }
                    else {
                        $('header').removeClass("sticky");
                    }
                }
            } else {
                if (w > 768) {
                    if ($(this).scrollTop() > navBottom.top + 100) {
                        $('header').addClass("sticky");
                    }
                    else {
                        $('header').removeClass("sticky");
                    }
                }
            }
        });



        /* === sticky header alt === */
        $(window).on('scroll', function () {
            var w = $(window).width();
            if (w > 768) {
                if ($(this).scrollTop() > 1) {
                    $('.mainmenu').slideUp(function () {
                        $('.menu-appear-alt').css({position: "fixed", top: 0, left: 0, width: w, zIndex: 99999});
                        $('.menu-appear-alt').slideDown();
                    });

                }
                else {
                    $('.menu-appear-alt').slideUp(function () {
                        $('.menu-appear-alt').css({position: "relative", top: 0, left: 0, width: w, zIndex: 99999});
                        $('.mainmenu').slideDown();

                    });

                }
            }

            $(".nav-bottom").css("z-Index", 100000);

            if(navBottom) {
                if ($(window).scrollTop() > (navBottom.top)) {
                    $(".nav-bottom").css({"position": "fixed", "top": "0px", "left": "0px"});
                } else {
                    $(".nav-bottom").css({"position": "fixed", top: navBottom.top - $(window).scrollTop() + "px"});
                }
            }

        });



        /* === Search === */
        (function () {
            $('.search-trigger').on('click', function (e) {
                $('body').addClass('active-search');
            });

            $('.search-close').on('click', function (e) {
                $('body').removeClass('active-search');
            });
        }());


        /* === Page scrolling feature - requires jQuery Easing plugin === */

        $('a.page-scroll').on('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 60
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
        
        

        /* === Full Screen Banner === */
        $(window).on('resizeEnd', function () {
            $(".fullscreen-banner").height($(window).height());
        });

        $(window).resize(function () {
            if (this.resizeTO) clearTimeout(this.resizeTO);
            this.resizeTO = setTimeout(function () {
                $(this).trigger('resizeEnd');
            }, 300);
        }).trigger("resize");




        /* === Tab to Collapse === */
        if ($('.nav-tabs').length > 0) {
           $('.nav-tabs').tabCollapse();
        }


        /* === Detect IE version === */
        (function () {
            
            function getIEVersion() {
                var match = navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);
                return match ? parseInt(match[1], 10) : false;
            }

            if( getIEVersion() ){
                $('html').addClass('ie'+getIEVersion());
            }

        }());



        /* === Counter === */
        $('.counter-section').on('inview', function(event, visible, visiblePartX, visiblePartY) {
            if (visible) {
                $(this).find('.timer').each(function () {
                    var $this = $(this);
                    $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter));
                        }
                    });
                });
                $(this).off('inview');
            }
        });



        /* === Instagram Photo Feed === */

        /**
         * ### HOW TO CREATE A VALID INSTAGRAM ID TO USE: ###
         * You need your user name and your access token for use Instagram API. Login to Instagram https://www.instagram.com 
         * You can get your user ID from here: https://smashballoon.com/instagram-feed/find-instagram-user-id/
         * Get your access token from http://jelled.com/instagram/access-token and folow the instruction
         * You can also generate access token from here: http://instagram.pixelunion.net/.
         * Use your userId and accessToken as below instead!

         */


        if ($('#myinstafeed').length > 0) {
            var feed = new Instafeed({
                target: 'myinstafeed', //The ID of a DOM element you want to add the images to
                limit: 6,
                get: 'user',
                userId: 2963143209,
                accessToken: '2963143209.1677ed0.6cf28ac3f9c041759202e3e1af8baa46'
            });
            feed.run();
        }


        /* === magnificPopup === */
        if ($('.tt-lightbox').length > 0) {
            $('.tt-lightbox').magnificPopup({
                type: 'image',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                fixedContentPos: false
                // other options
            });
        }

        if ($('.popup-video').length > 0) {
            $('.popup-video').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }


        /* === Gallery Thumb Carousel === */
        if ($('.gallery-thumb').length > 0) {
            $('.gallery-thumb').flexslider({
                animation: "slide",
                controlNav: "thumbnails",
            });

        }

        /* === Circle Thumb Testimonial === */
        if ($('.circle-thumb').length > 0) {
            $('.circle-thumb').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        }

        /* === Square Thumb Testimonial === */
        if ($('.square-thumb').length > 0) {
            $('.square-thumb').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        }

        /* === Logo Thumb Testimonial === */
        if ($('.logo-thumb').length > 0) {
            $('.logo-thumb').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        }

        /* === Logo Thumb Right Testimonial === */
        if ($('.logo-thumb-right').length > 0) {
            $('.logo-thumb-right').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        }


        /* === Parallax Testimonial on agency demo === */
        if ($('.parallax-carousel').length > 0) {
            $('.parallax-carousel').flexslider({
                animation: "slide"
            });
        }


        /* === Quote Carousel === */
        if ($('.quote-carousel').length > 0) {

            $('.quote-carousel').owlCarousel({
                loop:true,
                autoHeight : true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
        }


        /* === Featured item carousel === */
        if ($('.featured-carousel').length > 0) {

            $('.featured-carousel').owlCarousel({
                loop:true,
                margin:12,

                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });
        }


        /* === Latest Blog Carousel === */
        if ($('.blog-carousel').length > 0) {

            $('.blog-carousel').owlCarousel({
                loop:true,
                margin:26,

                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });
        }




        /* === project carousel in digital agency demo === */
        if ($('.project-carousel').length > 0) {

            $('.project-carousel').owlCarousel({
                loop:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
        }



        /* === career carousel in digital agency demo === */
        if ($('.career-carousel').length > 0) {

            $('.career-carousel').owlCarousel({
                loop:true,
                autoPlay:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
        }



        /* === blogGrid === */
        if ($('#blogGrid').length > 0) {

            var $grid = $('#blogGrid').imagesLoaded( function() {
              // init Masonry after all images have loaded
              $grid.masonry({
                itemSelector: '.blog-grid-item',
              });
            });
        }


        /* === Progress Bar === */
        $('.progress').on('inview', function(event, visible, visiblePartX, visiblePartY) {
            if (visible) {
                $.each($('div.progress-bar'),function(){
                    $(this).css('width', $(this).attr('aria-valuenow')+'%');
                });
                $(this).off('inview');
            }
        });


        /* ======= Contact Form ======= */
        $('#contactForm').on('submit',function(e){

            e.preventDefault();

            var $action = $(this).prop('action');
            var $data = $(this).serialize();
            var $this = $(this);

            $this.prevAll('.alert').remove();

            $.post( $action, $data, function( data ) {

                if( data.response=='error' ){

                    $this.before( '<div class="alert alert-danger">'+data.message+'</div>' );
                }

                if( data.response=='success' ){

                    $this.before( '<div class="alert alert-success">'+data.message+'</div>' );
                    $this.find('input, textarea').val('');
                }

            }, "json");

        });


        /* ======= GOOGLE MAP ======= */
        if ($('#myMap').length > 0) {
            //set your google maps parameters
            var $latitude = -22.906658, //Visit http://www.latlong.net/convert-address-to-lat-long.html for generate your Lat. Long.
                $longitude = -43.177413,
                $map_zoom = 18 /* ZOOM SETTING */

            //google map custom marker icon 
            var $marker_url = 'assets/img/pin.png';

            //we define here the style of the map
            var style = [{
                "stylers": [{
                    "hue": "#03a9f4"
                }, {
                    "saturation": 10
                }, {
                    "gamma": 2.15
                }, {
                    "lightness": 12
                }]
            }];

            //set google map options
            var map_options = {
                center: new google.maps.LatLng($latitude, $longitude),
                zoom: $map_zoom,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                streetViewControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                styles: style
            }
            //inizialize the map
            var map = new google.maps.Map(document.getElementById('myMap'), map_options);
            //add a custom marker to the map                
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng($latitude, $longitude),
                map: map,
                visible: true,
                icon: $marker_url
            });

            var contentString = '<div id="mapcontent">' + '<p>MR Jack - Assistência Técnica <br> Av. Rio Branco, 156 loja 25 - std 12</p></div>';
            var infowindow = new google.maps.InfoWindow({
                maxWidth: 320,
                content: contentString
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
           
        }


        /* ======= Stellar for background scrolling ======= */
        if ($('.parallax-bg').length > 0) {
            $('.parallax-bg').imagesLoaded( function() {

                if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                 
                } else {

                    $(window).stellar({
                        horizontalScrolling: false,
                        verticalOffset: 0,
                        horizontalOffset: 0,
                        responsive: true,
                        hideDistantElements: true
                    });
                }
            });
        }


        /* ======= shuffle js ======= */
        $(window).on('load', function () {

            $('.portfolio-container').each(function(i, e){

                var ttGrid = $(this).find('.portfolio');
                var self = this;
                ttGrid.shuffle({
                    itemSelector: '.portfolio-item' // the selector for the items in the grid
                });

                /* reshuffle when user clicks button filter item */
                $(this).find('.portfolio-filter li').on('click',function (e) {
                    e.preventDefault();

                    // set active class
                    $(self).find('.portfolio-filter li').removeClass('active');
                    $(this).addClass('active');

                    // get group name from clicked item
                    var ttGroupName = $(this).attr('data-group');

                    // reshuffle grid
                    ttGrid.shuffle('shuffle', ttGroupName);
                });

            });

        });


        /* ======= Portfolio Slider ======= */
        $(window).on('load', function () {

            $('.portfolio-wrapper').each(function(i, e){

                var ttPortfolio = $(this).find('.portfolio-slider');

                var ttDirection = ttPortfolio.attr('data-direction');
                
                ttPortfolio.flexslider({
                    animation: "slide",
                    direction: ttDirection,
                    slideshowSpeed: 3000,
                    start:function(){
                        imagesLoaded($(".portfolio"),function(){
                            setTimeout(function(){
                                $('.portfolio-filter li:eq(0)').trigger("click");
                            },500);
                        });
                    }
                });

            });

        });


        /* ======= Portfolio Individual Gallery ======= */
        $('.portfolio-slider').each(function () { 
            var _items = $(this).find("li > a");
            var items = [];
            for (var i = 0; i < _items.length; i++) {
                items.push({src: $(_items[i]).attr("href"), title: $(_items[i]).attr("title")});
            }
            $(this).parent().find(".action-btn").magnificPopup({
                items: items,
                type: 'image',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                fixedContentPos: false,
                gallery: {
                    enabled: true
                }
            });
        });

    });


})(jQuery);


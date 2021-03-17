(function ($) {
    "use strict";
    $(document).ready(function () {

        /*---------------------------------------------------
            Gallery Filter Grid
        ----------------------------------------------------*/
        var Container = $('.gallery-area');
        Container.imagesLoaded(function () {
            var gallery = $('.gallery-button');
            gallery.on('click', 'button', function () {
                $(this).addClass('active').siblings().removeClass('active');
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            var $grid = $('.gallery-list').isotope({
                itemSelector: '.gallery-grid',
                masonry: {
                    columnWidth: 1
                }
            });

        });

        /*---------------------------------------------------
            Slider Carousel
        ----------------------------------------------------*/
        $('.slider.owl-carousel').owlCarousel({
            loop: true,
            navText: ['<i class="icofont icofont-simple-left"></i>', '<i class="icofont icofont-simple-right"></i>'],
            nav: true,
            autoplay: true,
            autoplayTimeout: 5000,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        });

        /*---------------------------------------------------
            Testimonial Carousel
        ----------------------------------------------------*/
        $('.testi-carousel').owlCarousel({
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1920: {
                    items: 1
                }
            }
        });

        /*---------------------------------------------------
            Gallery Carousel
        ----------------------------------------------------*/
        $('.gallery-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 2
                },
                1200: {
                    items: 2
                },
                1920: {
                    items: 2
                }
            }
        });

        /*---------------------------------------------------
            Partner Carousel
        ----------------------------------------------------*/
        $('.partners-list').owlCarousel({
            loop: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 4
                },
                991: {
                    items: 5
                },
                1200: {
                    items: 6
                },
                1920: {
                    items: 6
                }
            }
        });

        /*---------------------------------------------------
            Counter
        ----------------------------------------------------*/
        $('.counter-single h2').counterUp({
            delay: 10, // the delay time in ms
            time: 1000 // the speed time in ms
        });

        /*---------------------------------------------------
                Magnific PopUp
        ----------------------------------------------------*/
        $('.popup-img').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        /*---------------------------------------------------
            Ripple Effect
        ----------------------------------------------------*/
        $('.ripple-effect').ripples({
            resolution: 512,
            dropRadius: 20,
            perturbance: 0.04
        });

        // Automatic drops
        setInterval(function () {
            var $el = $('.ripple-effect');
            var x = Math.random() * $el.outerWidth();
            var y = Math.random() * $el.outerHeight();
            var dropRadius = 20;
            var strength = 0.04 + Math.random() * 0.04;

            $el.ripples('drop', x, y, dropRadius, strength);
        }, 400);

        /*---------------------------------------------------
            Color Switcher Option
        ----------------------------------------------------*/
        $(".switcher-inner .switcher-spinner").on('click', function (event) {
            event.preventDefault();
            if ($(this).hasClass("switcher-icon")) {
                $(".switcher").stop().animate({
                    left: "-160px"
                }, 500);
            } else {
                $(".switcher").stop().animate({
                    left: "0px"
                }, 500);
            }
            $(this).toggleClass("switcher-icon");
            return false;
        });
        /*---------------------------------------------------
            Color Switcher Colors
        ----------------------------------------------------*/

        function colorPrimary() {
            $('body').attr('class', 'color-primary');
        }

        function colorOne() {
            $('body').attr('class', 'color-one');
        }

        function colorTwo() {
            $('body').attr('class', 'color-two');
        }

        function colorThree() {
            $('body').attr('class', 'color-three');
        }

        function colorFour() {
            $('body').attr('class', 'color-four');
        }

        function colorFive() {
            $('body').attr('class', 'color-five');
        }

        function colorSix() {
            $('body').attr('class', 'color-six');
        }

        function colorSeven() {
            $('body').attr('class', 'color-seven');
        }

        function colorEight() {
            $('body').attr('class', 'color-eight');
        }

        function colorNine() {
            $('body').attr('class', 'color-nine');
        }

        function colorTen() {
            $('body').attr('class', 'color-ten');
        }

        function colorEleven() {
            $('body').attr('class', 'color-eleven');
        }


        $('.switcher-colors span.color-primary').on('click', colorPrimary);
        $('.switcher-colors span.color-one').on('click', colorOne);
        $('.switcher-colors span.color-two').on('click', colorTwo);
        $('.switcher-colors span.color-three').on('click', colorThree);
        $('.switcher-colors span.color-four').on('click', colorFour);
        $('.switcher-colors span.color-five').on('click', colorFive);
        $('.switcher-colors span.color-six').on('click', colorSix);
        $('.switcher-colors span.color-seven').on('click', colorSeven);
        $('.switcher-colors span.color-eight').on('click', colorEight);
        $('.switcher-colors span.color-nine').on('click', colorNine);
        $('.switcher-colors span.color-ten').on('click', colorTen);
        $('.switcher-colors span.color-eleven').on('click', colorEleven);

    })


    /*---------------------------------------------------
        Click To Top Button
    ----------------------------------------------------*/
    $(document).on('click', '.totop a[href=#top]', function () {
        $('body,html').animate({
            scrollTop: 0
        }, 600);

        return false;

    });

    /*---------------------------------------------------
        Window Scroll
    ----------------------------------------------------*/
    $(window).on('scroll', function () {
        /* Parallax Background
        ----------------------------*/
        $('.parallax-area').scrolly({
            bgParallax: true
        });

        /* Click To Top Button Offset
        ----------------------------*/
        if ($(this).scrollTop() > 250) {
            $('.footer .totop').fadeIn();
        } else {
            $('.footer .totop').fadeOut();
        }

    });

    /*---------------------------------------------------
        Site Preloader
    ----------------------------------------------------*/
    $(window).on('load', function () {
        $('.site-preloader').fadeOut(100);
    });


}(jQuery));

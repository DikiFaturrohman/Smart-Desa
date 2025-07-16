var resizeId;
var openedSidePanel;
var bodyHasResponsiveNavigation = 0;

(function ($) {
    "use strict"

    // Page Preloader //
    $(window).on('load', function () {
        $('.fade-in').css({
            position: 'relative',
            opacity: 0,
            top: -14
        });
        setTimeout(function () {
            $('#preload-content').fadeOut(400, function () {
                $('#preload').fadeOut(800);
                setTimeout(function () {
                    $('.fade-in').each(function (index) {
                        $(this).delay(400 * index).animate({
                            top: 0,
                            opacity: 1
                        }, 800);
                    });
                }, 800);
            });
        }, 400);
    });

    // Parallax //
    $("#parallax").each(function () {
        $('#parallax,header .container').parallax({
            scalarX: 25,
            scalarY: 15,
            frictionX: 0.1,
            frictionY: 0.1,
            calibrateX: false,
        });
    });

    // Form Validation & Send Mail code
    if (typeof ($('.contactForm form')) != 'undefined') {
        $.each($('.contactForm form'), function (index, el) {
            var cform = $(el),
                cResponse = $('<div class="cf_response"></div>');
            cform.prepend(cResponse);
            cform.h5Validate();

            cform.submit(function (e) {
                e.preventDefault();
                if (cform.h5Validate('allValid')) {
                    cResponse.hide();
                    $.post(
                        $(this).attr('action'),
                        cform.serialize(),
                        function (data) {
                            cResponse.html(data).fadeIn('fast');
                            if (data.match('success') != null) {
                                cform.get(0).reset();
                            }
                        }
                    ); // end post
                }
                return false;
            });
        });
    };




    //  Modal windows //	
    if ($(".tse-scrollable").length) {
        $(".tse-scrollable").TrackpadScrollEmulator();
    }

    $(".open-side-panel, [data-toggle=modal]").on("click", function (e) {
        e.preventDefault();
        $("body").addClass("show-panel");
        $($(this).attr("href")).addClass("show-it");
        $(this).addClass("is-active");
        openedSidePanel = $($(this).attr("href"));
    });

    $(".backdrop, .modal-backdrop, .modal .close, .close-panel").on("click", function (e) {
        $(".open-side-panel").removeClass("is-active");
        if ($("body").hasClass("show-panel")) {
            $("body").removeClass("show-panel");
            openedSidePanel.removeClass("show-it");
        }
    });

    $(document).keydown(function (e) {
        switch (e.which) {
            case 27: // ESC
                $(".close-panel").trigger("click");
                break;
        }
    });

    $(".modal").on("hide.bs.modal", function (e) {
        if ($("body").hasClass("show-panel")) {
            $("body").removeClass("show-panel");
        }
    });

    $(".nav-btn").on("click", function (e) {
        $(".nav-btn-only").toggleClass("show-nav");
    });


    // Count Down //
    if ($(".count-down").length) {
        var year = parseInt($(".count-down").attr("data-countdown-year"), 10);
        var month = parseInt($(".count-down").attr("data-countdown-month"), 10) - 1;
        var day = parseInt($(".count-down").attr("data-countdown-day"), 10);
        $(".count-down").countdown({
            until: new Date(year, month, day),
            padZeroes: true
        });
    }

})(jQuery);




$(document).ready(function ($) {
    "use strict"

    // Device Detection //

    // Mobile Detect
    var isMobile = /iPhone|iPad|iPod|Android|BlackBerry|BB10|Silk|Mobi/i.test(self._navigator && self._navigator.userAgent);
    var isTouch = !!(('ontouchend' in window) || (self._navigator && self._navigator.maxTouchPoints > 0) || (self._navigator && self._navigator.msMaxTouchPoints > 0));




    // Background Ripple // 
    var ripple = $('#page-ripple');

    if (ripple.length && !isMobile && !isTouch) {
        ripple.ripples({
            resolution: 512,
            dropRadius: 10, //px
            perturbance: 0.04,
            interactive: true
        });

        setInterval(function () {
            var $el = ripple;
            var x = Math.random() * $el.outerWidth();
            var y = Math.random() * $el.outerHeight();
            var dropRadius = 20;
            var strength = 0.04 + Math.random() * 0.04;

            $el.ripples('drop', x, y, dropRadius, strength);
        }, 3000);
    }


    // Responsive Video Scaling //
    if ($(".video").length > 0) {
        $(this).fitVids();
    }






    // Magnific Popup //
    if ($('.image-popup').length > 0) {
        $('.image-popup').magnificPopup({
            type: 'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            overflowY: 'scroll'
        });
    }

    if ($('.video-popup').length > 0) {
        $('.video-popup').magnificPopup({
            type: 'iframe',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            overflowY: 'scroll',
            iframe: {
                markup: '<div class="mfp-iframe-scaler">' +
                    '<div class="mfp-close"></div>' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                    '</div>',
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'http://youtube.com/embed/%id%?autoplay=1'
                    },
                    vimeo: {
                        index: 'vimeo.com/',
                        id: '/',
                        src: 'http://player.vimeo.com/video/%id%?autoplay=1'
                    }
                },
                srcAction: 'iframe_src'
            }
        });
    }

    if ($(".count-down").length) {
        var year = parseInt($(".count-down").attr("data-countdown-year"), 10);
        var month = parseInt($(".count-down").attr("data-countdown-month"), 10) - 1;
        var day = parseInt($(".count-down").attr("data-countdown-day"), 10);
        $(".count-down").countdown({
            until: new Date(year, month, day),
            padZeroes: true
        });
    }



    $(".bg-transfer").each(function () {
        $(this).css("background-image", "url(" + $(this).find("img").attr("src") + ")");
    });

    if ($("body").hasClass("nav-btn-only")) {
        bodyHasResponsiveNavigation = 1;
    }

    responsiveNavigation();
    initializeOwl();

});


$(window).load(function () {
    $(".animate").addClass("in");

});

$(window).resize(function () {
    clearTimeout(resizeId);
    resizeId = setTimeout(doneResizing, 250);
});



// Do after resize //
function doneResizing() {
    responsiveNavigation();
    $(".tse-scrollable").TrackpadScrollEmulator("recalculate");
}


// Owl-Carousel //
function initializeOwl() {
    if ($(".owl-carousel").length) {
        $(".owl-carousel").each(function () {

            var items = parseInt($(this).attr("data-owl-items"), 10);
            if (!items) items = 1;

            var nav = parseInt($(this).attr("data-owl-nav"), 2);
            if (!nav) nav = 0;

            var dots = parseInt($(this).attr("data-owl-dots"), 2);
            if (!dots) dots = 0;

            var center = parseInt($(this).attr("data-owl-center"), 2);
            if (!center) center = 0;

            var loop = parseInt($(this).attr("data-owl-loop"), 2);
            if (!loop) loop = 0;

            var margin = parseInt($(this).attr("data-owl-margin"), 2);
            if (!margin) margin = 0;

            var autoWidth = parseInt($(this).attr("data-owl-auto-width"), 2);
            if (!autoWidth) autoWidth = 0;

            var navContainer = $(this).attr("data-owl-nav-container");
            if (!navContainer) navContainer = 0;

            var autoplay = $(this).attr("data-owl-autoplay");
            if (!autoplay) autoplay = 0;

            var fadeOut = $(this).attr("data-owl-fadeout");
            if (!fadeOut) fadeOut = 0;
            else fadeOut = "fadeOut";

            $(this).owlCarousel({
                navContainer: navContainer,
                animateOut: fadeOut,
                autoplaySpeed: 2000,
                autoplay: autoplay,
                autoheight: 1,
                center: center,
                loop: loop,
                margin: margin,
                autoWidth: autoWidth,
                items: items,
                nav: nav,
                dots: dots,
                autoHeight: true,
                navText: []
            });
        });

    }
}

function responsiveNavigation() {

    if (bodyHasResponsiveNavigation == 0) {
        if (!viewport.is('lg')) {
            $("body").addClass("nav-btn-only");
        } else {
            $("body").removeClass("nav-btn-only");
        }
    }
}

var viewport = (function () {
    var viewPorts = ['xs', 'sm', 'md', 'lg'];

    var viewPortSize = function () {
        return window.getComputedStyle(document.body, ':before').content.replace(/"/g, '');
    };

    var is = function (size) {
        if (viewPorts.indexOf(size) == -1) throw "no valid viewport name given";
        return viewPortSize() == size;
    };

    var isEqualOrGreaterThan = function (size) {
        if (viewPorts.indexOf(size) == -1) throw "no valid viewport name given";
        return viewPorts.indexOf(viewPortSize()) >= viewPorts.indexOf(size);
    };

    return {
        is: is,
        isEqualOrGreaterThan: isEqualOrGreaterThan
    }




})(jQuery);
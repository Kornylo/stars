/*-----------------------------------------------------------------------------------*/
/* 		Mian Js Start
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(jQuery) {
    "use strict"
    /*-----------------------------------------------------------------------------------*/
    /*    Parallax
/*-----------------------------------------------------------------------------------*/

    /*-----------------------------------------------------------------------------------*/
    /*    STICKY NAVIGATION
/*-----------------------------------------------------------------------------------*/
    jQuery(document).ready(function() {
        jQuery(".sticky").sticky({
            topSpacing: 1
        });
    });
    /*-----------------------------------------------------------------------------------*/
    /* 	ANIMATION
/*-----------------------------------------------------------------------------------*/
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 100, // distance to the element when triggering the animation (default is 0)
        mobile: false // trigger animations on mobile devices (true is default)
    });
    wow.init();
    /*-----------------------------------------------------------------------------------*/
    /* 	LOADER
/*-----------------------------------------------------------------------------------*/
    jQuery(window).load(function() {
        jQuery("#loader").delay(500).fadeOut("slow");
        jQuery('#wrap').css('opacity', '1');
    });
    /*-----------------------------------------------------------------------------------*/
    /* 	height control for About
/*-----------------------------------------------------------------------------------*/
    function sinchroheight() {
        var sheight = jQuery('#about .col-md-6:nth-child(2)').height();
        var swidth = jQuery(document).width();
        if (sheight < 400 || swidth < 504) {
            jQuery('#about .col-md-6:nth-child(2)').delay(500).css('height', ' auto').css('padding-top', '80px').css('padding-bottom', '80px');
            jQuery('#about .col-md-6:nth-child(1)').delay(500).css('height', (sheight + 160) + 'px');
        } else {
            jQuery('#about .col-md-6:nth-child(2)').delay(500).css('height', sheight).css('padding', '0');
        }

    }
    jQuery(window).load(function() {
        sinchroheight();
    });
    jQuery(window).resize(function() {
        sinchroheight();
    });
    /*-----------------------------------------------------------------------------------*/
    /*  ISOTOPE PORTFOLIO
/*-----------------------------------------------------------------------------------*/
    jQuery(document).ready(function($) {
        $(".portfolio .items img").one("load", function() {

            var jQuerycontainer = jQuery('.portfolio .items');
            jQuerycontainer.isotope({
                layoutMode: 'packery',
                itemSelector: '.item',
                percentPosition: true
            });


            jQuery('.filter li a').click(function() {
                jQuery('.filter li a').removeClass('active');
                jQuery(this).addClass('active');
                var selector = jQuery(this).attr('data-filter');
                jQuerycontainer.isotope({
                    filter: selector
                });
                return false;
            });

        }).each(function() {
            if (this.complete) $(this).load();
        });
    });

    /*-----------------------------------------------------------------------------------*/
    /* 		Portfolio PopUp
/*-----------------------------------------------------------------------------------*/
    jQuery('#popups').magnificPopup({
        delegate: 'a.popi',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    /*-----------------------------------------------------------------------------------*/
    /*    LOADER
/*-----------------------------------------------------------------------------------*/
    jQuery(document).ready(function() {
        var timer;
        //calling jPreLoader function with properties
        jQuery('body').jpreLoader({
                splashID: "#jSplash",
                splashVPos: "0%",
                loaderVPos: "0%",
                splashFunction: function() { //passing Splash Screen script to jPreLoader
                    timer = setInterval(function() {
                        //splashRotator();
                    }, 3000);
                }
            },
            function() { //jPreLoader callback function
                clearInterval(timer);
                jQuery('').animate({
                    "top": 0
                }, 800, function() {
                    jQuery('#wrapper').fadeIn(1000);
                });
            });
    });
    
    jQuery(function() {
        jQuery('.inner').hide();
        jQuery('.hover').hover(function() {
                jQuery('.inner').show();
                jQuery('.back').css('background', 'none');
            },
            function() {
                jQuery('.inner').hide();
                jQuery('.back').css('background', '');
            });

    });
});
/*====================================
            ON DOM READY
====================================*/
jQuery(function() {
    // Toggle Nav on Click
    jQuery('.toggle-nav').click(function() {
        // Calling a function in case you want to expand upon this.
        toggleNav();
    });
});
/*========================================
            CUSTOM FUNCTIONS
========================================*/
function toggleNav() {
    if (jQuery('#wrap').hasClass('show-nav')) {
        // Do things on Nav Close
        jQuery('#wrap').removeClass('show-nav');
    } else {
        // Do things on Nav Open
        jQuery('#wrap').addClass('show-nav');
    }
    //jQuery('#site-wrapper').toggleClass('show-nav');
}
// Search Form Class
jQuery(document).ready(function() {
    jQuery("#s").addClass("form-control");
    jQuery("#s").attr("placeholder", "Search on site");
    jQuery(".wpcf7-text").addClass("form-control");
    jQuery(".wpcf7-email").addClass("form-control");
    jQuery(".wpcf7-textarea").addClass("form-control");
});

//Tabs
jQuery(document).ready(function() {
    jQuery(".tab-content").find("#tab1").addClass("active");
    jQuery(".tab-content").find("#tab1").addClass("in");
});

// 4/5
jQuery(document).ready(function() {
    fourfifths();
});
jQuery(window).scroll(function() {
    fourfifths();
});
jQuery(window).resize(function() {
    fourfifths();
});

function fourfifths() {
    var sheight = jQuery(window).height();
    if (sheight > 700) {
        jQuery('.four-fifths').height(((sheight) / 5) * 4);
        jQuery('.four-fifths .bnr-text').css('padding', '0 15%');
    } else {
        jQuery('.four-fifths').height('inherit');
        jQuery('.four-fifths .bnr-text').css('padding', '120px 15% 80px');
    }
}

/* COVER VIDEO FRAME */
var min_w = 300; // minimum video width allowed
var vid_w_orig; // original video dimensions
var vid_h_orig;
jQuery(function() { // runs after DOM has loaded
    vid_w_orig = parseInt(jQuery('video').attr('width'));
    vid_h_orig = parseInt(jQuery('video').attr('height'));
    jQuery('#debug').append("<p>DOM loaded</p>");
    jQuery(window).resize(function() {
        resizeToCover();
    });
    jQuery(window).trigger('resize');
});

function resizeToCover() {
    // set the video viewport to the window size
    jQuery('#video-viewport').width(jQuery(window).width());
    jQuery('#video-viewport').height(jQuery(window).height());
    // use largest scale factor of horizontal/vertical
    var scale_h = jQuery(window).width() / vid_w_orig;
    var scale_v = jQuery(window).height() / vid_h_orig;
    var scale = scale_h > scale_v ? scale_h : scale_v;
    // don't allow scaled width < minimum video width
    if (scale * vid_w_orig < min_w) {
        scale = min_w / vid_w_orig;
    };
    // now scale the video
    jQuery('video').width(scale * vid_w_orig);
    jQuery('video').height(scale * vid_h_orig);
    // and center it by scrolling the video viewport
    jQuery('#video-viewport').scrollLeft((jQuery('video').width() - jQuery(window).width()) / 2);
    jQuery('#video-viewport').scrollTop((jQuery('video').height() - jQuery(window).height()) / 2);
    // debug output
    jQuery('#debug').html("<p>win_w: " + jQuery(window).width() + "</p>");
    jQuery('#debug').append("<p>win_h: " + jQuery(window).height() + "</p>");
    jQuery('#debug').append("<p>viewport_w: " + jQuery('#video-viewport').width() + "</p>");
    jQuery('#debug').append("<p>viewport_h: " + jQuery('#video-viewport').height() + "</p>");
    jQuery('#debug').append("<p>video_w: " + jQuery('video').width() + "</p>");
    jQuery('#debug').append("<p>video_h: " + jQuery('video').height() + "</p>");
    jQuery('#debug').append("<p>vid_w_orig: " + vid_w_orig + "</p>");
    jQuery('#debug').append("<p>vid_h_orig: " + vid_h_orig + "</p>");
    jQuery('#debug').append("<p>scale: " + scale + "</p>");
};

/* BURGER 2016 */
// Close all menus if selected item

jQuery('.menu-button').click(function() {
    if (!jQuery(this).hasClass('toggled')) {
        togglon(this);
    } else {
        toggloff(this);
    }
});



function toggloff(item) {
    jQuery(item).find('.burgx3').stop().transition({
        rotate: "+=135",
        "margin-top": "2px"
    });
    jQuery(item).find('.burgx2').transition({
        opacity: "1"
    }, "fast");
    jQuery(item).find('.burgx').stop().transition({
        rotate: "-=135",
        "margin-top": "16px"
    });
    jQuery(item).removeClass('toggled');
}


function togglon(item) {
    jQuery(item).find('.burgx3').stop().transition({
        rotate: "45",
        "margin-top": "9px"
    });
    jQuery(item).find('.burgx2').stop().transition({
        opacity: "0"
    }, "fast");
    jQuery(item).find('.burgx').stop().transition({
        rotate: "-45",
        "margin-top": "9px"
    });
    jQuery(item).addClass('toggled');
}

jQuery('.nav .menu-item a').click(function() {
    jQuery('#wrap').removeClass('show-nav');
    jQuery('.navbar-collapse').removeClass('in');
    if (jQuery('.toggle-nav.menu-button').hasClass('toggled')) {
        toggloff(jQuery('.toggle-nav.menu-button'));
    }
    if (jQuery('.toggle-sticky-nav.menu-button').hasClass('toggled')) {
        toggloff(jQuery('.toggle-sticky-nav.menu-button'));
    }
});
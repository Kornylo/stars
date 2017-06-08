

/*-----------------------------------------------------------------------------------*/
/*    NAVIGATION SMOOTH SCROLL
 /*-----------------------------------------------------------------------------------*/
jQuery('.menu nav ul a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        || location.hostname == this.hostname) {
        var target = jQuery(this.hash);
        var href = jQuery.attr(this, 'href');
        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
        if (target.length) {
            jQuery('html,body').animate({
                scrollTop: target.offset().top
            }, 1000, function () {
                window.location.hash = href;
            });
            return false;
        }
    }
});
var navLinkIDs = "";
jQuery('.menu nav ul a[href*="#"]:not([href="#"])').each(function(index) {
    if(navLinkIDs != "") {
        navLinkIDs += ", ";
    }
    navLinkIDs += jQuery('.menu nav ul a[href*="#"]:not([href="#"])').eq(index).attr("href");
});
if( navLinkIDs ) {
    jQuery(navLinkIDs).waypoint(function(direction) {
        if(direction=='down') {
            jQuery('.menu nav ul a').parent().removeClass("active");
            jQuery('.menu nav ul a[href="#'+jQuery(this)+'"]').parent().addClass("active");
        }
    }, { offset: 70 });
    jQuery(navLinkIDs).waypoint(function(direction) {
        if(direction=='up') {
            jQuery('.menu nav ul a').parent().removeClass("active");
            jQuery('.menu nav ul a[href="#'+jQuery(this)+'"]').parent().addClass("active");
        }
    }, {  offset: function() {
        return -jQuery(this).height() + 20;
    } });
}
/* fix close response for contact form */
jQuery (".overlay-close").click(function() {
  jQuery("div.wpcf7-mail-sent-ok").removeAttr('style');
  // clear cf7 error msg
  jQuery(".wpcf7-not-valid").removeClass('wpcf7-not-valid');
  jQuery(".wpcf7-validation-errors").removeClass('wpcf7-validation-errors').css('display', 'none');
});

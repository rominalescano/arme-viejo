//affect
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 50) {            
        jQuery(".site-header").addClass("effect");
    } else {
        jQuery(".site-header").removeClass("effect");            
    }
    
});
jQuery(document).ready(function () {
    // Hamburger Click
    jQuery(".hamburger svg").click(function (e) { 
        jQuery(".hamburger svg").toggleClass("active");
        jQuery("html, body").toggleClass("overflow-hidden");
        jQuery("body").toggleClass("menu-open");
        jQuery(".full-screen-header-wrap").slideToggle();
    });    
    
    // Class add on vertical scroll for sticky class
    jQuery(window).scroll(function() {    
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 150) {
            jQuery("header").addClass("sticky");
        } else {
            jQuery("header").removeClass("sticky");
        }
    }); 

    // get list item content in attr after for toggled menu's list item style
    $( ".toggled-menu-ul > li > .a-Wrap > a" ).each(function() {
        $( this ).attr("data-item",  jQuery(this).text());
    });
});
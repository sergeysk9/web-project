$(document).ready(function() {

    
    /* For the fixed navigation */
    $('.js--start-fixed').waypoint(function(direction) {
        if (direction == "down") {
            $('nav').addClass('fixed');
        } else {
            $('nav').removeClass('fixed');
        }
    }, {
      offset: '60px;'
    });


    /* Mobile navigation */
    $('.js--nav-icon').click(function() {
        var nav = $('.js--top-nav');
        var icon = $('.js--nav-icon i');
        
        nav.slideToggle(200);

        if (icon.hasClass('ion-navicon-round')) {
            icon.addClass('ion-close-round');
            icon.removeClass('ion-navicon-round');
        } else {
            icon.addClass('ion-navicon-round');
            icon.removeClass('ion-close-round');
        }        
    });
});



var shrinkHeader = 100;
$(document).ready(function() {
$(window).scroll(function() {
    
    
    if ( $(this).scrollTop() > shrinkHeader ) {
       
 
        if ($('#nameLogo').is(':visible') === true) {
            $('#nameLogo').stop().hide('slide', {direction: 'left'}, 200); 
        }
        $('#header').addClass('shrink');
        
          

    } else {
        if ($('#nameLogo').is(':visible') === false) {
            $('#nameLogo').stop().show('slide', {direction: 'left'}, 200); 
        }
        $('#header').removeClass('shrink');

    }
    
});
});
    
/*
$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }
});

*/



/*
$(function(){
    var shrinkHeader = 100;
    $(window).scroll(function() {
    var scroll = getCurrentScroll();
    if ( scroll >= shrinkHeader ) {
        $('#logo-large').fadeOut("fast", function() {
            $('#logo-small').css({'display': 'block'});
            $('#header').addClass('shrink');
        });
    }
    else {
        $('#logo-small').fadeOut("fast", function() {
            $('#logo-large').fadeIn("fast");
            $('#header').removeClass('shrink');
        });
    }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});

*/
//PLEASE NOTE: this document is full of general js commenting for learning purposes. 

var currentScroll = 0; 
var triggerHeight = 100; 
var counter = 0; 

function checkWidth(){
    var windowSize = $(window).width();

    if (windowSize < 961){
        console.log("test");
        counter = 0; 
        $('#treeLogo').removeClass('grow');
        $('#nameLogo').removeClass('grow'); 
    }
}

//code within this block will only execute when the DOM is ready
$(document).ready(function(){
    
    //jump to top of window on refresh
    $(this).scrollTop(0); 
    counter = 0; 
    checkWidth();
    //call the checkWidth function when the window gets resized
    $(window).resize(checkWidth);
    
    $(window).scroll(function() {
        currentScroll = $(this).scrollTop();
        if ( currentScroll >= triggerHeight ) {
            if ( counter === 0 ) {
                $('#header').addClass('shrink');
                $('#treeLogo').addClass('shrink'); 
                $('#nameLogo').addClass('shrink');
                $('#menu').addClass('shrink');
                counter += 1;  
            }
            else {
                $('#header').addClass('shrink');
                $('#treeLogo').removeClass('grow');
                $('#nameLogo').removeClass('grow');
                $('#treeLogo').addClass('shrink'); 
                $('#nameLogo').addClass('shrink');
                $('#menu').addClass('shrink');
            }
        } else {
            if ( counter !== 0 ) {
                $('#header').removeClass('shrink');
                $('#treeLogo').removeClass('shrink');
                $('#nameLogo').removeClass('shrink');
                $('#treeLogo').addClass('grow'); 
                $('#nameLogo').addClass('grow');
                $('#menu').removeClass('shrink');
            }
        }
    });  
    
    $('#primary-nav-trigger').on('click', function(){
		$('#menu-icon').toggleClass('is-clicked'); 	
		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('#primary-nav').hasClass('is-visible') ) {
			$('#primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
			});
		} else {
			$('#primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
			});	
		}
	});
    
    $('#primary-nav a[href^=#]').on('click', function(event){     
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
		$('#menu-icon').toggleClass('is-clicked'); 
        
		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('#primary-nav').hasClass('is-visible') ) {
			$('#primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
			});
		} else {
			$('#primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
			});	
		}
	});
    
    $('a[href^=#]').on('click', function(event){     
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
    });
});
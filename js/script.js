var triggerHeight = 100;
var currentScroll = 0; 


$(document).ready(function() {
    $(this).scrollTop(0);
    var $window = $(window); 
    var counter = 0; 
    projectSlider(); 
    
    function checkWidth(){
        var windowSize = $window.width(); 
        if ( windowSize < 961 ){
            counter = 0; 
            $('treeLogo').removeClass('grow');
            $('#nameLogo').removeClass('grow');  
        }
    }
    //check on load
    checkWidth(); 
    //add event listener: 
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
    
    
  function projectSlider(){
      $('.thumb').click(function() {
            $('.work-slider').css('left', '-100%');
            $('.work-container').show();
      });
      
      $('.projectBack').click(function() {
            $('.work-slider').css('left', '0%');
            $('.work-container').hide();
      });
  }
    
    $('.primary-nav-trigger').on('click', function(){
		$('.menu-icon').toggleClass('is-clicked'); 	
		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('.primary-nav').hasClass('is-visible') ) {
			$('.primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$('.primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').addClass('overflow-hidden');
			});	
		}
	});
    
    $('.primary-nav a[href^=#]').on('click', function(event){     
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
		$('.menu-icon').toggleClass('is-clicked'); 
        
        
		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('.primary-nav').hasClass('is-visible') ) {
			$('.primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$('.primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').addClass('overflow-hidden');
			});	
		}
        
	});
    
    $('a[href^=#]').on('click', function(event){     
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
    });
    
});
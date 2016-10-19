var currentScroll = 0; 
var triggerHeight = 100; 
var counter = 0; 

function checkWidth(){
    var windowSize = $(window).width();

    if (windowSize < 961){
        counter = 0; 
        $('#treeLogo').removeClass('grow');
        $('#nameLogo').removeClass('grow'); 
    }
}

function projectSlider(){
    $('.thumb').click(function(){
        $('.project-slider').css('left','-100%');
        $('.project-container').show();
        $('#projects-head').css('font-size', '20');
        $('#projects-head').text("BACK TO PROJECTS");
        $('#projects-head').wrap(function() {
            return "<a href='#jumpto-Projects'/>";
        });
        $('#project-return').show();
    });
    $('#project-return').click(function(){
        $('.project-slider').css('left','0%');
        $('.project-container').hide();
        $('#projects-head').css('font-size', '30');
        $('#projects-head').text("PROJECTS");
        $("#projects-head").unwrap();
        $('#project-return').hide();
        $('#projects-head').css('opacity', '1');
    });
    $('#projects-head').click(function() {
        if ($('#projects-head').text() == "BACK TO PROJECTS") {
            $('.project-slider').css('left','0%');
            $('.project-container').hide();
            $('#projects-head').css('font-size', '30');
            $('#projects-head').text("PROJECTS");
            $("#projects-head").unwrap();
            $('#project-return').hide();
            $('#projects-head').css('opacity', '1');
        }
    });
    
    $('#projects-head').hover(function(){
        if ($('#projects-head').text() == "BACK TO PROJECTS") {
            $('#projects-head').animate({opacity: 0.5}, { duration: 200});
            $('#project-return').animate({opacity: 0.5}, { duration: 200, queue: false });
            
        }
    }, function(){
        if ($('#projects-head').text() == "BACK TO PROJECTS") {
            $('#projects-head').animate({opacity: 1}, { duration: 200 });
            $('#project-return').animate({opacity: 1}, { duration: 200, queue: false });
        }
    });   
    
    $('#project-return').hover(function(){
        $('#projects-head').animate({opacity: 0.5}, { duration: 200});
        $('#project-return').animate({opacity: 0.5}, { duration: 200, queue: false });
    }, function(){
        $('#projects-head').animate({opacity: 1}, { duration: 200 });
        $('#project-return').animate({opacity: 1}, { duration: 200, queue: false });
    });
}

function projectLoad(){
    
    //not a big deal if we are caching the few projects that currently exist on the site. 
    //Will improve performance slightly.
    $.ajaxSetup({ cache : true });
           
    $('.thumb').click(function() {
        var $this = $(this);
        var title = $this.find('.thumb-text').text();
        var spinner = '<div class="loader">Loading...</div>'; 
        var folder = $this.data('folder');
        var newHTML = '/projects/' + folder + '.html';
        $('.project-load').html(spinner).load(newHTML);
        $('.project-title').text(title);
    });
}


//code within this block will only execute when the DOM is ready
$(document).ready(function(){
    //jump to top of window on refresh
    $(this).scrollTop(0); 
    counter = 0; 
    checkWidth();
    //call the checkWidth function when the window gets resized
    $(window).resize(checkWidth);

    projectSlider();
    projectLoad();
       
    
    /*
    ---------------------------------------------
    ---------------------------------------------
    ------                                 ------
    ------       HEADER FUNCTIONALITY      ------
    ------                                 ------
    ---------------------------------------------
    ---------------------------------------------
    */
    
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
    
     /*
    ---------------------------------------------
    ---------------------------------------------
    ------                                 ------
    ------         NAVIGATION BAR          ------
    ------                                 ------
    ---------------------------------------------
    ---------------------------------------------
    */
     
    
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
var currentScroll = 0; 
var triggerHeight = 100; 
var counter = 0; 
var windowSize;
var aboutOpen;

$('#aboutme-btn').click(function(){
    projectSlider();
});

function checkWidth(){
    windowSize = $(window).width();
    if (aboutOpen === true && windowSize < 916) {
        $('.master-container').css('height', '160vh');
        $('.about-panel-right').css('right', '-25%');
    } else if (aboutOpen === true && windowSize >= 916) {
        $('.master-container').css('height', '90vh');
        $('.about-panel-right').css('right', '25%');
        $('.about-kicker').css('display', 'block');
    }
    if (windowSize < 961){
        counter = 0;
        $('#treeLogo').removeClass('grow');
        $('#nameLogo').removeClass('grow'); 
    }    
    $('.arrow-box-right').height($('.block-left').height());
    $('.arrow-box-left').height($('.block-right').height());
}

function projectSlider(){
    $('.thumb').click(function(){
        $('.project-slider').css('left','-100%');
        $('.project-container').show();
        $('.projects-back').css({'display': 'inline-block'});
        $('#projects-head').wrap(function() {
            return "<a href='#jumpto-Projects'/>";
        });
        $('#project-return').show();
    });
    $('.thumb-50').click(function(){
        $('.project-slider').css('left','-100%');
        $('.project-container').show();
        $('.projects-back').css({'display': 'inline-block'});
        $('#projects-head').wrap(function() {
            return "<a href='#jumpto-Projects'/>";
        });
        $('#project-return').show();
    });
    $('#return').click(function(){
        $('.project-slider').css('left','0%');
        $('.project-container').hide();
        $('.projects-back').css({'display': 'none'});
        $("#projects-head").unwrap();
        $('#project-return').hide();
        $('#return').css('opacity', '1');
    });
    $('#return').hover(function(){
        if ($('#projects-head').text() == "BACK TO PROJECTS") {
            $('#return').animate({opacity: 0.5}, { duration: 200, queue: false});
        }
    }, function(){
        if ($('#projects-head').text() == "BACK TO PROJECTS") {
            $('#return').animate({opacity: 1}, { duration: 200, queue: false});
        }
    });
}

function projectLoad(){
    //Not a big deal if we are caching the few projects that currently exist on the site. 
    $.ajaxSetup({ cache : true });
    $('.thumb').click(function() {
        var $this = $(this);
        var title = $this.find('.thumb-text').text();
        var spinner = '<div class="loader">Loading...</div>'; 
        var folder = $this.data('folder');
        var newHTML = './projects/' + folder + '.html';
        $('.project-load').html(spinner).load(newHTML);
        $('.project-title').text(title);
    });
    $('.thumb-50').click(function() {
        var $this = $(this);
        var title = $this.find('.thumb-text').text();
        var spinner = '<div class="loader">Loading...</div>'; 
        var folder = $this.data('folder');
        var newHTML = './projects/' + folder + '.html';
        $('.project-load').html(spinner).load(newHTML);
        $('.project-title').text(title);
    });
}

function aboutSlider() {
    $('#aboutme-btn').click(function(){
        aboutOpen = true;
        if (windowSize >= 916){
            $('.about-panel-right').css('right','25%');
            $('.about-panel-left').css('left','25%');
        } else {
            $('.master-container').css('height', '160vh');
            $('.about-kicker').css('display', 'none');
            $('.about-panel-right').css({right: '-25%'});
            $('.about-panel-left').css({left: '25%'});
        }
    });
    $('#back-btn').click(function(){
        aboutOpen = false;
        if (windowSize >= 916){
            $('.about-panel-right').css('right','0');
            $('.about-panel-left').css('left','-25%');
        } else {
            $('.master-container').css('height', '80vh');
            $('.about-kicker').css('display', 'block');
            $('.about-panel-right').css({right: '0'});
            $('.about-panel-left').css({left: '-25%'});
        }
    });   
}

$(window).load(function(){
    //jump to top of window on refresh
    $(this).scrollTop(0);
    $('.arrow-box-right').height($('.block-left').height());
    $('.arrow-box-left').height($('.block-right').height());
});

//code within this block will only execute when the DOM is ready
$(document).ready(function(){ 
    aboutOpen = false;
    counter = 0; 
    checkWidth();
    //call the checkWidth function when the window gets resized
    $(window).resize(checkWidth);
    projectSlider();
    projectLoad();
    aboutSlider();
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
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 500);
    });
});
document.getElementById("searchsubmit").onclick = function(e) {
    e.preventDefault();
    document.getElementById("searchform").submit();
}

/*var slideImageRatio = 1.77777777778;
var screenWidth = screen.width;
var sliderLoadingHeight = screenWidth / slideImageRatio ;
document.getElementsByClassName('flexslider loading').setAttribute("style","height:"+ sliderLoadingHeight +"px");
*/

$(document).ready(function() {

    var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();


    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 20;
    var navbarHeight = $('header').outerHeight();
	var screenWidth = $(window).width;

  
		$(window).on("resize scroll",function(event){
        didScroll = true;
		
		if (screenWidth > 991){	
		$('.header').trigger('detach.ScrollToFixed');
		$('.header').removeClass('fixed');		
		

        if ($(this).scrollTop() > 0) {
            $('.header').addClass('fixed');
        } else {
            $('.header').removeClass('fixed');
        }
		
		}
		
		else{
			$('.header').addClass('fixed');
			$('.header').scrollToFixed();
			
		}


        if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }

    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
			if (screenWidth > 991){	
            $('header').removeClass('nav-down').addClass('nav-up');
			}
        } else {
            // Scroll Up
			
            if(st + $(window).height() < $(document).height()) {
				if (screenWidth > 991){	
                $('header').removeClass('nav-up').addClass('nav-down');
				}
            }
        }

        lastScrollTop = st;
    }


    $('.rn-section-first .rn-eh').matchHeight();
    $('.rn-news-block').matchHeight();
    $('.rn-newsletter .rn-section-detail').matchHeight();
    // $('.rn-health-menu-list .item').matchHeight();
    $('#customer_login form').matchHeight();
    $('.upsells.products ul li').matchHeight();
    $('.rn-product-list ul.products li').matchHeight();
    


    $('li.rn-custom-product-menu').hover(function(){
		if (screenWidth > 991){	
        $('header').addClass('menu-opened');
		}
}, function(){
	
	if (screenWidth > 991){	
    $('header').removeClass('menu-opened');
	}
});

    $('.scrollToTop').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        }); 

	
	//add class on image
	$("img").addClass("img-responsive");
	
	$('.rn-page-header').scrollToFixed();
    // $('.header').scrollToFixed();


    var $carousel = $('.owl-carousel');        
    
    $carousel.owlCarousel({
        /*loop:true,*/
        margin:40,
        nav:true,
        dots:false,
        navText : ["",""],
        rewindNav : true,
        responsive:{
            0:{
                items:1,
                margin:10
            },
            768:{
                items:3,
                margin:40
            },
            1000:{
                items:5
            }

        }
    }) ;



    /*$('.plus').on('click',function(e){

var val = parseInt($(this).prev('input').val());

$(this).prev('input').val( val+1 );


});

$('.minus').on('click',function(e){

var val = parseInt($(this).next('input').val());
if(val !== 0){
    $(this).next('input').val( val-1 );

} });*/


$( '<div class="check"><div class="inside"></div></div>').insertAfter( "table.variations td.value label" );

$('input#rn-file-upload').change(function() {   
  $(this).parents('.form-group').find('label').text($(this).val().replace(/.*(\/|\\)/, ''));
})




// $('span.rn-subject').on('click', function(e) {
//     e.preventDefault();
//     $('select#rn-subject').show().focus().click();   
//    $('select#rn-subject').trigger('click');
// });



});

$(window).load(function() {
    var target_flexslider = $('.flexslider');
  target_flexslider.flexslider({
    animation: "fade",
            touch: true,
            keyboard: true,
            animationLoop: true,
            slideshow: true,
            slideshowSpeed: 8000,
            animationSpeed: 3000,
    // slideshow: false,
    // controlNav: false,
    directionNav: false,
     start: function(slider) {
               target_flexslider.removeClass('loading');
           }
  });
});

$(document).ready(function () {

            if( $(window).innerWidth() <= 992 ){
                $(".navbar-toggle").on("click", function () {
                      $(this).toggleClass("active");
                });

                //product click custom add
                $('.rn-custom-product-menu a').click(function(){
                      $(this).parent().toggleClass('is_open');
                      $(this).next('.rn-products-listing-menu.bg-white').toggle();
                });
            }
            
              //search 
     //          jQuery('input#s').on("focus hover",function(){
					// jQuery(this).css('width','100px');
			  //  });
     //          jQuery('input#s').blur(function(){
     //          	jQuery(this).css('width','0px');
     //          });
        });


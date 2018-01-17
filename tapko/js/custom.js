


jQuery(document).ready(function($) {
  jQuery('span.feedback').html('');
       $(".demo-accordion").accordionjs();
	    $('.catagory-slider, .multiple-items').slick({

		  dots: false,

		  infinite: false,

		  speed: 300,

		  slidesToShow: 7,

		  slidesToScroll: 1,

		  responsive: [

		    {

		      breakpoint: 1024,

		      settings: {

		        slidesToShow: 3,

		        slidesToScroll: 1,

		        infinite: true,

		        dots: true

		      }

		    },

		    {

		      breakpoint: 600,

		      settings: {

		        slidesToShow: 2,

		        slidesToScroll: 1

		      }

		    },

		    {

		      breakpoint: 480,

		      settings: {

		        slidesToShow:1,

		        slidesToScroll:1

		      }



		    }

		  ]
		});


jQuery('.related-products .owl-carousel').owlCarousel({
    	loop:true,
		nav: true,
		autoPlay:true,
		navText: [ '<i class="fa fa-1x fa-angle-left"></i>', '<i class="fa fa-1x fa-angle-right"></i>' ],
	    responsive:{
	        0:{
	            items:1
	        },
	        585:{
	            items:2

	        },

	        600:{
	            items:3
	        },
	        1000:{
	            items:5
	        }
	    }
});


	// product tab //

	$(".catagory-slider a ").click(function(event) {

	        event.preventDefault();

	        $(this).parent().addClass("active-product");

	        $(this).parent().siblings().removeClass("active-product");

	        var tab = $(this).attr("href");

	        $(".catagory-product").not(tab).css("display", "none");

	        $(tab).fadeIn();

	    });

	// product tab //



		$(document).on('click', '.shape', function (event) {

			$('body').addClass('menuis-opened');

	    	});

			$(document).on('click', '.menuis-opened .shape ', function (event) {

	 			$('body').removeClass('menuis-opened');

	 		});

		$(function() {

		var pull = $('.shape');

			menu = $('.navigation-menu');

			menuHeight= menu.height();



		$(pull).on('click', function(e) {

			e.preventDefault();

			menu.slideToggle();

		});



		$(window).resize(function(){

    		var windowwidth = $(window).width();

    		if(windowwidth > 881 && menu.is(':hidden')) {

    			menu.removeAttr('style');

    		}

		});

	});



		// ===== Scroll to Top ====

	$(window).scroll(function() {

	    if ($(this).scrollTop() >= 1) {

	        $('#return-to-top').fadeIn(200);

	    } else {

	        $('#return-to-top').fadeOut(200);

	    }

	});

	$('#return-to-top').click(function() {

	    $('body,html').animate({

	        scrollTop : 0

	    }, 600);

	});



// navigation menu scroll up and down //
	$('.catagory-slider div .catagory-head').on('click', function(event) {
		$('.catagory-slider div .catagory-head').parent('.slick-active').removeClass('test');
		$(this).parent('.slick-active').addClass('test');
	});


	    $(window).resize(function() {
			  if ($(window).width() < 881) {
					// console.log($(window).width());
				 	$('.caret').on('click', function(event) {
					$('.mobile-submenu').removeClass('mobile-submenu');
					$(this).parent('li').addClass('mobile-submenu');
				});
			  }
			 else {
			    // alert('More than 881');
					$('.mobile-submenu').removeClass('mobile-submenu');
			 }

		}) .resize();


	    // var highestBox = 0;
	    //     jQuery('.catagory-head, #customer_login > div').each(function(){
	    //             if(jQuery(this).height() > highestBox){
	    //             highestBox = jQuery(this).height();
	    //     }
	    // });
	    // jQuery('.catagory-head, #customer_login > div').height(highestBox);



jQuery( document ).ready( function( $ ){
	jQuery(document).on( 'added_to_wishlist removed_from_wishlist', function(){
		var counter = $('.your-counter-selector');

		$.ajax({
		url: yith_wcwl_l10n.ajax_url,
		data: {
		action: 'yith_wcwl_update_wishlist_count'
		},
		dataType: 'json',
		success: function( data ){
		counter.html('Wishlist ('+data.count+')');
		},
		beforeSend: function(){
		counter.block();
		},
		complete: function(){
		counter.unblock();
		}
		})
	})


jQuery('.yith-wcan-group li a ').click(function () {
	jQuery('.yith-wcan-group li').removeClass('chosen');
	jQuery(this).parent('li').addClass('chosen');
});


jQuery('aside#secondary .widgetSidebar').each(function(){
     var myheight = jQuery(this).find("ul").height();
     if(myheight >= 200) {
        jQuery(this).find("ul").addClass('height-added');
     }
 });




// get the product page //
jQuery(".products .block__elem .col_block figure, .slider-items .col_block figure").each(function() {
        var $container = $(this),
            imgUrl = $container.find("img").prop("src");
        if (imgUrl) {
            $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("custom-background");
        }
    });



jQuery( document ).ajaxComplete(function( event,request, settings ) {
	jQuery(".products .block__elem .col_block figure, .slider-items .col_block figure").each(function() {
		var jQuerycontainer = jQuery(this),
		imgUrl = jQuerycontainer.find("img").prop("src");
		if (imgUrl) {
			jQuerycontainer.css("backgroundImage", 'url(' + imgUrl + ')').addClass("custom-background");
		}
	});
});
// get the product page //
});


jQuery('.woocommerce-product-details__short-description ul').addClass('clearfix');
	jQuery('.multiple-items').slick({
	  infinite: true,
	  slidesToShow: 5,
	  slidesToScroll: 2
	});
});


//Adding plus minus in quantity and increment/decrement functionality
  jQuery( function( $ ) {

  if ( ! String.prototype.getDecimals ) {
    String.prototype.getDecimals = function() {
      var num = this,
        match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if ( ! match ) {
        return 0;
      }
      return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
    }
  }

  function wcqi_refresh_quantity_increments(){
    $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
  }

  $( document ).on( 'updated_wc_div', function() {
    wcqi_refresh_quantity_increments();
  } );

  $( document ).on( 'click', '.plus, .minus', function() {
    // Get values
    var $qty    = $( this ).closest( '.quantity' ).find( '.qty'),
      currentVal  = parseFloat( $qty.val() ),
      max     = parseFloat( $qty.attr( 'max' ) ),
      min     = parseFloat( $qty.attr( 'min' ) ),
      step    = $qty.attr( 'step' );

    // Format values
    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
    if ( max === '' || max === 'NaN' ) max = '';
    if ( min === '' || min === 'NaN' ) min = 0;
    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

    // Change the value
    if ( $( this ).is( '.plus' ) ) {
      if ( max && ( currentVal >= max ) ) {
        $qty.val( max );
      } else {
        $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
      }
    } else {
      if ( min && ( currentVal <= min ) ) {
        $qty.val( min );
      } else if ( currentVal > 0 ) {
        $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
      }
    }

    // Trigger change event
    $qty.trigger( 'change' );
  });

  wcqi_refresh_quantity_increments();
});


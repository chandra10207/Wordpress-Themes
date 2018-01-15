$(document).ready(function() {
    // // using date picker on the vender start date
      // $('#wcv_start_date').datepicker();
    // // destination autocomplete
    if ($(window).height() >= $(document).height()) $("#footer").addClass("fixed-footer");
    else $("#footer").removeClass("fixed-footer");
    var wp_ajaxurl = Booking_Conformation.wp_ajaxurl;
    console.log(wp_ajaxurl);

    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#destination" );
      $( "#destination" ).scrollTop( 0 );
    }
    $("#destination").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: wp_ajaxurl,
                data: {
                    'action': 'nws_search_destinations',
                    'term': request.term
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    response(data);
                }
            });
        },
        minLength: 3,
        select: function(event, ui) {
            log(ui.item ? "Selected: " + ui.item.label : "Nothing selected, input was " + this.value);
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        }
        // $(".LoutName").click(function() {
        //     $(".Lout").slideToggle("2000");
        // });
    });
    // alert(expiry_date);
    // $('#menu-item-16').find('a').attr('data-toggle', 'modal');
    // $('#menu-item-16').find('a').attr('data-target', '#at-login');
    // $('#menu-item-17').find('a').attr('data-toggle', 'modal');
    // $('#menu-item-17').find('a').attr('data-target', '#at-signup-filling');
    // $.datepicker.setDefaults({
    //               // dateFormat: 'dd/mm/yy',
    //               minDate: +1,
    //               changeMonth: true,
    //               changeYear: true,
    //               numberOfMonths: 1,  
    //               inline: true,
    //               constrainInput:true
    //           });
    // console.log(expiry_date);
    // 
    $('#from-date').datepicker({
        dateFormat: 'D dd/mm/yy',
        minDate:'today'
    });
    $('#to-date').datepicker({
        dateFormat: 'D dd/mm/yy',
        minDate:'+1'
    });
      /*$('#wcv_start_date').datepicker({
        dateFormat: 'D dd/mm/yy',
        minDate:'today'
    });

    $('#wcv_expiry_date').datepicker({
        dateFormat: 'D dd/mm/yy',
        minDate:'today'
    });*/

/* sYNCRONIZE START END DATE*/
    $("#wcv_start_date").datepicker({
        dateFormat: 'D dd/mm/yy',
        minDate: 'today',
        onSelect: function () {
            var dt2 = $('#wcv_expiry_date');
            var startDate = $(this).datepicker('getDate');
            //add 30 days to selected date
            startDate.setDate(startDate.getDate() + 30);
            var minDate = $(this).datepicker('getDate');
            //minDate of dt2 datepicker = dt1 selected day
            dt2.datepicker('setDate', minDate);
            //sets dt2 maxDate to the last day of 30 days window
            //dt2.datepicker('option', 'maxDate', startDate);
            //first day which can be selected in dt2 is selected date in dt1
            dt2.datepicker('option', 'minDate', minDate);
            //same for dt1
            //$(this).datepicker('option', 'minDate', minDate);
        }
    });
    $('#wcv_expiry_date').datepicker({
        dateFormat: 'D dd/mm/yy',
    });







    

    if(jQuery("body").hasClass("single-product")){

        if (expiry_date) {


        // $('#user_checkin_date_updated').datepicker({
        //     dateFormat: 'M mm/dd/yy',
        //     maxDate: expiry_date,
        //     minDate: 'today'
        // });
        // $('#user_checkout_date_updated').datepicker({
        //     dateFormat: 'M mm/dd/yy',
        //     maxDate: expiry_date,
        //     minDate: '+1'
        // });

        $("#user_checkin_date_updated").datepicker({
        dateFormat: 'M mm/dd/yy',
        minDate: 'today',
        maxDate: expiry_date,
        onSelect: function () {
            var dt2 = $('#user_checkout_date_updated');
            var startDate = $(this).datepicker('getDate');
            //add 30 days to selected date
            startDate.setDate(startDate.getDate() + 30);
            var minDate = $(this).datepicker('getDate');
            //minDate of dt2 datepicker = dt1 selected day
            // dt2.datepicker('setDate', minDate);
            dt2.val('');

            //sets dt2 maxDate to the last day of 30 days window
            //dt2.datepicker('option', 'maxDate', startDate);
            //first day which can be selected in dt2 is selected date in dt1
            dt2.datepicker('option', 'minDate', minDate);
            //same for dt1
            //$(this).datepicker('option', 'minDate', minDate);
        }
    });
    $('#user_checkout_date_updated').datepicker({
        dateFormat: 'M mm/dd/yy',
        maxDate: expiry_date
    });

    }








    }
/*Hide Register button on logged In*/
if(jQuery("body").hasClass("logged-in")){
    $("a.become-host-register").parent().hide();
    $()
}

        $("#special-offer .product .pd-right").stick_in_parent();

        /*$("#wcv-product-edit input[data-rules^='required']" ).parents('.control-group').addClass('tt-required-field');*/
        $("input[data-rules^='required']" ).parents('.control-group').addClass('tt-required-field');

        var text = $("label[for='product_cat[]']").text('Country');


        




    //$('#user_checkin_date,#user_checkout_date').change(selector);
    var selector = function(dateStr) {
        var d1 = $('#user_checkin_date_updated').datepicker('getDate'),
            d2 = $('#user_checkout_date_updated').datepicker('getDate'),
            diff = 0;
        if (d1 && d2) {
            diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
        }
        $('#totaldays').val(diff);
        if (diff > vatrate && deal_package == 1) {
            if (($('#user_checkin_date_updated').val() != '') && ($('#user_checkout_date').val() != '')) {
                $('#message-box').text('The total days of this deal is less than your selected number of days. Please reduce the number of days or find more deals');
                $('#user_checkout_date_updated').val('');
            }
        }
        if (diff < vatrate && deal_package == 1) {
            if (($('#user_checkin_date_updated').val() != '') && ($('#user_checkout_date').val() != '')) {
                $('#message-box').text('Number of days you have selected is less than the offered days in the deal. You can extend your stay if you like.');
            }
        }
        if (diff == vatrate && deal_package) {
            $('#message-box').text('');
        }
    }
});
$(function() {
    //on date change for per night package
    $("#user_checkin_date_updated,#user_checkout_date_updated").change(function() {
        if ($('.price-lable').text() == ' / Per Night') {
            //alert( "Handler for .click() called." );
            var from = $("#user_checkin_date_updated").val();
            var to = $("#user_checkout_date_updated").val();
            if (Date.parse(from) >= Date.parse(to)) {
                // alert("Invalid Date Range");
                $('#user_checkout_date').val('');
                return false;
            }
            var d1 = $('#user_checkin_date_updated').datepicker('getDate'),
                d2 = $('#user_checkout_date_updated').datepicker('getDate'),
                diff = 0;
            if (d1 && d2) {
                diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
            }
            var post_id = $('button[name="add-to-cart"]').attr('value');
            jQuery.ajax({
                type: 'POST',
                data: {
                    'action': 'my_action',
                    'post_id': post_id,
                    'diff': diff
                },
                url: Booking_Conformation.wp_ajaxurl, //this is the url found in functions
                success: function(data, lable) {
                    //$(".price-lable").text('');
                    $("#calc-price").text('$' + data);
                    //$(".price span.woocommerce-Price-amount").text('$'+data);
                },
                error: function(data) {
                    // alert("Data not saved: " + msg + ".");
                }
            });
        }
    });
    //on select of adults and kids
    $("#number_of_adults,#number_of_kids").change(function() {
        var adults = $('#number_of_adults').val();
        var kids = $('#number_of_kids').val();
        // alert('inside');
        if ($('.price-lable').text() == ' / Per Person') {
            //alert( "Handler for .click() called." );
            var post_id = $('button[name="add-to-cart"]').attr('value');
            jQuery.ajax({
                type: 'POST',
                data: {
                    'action': 'nws_per_person',
                    'post_id': post_id,
                    'adults': adults,
                    'kids': kids
                },
                url: Booking_Conformation.wp_ajaxurl, //this is the url found in functions
                success: function(data, lable) {
                    //$(".price-lable").text('');
                    $("#calc-price").text(data);
                    //$(".price span.woocommerce-Price-amount").text('$'+data);
                },
                error: function(data) {
                    // alert("Data not saved");
                }
            });
        }
        $('input[name="quantity"]').attr('value', parseInt(kids) + parseInt(adults));
    });
});
/* end disable date after expiry date */
$(".forgot-password").click(function() {
    $(".test").show();
});
$("button.info-toggle").hide();
$(document).ready(function() {
    $(document).on('mouseover', '.thumbnail', function() {
        $(this).find('.info-toggle').toggle();
    });
    $(document).on('mouseout', '.thumbnail', function() {
        $(this).find('.info-toggle').toggle();
    });
});
//Adding plus minus in quantity and increment/decrement functionality
jQuery(function($) {
    if (!String.prototype.getDecimals) {
        String.prototype.getDecimals = function() {
            var num = this,
                match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if (!match) {
                return 0;
            }
            return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
        }
    }

    function wcqi_refresh_quantity_increments() {
        $('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)').addClass('buttons_added').append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />');
    }
    $(document).on('updated_wc_div', function() {
        wcqi_refresh_quantity_increments();
    });
    $(document).on('click', '.plus, .minus', function() {
        // Get values
        var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');
        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = '';
        if (min === '' || min === 'NaN') min = 0;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;
        // Change the value
        if ($(this).is('.plus')) {
            if (max && (currentVal >= max)) {
                $qty.val(max);
            } else {
                $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
            }
        } else {
            if (min && (currentVal <= min)) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
            }
        }
        // Trigger change event
        $qty.trigger('change');
    });
    wcqi_refresh_quantity_increments();
    // load function jquery



});
/*Do You Offer Deals? conditons */
$('#_wcv_custom_vendor_offer_deals').change(function() {
     if ( this.value == '1'){

    
        $(".wcv_custom_vendor_competitive_edge_section").show();
}
     if ( this.value == '2'){
     
$(".wcv_custom_vendor_competitive_edge_section").hide();
     }
});

/* Sticky section for the single product*/
if(jQuery("body").hasClass("single-product")){
 var s = jQuery(".single-product .pd-right .woocommerce-product-gallery");
 var s_offset = jQuery(".single-product .pd-right").offset().top;
 var button_off  = jQuery("section.related.products").offset().top
 console.log(s_offset);  
                      
    jQuery(window).scroll(function() { 
        var windowpos = jQuery(window).scrollTop();
        if (windowpos >= s_offset) {
            s.addClass("stick-div");
            console.log("sticky added");
        }
        if (windowpos > button_off) {
            s.removeClass("stick-div");
            console.log("sticky removed");
        }
        
    })
};
    $(function(){

    // name your elements here
    var stickyElement   = '.panel-affix',   // the element you want to make sticky
        bottomElement   = '#fake-footer'; // the bottom element where you want the sticky element to stop (usually the footer) 

    // make sure the element exists on the page before trying to initalize
    if($( stickyElement ).length){
        $( stickyElement ).each(function(){

            // let's save some messy code in clean variables
            // when should we start affixing? (the amount of pixels to the top from the element)
            var fromTop = $( this ).offset().top, 
                // where is the bottom of the element?
                fromBottom = $( document ).height()-($( this ).offset().top + $( this ).outerHeight()),
                // where should we stop? (the amount of pixels from the top where the bottom element is)
                // also add the outer height mismatch to the height of the element to account for padding and borders
                stopOn = $( document ).height()-( $( bottomElement ).offset().top)+($( this ).outerHeight() - $( this ).height()); 

            // if the element doesn't need to get sticky, then skip it so it won't mess up your layout
            if( (fromBottom-stopOn) > 200 ){
                // let's put a sticky width on the element and assign it to the top
                $( this ).css('width', $( this ).width()).css('top', 0).css('position', '');
                // assign the affix to the element
                $( this ).affix({
                    offset: { 
                        // make it stick where the top pixel of the element is
                        top: fromTop - 80,  
                        // make it stop where the top pixel of the bottom element is
                        bottom: stopOn
                    }
                // when the affix get's called then make sure the position is the default (fixed) and it's at the top
                }).on('affix.bs.affix', function(){ $( this ).css('top', '80px').css('position', ''); });
            }
            // trigger the scroll event so it always activates 
            $( window ).trigger('scroll'); 
        }); 
    }

});

/*Changing the input type=text to type=number*/
jQuery(".wcvendors-pro-dashboard-wrapper #_regular_price,.wcvendors-pro-dashboard-wrapper #_wcv_store_postcode,.wcvendors-pro-dashboard-wrapper #_wcv_store_phone ").attr( 'type','number');

/* Multi step  vendor signup form login form    */
//jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function(){

        if(animating) return false;        
        nextButton = $(this);        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        var totalEmpty = 0;
        var reqField = current_fs.find('input[data-rules="required"]:empty');

        if(reqField.length > 0){ 

            $('input[data-rules="required"]',current_fs).each(function(){
            
            var fieldValue = $(this).val();
            if(fieldValue == ''){
                $(this).addClass('validation-error');
                totalEmpty++;
            }
            else{
                 $(this).removeClass('validation-error');
            }            
        })
            
        }
        

        if(totalEmpty == 0){
            animating = true;
            //$('.tt-required-message').remove();

             //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
            'transform': 'scale('+scale+')'
                 });
                next_fs.css({'left': left, 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        })


        }

        
        
       
    });

    $(".previous").click(function(){
        if(animating) return false;
        animating = true;
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        if (true) {}
        
        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                 animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        })
    })


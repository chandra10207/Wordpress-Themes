
$(document).ready(function () {

    // fixed footer on no content

    if ($(window).height() >= $(document).height())
    $("#footer").addClass("fixed-footer");
    else
    $("#footer").removeClass("fixed-footer");

    // // destination autocomplete
    var wp_ajaxurl;
   
    $( "#destination" ).autocomplete({
     source: function( request, response ) {
        $.ajax({
          url: wp_ajaxurl,
          data: {
            'action':'nws_search_deestinations'
          },
          success: function( data ) {
            response( data );
          }
        });
      },
      minLength: 2,
      select: function( event, ui ) {
        log( ui.item ?
          "Selected: " + ui.item.label :
          "Nothing selected, input was " + this.value);
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });

   $(".LoutName").click(function(){
    $(".Lout").slideToggle("2000"); 
  });

//alert(expiry_date);

      $('#menu-item-16').find('a').attr('data-toggle', 'modal');
      $('#menu-item-16').find('a').attr('data-target', '#at-login');

      $('#menu-item-17').find('a').attr('data-toggle', 'modal');
      $('#menu-item-17').find('a').attr('data-target', '#at-signup-filling');
   
      $.datepicker.setDefaults({
                    dateFormat: 'mm/dd/yy',
                    minDate: +1,
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1,  
                    constrainInput:true
                });

      var selector = function (dateStr) {
      var d1 = $('#user_checkin_date').datepicker('getDate'),
          d2 = $('#user_checkout_date').datepicker('getDate'),
          diff = 0;

        if (d1 && d2) {
            diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
        }

        $('#totaldays').val(diff);

        
        if(diff>vatrate && deal_package == 1) {
            
            if( ($('#user_checkin_date').val() != '') && ($('#user_checkout_date').val() != '') ){
                $('#message-box').text('The total days of this deal is less than your selected number of days. Please reduce the number of days or find more deals');
                $('#user_checkout_date').val('');
            }
            
        }
        if(diff<vatrate && deal_package == 1) {
            
              if( ($('#user_checkin_date').val() != '') && ($('#user_checkout_date').val() != '') ){
                 $('#message-box').text('Number of days you have selected is less than the offered days in the deal. You can extend your stay if you like.');
            }
        }

        if (diff==vatrate && deal_package){
             $('#message-box').text('');
        }        
          
    }
            
    $('#user_checkin_date').datepicker();

    $('#user_checkout_date').datepicker();
    
    $('#user_checkin_date,#user_checkout_date').change(selector);

    $('#searchdate').datepicker({dateFormat:'D dd/mm/yy'});

});

    $(function(){

         $( "#user_checkin_date,#user_checkout_date" ).change(function() {
          //alert( "Handler for .click() called." );

          var from = $("#user_checkin_date").val();
          var to = $("#user_checkout_date").val();

          if(Date.parse(from) >= Date.parse(to)){
             alert("Invalid Date Range");
             $('#user_checkout_date').val('');
             return false;
          }
           
          var d1 = $('#user_checkin_date').datepicker('getDate'),
              d2 = $('#user_checkout_date').datepicker('getDate'),
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
                success: function(data,lable){
                    //$(".price-lable").text('');
                    $("#calc-price").text('$'+data);
                    //$(".price span.woocommerce-Price-amount").text('$'+data);
                    
           },
           error: function(data){
              alert( "Data not saved: " + msg + ".");
           }

        });

    });

    });

    /* disable date after expiry date */
     $("#user_checkin_date").datepicker({
        maxDate: expiry_date
    });

       
     $("#user_checkout_date").datepicker({
        maxDate: expiry_date
    });

     /* end disable date after expiry date */


     $(".forgot-password").click(function(){
        $(".test").show();
      });

    $("button.info-toggle").hide();
    $(document).ready(function(){
    $(document).on('mouseover','.thumbnail',function(){
        $(this).find('.info-toggle').toggle();
      });
      $(document).on('mouseout','.thumbnail',function(){
        $(this).find('.info-toggle').toggle();
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
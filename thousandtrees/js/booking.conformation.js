jQuery(document).ready(function($) {

//log in ajax call ----------------------------------------------------------------------
	$( '#rememberme' ).click(function(event) {
			if( $(this).val() == 'true' ){
			$(this).val('false');
			}else{
			$(this).val('true');
			}

	});

	// $('#login-msg-error').hide();
	// $('#login-msg-success').hide();

	$( '#thou_login1' ).click(function() {
		$('#login-msg-error').html('');
    	$('#login-msg-success').html('');
		var username = $('#username').val();
		var pass = $('#password').val();
		var remember = $( '#rememberme' ).val();
		

		if( username.length == 0 && pass.length == 0 ||  pass.length == 0 || username.length == 0  ){			
				$('#login-msg-error').html("Please Enter Username Or Password");
		
		}else{
				$.ajax({
					url: Booking_Conformation.wp_ajaxurl,
					type: 'POST',
					dataType: 'json',
					data: {
					action: 'thtrs_custom_user_login',
					username: username,
					password: pass,
					rememberme: remember,
					success:function(response){
						console.log(response);
					}
					},
				})
				.done(function( data ) {				  	
	                if (data.loggedin == true){
	                	$('#login-msg-error').html('');
	                	$('#login-msg-success').html(data.message).show();
	                    document.location.href = Booking_Conformation.home_url + data.redirect;
	                }else{
	                	$('.login').trigger( "reset" );
	                	$('#login-msg-error').html(data.message).show();
	                }
				})
				.fail(function(data) {
					$('.login').trigger( "reset" );
	                $('#login-msg-error').html(data.message).show();
				})

		}
		return false;
	});

//Register ajax call -------------------------------------------------------------------
$("#apply_for_vendor").click(function() {

	if( $(this).val() == 1 ){
	$(this).val('0');
	}else{
	$(this).val('1');
	}
	//1 is a true for customer signup
	//0 not true for customer sign up
	
});

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

$("#reg_thousandtree").click(function() {
	/* Act on the event */
	var email = $("#reg_email").val();
	var pass = $("#reg_password").val();
	var vendor = $("#apply_for_vendor").val();

	if( email.length == 0 && pass.length == 0){
		$('.register_error_msg').html('Please Enter Username and Password').show();
		$("#reg_email").addClass('validation-error');
		$("#reg_password").addClass('validation-error');

	}

	else if(email.length != 0 && !isValidEmailAddress( email )){
		$('.register_error_msg').html('Please Enter Valid Email').show();
		$("#reg_email").addClass('validation-error');
		$("#reg_password").removeClass('validation-error');

	}

	else if(email.length != 0 && pass.length == 0){
		$('.register_error_msg').html('Please Enter Your Password').show();
		$("#reg_password").addClass('validation-error');
		$("#reg_email").removeClass('validation-error');

	}

	else{
		$("#reg_password").removeClass('validation-error');
		$("#reg_email").removeClass('validation-error');


		$.ajax({
					url: Booking_Conformation.wp_ajaxurl,
					type: 'POST',
					dataType: 'json',
					data: {
					action: 'thtrs_custom_user_register',
					email: email,
					pass: pass,
					vendor: vendor
					},
				})
				.done(function( data ) {
					console.log( 'Seccuess' );
				  	
	                if (data.register == true){
	                	$('.register_error_msg').html('');
	                	$('.register_success_msg').html(data.message).show();
	                	if( vendor == 1 ){
	                    document.location.href = Booking_Conformation.home_url +'/my-account/';
	                	}else{
	                	document.location.href = Booking_Conformation.home_url +'/vendor_dashboard/';
	                	}
	                }else{
	                	$('#customer_registration').trigger( "reset" );
	                	$('.register_error_msg').html(data.message).show();

	                }
				})
				.fail(function() {
					console.log("error");
				})
			}

		return false;


});


});
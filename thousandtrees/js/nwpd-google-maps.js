( function( $ ) {
$(document).ready(function() {

 var input = document.getElementById('np_booking_location');

    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if(place.geometry){
            
            var display_location_array = [];
            var city; var state; var country;
            jQuery('#project_city').val('');
            jQuery('#project_state').val('');
            jQuery('#project_counry').val('');

                var address_components = place.address_components;
                // console.log(address_components);
                for (var i = 0, len = address_components.length; i < len; i++) {
                    if(jQuery.inArray('locality',address_components[i].types) >= 0)
                    {
                    city = address_components[i].long_name;
                    jQuery('#project_city').val(city);
                    display_location_array.push(city);
                    }
                    else if(jQuery.inArray('administrative_area_level_1',address_components[i].types) >= 0)
                    {
                    
                    state = address_components[i].long_name;
                    jQuery('#project_state').val(state);
                    if(city)
                      display_location_array.push(address_components[i].short_name);
                    else
                      display_location_array.push(state);
                    }
                    
                    else if(jQuery.inArray('country',address_components[i].types) >= 0)
                    {
                    country = address_components[i].long_name;
                    jQuery('#project_country').val(country);
                    display_location_array.push(country);
                    }
                }
                var display_location = display_location_array.join(', ');
                var maplat = place.geometry.location.lat();
                var maplng = place.geometry.location.lng();
                jQuery('#project_display_location').val(display_location);
                jQuery('#projectmaplat').val(maplat);
                jQuery('#projectmaplng').val(maplng);

                console.log(place.geometry.location.lat());
                console.log(place.geometry.location.lng());
               
                //filter_ajax('1');
              }
          
  });

});

})(jQuery);

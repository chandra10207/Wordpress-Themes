<?php
/*
Template Name: Contact Us Template
*/
?>
<?php get_header();
?>
<?php
if (have_posts()):
    while (have_posts()): the_post();
        get_template_part('template-parts/content', 'page_banner');
        ?>


        <div id="primary" class="content-area">
            <main id="main" class="main-content site-main site-content " role="main">

                <div id="rn-content"  class="rn-content">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Send a Message</h2>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <?php the_content();?>
                            </div>

                            <div class="col-md-6 col-md-offset-1">
                                <div class="rn-address-map-block">
                                    <h3><?php the_field('we_are_here_label'); ?></h3>


                                    <div class="rn-address-block">
                                        <div class="rn-address rn-location">
                                            <span class="icon-location"></span>
                                            <?php the_field('rn_contact_address'); ?>
                                            </p>
                                        </div>

                                        <div class="row">

                                        <div class="col-md-6">

                                        <div class="rn-address rn-telephone">
                                            <span class="icon-phone"></span>
                                            <p>
                                                <a href="callto:<?php the_field('rn_contact_number'); ?>"><?php the_field('rn_contact_number'); ?></a>
                                            </p>
                                        </div>

                                        <div class="rn-address rn-email">
                                            <span class="icon-message"></span>
                                            <p>
                                                <a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <?php the_field('available_time'); ?>

                                    </div>
                                </div>
                                    </div>

                                    <div class="rn-google-map-block">

                                        <?php

                                        $location = get_field('rn_google_map');

                                        if( !empty($location) ):
                                            ?>	
											 <?php /*<div id="map" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div> */ ?>
											 
											  <div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div> 
</div>
											
                                           
                                        <?php endif; ?>





                                    </div>





                                    <div class="clearfix"></div>

                                </div>


                            </div>


                        </div>
                    </div>
                </div>




            </main><!-- #main -->
        </div><!-- #primary -->




    <?php endwhile;
endif;
?>
   
	

<?php get_footer(); ?>
 <style type="text/css">
	#map {
         width: 100%;
          height: 422px;
		  border: #ccc solid 1px;
            margin: 20px 0;
      }       

        /* fixes potential theme css conflict */
        #map img {
            max-width: inherit !important;
        }
    </style>  
	<style type="text/css">

.acf-map {
	width: 100%;
	height: 422px;
	border: #ccc solid 1px;
	margin: 20px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>
	
	

<?php /*


 <script>

      // This example displays a marker at the center of Australia.
      // When the user clicks the marker, an info window opens.

      function initMap() {		 
        var raydelLocation = {lat: parseInt(document.getElementById("map").getAttribute('data-lat')), lng: parseInt(document.getElementById("map").getAttribute('data-lng'))};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: raydelLocation,
		  mapTypeId	: google.maps.MapTypeId.ROADMAP
        });		

        var contentString = '<div id="rn-map-location">'+
            '<div id="rn-map-info">'+
            '</div>'+
            '<h4 id="rn-map-info-heading" class="rn-map-info-heading">Rainbow and Nature Pty Ltd.</h4>'+
            '<div id="bodyContent">'+
            '<p>Suite 2 Level 1 Building 1,</br> ' +
            '9 Chilvers Road, Thornleigh </br>'+
            'NSW 2120 Australia</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: raydelLocation,
          map: map,
          title: 'Rainbow and Nature Pty Ltd.'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
		infowindow.open(map, marker);
      }
	  
	  
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8sIxPuaUB17JbiPUvZlOS2SqyQNPDWMI&callback=initMap">
    </script> 
*/ ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8sIxPuaUB17JbiPUvZlOS2SqyQNPDWMI"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}
	
	
	var contentString = '<div id="rn-map-location">'+
            '<div id="rn-map-info">'+
            '</div>'+
            '<h4 id="rn-map-info-heading" class="rn-map-info-heading">Rainbow and Nature Pty Ltd.</h4>'+
            '<div id="bodyContent">'+
            '<p>Suite 2 Level 1 Building 1,</br> ' +
            '9 Chilvers Road, Thornleigh </br>'+
            'NSW 2120 Australia</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          title: 'Rainbow and Nature Pty Ltd.'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
		infowindow.open(map, marker);
		
		

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>


<?php
//get_sidebar();
get_footer();


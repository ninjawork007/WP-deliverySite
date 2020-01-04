<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Gmap
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */ 

class CSFramework_Option_google_map extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

    echo $this->element_before();
    
    $map_api = cs_get_option('google_map_api');
    if(cs_get_option('google_map_location')) {
	    $lat_lng = explode( ',', cs_get_option('google_map_location')) ;
	    $defaults_value = array(
			'address'  => '',
			'lat'  => $lat_lng[0],
			'lng'  => $lat_lng[1],
			'zoom' => cs_get_option('google_map_zoom', '12'),
	    );
    } else {
		$defaults_value = array(
			'address'  => '',
			'lat'  => '40.715028',
			'lng'  => '-74.017775',
			'zoom' => '12',
		);
    }
    
    $value = wp_parse_args( $this->element_value(), $defaults_value );
   
    echo '<input type="text" id="google-autocomplete" class="false-enter" style="width: 100%" name="'. $this->element_name( '[address]' ) .'" value="'. $value['address'] .'"/>';
    echo '<div class="details">';
    echo '<input type="hidden" data-map="zoom" name="'. $this->element_name( '[zoom]' ) .'" value="'. $value['zoom'] .'"/>';   
    echo '</div>';
    echo '<div id="map"></div>';
    echo '<label>Latitude<br><input data-geo="lat" name="'. $this->element_name( '[lat]' ) .'" value="'. $value['lat'] .'"/></label>';
    echo '<label>Longitude<br><input data-geo="lng" name="'. $this->element_name( '[lng]' ) .'" value="'. $value['lng'] .'"/></label>';    
    echo $this->element_after(); ?>
    <script>
		jQuery(document).ready(function($) {
			$('.false-enter').keypress(function(e) {
				if (e.keyCode == 13) {
				    return false;
				}
			});

		/* VARS
		   ========================================================================== */	
			var inputLat  = $( 'input[data-geo=lat]' ),
				inputLng  = $( 'input[data-geo=lng]' ),
				inputZoom = $( 'input[data-map=zoom]' ),
				Lat = 40.715028,
				Lng = -74.017775,	
				z = 12;
			if( inputLat.val() && inputLng.val() ) {
				Lat = inputLat.val();
				Lng = inputLng.val();
			}
			if(inputZoom.val()) {
				z = parseInt( inputZoom.val() );
			}
			
		/* MAP
		   ========================================================================== */		
			var mapOptions = {
				center: new google.maps.LatLng(Lat, Lng),
				zoom: z,
				styles: cristiano_google_map_styles['<?php echo cs_get_option('google_maps_style', 'default'); ?>']
		
			}
			var map = new google.maps.Map(document.getElementById('map'), mapOptions );
			
		/* MARKER
		   ========================================================================== */		
			var markerOptions = {
				position: new google.maps.LatLng(Lat, Lng)
			}
			var marker = new google.maps.Marker(markerOptions);
			marker.setMap(map);
			
		/* AUTOCOMPLITE
		   ========================================================================== */	
		
		   var autocompleteInput = document.getElementById('google-autocomplete')
		
		   var autocomplete = new google.maps.places.Autocomplete(autocompleteInput);
		   autocomplete.bindTo('bounds', map);
		   
		   var marker = new google.maps.Marker({
			   map: map
		   });
		  
		/* AUTOCOMPLITE LISTENER
		   ========================================================================== */
			google.maps.event.addListener(autocomplete, 'place_changed', function(){
				var place = autocomplete.getPlace();
				if(place.geometry.viewport) {
					map.fitBounds(place.geometry.viewport);
				} else {
					map.setCenter(place.geometry.location);
					map.setZoom(z);
				}
				marker.setPosition(place.geometry.location);		
				
				inputLat.val(place.geometry.location.lat());
				inputLng.val(place.geometry.location.lng());			
				
			});  
			 
		/* ZOOM LISTENER
		   ========================================================================== */
			google.maps.event.addListener(map, 'zoom_changed', function() {
			    inputZoom.val(map.getZoom());
			});		
			
		/* TABS DISPLAY FIX
		   ========================================================================== */	
			
			$("[data-section=address_section]").on('click', function () {
				if($('#cs-tab-address_section').css("display","block")) {
			    	google.maps.event.trigger(map, 'resize');
			    	map.setCenter(new google.maps.LatLng(Lat, Lng))
			    }
			});			
			
		});	    
    </script>
    <?php 
		wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js?key='.$map_api.'&sesnor=false&libraries=places');
		wp_enqueue_script( 'oregano-google-map-styles', get_template_directory_uri() . '/assets/js/google-maps-styles.js' );						     
  }
  
}

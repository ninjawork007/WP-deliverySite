<?php if(cs_get_option('map_type') != 'code'): ?>

	<section class="<?php echo cs_get_option('dzsparallaxer') ? 'dzsparallaxer dzsparallaxer-map auto-init use-loading' : 'simple-map' ?>">
		<div class="dzsparallaxer--target">
			<div id="map"></div>
		</div>	
	</section>
	
	<script type=text/javascript>		
		<?php 
			
			if(cs_get_option( 'google_map_location' )) {			
				$local_map_data = explode(",", cs_get_option( 'google_map_location' ));
				$local_map_data['lat'] = $local_map_data[0];
				$local_map_data['lng'] = $local_map_data[1];
				$local_map_data['zoom'] = cs_get_option( 'google_map_zoom' );
			} else {
				$local_map_data = cs_get_option('google_maps_location', array('lat' => '40.715028', 'lng' => '-74.017775', 'zoom' => '12'));
			}
			
			$map_api = cs_get_option('google_map_api');
			$map_style = cs_get_option('google_maps_style', 'default');
		?>	
		jQuery(document).ready(function($) {
			
		/* MAP
		   ========================================================================== */		
			var mapOptions = {
				center: new google.maps.LatLng(<?php echo esc_js($local_map_data['lat']); ?>, <?php echo esc_js($local_map_data['lng']); ?>),
				zoom: <?php echo esc_js($local_map_data['zoom']); ?>,
				styles: cristiano_google_map_styles['<?php echo esc_js($map_style); ?>'],
				scrollwheel: false,
				mapTypeControl: false,
				zoomControlOptions: {
	            	position: google.maps.ControlPosition.RIGHT_CENTER
	          	},
			  	streetViewControlOptions: {
		            position: google.maps.ControlPosition.RIGHT_CENTER
		        },
		        fullscreenControlOptions: {
			        position: google.maps.ControlPosition.RIGHT_CENTER	        
		        }
			}
			var map = new google.maps.Map( document.getElementById('map'), mapOptions );
			
		/* MARKER
		   ========================================================================== */		
			var markerOptions = {
				position: new google.maps.LatLng(<?php echo esc_js($local_map_data['lat']); ?>, <?php echo esc_js($local_map_data['lng']); ?>),
				icon: '<?php echo esc_js( cs_get_option('google_maps_marker', get_template_directory_uri() . '/assets/images/marker.png')) ?>'
			}
			var marker = new google.maps.Marker(markerOptions);
				marker.setMap(map);
				google.maps.event.addDomListener(window, "resize", function() {
					var center = map.getCenter();
					google.maps.event.trigger(map, "resize");
					map.setCenter(center); 
				});	
				
		/* INFO WINDOW
		   ========================================================================== */				
			var contentString = '<?php echo esc_sql( wpautop( cs_get_option('google_maps_info_window', ''))); ?>';
	
	        var infowindow = new google.maps.InfoWindow({
	        	content: contentString
	        });
	
	        marker.addListener('click', function() {
	        	infowindow.open(map, marker);
	        });				
		});
	</script>
	<?php  wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key='.$map_api.'' ); ?>	
	<?php  wp_enqueue_script( 'cristiano-google-map-styles', get_template_directory_uri() . '/assets/js/google-maps-styles.js' ); ?>

<?php else: ?>
	<section class="<?php echo cs_get_option('dzsparallaxer') ? 'dzsparallaxer dzsparallaxer-map auto-init use-loading' : 'simple-map' ?>">
		<div id="map">
			<?php echo cs_get_option('map_code') ?>
		</div>
	</section>	
<?php endif; ?>							
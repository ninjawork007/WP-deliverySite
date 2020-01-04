<?php
function restocore_open_table_reservation( $atts ) { 
	ob_start(); //64861 
	
	$atts = shortcode_atts(array(
        'title'		=> esc_html__('Open Table', 'cristiano'),
        'subtitle'	=> esc_html__('Book a Table', 'cristiano'),
        'img'		=> NULL,
        'shading'	=> '0',
    ), $atts);	
    $bg = wp_get_attachment_image_url($atts['img'], 'full');   
	$restaurantID = cs_get_option('open_table_id');
	$date_format = restocore_format_php_to_js(get_option('date_format'));
	?>
	<section id="open-table-reservation" class="section-block <?php echo($bg) ? 'has-bg ' . cristiano_parallax() : '' ?>">
		<?php if($bg):?>
			<div class="divimage dzsparallaxer--target" style="background-image:url(<?php echo $bg; ?>)"></div>	
		<?php endif; ?>
		<div class="center">	
			<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
			<form method="get" class="otw-widget-form" action="//www.<?php echo cs_get_option('open_table_site', 'opentable.com'); ?>/restaurant-search.aspx" target="_blank">
			
				<div class="cols-3 margin-large">
					<div class="form-item">
						<label for="date"><?php esc_html_e('Date', 'cristiano'); ?></label>
						<input type="text" format="<?php echo $date_format; ?>" autocomplete="off" id="date" class="otw-reservation-date required">
						<input type="hidden" name="startDate" class="startDate" value="<?php echo date('m/d/y'); ?>">					
					</div>
					<div class="form-item">
						<label for="time"><?php esc_html_e('Time', 'cristiano'); ?></label>
						<select id="time" name="ResTime" class="otw-reservation-time otw-selectpicker">
							<?php
							//Time Loop
							$hours = cs_get_option('reservation_hours');							
							$time_format = get_option('time_format');
							$inc = 30 * 60;
							$start = ( strtotime( $hours['from'] ) );
							$end = ( strtotime( $hours['to'] ) );
							for ( $i = $start; $i <= $end; $i += $inc ) {
								// to the standart format
								$time      = date( $time_format, $i );
								$timeValue = date( 'g:ia', $i );
								$default   = "7:00pm";
								echo "<option value=\"$timeValue\" " . ( ( $timeValue == $default ) ? ' selected="selected" ' : "" ) . ">$time</option>" . PHP_EOL;
							}
							?>
						</select>				
					</div>
					<div class="form-item">
						<label for="party"><?php esc_html_e('Guest Number', 'cristiano'); ?></label>
						<select id="party" name="partySize" class="otw-party-size-select selectpicker">
							<option value="1">1 <?php esc_html_e('Person', 'cristiano'); ?></option>
							<option value="2" selected="selected">2 <?php esc_html_e('People', 'cristiano'); ?></option>
							<option value="3">3 <?php esc_html_e('People', 'cristiano'); ?></option>
							<option value="4">4 <?php esc_html_e('People', 'cristiano'); ?></option>
							<option value="5">5 <?php esc_html_e('People', 'cristiano'); ?></option>
							<option value="6">6 <?php esc_html_e('People', 'cristiano'); ?></option>
							<option value="7">7 <?php esc_html_e('People', 'cristiano'); ?></option>
							<option value="8">8 <?php esc_html_e('People', 'cristiano'); ?></option>
							<option value="9">9 <?php esc_html_e('People', 'cristiano'); ?></option>
							<option value="10">10 <?php esc_html_e('People', 'cristiano'); ?></option>
						</select>
					</div>
				</div>
				<div class="align-center-margin">
					<button type="submit" class="find-table-btn btn <?php echo ($bg) ? 'btn-transparent' : 'btn-default'; ?> btn-lg"><?php esc_attr_e( 'Find a Table', 'cristiano' ); ?></button>
				</div>
				<input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo esc_attr( $restaurantID) ; ?>">
				<input type="hidden" name="rid" class="rid" value="<?php echo $restaurantID; ?>">
				<input type="hidden" name="GeoID" class="GeoID" value="15">
				<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
				<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="<?php echo esc_attr($restaurantID); ?>">
			</form>
		</div>
		<?php if($atts['shading'] > '0' && $bg): ?>
			<span class="dim" style="opacity:.<?php echo esc_html( $atts['shading'] ) ?>"></span>
		<?php endif; ?>		
	</section>
	
	<?php 
	return ob_get_clean();
}
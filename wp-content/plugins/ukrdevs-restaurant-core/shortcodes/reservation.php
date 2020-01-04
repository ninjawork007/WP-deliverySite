<?php
function restocore_reservation( $atts ) { 
	ob_start(); 
	$atts = shortcode_atts(array(
        'title'		=> esc_html__('Reservation', 'cristiano'),
        'subtitle'	=> esc_html__('Book a Table', 'cristiano'),
        'img'		=> NULL,
        'shading'	=> '0',
    ), $atts);	
    $bg = wp_get_attachment_image_url($atts['img'], 'full');   
	$style = ($bg) ? 'style="background-image:url('. $bg . ')"' : '';    
	$date_format = restocore_format_php_to_js(get_option('date_format'));
	?>	
	
	<section id="reservation" class="section-block <?php echo($bg) ? 'has-bg ' . cristiano_parallax() : '' ?>">
		<?php if($bg): ?>
			<div class="divimage dzsparallaxer--target" style="background-image:url(<?php echo $bg; ?>)"></div>	
		<?php endif; ?>
		<div class="center">		
			<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
			<form id="reservation-form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">	
				<div id="reservation-form-messages" class="submit-form-message"></div>
				<div class="cols-3 margin-large">						
					<div class="form-item">
						<label for="date"><?php esc_html_e('Date', 'cristiano'); ?></label>
						<input type="text" format="<?php echo $date_format; ?>" autocomplete="off" name="date" id="date" class="required datepicker">
					</div>
					<div class="form-item">
							 

						<label for="time"><?php esc_html_e('Time', 'cristiano'); ?></label>
						<select id="time" name="time" class="required">
						<?php
								$hours = cs_get_option('reservation_hours');

								//Time Loop
								//@SEE: http://stackoverflow.com/questions/6530836/php-time-loop-time-one-and-half-of-hour
								$time_format = get_option('time_format');
								$inc = 30 * 60;
								$start = ( strtotime( $hours['from'] ) ); // 6  AM
								$end = ( strtotime( $hours['to'] ) ); // 10 PM
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
						<label for="number"><?php esc_html_e('Guest Number', 'cristiano'); ?></label>
						<select id="number" name="number" class="required">
							<?php for($i = 1; $i <= cs_get_option('guest_number', '10'); $i++ ): ?>
								<option <?php echo ($i == 2) ? 'selected' : '' ?> value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="form-item">
						<label for="name"><?php esc_html_e('Name', 'cristiano'); ?></label>
						<input type="text" class="required" name="name" id="name">
					</div>	
					<div class="form-item">
						<label for="phone"><?php esc_html_e('Phone', 'cristiano'); ?></label>
						<input type="text" maxlength="15" class="required" name="phone" id="phone">
					</div>		
					<div class="form-item">
						<label for="email"><?php esc_html_e('Email', 'cristiano'); ?></label>
						<input type="text" class="required" name="email" id="email">
					</div>						
				</div>
				<div class="align-center-margin">
					<button id="reservation-submit" class="btn <?php echo ($bg) ? 'btn-transparent' : 'btn-default'; ?> btn-lg" type="submit"><?php esc_html_e( 'Book a Table', 'cristiano' ); ?></button>
				</div>				
			</form>
		</div>
			<?php if($atts['shading'] > '0' && $bg): ?>
				<span class="dim" style="opacity:.<?php echo esc_html( $atts['shading'] ) ?>"></span>
			<?php endif; ?>
		</section>
	<script>
				
		jQuery(document).ready(function($) {	
				
			  jQuery('#reservation-form').on('submit', function(e) {
				   e.preventDefault();
				   var formMessages = $('#reservation-form-messages');
				   var form = jQuery(this);
				   function validate(){				  			
					form.find('[name]').each(function(index, value){
						 var that = $(this),
						 	 value = that.val(),
							 name = that.attr('name');
						 	
						 if(that.hasClass('required')) {
							if(value == '' || value.length < 3 && value.length > 50) {
								that.addClass('error');
							} else {
								that.removeClass('error');
							}
							if(name == 'email') {
								if(!value.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i)) {
									that.addClass('error');
								}
							}
							if(name == 'phone') {
								if(!value.match(/([0-9]{9})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/)) {
									that.addClass('error');	
								}							
							}
						}
					});
					if(form.find('.required').hasClass('error')) {
						return false;
					}
					return true;
				   }		
				   if(validate()) {
					   					    
					   	var data = {
							action: 'reservation_submit',
							form_data: form.serialize()
						}; 		
			
						var test = jQuery.post( form.attr('action'), data, function(response) {
						    // Make sure that the formMessages div has the 'success' class.
						    $(formMessages).removeClass('error');
						    $(formMessages).addClass('success');
						
						    // Set the message text.
						    $(formMessages).text(response);
						    
						    form[0].reset();
						    //$('#reservation-submit').prop("disabled", true);
						});
					}				
			  });
		});
	</script>
	
	<?php
	return ob_get_clean();
}

function reservation_submit_callback(){
    parse_str($_POST['form_data'], $form_data);

	$name	= strip_tags( trim($form_data['name']	));
	$phone	= strip_tags( trim($form_data['phone']	));
	$email	= filter_var( trim($form_data["email"]	), FILTER_SANITIZE_EMAIL);
	$date	= strip_tags( trim($form_data['date']	));	
	$time	= strip_tags( trim($form_data['time']	));	
	$number	= strip_tags( trim($form_data['number'] ));			
			
    // Check that data was sent to the mailer.
    if ( empty($name) || empty($phone) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($date) || empty($time) || empty($number) ) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        esc_html_e("Oops! There was a problem with your submission. Please complete the form and try again.", 'cristiano');
        exit;
    }
    // Set the recipient email address.
    $recipient = get_option('admin_email');
   	$reservation_form_email = trim(cs_get_option('reservation_form_email'));
    if(!empty($reservation_form_email)) {
	   $recipient = $reservation_form_email;
    }

    // Set the email subject.
    $subject = esc_html__('Reservation Request from', 'cristiano') . ' ' . $name;
    
    $customer_subject = esc_html__('Reservation Request', 'cristiano');

    $email_content  = esc_html__('Name:',			'cristiano') . " $name<br />";
    $email_content .= esc_html__('Phone:',			'cristiano') . " $phone<br />";
    $email_content .= esc_html__('Email:',			'cristiano') . " $email<br />";
    $email_content .= esc_html__('Date:',			'cristiano') . " $date<br />";
    $email_content .= esc_html__('Time:',			'cristiano') . " $time<br />";
    $email_content .= esc_html__('Guest Number:',	'cristiano') . " $number<br />";        

    // Build the email headers.
    
    $site_name = get_option('blogname');    
    
	$email_headers = array(
		"From: $name <$email>",
		'content-type: text/html',
	);
        
	$customer_email_headers  = array(
		"From: $site_name <$recipient>",
		'content-type: text/html',
	);
	
	$signature = cs_get_option('email_signature');
    
    $customer_email_content = esc_html__('Hello! We have received your reservation request.', 'cristiano') . '<br /><br />';
    $customer_email_content .= esc_html__('Name:',			'cristiano') . " $name<br />";    
    $customer_email_content .= esc_html__('Date:',			'cristiano') . " $date<br />";
    $customer_email_content .= esc_html__('Time:',			'cristiano') . " $time<br />";
    $customer_email_content .= esc_html__('Guest Number:',	'cristiano') . " $number<br /><br />";   
    $customer_email_content .= esc_html__('Our manager will contact you soon for confirmation. Thank you!',	'cristiano');  
    $customer_email_content .= $signature;
    
    // Send the email.
    if (wp_mail($recipient, $subject, $email_content, $email_headers)) {
        // Set a 200 (okay) response code.
        http_response_code(200);
        esc_html_e('Thank You! Your reservation request has been sent. We will contact you soon for confirmation.', 'cristiano');
		wp_mail($email, $customer_subject, $customer_email_content, $customer_email_headers);
    } else {
        // Set a 500 (internal server error) response code.
        http_response_code(500);
        esc_html_e('Oops! Something went wrong and we couldn\'t send your reservation request.', 'cristiano');
    }
	wp_die();
}

add_action('wp_ajax_reservation_submit', 'reservation_submit_callback');
add_action('wp_ajax_nopriv_reservation_submit', 'reservation_submit_callback');
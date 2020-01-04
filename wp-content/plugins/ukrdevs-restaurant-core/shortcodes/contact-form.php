<?php
function restocore_contact_form($atts){ 
	ob_start();
	$atts = shortcode_atts(array(
        'title'		=> esc_html__('Contact Form', 'cristiano'),
        'subtitle'	=> esc_html__('Send Us Message', 'cristiano'),
        'img'		=> NULL,
        'shading'	=> '0',
    ), $atts);	
    $bg = wp_get_attachment_image_url($atts['img'], 'full');  
	?>
	<section id="contact-form" class="section-block <?php echo($bg) ? 'has-bg dzsparallaxer auto-init height-is-based-on-content use-loading' : '' ?>">
		<?php if($bg):?>
			<div class="divimage dzsparallaxer--target" style="background-image:url(<?php echo $bg; ?>)"></div>	
		<?php endif; ?>
		<div class="center">
			<?php cristiano_section_title_template($atts['title'], $atts['subtitle']); ?>
			<form id="ajax-contact" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
				<div id="form-messages" class="submit-form-message"></div>
				<div class="form-items">
					<div class="cols-3 margin-large">
						<div class="form-item">
							<label for="input-name"><?php esc_html_e( 'Your Name', 'cristiano' ); ?> *</label>
							<input type="text" id="input-name" name="name" class="required">
						</div>
						<div class="form-item">
							<label for="input-email"><?php esc_html_e( 'Your Email', 'cristiano' ); ?> *</label>
							<input type="email" id="input-email" name="email" class="required">
						</div>
						<div class="form-item">
							<label for="input-phone"><?php esc_html_e( 'Your Phone', 'cristiano' ); ?></label>
							<input type="tel" id="input-phone" name="phone">
						</div>							
					</div>
					<div class="form-item">
						<label for="textarea-message"><?php esc_html_e( 'Message', 'cristiano' ); ?> *</label>
						<textarea id="textarea-message" name="message" class="required"></textarea>
					</div>
				</div>
				<div class="align-center-margin">
					<button type="submit" class="btn-form btn <?php echo ($bg) ? 'btn-transparent' : 'btn-default'; ?> btn-lg"><?php esc_html_e( 'Send Message', 'cristiano' ); ?></button>
				</div>
			</form>
		</div>
		<?php if($atts['shading'] > '0' && $bg): ?>
			<span class="dim" style="opacity:.<?php echo esc_html( $atts['shading'] ) ?>"></span>
		<?php endif; ?>			
	</section>
	<script>
		jQuery(document).ready(function($) {
			jQuery('#ajax-contact').on('submit', function(e) {
				e.preventDefault();
				var formMessages = $('#form-messages');
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
						}
					});
					if(form.find('.required').hasClass('error')) {
						return false;
					}
					return true;													 				 					
				}
				if(validate()) {
				   					    
					var data = {
						action: 'contact_submit',
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


function contact_submit_callback(){
	
	parse_str($_POST['form_data'], $form_data);
		
	$name	 = strip_tags( trim($form_data['name']     ));
    $phone	 = strip_tags( trim($form_data['phone']    ));
    $email	 = filter_var( trim($form_data['email']    ), FILTER_SANITIZE_EMAIL );
    $message = strip_tags( trim($form_data['message'] ));
	
    // Check that data was sent to the mailer.
    if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit.
        http_response_code(400);
        esc_html_e("Oops! There was a problem with your submission. Please complete the form and try again.", 'cristiano');
        exit;
    }

    // Set the recipient email address.
	$recipient = get_option('admin_email');
	$contact_form_email = trim(cs_get_option('contact_form_email'));
	if(!empty($contact_form_email)) {
		$recipient = $contact_form_email;
	}        

    // Set the email subject.
    $subject = esc_html__('Contact Form: Message from', 'cristiano') . ' ' . $name;

    // Build the email content.
    $email_content  = esc_html__('Name:',	'cristiano') . " $name\n";        
    $email_content .= esc_html__('Email:',	'cristiano') . " $email\n";
    $email_content .= esc_html__('Phone:',	'cristiano') . " $phone\n\n";        
    $email_content .= esc_html__('Message:','cristiano') . "\n$message\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    if (wp_mail($recipient, $subject, $email_content, $email_headers)) {
        // Set a 200 (okay) response code.
        http_response_code(200);
        esc_html_e('Thank You! Your message has been sent.', 'cristiano');
    } else {
        // Set a 500 (internal server error) response code.
        http_response_code(500);
        esc_html_e('Oops! Something went wrong and we couldn\'t send your message.', 'cristiano');
    }
   	wp_die(); 
}

add_action('wp_ajax_contact_submit', 'contact_submit_callback');
add_action('wp_ajax_nopriv_contact_submit', 'contact_submit_callback');
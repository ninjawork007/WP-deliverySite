<?php
function restocore_contact_details( $atts ){
	ob_start();
	$atts = shortcode_atts(array(
        'title'		=> esc_html__('Our Location', 'cristiano'),
        'subtitle'	=> esc_html__('Visit Us', 'cristiano'),
    ), $atts);   
	?>	
	<section id="contact-details" class="section-block reset">
		<div class="center">
			<?php 
				cristiano_section_title_template($atts['title'], $atts['subtitle']);
				get_template_part( 'template-parts/contact-details' );
			?>
		</div>
	</section>
	<?php 
	return ob_get_clean();		
}
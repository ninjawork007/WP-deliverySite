<?php
function restocore_heading( $atts ){
	ob_start();
	
	$atts = shortcode_atts(array(
        'title'		=> esc_html__('Title goes here', 'cristiano'),
        'subtitle'	=> esc_html__('Subtitle goes here', 'cristiano'),
    ), $atts);		
    	
	cristiano_section_title_template($atts['title'], $atts['subtitle']);

	return ob_get_clean();
}
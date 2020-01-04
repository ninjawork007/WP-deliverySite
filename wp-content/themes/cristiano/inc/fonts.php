<?php
function cristiano_body_font(){
	$font_subsets = implode( ',', cs_get_option('body_font_subsets', array('') ) );
	if(cs_get_option('body_font_source', 'google') == 'google') {
		$font = cs_get_option('body_font');
		$font_family = '';
		if($font['font'] == 'google') {
			$font_family = $font['family'] . ':300,300i,400,400i,700|';
		}
	    $css = '
	    	body{
		    	font-family: \'%1$s\';
	    	}
	    	
	    '; 
		wp_enqueue_style( 'cristiano-google-font-body', 'https://fonts.googleapis.com/css?family=' . $font_family . '&amp;subset=' . $font_subsets . '');	
	    wp_add_inline_style( 'cristiano-style', sprintf( $css, $font['family'] ) );		
	} else {
		$font_woff = cs_get_option('body_font_woff');
		$font_ttf  = cs_get_option('body_font_ttf');	
		
		$font_woff = ($font_woff) ? "url($font_woff) format('woff')," : '';
		$font_ttf = ($font_ttf) ? "url($font_ttf) format('truetype');" : '';

		$css = '
			@font-face {
			    font-family: \'Custom Body Font\';
			    	src: ' . $font_woff . $font_ttf . '
				font-weight: normal;
			    font-style: normal;
			}
			body{
				font-family: \'Custom Body Font\';	
			}
		';
	    wp_add_inline_style( 'cristiano-style', $css );
	}
}


function cristiano_heading_font(){
	$font_subsets = implode( ',', cs_get_option('body_font_subsets', array('') ) );
	$uppercase = (cs_get_option('heading_font_uppercase')) ? 'text-transform: uppercase;' : 'text-transform: none;';				
	if(cs_get_option('heading_font_source', 'google') == 'google') {
		$font = cs_get_option('heading_font');
		$font_family = '';
		if($font['font'] == 'google') {
			$font_family = $font['family'] . ':' .$font['variant'] . '|';
		}
	    $css = '
	    	.font-heading, #footer h2 {
		    	font-family: \'%1$s\';
				' . $uppercase . '
				
	    	}
	    	
	    '; 
		wp_enqueue_style( 'cristiano-google-font-heading', 'https://fonts.googleapis.com/css?family=' . $font_family . '&amp;subset=' . $font_subsets . '');	
	    wp_add_inline_style( 'cristiano-style', sprintf( $css, $font['family'] ) );		
	} else {
		$font_woff = cs_get_option('heading_font_woff');
		$font_ttf  = cs_get_option('heading_font_ttf');	
		
		$font_woff = ($font_woff) ? "url($font_woff) format('woff')," : '';
		$font_ttf = ($font_ttf) ? "url($font_ttf) format('truetype');" : '';

		$css = '
			@font-face {
			    font-family: \'Custom Heading Font\';
			    	src: ' . $font_woff . $font_ttf . '
				font-weight: normal;
			    font-style: normal;
			}
			.font-heading, #footer h2 {
				font-family: \'Custom Heading Font\';	
				' . $uppercase . '
			}
		';
	    wp_add_inline_style( 'cristiano-style', $css );
	}
}

function cristiano_title_font(){
	$font_subsets = implode( ',', cs_get_option('body_font_subsets', array('') ) );
	$uppercase = (cs_get_option('title_font_uppercase')) ? 'text-transform: uppercase;' : 'text-transform: none;';		
	if(cs_get_option('title_font_source', 'google') == 'google') {
		$font = cs_get_option('title_font');
		$font_family = '';
		if($font['font'] == 'google') {
			$font_family = $font['family'] . ':' . $font['variant'] . '|';
		}
	    $css = '
	    	.font-title, th {
		    	font-family: \'%1$s\';
				' . $uppercase . '		    	
	    	}
	    	
	    '; 
		wp_enqueue_style( 'cristiano-google-font-title', 'https://fonts.googleapis.com/css?family=' . $font_family . '&amp;subset=' . $font_subsets . '');	
	    wp_add_inline_style( 'cristiano-style', sprintf( $css, $font['family'] ) );		
	} else {
		$font_woff = cs_get_option('title_font_woff');
		$font_ttf  = cs_get_option('title_font_ttf');	
		
		$font_woff = ($font_woff) ? "url($font_woff) format('woff')," : '';
		$font_ttf = ($font_ttf) ? "url($font_ttf) format('truetype');" : '';

		$css = '
			@font-face {
			    font-family: \'Custom Title Font\';
			    	src: ' . $font_woff . $font_ttf . '
				font-weight: normal;
			    font-style: normal;
			}
			.font-title {
				font-family: \'Custom Title Font\';
				' . $uppercase . '	
			}
		';
	    wp_add_inline_style( 'cristiano-style', $css );
	}
}

<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Hours
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_hours extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){
	  
    $chosen_rtl = ( is_rtl() && strpos( $class, 'chosen' ) ) ? 'chosen-rtl' : '';	  
	$time_format = get_option('time_format');
	$start = ( strtotime( '00:00' ) );
	$end = ( strtotime( '23:59' ) );
    $value_defaults = array(
		'from'	=> '09:00',
		'to'    => '21:00',
		'inc'	=> '60',
    );
	$this->value = wp_parse_args( $this->element_value(), $value_defaults );
	$inc = $this->value['inc'] * 60;
	  
    echo $this->element_before();
    
	    echo '<label>' . esc_html('From:', 'cs-framework') . '</label><select name="'. $this->element_name('[from]') .'"'. $this->element_class($chosen_rtl) .'>';
		for ( $i = $start; $i <= $end; $i += $inc ) {
			$time = date( $time_format, $i );
			if($time == $this->value['from']) {
				echo "<option value=\"$time\" " .  ' selected="selected" ' . ">$time</option>";
			} else {
	        	echo '<option value="'. $time .'" '. $this->checked( $this->value['from'], $time, 'selected' ) .'>'. $time .'</option>';	
	        }
		}
		echo '</select>&nbsp;';
		
	    echo '<label>' . esc_html('To:', 'cs-framework') . '</label><select name="'. $this->element_name('[to]') .'"'. $this->element_class($chosen_rtl) .'>';
		for ( $i = $start; $i <= $end; $i += $inc ) {
			$time = date( $time_format, $i );
			if($time == $this->value['to']) {
				echo "<option value=\"$time\" " .  ' selected="selected" ' . ">$time</option>";
			} else {
	       		echo '<option value="'. $time .'" '.  $this->checked( $this->value['to'], $time, 'selected' ) .'>'. $time .'</option>';	
	       	}
		}
		echo '</select>';	
    
    echo $this->element_after();

  }

}
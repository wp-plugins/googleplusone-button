<?php
/**
 * @package Google Plusone(+1) Button
 * @version 1.2
 * @author Sagar Bhandari <webgig.sagar@gmail.com>
 */



add_shortcode( 'twg_gpo_button', 'twg_gpo_button_shortcode' );


// [twg_gpo_button]
function twg_gpo_button_shortcode( $atts ) {
		 
	return twg_gpo_button_main(); 
		
}


?>
<?php
/**
 * @package Google Plusone(+1) Button
 * @version 1.0.1
 * @author Sagar Bhandari <webgig.sagar@gmail.com>
 */



function twg_gpo_init() {
	
	if (!is_admin()) 		
	    wp_enqueue_script('gpofejs', 'http://apis.google.com/js/plusone.js','','');
}    


function twg_gpo_contents($content){
  global $single;
  
  	$twg_gpo_button_display_in = get_option('twg_gpo_button_display_in');
	
    if($twg_gpo_button_display_in == 'single' && is_single()){
		return twg_gpo_get_content_location($content);
    } else if($twg_gpo_button_display_in == 'page' && is_page()){
  		return twg_gpo_get_content_location($content);
    } else if($twg_gpo_button_display_in == 'posts' && !is_page() && !is_single()){
 		return twg_gpo_get_content_location($content);
	} else if($twg_gpo_button_display_in == 'all'){
		return twg_gpo_get_content_location($content);	
    } else {
        return $content;
    }
}

function twg_gpo_get_content_location($content){  
	$output = twg_gpo_button_main();
	$twg_gpo_button_location = get_option('twg_gpo_button_location');

	if ($twg_gpo_button_location == 'top')
		return  $output . $content;
	else if ($twg_gpo_button_location == 'bottom')
		return  $content . $output;
	else if ($twg_gpo_button_location == 'left')
		return  $output . $content ;
    else if ($twg_gpo_button_location == 'both')
		return  $output . $content . $output;
	
}


function twg_gpo_button(){
 echo twg_gpo_button_main();
}


function twg_gpo_button_main(){

	$twg_gpo_button_size       = get_option('twg_gpo_button_size');
	$twg_gpo_include_count     = get_option('twg_gpo_include_count');
	$twg_gpo_button_location   = get_option('twg_gpo_button_location');
	$twg_gpo_button_language   = get_option('twg_gpo_button_language');
	$twg_gpo_button_display_in = get_option('twg_gpo_button_display_in');
	
?>
<style type="text/css">

	#gpo_leftcontainer {
		float:left;
		top: 0px;
		left: opx;
   }

	#gpo_leftcontainer .gpo_buttons {
		margin:4px;
		padding-bottom:2px;
		float:left;
		clear:both;
	}
	
	#gpo_bottomcontainer {
		width:50%;
		padding-top:1px;
	}
	
	#gpo_bottomcontainer .gpo_buttons {
		margin:4px;
		float:left;
	}
</style>
<?php
 	
	if ($twg_gpo_button_location == 'left'){
		 return  '<div id="gpo_leftcontainer"><div class="gpo_buttons"><g:plusone size="'.$twg_gpo_button_size.'" count="'.$twg_gpo_include_count.'"></g:plusone></div></div>';
	} else if (($twg_gpo_button_location == 'top') || ($twg_gpo_button_location == 'bottom') || ($twg_gpo_button_location == 'both')){
		return '<div id="gpo_bottomcontainer">
						<div class="gpo_buttons">
								<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
						        <g:plusone size="'.$twg_gpo_button_size.'" count="'.$twg_gpo_include_count.'"></g:plusone>
						</div>
			   </div>
			   <div style="clear:both"></div>
			   <div style="padding-bottom:5px;"></div>';
	}
}
?>
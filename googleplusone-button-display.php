<?php
/**
 * @package Google Plusone(+1) Button
 * @version 1.2
 * @author Sagar Bhandari <webgig.sagar@gmail.com>
 */


add_action('wp_print_scripts','twg_gpo_print_scripts');

function twg_gpo_print_scripts(){
  $twg_gpo_button_language   = get_option('twg_gpo_button_language');
  
  if($twg_gpo_button_language!='en-US')
	   $lang = "{lang:'".$twg_gpo_button_language."'}";

  echo "<script type='text/javascript' src='http://apis.google.com/js/plusone.js'>".$lang."</script>\n";
}

function twg_gpo_init() {
	
	if (!is_admin()) {		
	   // wp_enqueue_script('gpofejs', 'http://apis.google.com/js/plusone.js','','');
	    wp_enqueue_style('gpofecss', get_bloginfo('url').'/wp-content/plugins/googleplusone-button/css/googleplusone-button-fe.css');
	}
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
	$twg_gpo_button_display_in = get_option('twg_gpo_button_display_in');
    $twg_gpo_button_language   = get_option('twg_gpo_button_language');
  
  if($twg_gpo_button_language!='en-US')
	   $lang = "{lang:'".$twg_gpo_button_language."'}";


	if ($twg_gpo_button_location == 'left'){
		 return  '<div class="gpo_leftcontainer"><div class="gpo_buttons"><g:plusone size="'.$twg_gpo_button_size.'" count="'.$twg_gpo_include_count.'"></g:plusone></div></div>';
		return $op ;
	} else if (($twg_gpo_button_location == 'top') || ($twg_gpo_button_location == 'bottom') || ($twg_gpo_button_location == 'both')){
		return '<div class="gpo_bottomcontainer">
						<div class="gpo_buttons"><!--<script type="text/javascript" src="http://apis.google.com/js/plusone.js">'.$lang.'</script>-->
						        <g:plusone href="'.get_permalink().'" size="'.$twg_gpo_button_size.'" count="'.$twg_gpo_include_count.'"></g:plusone>
						</div>
			   </div>
			   <div style="clear:both"></div>';
	}
}
?>
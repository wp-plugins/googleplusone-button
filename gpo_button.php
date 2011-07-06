<?php
/**
 * @package Google+1 Button
 * @version 1.0
 * @author Sagar Bhandari <webgig.sagar@gmail.com>
 */

/*
	Plugin Name: Google +1 Button
	Description: WordPress plugin for Google +1 button. 
	Author: Sagar Bhandari
	Author URI: http://www.thewebgig.com
	Plugin URI: http://www.thewebgig.com
	Version: 1.0
	License: GPL
*/



require_once('gpo_button_admin.php');
require_once('gpo_button_display.php');
require_once('gpo_button_shortcode.php');


/* Runs when plugin is activated */
register_activation_hook(__FILE__,'twg_gpo_install'); 

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'twg_gpo_remove' );



add_action('admin_menu', 'twg_gpo_admin_menu');
add_action('admin_init', 'twg_gpo_enqueue_scripts' );


if(!is_admin()){
	 add_action('init', 'twg_gpo_init');
	 add_filter('the_content', 'twg_gpo_contents');
	 add_filter('the_excerpt', 'twg_gpo_contents');
}

function twg_gpo_install(){

	add_option("twg_gpo_button_size", 'standard', '', 'yes');
	add_option("twg_gpo_include_count", 'true', '', 'yes');
	add_option("twg_gpo_button_location", 'top', '', 'yes');
	add_option("twg_gpo_button_language", "{lang: 'en-US'}", '', 'yes');

}

function twg_gpo_remove() {
	
	delete_option("twg_gpo_button_size", 'standard', '', 'yes');
	delete_option("twg_gpo_include_count", 'true', '', 'yes');
	delete_option("twg_gpo_button_location", 'top', '', 'yes');
	delete_option("twg_gpo_button_language", "{lang: 'en-US'}", '', 'yes');

}


function twg_gpo_enqueue_scripts(){
	wp_enqueue_script( 'gpojs', 'https://apis.google.com/js/plusone.js' );
	wp_enqueue_script( 'gpocustomjs', get_bloginfo('url').'/wp-content/plugins/gpo-button/js/gpo_button.js' );
	wp_enqueue_style( 'gpoadmincss', get_bloginfo('url').'/wp-content/plugins/gpo-button/css/gpo_button.css');
}

?>
<?php
/*
Plugin Name: MP6-Light
Plugin URI: http://wordpress.org/extend/plugins/mp6/
Description: This is a plugin changes the default styles of MP6 to a lighter theme. MP6 plugin is also required.
Version: 1.0 
Author: BandonRandon
Author URI: http://bandonrandon.wordpress.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Current Version based on MP6 1.8
*/


/**
* Add MP6-Light Styles
* This function adds the MP6-light styles if MP6 is installed and active. 
*
* @version 0.1
* @since 1.0
*/
function mp6_light_admin_theme_style() {
    	    
       if (mp6_light_plugin_check()) {
       	       wp_enqueue_style('mp6-light', plugins_url( 'css/colors-mp6-light.css', __FILE__ ));
    	   }
}
add_action('admin_enqueue_scripts', 'mp6_light_admin_theme_style');

/**
* MP6 Error
* This function throws an error if MP6 is not active. 
*
* @version 0.1
* @since 1.0
*/
function mp6_light_admin_notice(){
	
	if(!(mp6_light_plugin_check()) && current_user_can('install_plugins')){ 
		_e('<div class="error"><p>Please install the <a href="http://wordpress.org/plugins/mp6/"> MP6 Plugin</a> or disable MP6 Light</p></div>','mp6-light');
    	}
}
add_action('admin_notices', 'mp6_light_admin_notice');


/**
* Check for MP6
* This function makes sure that MP6 is active. It it used to throw an error if MP6 is not installed. 
* Most likely will be removed when MP6 becomes default theme around 3.7
*
* @version 0.1
* @since 1.0
*/
function mp6_light_plugin_check(){ 
	
	global $_wp_admin_css_colors;

	if ($_wp_admin_css_colors['mp6']) {
		return true;
	}
	
	else return;
}
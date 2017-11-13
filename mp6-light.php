<?php
/*
Plugin Name: MP6 Light
Plugin URI: http://wordpress.org/extend/plugins/mp6/
Description: This is a plugin changesthe default admin style to a lighter theme.
Version: 1.0
Author: Brooke Dukes
Author URI: http://brooke.codes
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Copyright 2017 Brooke Dukes

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

defined( 'ABSPATH' ) or die();


class mp6_light_color_scheme {


	function __construct() {
		add_action( 'admin_init' , array( $this, 'add_colors' ) );
	}

	/**
	 * Register color scheme.
   *
   * @since 1.1
   * @source Admin Color Schemes
   * @author Kelly Dwan, Mel Choyce, Dave Whitley, Kate Whitley
	 */
	function add_colors() {
		$suffix = is_rtl() ? '-rtl' : '';

		wp_admin_css_color(
			'mp6_light', __( 'MP6 Light', 'admin_schemes' ),
			plugins_url( "css/colors$suffix.css", __FILE__ ),
			array( '#eeeeee', '#cfe1ef', '#222222', '#2ea2cc' ),
			array( 'base' => '#f1f2f3', 'focus' => '#fff', 'current' => '#fff' )
		);

	}

}
// add color scheme
global $mp6_light_color_schme;
$mp6_light_color_schme = new mp6_light_color_scheme;

/**
 * Force Color Scheme
 * If FORCE_MP6_LIGHT is true remove all colorscheme options and force all users to mp6 light
 * @since 1.1
 */
if( defined( 'FORCE_MP6_LIGHT' ) ) {
  function mp6_force_color_scheme(){
    if ( ! is_admin() ) {
      return;
    }
    else{

  }

  add_filter( 'admin_init', 'mp6_force_color_scheme' );
}

/**
 * Revert on Uninstall
 * @since 1.1
 */

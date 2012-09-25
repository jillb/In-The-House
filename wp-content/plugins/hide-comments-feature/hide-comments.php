<?php

/*
Plugin Name: Hide Comments
Plugin URI: http://wordpress.org/extend/plugins/hide-comments
Version: 0.2
Author: Vitor Carvalho
Author URI: http://lightningspirit.net
Description: If you do not need Comments functionality in your Wordpress instance, you can "hide" it with this plugin.
Tags: plugin, hide, comments, comment, admin, feature, core
License: GPL2
*/


/*
 * @package Hide Comments
 * @author Vitor Carvalho
 * @copyright Lightningspirit.net 2009-2010
 * This code is released under the GPL licence version 2 or later
 * http://www.gnu.org/licenses/gpl.txt
 */



/*
 *      Hide Comments
 *      
 *      Copyright 2010 Vitor Carvalho <lightningspirit@gmail.com>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */
 



/* 
 * CHANGELOG
 * 
 * 0.1 - Initial Release
 * 
 */




// Checks if it is accessed from Wordpress Admin
if ( ! function_exists( 'add_action' ) ) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
	
}


// Wordpress version control. No compatibility with older versions. ( wp_die )
if ( version_compare( get_bloginfo( 'version' ), '2.8.0', '<' ) ) {
	wp_die( 'Hide Comments is not compatible with versions prior to 2.8' );

}


define( 'HIDE_COMMENTS_VERSION', 0.2 );

if ( version_compare( get_option( 'hide_comments_version', 0.1 ), HIDE_COMMENTS_VERSION, '<' ) ) {
	update_option( 'hide_comments_version', HIDE_COMMENTS_VERSION );

}



/* Hide comments in Admin with jQuery */
function hide_comments_admin_loads() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'hide-comments', plugins_url( basename( dirname( __FILE__ ) ) ) . '/hide-comments.js', array( 'jquery' ), 1.0 );

}
add_action( 'admin_init', 'hide_comments_admin_loads' );





/* Unregister Comments Widget */
function hide_comments_remove_widget() {
	if ( function_exists( 'unregister_widget' ) ) {
		unregister_widget( 'WP_Widget_Recent_Comments' );

	}
	
}
add_action( 'widgets_init', 'hide_comments_remove_widget', 0 );


?>

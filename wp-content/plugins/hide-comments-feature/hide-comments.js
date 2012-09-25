
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


jQuery(document).ready(function($){
	
	/* Hide Menu from Admin Entry */
	if ( $('#menu-comments').hasClass( 'menu-top-last' ) ){
		$('#menu-comments').prev().addClass( 'menu-top-last' ).find('a').addClass( 'menu-top-last' );
	}
	$('#menu-comments').remove();
		
	/* Hide Panels from Dashboard */
	$('.b-comments, .b-waiting, .b_approved, .b-spam').next().remove();
	$('#dashboard_right_now .table_discussion, .b-comments, .b-waiting, .b_approved, .b-spam').remove();
	$('label[for=dashboard_recent_comments-hide]').remove();
	$('#dashboard_recent_comments').remove();
	
	/* Hide from Posts */
	$('label[for=comments-hide]').remove();
	$('th#comments, th.column-comments, td.comments.column-comments').remove();
	
	/* Hide from Posts Edit */
	$('label[for=commentsdiv-hide], label[for=comment_status], #commentsdiv').remove();
	
	/* Settings Discussion page */
	$('label[for=default_comment_status]').next('br').remove();
	$('label[for=default_comment_status]').remove();
	$('body.options-discussion-php .form-table tr').not(':first-child').remove();
	$('body.options-discussion-php .form-table').nextAll().not('.submit').remove();

	
	
});

<?php
/*
Plugin Name: Easy Tooltip
Plugin URI: http://opensource.intelliant.fr/easy-tooltip-wordpress-plugin/
Description: Easy tooltip lets you add css tooltips to content on your posts and pages.
Version: 1.0
Author: Franz Viaud-Murat
Author URI: http://intelliant.fr
License: GPL2
*/

/*  Copyright 2012 Franz Viaud-Murat  (email : f.viaudmurat@intelliant.fr)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class EasyTooltip {

	protected $pluginPath;
	protected $pluginUrl;

	public function __construct()
	{
		// Set Plugin Path
		$this->pluginPath = dirname(__FILE__);
	
		// Set Plugin URL
		$this->pluginUrl = plugins_url('', __FILE__);
		
		add_action('init', array($this, 'init'));
		add_shortcode('tooltip', array($this, 'shortcode'));
	}
	
	public function init()
	{
    if (file_exists($this->pluginPath . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'custom.css')) {
        wp_enqueue_style('easy-tooltip', $this->pluginUrl . '/css/custom.css', '', '1.0.0');
    } else {
        wp_enqueue_style('easy-tooltip', $this->pluginUrl . '/css/easy-tooltip.css', '', '1.0.0');
    }

		add_filter('mce_buttons_3', array($this, 'mce_buttons'));
		add_filter('mce_external_plugins', array($this, 'mce_plugins'));
	}
	
	public function mce_buttons($mce_buttons)
	{
		array_push($mce_buttons, 'easy_tooltip');
		return $mce_buttons;
	}
	
	public function mce_plugins($mce_plugins)
	{
		$mce_plugins['easy_tooltip'] = $this->pluginUrl . '/shortcode.js';
		return $mce_plugins;
	}

    public function shortcode($atts, $content = null)
    {
        $html = '<a class="easy-tooltip" href="#">' . $content;
        if($atts['type'] && $atts['type'] != 'classic') {
            $title = $atts['title'] ? '<em>' . $atts['title'] . '</em>' : '';
            $html .= '<span class="custom ' . $atts['type'] . '"><img src="' . $this->pluginUrl . '/img/' . $atts['type'] . '.png" alt="' . $atts['type'] . '" height="48" width="48" />' . $title . $atts['content'];
        } else {
            $html .= '<span class="classic">' . $atts['content'];
        }
        $html .= '</span></a>';

        return $html;
    }

}

$et = new EasyTooltip();
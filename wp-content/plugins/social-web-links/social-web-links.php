<?php
/*
Plugin Name: Social Web Links
Plugin URI: http://nischalmaniar.com/social-web-links
Description: Display beautiful web profile icons on your widget or content. For more details, visit http://www.nischalmaniar.com/social-web-links/
Version: 5.0
Author: Nischal Maniar
Author URI: http://www.nischalmaniar.com
License: GPL version 3
License URI: http://www.gnu.org/licenses/gpl-3.0-standalone.html
*/

/**
 * Defining constants & global variables
 */
define('SWL_DIR_URL',plugin_dir_url(__FILE__));
define('SWL_DIR_PATH',plugin_dir_path(__FILE__));
add_option('swl_custom_social_sites',array());

/**
 * Default Social Site list
 */
$default_social_list = array('500px','aboutdotme','aim','amazon','bbcid','bebo','creativecommons',
'delicious','digg','dopplr','dribbble','ebay','email','ember','etsy',
'facebook','feed','ffffound','fireeagle','flickr','formspring','forrst',
'foursquare','geotag','getsatisfaction','github','goodreads','google+',
'google-talk','google','gowalla','huffduffer','identica','ilike','imdb',
'instagram','itunes','lanyrd','lastfm','linkedin','meetup',
'messenger','mixx','myspace','netvibes','newsvine','nikeplus','openid',
'orkut','paypal','picasa','pinboard','pintrest','plancast','posterous',
'rdio','readernaut','reddit','share','skype','slideshare','soundcloud',
'speakerdeck','spotify','stackoverflow','stumbleupon','tumblr','twitter',
'upcoming','vcard','viddler','vimeo','website','wikipedia','xbox','xing',
'yahoo-messenger','yahoo','yelp','youtube','zerply','zootool');

/**
 * Calling the required scripts and initializing options
 */
require(SWL_DIR_PATH.'admin/plugin-options.php');
$swl_options = swl_get_options();
$swl_custom_sites = get_option('swl_custom_social_sites');
require(SWL_DIR_PATH.'social-web-links-widget.php');

/**
 * Generating list of social sites to display
 */
function swl_create_list($icon_size = '', $display_style = '') {
    global $default_social_list, $swl_options, $swl_custom_sites;
    if(trim($icon_size) == '') $icon_size = $swl_options['icon_size'];
    if(trim($display_style) == '') $display_style = $swl_options['display_style'];
    $swl_list = array();
    foreach($swl_custom_sites as $entry) {
        if($icon_size == $entry['size']) {
            array_push($swl_list,array('name' => strtolower($entry['name']), 'url' => $entry['url'], 'icon' => $entry['icon']));
        }
    }
    foreach($default_social_list as $entry) {
        if(trim($swl_options[$entry.'_url']) != "") {
            $url = trim($swl_options[$entry.'_url']);
            if(!preg_match('/^http:\/\//',$url)) $url = 'http://'.$url;
            if(array_search($entry,$swl_list) == false)
                array_push($swl_list,array('name' => strtolower($entry), 'url' => $url, 'icon' => SWL_DIR_URL.'images/social/'.$entry.'_'.$icon_size.'.png'));            
        }
    }
    if(!empty($swl_list)) {
        $output = "";
        foreach($swl_list as $entry) {
            if($display_style == 'horizontal') {
                $output .= '<a class="swl_horizontal swl_inline" target="_blank" href="'.$entry['url'].'"><img src="'.$entry['icon'].'"/></a>'."\n";
            } elseif($display_style == 'one-col-noname') {
                $output .= '<p><a class="swl_one_col_noname" target="_blank" href="'.$entry['url'].'"><img src="'.$entry['icon'].'"/></a></p>'."\n";
            } elseif($display_style == 'one-col-name') {
                $output .= '<p><a class="swl_one_col_name" target="_blank" href="'.$entry['url'].'"><img src="'.$entry['icon'].'"/>'.ucwords($entry['name']).'</a></p>'."\n";
            } elseif($display_style == 'two-col-noname') {
                $output .= '<a class="swl_two_col_noname swl_inline" target="_blank" href="'.$entry['url'].'"><img src="'.$entry['icon'].'"/></a>'."\n";
            } elseif($display_style == 'two-col-name') {
                $output .= '<a class="swl_two_col_name swl_inline" target="_blank" href="'.$entry['url'].'"><img src="'.$entry['icon'].'"/>'.ucwords($entry['name']).'</a>'."\n";
            }
        }
    }
    
    if(trim($output) != "") $output = '<div id="social_web_links">'."\n".$output.'</div>'."\n";
    
    return $output;
}

/**
 * Function to directly display the icons
 * Note: Use this only when shortcode is not available, for eg. Showing icons in footer etc
 */
function swl_display() {
    echo swl_create_list();
}

/**
 * Activating widget
 */
function swl_activate_widget() {
    register_widget('Social_Web_Links_Widget');
}
add_action('widgets_init','swl_activate_widget');

/**
 * Shortcode for Social Web Links
 */
add_shortcode('social_web_link', 'swl_shortcode');
add_action('init','swl_shortcode_add_button');
function swl_shortcode($atts, $content = null) {
    return swl_create_list();
}

function swl_shortcode_add_button() {
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_external_plugins', 'swl_add_plugin');
        add_filter('mce_buttons', 'swl_register_button');
    }
}

function swl_register_button($buttons) {
    array_push($buttons,"social_web_link");
    return $buttons;
}

function swl_add_plugin($plugin_array) {
    $plugin_array['social_web_link'] = SWL_DIR_URL.'js/social-web-links-shortcode.js';
    return $plugin_array;
}

/**
 * i18n for Social Web Links plugin
 */
$swl_plugin_lang_dir = SWL_DIR_PATH."languages";
load_plugin_textdomain('swl', null, $swl_plugin_lang_dir);
?>
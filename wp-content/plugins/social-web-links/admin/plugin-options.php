<?php
/**
 * @package social-web-links
 */
?>
<?php
/**
 * Dropdowns
 */
function swl_icon_size_list() {
    $size = array(
        '16' => array('value' => '16', 'label' => __('16 x 16 pixels','swl')),
        '24' => array('value' => '24', 'label' => __('24 x 24 pixels','swl')),
        '32' => array('value' => '32', 'label' => __('32 x 32 pixels','swl')),
        '48' => array('value' => '48', 'label' => __('48 x 48 pixels','swl')),
    );
    return apply_filters('swl_icon_size_list', $size);
}

function swl_display_style_list() {
    $display_style = array(
        'horizontal' => array('value' => 'horizontal', 'label' => __('Horizontal','swl')),
        'one-col-noname' => array('value' => 'one-col-noname', 'label' => __('One Vertical Column with no names','swl')),
        'one-col-name' => array('value' => 'one-col-name', 'label' => __('One Vertical Column with names','swl')),
        'two-col-noname' => array('value' => 'two-col-noname', 'label' => __('Two Vertical Columns with no names','swl')),
        'two-col-name' => array('value' => 'two-col-name', 'label' => __('Two Vertical Columns with names','swl'))
    );
    return apply_filters('swl_display_style_list', $display_style);
}

/**
 * Defining default plugin options
 */
function swl_default_options() {
    global $default_social_list;
    $options = array(
        'icon_size' => 24,
        'display_style' => 'horizontal',
        'custom_name' => '',
        'custom_url' => '',
        'custom_icon' => ''
    );
    $social_array  = array();
    foreach($default_social_list as $entry) {
        $social_array[$entry.'_url'] = ''; 
    }
    $options = array_merge($options,$social_array);
    return apply_filters('swl_default_options', $options);
}

/**
 * Retreive plugin options
 */
function swl_get_options() {
    return get_option('swl_options', swl_default_options());
}

/**
 * Add the plugin options page to the menu
 */
function swl_activate_options() {
    $swl_plugin_page = add_options_page(__('Social Web Links Settings','swl'), __('Social Web Links Settings','swl'), 'manage_options', 'plugin_options', 'swl_options_page');
    if(!$swl_plugin_page) return;
    add_action('admin_print_styles-' . $swl_plugin_page, 'swl_enqueue_admin_scripts');
}
add_action('admin_menu', 'swl_activate_options');

/**
 * Initialize plugin options
 */
function swl_init_options() {
    if(false === swl_get_options()) add_option('swl_options', swl_default_options());
    register_setting('swl_options', 'swl_options', 'swl_validate_options');
}
add_action('admin_init', 'swl_init_options');

/**
 * Enqeueing the javascripts & stylesheets
 */
function swl_enqueue_admin_scripts($hook_suffix) {
    wp_enqueue_script('jquery');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    wp_enqueue_script('swl_color_picker', SWL_DIR_URL.'admin/jscolor.js', false, false);
    wp_enqueue_script('swl_admin_js', SWL_DIR_URL.'admin/plugin-options.js', array('jquery'), false);
    wp_enqueue_style('swl_admin_css', SWL_DIR_URL.'admin/plugin-options.css', false, false, 'all');
}

/**
 * List of settings tabs
 */
function swl_option_page_tabs() {
    $tabs = array(
        'default_social' => array('value' => 'default_social', 'label' => __('Default Social Sites','swl')),
        'custom_social' => array('value' => 'custom_social', 'label' => __('Custom Social Sites','swl')),
        'additional_settings' => array('value' => 'additional_settings', 'label' => __('Additional Settings','swl'))
    );
    return apply_filters('swl_option_page_tabs', $tabs);
}

/**
 * Adding necessary stylesheets and javascripts
 */
function swl_enqueue_scripts() {
    wp_register_style('swl-style', SWL_DIR_URL.'social-web-links.css',false,false,'all');
    wp_enqueue_style('swl-style');
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'swl_enqueue_scripts');

/**
 * Display the options page
 */
function swl_options_page() {
    global $default_social_list;
    if(isset($_POST['settings_reset'])) {
        delete_option('swl_options');
        delete_option('swl_custom_social_sites');
        add_settings_error('swl_options','settings_reset_update',__('Default settings restored','swl'),'updated');
    }
    ?>
    <div class="settings_wrap">
        <h1 class="settings_title"><?php _e('Social Web Links Settings','swl'); ?></h1>
        <div class="settings_tabs">
            <?php $first = true; ?>
            <?php foreach(swl_option_page_tabs() as $tab) { ?>
                <?php if($first) $current = ' current_tab'; else $current = ""; ?>
                <a class="settings_tab toprounded<?php echo $current; ?>" id="settings_tab_<?php echo $tab['value']; ?>" href="javascript:void(0)"><?php echo $tab['label']; ?></a>
                <?php $first = false; ?>
            <?php } ?>
            <div class="clear">.</div>
        </div>
        <form class="settings_form" method="post" id="settings_form" action="options.php">
            <div class="settings_content rounded">
                <?php
                    settings_errors();
                    settings_fields('swl_options');
                    $swl_options = swl_get_options();
                    $swl_default_options = swl_default_options();
                ?>
                <div class="settings_section current_section" id="settings_section_default_social">
                    <label><?php _e('Enter full URL of the social site you want to display','swl'); ?></label>
                    <p>
                        <?php
                            foreach($default_social_list as $entry) {
                                echo '<div class="social_field inline">';
                                echo '<img src="'.SWL_DIR_URL.'images/social/'.$entry.'_16.png"/>';
                                echo ucwords($entry).' <input type="text" name="swl_options['.$entry.'_url]" value="'.esc_attr($swl_options[$entry.'_url']).'"/>';
                                echo '</div>';
                            }
                        ?>
                    </p>
                </div>
                <div class="settings_section" id="settings_section_custom_social">
                    <label><?php _e('Social Site Name','swl'); ?></label>
                    <p>
                        <input type="text" name="swl_options[custom_name]" value=""/>
                        <span class="field_meta"><?php _e('To replace a default site with this one, use the same name as the site you want to replace','swl'); ?></span>
                    </p>
                    <label><?php _e('Social Site URL','swl'); ?></label>
                    <p>
                        <input type="text" name="swl_options[custom_url]" value=""/>
                    </p>
                    <label><?php _e('Upload social logo','swl'); ?></label>
                    <p>
                        <input type="text" name="swl_options[custom_icon]" id="custom_icon" value=""/>
                        <input id="custom_icon_upload" type="button" class="secondary image_upload" value="<?php _e('Upload Icon','swl'); ?>" />
                        <span class="field_meta"><?php _e('Only 16x16, 24x24, 32x32 and 48x48 pixel images are allowed','swl'); ?></span>
                    </p>
                </div>
                <div class="settings_section" id="settings_section_additional_settings">
                    <label><?php _e('Icon Size','swl'); ?></label>
                    <p>
                        <select name="swl_options[icon_size]">
                            <?php foreach (swl_icon_size_list() as $icon_size) { ?>
                                <option value="<?php echo $icon_size['value']; ?>" <?php selected($swl_options['icon_size'], $icon_size['value']); ?>><?php echo $icon_size['label']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="field_meta"><?php _e('Use this setting only while showing icons in the content other than widget','swl'); ?></span>
                    </p>
                    <label><?php _e('Display Style','swl'); ?></label>
                    <p>
                        <select name="swl_options[display_style]">
                            <?php foreach (swl_display_style_list() as $display_style) { ?>
                                <option value="<?php echo $display_style['value']; ?>" <?php selected($swl_options['display_style'], $display_style['value']); ?>><?php echo $display_style['label']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="field_meta"><?php _e('Use this setting only while showing icons in the content other than widget','swl'); ?></span>
                    </p>
                </div>
            </div>
            <?php submit_button(__('Save Settings','swl'),'primary rounded','settings_submit',false); ?>
        </form>
        <form class="settings_form" method="post" id="reset_form" onsubmit="return confirmAction()">
            <input type="submit" class="secondary" name="settings_reset" id="settings_reset" value="<?php _e('Reset Settings','swl'); ?>" />
        </form>
    </div>
    <?php
}

/**
 * Validate plugin options
 */
function swl_validate_options($input) {
    global $default_social_list;
    
    $output = $defaults = swl_default_options();    
    
    foreach($default_social_list as $entry)
	$output[$entry.'_url'] = esc_attr($input[$entry.'_url']);
        
    if(isset($input['icon_size']) && array_key_exists($input['icon_size'], swl_icon_size_list()))
	$output['icon_size'] = $input['icon_size'];
    if(isset($input['display_style']) && array_key_exists($input['display_style'], swl_display_style_list()))
	$output['display_style'] = $input['display_style']; 
    
    if(trim($input['custom_name']) != "" or trim($input['custom_url']) != "" or trim($input['custom_icon']) != "") {
        if($input['custom_name'] == '') add_settings_error('swl_options','invalid_custom_name',__('Invalid custom name','swl'),'error');
        else if($input['custom_url'] == '') add_settings_error('swl_options','invalid_custom_url',__('Invalid custom url','swl'),'error');
        else if(!swl_validate_image_url($input['custom_icon'])) add_settings_error('swl_options','invalid_custom_icon',__('Invalid custom icon url','swl'),'error');
        else if(!swl_validate_image_size($input['custom_icon'],16,16) and !swl_validate_image_size($input['custom_icon'],24,24) and !swl_validate_image_size($input['custom_icon'],32,32) and !swl_validate_image_size($input['custom_icon'],48,48))
            add_settings_error('swl_options','invalid_custom_icon_size',__('Icon size has to be either 16x16, 24x24, 32x32, 48x48','swl'),'error');
        else {
            $size = getimagesize($input['custom_icon']);
            $width = $size[0];
            $custom_social_sites = get_option('swl_custom_social_sites');
            array_push($custom_social_sites,array(
                'name' => strtolower($input['custom_name']),
                'url' => $input['custom_url'],
                'icon' => $input['custom_icon'],
                'size' => $width
            ));
            update_option('swl_custom_social_sites',$custom_social_sites);
        }
    }
    
    return apply_filters('swl_validate_options', $output, $input, $defaults);
}

function swl_validate_image_url($url) {
    $exp = "/^https?:\/\/(.)*\.(jpg|png|gif|ico)$/i";
    if(!preg_match($exp,$url))
        return false;
    else
        return true;
}

function swl_validate_image_size($url,$width,$height) {
    $size = getimagesize($url);
    if($size[0] != $width or $size[1] != $height)
        return false;
    else
        return true;
}
?>
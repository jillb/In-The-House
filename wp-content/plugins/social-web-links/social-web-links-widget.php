<?php
/* Social Web Links Widget */
class Social_Web_Links_Widget extends WP_Widget {
    var $settings = array('title','icon_size','display_style');
    function Social_Web_Links_Widget() {
        $widget_ops = array('description' => __('Display social profile icons on sidebar with this widget', 'swl'));
        parent::WP_Widget(false, __('Social Web Links', 'swl'), $widget_ops);
    }
    
    function widget($args, $instance) {
        extract( $args, EXTR_SKIP );
        $instance = $this->widget_enforce_defaults($instance);
        extract($instance, EXTR_SKIP);

        $unique_id = $args['widget_id'];
        echo $before_widget;
        if ($title) {
	    echo $before_title.apply_filters('widget_title', $title, $instance, $this->id_base).$after_title;
	} else echo '';
        echo swl_create_list($icon_size, $display_style);
        echo $after_widget;
    }
    
    function update($new_instance, $old_instance) {
        $new_instance = $this->widget_enforce_defaults($new_instance);
        return $new_instance;
    }

    function widget_enforce_defaults($instance) {
        $defaults = $this->widget_get_settings();
        $instance = wp_parse_args($instance, $defaults);
        $instance['title'] = strip_tags($instance['title']);
        $instance['icon_size'] = $instance['icon_size'];
        $instance['display_style'] = $instance['display_style'];
        if(!in_array($instance['icon_size'],array('16','24','32','48')))
            $instance['icon_size'] = 24;
        if(!in_array($instance['display_style'],array('horizontal','one-col-noname','one-col-name','two-col-noname','two-col-name')))
            $instance['display_style'] = 'horizontal';
        return $instance;
    }
    
    function widget_get_settings() {
        $settings = array_fill_keys($this->settings, '');
        $settings['icon_size'] = 24;
        $settings['display_style'] = 'horizontal';
        return $settings;
    }
    
    function form($instance) {
        global $shortname;
        $instance = $this->widget_enforce_defaults($instance);
        extract($instance, EXTR_SKIP);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):', 'swl'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon_size'); ?>"><?php _e('Size of icons:', 'swl'); ?></label>
            <select name="<?php echo $this->get_field_name('icon_size'); ?>" id="<?php echo $this->get_field_id('icon_size'); ?>">
                <?php foreach (swl_icon_size_list() as $swl_icon_size) { ?>
                    <option value="<?php echo $swl_icon_size['value']; ?>" <?php selected($icon_size, $swl_icon_size['value']); ?>><?php echo $swl_icon_size['label']; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('display_style'); ?>"><?php _e('Display style:', 'swl'); ?></label>
            <select name="<?php echo $this->get_field_name('display_style'); ?>" id="<?php echo $this->get_field_id('display_style'); ?>">
                <?php foreach (swl_display_style_list() as $swl_display_style) { ?>
                    <option value="<?php echo $swl_display_style['value']; ?>" <?php selected($display_style, $swl_display_style['value']); ?>><?php echo $swl_display_style['label']; ?></option>
                <?php } ?>
            </select>
        </p>
        <?php
    }
}
?>
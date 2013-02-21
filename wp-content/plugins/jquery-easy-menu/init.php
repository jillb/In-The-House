<?php



/*



Plugin Name: JQUERY EASY MENU



Plugin URI: http://www.extendyourweb.com/wordpress/jquery-easy-menu/



Description: Widget with which you can create horizontal menus submenus. The submenus assets are loaded on the web. Ideal for horizontal menus with several submenus. You can set colors, fonts, sizes of menu and submenus, plus more options.



Version: 2.1



Author: Extendyourweb.com



Author URI: http://www.extendyourweb.com



Copyright 2012  Extendyourweb.com



This program is free software; you can redistribute it and/or modify



it under the terms of the GNU General Public License as published by



the Free Software Foundation; either version 2 of the License, or



(at your option) any later version.



*/


function easymenu_enqueue_scripts() { 

echo '
 
 <link rel="stylesheet" href="'.plugins_url('/css/colorpicker.css', __FILE__).'" type="text/css" />
 
 <script type="text/javascript" src="'.plugins_url('/js/colorpicker.js', __FILE__).'"></script>
 
 <script type="text/javascript" src="'.plugins_url('/js/eye.js', __FILE__).'"></script>
 
 <script type="text/javascript" src="'.plugins_url('/js/utils.js', __FILE__).'"></script>
 
 <script type="text/javascript" src="'.plugins_url('/js/layout.js?ver=1.0.2', __FILE__).'"></script>
 


 
';

 }

function easymenu($content){



	$content = preg_replace_callback("/\[easymenu ([^]]*)\/\]/i", "easymenu_render2", $content);



	return $content;

}

function easymenu_render2($tag_string){



	return easymenu_render($tag_string, "");



}


function easymenu_render($tag_string, $instance){



$contador=rand(9, 9999999);


global $wpdb; 	



$table_name = $wpdb->prefix . "easymenu";



if(isset($tag_string[1]) && $tag_string!="") {



	$auxi1=str_replace(" ", "", $tag_string[1]);

		$myrows = $wpdb->get_results( "SELECT * FROM $table_name WHERE id = ".$auxi1.";" );

	if(count($myrows)<1) $myrows = $wpdb->get_results( "SELECT * FROM $table_name;" );


	$conta=0;



$id= $myrows[$conta]->id;



	$title = $myrows[$conta]->title;



		$width = $myrows[$conta]->width;



$height = $myrows[$conta]->height;



$values =$myrows[$conta]->ivalues;







$twidth = $myrows[$conta]->width_thumbnail;







$theight = $myrows[$conta]->height_thumbnail;







$number_thumbnails = $myrows[$conta]->number_thumbnails;

$total = $myrows[$conta]->number_thumbnails;


$border = $myrows[$conta]->border;



$round = $myrows[$conta]->round;



$tborder = $myrows[$conta]->thumbnail_border;



$thumbnail_round = $myrows[$conta]->thumbnail_round;


$sizetitle = $myrows[$conta]->sizetitle;



$sizedescription = $myrows[$conta]->sizedescription;



$sizethumbnail = $myrows[$conta]->sizethumbnail;



$font = $myrows[$conta]->font;



$color1 = $myrows[$conta]->color1;



$color2 = $myrows[$conta]->color2;







$color3 = $myrows[$conta]->color3;







$time = $myrows[$conta]->time;







$animation = $myrows[$conta]->animation;







$mode = $myrows[$conta]->mode;







$op1 = $myrows[$conta]->op1;



$op2 = $myrows[$conta]->op2;



$op3 = $myrows[$conta]->op3;



$op4 = $myrows[$conta]->op4;



$op5 = $myrows[$conta]->op5;



	



	}







else {



	$auxi1 = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);



	



	$width = empty($instance['width']) ? '&nbsp;' : apply_filters('widget_width', $instance['width']);



$height = empty($instance['height']) ? '&nbsp;' : apply_filters('widget_height', $instance['height']);



$values = empty($instance['values']) ? '&nbsp;' : apply_filters('widget_values', $instance['values']);



$twidth = empty($instance['width_thumbnail']) ? '&nbsp;' : apply_filters('widget_width_thumbnail', $instance['width_thumbnail']);



$theight = empty($instance['height_thumbnail']) ? '&nbsp;' : apply_filters('widget_height_thumbnail', $instance['height_thumbnail']);

$total = empty($instance['number_thumbnails']) ? '&nbsp;' : apply_filters('widget_number_thumbnails', $instance['number_thumbnails']);

$border = empty($instance['border']) ? '&nbsp;' : apply_filters('widget_border', $instance['border']);

$round = empty($instance['round']) ? '&nbsp;' : apply_filters('widget_round', $instance['round']);

$tborder = empty($instance['thumbnail_border']) ? '&nbsp;' : apply_filters('widget_thumbnail_border', $instance['thumbnail_border']);

$thumbnail_round = empty($instance['thumbnail_round']) ? '&nbsp;' : apply_filters('widget_thumbnail_round', $instance['thumbnail_round']);

$sizetitle = empty($instance['sizetitle']) ? '&nbsp;' : apply_filters('widget_sizetitle', $instance['sizetitle']);

$sizedescription = empty($instance['sizedescription']) ? '&nbsp;' : apply_filters('widget_sizedescription', $instance['sizedescription']);

$sizethumbnail = empty($instance['sizethumbnail']) ? '&nbsp;' : apply_filters('widget_sizethumbnail', $instance['sizethumbnail']);


$font = empty($instance['font']) ? '&nbsp;' : apply_filters('widget_font', $instance['font']);

$color1 = empty($instance['color1']) ? '&nbsp;' : apply_filters('widget_color1', $instance['color1']);

$color2 = empty($instance['color2']) ? '&nbsp;' : apply_filters('widget_color2', $instance['color2']);

$color3 = empty($instance['color3']) ? '&nbsp;' : apply_filters('widget_color3', $instance['color3']);

$time = empty($instance['time']) ? '&nbsp;' : apply_filters('widget_time', $instance['time']);

$animation = empty($instance['animation']) ? '&nbsp;' : apply_filters('widget_animation', $instance['animation']);

$mode = empty($instance['mode']) ? '&nbsp;' : apply_filters('widget_mode', $instance['mode']);

$op1 = empty($instance['op1']) ? '&nbsp;' : apply_filters('widget_op1', $instance['op1']);

$op2 = empty($instance['op2']) ? '&nbsp;' : apply_filters('widget_op2', $instance['op2']);

$op3 = empty($instance['op3']) ? '&nbsp;' : apply_filters('widget_op3', $instance['op3']);

$op4 = empty($instance['op4']) ? '&nbsp;' : apply_filters('widget_op4', $instance['op4']);

$op5 = empty($instance['op5']) ? '&nbsp;' : apply_filters('widget_op5', $instance['op5']);

$op6 = empty($instance['op6']) ? '&nbsp;' : apply_filters('widget_op6', $instance['op6']);
$op7 = empty($instance['op7']) ? '&nbsp;' : apply_filters('widget_op7', $instance['op7']);
$op8 = empty($instance['op8']) ? '&nbsp;' : apply_filters('widget_op8', $instance['op8']);
$op9 = empty($instance['op9']) ? '&nbsp;' : apply_filters('widget_op9', $instance['op9']);
$op10 = empty($instance['op10']) ? '&nbsp;' : apply_filters('widget_op10', $instance['op10']);
$op11 = empty($instance['op11']) ? '&nbsp;' : apply_filters('widget_op11', $instance['op11']);
$op12 = empty($instance['op12']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op12']);

$op13 = empty($instance['op13']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op13']);
$op14 = empty($instance['op14']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op14']);
$op15 = empty($instance['op15']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op15']);
$op16 = empty($instance['op16']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op16']);
$op17 = empty($instance['op17']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op17']);
$op18 = empty($instance['op18']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op18']);
$op19 = empty($instance['op19']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op19']);
$op20 = empty($instance['op20']) ? '&nbsp;' : apply_filters('widget_op12', $instance['op20']);


$width_thumbnail = empty($instance['width_thumbnail']) ? '&nbsp;' : apply_filters('widget_width_thumbnail', $instance['width_thumbnail']);

$number_thumbnails = empty($instance['number_thumbnails']) ? '&nbsp;' : apply_filters('widget_number_thumbnails', $instance['number_thumbnails']);


$thumbnail_border = empty($instance['thumbnail_border']) ? '&nbsp;' : apply_filters('widget_thumbnail_border', $instance['thumbnail_border']);

	}

$nav_menu=$values;

$height_level0=$height;



$height_level1=$width_thumbnail;

$height_level2=$width_thumbnail;

$id_ul=array();
$id_le=array();
$text_separation=5;



$triangle_width=5;



$first_ul="";





if ( !$nav_menu ) return;



$site_url = get_option( 'siteurl' );











$output="";



$level_active=0;



$active=-1;



$max_level=0;





$menu_items = wp_get_nav_menu_items($nav_menu);


$contador=0;


$namemenu="jqueryeasymenu".(rand());
    

   

	
   
    // $menu_list now ready to output




	$output=create_easy_menu_jquery($menu_items, 0, $namemenu);
	
	
	$output="
	
	<!-- JQUERY EASY MENU START -->
	<style>



/* 
	LEVEL ONE
*/
.s".$namemenu."                         { list-style: none !important;margin: 0; padding: 0; font: ".$sizetitle."px ".$font."; 

".$width_thumbnail."
 }
 

.s".$namemenu." a									{ text-decoration: none; }
.s".$namemenu." ul									{ list-style: none; margin:0px !important;}

.".$namemenu."                         { list-style: none !important; }

ul.".$namemenu."                         { position: relative; }
ul.".$namemenu." li                      { font-weight: bold; float: left; zoom: 1; background: #".$op1."; padding: ".$op8."px; border: ".$border."px solid #".$round.";  


/* IE */

-ms-filter: \"progid:DXImageTransform.Microsoft.gradient(startColorstr=#".$op1.", endColorstr=#".$op3.")\";

filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#".$op1.", endColorstr=#".$op3.");

/* Mozilla */

background: -moz-linear-gradient(top, #".$op1.", #".$op3.") repeat-X;

/* Safari, Google Chrome */

background: -webkit-gradient(linear, left top, left bottom, from(#".$op1."), to(#".$op3.")) repeat-X;



margin-left:".$op9."px;
-moz-border-radius: ".$op12."px;
    -webkit-border-radius: ".$op12."px;
    -khtml-border-radius: ".$op12."px;
    border-radius: ".$op12."px;
	}
ul.".$namemenu." a:hover		            { color: #".$op4."; }
ul.".$namemenu." a:active                { color: #".$color3."; }
ul.".$namemenu." li a                    { display: block; font-size:".$sizetitle."px;
	 								  color: #".$color1."; }
ul.".$namemenu." li:last-child          {  } /* Doesn't work in IE */
ul.".$namemenu." li.hover,
ul.".$namemenu." li:hover                { background: #".$thumbnail_round."; color: #".$op4."; position: relative; }
ul.".$namemenu." li.hover a              { color: #".$op4."; }


/* 
	LEVEL TWO
*/


ul.".$namemenu." ul 						{ list-style: none !important; width: ".$width."px; visibility: hidden; position: absolute; top: 100%; left: 0; }
ul.".$namemenu." ul li 					{ font-weight: normal; background: #".$op2."; border: ".$op6."px solid #".$op7."; color: #".$color2."; float: none; margin-left:0px; margin-top:".$op11."px; padding: ".$op10."px;


/* IE */

-ms-filter: \"progid:DXImageTransform.Microsoft.gradient(startColorstr=#".$op2.", endColorstr=#".$color3.")\";

filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#".$op2.", endColorstr=#".$color3.");

/* Mozilla */

background: -moz-linear-gradient(top, #".$op2.", #".$color3.") repeat-X;

/* Safari, Google Chrome */

background: -webkit-gradient(linear, left top, left bottom, from(#".$op2."), to(#".$color3.")) repeat-X;

-moz-border-radius: ".$op13."px;
    -webkit-border-radius: ".$op13."px;
    -khtml-border-radius: ".$op13."px;
    border-radius: ".$op13."px;
}
					
                                    /* IE 6 & 7 Needs Inline Block */
ul.".$namemenu." ul li:hover                { background: #".$thumbnail_border."; color: #".$op5."; }									
ul.".$namemenu." ul li a					{  width: 100%; display: inline-block; font-size:".$sizedescription."px; color: #".$color2." !important; } 
ul.".$namemenu." ul li a:hover              { color: #".$op5."; }	

/* 
	LEVEL THREE
*/
ul.".$namemenu." ul ul 					{ left: 100%; top: 0; }
ul.".$namemenu." li:hover > ul 			{ visibility: visible; }


	</style>
	<script>
	jQuery(function(){

    jQuery(\"ul.".$namemenu." li\").hover(function(){
    
        jQuery(this).addClass(\"hover\");
        jQuery('ul:first',this).css('visibility', 'visible');
    
    }, function(){
    
        jQuery(this).removeClass(\"hover\");
        jQuery('ul:first',this).css('visibility', 'hidden');
    
    });
    
   
	jQuery(\"ul.".$namemenu." li:has(ul)\").find(\"a:first\").append(\" ".$height." \");

});
	</script>
	
	
	<div class=\"s".$namemenu."\">
	".$output."
	</div>
	<!-- JQUERY EASY MENU END -->
	";


	return $output;



}


function add_header_easymenu() {

 wp_enqueue_script('jquery');




}

function create_easy_menu_jquery($menu_items, $id_menu, $namemenu) {
	
	
	$encon=0;
	
$menu_list = '';
	foreach ( (array) $menu_items as $key => $menu_item ) {
		
		if($menu_item->menu_item_parent==$id_menu) {
			
			if($encon==0) {
				if($id_menu==0) $menu_list = '<ul class="'.$namemenu.'">';
				else $menu_list = '<ul>'; 
				$encon=1;
			}
			
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= '<li><a href="' . $url . '">' . $title . '</a>';
			
			$menu_list .=create_easy_menu_jquery($menu_items, $menu_item->ID, $namemenu);
			
			$menu_list .= '</li>';
		}
	}
	if($encon==1) $menu_list .= '</ul>';
	
	return $menu_list;
}







class wp_easymenu extends WP_Widget {



	function wp_easymenu() {



		$widget_ops = array('classname' => 'wp_easymenu', 'description' => 'Horizontal menu with horizontal submenus. Choose the menu and design options.' );



		$this->WP_Widget('wp_easymenu', 'JQUERY EASY MENU', $widget_ops);



	}



	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		$site_url = get_option( 'siteurl' );

		//$instance['hide_is_admin']

			echo $before_widget;

			echo easymenu_render("", $instance);


			echo $after_widget;

	}
	
	
	
	

	function update($new_instance, $old_instance) {
		

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		$instance['width'] = strip_tags($new_instance['width']);
		$instance['height'] = strip_tags($new_instance['height']);
		$instance['border'] = strip_tags($new_instance['border']);
		$instance['round'] = strip_tags($new_instance['round']);
		$instance['width_thumbnail'] = strip_tags($new_instance['width_thumbnail']);
		$instance['height_thumbnail'] = strip_tags($new_instance['height_thumbnail']);
		$instance['thumbnail_border'] = strip_tags($new_instance['thumbnail_border']);
		$instance['thumbnail_round'] = strip_tags($new_instance['thumbnail_round']);
		$instance['number_thumbnails'] = strip_tags($new_instance['number_thumbnails']);
		
		$instance['sizetitle'] = strip_tags($new_instance['sizetitle']);
		$instance['sizedescription'] = strip_tags($new_instance['sizedescription']);
		$instance['sizethumbnail'] = strip_tags($new_instance['sizethumbnail']);
		$instance['font'] = strip_tags($new_instance['font']);
		$instance['color1'] = strip_tags($new_instance['color1']);
		$instance['color2'] = strip_tags($new_instance['color2']);
		$instance['color3'] = strip_tags($new_instance['color3']);
		
		$instance['time'] = strip_tags($new_instance['time']);
		$instance['animation'] = strip_tags($new_instance['animation']);
		$instance['mode'] = strip_tags($new_instance['mode']);
		$instance['op1'] = strip_tags($new_instance['op1']);
		$instance['op2'] = strip_tags($new_instance['op2']);
		$instance['op3'] = strip_tags($new_instance['op3']);
		$instance['op4'] = strip_tags($new_instance['op4']);
		$instance['op5'] = strip_tags($new_instance['op5']);
		
		$instance['op5'] = strip_tags($new_instance['op5']);
		$instance['op6'] = strip_tags($new_instance['op6']);
		$instance['op7'] = strip_tags($new_instance['op7']);
		$instance['op8'] = strip_tags($new_instance['op8']);
		$instance['op9'] = strip_tags($new_instance['op9']);
		$instance['op10'] = strip_tags($new_instance['op10']);
		$instance['op11'] = strip_tags($new_instance['op11']);
		$instance['op12'] = strip_tags($new_instance['op12']);
		
		$instance['op13'] = strip_tags($new_instance['op13']);
		$instance['op14'] = strip_tags($new_instance['op14']);
		$instance['op15'] = strip_tags($new_instance['op15']);
		$instance['op16'] = strip_tags($new_instance['op16']);
		$instance['op17'] = strip_tags($new_instance['op17']);
		$instance['op18'] = strip_tags($new_instance['op18']);
		$instance['op19'] = strip_tags($new_instance['op19']);
		$instance['op20'] = strip_tags($new_instance['op20']);
	

		$instance['values']=strip_tags($new_instance['values']);
		
		

		return $instance;



	}



	function form($instance) {



		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'width' => '150', 'height' => '+', 'border' => '1', 'round' => '000000', 'width_thumbnail' => '', 'height_thumbnail' => '50', 'thumbnail_border' => '555555', 'thumbnail_round' => 'cccccc', 'number_thumbnails' => 'ffffff', 'values'=>'', 'sizetitle'=>'16', 'sizedescription'=>'12', 'sizethumbnail'=>'cccccc', 'font'=>'Arial', 'color1'=>'ffffff', 'color2'=>'0f0f0f', 'color3'=>'b5b5b5', 'time'=>'dddddd', 'animation'=>'cccccc', 'mode'=>'0','op1' => '000000','op2' => 'ffffff','op3' => '6e646e','op4' =>  '222222','op5' => 'ffffff','op6' => '1','op7' => 'aaaaaa','op8' => '6','op9' => '4','op10' => '5','op11' => '2','op12' => '4','op13' => '4','op14' => '','op15' => '','op16' => '','op17' => '','op18' => '','op19' => '','op20' => '') );



		$title = strip_tags($instance['title']);



		$id=rand(0, 99999);



		$width = strip_tags($instance['width']);



		$height = strip_tags($instance['height']);



		$border = strip_tags($instance['border']);



		$round = strip_tags($instance['round']);



		$title = strip_tags($instance['title']);



		$width_thumbnail = strip_tags($instance['width_thumbnail']);



		$height_thumbnail = strip_tags($instance['height_thumbnail']);



		$thumbnail_border = strip_tags($instance['thumbnail_border']);



		$thumbnail_round = strip_tags($instance['thumbnail_round']);



		$number_thumbnails = strip_tags($instance['number_thumbnails']);



		$values = strip_tags($instance['values']);



		



		$sizetitle = strip_tags($instance['sizetitle']);



		$sizedescription = strip_tags($instance['sizedescription']);



		$sizethumbnail = strip_tags($instance['sizethumbnail']);



		$font = strip_tags($instance['font']);



		$color1 = strip_tags($instance['color1']);



		$color2 = strip_tags($instance['color2']);



		$color3 = strip_tags($instance['color3']);



		



		$time = strip_tags($instance['time']);



		$animation = strip_tags($instance['animation']);



		$mode = strip_tags($instance['mode']);



		



		$op1 = strip_tags($instance['op1']);



		$op2 = strip_tags($instance['op2']);



		$op3 = strip_tags($instance['op3']);



		$op4 = strip_tags($instance['op4']);



		$op5 = strip_tags($instance['op5']);
		
		$op6 = strip_tags($instance['op6']);
		
		$op7 = strip_tags($instance['op7']);
		
		$op8 = strip_tags($instance['op8']);
		
		$op9 = strip_tags($instance['op9']);
		
		$op10 = strip_tags($instance['op10']);
		
		$op11 = strip_tags($instance['op11']);
		
		$op12 = strip_tags($instance['op12']);
		
		$op13 = strip_tags($instance['op13']);
		$op14 = strip_tags($instance['op14']);
		$op15 = strip_tags($instance['op15']);
		$op16 = strip_tags($instance['op16']);
		$op17 = strip_tags($instance['op17']);
		$op18 = strip_tags($instance['op18']);
		$op19 = strip_tags($instance['op19']);
		$op20 = strip_tags($instance['op20']);
		


		$borderround[$round] = 'checked';



		$tborderround[$thumbnail_round] = 'checked';



		



		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );







		// If no menus exists, direct the user to go and create some.



		if ( !$menus ) {

			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';

			return;

		}
		
		$auxi=rand()*10000;
		
		
		

			?>
            <script>
			
			jQuery(document).ready(function() {
			jQuery('#<?php echo $this->get_field_id('op1'); ?>, #<?php echo $this->get_field_id('op2'); ?>, #<?php echo $this->get_field_id('op3'); ?>, #<?php echo $this->get_field_id('op4'); ?>, #<?php echo $this->get_field_id('op5'); ?>, #<?php echo $this->get_field_id('op7'); ?>, #<?php echo $this->get_field_id('color1'); ?>, #<?php echo $this->get_field_id('color2'); ?>, #<?php echo $this->get_field_id('color3'); ?>, #<?php echo $this->get_field_id('thumbnail_round'); ?>, #<?php echo $this->get_field_id('thumbnail_border'); ?>, #<?php echo $this->get_field_id('number_thumbnails'); ?>, #<?php echo $this->get_field_id('round'); ?>').ColorPicker({

	onSubmit: function(hsb, hex, rgb, el) {

		jQuery(el).val(hex);

		jQuery(el).ColorPickerHide();
		jQuery(el).css('background-color', '#' + hex);
		

	},

	onBeforeShow: function () {

		jQuery(this).ColorPickerSetColor(this.value);
		
	}
})

.bind('keyup', function(){

	jQuery(this).ColorPickerSetColor(this.value);

});
});

			</script>
            

        <p>

		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>

		<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />

	</p>

        <p>

		<label for="<?php echo $this->get_field_id('values'); ?>"><?php _e('Select Menu:'); ?></label>

		<select id="<?php echo $this->get_field_id('values'); ?>" name="<?php echo $this->get_field_name('values'); ?>">

		<?php

			foreach ( $menus as $menu ) {

				$selected = $values == $menu->term_id ? ' selected="selected"' : '';

				echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';

			}



		?>

		</select>



	</p>
    <hr/>
 <h3>Design & Configuration</h3>
 <p>



		<label for="<?php echo $this->get_field_id('width'); ?>">Submenu width(*):</label>



		<input type="text" size="8" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo $width; ?>" />



	</p>
    <p>* only number</p>
         <p>



		<label for="<?php echo $this->get_field_id('height'); ?>">Indicator submenu:</label>



		<input type="text" size="6" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo $height; ?>" />



	</p>
  
    


     
        <hr/>
    <h4>Menu Background colors:</h4>
    
     <p>
     
            <label>Main menu color 1:</label> <input id="<?php echo $this->get_field_id('op1'); ?>"  name="<?php echo $this->get_field_name('op1'); ?>"  value="<?php echo $op1; ?>" size="6" style="background-color:#<?php echo $op1; ?>" />
         
</p>


<p>
            <label>Main menu color 2:</label> <input id="<?php echo $this->get_field_id('op3'); ?>"  name="<?php echo $this->get_field_name('op3'); ?>"  value="<?php echo $op3; ?>" size="6"  style="background-color:#<?php echo $op3; ?>" />
</p>


<p>
            <label>Submenu color 1:</label> <input id="<?php echo $this->get_field_id('op2'); ?>"  name="<?php echo $this->get_field_name('op2'); ?>"  value="<?php echo $op2; ?>" size="6"  style="background-color:#<?php echo $op2; ?>" />
</p>

<p>
            <label>Submenu color 2:</label> <input id="<?php echo $this->get_field_id('color3'); ?>"  name="<?php echo $this->get_field_name('color3'); ?>"  value="<?php echo $color3; ?>" size="6"  style="background-color:#<?php echo $color3; ?>"/>
</p>

    <br/>
    <hr/>
        <h4>Buttons border/padding/rounded:</h4>
    <h5>Main menu</h5>
     <p>
     
            <label>Border(0 not border):</label> <input id="<?php echo $this->get_field_id('border'); ?>"  name="<?php echo $this->get_field_name('border'); ?>"  value="<?php echo $border; ?>" size="2" />
         
</p>



<p>
            <label>Border color:</label> <input id="<?php echo $this->get_field_id('round'); ?>"  name="<?php echo $this->get_field_name('round'); ?>"  value="<?php echo $round; ?>" size="6"  style="background-color:#<?php echo $round; ?>" />
</p>

 <p>
     
            <label>Border round(0 not round):</label> <input id="<?php echo $this->get_field_id('op12'); ?>"  name="<?php echo $this->get_field_name('op12'); ?>"  value="<?php echo $op12; ?>" size="3" />
         
</p>

 <p>
     
            <label>Padding:</label> <input id="<?php echo $this->get_field_id('op8'); ?>"  name="<?php echo $this->get_field_name('op8'); ?>"  value="<?php echo $op8; ?>" size="3" />
         
</p>

<p>
     
            <label>Buttons separation:</label> <input id="<?php echo $this->get_field_id('op9'); ?>"  name="<?php echo $this->get_field_name('op9'); ?>"  value="<?php echo $op9; ?>" size="3" />
         
</p>
<h5>Submenus</h5>
<p>
     
            <label>Border(0 not border):</label> <input id="<?php echo $this->get_field_id('op6'); ?>"  name="<?php echo $this->get_field_name('op6'); ?>"  value="<?php echo $op6; ?>" size="2" />
         
</p>



<p>
            <label>Border Color:</label> <input id="<?php echo $this->get_field_id('op7'); ?>"  name="<?php echo $this->get_field_name('op7'); ?>"  value="<?php echo $op7; ?>" size="6"  style="background-color:#<?php echo $op7; ?>" />
</p>

<p>
     
            <label>Border round(0 not round):</label> <input id="<?php echo $this->get_field_id('op13'); ?>"  name="<?php echo $this->get_field_name('op13'); ?>"  value="<?php echo $op13; ?>" size="3" />
         
</p>

<p>
     
            <label>Padding:</label> <input id="<?php echo $this->get_field_id('op10'); ?>"  name="<?php echo $this->get_field_name('op10'); ?>"  value="<?php echo $op10; ?>" size="2" />
         
</p>

<p>
     
            <label>Buttons separation:</label> <input id="<?php echo $this->get_field_id('op11'); ?>"  name="<?php echo $this->get_field_name('op11'); ?>"  value="<?php echo $op11; ?>" size="2" />
         
</p>


    <br/>
    <hr/>
     <h4>Mouse over background colors:</h4>
    
<p>
            <label>Menu:</label> <input id="<?php echo $this->get_field_id('thumbnail_round'); ?>"  name="<?php echo $this->get_field_name('thumbnail_round'); ?>"  value="<?php echo $thumbnail_round; ?>" size="6"  style="background-color:#<?php echo $thumbnail_round; ?>" />
</p>
<p>
            <label>Submenus:</label> <input id="<?php echo $this->get_field_id('thumbnail_border'); ?>"  name="<?php echo $this->get_field_name('thumbnail_border'); ?>"  value="<?php echo $thumbnail_border; ?>" size="6" style="background-color:#<?php echo $thumbnail_border; ?>" />
</p>
    <br/>
    <hr/>
    <h4>Text configurations: </h4>
    
         <p>



		<label for="<?php echo $this->get_field_id('font'); ?>">Font name:</label>



		<input type="text" size="10" id="<?php echo $this->get_field_id('font'); ?>" name="<?php echo $this->get_field_name('font'); ?>" value="<?php echo $font; ?>" />



	</p>
    
    
            <p>



		<label for="<?php echo $this->get_field_id('sizetitle'); ?>">Text size:</label>



		<input type="text" size="10" id="<?php echo $this->get_field_id('sizetitle'); ?>" name="<?php echo $this->get_field_name('sizetitle'); ?>" value="<?php echo $sizetitle; ?>" />



	</p>
    
      <p>



		<label for="<?php echo $this->get_field_id('sizedescription'); ?>">Submenus text size:</label>



		<input type="text" size="10" id="<?php echo $this->get_field_id('sizedescription'); ?>" name="<?php echo $this->get_field_name('sizedescription'); ?>" value="<?php echo $sizedescription; ?>" />



	</p>
    <hr/>
    <h4>Menus text colors:</h4>
    <p>
            <label>Main menu:</label> <input id="<?php echo $this->get_field_id('color1'); ?>"  name="<?php echo $this->get_field_name('color1'); ?>"  value="<?php echo $color1; ?>" size="6" style="background-color:#<?php echo $color1; ?>"/>
</p>
    <p>
            <label>Submenus:</label> <input id="<?php echo $this->get_field_id('color2'); ?>"  name="<?php echo $this->get_field_name('color2'); ?>"  value="<?php echo $color2; ?>" size="6" style="background-color:#<?php echo $color2; ?>"/>
</p>
    
    <hr/>
 <h4>Mouse over text colors:</h4>
    <p>
            <label>Main menu:</label> <input id="<?php echo $this->get_field_id('op4'); ?>"  name="<?php echo $this->get_field_name('op4'); ?>"  value="<?php echo $op4; ?>" size="6"  style="background-color:#<?php echo $op4; ?>"/>
</p>
    <p>
            <label>Submenus:</label> <input id="<?php echo $this->get_field_id('op5'); ?>"  name="<?php echo $this->get_field_name('op5'); ?>"  value="<?php echo $op5; ?>" size="6"  style="background-color:#<?php echo $op5; ?>"/>
</p>
  
<hr/>

<h4>More</h4>
     <p>



		<label for="<?php echo $this->get_field_id('width_thumbnail'); ?>">CSS styles div:</label>

<textarea id="<?php echo $this->get_field_id('width_thumbnail'); ?>" name="<?php echo $this->get_field_name('width_thumbnail'); ?>"> <?php echo $width_thumbnail; ?> </textarea>


		



	</p>
<p>
* The color palettes will be activated when you save the widget the first time. If the color palettes fail, reload the page.
</p>
<p>
<a href="http://www.extendyourweb.com/wordpress/jquery-easy-menu/" target="_blank">Manual & support</a>
</p>
<p>
Download more plugins and widgets:
</p>

<p>
<a href="http://www.extendyourweb.com/wordpress" target="_blank" title="Download more plugins and widgets">www.extendyourweb.com/wordpress</a>
</p>
<?php 



	}



}



add_action( 'widgets_init', create_function('', 'return register_widget("wp_easymenu");') );



add_action('wp_enqueue_scripts', 'add_header_easymenu');



add_filter('the_content', 'easymenu');



add_action('admin_head', 'easymenu_enqueue_scripts');



?>
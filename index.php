<?php
/*
Plugin Name: Defend Internet Privacy Widget
Plugin URI: http://wordpress.ieonly.com/category/my-plugins/stop-sopa-again/
Author: Eli Scheetz
Author URI: http://wordpress.ieonly.com/category/activism/
Contributors: scheeeli
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8VWNB5QEJ55TJ
Description: Help spread the word and stop CISPA, the internet government surveillance system, before it becomes US law by added this Widget on your sidebar.
Version: 1.2.11.29
*/
$IDL_Version='1.2.11.29';
/**
 * IDL Main Plugin File
 * @package IDL
*/
/*  Copyright 2011 Eli Scheetz (email: wordpress@ieonly.com)

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
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
function IDL_install() {
	global $wp_version;
	if (version_compare($wp_version, "2.6", "<"))
		die(__("This Plugin requires WordPress version 2.6 or higher"));
}
class IDL_Widget_Class extends WP_Widget {
	protected $IDL_variants;
	protected $IDL_badges;
	function IDL_Widget_Class() {
		$this->IDL_variants = array('banner','modal');
		$this->IDL_badges = array('super_badge','shield_badge','footer_badge','side_bar_badge','banner_left','banner_right');
		$this->WP_Widget('IDL-Widget', __('Defend Internet Privacy!'), array('classname' => 'widget_IDL', 'description' => __('Tell the world that you are a member of the Internet Defense League.')));
		$this->alt_option_name = 'widget_IDL';
	}
	function widget($args, $instance) {
		$LIs = '';
		extract($args);
		if (!isset($instance['title']))
			$instance['title'] = "";
		if (!(isset($instance['variant']) && is_numeric($instance['variant'])))
			$instance['variant'] = 0;
		if (!(isset($instance['badge']) && is_numeric($instance['badge'])))
			$instance['badge'] = 0;
		echo $before_widget.($instance["title"]?$before_title.$instance["title"].$after_title:'').'<a target="_blank" href="http://internetdefenseleague.org"><img src="http://internetdefenseleague.org/images/badges/final/'.$this->IDL_badges[$instance['badge']].'.png" alt="Member of The Internet Defense League" /></a>
<script type="text/javascript">
    window._idl = {};
    _idl.variant = "'.$this->IDL_variants[$instance['variant']].'";
    (function() {
        var idl = document.createElement("script");
        idl.type = "text/javascript";
        idl.async = true;
        idl.src = ("https:" == document.location.protocol ? "https://" : "http://") + "members.internetdefenseleague.org/include/?url=" + (_idl.url || "") + "&campaign=" + (_idl.campaign || "") + "&variant=" + (_idl.variant || "banner");
        document.getElementsByTagName("body")[0].appendChild(idl);
    })();
</script>'.$after_widget;
	}
	function flush_widget_cache() {
		wp_cache_delete('widget_IDL', 'widget');
	}
	function update($new, $old) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
		$instance['variant'] = (int) $new['variant'];
		$instance['badge'] = (int) $new['badge'];
		return $instance;
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$variant = isset($instance['variant']) ? absint($instance['variant']) : 0;
		$badge = isset($instance['badge']) ? absint($instance['badge']) : 0;
		echo '<p><label for="'.$this->get_field_id('title').'">'.__('Widget Title (Optional)').':</label><br />
		<input type="text" name="'.$this->get_field_name('title').'" id="'.$this->get_field_id('title').'" value="'.$title.'" /></p>
		<p><label for="'.$this->get_field_id('variant').'">Campaign notice form variant:</label><br />
		<select name="'.$this->get_field_name('variant').'" id="'.$this->get_field_id('variant').'">';
		for ($i=0; $i<count($this->IDL_variants); $i++)
			echo  '<option value="'.$i.'"'.($variant==$i?" selected":"").'>'.$this->IDL_variants[$i].'</option>';
		echo '</select></p><p><label for="'.$this->get_field_id('badge').'">Badge style and placement:</label><br />
		<select name="'.$this->get_field_name('badge').'" id="'.$this->get_field_id('badge').'">';
		for ($i=0; $i<count($this->IDL_badges); $i++)
			echo  '<option value="'.$i.'"'.($badge==$i?" selected":"").'>'.$this->IDL_badges[$i].'</option>';
		echo '</select></p>';
	}
}
function IDL_set_plugin_action_links($links_array, $plugin_file) {
	if ($plugin_file == substr(__file__, (-1 * strlen($plugin_file))) && strlen($plugin_file) > 10)
		$links_array = array_merge(array('<a href="widgets.php">'.__( 'Widgets' ).'</a>'), $links_array);
	return $links_array;
}
add_filter('plugin_action_links', 'IDL_set_plugin_action_links', 1, 2);
register_activation_hook(__FILE__,'IDL_install');
add_action('widgets_init', create_function('', 'return register_widget("IDL_Widget_Class");'));
?>

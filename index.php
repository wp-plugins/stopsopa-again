<?php
/*
Plugin Name: Stop SOPA Again! Sign the Petition Widget
Plugin URI: http://wordpress.ieonly.com/category/my-plugins/stop-sopa-again/
Author: Eli Scheetz
Author URI: http://wordpress.ieonly.com/category/activism/
Contributors: scheeeli
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8VWNB5QEJ55TJ
Description: This Widget puts a petition form on your sidebar so that visitors can help fightforthefuture.org stop internet censorship legislation.
Version: 1.2.04.08
*/
$stopSOPA_Version='1.2.04.08';
$_SESSION['eli_debug_microtime']['include(stopSOPA)'] = microtime(true);
/**
 * stopSOPA Main Plugin File
 * @package stopSOPA
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
function stopSOPA_install() {
	global $wp_version;
$_SESSION['eli_debug_microtime']['stopSOPA_install_start'] = microtime(true);
	if (version_compare($wp_version, "2.6", "<"))
		die(__("This Plugin requires WordPress version 2.6 or higher"));
$_SESSION['eli_debug_microtime']['stopSOPA_install_end'] = microtime(true);
}
class stopSOPA_Widget_Class extends WP_Widget {
	function stopSOPA_Widget_Class() {
$_SESSION['eli_debug_microtime']['stopSOPA_Widget_Class_Widget_Class_start'] = microtime(true);
		$this->WP_Widget('stopSOPA-Widget', __('Stop SOPA Again!'), array('classname' => 'widget_stopSOPA', 'description' => __('Put this petition form on your sidebar to help get signatures against SOPA.')));
		$this->alt_option_name = 'widget_stopSOPA';
$_SESSION['eli_debug_microtime']['stopSOPA_Widget_Class_Widget_Class_end'] = microtime(true);
	}
	function widget($args, $instance) {
$_SESSION['eli_debug_microtime']['_Widget_Class_widget_start'] = microtime(true);
		$LIs = '';
		extract($args);
		if (!$instance['title'])
			$instance['title'] = "Obama: Don't Help SOPA!";
		if (!$instance['number'])
			$instance['number'] = 0;
		if (!$instance['excerpt'])
			$instance['excerpt'] = "Sign to make sure SOPA 2.0 never gets written.";
		echo $before_widget.$before_title.$instance["title"].$after_title.'<div class="side">
	<p>'.$instance['excerpt'].'</p>
	<form class="ak-form" name="act" method="POST" target="_blank" action="http://a.fightforthefuture.org/act/" accept-charset="utf-8">
	<input name="utf8" value="✔" type="hidden">
	<style>
	.gridded span input { width: 100%; height: 30px; margin: 2px; }
	.gridded input[type="text" { height: 20px; }
	</style>
	    <div class="gridded">
		    <span><input id="id_name" name="name" placeholder="Your Name" onfocus="if(this.value==\'Your Name\')this.value=\'\'" onblur="if(this.value==\'\')this.value=\'Your Name\'" value="Your Name" type="text"></span>
			<span><input id="id_email" name="email" placeholder="Your Email" onfocus="if(this.value==\'Your Email\')this.value=\'\'" onblur="if(this.value==\'\')this.value=\'Your Email\'" value="Your Email" type="email"></span>
			<span><input id="id_address1" name="address1" onfocus="if(this.value==\'Your Address\')this.value=\'\'" onblur="if(this.value==\'\')this.value=\'Your Address\'" value="Your Address" placeholder="Your Address" type="text"></span>
<span><input id="id_city" name="city" onfocus="if(this.value==\'Your City\')this.value=\'\'" onblur="if(this.value==\'\')this.value=\'Your City\'" value="Your City" placeholder="Your City" type="text"></span>
		    <div id="unknown_state"><span><select name="state" id="state">
<option value="">State</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="DC">Washington, D.C.</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
</select>
</span></div>
			<input id="id_zip" name="zip" size="5" onfocus="if(this.value==\'Your Zip\')this.value=\'\'" onblur="if(this.value==\'\')this.value=\'Your Zip\'" value="Your Zip" placeholder="Your Zip" type="text">

		    <input name="country" value="United States" type="hidden">
<br />More info at <a target="_blank" href="http://a.fightforthefuture.org/sign/obama-sopa/">fightforthefuture.org</a><br /><br />
		<small>Fight for the Future may contact you about related campaigns. <a href="http://fightforthefuture.org/privacy">Privacy Policy</a>.</small>
		
		<input name="page" value="obama-sopa" type="hidden">
		<span><input type="submit" value="Sign the Petition"></span>
	</div>
	<input name="lists" value="1" type="hidden">
<input name="want_progress" value="1" type="hidden">

<input name="want_progress" value="1" type="hidden">

	<input value="act" name="form_name" type="hidden"><input value="http://a.fightforthefuture.org/sign/obama-sopa/" name="url" type="hidden"><input value="1" name="js" type="hidden"></form>
</div>'.$after_widget;
$_SESSION['eli_debug_microtime']['stopSOPA_Widget_Class_widget_end'] = microtime(true);
	}
	function flush_widget_cache() {
		wp_cache_delete('widget_stopSOPA', 'widget');
	}
	function update($new, $old) {
		$instance = $old;
		$instance['title'] = strip_tags($new['title']);
		$instance['number'] = (int) $new['number'];
		$instance['excerpt'] = ($new['excerpt']);
		return $instance;
	}
	function form( $instance ) {
$_SESSION['eli_debug_microtime']['stopSOPA_Widget_Class_form_start'] = microtime(true);
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 0;
		$excerpt = isset($instance['excerpt']) ? esc_attr($instance['excerpt']) : '';
		echo '<p><label for="'.$this->get_field_id('title').'">'.__('Alternate Widget Title').':</label><br />
		<input type="text" name="'.$this->get_field_name('title').'" id="'.$this->get_field_id('title').'" value="'.$title.'" /></p>
		<p><label for="'.$this->get_field_id('excerpt').'">Your own introduction:</label><br />
		<textarea name="'.$this->get_field_name('excerpt').'" id="'.$this->get_field_id('excerpt').'" rows="5">'.$excerpt.'</textarea></p>';
$_SESSION['eli_debug_microtime']['stopSOPA_Widget_Class_form_end'] = microtime(true);
	}
}
function stopSOPA_set_plugin_action_links($links_array, $plugin_file) {
	if ($plugin_file == substr(__file__, (-1 * strlen($plugin_file)))) {
		$_SESSION['eli_debug_microtime']['stopSOPA_set_plugin_action_links'] = microtime(true);
		$links_array = array_merge(array('<a href="widgets.php">'.__( 'Widgets' ).'</a>'), $links_array);
	}
	return $links_array;
}
add_filter('plugin_action_links', 'stopSOPA_set_plugin_action_links', 1, 2);
register_activation_hook(__FILE__,'stopSOPA_install');
add_action('widgets_init', create_function('', 'return register_widget("stopSOPA_Widget_Class");'));
$_SESSION['eli_debug_microtime']['end_include(stopSOPA)'] = microtime(true);
?>

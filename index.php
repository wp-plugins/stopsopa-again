<?php
/*
Plugin Name: Defend Privacy Widget! Call your Senators Now
Plugin URI: http://wordpress.ieonly.com/category/my-plugins/stop-sopa-again/
Author: Eli Scheetz
Author URI: http://wordpress.ieonly.com/category/activism/
Contributors: scheeeli
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8VWNB5QEJ55TJ
Description: Help spread the word and stop CISPA, the internet government surveillance system, before it becomes US law by added this Widget on your sidebar.
Version: 1.2.07.31
*/
$stopSOPA_Version='1.2.07.31';
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
		$this->WP_Widget('stopSOPA-Widget', __('Defend Privacy Widget!'), array('classname' => 'widget_stopSOPA', 'description' => __('Put this Widget on your sidebar help to stop CISPA, the internet government surveillance system, before it becomes US law.')));
		$this->alt_option_name = 'widget_stopSOPA';
$_SESSION['eli_debug_microtime']['stopSOPA_Widget_Class_Widget_Class_end'] = microtime(true);
	}
	function widget($args, $instance) {
$_SESSION['eli_debug_microtime']['_Widget_Class_widget_start'] = microtime(true);
		$LIs = '';
		extract($args);
		if (!$instance['title'])
			$instance['title'] = "";
		if (!$instance['number'])
			$instance['number'] = 0;
		if (!$instance['excerpt'])
			$instance['excerpt'] = "I don't want to give government agencies access to my emails. Vote no on s.2105 The Cybersecurity Act of 2012, and vote against any anti-privacy amendments to it. Also, vote for the pro-privacy Franken-Paul amendment.";
		echo $before_widget.($instance["title"]?$before_title.$instance["title"].$after_title:'').'<style>.meter_box {
margin-top: 15px;
padding: 10px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-moz-background-clip: padding;
-webkit-background-clip: padding-box;
background-clip: padding-box;
overflow: auto;
}
.sign {
background-color: #065DA9;
position: relative;
top: 13px;
ont-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
font-size: 16pt;
text-decoration: none;
font-weight: 700;
padding: 5px;
color: white;
text-shadow: 0 1px 1px rgba(0, 0, 0, .5);
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-moz-background-clip: padding;
-webkit-background-clip: padding-box;
background-clip: padding-box;
-moz-box-shadow: 0 3px 6px #3b2d06 /* drop shadow */, inset 0 1px 0 #7dbbf3 /* inner shadow */, 0 0 0 1px #0f71ca /* outer stroke */;
-webkit-box-shadow: 0 3px 6px #3b2d06 /* drop shadow */, inset 0 1px 0 #7dbbf3 /* inner shadow */, 0 0 0 1px #0f71ca /* outer stroke */;
box-shadow: 0 3px 6px #3b2d06 /* drop shadow */, inset 0 1px 0 #7dbbf3 /* inner shadow */, 0 0 0 1px #0f71ca /* outer stroke */;
background-image: linear-gradient(bottom, #065DA9 27%, #5E9ED5 100%);
background-image: -o-linear-gradient(bottom, #065DA9 27%, #5E9ED5 100%);
background-image: -moz-linear-gradient(bottom, #065DA9 27%, #5E9ED5 100%);
background-image: -webkit-linear-gradient(bottom, #065DA9 27%, #5E9ED5 100%);
background-image: -ms-linear-gradient(bottom, #065DA9 27%, #5E9ED5 100%);
background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0.27, #065DA9), color-stop(1, #5E9ED5) );
}
</style>
<div class="yellow"><h3>Call now to <strong>Defend Privacy</strong></h3>
   <label for="state">State: </label>
    <select id="state" name="state">
        <option selected="selected">Select your state</option>
    <option value="AK">Select your state: AK</option><option value="AL">Select your state: AL</option><option value="AR">Select your state: AR</option><option value="AZ">Select your state: AZ</option><option value="CA">Select your state: CA</option><option value="CO">Select your state: CO</option><option value="CT">Select your state: CT</option><option value="DE">Select your state: DE</option><option value="FL">Select your state: FL</option><option value="GA">Select your state: GA</option><option value="HI">Select your state: HI</option><option value="IA">Select your state: IA</option><option value="ID">Select your state: ID</option><option value="IL">Select your state: IL</option><option value="IN">Select your state: IN</option><option value="KS">Select your state: KS</option><option value="KY">Select your state: KY</option><option value="LA">Select your state: LA</option><option value="MA">Select your state: MA</option><option value="MD">Select your state: MD</option><option value="ME">Select your state: ME</option><option value="MI">Select your state: MI</option><option value="MN">Select your state: MN</option><option value="MO">Select your state: MO</option><option value="MS">Select your state: MS</option><option value="MT">Select your state: MT</option><option value="NC">Select your state: NC</option><option value="ND">Select your state: ND</option><option value="NE">Select your state: NE</option><option value="NH">Select your state: NH</option><option value="NJ">Select your state: NJ</option><option value="NM">Select your state: NM</option><option value="NV">Select your state: NV</option><option value="NY">Select your state: NY</option><option value="OH">Select your state: OH</option><option value="OK">Select your state: OK</option><option value="OR">Select your state: OR</option><option value="PA">Select your state: PA</option><option value="RI">Select your state: RI</option><option value="SC">Select your state: SC</option><option value="SD">Select your state: SD</option><option value="TN">Select your state: TN</option><option value="TX">Select your state: TX</option><option value="UT">Select your state: UT</option><option value="VA">Select your state: VA</option><option value="VT">Select your state: VT</option><option value="WA">Select your state: WA</option><option value="WI">Select your state: WI</option><option value="WV">Select your state: WV</option><option value="WY">Select your state: WY</option></select>
    
    <div id="senators"><div class="senator">
            <h2><a href="http://www.akaka.senate.gov">Daniel Akaka (D)</a></h2>
            <ul>
                
                    <li class="phone">Phone: <span id="gc-number-4" class="gc-cs-link" title="Call with Google Voice">202-224-6361</span></li>
                
                
                
                </ul>
        </div><div class="senator">
            <h2><a href="http://www.inouye.senate.gov/">Daniel Inouye (D)</a></h2>
            <ul>
                
                    <li class="phone">Phone: <span id="gc-number-5" class="gc-cs-link" title="Call with Google Voice">202-224-3934</span></li>
                
                
                
                </ul>
        </div></div>
    
    <script src="http://fightforthefuture.org/defendprivacy/js/jquery.js"></script>
    <script src="http://fightforthefuture.org/defendprivacy/js/handlebars.js"></script>
    <script src="http://fightforthefuture.org/defendprivacy/js/script.js"></script>
    <script id="senator-template" type="text/x-handlebars-template">
        <div class="senator">
            <h2>{{#if website}}<a href="{{ website }}">{{/if}}{{ fullName }} ({{ party }}){{#if website}}</a>{{/if}}</h2>
            <ul>
                {{#if phone}}
                    <li class="phone">Phone: {{ phone }}</li>
                {{/if}}
                {{#if email}}
                    <li>Email: <a href="mailto:{{ email }}">{{ email }}</a></li>
                {{/if}}
                
                </ul>
        </div>
    </script>
<h2>What to say:</h2>
    <div class="meter_box">
        <p>“'.$instance['excerpt'].'”</p>
    </div>
    <h2>Send an email too:</h2>
    <form method="POST" action="http://nt.salsalabs.com/save">
        <fieldset>
      <input type="text" name="First_Name" placeholder="Your Name"><br>
      <input type="text" name="Email" placeholder="Your email"><br>
      <input type="text" name="Street" placeholder="Your address"><br>
      <input type="text" name="Zip" placeholder="Your zip"><br>
    <input type="hidden" name="organization_KEY" value="501">
    <input type="hidden" name="redirect" value="http://fightforthefuture.org/defendprivacy/thanks"> 
    <input type="hidden" name="object" value="supporter">
    <input type="hidden" name="ip" id="signup_ip" value="72.235.77.94">
    <input type="hidden" name="user_agent" id="user_agent" value="Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.04 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19">
    <input type="hidden" name="Receive_Email" value="3">	
	<textarea>“'.$instance['excerpt'].'”</textarea>
    <p class="caption">Fight for the Future may contact you about related campaigns. <a class="caption" href="http://fightforthefuture.org/privacy/">Privacy Policy.</a></p>
</fieldset>
        <button class="sign" type="submit">Send Email Now</button>
</form>
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
		echo '<p><label for="'.$this->get_field_id('title').'">'.__('Widget Title (Optional)').':</label><br />
		<input type="text" name="'.$this->get_field_name('title').'" id="'.$this->get_field_id('title').'" value="'.$title.'" /></p>
		<p><label for="'.$this->get_field_id('excerpt').'">Alternate "What to say":</label><br />
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

<?php
/*
Plugin Name: PricingTable
Plugin URI: http://paratheme.com/items/pricing-table-plugin-for-wordpress/
Description: Long waited pricing table plugin for WordPress published to display pricing grid on your WordPress site.
Version: 1.5
Author: paratheme
Author URI: http://paratheme.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('pricingtable_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('pricingtable_plugin_dir', plugin_dir_path( __FILE__ ) );

require_once( plugin_dir_path( __FILE__ ) . 'includes/pricingtable-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/pricingtable-functions.php');


//Themes php files

require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/rounded/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/sonnet/index.php');



function pricingtable_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('pricingtable_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_localize_script('pricingtable_js', 'pricingtable_ajax', array( 'pricingtable_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('pricingtable_style', pricingtable_plugin_url.'css/style.css');
		wp_enqueue_style('pricingtable_style_common', pricingtable_plugin_url.'css/style-common.css');
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'pricingtable_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		

		
		// Style for themes
		wp_enqueue_style('pricingtable-style-flat', pricingtable_plugin_url.'themes/flat/style.css');			
		wp_enqueue_style('pricingtable-style-rounded', pricingtable_plugin_url.'themes/rounded/style.css');
		wp_enqueue_style('pricingtable-style-sonnet', pricingtable_plugin_url.'themes/sonnet/style.css');		
		
		
	}
add_action("init","pricingtable_init_scripts");




register_activation_hook(__FILE__, 'pricingtable_activation');




function pricingtable_activation()
	{
		$pricingtable_version= "1.5";
		update_option('pricingtable_version', $pricingtable_version); //update plugin version.
		
		$pricingtable_customer_type= "free"; //customer_type "free"
		update_option('pricingtable_customer_type', $pricingtable_customer_type); //update plugin version.

	}


function pricingtable_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];

			$pricingtable_themes = get_post_meta( $post_id, 'pricingtable_themes', true );

			$pricingtable_display ="";

			if($pricingtable_themes== "flat")
				{
					$pricingtable_display.= pricingtable_body_flat($post_id);
				}
				
			else if($pricingtable_themes=="rounded")
				{
					$pricingtable_display.= pricingtable_body_rounded($post_id);
				}

			else if($pricingtable_themes=="sonnet")
				{
					$pricingtable_display.= pricingtable_body_sonnet($post_id);
				}







return $pricingtable_display;



}

add_shortcode('pricingtable', 'pricingtable_display');









add_action('admin_menu', 'pricingtable_menu_init');


	
function pricingtable_menu_help(){
	include('pricingtable-help.php');	
}


function pricingtable_menu_settings(){
	include('pricingtable-settings.php');	
}



function pricingtable_menu_init() {


	add_submenu_page('edit.php?post_type=pricingtable', __('Settings','menu-wpt'), __('Settings','menu-wpt'), 'manage_options', 'pricingtable_menu_settings', 'pricingtable_menu_settings');	
		
	add_submenu_page('edit.php?post_type=pricingtable', __('Help & Upgrade','menu-wpt'), __('Help & Upgrade','menu-wpt'), 'manage_options', 'pricingtable_menu_help', 'pricingtable_menu_help');
	
	

	
	
	
	
}



?>
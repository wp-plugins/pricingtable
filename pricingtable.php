<?php
/*
Plugin Name: PricingTable
Plugin URI: http://pricing-table.com/product/premium-pricing-table-plugin-for-wordpress/
Description: Long waited pricing table plugin for WordPress published to display pricing grid on your WordPress site.
Version: 1.2
Author: wpkids
Author URI: http://pricing-table.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('pricingtable_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('pricingtable_plugin_dir', plugin_dir_path( __FILE__ ) );

require_once( plugin_dir_path( __FILE__ ) . 'includes/pricingtable-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/pricingtable-body.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/pricingtable-functions.php');




function pricingtable_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('pricingtable_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_localize_script( 'pricingtable_js', 'pricingtable_ajax', array( 'pricingtable_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('pricingtable_style', pricingtable_plugin_url.'css/style.css');
		wp_enqueue_style('pricingtable_style_common', pricingtable_plugin_url.'css/style-common.css');

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'pricingtable_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		
		
		
		
	}
add_action("init","pricingtable_init_scripts");




register_activation_hook(__FILE__, 'pricingtable_activation');




function pricingtable_activation()
	{
		$pricingtable_version= "1.2";
		update_option('pricingtable_version', $pricingtable_version); //update plugin version.
		
		$pricingtable_customer_type= "free"; //customer_type "pro", "free"
		update_option('pricingtable_customer_type', $pricingtable_customer_type); //update plugin version.

	}


function pricingtable_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];



$pricingtable_display ="";

$pricingtable_display.= pricingtable_body($post_id);
return $pricingtable_display;



}

add_shortcode('pricingtable', 'pricingtable_display');









add_action('admin_menu', 'pricingtable_menu_init');


	
function pricingtable_menu_help(){
	include('pricingtable-help.php');	
}

function pricingtable_menu_init() {

	
	add_submenu_page('edit.php?post_type=pricingtable', __('Help & Upgrade','menu-wpt'), __('Help & Upgrade','menu-wpt'), 'manage_options', 'pricingtable_menu_help', 'pricingtable_menu_help');
}



?>
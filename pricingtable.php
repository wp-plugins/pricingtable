<?php
/*
Plugin Name: PricingTable
Plugin URI: http://pricing-table.com/product/premium-pricing-table-plugin-for-wordpress/
Description: Long waited pricing table plugin for WordPress published to display pricing grid on your WordPress site.
Version: 1.6
Author: wpkids
Author URI: http://pricing-table.com
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

		//Style for font
		
		
		wp_register_style( 'Raleway', 'http://fonts.googleapis.com/css?family=Raleway:900'); 
		wp_enqueue_style( 'Raleway' );
		
		
		wp_register_style( 'ahronbd', pricingtable_plugin_url.'fonts/ahronbd.ttf'); 
		wp_enqueue_style( 'ahronbd' );
		
		wp_register_style( 'Bellerose', pricingtable_plugin_url.'fonts/Bellerose.ttf'); 
		wp_enqueue_style( 'Bellerose' );		
		

		
	}
add_action("init","pricingtable_init_scripts");







register_activation_hook(__FILE__, 'pricingtable_activation');


function pricingtable_activation()
	{
		$pricingtable_version= "1.6";
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

			else
				{
					$pricingtable_display.= pricingtable_body_flat($post_id);
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




























//Only for Pro version


		$pricingtable_customer_type = get_option('pricingtable_customer_type');

		if($pricingtable_customer_type=="pro")
			{
				
	
				
				
				//Update
				
				
				set_site_transient('update_plugins', null);
				
				// TEMP: Show which variables are being requested when query plugin API
				add_filter('plugins_api_result', 'pricingtable_notice_result', 10, 3);
				function pricingtable_notice_result($res, $action, $args) {
					return $res;
				}
				// NOTE: All variables and functions will need to be prefixed properly to allow multiple plugins to be updated
				
				
				
				$api_url = 'http://pricing-table.com/api/';
				$plugin_slug = basename(dirname(__FILE__));
				
				
				// Take over the update check
				add_filter('pre_set_site_transient_update_plugins', 'pricingtable_check_for_plugin_update');
				
				function pricingtable_check_for_plugin_update($checked_data) {
					global $api_url, $plugin_slug, $wp_version;
					
					//Comment out these two lines during testing.
					if (empty($checked_data->checked))
						return $checked_data;
					
					$args = array(
						'slug' => $plugin_slug,
						'version' => $checked_data->checked[$plugin_slug .'/'.$plugin_slug.'.php'],
					);
					$request_string = array(
							'body' => array(
								'action' => 'basic_check', 
								'request' => serialize($args),
								'api-key' => md5(get_bloginfo('url'))
							),
							'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url'),
							'pricingtable_order_id' =>  get_option( 'pricingtable_order_id' ),
							'pricingtable_order_email' =>  get_option( 'pricingtable_order_email' ),
							
						);
					
					// Start checking for an update
					$raw_response = wp_remote_post($api_url, $request_string);
					
					if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
						$response = unserialize($raw_response['body']);
					
					if (is_object($response) && !empty($response)) // Feed the update data into WP updater
						$checked_data->response[$plugin_slug .'/'. $plugin_slug .'.php'] = $response;
					
					update_option('pricingtable_customer_apikey', $response); //update api.
					
					
					
					
					return $checked_data;
				}
				
				
				// Take over the Plugin info screen
				add_filter('plugins_api', 'pricingtable_plugin_api_call', 10, 3);
				
				function pricingtable_plugin_api_call($def, $action, $args) {
					global $plugin_slug, $api_url, $wp_version;
					
					if ($args->slug != $plugin_slug)
						return false;
					
					// Get the current version
					$plugin_info = get_site_transient('update_plugins');
					$current_version = $plugin_info->checked[$plugin_slug .'/'. $plugin_slug .'.php'];
					$args->version = $current_version;
					
					$request_string = array(
							'body' => array(
								'action' => $action, 
								'request' => serialize($args),
								'api-key' => md5(get_bloginfo('url'))
							),
							'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
						);
					
					$request = wp_remote_post($api_url, $request_string);
					
					if (is_wp_error($request)) {
						$res = new WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());
					} else {
						$res = unserialize($request['body']);
						
						
						
						
						if ($res === false)
							$res = new WP_Error('plugins_api_failed', __('An unknown error occurred'), $request['body']);
					}
					
					return $res;
				}

			}





?>
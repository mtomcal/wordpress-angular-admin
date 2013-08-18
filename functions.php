<?php
/*
  Plugin Name: Wordpress Angular Admin
  Plugin URI: http://twoeyetech.com/
  Description: A boilerplate for Angular driven Wordpress settings pages
  Version: 0.0.1
  Author: Michael A Tomcal 
  Author URI: http://twoeyetech.com
 */

require 'vendor/autoload.php';

function wpamin_render_admin() {
  include 'views/settings.php';
}

function wpamin_admin_page() {
	global $wpamin_settings;
	$wpamin_settings = add_options_page(__('Wordpress Angular Admin', 'wpamin'), __('WP Angular Admin', 'wpamin'), 'manage_options', 'wpamin', 'wpamin_render_admin');
}
add_action('admin_menu', 'wpamin_admin_page');


function wpamin_load_scripts($hook) {
	global $wpamin_settings;

  $app = array(
    "app" => 'app/scripts/app.js',
    "mainctrl" => 'app/scripts/controllers/main.js',
  );
	
	if( $hook != $wpamin_settings ) {
		return;
  }

  wp_enqueue_style( 'wpamin-style', plugin_dir_url(__FILE__) . 'app/styles/wordpress-angular-admin.css');

	wp_enqueue_script('angular', plugin_dir_url(__FILE__) . 'app/components/angular/angular.js', array('jquery'));
	wp_enqueue_script('angular-resource', plugin_dir_url(__FILE__) . 'app/components/angular-resource/angular-resource.js', array('jquery', 'angular'));

  foreach($app as $handle => $path) {
    wp_enqueue_script('wpamin-' . $handle, plugin_dir_url(__FILE__) . $path, array('jquery', 'angular', 'angular-resource'));
  }

	wp_localize_script('wpamin-app', 'wpamin_vars', array(
			'nonce' => wp_create_nonce('wpamin-nonce'),
      'url' => plugin_dir_url(__FILE__),
		)
	);
		
}
add_action('admin_enqueue_scripts', 'wpamin_load_scripts');

function wpamin_process_ajax() {

  if( !isset( $_POST['wpamin_nonce'] ) || !wp_verify_nonce($_POST['wpamin_nonce'], 'wpamin-nonce') ) {
    die('Permissions check failed');	
  }
	
	die();
}
add_action('wp_ajax_wpamin_process', 'wpamin_process_ajax');

?>

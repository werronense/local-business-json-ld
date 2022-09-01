<?php
/*
Plugin Name: Local Business JSON-LD
Description: The plugin adds schema.org structured data to every page of the site in JSON-LD format.
Version: 1.0.0
Author: Stephen Werronen
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: local-business-json-ld
*/


// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


// admin area
if ( is_admin() ) {
  // include dependencies
  require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
}


// default plugin options
function lbjsonld_options_default() {
  return array(
    'business_name' => 'Business Name',
  );
}

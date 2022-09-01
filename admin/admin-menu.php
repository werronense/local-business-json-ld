<?php

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


// add sub-level administrative menu
function lbjsonld_add_sublevel_menu() {
  add_submenu_page(
    'options-general.php',
    'Local Business JSON-LD Settings',
    'Local Business JSON-LD',
    'manage_options',
    'local-business-json-ld',
    'lbjsonld_display_settings_page'
  );
}
add_action( 'admin_menu', 'lbjsonld_add_sublevel_menu' );

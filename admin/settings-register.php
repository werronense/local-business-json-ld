<?php

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


// register plugin settings
function lbjsonld_register_settings() {
  register_setting(
    'lbjsonld_options',
    'lbjsonld_options'
  );

  // Add sections to the settings
  add_settings_section(
    'lbjsonld_section_details',
    'Business Details',
    'lbjsonld_callback_section_details',
    'local-business-json-ld'
  );

  add_settings_field(
    'business_name',
    'Business Name',
    'lbjsonld_callback_field_text',
    'local-business-json-ld',
    'lbjsonld_section_details',
    [ 'id' => 'business_name', 'label' => 'The name of your business.' ]
  );
}
add_action( 'admin_init', 'lbjsonld_register_settings' );

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


// register plugin settings callbacks
function lbjsonld_callback_section_details() {
  echo '<p>Enter your business details.</p>';
}


// callback: text field
function lbjsonld_callback_field_text( $args ) {
  $options = get_option( 'lbjsonld_options', lbjsonld_options_default() );

  $id = isset( $args['id'] ) ? $args['id'] : '';
  $label = isset( $args['label'] ) ? $args['label'] : '';
  $value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

  echo '<input id="lbjsonld_options_' . $id . '" name="lbjsonld_options[' . $id . ']" type="text" size="40" value=""' . $value . '"><br>';
  echo '<label for="lbjsonld_options_' . $id . '">' . $label . '</label>';
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


// display the plugin settings page
function lbjsonld_display_settings_page() {
  // check if user access is allowed
  if ( ! current_user_can( 'manage_options' ) ) return;
  ?>

  <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">
      <?php
        // output security fields
        settings_fields( 'lbjsonld_options' );
        // output setting sections
        do_settings_sections( 'local-business-json-ld' );
        // submit button
        submit_button();
      ?>
    </form>
  </div>

  <?php
}


// default plugin options
function lbjsonld_options_default() {
  return array(
    'business_name' => 'Business Name',
  );
}

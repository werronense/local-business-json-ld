<?php

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


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

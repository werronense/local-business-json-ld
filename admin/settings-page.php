<?php

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


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

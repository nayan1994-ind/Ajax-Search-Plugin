<?php
/*
**
*** Setting Documentation Section
**
*/
function myplugin_register_settings() {
   add_option( 'myplugin_option_name', 'This is my option value.');
   register_setting( 'myplugin_options_group', 'myplugin_option_name', 'myplugin_callback' );
}
add_action( 'admin_init', 'myplugin_register_settings' );

function myplugin_register_options_page() {
  add_options_page('Page Title', 'Ajax Search Documentation', 'manage_options', 'AJAX Search', 'myplugin_options_page');
}
add_action('admin_menu', 'myplugin_register_options_page');

function myplugin_options_page()
{
?>
  <div>
  <?php screen_icon(); ?>
  <h2 style="text-align: center;text-transform: uppercase;color: #4CAF50;font-size: 27px;">Ajax Search Plugin</h2>
  <p style="text-indent: 50px; text-align: center; letter-spacing: 3px; font-size: 16px;">Please Place the Shortcode Where you want to show the Search Form.</p>
  <p style="text-indent: 50px; text-align: center; letter-spacing: 3px; font-size: 16px;">And the Short Code is : <span style="color:#ff1313;"><strong>[search]</strong></span>.</p>
  <p style="text-indent: 50px; text-align: center; letter-spacing: 3px; font-size: 16px;">Place this "<span style="color:#ff1313;"><strong>ul id="datasearches" class="datasearches">/ul></span></strong>" where you want to show the Search Result.</p>
 <p style="text-indent: 50px; text-align: center; letter-spacing: 3px; font-size: 16px;">You can edit the style file through "<span style="color:#ff1313;"><strong>Plugin Editor->Ajax Search Plugin->wp-admin.css</span><strong>".</p>
  
  </div>
<?php
} ?>
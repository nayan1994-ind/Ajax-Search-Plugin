<?php
/**
 * Plugin Name: AJAX Property Search
 * Plugin URI: https://weborbitsolutions.com
 * Description: This plugin will enable a Custom Post Type, Properties as well as, it will allow users to search using a cool AJAX method.
 * Version: 1.0.0
 * Author: 
 * License: 
 */

include(plugin_dir_path( __FILE__ ) . 'admin/acf_fields.php');

include(plugin_dir_path( __FILE__ ) . 'admin/save_acf.php');

include(plugin_dir_path( __FILE__ ) . 'admin/core/cpost_type.php');

/*
**
*** Loading external style for loader in admin.
**
*/
	function load_admin_styles() {
	    wp_enqueue_style( 'jquery_ui', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css');
		wp_enqueue_style( 'price_range_style', plugin_dir_url( __FILE__ ) . 'css/price_range_style.css');
		wp_enqueue_style('my-admin-theme', plugins_url('css/wp-admin.css', __FILE__));
		
	} 
add_action('wp_head', 'load_admin_styles');	

/*
**
*** Add Js In Footer section
**
*/

add_action("wp_footer", "pro_search_scripts");
 
function pro_search_scripts()
{
    wp_enqueue_script( 'my_custom_script1', plugin_dir_url( __FILE__ ) . 'js/jquery.min.js' );
    wp_enqueue_script( 'jquery_ui', plugin_dir_url( __FILE__ ) . 'js/jquery-ui.min.js' );
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'js/ajax-search.js' );
    wp_enqueue_script( 'price_range_script', plugin_dir_url( __FILE__ ) . 'js/price_range_script.js' );
    wp_localize_script('my_custom_script', 'ajax_url', admin_url( 'admin-ajax.php' ) );
	
}

/*
**
*** Creation of Shortcode
**
*/

function search(){
    pro_search_scripts();
    ob_start();
?>
<div id="property-search" class="property-srch">
   <?php include(plugin_dir_path( __FILE__ ) . 'admin/form.php');?>
</div>
<?php 
return ob_get_clean();
}
add_shortcode('search', 'search');

add_action('wp_ajax_property_search' , 'pro_search_scripts_callback');
add_action('wp_ajax_nopriv_property_search' , 'pro_search_scripts_callback');

include(plugin_dir_path( __FILE__ ) . 'admin/core/qr.php');

include(plugin_dir_path( __FILE__ ) . 'doc.php');
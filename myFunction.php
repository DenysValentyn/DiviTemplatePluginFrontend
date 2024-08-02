<?php
/*
Plugin Name: DiviTemp
Description: The Ultimate Divi Template Library
Version: 1.1.2
Author: DiviTemp
Author URI: https://divitemptemplates.xyz
Text Domain: https://divitemptemplates.xyz
*/
if ( !defined( 'ABSPATH' ) ) exit;
/*function my_plugin_enqueue_styles() {
    wp_enqueue_style( 'my-plugin-styles', plugins_url( 'css/styles.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'my_plugin_enqueue_styles' );*/

function my_theme_enqueue_fonts() {
    // Add custom styles to use the font
    wp_add_inline_style(
        'Satoshi',
        '@font-face {
            font-family: "Satoshi";
            src: url("' . get_template_directory_uri() . '/fonts/Satoshi-Regular.otf") format("opentype");
            font-weight: normal;
            font-style: normal;
        }
        body {
            font-family: "Satoshi", sans-serif;
        }'
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_fonts');

define ('File_URI2',plugins_url('',__FILE__));
define ('File_ROOT2',__DIR__);
define ('apibaseurl',"https://divitemptemplates.xyz/wp-content/plugins/divithemesectionadminside/apies/");
include(File_ROOT2. "/pages/register-pages.php");
// Act on plugin activation
register_activation_hook( __FILE__, "activate_myplugin2" );
// Act on plugin de-activation
register_deactivation_hook( __FILE__, "deactivate_myplugin2" );

// Activate Plugin
function activate_myplugin2() {
	// Execute tasks on Plugin activation
	// Insert DB Tables	
	 $role = get_role( 'editor' );
   	 $role->add_cap( 'manage_options' ); // capability
}
// De-activate Plugin
function deactivate_myplugin2(){
	// Execute tasks on Plugin de-activation

}
function apies_function($api_url) {
    $response = wp_remote_get( $api_url );
    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        echo "Something went wrong: $error_message";
    } else {
        // Parse the JSON response
        $data = wp_remote_retrieve_body( $response );
        $decoded_data = json_decode( $data );
		return $decoded_data;
    }
}
?>
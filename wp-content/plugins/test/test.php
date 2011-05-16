<?php
/*
Plugin Name: Plugin Test
Plugin URI: http://wordpress.test/
Description: Plugin para estudos e testes.
Version: 1.0
Author: Davi Alves
*/

global $wp_version;
if( !version_compare($wp_version, "3.0", ">=") )
	die("Vecê precisa estar usando a versão 3.0 ou superior do
	     Wordpress para que o plugin Plugin Test funcione corretamente.");

	
function google_map_it($atts, $content = NULL)
{
	shortcode_atts(array("titulo" => 'Localização:', 'endereco' => ''), $atts);
	$base_map_url = 'http://maps.google.com/maps/api/staticmap?zoom=16&sensor=false&size=256x256&format=png&center=';
	return '
	<h2>'.$atts['titulo'].'</h2>
	<img width="256" height="256"
		src="'.$base_map_url. urlencode($atts['endereco']).'" />';
}

add_shortcode('google-map-it', 'google_map_it');
//function plugin_test_activate()
//{
//	error_log("plugin test activated");
//}
//
//function plugin_test_deactivate()
//{
//	error_log("plugin test deactivated");
//}
//
//register_activation_hook(__FILE__, "plugin_test_activate");
//register_deactivation_hook(__FILE__, "plugin_test_deactivate");

?>
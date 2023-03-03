<?php

/**
 * Plugin Name: WP Calculadora
 * Plugin URI:  https://github.com/gwannon/wp-calculadora
 * Description: Plugin de de WordPress para generar una calculadora
 * Version:     1.0
 * Author:      Gwannon
 * Author URI:  https://github.com/gwannon/
 * License:     GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp_calculadora
 *
 * PHP 7.3
 * WordPress 6.1.1
 */

 //Cargamos el multi-idioma
function wp_calculadora_plugins_loaded() {
  load_plugin_textdomain('wp-calculadora', false, dirname( plugin_basename( __FILE__ ) ) . '/langs/' );
}
add_action('plugins_loaded', 'wp_calculadora_plugins_loaded', 0 );

/* ----------- Includes ------------ */
include_once(plugin_dir_path(__FILE__).'lib/shortcodes.php');
include_once(plugin_dir_path(__FILE__).'lib/admin.php');

/* ----------- Scripts ---------------*/
add_action("wp_enqueue_scripts", "wp_calculadora_scripts");
function wp_calculadora_scripts() { 
	wp_enqueue_script('jquery');
	wp_register_style(
		'wp_calculadora_styles',
		plugin_dir_url( __FILE__ ) . 'assets/css/wp_calculadora_styles.css?hash='.date("YmdHis"),
		array(),
		'1.0',
		'screen'
	);

  wp_register_script(
  	'wp_calculadora_script', 
  	plugin_dir_url( __FILE__ ) .'assets/js/wp_calculadora_scripts.js?hash='.date("YmdHis"), 
  	array ('jquery'), 
  	'1.0', 
  	false
  );
}

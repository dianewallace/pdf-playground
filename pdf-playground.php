<?php
/**
 * PDF Playground
 *
 * Just playin' around.
 *
 * @package PDF_Playground
 * @author  Diane Wallace <hello@dianewallace.co.uk>
 * @license GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       PDF Playground
 * Plugin URI:        https://github.com/dianewallace/pdf-playground
 * Description:       Playing around with PDF Generators.
 * Version:           1.0.0
 * Author:            Diane Wallace
 * Author URI:        http://dianewallace.co.uk
 * Text Domain:       pdf-playground
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
// Check for direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Set path to fonts
define( 'FPDF_FONTPATH', plugin_dir_path( __FILE__ ) . 'assets/fonts/' );

// Include files
require_once plugin_dir_path( __FILE__ ) . 'includes/controller/functions.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/controller/actions.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/controller/filters.php';
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/model/class-viewing-certificate.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/model/class-pdf-playground-html.php';

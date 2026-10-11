<?php
/**
 * Demo Importer Initialization
 *
 * This file initializes the easy demo importer.
 *
 * @package RT\ClassilistCore\DemoImporter
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

if ( ! defined( 'CLASSILIST_CORE_DEMO_IMPORTER_PATH' ) ) {
	define( 'CLASSILIST_CORE_DEMO_IMPORTER_PATH', __DIR__ );
}

if ( ! defined( 'CLASSILIST_CORE_DEMO_IMPORTER_URL' ) ) {
	define( 'CLASSILIST_CORE_DEMO_IMPORTER_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * PSR-4 Autoloader for Demo Importer
 */
spl_autoload_register(
	function ( $class ) {
		$namespaces = [
			'RT\\ClassilistCore\\DemoImporter\\' => __DIR__ . '/src/',
		];

		foreach ( $namespaces as $namespace => $base_dir ) {
			$len = strlen( $namespace );

			if ( strncmp( $namespace, $class, $len ) !== 0 ) {
				continue;
			}

			$relative_class = substr( $class, $len );
			$file           = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

			if ( file_exists( $file ) ) {
				require_once $file;
				return;
			}
		}
	}
);

// Load Configuration.
$classilist_core_config_file = __DIR__ . '/config.php';

if ( ! file_exists( $classilist_core_config_file ) ) {
	wp_die( 'Demo Importer Configuration file not found: ' . esc_html( $classilist_core_config_file ) );
}

$classilist_core_demo_config = require $classilist_core_config_file;

if ( ! is_array( $classilist_core_demo_config ) ) {
	wp_die( 'Invalid demo configuration. Configuration must return an array.' );
}

// Get current theme information.
$classilist_core_current_theme = wp_get_theme();
$classilist_core_theme_slug    = $classilist_core_current_theme->get_stylesheet();
$classilist_core_theme_name    = $classilist_core_current_theme->get( 'Name' );

// Inject current theme information.
$classilist_core_demo_config = array_merge(
	[
		'theme_name'       => $classilist_core_theme_name,
		'theme_slug'       => $classilist_core_theme_slug,
		'core_base_dir'    => CLASSILIST_CORE_BASE_DIR,
		'demo_content_dir' => CLASSILIST_CORE_DEMO_IMPORTER_PATH,
		'demo_content_url' => CLASSILIST_CORE_DEMO_IMPORTER_URL,
		'commenter_email'  => get_option( 'admin_email' ),
	],
	$classilist_core_demo_config
);

// Initialize the demo importer.
try {
	new RT\ClassilistCore\DemoImporter\Core( $classilist_core_demo_config );
} catch ( Exception $e ) {
	wp_die( 'Failed to initialize Demo Importer: ' . esc_html( $e->getMessage() ) );
}
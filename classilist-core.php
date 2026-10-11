<?php
/*
Plugin Name: ClassiList Core
Plugin URI: https://www.radiustheme.com
Description: ClassiList Core Plugin for ClassiList Theme
Version: 2.0.1
Author: RadiusTheme
Author URI: https://www.radiustheme.com
Text Domain: classilist-core
Domain Path: /languages
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'CLASSILIST_CORE' ) ) {
	$classilist_core_plugin_data = get_file_data( __FILE__, [ 'version' => 'Version' ] );
	define( 'CLASSILIST_CORE', $classilist_core_plugin_data['version'] );
	define( 'CLASSILIST_CORE_THEME_PREFIX', 'classilist' );
	define( 'CLASSILIST_CORE_BASE_URL', plugin_dir_url( __FILE__ ) );
	define( 'CLASSILIST_CORE_BASE_DIR', plugin_dir_path( __FILE__ ) );
	define( 'CLASSILIST_CORE_DEMO_CONTENT', plugin_dir_path( __FILE__ ) . 'demo-importer/' );
}

/**
 * ClassiList Core Plugin main class.
 *
 * @package ClassiList_Core
 */
class ClassiList_Core {

	/**
	 * Plugin text domain.
	 *
	 * @var string
	 */
	public $plugin = 'classilist-core';

	/**
	 * Theme initialization action hook name.
	 *
	 * @var string
	 */
	public $action = 'classilist_theme_init';

	/**
	 * Constructor - Initializes plugin hooks for demo importer, post types, and Elementor widgets.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'demo_importer' ], 17 );
		add_action( 'after_setup_theme', [ $this, 'post_types' ], 17 );
		add_action( 'after_setup_theme', [ $this, 'elementor_widgets' ] );
	}

	/**
	 * Loads the demo importer initialization file.
	 *
	 * @return void
	 */
	public function demo_importer() {
		require_once CLASSILIST_CORE_BASE_DIR . 'demo-importer/init.php';
	}

	/**
	 * Registers custom post types and post meta after theme setup.
	 *
	 * Verifies theme initialization and RT Framework availability before loading post meta configuration.
	 *
	 * @return void
	 */
	public function post_types() {
		if ( ! did_action( $this->action ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'inc/post-meta.php';
	}

	/**
	 * Initializes Elementor widget extensions if Elementor is loaded.
	 *
	 * @return void
	 */
	public function elementor_widgets() {
		if ( did_action( $this->action ) && did_action( 'elementor/loaded' ) ) {
			require_once 'elementor/init.php';
		}
	}
}

new ClassiList_Core();

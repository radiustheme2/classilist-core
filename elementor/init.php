<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.3
 */

namespace radiustheme\ClassiList_Core;

use Elementor\Plugin;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Custom_Widget_Init {

	public function __construct() {
		add_action( 'elementor/widgets/register', [ $this, 'init' ] );
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'editor_style' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'widget_categoty' ] );

		// add_filter( 'el_listing_widget_content_visibility_fields', [ $this, 'listing_slider_settings_field_new_control' ], 10, 2 );
	}

	public function editor_style() {
		$img = plugins_url( 'icon.png', __FILE__ );
		wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .rdtheme-el-custom {content: url( ' . $img . ');width: 28px;}' );
		wp_add_inline_style( 'elementor-editor', '.select2-container--default .select2-selection--single {min-width: 126px !important; min-height: 30px !important;}' );
	}

	public function init() {
		require_once __DIR__ . '/base.php';

		// Widgets -- dirname=>classname /@dev.
		$widgets1 = [
			'title'       => 'Title',
			'info-box'    => 'Info_Box',
			'cta-1'       => 'CTA_1',
			'cta-2'       => 'CTA_2',
			'accordian'   => 'Accordian',
			'google-map'  => 'Google_Map',
			'text-button' => 'Text_Button',
		];

		$widgets2 = [];
		if ( class_exists( 'Rtcl' ) ) {

			$widgets2 = [
				'listing-search'          => 'Listing_Search',
				'listing-grid'            => 'Listing_Grid',
				'listing-list'            => 'Listing_List',
				'listing-slider'          => 'Listing_Slider',
				'listing-category-box'    => 'Listing_Category_Box',
				'listing-category-slider' => 'Listing_Category_Slider',
			];

			if ( class_exists( 'RtclStore' ) ) {
				$widgets2 += [
					'listing-store-grid' => 'Listing_Store_Grid',
				];
			}
		}

		$widgets = array_merge( $widgets1, $widgets2 );
		$widgets = apply_filters( 'classilist_core_elementor_widgets', $widgets );

		foreach ( $widgets as $dirname => $class ) {
			$template_name = DIRECTORY_SEPARATOR . 'elementor-custom' . DIRECTORY_SEPARATOR . $dirname . DIRECTORY_SEPARATOR . 'class.php';
			if ( file_exists( get_stylesheet_directory() . $template_name ) ) {
				$file = get_stylesheet_directory() . $template_name;
			} elseif ( file_exists( get_template_directory() . $template_name ) ) {
				$file = get_template_directory() . $template_name;
			} else {
				$file = __DIR__ . DIRECTORY_SEPARATOR . $dirname . DIRECTORY_SEPARATOR . 'class.php';
			}

			require_once $file;

			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register( new $classname() );
		}
	}

	public function widget_categoty( $class ) {
		$id         = CLASSILIST_CORE_THEME_PREFIX . '-widgets'; // Category /@dev
		$properties = [
			'title' => __( 'RadiusTheme Elements', 'classilist-core' ),
		];

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}

	public function listing_slider_settings_field_new_control( $fields, $obj ) {

		if ( 'rtcl-listing-items' == $obj->rtcl_base ) {
			$rtcl_show_book_button = [
				[
					'type'        => Controls_Manager::SWITCHER,
					'id'          => 'rtcl_show_book_button',
					'label'       => __( 'Show Booking Button', 'cl-hotel-core' ),
					'label_on'    => __( 'On', 'cl-hotel-core' ),
					'label_off'   => __( 'Off', 'cl-hotel-core' ),
					'description' => __( 'Show or Hide Listing Booking Button. Default: Off', 'cl-hotel-core' ),
				],
			];
			$fields                = $obj->insert_new_controls( 'rtcl_show_favourites', $rtcl_show_book_button, $fields, true );
		}
		return $fields;
	}
}

new Custom_Widget_Init();

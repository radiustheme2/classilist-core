<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

use radiustheme\ClassiList\Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$classilist_core_Postmeta = RT_Postmeta::getInstance();

$classilist_core_prefix = CLASSILIST_CORE_THEME_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$classilist_core_nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$classilist_core_nav_menus = array( 'default' => __( 'Default', 'classilist-core' ) ) + $classilist_core_nav_menus;
$classilist_core_sidebars  = array( 'default' => __( 'Default', 'classilist-core' ) ) + Helper::custom_sidebar_fields();

$classilist_core_Postmeta->add_meta_box( "{$classilist_core_prefix}_page_settings", __( 'Layout Settings', 'classilist-core' ), array( 'page', 'post' ), '', '', 'high', array(
	'fields' => array(
		"{$classilist_core_prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'classilist-core' ),
			'type'    => 'group',
			'value'  => array(
				'layout' => array(
					'label'   => __( 'Layout', 'classilist-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'classilist-core' ),
						'full-width'    => __( 'Full Width', 'classilist-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'classilist-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'classilist-core' ),
					),
					'default'  => 'default',
				),
				'sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'classilist-core' ),
					'type'     => 'select',
					'options'  => $classilist_core_sidebars,
					'default'  => 'default',
				),
				'top_bar' => array(
					'label'   => __( 'Top Bar', 'classilist-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'classilist-core' ),
						'on'	  => __( 'Enable', 'classilist-core' ),
						'off'	  => __( 'Disable', 'classilist-core' ),
					),
					'default'  => 'default',
				),
				'header_style' => array(
					'label'   => __( 'Header Layout', 'classilist-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default',  'classilist-core' ),
						'1'       => __( 'Layout 1', 'classilist-core' ),
						'2'       => __( 'Layout 2', 'classilist-core' ),
					),
					'default'  => 'default',
				),
				'header_search' => array(
					'label'   => __( 'Header Search', 'classilist-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'classilist-core' ),
						'on'      => __( 'Enabled', 'classilist-core' ),
						'off'	  => __( 'Disabled', 'classilist-core' ),
					),
					'default'  => 'default',
				),
				'breadcrumb' => array(
					'label'   => __( 'Breadcrumb', 'classilist-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'classilist-core' ),
						'on'      => __( 'Enable', 'classilist-core' ),
						'off'	  => __( 'Disable', 'classilist-core' ),
					),
					'default'  => 'default',
				),
			)
		)
	)
) );
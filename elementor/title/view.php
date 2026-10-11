<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

$classilist_core_title_style    = "color:{$data['title_color']};";
$classilist_core_subtitle_style = "color:{$data['subtitle_color']};";

?>

<div class="rt-el-title">
	<h2 class="rtin-title" style="<?php echo esc_attr( $classilist_core_title_style );?>"><?php echo esc_html( $data['title'] );?></h2>
	<p class="rtin-subtitle" style="<?php echo esc_attr( $classilist_core_subtitle_style );?>"><?php echo wp_kses_post( $data['subtitle'] );?></p>
</div>
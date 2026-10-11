<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

$classilist_core_btn = $classilist_core_attr = '';

if ( !empty( $data['btnurl']['url'] ) ) {
    $classilist_core_attr  = 'href="' . $data['btnurl']['url'] . '"';
    $classilist_core_attr .= !empty( $data['btnurl']['is_external'] ) ? ' target="_blank"' : '';
    $classilist_core_attr .= !empty( $data['btnurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}
if ( !empty( $data['btntext'] ) ) {
    $classilist_core_btn = '<a class="btn rdtheme-button-1" ' . $classilist_core_attr . '>' . $data['btntext'] . '</a>';
}
?>
<div class="rt-el-cta-1 rtin-<?php echo esc_attr( $data['theme'] ); ?>">
	<h3 class="rtin-title"><?php echo esc_html( $data['title'] ); ?></h3>
	<p class="rtin-content"><?php echo wp_kses_post( $data['content'] ); ?></p>
	<?php
	if ( $classilist_core_btn ){
		echo wp_kses_post( $classilist_core_btn );
	}
	?>
</div>
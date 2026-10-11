<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

$classilist_core_attr = '';

if ( ! empty( $data['url']['url'] ) ) {
    $classilist_core_attr  = 'href="' . esc_url( $data['url']['url'] ) . '"';
    $classilist_core_attr .= ! empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
    $classilist_core_attr .= ! empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';

    $classilist_core_start_tag = '<a class="rt-el-info-box" ' . $classilist_core_attr . '>';
    $classilist_core_end_tag   = '</a>';
} else {
    $classilist_core_start_tag = '<div class="rt-el-info-box">';
    $classilist_core_end_tag   = '</div>';
}

if ( $data['icontype'] === 'image' ) {
    $classilist_core_icon = wp_get_attachment_image( $data['image']['id'], 'full' );
} else {
    $classilist_core_icon = '<i class="' . esc_attr( $data['icon'] ) . '" aria-hidden="true"></i>';
}
?>

<?php echo wp_kses_post( $classilist_core_start_tag ); ?>
<div class="rtin-icon"><?php echo wp_kses_post( $classilist_core_icon ); ?></div>
<h3 class="rtin-title"><?php echo esc_html( $data['title'] ); ?></h3>
<?php echo wp_kses_post( $classilist_core_end_tag ); ?>
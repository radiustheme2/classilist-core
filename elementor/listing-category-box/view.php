<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !$data['rt_results'] ) {
	return;
}

$classilist_core_col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col_mobile']}" ;
?>
<div class="rt-el-listing-cat-box">
	<div class="row auto-clear">
		<?php foreach ( $data['rt_results'] as $classilist_core_result ): ?>
			<div class="<?php echo esc_attr( $classilist_core_col_class )?>">
				<a class="rtin-item" href="<?php echo esc_attr( $classilist_core_result['permalink'] );?>">
					<?php if ( $data['icon'] && $classilist_core_result['icon_html'] ): ?>
						<div class="rtin-icon"><?php echo wp_kses_post( $classilist_core_result['icon_html'] );?></div>
					<?php endif; ?>
					<h3 class="rtin-title"><?php echo esc_html( $classilist_core_result['name'] );?></h3>
					<?php if ( $data['count'] ): ?>
						<div class="rtin-count">(<?php echo esc_html( $classilist_core_result['count'] );?>)</div>
					<?php endif; ?>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
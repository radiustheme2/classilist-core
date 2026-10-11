<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

$classilist_core_col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col_mobile']}" ;

?>
<div class="rtcl-store-grid">
	<div class="row auto-clear">
		<?php foreach ( $data['stores'] as $classilist_core_store ): ?>
			<?php
            /* Translators: %s is the Ads counts. */
            $classilist_core_count_html = sprintf( _nx( '%s ad', '%s ads', $classilist_core_store['count'], 'Number of Ads', 'classilist-core' ), number_format_i18n( $classilist_core_store['count'] ) );?>
			<div class="<?php echo esc_attr( $classilist_core_col_class )?>">
				<a class="rtcl-store-link" href="<?php echo esc_attr( $classilist_core_store['permalink'] );?>">
					<div class="store-thumb"><?php echo wp_kses_post( $classilist_core_store['logo'] ); ?></div>
                    <div class="item-content">
                        <h3 class="rtcl-store-title"><?php echo esc_html( $classilist_core_store['title'] ); ?></h3>
                        <div class="rtcl-store-meta"><span class="ads-count"><?php echo esc_html( $classilist_core_count_html ); ?></span></div>
                    </div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
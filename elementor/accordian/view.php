<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

use radiustheme\ClassiList\Helper;

$classilist_core_acc_id = Helper::uniqueid();
?>
<div class="rt-el-accordian">
	<div class="accordion" id="<?php echo esc_attr( $classilist_core_acc_id )?>">
		<?php foreach ( $data['items'] as $classilist_core_item ): ?>
			<?php
			$classilist_core_card_id = Helper::uniqueid();
			?>
			<div class="card">
				<div class="card-header">
					<a class="collapsed" data-toggle="collapse" data-target="#<?php echo esc_attr( $classilist_core_card_id )?>" aria-expanded="true"> <?php echo esc_html( $classilist_core_item['title'] )?></a>
				</div>
				<div id="<?php echo esc_attr( $classilist_core_card_id )?>" class="collapse" data-parent="#<?php echo esc_attr( $classilist_core_acc_id )?>">
					<div class="card-body"><?php echo wp_kses_post( $classilist_core_item['content'] )?></div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
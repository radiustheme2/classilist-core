<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.4
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

use radiustheme\ClassiList\Helper;
use radiustheme\ClassiList\URI_Helper;

$classilist_core_col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col_mobile']}" ;

$classilist_core_layout = 1;
$classilist_core_display = array(
	'cat'   => $data['cat_display'] ? true : false,
    'views'   => $data['views_display'] == 'yes' ? true : false,
    'fields'   => $data['field_display']==='yes' ? true : false,
    'label' => false,
    'type'  => $data['type_display'] == 'yes' ? true : false,
);

$classilist_core_query = $data['query'];
$classilist_core_temp = Helper::wp_set_temp_query( $classilist_core_query );
?>
<div class="rt-el-listing-grid">
	<?php if ( $classilist_core_query->have_posts() ) :?>
		<div class="row auto-clear">
			<?php while ( $classilist_core_query->have_posts() ) : $classilist_core_query->the_post();?>
				<div class="<?php echo esc_attr( $classilist_core_col_class );?>">
					<?php URI_Helper::get_template_part( 'classified-listing/custom/grid', compact( 'classilist_core_layout', 'classilist_core_display' ) ); ?>
				</div>
			<?php endwhile;?>
		</div>
	<?php endif;?>
	<?php Helper::wp_reset_temp_query( $classilist_core_temp );?>
</div>
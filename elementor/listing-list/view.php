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

$classilist_core_col_class = "col-12 col-lg-6 " ;

$classilist_core_layout = 'alt';
$classilist_core_display = array(
	'auth'   => $data['auth_display'] ? true : false,
	'cat'    => $data['cat_display'] ? true : false,
    'fields' => $data['field_display']==='yes' ? true : false,
    'label'  => false,
);

$classilist_core_query = $data['query'];
$classilist_core_temp = Helper::wp_set_temp_query( $classilist_core_query );
?>
<div class="rt-el-listing-list">
	<?php if ( $classilist_core_query->have_posts() ) :?>
		<div class="row auto-clear rtcl">
			<?php while ( $classilist_core_query->have_posts() ) : $classilist_core_query->the_post();?>
				<div class="<?php echo esc_attr( $classilist_core_col_class );?>">
					<?php URI_Helper::get_template_part( 'classified-listing/custom/list', compact( 'classilist_core_layout', 'classilist_core_display' ) );?>
				</div>
			<?php endwhile;?>
		</div>
	<?php endif; ?>

	<?php Helper::wp_reset_temp_query( $classilist_core_temp );?>
</div>
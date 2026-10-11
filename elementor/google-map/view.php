<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 *
 * @var $data array
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

?>
<div class="rt-el-google-map">
	<?php echo wp_kses_post( $data['iframe'] ); ?>
</div>
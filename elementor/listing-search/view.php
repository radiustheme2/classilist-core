<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

use radiustheme\ClassiList\URI_Helper;

?>
<div class="rt-el-listing-search rtcl">
	<?php URI_Helper::get_custom_listing_template( 'listing-search' );?>
</div>
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\ClassiList_Core;

if ( ! defined( 'ABSPATH' ) ) exit;

use radiustheme\ClassiList\Helper;

$classilist_core_layout = 1;
$classilist_core_display = array(
	'cat'   => $data['cat_display'] ? true : false,
    'views'   => $data['views_display'] == 'yes' ? true : false,
    'fields'   => $data['field_display']==='yes' ? true : false,
	'label' => false,
    'type'  => $data['type_display'] == 'yes' ? true : false,
);

$classilist_core_rand = substr(md5(wp_rand()), 0, 7);
$classilist_core_swiper_data = [
    "navigation"        => [
        "nextEl" => ".rtin-custom-nav-$classilist_core_rand .owl-next",
        "prevEl" => ".rtin-custom-nav-$classilist_core_rand .owl-prev",
    ],
    "loop"              => boolval( $data['slider_loop'] ),
    "autoplay"          => !empty( $data['slider_autoplay'] ) ? [
        "delay" => $data['slider_interval'],
        "disableOnInteraction"  => false,
        "pauseOnMouseEnter"     => boolval($data['slider_stop_on_hover'])
    ] : boolval( $data['slider_autoplay'] ),
    "speed"             => $data['slider_autoplay_speed'],
    "spaceBetween"      => 20,
    "breakpoints"       => [
        0   => [
            "slidesPerView" => $data['col_mobile']
        ],
        575   => [
            "slidesPerView" => $data['col_xs']
        ],
        767   => [
            "slidesPerView" => $data['col_sm']
        ],
        991   => [
            "slidesPerView" => $data['col_md']
        ],
        1199 => [
            "slidesPerView" => $data['col_lg']
        ]
    ]
];
$classilist_core_swiper_data = json_encode( $classilist_core_swiper_data );
$classilist_core_query = $data['query'];

?>
<div class="rt-el-listing-slider owl-wrap rtin-<?php echo esc_attr($classilist_core_layout); ?>">
    <?php if (!empty($data['slider_navigation'])) { ?>
    <div class="owl-shortcode-nav owl-custom-nav rtin-custom-nav-<?php echo esc_attr( $classilist_core_rand ) ?>">
        <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
        <div class="owl-next"><i class="fa fa-angle-right"></i></div>
    </div>
    <?php } ?>
	<div class="rtcl-carousel-slider" data-options="<?php echo esc_attr( $classilist_core_swiper_data ) ?>">
        <div class="swiper-wrapper">
    		<?php if ( $classilist_core_query->have_posts() ) :?>
    				<?php while ( $classilist_core_query->have_posts() ) : $classilist_core_query->the_post(); ?>
                        <div class="swiper-slide">
    					   <?php Helper::get_template_part( 'classified-listing/custom/grid', compact( 'classilist_core_layout', 'classilist_core_display' ) ); ?>
                        </div>
    				<?php endwhile;?>
    		<?php endif;?>
            <?php wp_reset_postdata(); ?>
    	</div>
    </div>
</div>
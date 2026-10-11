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

$classilist_core_rand = substr(md5(wp_rand()), 0, 7);
$classilist_core_swiper_data = [
    "navigation"        => [
        "nextEl"            => ".rtin-custom-nav-$classilist_core_rand .owl-next",
        "prevEl"            => ".rtin-custom-nav-$classilist_core_rand .owl-prev",
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

?>
<div class="rt-el-listing-cat-slider rt-el-listing-slider">
    <?php if (!empty($data['slider_navigation'])) { ?>
    <div class="owl-shortcode-nav owl-custom-nav rtin-custom-nav-<?php echo esc_attr( $classilist_core_rand ) ?>">
        <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
        <div class="owl-next"><i class="fa fa-angle-right"></i></div>
    </div>
    <?php } ?>
	<div class="rtcl-carousel-slider" data-options="<?php echo esc_attr( $classilist_core_swiper_data ) ?>">
        <div class="swiper-wrapper">
    		<?php foreach ( $data['rt_results'] as $classilist_core_result ): ?>
                <a class="rtin-item swiper-slide" href="<?php echo esc_attr( $classilist_core_result['permalink'] );?>">
                    <?php if ( $data['icon'] && $classilist_core_result['icon_html'] ): ?>
                        <div class="rtin-icon"><?php echo wp_kses_post( $classilist_core_result['icon_html'] );?></div>
                    <?php endif; ?>
                    <h3 class="rtin-title"><?php echo esc_html( $classilist_core_result['name'] );?></h3>
                    <?php if ( $data['count'] ): ?>
                        <div class="rtin-count">(<?php echo esc_html( $classilist_core_result['count'] );?>)</div>
                    <?php endif; ?>
                </a>
    		<?php endforeach; ?>
        </div>
	</div>
</div>
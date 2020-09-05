<?php
/*
 * Plugin Name: Woocommerce Compare Count
 */
add_action('wc_ajax_woocc', 'woocompareChangeCount');
add_action('wc_ajax_nopriv_woocc', 'woocompareChangeCount');

add_action('wp_enqueue_scripts', 'woocompareFn2');
function woocompareFn2(){
    wp_enqueue_script('woocompare-count', plugins_url('woocommerce-compare-count.js', __FILE__), array('jquery'), false, true);
    wp_localize_script('woocompare-count', 'woocCount', array(
        'ajaxurl' => '/?wc-ajax='
    ));
}
function woocompareChangeCount(){
    global $yith_woocompare;
    echo count( $yith_woocompare->obj->products_list );
}
function woocompareTemplate(){
    ob_start();
    global $yith_woocompare;
    echo '<div class="woocompare-count">';
    echo count( $yith_woocompare->obj->products_list );
    echo '</div>';
    echo ob_get_clean();
}
add_shortcode('woocompare-count', 'woocompareTemplate');
<?php
/**
 * Woocommerce Compatibility 
 *
 * @package Simpledesign
 */


if ( !class_exists('WooCommerce') )
    return;

/**
 * Declare support
 */

function simpledesign_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'simpledesign_woocommerce_support' );

/**
 * Add and remove actions
 */
function simpledesign_woo_actions() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    add_action('woocommerce_before_main_content', 'simpledesign_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'simpledesign_wrapper_end', 10);
}
add_action('wp','simpledesign_woo_actions');

/**
 * Archive titles
 */
function simpledesign_woo_archive_title() {
    echo '<h3 class="entry-title">';
    echo woocommerce_page_title();
    echo '</h3>';
}
add_filter( 'woocommerce_show_page_title', 'simpledesign_woo_archive_title' );

/**
 * Theme wrappers
 */
function simpledesign_wrapper_start() {
    echo '<div id="primary" class="content-area">';
        echo '<main id="main" class="site-main" role="main">';
}

function simpledesign_wrapper_end() {
        echo '</main>';
    echo '</div>';
}

/**
 * Number of columns per row
 */
function simpledesign_shop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'simpledesign_shop_columns');

/**
 * Number of related products
 */
function simpledesign_related_products_args( $args ) {
    $args['posts_per_page'] = 3;
    $args['columns'] = 3;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'simpledesign_related_products_args' );
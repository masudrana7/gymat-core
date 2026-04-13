<?php
/**
 * Theme Demo Configuration File
 *
 * This file contains the configuration for the demo importer.
 *
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'This script cannot be accessed directly.' );
}

return [
    // Basic theme information.
    'blog_slug'           => 'blog',
    'demo_url'            => 'https://www.radiustheme.com/demo/wordpress/themes/gymat/',
    'commenter_email'     => 'dev-email@wpengine.local',
    'menus'               => [
        'primary'  => 'Main Menu',
        'header_5_left_menu'  => 'Header 5 Left Menu',
        'header_5_right_menu'  => 'Header 5 Right Menu',
    ],

    // File paths.
    'demo_content_zip'    => 'demo-files/demo-content.zip',

    // Demo variants.
    'demo_variants'       => [
        'home-1' => [
            'name'    => 'Home',
            'preview' => 'screenshots/screenshot1.jpg',
            'url'     => '',
        ],
        'home-2' => [
            'name'    => 'Home 2',
            'preview' => 'screenshots/screenshot2.jpg',
            'url'     => 'home-2/',
        ],
        'home-3' => [
            'name'    => 'Home 3',
            'preview' => 'screenshots/screenshot3.jpg',
            'url'     => 'home-3/',
        ],
        'home-4' => [
            'name'    => 'Home 4',
            'preview' => 'screenshots/screenshot4.jpg',
            'url'     => 'home-4/',
        ],
        'home-5' => [
            'name'    => 'Home 5',
            'preview' => 'screenshots/screenshot5.jpg',
            'url'     => 'home-5/',
        ],
    ],

    // Additional settings.
    'settings_json'       => [
        '_fluentform_global_form_settings',
        'mc4wp_default_form_id',
    ],
    'fluent_forms_json'   => 'fluentform',

    // WordPress repository plugins.
    'wp_plugins'          => [
        'breadcrumb-navxt'               => 'Breadcrumb NavXT',
        'elementor'                      => 'Elementor Page Builder',
        'fluentform'                     => 'WP Fluent Forms',
        'mailchimp-for-wp'               => 'Mailchimp for WordPress',
        'woocommerce'                    => 'WooCommerce',
        'shopbuilder'                    => 'ShopBuilder – Elementor WooCommerce Builder Addons',
    ],

    // Bundled/Premium plugins.
    'bundled_plugins'     => [
        'rt-framework'                       => [
            'name' => 'RT Framework',
            'file' => 'inc/plugins/rt-framework.zip',
        ],
    ],

    // Enable/disable import features.
    'features'            => [
        'woo_support'     => true,
        'elementor_fixes' => true,
    ],
    'elementor_fixes' => [
        'rt-woo-category'     => [ 'repeater_product_cat_infos' => 'category_name' ],
    ],

    // Pre-import options.
    'pre_import_options'  => [
        'elementor_experiment-e_font_icon_svg' => 'inactive',
    ],

    // Post-import options.
    'post_import_options' => [
        'elementor_unfiltered_files_upload' => true,
    ],
];

<?php
if (function_exists('acf_add_options_page')) {
    add_action('init', function () {

        // Propepery Info
        acf_add_options_page(array(
            'page_title'    => 'Property Info',
            'menu_title'    => 'Property Info',
            'menu_slug'    => 'property-info',
            'icon_url'    => 'dashicons-building',
            'show_in_graphql' => true,
            'parent_slug'   => '',
        ));

        acf_add_options_page(array(
            'page_title'    => 'General Information',
            'menu_title'    => 'General Information',
            'show_in_graphql' => true,
            'parent_slug'   => 'property-info',
        ));

        acf_add_options_page(array(
            'page_title'    => 'Photos & Videos',
            'menu_title'    => 'Photos & Videos',
            'show_in_graphql' => true,
            'parent_slug'   => 'property-info',
        ));

        acf_add_options_page(array(
            'page_title'    => 'Property Policy',
            'menu_title'    => 'Property Policy',
            'show_in_graphql' => true,
            'parent_slug'   => 'property-info',
        ));

        acf_add_options_page(array(
            'page_title'    => 'Room Amenities',
            'menu_title'    => 'Room Amenities',
            'show_in_graphql' => true,
            'parent_slug'   => 'property-info',
        ));

        acf_add_options_page(array(
            'page_title'    => 'Facilities & Services',
            'menu_title'    => 'Facilities & Services',
            'show_in_graphql' => true,
            'parent_slug'   => 'property-info',
        ));

        // Theme Options 
        acf_add_options_page(array(
            'page_title'    => 'Theme Options',
            'menu_title'    => 'Theme Options',
            'menu_slug'    => 'theme-options',
            'icon_url'    => 'dashicons-admin-settings',
            'show_in_graphql' => true,
            'parent_slug'   => '',
        ));

    });
}

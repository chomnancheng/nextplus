<?php 
if ( class_exists('ACF') ) {
    add_filter('pre_option_blogname', 'update_site_title');
    function update_site_title() {
        $site_title = get_field('site_title', 'option');
        return $site_title !== false ? $site_title : get_option('blogname');
    }

    add_filter('pre_option_blogdescription', 'update_site_tagline');
    function update_site_tagline() {
        $site_tagline = get_field('site_tagline', 'option');
        return $site_tagline !== false ? $site_tagline : get_option('blogdescription');
    }
}
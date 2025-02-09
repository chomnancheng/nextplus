<?php 

# Load & save PHP.
add_action('acf/init', 'nextplus_acfe_php_path');
function nextplus_acfe_php_path(){
    acf_update_setting('acfe/php_save', plugin_dir_path( __FILE__ ) . 'acfe-php');
    acf_update_setting('acfe/php_load', array(plugin_dir_path( __FILE__ ) . 'acfe-php'));
}

# Load the JSON.
add_filter('acf/settings/load_json', 'nextplus_json_load_path');
function nextplus_json_load_path( $paths ) {
    unset( $paths[0] );
    $paths[] = get_stylesheet_directory() . '/components/acf-json';
    return $paths;
}

# Save the JSON.
add_filter('acf/settings/save_json', 'nextplus_json_save_path');
function nextplus_json_save_path( $path ) {
    $path = get_stylesheet_directory() . '/components/acf-json';
    return $path;
}

# Sync Post Types JSON
add_filter('cptui_get_post_type_data', 'nextplus_get_cptui_post_type_data');
function nextplus_get_cptui_post_type_data() {
    $path = get_stylesheet_directory() . '/components/cptui-json/post-types.json';
    if (file_exists($path)) {
        $data = json_decode(file_get_contents($path), true);
        return $data ?: array();
    }
    return array();
}

add_action('cptui_after_update_post_type', 'nextplus_save_cptui_post_type_data');
function nextplus_save_cptui_post_type_data($data) {
    $path = get_stylesheet_directory() . '/components/cptui-json';
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    file_put_contents($path . '/post-types.json', json_encode($data, JSON_PRETTY_PRINT));
}

# Sync Taxonomies JSON
add_filter('cptui_get_taxonomy_data', 'nextplus_get_cptui_taxonomy_data');
function nextplus_get_cptui_taxonomy_data() {
    $path = get_stylesheet_directory() . '/components/cptui-json/taxonomies.json';
    if (file_exists($path)) {
        $data = json_decode(file_get_contents($path), true);
        return $data ?: array();
    }
    return array();
}

add_action('cptui_after_update_taxonomy', 'nextplus_save_cptui_taxonomy_data');
function nextplus_save_cptui_taxonomy_data($data) {
    $path = get_stylesheet_directory() . '/components/cptui-json';
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    file_put_contents($path . '/taxonomies.json', json_encode($data, JSON_PRETTY_PRINT));
}

# Sync Options Pages
add_filter('acf/json/save_paths', 'nextplus_options_json_save_path');
function nextplus_options_json_save_path($paths) {
    $paths['options'] = get_stylesheet_directory() . '/components/acf-json/options';
    return $paths;
}

add_filter('acf/json/load_paths', 'nextplus_options_json_load_path');
function nextplus_options_json_load_path($paths) {
    $paths[] = get_stylesheet_directory() . '/components/acf-json/options';
    return $paths;
}

# ACFE Custom JSON AutoSync Settings
add_filter('acfe/settings/json_save/all', 'nextplus_acfe_json_save_point', 10, 2);
function nextplus_acfe_json_save_point($path, $field_group) {
    // Save JSON files in their respective loading folders
    $files = acf_get_local_json_files();
    $load_path = acf_maybe_get($files, $field_group['key']);
    
    if ($load_path) {
        return dirname($load_path);
    }
    
    // Default path if no existing file found
    return get_stylesheet_directory() . '/components/acfe-json/field-groups';
}

add_filter('acfe/settings/json_load', 'nextplus_acfe_json_load_point');
function nextplus_acfe_json_load_point($paths) {
    $paths[] = get_stylesheet_directory() . '/components/acfe-json/field-groups';
    return $paths;
}
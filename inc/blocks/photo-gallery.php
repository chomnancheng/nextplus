<?php 
acf_register_block_type(array(
    'name' => 'photo-gallery',
    'title' => 'Photo gallery',
    'active' => true,
    'description' => '',
    'category' => 'common | widgets',
    'icon' => '',
    'keywords' => array(),
    'post_types' => array(),
    'mode' => 'preview',
    'align' => '',
    'align_text' => '',
    'align_content' => 'top',
    'render_template' => 'components/blocks/gallery/index.php',
    'render_callback' => '',
    'enqueue_style' => '',
    'enqueue_script' => '',
    'enqueue_assets' => '',
    'supports' => array(
        'anchor' => false,
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'mode' => true,
        'multiple' => true,
        'example' => array(),
        'jsx' => false,
    ),
));


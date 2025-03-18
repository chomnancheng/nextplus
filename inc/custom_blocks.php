<?php

add_filter( 'allowed_block_types_all', 'misha_allowed_block_types', 25, 2 );
 
function misha_allowed_block_types( $allowed_blocks, $editor_context ) {
 
	return array(
		// Common blocks
		'core/paragraph',
		'core/image',
		'core/heading',
		'core/gallery',
		'core/list',
		'core/list-item',
		'core/quote',
		'core/audio',
		'core/file',
		'core/video',
		
		// Formatting
		// 'core/code',
		'core/preformatted',
		// 'core/pullquote',
		// 'core/table',
		'core/verse',
		
		// Layout elements
		'core/buttons',
		'core/columns',
		'core/group',
		'core/media-text',
		// 'core/more',
		'core/separator',
		'core/spacer',
		
		// Widgets
		// 'core/shortcode',
		// 'core/archives',
		// 'core/categories',
		// 'core/latest-posts',
		// 'core/calendar',
		// 'core/rss',
		// 'core/search',
		// 'core/tag-cloud',
		
		// // Embeds
		// 'core/embed',
		// 'core-embed/twitter',
		// 'core-embed/youtube',
		// 'core-embed/vimeo',
		// 'core-embed/instagram',
		// 'core-embed/wordpress',
		// 'core-embed/soundcloud',
		// 'core-embed/spotify'
	);
}
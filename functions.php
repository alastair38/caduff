<?php
/**
 * blockhaus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blockhaus
 */

if ( ! defined( 'BLOCKHAUS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BLOCKHAUS_VERSION', '1.0.0' );
}

/**
 * Initial theme setup
 */

require get_template_directory() . '/inc/theme-setup.php';


/**
 * Enqueue scripts and styles.
 */

require get_template_directory() . '/inc/scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add public custom post types to main search query
 */

require get_template_directory() . '/inc/search.php';

/**
 * Add customized main navigation
 */

require get_template_directory() . '/inc/navigation.php';

/**
 * SEO
 */
require get_template_directory() . '/inc/seo.php';

/**
 * LOGIN
 */
require get_template_directory() . '/inc/login.php';

/**
 * ADMIN
 */
require get_template_directory() . '/inc/admin.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
	$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
	$title = single_tag_title( '', false );
	} elseif (is_tax()) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
	$title = get_the_author();
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
}
	
	return $title;
 });
 
 class Blockhaus_Menu_Walker extends Walker_Nav_Menu {
	
	function start_lvl(&$output, $depth = 1, $args = array()) {
		
		
		
		if ($args->walker->has_children) {
			$output .= '<ul class="sub-menu grid grid-cols-1 lg:gap-x-6 lg:gap-y-3 lg:shadow-lg border lg:absolute lg:top-full mt-1 rounded-md py-1 px-2 lg:px-3 lg:py-3 lg:bg-white w-max right-0 hidden">';
		}
}

	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li class='flex flex-col lg:flex-row relative items-center" .  implode(" ", $item->classes) . "'>";
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<button aria-controls="' . $item->classes[0] . '" class="text-sm flex items-center hover:text-neutral-dark-100 focus-visible:text-neutral-dark-100" aria-expanded="false">';
		}
 
		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m10 16l4-4l-4-4" /></button>';
		}
		
// 		if ($args->walker->has_children) {
// 			$output .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
// 	<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m10 16l4-4l-4-4" />
// </svg>';
// 		}			
	}	
}
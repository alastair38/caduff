<?php
/**
 * Template part for displaying default header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<header class="bg-neutral-light-100 p-6 gap-12 flex flex-col items-center justify-center col-span-2 2xl:col-span-3">
	<h1 class="text-lg font-black leading-none">
		
	<?php _e( 'Search results for: <span class="underline decoration-primary">' . get_search_query() . '</span>', 'blockhaus' );?>
	
	</h1>
	

	
	<?php 
	
		// get search results referring page so we can provide a back button
			
			$referer = $_SERVER['HTTP_REFERER'] ?? null;
			
			if($referer):
				
				echo '<a class="text-sm flex gap-2 items-center rounded-full pl-1 pr-3 py-1 bg-primary focus:no-underline hover:no-underline hover:ring-2 hover:ring-offset-2 hover:ring-primary focus:ring-2 focus:ring-offset-2 focus:ring-primary" href="' . $referer . '"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
			</svg>' . esc_html( 'Back to previous page', 'blockhaus' ) . '</a>' ;

			endif;

	?>
		
</header><!-- .entry-header -->
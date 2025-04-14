<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

get_header();

$terms = get_terms('series');

?>

	<main class="main-content w-11/12 mx-auto mt-6">
		<div class="grid grid-cols-1 md:grid-cols-6 2xl:grid-cols-12 gap-12">
	
			<?php 
			
				get_template_part('components/archive-header');

				if(!(empty($terms))):
					
					blockhaus_categories_grid($terms, 'View series');
					
				else:
					
					get_template_part( 'layouts/empty' );
					
				endif;

			?>

		</div>

	</main><!-- #main -->

<?php

get_footer();

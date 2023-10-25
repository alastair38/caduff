<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package blockhaus
 */

get_header();
?>

<main id="primary" class="main-content py-20 lg:pt-8 lg:pb-20">

		<section class="p-6 w-11/12 md:w-3/4 bg-white rounded-md mx-auto space-y-6">
			<header class="page-header">
				<h1 class="has-gigantic-font-size font-black"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'blockhaus' ); ?></h1>
			</header><!-- .page-header -->
			
			<p>
				We have recently launched our new Somatosphere website. Old Somatosphere content can now be founded at <a href="https://somatosphere.com/">Somatosphere.com</a>. 
			</p>
			<p>
				If you have an old <strong>Somatosphere.net</strong> link, the corresponding content can be found at the same link but with <strong>.com</strong> replacing <strong>.net</strong> (eg: <strong>http://somatosphere.net/author/jeannettepols/</strong> becomes <strong>https://somatosphere.com/author/jeannettepols/</strong>). 
			</p>

	

	
			
			<!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();

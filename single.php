<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blockhaus
 */

get_header();
?>

<main id="primary" class="main-content w-11/12 mx-auto mt-6">

		<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'layouts/content', 'page' );
			get_template_part( 'layouts/full-width');
			
			//If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
			$comment_count = get_comments_number();
			?>
			
			<div class="comments-panel my-12">
      <h2 id="comments-panel-title" class="text-default">
        <button class="comments-panel-trigger flex items-center gap-2 pl-3 pr-2 py-1 rounded-full bg-primary focus:ring-2 ring-offset-2 ring-transparent focus:ring-primary" aria-expanded="false" aria-controls="comments-panel-content">
				<?php if ( '1' === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '%u comment', 'blockhaus' ), number_format_i18n( $comment_count )
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%u comment;', '%u comments', $comment_count, 'comments title', 'blockhaus' ) ),
					number_format_i18n( $comment_count )
				);
			}?>
			
					<svg class="w-6 h-6"><use href="<?php echo get_template_directory_uri() . '/assets/images/icons/sprite.svg';?>#chevronRight" /></svg>
		
        </button>
      </h2>
      <div class="comments-content" role="region" aria-labelledby="comments-panel-title" aria-hidden="true" id="comments-panel-content">
			<?php comments_template();?>
      </div>
    </div>
	

			<?php	endif;
			
			if(get_post_type() === 'post'):
				
			get_template_part( 'components/related-articles' );
			
			endif;
			
			the_post_navigation(
				array(
					// 'in_same_term' => true,
					// 'taxonomy'           => 'category',
					'prev_text' => '<span aria-hidden="true" class="nav-subtitle font-bold">	<svg class="w-6 h-6"><use href="' . get_template_directory_uri() . '/assets/images/icons/sprite.svg#chevronLeft" /></svg></span> <span class="nav-title sr-only md:not-sr-only pl-2">%title</span>',
					'next_text' => '<span class="nav-title sr-only md:not-sr-only pl-2">%title</span><span aria-hidden="true" class="nav-subtitle font-bold"><svg class="w-6 h-6"><use href="' . get_template_directory_uri() . '/assets/images/icons/sprite.svg#chevronRight" /></svg></span>',
				)
			);

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();

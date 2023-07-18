<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

 $terms = get_the_terms( $post->ID , 'resource-type' );
 
 if ( $terms != null ):
	$type = strtolower($terms[0]->name) . ' ';
 endif;
 
?>

<article id="post-<?php the_ID(); ?>" class="<?php if(isset($type)): echo $type; endif;?>flex flex-col space-y-6 break-words relative col-span-2 2xl:col-span-3">

	<?php 
	if(has_post_thumbnail()):
	blockhaus_post_thumbnail('blog'); 
	endif;
	?>

	<div class="space-y-6">
		
		<header class="entry-header">
			<?php
			
			the_title( '<h2 class="text-lg font-bold leading-tight pb-3">', '</h2>' );

			?>
			
			<div class="entry-meta flex gap-x-6 flex-wrap text-sm italic justify-between py-1">
				
				<?php	
					
				// Get terms for post

				if ( $terms != null ):

				foreach( $terms as $term ) {
				$term_link = get_term_link( $term);
				// Print the name and URL
				echo '<a class="absolute bottom-2 right-2 flex text-sm gap-2 items-center" href="' . $term_link . '"><span>' . $term->name . '
				</span>
				<svg class="w-6 h-6 rounded-full bg-primary p-1" height="24" width="24"><use href="' . get_template_directory_uri() . '/assets/images/icons/sprite.svg#' . strtolower($term->name) . '" /></svg>

				</a>
				';
				// Get rid of the other data stored in the object, since it's not needed
				unset($term); }
					
				endif;

				if ( 'post' === get_post_type() ) :

					blockhaus_posted_by($post);

					blockhaus_posted_on();

				endif;
				?>
				
			</div><!-- .entry-meta -->
		
		</header><!-- .entry-header -->
		
		<hr>
		
		<div class="entry-content">
			
			<?php

			if(('publication' === get_post_type()) || ('link' === get_post_type())):

				the_content();

			else:

				the_excerpt();

			endif;
			?>
			
		</div><!-- .entry-content -->

		<footer class="entry-footer mt-auto">

			<?php get_template_part('components/permalink'); ?>
				
		</footer><!-- .entry-footer -->
	
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->

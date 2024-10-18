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
 
 $post_series = get_the_terms($post->ID, 'series');
  
 
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
				<svg class="w-6 h-6 rounded-full bg-primary p-1" height="24" width="24"><use href="' . get_template_directory_uri() . '/assets/images/icons/sprite.svg#' . strtolower($term->slug) . '" /></svg>

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
				<?php  if( $post_series ):?>
				<ul aria-labelledby="seriesName" class="flex gap-y-3 mt-3 text-sm gap-x-4 items-center flex-wrap">
					<li id="seriesName" class="w-full sr-only">Series:</li>
						<?php	foreach($post_series as $series){
								
								echo '<li><a class="px-3 py-1 bg-secondary text-contrast hover:ring-2 ring-offset-2 hover:ring-secondary focus:ring-2 focus:ring-secondary rounded-full flex" href="' . esc_attr( get_term_link( $series->term_id ) ) . '">' . $series->name . '</a></li>'; 
								unset($series);
							} ;?>
				</ul>
				<?php endif;?>	
		
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

<?php
/**
 * * Template Name: Series Grid Page
 *
 * @package blockhaus
 */

get_header();

?>

	<main class="main-content w-11/12 mx-auto mt-6">
		<div class="grid grid-cols-1 md:grid-cols-6 2xl:grid-cols-12 gap-12">

			<?php 
				
				get_template_part('components/archive-header');
				
				$terms = get_terms( array(
					'taxonomy'   => 'series',
					'orderby' => 'name',
					'order' => 'ASC',
					'hide_empty' => true,
			) );
				
			if ( !empty($terms) ) :	
			/* Start the Loop */;
			foreach($terms as $term):?>
					
			<article id="post-<?php the_ID(); ?>" class="flex flex-col space-y-6 break-words relative col-span-2 2xl:col-span-3">

			<?php 
			
			if(function_exists('get_field')):
  
			$image = get_field("image", $term);
			if($image):?>
			
			<img class="w-full object-cover" src="<?php echo $image['sizes']['blog'];?>" width="<?php echo $image['sizes']["blog-width"];?>" height="<?php echo $image['sizes']["blog-height"];?>" alt="">
			
			<?php endif;
			endif;?>

			<div class="space-y-6">
				
				<header class="entry-header">
					<?php
					
					echo '<h2 class="text-lg font-bold leading-tight pb-3">' . $term->name . '</h2>';

					?>

				</header><!-- .entry-header -->
				
				<hr>
				
				<div class="entry-content space-y-6">
					
					<?php
									
					if($term->description):
						
					echo '<p>' . $term->description . '</p>';
						
					endif;
					
					if($term->count):
						
					echo '<p> There are ' . $term->count . ' articles in this series.</p>';
							
					endif;

					?>
					
				</div><!-- .entry-content -->

				<footer class="entry-footer mt-auto">

				<a class="rounded-md text-sm inline-block w-fit bg-contrast text-white px-6 py-2 hover:ring-2 focus:ring-2 ring-offset-2 ring-transparent hover:ring-contrast focus:ring-contrast" href="<?php echo get_term_link( $term );?>">View series articles</a>			
						
				</footer><!-- .entry-footer -->

			</div>

			</article><!-- #post-<?php the_ID(); ?> -->
					
			<?php	endforeach;

			the_posts_navigation(['aria_label' => __( 'More content' ), 'class' => 'col-span-full']);

		else :

			get_template_part( 'layouts/empty' );

		endif;
		?>

		</div>

	</main><!-- #main -->

<?php

get_footer();

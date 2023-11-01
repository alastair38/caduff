<?php
/**
 * Template part for displaying main content area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$social_sharing = get_field('sharing_enabled');

?>

<div id="content" class="space-y-6 md:col-span-2">
		<?php

		the_content();
		
		if(function_exists('get_field')):
			$external_link = get_field('url');
			$description = get_field('description');
		endif;	
			
		if($description):
			
			echo '<p>' . $description . '</p>';
			
		endif;
		
		if($external_link):?>
	
		<a aria-label="Read <?php the_title();?>" href="<?php echo esc_url( $external_link );?>" class="rounded-md text-sm inline-block w-fit bg-contrast text-white px-6 py-2 hover:ring-2 focus:ring-2 ring-offset-2 ring-transparent hover:ring-contrast focus:ring-contrast" rel="external">
			<?php	_e( 'View ' . get_post_type(), 'blockhaus' );?>
		</a>
	
	<?php endif;

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blockhaus' ),
				'after'  => '</div>',
			)
		);
		?>

</div><!-- .entry-content -->
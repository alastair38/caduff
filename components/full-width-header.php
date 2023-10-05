<?php
/**
 * Full width header component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

 // get the header object from blockhaus_header_layout()

?>

<header class="entry-header space-y-6">
	
	<?php if(is_singular() && has_post_thumbnail()):
	echo '<figure class="relative h-full">';
	the_post_thumbnail( 'header', ['class' => 'w-full aspect-[3/1] h-full col-start-1 row-start-1 object-cover'] );
	
	$caption = get_the_post_thumbnail_caption();
	
	if($caption):
		echo '<span class="md:absolute md:px-3 py-1 text-tiny md:text-sm md:bottom-4 md:right-4 md:bg-white">' . $caption .'</span>';
	endif;
	
	echo '</figure>';
 endif;?>

<h1 class="page-title leading-snug lg:leading-normal font-black text-neutral-dark-900"><?php the_title();?></h1>
<hr>



</header><!-- .page-header -->
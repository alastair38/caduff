<?php

/**
 * Template part for displaying related posts by category
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$post_categories = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
$terms = get_the_terms($post->ID, 'series');
$related_articles = [];


if(!empty($terms)):
foreach( $terms as $term ) {

	$tax_query[] = array(
			'taxonomy' => 'series',
			'field' => 'slug',
			'terms' => $term->slug,
	);

}

endif;

if(!empty($tax_query)):
$args = array(
	'post__not_in'   => array($post->ID),
	'numberposts' => 3,
	'tax_query' => $tax_query
);

$related_articles = get_posts($args);

endif;

if($related_articles):
?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-12">
	<h2 class="col-span-full text-contrast md:text-lg font-black"><?php _e( 'Also from this Series', 'blockhaus' );?></h2>
<?php foreach($related_articles as $article) {?>
<article class="bg-neutral-light-100 flex flex-col justify-between">
	<div class="p-6 space-y-6">
      <h3 class="font-black"><?php echo get_the_title($article->ID);?></h3>
        <hr >
      <p><?php echo get_the_excerpt($article->ID);?></p>
      <a aria-label="<?php echo get_the_title($article->ID);?>" class="rounded-md text-sm inline-block w-fit bg-contrast text-white px-6 py-2 ring-2 ring-offset-2 ring-transparent hover:ring-contrast focus:ring-contrast" href="<?php echo esc_url(get_the_permalink($article->ID));?>"><?php _e( 'View article', 'blockhaus' );?></a>
       
      </div>
			<?php if(has_post_thumbnail($article->ID)):
				$img = get_the_post_thumbnail( $article->ID, 'landscape', ['class' => 'w-full mt-auto object-cover'] );
				echo $img;
 			endif;?>
	</article>
<?php }?>
</div>

<?php endif;?>
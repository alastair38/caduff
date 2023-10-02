<?php 

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$social_sharing = get_field('sharing_enabled');

?>

  <div class="flex flex-col" >
  
    <?php
    blockhaus_posted_by($post);
   
    
    blockhaus_posted_on();
    ?>
  </div><!-- .entry-meta -->
<hr class="border-neutral-light-900 hidden md:block">
  <?php
  
  $post_categories = wp_get_post_categories( $post->ID, array( 'fields' => 'all' ) );

  if( $post_categories ):?>
  <ul aria-labelledby="categoriesList" class="flex gap-y-2 gap-x-4 items-center flex-wrap">
  <li id="categoriesList" class="w-full">Sections:</li>
    <?php	foreach($post_categories as $cat){
        
        echo '<li><a class="px-3 py-1 bg-neutral-light-900 text-contrast hover:ring-2 ring-offset-2 hover:ring-primary focus:ring-2 focus:ring-primary rounded-full" href="' . esc_attr( get_category_link( $cat->term_id ) ) . '">' . $cat->name . '</a></li>'; 
      } ;?>
  </ul>
  <?php endif;

  $post_tags = get_the_tags();

  if ( $post_tags ):?>
  <ul aria-labelledby="tagsList" class="flex gap-y-2 gap-x-4 items-center flex-wrap">
    <li id="tagsList" class="w-full">Tags:</li>
    <?php foreach( $post_tags as $tag ) {
        echo '<li><a class="px-3 py-1 bg-neutral-light-900 text-contrast hover:ring-2 ring-offset-2 hover:ring-primary focus:ring-2 focus:ring-primary rounded-full" href="' . esc_attr( get_tag_link( $tag->term_id ) ) . '">' . $tag->name . '</a></li>'; 
      } ;?>
  </ul>
  <?php endif;

  if($social_sharing):?>
        
  <hr class="border-neutral-light-900 hidden md:block">

  <?php get_template_part( 'components/share-buttons' );

endif;?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail('alm-thumbnail');
   }?>
   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
   <p class="entry-meta">
       <?php the_time("F d, Y"); ?>
   </p>
   <?php the_excerpt(); ?>
</article>

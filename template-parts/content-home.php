<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Picante
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="home-hero" class="box-hover">
            <a href="<?php the_permalink() ?>"><?php picante_post_thumbnail();?></a>
            <div class="box-text">
                <?php if('project' == get_post_type ()){ ?>
                    <a href="<?php the_permalink() ?>"></a>
                    <div class="text">
                        <h2><?php the_title(); ?></h2>
                        <?php if(get_field('format')) { echo '<p><b>Format: </b>' . get_field('format') . '</p>'; } ?>
                        <?php if(get_field('genre')) { echo '<p><b>Genre: </b>' . get_field('genre') . '</p>'; } ?>
                        <?php if(get_field('target')) { echo '<p><b>Target: </b>' . get_field('target') . '</p>'; } ?>
                        <?php if(get_field('short_description')){ echo '<p>'.get_field('short_description').'</p>'; }?>
                    </div>
                <?php } else { ?>
                    <div class="text">
                        <?php the_content(); ?>
                    </div>
                    <?php } ?>
			</div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

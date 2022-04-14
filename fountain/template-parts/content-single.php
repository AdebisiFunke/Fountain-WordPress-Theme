<?php

/**
 * Template part for displaying single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fountain
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header"><?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <div class="entry-meta"><?php fountain_posted_by();
								fountain_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <?php fountain_post_thumbnail(); ?>
    <div class="entry-content pt-4"><?php the_content(); ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer"><?php fountain_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
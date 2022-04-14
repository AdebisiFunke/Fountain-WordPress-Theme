<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fountain
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <?php
                fountain_posted_on();
                fountain_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->
    <?php fountain_post_thumbnail(); ?>
    <div class="read-more border mb-4">
			<?php the_excerpt();
			echo '<a href="' . esc_url(get_the_permalink($post->ID)) . '" class="read-more-btn" arial-label="read-more">' . esc_html__('Read More', 'fountain') . '&#46;&#46;&#46;</a>';?>
<footer class="entry-footer mt-3">
        <?php fountain_entry_footer(); ?>
    </footer><!-- .entry-footer -->	
</div> <!-- .entry-summary -->
    
</article><!-- #post-<?php the_ID(); ?> -->
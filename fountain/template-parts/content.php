<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fountain
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header mt-4">
        <?php
		if (is_singular()) :
			the_title('<h2 class="entry-title">', '</h2>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;
		if ('post' === get_post_type()) :
		?>
        <div class="entry-meta">
            <?php fountain_posted_by(); fountain_posted_on();?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->
    <div class="entry-content">
	<?php fountain_post_thumbnail(); ?>
	<div class="border">
        <?php if (is_single()) {
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'fountain'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);?>
			</div>
		<?php } else {?>
			<div class="read-more">
			<?php the_excerpt();
			echo '<a href="' . esc_url(get_the_permalink($post->ID)) . '" class="read-more-btn" arial-label="read-more">' . esc_html__('Read More', 'fountain') . '&#46;&#46;&#46;</a>';?>
		    </div>
		<?php }
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'fountain'),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
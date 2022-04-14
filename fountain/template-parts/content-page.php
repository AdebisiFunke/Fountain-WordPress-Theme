<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fountain
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->
	<?php fountain_post_thumbnail(); ?>
    <div class="entry-content p-4">
        <?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'fountain'),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->
    <?php if (get_edit_post_link()) : ?>
    <footer class="entry-footer mb-5">
        <?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'fountain'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i><span class="edit-link">',
				'</span>'
			);
			?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
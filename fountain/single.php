<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fountain
 */
if(is_active_sidebar('sidebar-1')){
	$fountain_column = 8;
}else{
	$fountain_column = 12;
}
get_header();
?>
<section class="single-area <?php if( ! is_active_sidebar('sidebar-1')): ?>block-content-css<?php endif; ?>" >
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-<?php echo esc_attr($fountain_column); ?>">
			<?php
			while (have_posts()) : the_post();
				get_template_part('template-parts/content', 'single');
				the_posts_pagination(
					array(
						'prev_text'          =>'<i class="fa solid fa-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous page', 'fountain' ) . '</span>',
						'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'fountain' ) . '</span><i class="fa solid fa-arrow-right" aria-hidden="true"></i>',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fountain' ) . ' </span>',
					)
				);
				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
			</div>
			<?php if(is_active_sidebar('sidebar-1')): ?>
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();


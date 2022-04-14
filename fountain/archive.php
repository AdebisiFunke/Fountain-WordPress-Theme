<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fountain
 */
get_header();
?>
<section >
<div class="container mb-5">
	<div class="row">
		<div class="col-lg-12">
		    <?php if (have_posts()) : ?>
				<header class="page-header pt-2">
					<?php
					the_archive_title('<h1 class="page-title">', '</h1>');
					the_archive_description('<div class="archive-description">', '</div>');
					?>
				</header><!-- .page-header -->
				<?php while (have_posts()) : the_post();
					  get_template_part('template-parts/content', get_post_type());
					  endwhile;
					  the_posts_pagination(
						array(
							'prev_text'          =>'<i class="fa solid fa-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous page', 'fountain' ) . '</span>',
							'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'fountain' ) . '</span><i class="fa solid fa-arrow-right" aria-hidden="true"></i>',
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fountain' ) . ' </span>',
						)
					);
			          else:
					  get_template_part('template-parts/content', 'none');
			     endif;
		    ?>
    </div><!--.col-12 -->
				</div>
				</div>
	</section>
<?php
get_footer();
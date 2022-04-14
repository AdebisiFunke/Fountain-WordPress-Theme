<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fountain
 */

if(is_active_sidebar('sidebar-1')){$fountain_column = 8;}else{$fountain_column = 12;}
get_header();
?>
<section  class="search-area <?php if( ! is_active_sidebar('sidebar-1')): ?>block-content-css<?php endif; ?>" >
		<div class="container">
		<div class="row mt-5">
				<div class="col-lg-<?php echo esc_attr($fountain_column); ?>">
            <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php
						/* translators: %s: search query. */
						printf(esc_html__('Search Results for: %s', 'fountain'), '<span>' . get_search_query() . '</span>');
						?>
                </h1>
            </header><!-- .page-header -->
            <?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part('template-parts/content', 'search');
				endwhile;
				the_posts_pagination(
					array(
						'prev_text'          =>'<i class="fa solid fa-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous page', 'fountain' ) . '</span>',
						'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'fountain' ) . '</span><i class="fa solid fa-arrow-right" aria-hidden="true"></i>',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fountain' ) . ' </span>',
					)
				);
			else :
				get_template_part('template-parts/content', 'none');
			endif;
			?>
      			</div>
				<?php if(is_active_sidebar('sidebar-1')): ?>
				<div class="col-lg-4">
					<?php get_sidebar(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
get_footer();
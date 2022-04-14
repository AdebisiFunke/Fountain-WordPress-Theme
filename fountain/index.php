<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fountain
 */
if(is_active_sidebar('sidebar-1')){$fountain_column = 8;}else{$fountain_column = 12;}
get_header();
?>
<section class="blog-area <?php if( ! is_active_sidebar('sidebar-1')): ?>block-content-css<?php endif; ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-<?php echo esc_attr($fountain_column); ?> ">
			<?php if (have_posts()) : if (is_home() && !is_front_page()) :?>
			<header><h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1></header>
			<?php endif;
				while (have_posts()) :the_post();
					get_template_part('template-parts/content', get_post_type());
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
			<div class="col-lg-4 mt-4"><?php get_sidebar(); ?></div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();

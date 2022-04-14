<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fountain
 */
get_header();
?>
<section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/content', 'page');
			endwhile; // End of the loop.
			?>
        </div>
    </div>
    </div>
</section>
<?php
get_footer();
<?php
/**
 * The template for displaying archive pages
 * @package Access Solutions WP Theme
 */

get_header();
?>
<main class="main-content">
    <div class="grid-container">
        <div class="grid-x grid-margin-x posts-list">

            <div class="large-8 medium-8 small-12 cell">

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'parts/item', 'post' ); ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php foundation_pagination(); ?>
            </div>

            <div class="large-4 medium-4 small-12 cell sidebar">
				<?php get_sidebar( 'sidebar-1' ); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

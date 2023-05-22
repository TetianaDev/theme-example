<?php
/**
 * The template for displaying all pages
 * @package Access Solutions WP Theme
 */

get_header();
?>

<main class="main-content">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">

            <div class="large-8 medium-8 small-12 cell">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
                        <article <?php post_class(); ?>>
                            <h1 class="page-title"><?php the_title(); ?></h1>
	                        <?php post_thumbnail(); ?>
							<?php the_content( '', true ); ?>
                        </article>
					<?php endwhile; ?>
				<?php endif; ?>
            </div>

            <div class="large-4 medium-4 small-12 cell sidebar">
				<?php get_sidebar( 'sidebar-1' ); ?>
            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>

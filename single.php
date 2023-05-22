<?php
/**
 * The template for displaying all single posts
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
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1 class="page-title"><?php the_title(); ?></h1>
							<?php post_thumbnail(); ?>
                            <p class="entry-meta">
                                <?php
                                posted_on();
                                posted_by();
                                ?>
                            </p>
                            <div class="entry-content">
								<?php the_content( '', true ); ?>
                            </div>
                            <h6 class="entry-footer">
                                <?php entry_footer(); ?>
                            </h6>
							<?php comments_template(); ?>
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

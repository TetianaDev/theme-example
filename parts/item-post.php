<?php
/**
 * The post item part
 * @package Access Solutions WP Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="grid-x grid-margin-x">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="medium-4 small-12 cell text-center medium-text-left">
				<?php post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		<div class="cell auto">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'Access Solutions WP Theme' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h3>
			<?php if ( is_sticky() ) : ?>
				<span class="secondary label"><?php _e( 'Sticky', 'Access Solutions WP Theme' ); ?></span>
			<?php endif; ?>
			<?php the_excerpt(); ?>

            <p class="entry-meta">
				<?php
				posted_on();
				posted_by();
				?>
            </p>
		</div>
	</div>
</article>

<?php
/**
 * Template Name: Home
 */
?>
<?php get_header(); ?>
<?php the_hero_section(); ?>

<main class="main-content">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">

			<div class="large-8 medium-8 small-12 cell">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<div class="page-content">
					<?php the_content( '', true ); ?>
				</div>
			</div>

			<div class="large-4 medium-4 small-12 cell sidebar">
				<?php get_sidebar( 'sidebar-1' ); ?>
			</div>

		</div>
	</div>
</main>

<?php get_footer(); ?>

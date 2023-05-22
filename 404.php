<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Access Solutions WP Theme
 */

get_header();
?>

<div class="grid-container not-found">
    <div class="grid-x">
        <div class="cell text-center">
            <h1><?php _e( '404: Page Not Found', 'Access Solutions WP Theme' ); ?></h1>
            <h3><?php _e( 'Keep on looking...', 'Access Solutions WP Theme' ); ?></h3>
            <p><?php printf( __( 'Double check the URL or head back to the <a class="label button" href="%1s">HOMEPAGE</a>', 'Access Solutions WP Theme' ), get_bloginfo( 'url' ) ); ?></p>
        </div>
    </div>
</div>

<?php get_footer(); ?>

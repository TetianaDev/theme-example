<?php
/**
 * The sidebar containing the main widget area
 * @package Access Solutions WP Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'sidebar-1' ); ?>

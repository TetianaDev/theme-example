<?php
/**
 * The template for Searchform
 * @package Access Solutions WP Theme
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" name="s" id="s" class="searching" placeholder="<?php _e( 'Search', 'Access Solutions WP Theme' ); ?>" value="<?php echo get_search_query(); ?>"/>
	<button type="submit" name="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
</form>

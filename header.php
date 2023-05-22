<?php
/**
 * The header for our theme
 * @package Access Solutions WP Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="grid-container menu-grid-container">
        <div class="grid-x">
            <div class="medium-12 large-3 cell">
                <div class="logo text-center large-text-left">
					<?php the_custom_logo(); ?>
                </div>
            </div>
            <div class="medium-12 large-9 cell">
				<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
                    <div class="title-bar hide-for-large" data-responsive-toggle="main-menu" data-hide-for="large">
                        <button class="menu-icon" type="button" data-toggle aria-label="Menu" aria-controls="navigation">
                            <span></span>
                        </button>
                    </div>
                    <div class="main-menu-container">
                        <nav class="top-bar" id="main-menu">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'menu-1',
                                'menu_class'     => 'menu header-menu',
                                'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
                                'walker'         => new Walker_Foundation_Menu()
                            ) ); ?>
                        </nav>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</header>

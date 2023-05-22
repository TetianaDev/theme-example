<?php
/**
 * The banner item part
 * @package Access Solutions WP Theme
 * @var $args
 */

$banner = $args['banner'];
?>
<div class="hero-slide">
	<div class="hero-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($banner); ?>')">
        <div class="grid-container hero-container">
            <div class="hero-content">
                <h1><?php echo get_the_title($banner); ?></h1>
                <div class="hero-text">
                    <?php echo get_the_content(null, false, $banner); ?>
                </div>
            </div>
        </div>
	</div>
</div>
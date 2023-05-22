<?php
/**
 * The video banner item part
 * @package Access Solutions WP Theme
 * @var $args
 */

$banner = $args['banner'];
$videoLink = $args['video'];
?>
<div class="hero-slide hero-video">
	<div class="hero-image">
        <div class="hero-video-container">
            <?php echo Hero_Banner::getIframe($videoLink); ?>
        </div>
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
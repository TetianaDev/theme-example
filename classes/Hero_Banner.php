<?php

class Hero_Banner {

	const POST_TYPE = 'hero_banner';
    const VIDEO_META = 'video_link';
	protected $query = null;

	public function __construct(array $ids = []) {
		$this->processBannersQuery($ids);
	}

	public function getSection() {
		$banners = $this->query->get_posts();
		if(!$banners) {return '';}
		ob_start(); ?>

		<section id="hero" class="<?php echo $this->getSectionClassList(); ?>">
			<div class="hero-slider">
				<?php foreach ($banners as $banner):
                    echo static::getBannerItem($banner);
                endforeach; ?>
			</div>
		</section>

		<?php
		return ob_get_clean();
	}

	public static function getIframe( $link ) {
        if(strpos($link, 'youtube') !== false) {
            $args = [
                'src' => $link . '?feature=oembed&enablejsapi=1&autoplay=1&mute=1&controls=0&loop=1&showinfo=0&rel=0&modestbranding=1',
                'allow' => 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
            ];
        }
        elseif(strpos($link, 'vimeo') !== false) {
	        $args = [
		        'src' => $link . '&background=1',
		        'allow' => 'autoplay; fullscreen; picture-in-picture'
	        ];
        }
        else {
            return '';
        }
		ob_start(); ?>
        <iframe class="hero-video-holder" src="<?php echo $args['src']; ?>" allow="<?php echo $args['allow']; ?>" frameborder="0"></iframe>
		<?php return ob_get_clean();
	}

	public static function getBannerItem($banner) {
		ob_start();
        if($videoLink = get_post_meta($banner->ID, self::VIDEO_META, true)) {
	        get_template_part('parts/item', 'banner-video', ['banner' => $banner, 'video' => $videoLink]);
        }
        else {
	        get_template_part('parts/item', 'banner', ['banner' => $banner]);
        }
		return ob_get_clean();
	}

	public static function registerHeroSection() {
		register_post_type( self::POST_TYPE, [
			'label'  => null,
			'labels' => [
				'name'               => 'hero',
				'singular_name'      => 'Banner',
				'add_new'            => 'Add new Banner',
				'add_new_item'       => 'Add new Banner',
				'edit_item'          => 'Edit Banner',
				'new_item'           => 'New Banner',
				'view_item'          => 'View Banner',
				'search_items'       => 'Search Banner',
				'not_found'          => 'Banner not found',
				'not_found_in_trash' => 'Banner not found in trash',
				'parent_item_colon'  => '',
				'menu_name'          => 'Hero Banners',
			],
			'description'         => '',
			'public'              => true,
			'show_in_menu'        => true,
			'show_in_rest'        => false,
			'menu_position'       => 2,
			'menu_icon'           => null,
			'hierarchical'        => false,
			'supports'            => [ 'title', 'editor', 'thumbnail' ],
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => false,
		] );

        self::addMetaBox();
        self::saveBanner();
	}

	protected static function addMetaBox() {
		add_action('add_meta_boxes', function () {
			add_meta_box( 'video-section', 'Video Link', function () {
				$value = get_post_meta(get_the_ID(),self::VIDEO_META, true) ?? '';
				ob_start(); ?>
                <div class="meta-fields">
                    <div class="field">
                        <label for="<?php echo self::VIDEO_META?>">
		                    <?php echo __('Video link', 'THEME_NAME'); ?>
                        </label>
                        <input type="text" name="<?php echo self::VIDEO_META?>" id="<?php echo self::VIDEO_META?>" value="<?php echo $value; ?>">
                    </div>
                </div>

                <style>
                    .field {
						width: 100%;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                    }
                    .field label {
                        width: 20%;
                    }
					.field input {
						width: calc(80% - 15px);
                    }
                </style>
				<?php
				echo ob_get_clean();
			}, [self::POST_TYPE] );
		});
	}

    protected static function saveBanner() {
	    add_action( 'save_post', function ($post_id) {
		    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
			    return;
            }
		    if( ! current_user_can( 'edit_post', $post_id ) ) {
			    return;
            }
		    if (  isset( $_POST['video_link'] ) ) {
			    update_post_meta( $post_id, self::VIDEO_META, $_POST['video_link'] );
		    }
        } );
    }

	protected function processBannersQuery(array $ids = []) {
		$args = [
			'post_type'      => self::POST_TYPE,
			'orderby'        => 'menu_order',
			'posts_per_page' => - 1,
			'post_status'    => 'publish'
		];

		if(!empty($ids)) {
			$args['post__in'] = $ids;
		}

		$args = apply_filters('hero_banners_args', $args);
		$this->query = new WP_Query($args);
	}

	protected function getSectionClassList() {
		$classList = 'hero';
        if(is_front_page()) {
	        $classList .= ' hero-front';
        }
		if(is_archive()) {
			$classList .= ' hero-archive';
			$classList .= ' hero-' . get_post_type() . '-archive';
		}
		if(is_singular()) {
			$classList .= ' hero-single';
		}
		if(is_author()) {
			$classList .= ' hero-author';
		}
		if(is_category()) {
			$classList .= ' hero-category-archive';
		}
		if(is_category()) {
			$classList .= ' hero-tag-archive';
		}
		return $classList;
	}

}


if(!function_exists('the_hero_section')) {
    function the_hero_section(array $ids = []) {
		$banners = new Hero_Banner($ids);
	    echo $banners->getSection();
    }
}
;
(function ($) {

    function fixVideoWidth() {
        let $videoWrap = $('.hero-image');
        setTimeout(function () {
            $videoWrap.find('.hero-video-container').each(function () {
                if ($videoWrap.width() / 16 > $videoWrap.height() / 9) {
                    $(this).css(
                        {
                            'width': '100%',
                            'height': 'auto'
                        }
                    );
                } else {
                    $(this).css(
                        {
                            'width': $videoWrap.height() * 16 / 9,
                            'height': '100%'
                        }
                    );
                }
            });
        }, 100);
    }

    function startVideo() {
        $('.hero-video-holder').each(function () {
            this.contentWindow.postMessage(JSON.stringify({
                "event": "command",
                "func": "playVideo"
            }), "*");
        });
    }

    // Scripts which runs after DOM load
    $(document).on('ready', function () {
        startVideo();
        fixVideoWidth();
        /**
         * Hero slider options
         */
        $('.hero-slider').slick({
            arrows: false,
            infinite: true,
            autoplay: true,
        });

        /**
         * Add `is-active` class to menu-icon button on Responsive menu toggle
         * And remove it on breakpoint change
         */
        $(window).on('toggled.zf.responsiveToggle', function () {
            $('.menu-icon').toggleClass('is-active');
        }).on('changed.zf.mediaquery', function (e, value) {
            $('.menu-icon').removeClass('is-active');
        });

        /**
         * Close responsive menu on orientation change
         */
        $(window).on('orientationchange', function () {
            setTimeout(function () {
                if ($('.menu-icon').hasClass('is-active') && window.innerWidth < 641) {
                    $('[data-responsive-toggle="main-menu"]').foundation('toggleMenu');
                }
            }, 200);
        });

    });

    $(window).on('load', function () {
        startVideo();
        fixVideoWidth();
    });

    $(window).on('resize', function () {
        fixVideoWidth();
    });

}(jQuery));

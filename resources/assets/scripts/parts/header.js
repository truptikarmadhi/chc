export class Header {

    init() {
        this.HeaderFixed();
        this.HeaderActive();
        this.MegaMenuLinks();
    }

    HeaderFixed() {
        var prevScrollPos = window.pageYOffset || document.documentElement.scrollTop;
        $(window).scroll(function () {
            var sticky = $(".header"),
                scroll = $(window).scrollTop();
            if (scroll >= 50) {
                sticky.addClass("header-fixed");
                sticky.removeClass("header-fixed-os");
            }
            else {
                sticky.removeClass("header-fixed");
                sticky.addClass("header-fixed-os");
            }
            var currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;
            if (prevScrollPos > currentScrollPos || currentScrollPos === 0) {
                $(".header").removeClass("hidden");
            } else {
                $(".header").addClass("hidden");
            }
            prevScrollPos = currentScrollPos;
        });
    }

    HeaderActive() {
        $(document).ready(function () {
            $('.menu-item').on('click', function (e) {
                const $this = $(this);
                const hasMegaMenu = $this.find('.mega-menu').length > 0;

                // agar mega-menu hai tabhi preventDefault kare
                if (hasMegaMenu) {
                    e.preventDefault();

                    // agar already active hai → close kar do
                    if ($this.hasClass('active')) {
                        $this.removeClass('active');
                        $this.find('.mega-menu').removeClass('menu-active');
                        $('.header').removeClass('header-active');
                        $('body').removeClass('overflow-hidden');
                    } else {
                        // sab dusre close kar do
                        $('.menu-item').removeClass('active');
                        $('.mega-menu').removeClass('menu-active');

                        // current open karo
                        $this.addClass('active');
                        $this.find('.mega-menu').addClass('menu-active');
                        $('.header').addClass('header-active');
                        $('body').addClass('overflow-hidden');
                    }
                }
                // agar mega-menu nahi hai, normal link chalega
            });

            // ✅ yeh line add ki gayi hai:
            // agar click .mega-menu ke andar hua, to close event mat chalao
            $('.mega-menu').on('click', function (e) {
                e.stopPropagation();
            });

            // bahar click hone par sab close kar do
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.menu-item, .mega-menu').length) {
                    $('.menu-item').removeClass('active');
                    $('.mega-menu').removeClass('menu-active');
                    $('.header').removeClass('header-active');
                    $('body').removeClass('overflow-hidden');
                }
            });
        });
    }

    MegaMenuLinks() {
        $(document).ready(function () {
            var $firstHeading = $('.menu-links-heading').first();
            var $firstMenu = $firstHeading.next('.mega-menu-links');

            $firstHeading.addClass('active');
            $firstMenu.removeClass('d-none').addClass('active');
            $('.menu-links-heading').on('click', function () {
                var $this = $(this);
                var $currentMenu = $this.next('.mega-menu-links');
                $('.mega-menu-links').addClass('d-none').removeClass('active');
                $('.menu-links-heading').removeClass('active');
                $this.addClass('active');
                $currentMenu.removeClass('d-none').addClass('active');
            });
        });
    }
}
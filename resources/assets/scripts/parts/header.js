export class Header {

    init() {
        this.HeaderFixed();
        this.HeaderActive();
        this.MegaMenuLinks();
        this.BurgerMenu();
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
                if (hasMegaMenu) {
                    e.preventDefault();
                    if ($this.hasClass('active')) {
                        $this.removeClass('active');
                        $this.find('.mega-menu').removeClass('menu-active');
                        $('.header').removeClass('header-active');
                        $('body').removeClass('overflow-hidden');
                    } else {
                        $('.menu-item').removeClass('active');
                        $('.mega-menu').removeClass('menu-active');
                        $this.addClass('active');
                        $this.find('.mega-menu').addClass('menu-active');
                        $('.header').addClass('header-active');
                        $('body').addClass('overflow-hidden');
                    }
                }
            });
            $('.mega-menu').on('click', function (e) {
                e.stopPropagation();
            });
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
    function initMenu() {
        var windowWidth = $(window).width();
        var $firstHeading = $('.menu-links-heading').first();
        var $firstMenu = $firstHeading.next('.mega-menu-links');

        $('.menu-links-heading').removeClass('active');
        $('.mega-menu-links').addClass('d-none').removeClass('active');

        if (windowWidth > 991) {
            $firstHeading.addClass('active');
            $firstMenu.removeClass('d-none').addClass('active');
        } else {
            $('.header-section').removeClass('active');
        }
    }

    initMenu();
        $(window).on('resize', initMenu);

            $('.menu-links-heading').on('click', function () {
                var $this = $(this);
                var $currentMenu = $this.next('.mega-menu-links');
                var windowWidth = $(window).width();

                $('.mega-menu-links').addClass('d-none').removeClass('active');
                $('.menu-links-heading').removeClass('active');

                $this.addClass('active');
                $currentMenu.removeClass('d-none').addClass('active');

                if (windowWidth <= 991) {
                    $('.header-section').addClass('active');
                }
            });

            $('.go-back').on('click', function (e) {
                e.preventDefault(); // stop reload
                console.log('Go back clicked!');
                
                var windowWidth = $(window).width();
                if (windowWidth <= 991) {
                    $('.header-section').removeClass('active');
                    $('.mega-menu-links').addClass('d-none').removeClass('active');
                    $('.menu-links-heading').removeClass('active');
                }
            });
        });
    }

    BurgerMenu(){
        $('.burger-toggle').click(function () {
            const isActive = $(this).hasClass('activate');

            if (!isActive) {
                // Open the burger menu
                $(this).addClass('activate');
                $('.header').addClass('res-header-active');
                $('.nav, .res-search-input, .header-btn').removeClass('d-none');
                $('body').addClass('overflow-hidden');
                $('html').addClass('overflow-hidden');
            } else {
                // Close the burger menu
                $(this).removeClass('activate');
                $('.header').removeClass('res-header-active');
                $('.nav, .res-search-input, .header-btn').addClass('d-none');
                $('body').removeClass('overflow-hidden');
                $('html').removeClass('overflow-hidden');
                $('body').removeClass('header-active-bg');
                $('.header').removeClass('header-active');
                $('.menu-item').removeClass('menu-active');
                $('.header-section').removeClass('active');
                $('.mega-menu-links').addClass('d-none').removeClass('active');
                $('.menu-links-heading').removeClass('active');
            }
        });
    }
}
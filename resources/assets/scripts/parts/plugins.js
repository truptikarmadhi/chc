import "slick-carousel";
import Swiper from "../../../node_modules/swiper/swiper-bundle";

export class Plugins {
  init() {
    this.CaseSlider();
    this.CenterSlider();
    this.SectorSlider();
    this.ValueSlider();
    this.OtherServiceSlider();
    this.ServiceSlider();
    this.TestimonialSlider();
  }
  CaseSlider() {
    $(document).ready(function () {
      $("#caseContainer").slick({
        dots: false,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    });
  }
  CenterSlider() {
    $(document).ready(function () {
    $(".center-slider").slick({
      dots: false,
      infinite: true,
      speed: 800,
      slidesToShow: 1,
      arrows: true,
      prevArrow: '<button class="prev-arrow z-3 bg-EBFF99 p-0 radius3 position-absolute top-center border-0"><img src="/wp-content/themes/chc/templates/icons/sector-prev.svg" alt=""></button>',
      nextArrow: '<button class="next-arrow z-3 bg-EBFF99 p-0 radius3 position-absolute top-center border-0"><img src="/wp-content/themes/chc/templates/icons/sector-next.svg" alt=""></button>',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            fade: true,
          },
        },
      ],
    });
    $(".center-slider").on('afterChange', function (event, slick, currentSlide) {
      $(".slick-slide").removeClass("slick-active-prev slick-active-next");

      // Get all visible slides
      var $currentSlide = $('.slick-current');

      // Previous slide
      var prevSlideIndex = $currentSlide.prev('.slick-slide').data('slick-index');
      $('.slick-slide[data-slick-index="' + prevSlideIndex + '"]').addClass('slick-active-prev', 100);

      // Next slide
      var nextSlideIndex = $currentSlide.next('.slick-slide').data('slick-index');
      $('.slick-slide[data-slick-index="' + nextSlideIndex + '"]').addClass('slick-active-next', 100);
    });

    $(".center-slider").slick('slickGoTo', 0, true);
    });
  }

  SectorSlider() {
    $(".sectors-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 6,
      slidesToScroll: 4,
      prevArrow: ".sectors-slider-section .prev-arrow",
      nextArrow: ".sectors-slider-section .next-arrow",
      responsive: [
         {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ],
    });
  }

  OtherServiceSlider() {
    $(".other-service-slider").slick({
      dots: false,
      arrows: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  ValueSlider() {
    $(".value-slider").slick({
      dots: false,
      arrows: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  ServiceSlider() {
    $("#servicecontainer").slick({
      dots: false,
      arrows: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
  TestimonialSlider() {
    $("#testimonialcontainer").slick({
      dots: false,
      infinite: true,
      arrows: false,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
    });
  }
}

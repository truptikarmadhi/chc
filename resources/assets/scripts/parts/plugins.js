import "slick-carousel";
import Swiper from "../../../node_modules/swiper/swiper-bundle";

export class Plugins {

  init() {
    this.CaseSlider();
    this.SectorSlider();
    this.ValueSlider();
    this.SmallCardSlider();
    this.CaseStudiesSlider();
    this.OtherServiceSlider();
  }
  CaseSlider() {
    // var swiper = new Swiper('.center-slider', {
    //   slidesPerView: 3,
    //   loop: true,
    //   centeredSlides: true,
    //   spaceBetween: 42,
    //   navigation: {
    //     nextEl: '.center-slider-section .swiper-button-next',
    //     prevEl: '.center-slider-section .swiper-button-prev',
    //   },
    // });


    // var swiper = new Swiper(".center-slider", {
    //   slidesPerView: "auto",
    //   spaceBetween: 42,
    //   centeredSlides: true,
    //   loop: true, // ✅ important
    //   autoplay: {
    //     delay: 3000,
    //     disableOnInteraction: false,
    //   },
    //   navigation: {
    //     nextEl: '.center-slider-section .swiper-button-next',
    //     prevEl: '.center-slider-section .swiper-button-prev',
    //   },
    // });

    $('.center-slider').slick({
      centerMode: true,
      slidesToShow: 3,
      dots: false,
      infinite: true,
      arrows: true,
      swipe: true,
      swipeToSlide: true,
      prevArrow: '.center-slider-section .prev-arrow',
      nextArrow: '.center-slider-section .next-arrow',
    });
  }

  SectorSlider() {
    $('.sectors-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 6,
      slidesToScroll: 4,
      prevArrow: '.sectors-slider-section .prev-arrow',
      nextArrow: '.sectors-slider-section .next-arrow',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        {
          breakpoint: 769,
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
      ]
    });
  }

  SmallCardSlider() {
    $('.small-card-slider').slick({
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
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  }
  OtherServiceSlider() {
    $('.other-service-slider').slick({
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
          }
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  }
  CaseStudiesSlider() {
    $('.case-studies-slider').slick({
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
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  }

  ValueSlider() {
    $('.value-slider').slick({
      dots: false,
      arrows: false,
      infinite: false,
      autoplay: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplaySpeed:2000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  }
}

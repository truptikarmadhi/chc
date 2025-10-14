import "slick-carousel";

export class Plugins {

  init() {
    this.TestimonialSlider();
    this.AboutSlider();
    this.HappeningSlider();
  }

  TestimonialSlider() {
    $('.testimonial-slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 1,
          },
        },
      ],
    });
  }

  AboutSlider() {
    $('.about-hero-slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
    });
  }

  HappeningSlider() {
    $('.happening-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      arrows: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 1,
          },
        },
      ],
    });
  }

}

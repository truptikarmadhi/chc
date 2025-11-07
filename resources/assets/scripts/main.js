import $ from 'jquery';
import '@popperjs/core';
import 'bootstrap/dist/js/bootstrap'; 
import '../../node_modules/swiper/swiper-bundle.js';

import { App } from './parts/app.js'
import { Plugins } from './parts/plugins.js'
import { Parts } from './parts/parts.js'
import { Truncate } from './parts/truncate.js';
import { Accordion } from './parts/accordion.js';
import { Privacy } from './parts/privacy.js';
import { Video } from './parts/video.js';
import { HandleBars } from './parts/handlebar.js';
import { Gsap } from './parts/gsap.js';
import { Header } from './parts/header.js';
import { Counter } from './parts/Counter.js';
import WOW from 'wow.js';


// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;

$(function () {

  window.windowWidth = $(window).width();
  window.windowHeight = $(window).height();

  window.isiPhone = navigator.userAgent.toLowerCase().indexOf('iphone');
  window.isiPad = navigator.userAgent.toLowerCase().indexOf('ipad');
  window.isiPod = navigator.userAgent.toLowerCase().indexOf('ipod');

  //Functions List Below

  window.app = new App();
  window.app.init();

  window.plugins = new Plugins();
  window.plugins.init();

  window.parts = new Parts();
  window.parts.init();

  window.truncate = new Truncate();
  window.truncate.init();

  window.accordion = new Accordion();
  window.accordion.init();

  window.privacy = new Privacy();
  window.privacy.init();

  window.video = new Video();
  window.video.init();

  window.handlebar = new HandleBars();
  window.handlebar.init();

  window.gsap = new Gsap();
  window.gsap.init();

  window.header = new Header();
  window.header.init();

  window.counter = new Counter();
  window.counter.init();
});

// ===========================================================================

jQuery(document).ready(function ($) {
  new WOW({
    boxClass: 'wow',
    // animateClass: 'animated',
    once: true,
    mobile: true,
  }).init();
});


$(document).ready(function() {
    if ($(window).width() > 992) {
        $('.filter-item').removeClass('d-none');
    } else {
        $('.filter-item').addClass('d-none');
    }

    // Agar resize pe bhi check karna ho:
    $(window).resize(function() {
        if ($(window).width() > 992) {
            $('.filter-item').removeClass('d-none');
        } else {
            $('.filter-item').addClass('d-none');
        }
    });
});
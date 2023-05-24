"use strict";

/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 05.09.2023
 */
jQuery(document).ready(function ($) {
  /* Slideshow */
  var swiper = new Swiper('.slideshow', {
    effect: 'fade',

    /* "slide", "fade", "cube", "coverflow" or "flip" */
    loop: true,
    noSwiping: true,
    simulateTouch: true,
    speed: 1000,
    autoplay: {
      delay: 4000
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
  $('#menu-toggle').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('body').toggleClass('menu-open');
  });
  $('.faqs .topic').on('click', function (e) {
    e.preventDefault();
    var parent = $(this).parents('.faq-topic'); // parent.toggleClass('active');
    // parent.find('.faq-items').slideToggle();

    if (parent.hasClass('active')) {
      parent.find('.faq-items').slideUp();
      setTimeout(function () {
        parent.removeClass('active');
      }, 300);
    } else {
      parent.find('.faq-items').slideDown();
      parent.addClass('active');
    }
  });
  var wow = new WOW();
  wow.init();

  WOW.prototype.addBox = function (element) {
    this.boxes.push(element);
  };
});
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
  }; // var waypoint = new Waypoint({
  //   element: $('.animate-this'),
  //   handler: function(direction) {
  //     // console.log(direction);
  //     if( direction=="down" ) {
  //       if( $(this.element).attr('data-effect')!=="undefined" ) {
  //         $(this.element).addClass( $(this.element).attr('data-effect') );
  //       }
  //     } else {
  //       if( $(this.element).attr('data-effect')!=="undefined" ) {
  //         $(this.element).removeClass( $(this.element).attr('data-effect') );
  //       }
  //     }
  //   },
  //   offset: 0 
  // })
  // put section elements to watch in here:


  var animEl = $('.animate-this');
  animEl.each(function () {
    var self = this;
    /* eslint-disable*/

    var inview = new Waypoint.Inview({
      /* eslint-enable*/
      element: this,
      enter: function enter(direction) {
        //$(self).addClass('animate');
        // remove following line when adding to project
        //$.notify('Enter triggered with direction ' + direction)
        if ($(self).attr('data-effect') !== "undefined") {
          $(self).addClass('start');
        }
      },
      exited: function exited(direction) {
        //$(self).removeClass('animate');
        // remove following line when adding to project
        //$.notify('Exited triggered with direction ' + direction)
        if ($(self).attr('data-effect') !== "undefined") {
          $(self).removeClass('start');
        }
      }
    });
  });
  /* Gravity Form / Downloads page */

  if ($('#gform_1').length) {
    $('<a href="javascript:void(0)" class="custom-submit-button" aria-label="Submit"><span></span></a>').appendTo('#gform_1 .ginput_container_phone');
    $(document).on('click', '#gform_1 .custom-submit-button', function (e) {
      e.preventDefault();
      $('#gform_1 .gform_button').trigger('click');
    });
  }
});
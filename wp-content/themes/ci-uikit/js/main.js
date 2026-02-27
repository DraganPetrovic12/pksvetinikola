jQuery(document).ready(function ($) {

  $('.open-menu').click(function (e) {
    e.preventDefault();
    if ($(this).hasClass('open')) {
      $(this).removeClass('open');
      $('.main-navigation').removeClass('open');
      $('.content').removeClass('open');
      $('body').removeClass('uk-overflow-hidden');
      $('.header-form-mobile-view').removeClass('form-show');
    } else {
      $(this).addClass('open');
      $('.main-navigation').addClass('open');
      $('.content').addClass('open');
      $('body').addClass('uk-overflow-hidden');
      $('.header-form-mobile-view').addClass('form-show');
    }
  });

  var swiper = new Swiper('.hero-swiper', {
    spaceBetween: 0,
    slidesPerView: 1,
    loop: true,
    autoHeight: true,
    speed: 2800,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
  });

  var testimonialSwiper = new Swiper('.testimonialSwiper', {
    spaceBetween: 0,
    slidesPerView: 1,
    loop: true,
    speed: 1500,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    autoplay: {
      delay: 8000,
      disableOnInteraction: false,
    },
  });

  var swiper = new Swiper(".mySwiper", {
    speed: 1500,
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      560: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 0,
      },
    }
  });

  $('.wpcf7 input').on('click', function (event) {
    $(this).parents('.fields').addClass("label-visible");
  });

  $('.wpcf7 textarea').on('click', function (event) {
    $(this).parents('.fields').addClass("label-visible");
  });

  $('.wpcf7 input').blur(function () {
    if (!$(this).val()) {
      $(this).parents('.fields').addClass("blank");
    } else {
      $(this).parents('.fields').removeClass("blank");
    }
  });

  //change color state on submit button where all fields are entered
  $('#namefield, #subjectfield, #messagefield').on('input', function () {
    // var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    // emailValid = testEmail.test($('#emailfield').val());
    if ($('#namefield').val().length > 0 && $('#subjectfield').val().length > 0 && $('#messagefield').val().length > 0 && $('#emailfield').val().length > 0) {
      $('.wpcf7-submit').addClass("change-color");
    } else {
      $('.wpcf7-submit').on('click', function (event) {
        $('.wpcf7-submit').removeClass("change-color");
      });
    }
  });

  var lastScrollPosition = 0;
  var headerHeight = $('#masthead').outerHeight()

  $(window).scroll(function () {
    var currentScrollPosition = $(this).scrollTop();
    var triggerValue = $(window).height() + $('#colophon').outerHeight();

    if ($(window).width() >= 961) {
      if (currentScrollPosition > lastScrollPosition) {
        $('.blog-sidebar').css({ position: 'sticky', top: '0' });
      }
      else {
        $('.blog-sidebar').css({ position: 'sticky', top: parseFloat($('#masthead').outerHeight()) + 'px', transition: 'background .2s cubic-bezier(0.4,0.0,0.2,1), height .8s cubic-bezier(0.4,0.0,0.2,1), top .8s cubic-bezier(0.4,0.0,0.2,1)' });
      }
    }

    lastScrollPosition = currentScrollPosition;

  });


  // $('.search-icon .uk-navbar-toggle').on('click', function(event){
  //   $('.hide-me').toggleClass('hide-show');
  //   $('.search-icon').hide();
  // });
  // $('.header-form .uk-navbar-toggle').on('click', function(event) {
  //   $('.hide-me').toggleClass('hide-show');
  //   $('.search-icon').show();
  // });
  if ($(window).width() > 1025) {
    $('.toggle-search').on('click', function () {
      $('.hide-me').toggleClass('hide-show');
      $('.search-icon').toggle();
    });
  }


});

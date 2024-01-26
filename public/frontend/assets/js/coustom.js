

// Auto insurence toggle btn
    $(document).ready(function () {
      $(document).on("click", function (event) {
        var $trigger = $(".wc-toggle-style17");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
          $("body").removeClass("open-toggle");
        }
      });
      $(".wc-toggle-style17").click(function () {
        $("body").toggleClass("open-toggle");
      });
    });
 
  // Autoinsurence fixed menu
  
    // $(window).on('scroll', function () {
    //   if ($(window).scrollTop() > 300) {
    //     $(".lc-navbar-section").addClass("ds-fixed");
    //   } else {
    //     $(".lc-navbar-section").removeClass("ds-fixed");
    //   }
    // });
  
// owl slider js
  

    $('#slide-testimonal2').owlCarousel({
      margin: 0,
      center: true,
      loop: true,
      nav: true,
      autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true,
      responsiveClass:true,
      responsive: {
      0: {
         items: 1
      },
      768: {
         items: 2,
      margin: 15,
      },
      1000: {
         items: 3,
      }
      }
  });
  
  // Fix Video Popup
  
  if ($('.video_popup').length > 0) {
    $('.video_popup').magnificPopup({
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '<div class="mfp-title">Some caption</div>' +
                '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: 'https://www.youtube.com/embed/8lQzkwqhKTk'
                }
            }
        }
    });
}
var swiper = new Swiper(".mySwiper", {
  // cssMode: true,
  slidesPerView: 3,
  spaceBetween: 30,
  // freeMode: true,
  loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
  },
  // mousewheel: true,
  // keyboard: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

// aos animation js
AOS.init();
